<?
#  PHP MediaWiki Bulk media uploader
#  Version: 0
#  Author: Anonymous Coward, hacking Jonathon Cutrer
#
#  This program must have the Snoopy Class Library to run.
#  http://sourceforge.net/projects/snoopy/
#
#  Syntax: php bulkmedia.php names_and_filepaths.txt
#
#
### retrieved from http://meta.wikimedia.org/wiki/MediaWiki_Bulk_Page_Creator
###  on 3/29/2010; customized for wiki.wontology.org on A2 Hosting
#
#
# names_and_filepaths.txt has lines, each with a desired filename en wiki,
# then a space character, then a path to the desired file to upload.  no
# spaces in the name or path, left as an exercise.

include "./Snoopy-1.2.3/Snoopy.class.php";
$snoopy = new Snoopy;
$wikiroot = "http://somewikiorother.org/root";
$login_url = $wikiroot . "/index.php?title=Special:Userlogin&action=submitlogin\
";
#$submit_url = $wikiroot . "/index.php?title=Special:Userlogin&action=submitlog\
in";

# Set the username and password below:
$login_vars['wpName'] = "botname";
$login_vars['wpPassword'] = "botpass";
$login_vars['wpRemember'] = "1";

# Login to Wiki
$snoopy->submit($login_url,$login_vars);

# Open Source File and Read into $contents
$fp = fopen($argv[1], "r");
$contents = fread($fp, filesize($argv[1]));
fclose($fp);

# Split $contents in $pages array
$pages = split("\n", $contents);

# Loop for each item in pages array
# During loop we will get edit page for token then submit form to create page

echo $wikiroot . "/index.php?title=Special:Upload";
echo "\n";

foreach ($pages as $key => $value) {

        list($fname, $fpath)=split(" ", $value);
        if ( $fname && $fpath )
        {
                $formvars['wpDestFile'] = $fname;
                $formvars['wpUpload'] ="Upload file";
                $formfiles['wpUploadFile'] = $fpath;
                $snoopy->set_submit_multipart();
                if($snoopy->submit($wikiroot . "/index.php?title=Special:Upload\
", $formvars, $formfiles))
                {
                        echo "success $fname\n";
                }
                echo $snoopy->results;
        }


} # End ForEach Loop
exit;
?>
