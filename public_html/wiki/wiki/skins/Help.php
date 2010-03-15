<?php
/**
 * "Help" page skin for systems that use MediaWiki as a documentation CMS
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
class SkinHelp extends SkinMonoBook {
  function initPage( OutputPage $out ){
    parent::initPage( $out );
    $this->skinname  = 'help';
    $this->stylename = 'help';
    $this->template  = 'HelpTemplate';
  }

  function setupSkinUserCss( OutputPage $out ){
    parent::setupSkinUserCss( $out );
    $out->addStyle( 'help/main.css', 'screen' );
  }
}


class HelpTemplate extends MonoBookTemplate {
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
          <?php if($this->data['sitenotice']) { ?><div id="siteNotice"><?php $this->html('sitenotice') ?></div><?php } ?>

          <div id="upper-right-ad"
style="float: right; font-size: 188%; padding-top: 0.5em; display: none; width: 300px; height: 250px;"></div>

          <h1 id="firstHeading" class="firstHeading"><?php $this->data['displaytitle']!=""?$this->html('title'):$this->text('title') ?></h1>

          <div id="left-ad-column"
style="float: left; padding-right: 1em; padding-top: 2em; display: none; width: 160px; height: 1210px;"></div>

          <div id="bodyContent">
            <h3 id="siteSub"><?php $this->msg('tagline') ?></h3>
            <div id="contentSub"><?php $this->html('subtitle') ?></div>
            <?php if($this->data['undelete']) { ?><div id="contentSub2"><?php     $this->html('undelete') ?></div><?php } ?>

            <?php if($this->data['newtalk'] ) { ?><div class="usermessage"><?php $this->html('newtalk')  ?></div><?php } ?>

            <?php if($this->data['showjumplinks']) { ?><div id="jump-to-nav"><?php $this->msg('jumpto') ?> <a href="#column-one"><?php $this->msg('jumptonavigation') ?></a>, <a href="#searchInput"><?php $this->msg('jumptosearch') ?></a></div><?php } ?>

            <!-- start content -->
<?php $this->html('bodytext') ?>
<?php if($this->data['catlinks']) { $this->html('catlinks'); } ?>
            <!-- end content -->
            <?php if($this->data['dataAfterContent']) { $this->html ('dataAfterContent'); } ?>

            <div id="bottom-ads-popup" align="center"
              style="display: none; height: 105px;"></div>
            <div id="bottom-ads-fullpage" align="center"
              style="display: none; height: 60px;"></div>
            <div class="visualClear"></div>

          </div><!-- bodyContent -->
        </div><!-- content -->
      </div><!-- column-content -->
      <div class="visualClear"></div>
    </div><!-- globalWrapper -->
    <div id="footer">
      <ul id="f-list">
        <li id="help-skin-link"><a id="help-skin-link-anchor" href="<?php
          $pageUrl = $this->data['nav_urls']['permalink']['href'];
          $pageUrl = preg_replace(
            "/[?&]oldid=[0-9]+/",     "",                $pageUrl );
          $pageUrl = preg_replace(
            "/\/help\.php\?/",        "/index.php?",     $pageUrl );
          print htmlspecialchars( $pageUrl );
        ?>">View this page in our wiki for more options.</a></li>
        <script type="text/javascript"><!--
          if (window != window.top)  // displayed in an iframe
            document.getElementById('help-skin-link-anchor').target = '_blank';
          //-->
        </script>
        <li id="copyright"><?php $this->html('copyright') ?></li>
      </ul>
    </div>
<?php $this->html('bottomscripts'); /* JS call to runBodyOnloadHook */ ?>
<?php $this->html('reporttime') ?>

    <!-- now load and display all of the page's ads -->
    <script type="text/javascript"><!--
      function showDiv(divId){
        document.getElementById(divId).style.display = 'block';
      }
      function moveAndShowAd(divId){
        var targetDiv = document.getElementById( divId );
        var divWithAd = document.getElementById( divId + '-content' );

        // remove the ad div from the main document
        var parent = divWithAd.parentNode;
        parent.removeChild( divWithAd );
        // put the ad div into its target location on the page
        targetDiv.appendChild( divWithAd );
        // and make it visible
        divWithAd.style.display = 'block';
      }
      function operateOnAdsByContext(doitFunction){
        if (window == window.top){ // being displayed full-page
          if ((typeof wikiPageHasAds === 'undefined') || !wikiPageHasAds)
            doitFunction('upper-right-ad');
          doitFunction('left-ad-column');
          doitFunction('bottom-ads-fullpage');
        }
        else {
          doitFunction('bottom-ads-popup');
        }
      }

      operateOnAdsByContext(showDiv);
      //-->
    </script>

    <div id="upper-right-ad-content" style="display: none;">
      <script type="text/javascript"><!--
        google_ad_client = "<?php
          global $wg_GOOG_publisherId;
          echo $wg_GOOG_publisherId;                            ?>";
        google_ad_slot = "<?php
          global $wg_HelpSkin_GOOG_upperRight;
          echo $wg_HelpSkin_GOOG_upperRight;                    ?>";
        google_ad_width = 300;
        google_ad_height = 250;
        //-->
      </script>
      <script type="text/javascript"
        src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
      </script>
    </div>
    <div id="left-ad-column-content" style="display: none;">
      <script type="text/javascript"><!--
        amazon_ad_tag = "<?php
          global $wg_AMZWID_associateId;
          echo $wg_AMZWID_associateId;                          ?>";
        amazon_ad_border = "hide";
        amazon_ad_width = "160";
        amazon_ad_height = "600";
        amazon_color_border = "f9f9f9";
        amazon_color_link = "1d43c0";
        amazon_color_logo = "black";
        //--></script>
      <script type="text/javascript" src="http://www.assoc-amazon.com/s/ads.js"></script>
      <br />
      <script type="text/javascript"><!--
        google_ad_client = "<?php
          global $wg_GOOG_publisherId;
          echo $wg_GOOG_publisherId;                            ?>";
        google_ad_slot = "<?php
          global $wg_HelpSkin_GOOG_leftColumn;
          echo $wg_HelpSkin_GOOG_leftColumn;                    ?>";
        google_ad_width = 160;
        google_ad_height = 600;
        //-->
      </script>
      <script type="text/javascript"
        src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
      </script>
    </div>
    <div id="bottom-ads-popup-content" style="display: none;">
      <script type="text/javascript"><!--
        google_ad_client = "<?php
          global $wg_GOOG_publisherId;
          echo $wg_GOOG_publisherId;                            ?>";
        google_ad_slot = "<?php
          global $wg_HelpSkin_GOOG_bottomPopup;
          echo $wg_HelpSkin_GOOG_bottomPopup;                   ?>";
        google_ad_width = 728;
        google_ad_height = 15;
        //-->
      </script>
      <script type="text/javascript"
        src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
      </script>

      <script type="text/javascript"><!--
        amazon_ad_tag = "<?php
          global $wg_AMZWID_associateId;
          echo $wg_AMZWID_associateId;                          ?>";
        amazon_ad_width = "728";
        amazon_ad_height = "90";
        amazon_ad_border = "hide";
        amazon_ad_logo = "hide";
        amazon_ad_link_target = "new";
        amazon_color_border = "f9f9f9";
        amazon_color_link = "1d43c0";
        amazon_color_logo = "000000";
      //--></script>
      <script type="text/javascript" src="http://www.assoc-amazon.com/s/ads.js"></script>
    </div>
    <div id="bottom-ads-fullpage-content" style="display: none;">
      <script type="text/javascript"><!--
        google_ad_client = "<?php
          global $wg_GOOG_publisherId;
          echo $wg_GOOG_publisherId;                            ?>";
        google_ad_slot = "<?php
          global $wg_HelpSkin_GOOG_bottomFull;
          echo $wg_HelpSkin_GOOG_bottomFull;                    ?>";
        google_ad_width = 468;
        google_ad_height = 60;
        //-->
      </script>
      <script type="text/javascript"
        src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
      </script>
    </div>

    <script>
      // have to have all ad div's defined first
      operateOnAdsByContext(moveAndShowAd);
    </script>

  </body>
</html>
<?php
  wfRestoreWarnings();
  } // end of execute() method
} // end of class


