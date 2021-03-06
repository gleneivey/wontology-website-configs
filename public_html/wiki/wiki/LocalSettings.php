<?php

if( defined( 'MW_INSTALL_PATH' ) ) {
  $IP = MW_INSTALL_PATH;
} else {
  $IP = dirname( __FILE__ );
}

$path = array( $IP, "$IP/includes", "$IP/languages" );
set_include_path( implode( PATH_SEPARATOR, $path ) . PATH_SEPARATOR . get_include_path() );

require_once( "$IP/includes/DefaultSettings.php" );
$wgCacheEpoch = max( $wgCacheEpoch, gmdate( 'YmdHis', @filemtime( __FILE__ ) ) );

if ( $wgCommandLineMode ) {
  if ( isset( $_SERVER ) && array_key_exists( 'REQUEST_METHOD', $_SERVER ) ) {
    die( "This script must be run from the command line\n" );
  }
}

$wgSitename         = "Wontology";
$wgLogo             = '/wgLogo.png';
$wgFavicon          = '/favicon.ico';
$wgScriptPath       = "/wiki";
$wgArticlePath      = "/$1";
$wgScriptExtension  = ".php";
$wgEnableUploads       = true;

## UPO means: this is also a user preference option

$wgEnableEmail      = true;
$wgEnableUserEmail  = true; # UPO

$wgEmergencyContact = "webmaster@wontology.org";
$wgPasswordSender = "webmaster@wontology.org";

$wgEnotifUserTalk = true; # UPO
$wgEnotifWatchlist = true; # UPO
$wgEmailAuthentication = true;

## Database settings
$wgDBtype           = "mysql";
$wgDBserver         = "localhost";
$wgDBname           = SECRET
$wgDBuser           = SECRET
$wgDBpassword       = SECRET

# MySQL specific settings
$wgDBprefix         = "";

# MySQL table options to use during installation or update
$wgDBTableOptions   = "ENGINE=InnoDB, DEFAULT CHARSET=utf8";

# Experimental charset support for MySQL 4.1/5.0.
$wgDBmysql5 = true;

## Shared memory settings
$wgMainCacheType = CACHE_NONE;
$wgMemCachedServers = array();
$wgParserCacheType = CACHE_NONE;
$wgUseTeX           = false;

$wgLocalInterwiki   = strtolower( $wgSitename );
$wgLanguageCode = "en";
$wgDiff3 = "";
$wgDefaultSkin = 'monowithads';

$wgSecretKey = SECRET

$wgEnableCreativeCommonsRdf = true;
$wgRightsPage = "";
$wgRightsUrl = "http://www.gnu.org/copyleft/fdl.html";
$wgRightsText = "GNU Free Documentation License 1.3";
$wgRightsIcon = "${wgScriptPath}/skins/common/images/gnu-fdl.png";
# $wgRightsCode = "gfdl1_3"; # Not yet used



$wgExtraNamespaces[100] = "Help";
$wgExtraNamespaces[101] = "Help_talk";
$wgExtraNamespaces[102] = "Wontology";
$wgExtraNamespaces[103] = "Wontology_talk";
$wgExtraNamespaces[104] = "Adas_Daughters";
$wgExtraNamespaces[105] = "Adas_Daughters_talk";
$wgNamespacesWithSubpages[100] = true;
$wgNamespacesToBeSearchedDefault[100] = true;
$wgNamespacesToBeSearchedDefault[102] = true;
$wgNamespacesToBeSearchedDefault[104] = true;
$wgContentNamespaces =  array( 100, 102, 104 );

$wgAllowExternalImages = true;

$wgGroupPermissions['*']['edit']                   = false;
$wgGroupPermissions['*']['createpage']             = false;

require_once( "$IP/extensions/PageCSS/PageCSS.php" );
$wgUsePathInfo = true;
require_once( "$IP/extensions/skin-by-url-2.php" );
require_once( "$IP/extensions/googleAnalytics/googleAnalytics.php" );
$wgGoogleAnalyticsAccount = "UA-13113606-3";

$wg_AMZWID_associateId = "wontology-wiki-20";
$wg_AMZWID_margin = "2em";
require_once( "$IP/extensions/AmazonWidget/AmazonWidget.php" );
$wg_GOOG_publisherId = "pub-2447626445162341";
$wg_MonoWithAdsSkin_GOOG_links = "9791954209";
$wg_MonoWithAdsSkin_GOOG_ads = "9596491409";
$wg_MonoWithAdsSkin_AMZ_tags = "828c7083-3242-49db-a58e-7782231f2df2";
$wg_HelpSkin_GOOG_upperRight = "5421337203";
$wg_HelpSkin_GOOG_leftColumn = "8032286693";
$wg_HelpSkin_GOOG_bottomPopup = "9833245648";
$wg_HelpSkin_GOOG_bottomFull = "6724122983";
