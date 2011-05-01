<?
#  MediaWiki bulk uploader
#  Version: 3/29/2010
#  Author: Glen E. Ivey (c)2010 licensed under Apache License 2.0
#                               http://www.apache.org/licenses/LICENSE-2.0
#
### based on code by Anonymous Coward and Jonathon Cutrer
### retrieved from http://meta.wikimedia.org/wiki/MediaWiki_Bulk_Page_Creator
###  on 3/29/2010
#
#
#
#  This program must have the Snoopy Class Library to run.
#  http://sourceforge.net/projects/snoopy/
#
#
#  Syntax: php bulkmedia.php target_wiki_domain names_and_filepaths.txt [path_to_file_root]
#
# names_and_filepaths.txt has lines, each with a desired filename en wiki,
# then a space character, then a path to the desired file to upload.  no
# spaces in the name or path, left as an exercise.


include "./Snoopy-1.2/Snoopy.class.php";
$snoopy = new Snoopy;
$wikiroot = "http://" . $argv[1] . "/wiki";
$http_responses = fopen('mediawiki_bulk.http_responses', 'w');



function login($snoopy, $wikiroot, $log){
  $login_url = $wikiroot .
    "/index.php?title=Special:UserLogin&action=submitlogin&type=login";

  $snoopy->submit($wikiroot . "/index.php?title=Special:UserLogin&returnto=Main_Page");
  $loginpage = $snoopy->results;

  fwrite($log, "****************\n");
  fwrite($log, "Go to login page\n");
  fwrite($log, "****************\n");
  fwrite($log, $loginpage);
  fwrite($log, "\n");

  if ( preg_match( '/name="wpLoginToken".*?value="(.*?)"/',
		   $loginpage, $matches ) ){
    $token = $matches[1];
  }
  else {
    echo "Failed to get login token!\n";
    echo "**************************************************\n";
    echo $loginpage;
    exit;
  }

  $login_vars['wpLoginAttempt'] = "Log in";
  $login_vars['wpName'] = "Bulk Upload";
  $login_vars['wpPassword'] = "botpass";
  $login_vars['wpRemember'] = "1";
  $login_vars['wpLoginToken'] = $token;
  $snoopy->submit($login_url, $login_vars);

  fwrite($log, "****************\n");
  fwrite($log, "Log in to " . $login_url . "\n");
  fwrite($log, "****************\n");
  fwrite($log, $snoopy->results);
  fwrite($log, "\n");
}



echo "Logging in... ";
login($snoopy, $wikiroot, $http_responses);
echo "Done\n";


# Open Source File and Read into $contents
$fp = fopen($argv[2], "r");
$contents = fread($fp, filesize($argv[2]));
fclose($fp);

# Split $contents in $pages array
$pages = split("\n", $contents);



function upload_file($snoopy, $wikiroot, $base_path, $log,
                     $page_title, $file_path){

  $keep_going = true;
  $formvars['wpDestFile'] = $page_title;
  $formvars['wpUpload'] ="Upload file";
  $formfiles['wpUploadFile'] = $base_path . $file_path;
  $snoopy->set_submit_multipart();
  $snoopy->submit($wikiroot . "/index.php?title=Special:Upload", $formvars,
		  $formfiles);

  fwrite($log, "****************\n");
  fwrite($log, "Special:Upload " . $page_title);
  fwrite($log, "****************\n");
  fwrite($log, $snoopy->results);
  fwrite($log, "\n");

  if (preg_match( "/fullImageLink/", $snoopy->results )){
    echo "!\n";
    $keep_going = false;
  }
  elseif (preg_match(
      "/A file with this name exists already, please check/",
      $snoopy->results )){
    echo "o\n";
    $keep_going = false;
  }

  if (preg_match( "/The action you have requested is limited to users in the groups/", $snoopy->results ) &&
      preg_match( "/log in or create/", $snoopy->results )    ){
    login($snoopy, $wikiroot, $log);
    echo "L";
  }

  return $keep_going;
}

function edit_file($snoopy, $wikiroot, $base_path, $log,
                   $page_title, $file_path){
  # Submit to edit page for $page_title to get parameter values
  $keep_going = true;
  for ($c=0; $c < 5 && $keep_going; $c++){
    $snoopy->submit($wikiroot . "/index.php?title=" . $page_title .
                    "&action=edit");
    $editpage = $snoopy->results;

    fwrite($log, "****************\n");
    fwrite($log, $page_title . "&action=edit");
    fwrite($log, "****************\n");
    fwrite($log, $editpage);
    fwrite($log, "\n");

    if ( preg_match( '/.*value="(.*?)".*name="wpEditToken"/',
                     $editpage, $matches ) ){
      $token = $matches[1];
      $keep_going = false;
    }
    elseif ( preg_match( "/View source /", $snoopy->results ) ){
      login($snoopy, $wikiroot, $log);
      echo "L";
    }
    else
      echo '.';
  }
  if ($keep_going)
    return true;     # actually indicates failure


  $fpath = $base_path . $file_path;
  $fp = fopen( $fpath, 'r');
  $submit_vars['wpTextbox1'] = fread( $fp, filesize($fpath) );
  fclose($fp);

  $submit_vars['wpEditToken'] = $token;
  $submit_vars['wpSummary'] = "";
  $submit_vars['wpSection'] = "";
  $submit_vars['wpEdittime'] = "";
  $submit_vars['wpMinoredit'] = "1";
  $submit_vars['wpSave'] = "Save page";

  $snoopy->submit($wikiroot . "/index.php?title=" . $page_title .
                  "&action=submit", $submit_vars);

  fwrite($log, "****************\n");
  fwrite($log, $page_title . "&action=submit");
  fwrite($log, "****************\n");
  foreach( $snoopy->headers as $header ) {
    fwrite($log, $header);
  }
  fwrite($log, "****************\n");
  fwrite($log, $snoopy->results);
  fwrite($log, "\n");

  if ($snoopy->status != 302 && preg_match( "/^\w*$/", $snoopy->results ))
    return true;

  echo "!\n";
  return false;    # "don't keep going" this upload is done
}



$base_path = $argv[3];
foreach ($pages as $key => $value) {

  list($page_title, $file_path)=split(" ", $value);
  if ( $file_path && !file_exists($base_path . $file_path) ){
    echo "Can't find file: " . $base_path . $file_path . "\n";
  }
  elseif ( $page_title && $file_path ){

    if (preg_match( "/\.mediawiki$/", $file_path ))
      echo "Edit/Create: " . $page_title . " ";
    else
      echo "Uploading: " . $page_title . " ";

    $keep_going = true;
    for ($c=0; $c < 5 && $keep_going; $c++){

      if (preg_match( "/\.mediawiki$/", $file_path )){
	$keep_going = edit_file(  $snoopy, $wikiroot, $base_path,
				  $http_responses, $page_title, $file_path);
      }
      else {
	$keep_going = upload_file($snoopy, $wikiroot, $base_path,
				  $http_responses, $page_title, $file_path);
      }

      if ($keep_going)
        echo "*";
    }
    if ($keep_going)
      echo " FAIL\n";
  }
}

fclose($http_responses);
exit;
?>
