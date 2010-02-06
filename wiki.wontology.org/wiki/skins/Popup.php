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

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="<?php $this->text('xhtmldefaultnamespace') ?>" <?php
  foreach($this->data['xhtmlnamespaces'] as $tag => $ns) {
    ?>xmlns:<?php echo "{$tag}=\"{$ns}\" ";
  } ?>xml:lang="<?php $this->text('lang') ?>" lang="<?php $this->text('lang') ?>" dir="<?php $this->text('dir') ?>">
  <head>
    <meta http-equiv="Content-Type" content="<?php $this->text('mimetype') ?>; charset=<?php $this->text('charset') ?>" />
    <?php $this->html('headlinks') ?>
    <title><?php $this->text('pagetitle') ?></title>
    <?php $this->html('csslinks') ?>

    <!--[if lt IE 7]><script type="<?php $this->text('jsmimetype') ?>" src="<?php $this->text('stylepath') ?>/common/IEFixes.js?<?php echo $GLOBALS['wgStyleVersion'] ?>"></script>
    <meta http-equiv="imagetoolbar" content="no" /><![endif]-->

    <?php print Skin::makeGlobalVariablesScript( $this->data ); ?>

    <script type="<?php $this->text('jsmimetype') ?>" src="<?php $this->text('stylepath' ) ?>/common/wikibits.js?<?php echo $GLOBALS['wgStyleVersion'] ?>"><!-- wikibits js --></script>
    <!-- Head Scripts -->
<?php $this->html('headscripts') ?>
<?php if($this->data['jsvarurl']) { ?>
    <script type="<?php $this->text('jsmimetype') ?>" src="<?php $this->text('jsvarurl') ?>"><!-- site js --></script>
<?php } ?>
<?php if($this->data['pagecss']) { ?>
    <style type="text/css"><?php $this->html('pagecss') ?></style>
<?php }
    if($this->data['usercss']) { ?>
    <style type="text/css"><?php $this->html('usercss') ?></style>
<?php }
    if($this->data['userjs']) { ?>
    <script type="<?php $this->text('jsmimetype') ?>" src="<?php $this->text('userjs' ) ?>"></script>
<?php }
    if($this->data['userjsprev']) { ?>
    <script type="<?php $this->text('jsmimetype') ?>"><?php $this->html('userjsprev') ?></script>
<?php }
    if($this->data['trackbackhtml']) print $this->data['trackbackhtml']; ?>
  </head>
  <body<?php if($this->data['body_ondblclick']) { ?> ondblclick="<?php $this->text('body_ondblclick') ?>"<?php } ?>
<?php if($this->data['body_onload']) { ?> onload="<?php $this->text('body_onload') ?>"<?php } ?>
 class="mediawiki <?php $this->text('dir') ?> <?php $this->text('pageclass') ?> <?php $this->text('skinnameclass') ?>">
    <div id="globalWrapper">
      <div id="column-content">
        <div id="content">
          <a name="top" id="top"></a>
          <div id="bodyContent">
            <div id="contentSub"><?php $this->html('subtitle') ?></div>

              <!-- start content -->
              <?php $this->html('bodytext') ?>
              <?php if($this->data['catlinks']) { $this->html('catlinks'); } ?>
              <!-- end content -->

            <div class="visualClear"></div>
          </div><!-- bodyContent -->
        </div><!-- content -->
      </div><!-- column-content -->
      <div class="visualClear"></div>
    </div><!-- globalWrapper -->

    <div style="text-align: center;">
      <a href="<?php 
	$pageUrl = $this->data['nav_urls']['permalink']['href'];
	$pageUrl = preg_replace(
	  "/[?&]oldid=[0-9]+/",     "",                $pageUrl );
	$pageUrl = preg_replace(
	  "/\/help\.php\?/",        "/index.php?",     $pageUrl );
	print htmlspecialchars( $pageUrl );
      ?>">View this page in our wiki for more options.</a>
    </div>
<?php $this->html('bottomscripts'); /* JS call to runBodyOnloadHook */ ?>
<?php $this->html('reporttime') ?>
  </body>
</html>
<?php
  wfRestoreWarnings();
  } // end of execute() method
} // end of class


