<?php
#  PHP MediaWiki Bulk Page Creator
#  Version: 1.0
#  Author: Jonathan Cutrer
#  Website: http://jcutrer.com/
#
#  
#  This program must have the Snoopy Class Library to run.
#  http://sourceforge.net/projects/snoopy/
#
#
#  Syntax: php bulkinsert.php inputfile.txt
#
#
#
include "./Snoopy-1.2/Snoopy.class.php";
$snoopy = new Snoopy;
$wikiroot = "http://yourwikiurl.com";
$login_url = $wikiroot . "/index.php?title=Special:Userlogin&action=submitlogin";
#$submit_url = $wikiroot . "/index.php?title=Special:Userlogin&action=submitlogin";
# Set the username and password below:
$login_vars['wpName'] = "YourRobotsUsername";
$login_vars['wpPassword'] = "Password";
$login_vars['wpRemember'] = "1";
# Login to Wiki
$snoopy->submit($login_url,$login_vars);
# Open Source File and Read into $contents
$fp = fopen($argv[1], "r");
$contents = fread($fp, filesize($argv[1]));
fclose($fp);
# Split $contents in $pages array
$pages = split("--ENDPAGE--", $contents);
# Loop for each item in pages array
# During loop we will get edit page for token then submit form to create page
foreach ($pages as $key => $value) {
        list($title, $body) = split("--ENDTITLE--", $value);
        echo $title;
        # Get rid of newlines in title
        $title = str_replace("\n", "", $title);
        # Make Safetitle for URL
        $safetitle = rawurlencode(str_replace(" ", "_", $title));
        # Lets make sure $title contains something other than null
        if ($title) {
                # Submit to edit page for $title and get contents into $editpage
                if($snoopy->submit($wikiroot . "/index.php?title=" . $safetitle . "&action=edit",$login_vars)) {
                        $editpage = $snoopy->results;
                }
                #echo "$editpage";
                # Pick out Edit Token into $token
                $ans = preg_match('/.*value="(.*?)".*name="wpEditToken"/',$editpage, $matches);
                $token = $matches[1];
                echo $token;
                # Set Post Variables before submitting
                $submit_vars['wpTextbox1'] = $body;
                $submit_vars['wpSummary'] = "";
                $submit_vars['wpSection'] = "";
                $submit_vars['wpEdittime'] = "";
                $submit_vars['wpMinoredit'] = "1";
                $submit_vars['wpSave'] = "Save page";
                $submit_vars['wpEditToken'] = $token;
                # Submit  or Post to create the page
                echo "Final Submit goes to:" . $wikiroot . "/index.php?title=" . $safetitle . "&action=submit";
                if($snoopy->submit($wikiroot . "/index.php?title=" . $safetitle . "&action=submit", $submit_vars)) {
                        $finalresults = $snoopy->results;
                }
                echo $finalresults;
        # End If Loop
        }
# End ForEach Loop
}
exit;
?>
