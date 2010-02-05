<?php
/**
 * "Popup" help boxes skin for systems that use MediaWiki as a documentation CMS
 */

if( !defined( 'MEDIAWIKI' ) )
  die( -1 );

if( $_ENV['MW_INSTALL_PATH'] ) {
  $IP = $_ENV['MW_INSTALL_PATH'];
} else {
  $IP = dirname( dirname( __FILE__ ) );
}

require_once( "$IP/skins/MonoBook.php" );


/**
 * Inherit main code from MediaWiki's MonoBook skin
 */
class SkinPopup extends SkinMonoBook {
  function initPage( OutputPage $out ){
    parent::initPage( $out );
    $this->skinname  = 'popup';
    $this->stylename = 'popup';
    $this->template  = 'PopupTemplate';
  }

  function setupSkinUserCss( OutputPage $out ){
    parent::setupSkinUserCss( $out );
    $out->addStyle( 'popup/main.css', 'screen' );
  }
}


class PopupTemplate extends MonoBookTemplate {
  var $skin;

  function execute() {
    global $wgRequest;
    $this->skin = $skin = $this->data['skin'];
    $action = $wgRequest->getText( 'action' );

    // Suppress warnings to prevent notices about missing indexes in $this->data
    wfSuppressWarnings();

?>

    <div id="popup-content">
      <?php $this->html('bodytext') ?>
    </div>
    <div id="footer">
      <a href="<?php 
        $pageUrl = $this->data['nav_urls']['permalink']['href'];
	$pageUrl = preg_replace(
	  "/[?&]oldid=[0-9]+/",     "",                $pageUrl );
	$pageUrl = preg_replace(
	  "/\/help\.php\?/",        "/index.php?",     $pageUrl );
	print htmlspecialchars( $pageUrl );
      ?>">View this page in our wiki for more options.</a>
    </div>

<?php
  wfRestoreWarnings();
  } // end of execute() method
} // end of class


