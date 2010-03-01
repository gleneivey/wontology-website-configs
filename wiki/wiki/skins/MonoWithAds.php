<?php
/**
 * MediaWiki page skin based on MonoBook that includes Amazon and Google ads
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
class SkinMonoWithAds extends SkinMonoBook {
  function initPage( OutputPage $out ) {
    parent::initPage( $out );
    $this->skinname  = 'monowithads';
    $this->stylename = 'monowithads';
    $this->template  = 'MonoWithAdsTemplate';
  }

  function setupSkinUserCss( OutputPage $out ) {
    parent::setupSkinUserCss( $out );
    $out->addStyle( 'monowithads/main.css', 'screen' );
  }
}


class MonoWithAdsTemplate extends MonoBookTemplate {
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
    <div id="column-two">
      <div id="amazon-omakase" style="text-align: right;">
        <div class="portlet" id="p-amazon-omakase"></div>
      </div>
      <div id="amazon-tags" style="text-align: left;">
        <div id="p-amazon-tags" class="portlet"></div>
      </div>
    </div><!-- end of the right (by default at least) column -->

    <div id="column-content">
      <div id="content">

    <a name="top" id="top"></a>
    <?php if($this->data['sitenotice']) { ?><div id="siteNotice"><?php $this->html('sitenotice') ?></div><?php } ?>
    <h1 id="firstHeading" class="firstHeading"><?php $this->data['displaytitle']!=""?$this->html('title'):$this->text('title') ?></h1>
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
      <div class="visualClear"></div>
    </div>
  </div>
    </div>
    <div id="column-one">
  <div id="p-cactions" class="portlet">
    <h5><?php $this->msg('views') ?></h5>
    <div class="pBody">
      <ul>
  <?php   foreach($this->data['content_actions'] as $key => $tab) {
          echo '
         <li id="' . Sanitizer::escapeId( "ca-$key" ) . '"';
          if( $tab['class'] ) {
            echo ' class="'.htmlspecialchars($tab['class']).'"';
          }
          echo'><a href="'.htmlspecialchars($tab['href']).'"';
          # We don't want to give the watch tab an accesskey if the
          # page is being edited, because that conflicts with the
          # accesskey on the watch checkbox.  We also don't want to
          # give the edit tab an accesskey, because that's fairly su-
          # perfluous and conflicts with an accesskey (Ctrl-E) often
          # used for editing in Safari.
          if( in_array( $action, array( 'edit', 'submit' ) )
          && in_array( $key, array( 'edit', 'watch', 'unwatch' ))) {
            echo $skin->tooltip( "ca-$key" );
          } else {
            echo $skin->tooltipAndAccesskey( "ca-$key" );
          }
          echo '>'.htmlspecialchars($tab['text']).'</a></li>';
        } ?>
      </ul>
    </div>
  </div>
  <div class="portlet" id="p-personal">
    <h5><?php $this->msg('personaltools') ?></h5>
    <div class="pBody">
      <ul>
<?php       foreach($this->data['personal_urls'] as $key => $item) { ?>
        <li id="<?php echo Sanitizer::escapeId( "pt-$key" ) ?>"<?php
          if ($item['active']) { ?> class="active"<?php } ?>><a href="<?php
        echo htmlspecialchars($item['href']) ?>"<?php echo $skin->tooltipAndAccesskey('pt-'.$key) ?><?php
        if(!empty($item['class'])) { ?> class="<?php
        echo htmlspecialchars($item['class']) ?>"<?php } ?>><?php
        echo htmlspecialchars($item['text']) ?></a></li>
<?php     } ?>
      </ul>
    </div>
  </div>
  <div class="portlet" id="p-logo">
    <a style="background-image: url(<?php $this->text('logopath') ?>);" <?php
      ?>href="<?php echo htmlspecialchars($this->data['nav_urls']['mainpage']['href'])?>"<?php
      echo $skin->tooltipAndAccesskey('p-logo') ?>></a>
  </div>
  <script type="<?php $this->text('jsmimetype') ?>"> if (window.isMSIE55) fixalpha(); </script>
<?php
    $sidebar = $this->data['sidebar'];
    if ( !isset( $sidebar['SEARCH'] ) ) $sidebar['SEARCH'] = true;
    if ( !isset( $sidebar['TOOLBOX'] ) ) $sidebar['TOOLBOX'] = true;
    if ( !isset( $sidebar['LANGUAGES'] ) ) $sidebar['LANGUAGES'] = true;
    foreach ($sidebar as $boxName => $cont) {
      if ( $boxName == 'SEARCH' ) {
        $this->searchBox();
      } elseif ( $boxName == 'TOOLBOX' ) {
        $this->toolbox();
      } elseif ( $boxName == 'LANGUAGES' ) {
        $this->languageBox();
      } else {
        $this->customBox( $boxName, $cont );
      }
    }
?>

	<div id="google-links">
          <div class="portlet" id="p-google-links"></div>
        </div>
	<div id="google-ads">
          <div class="portlet" id="p-google-ads"></div>
        </div>
      </div><!-- end of the left (by default at least) column -->

      <div class="visualClear"></div>
      <div id="footer">
<?php
    if($this->data['poweredbyico']) { ?>
        <div id="f-poweredbyico"><?php $this->html('poweredbyico') ?></div>
<?php   }
    if($this->data['copyrightico']) { ?>
        <div id="f-copyrightico"><?php $this->html('copyrightico') ?></div>
<?php }

    // Generate additional footer links
    $footerlinks = array(
      'lastmod', 'viewcount', 'numberofwatchingusers', 'credits', 'copyright',
      'privacy', 'about', 'disclaimer', 'tagline',
    );
    $validFooterLinks = array();
    foreach( $footerlinks as $aLink ) {
      if( isset( $this->data[$aLink] ) && $this->data[$aLink] ) {
        $validFooterLinks[] = $aLink;
      }
    }
    if ( count( $validFooterLinks ) > 0 ) {
?>      <ul id="f-list">
<?php
      foreach( $validFooterLinks as $aLink ) {
        if( isset( $this->data[$aLink] ) && $this->data[$aLink] ) {
?>          <li id="<?php echo$aLink?>"><?php $this->html($aLink) ?></li>
<?php       }
      }
?>
      </ul>
<?php }
?>
    </div>
</div>
<?php $this->html('bottomscripts'); /* JS call to runBodyOnloadHook */ ?>
<?php $this->html('reporttime') ?>
<?php if ( $this->data['debug'] ): ?>
<!-- Debug output:
<?php $this->text( 'debug' ); ?>

-->
<?php endif; ?>

    <!-- only include advertising on display pages -->
    <?php if ( $action == 'view' || $action == '' ): ?>
      <script>
        window.includeRightHandAdColumn = false;
	if ((typeof wikiPageHasAds === 'undefined') || !wikiPageHasAds){
          includeRightHandAdColumn = true;  // for later

          // adjust styling of page main column for right-hand ads
	  var contentElem = document.getElementById('content');
	  contentElem.style.marginRight = '12.2em';
	  contentElem.style.borderRightWidth = '1px';
	  contentElem.style.borderRightColor = '#aaaaaa';
	  contentElem.style.borderRightStyle = 'solid';
        }
      </script>

      <div id="google-links-content" class="pBody" style="display: none;">
	<script type="text/javascript"><!--
	  google_ad_client = "<?php
	    global $wg_GOOG_publisherId;
	    echo $wg_GOOG_publisherId;                            ?>";
	  google_ad_slot = "<?php
	    global $wg_MonoWithAdsSkin_GOOG_links;
	    echo $wg_MonoWithAdsSkin_GOOG_links;                  ?>";
	  google_ad_width = 120;
	  google_ad_height = 90;
	  //-->
	</script>
	<script type="text/javascript"
	  src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
	</script>
      </div>

      <div id="google-ads-content" class="pBody" style="display: none;">
	<script type="text/javascript"><!--
	  google_ad_client = "<?php
	    global $wg_GOOG_publisherId;
	    echo $wg_GOOG_publisherId;                            ?>";
	  google_ad_slot = "<?php
	    global $wg_MonoWithAdsSkin_GOOG_ads;
	    echo $wg_MonoWithAdsSkin_GOOG_ads;                    ?>";
	  google_ad_width = 120;
	  google_ad_height = 600;
	  //-->
	</script>
	<script type="text/javascript"
	  src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
	</script>
      </div>

      <div id="amazon-omakase-content" class="pBody" style="display: none;">
	<script type="text/javascript"><!--
	  amazon_ad_tag = "<?php
	    global $wg_AMZWID_associateId;
	    echo $wg_AMZWID_associateId;                          ?>";
	  amazon_ad_border = "hide";
	  amazon_ad_width = "120";
	  amazon_ad_height = "600";
	  amazon_color_border = "f9f9f9";
	  amazon_color_link = "1d43c0";
	  amazon_color_logo = "black";
	  //--></script>
	<script type="text/javascript" src="http://www.assoc-amazon.com/s/ads.js"></script>
      </div>

      <div id="amazon-tags-content" class="pBody"
          style="padding-left: 0; display: none;">
	<script charset="utf-8" type="text/javascript"
	  src="http://ws.amazon.com/widgets/q?ServiceVersion=20070822&MarketPlace=US&ID=V20070822/US/<?php
            global $wg_AMZWID_associateId;
            echo $wg_AMZWID_associateId;
          ?>/8006/<?php
            global $wg_MonoWithAdsSkin_AMZ_tags;
            echo $wg_MonoWithAdsSkin_AMZ_tags;
          ?>">
	</script> <noscript><a href="http://ws.amazon.com/widgets/q?ServiceVersion=20070822&MarketPlace=US&ID=V20070822%2FUS%2F<?php
            global $wg_AMZWID_associateId;
            echo $wg_AMZWID_associateId;
          ?>%2F8006%2F<?php
            global $wg_MonoWithAdsSkin_AMZ_tag;
            echo $wg_MonoWithAdsSkin_AMZ_tag;
          ?>&Operation=NoScript">Amazon.com Widgets</a></noscript>
      </div>

      <script>
	function moveAndShowAd(divId){
	  var targetDiv = document.getElementById( 'p-' + divId );
	  var divWithAd = document.getElementById( divId + '-content' );

	  // remove the ad div from the main document
	  var parent = divWithAd.parentNode;
	  parent.removeChild( divWithAd );
	  // put the ad div into its target location on the page
	  targetDiv.appendChild( divWithAd );
	  // and make it visible
	  divWithAd.style.display = 'block';
	}

        moveAndShowAd('google-links');
        moveAndShowAd('google-ads');
        if (includeRightHandAdColumn){
	  moveAndShowAd('amazon-omakase');
	  moveAndShowAd('amazon-tags');
        }
      </script>

    <?php endif; ?><!-- if (include ads) -->
  </body>
</html>
<?php
  wfRestoreWarnings();
  } // end of execute() method

  /*************************************************************************************************/
  function searchBox() {
    global $wgUseTwoButtonsSearchForm;
?>
  <div id="p-search" class="portlet">
    <h5><label for="searchInput"><?php $this->msg('search') ?></label></h5>
    <div id="searchBody" class="pBody">
      <form action="<?php $this->text('wgScript') ?>" id="searchform"><div>
        <input type='hidden' name="title" value="<?php $this->text('searchtitle') ?>"/>
        <input id="searchInput" name="search" type="text"<?php echo $this->skin->tooltipAndAccesskey('search');
          if( isset( $this->data['search'] ) ) {
            ?> value="<?php $this->text('search') ?>"<?php } ?> />
        <input type='submit' name="go" class="searchButton" id="searchGoButton" value="<?php $this->msg('searcharticle') ?>"<?php echo $this->skin->tooltipAndAccesskey( 'search-go' ); ?> /><?php if ($wgUseTwoButtonsSearchForm) { ?>&nbsp;
        <input type='submit' name="fulltext" class="searchButton" id="mw-searchButton" value="<?php $this->msg('searchbutton') ?>"<?php echo $this->skin->tooltipAndAccesskey( 'search-fulltext' ); ?> /><?php } else { ?>

        <div><a href="<?php $this->text('searchaction') ?>" rel="search"><?php $this->msg('powersearch-legend') ?></a></div><?php } ?>

      </div></form>
    </div>
  </div>
<?php
  }

  /*************************************************************************************************/
  function toolbox() {
?>
  <div class="portlet" id="p-tb">
    <h5><?php $this->msg('toolbox') ?></h5>
    <div class="pBody">
      <ul>
<?php
    if($this->data['notspecialpage']) { ?>
        <li id="t-whatlinkshere"><a href="<?php
        echo htmlspecialchars($this->data['nav_urls']['whatlinkshere']['href'])
        ?>"<?php echo $this->skin->tooltipAndAccesskey('t-whatlinkshere') ?>><?php $this->msg('whatlinkshere') ?></a></li>
<?php
      if( $this->data['nav_urls']['recentchangeslinked'] ) { ?>
        <li id="t-recentchangeslinked"><a href="<?php
        echo htmlspecialchars($this->data['nav_urls']['recentchangeslinked']['href'])
        ?>"<?php echo $this->skin->tooltipAndAccesskey('t-recentchangeslinked') ?>><?php $this->msg('recentchangeslinked') ?></a></li>
<?php     }
    }
    if(isset($this->data['nav_urls']['trackbacklink'])) { ?>
      <li id="t-trackbacklink"><a href="<?php
        echo htmlspecialchars($this->data['nav_urls']['trackbacklink']['href'])
        ?>"<?php echo $this->skin->tooltipAndAccesskey('t-trackbacklink') ?>><?php $this->msg('trackbacklink') ?></a></li>
<?php   }
    if($this->data['feeds']) { ?>
      <li id="feedlinks"><?php foreach($this->data['feeds'] as $key => $feed) {
          ?><a id="<?php echo Sanitizer::escapeId( "feed-$key" ) ?>" href="<?php
          echo htmlspecialchars($feed['href']) ?>" rel="alternate" type="application/<?php echo $key ?>+xml" class="feedlink"<?php echo $this->skin->tooltipAndAccesskey('feed-'.$key) ?>><?php echo htmlspecialchars($feed['text'])?></a>&nbsp;
          <?php } ?></li><?php
    }

    foreach( array('contributions', 'log', 'blockip', 'emailuser', 'upload', 'specialpages') as $special ) {

      if($this->data['nav_urls'][$special]) {
        ?><li id="t-<?php echo $special ?>"><a href="<?php echo htmlspecialchars($this->data['nav_urls'][$special]['href'])
        ?>"<?php echo $this->skin->tooltipAndAccesskey('t-'.$special) ?>><?php $this->msg($special) ?></a></li>
<?php   }
    }

    if(!empty($this->data['nav_urls']['print']['href'])) { ?>
        <li id="t-print"><a href="<?php echo htmlspecialchars($this->data['nav_urls']['print']['href'])
        ?>" rel="alternate"<?php echo $this->skin->tooltipAndAccesskey('t-print') ?>><?php $this->msg('printableversion') ?></a></li><?php
    }

    if(!empty($this->data['nav_urls']['permalink']['href'])) { ?>
        <li id="t-permalink"><a href="<?php echo htmlspecialchars($this->data['nav_urls']['permalink']['href'])
        ?>"<?php echo $this->skin->tooltipAndAccesskey('t-permalink') ?>><?php $this->msg('permalink') ?></a></li><?php
    } elseif ($this->data['nav_urls']['permalink']['href'] === '') { ?>
        <li id="t-ispermalink"<?php echo $this->skin->tooltip('t-ispermalink') ?>><?php $this->msg('permalink') ?></li><?php
    }

    wfRunHooks( 'MonoBookTemplateToolboxEnd', array( &$this ) );
    wfRunHooks( 'SkinTemplateToolboxEnd', array( &$this ) );
?>
      </ul>
    </div>
  </div>
<?php
  }

  /*************************************************************************************************/
  function languageBox() {
    if( $this->data['language_urls'] ) {
?>
  <div id="p-lang" class="portlet">
    <h5><?php $this->msg('otherlanguages') ?></h5>
    <div class="pBody">
      <ul>
<?php   foreach($this->data['language_urls'] as $langlink) { ?>
        <li class="<?php echo htmlspecialchars($langlink['class'])?>"><?php
        ?><a href="<?php echo htmlspecialchars($langlink['href']) ?>"><?php echo $langlink['text'] ?></a></li>
<?php   } ?>
      </ul>
    </div>
  </div>
<?php
    }
  }

  /*************************************************************************************************/
  function customBox( $bar, $cont ) {
?>
  <div class='generated-sidebar portlet' id='<?php echo Sanitizer::escapeId( "p-$bar" ) ?>'<?php echo $this->skin->tooltip('p-'.$bar) ?>>
    <h5><?php $out = wfMsg( $bar ); if (wfEmptyMsg($bar, $out)) echo $bar; else echo $out; ?></h5>
    <div class='pBody'>
<?php   if ( is_array( $cont ) ) { ?>
      <ul>
<?php       foreach($cont as $key => $val) { ?>
        <li id="<?php echo Sanitizer::escapeId($val['id']) ?>"<?php
          if ( $val['active'] ) { ?> class="active" <?php }
        ?>><a href="<?php echo htmlspecialchars($val['href']) ?>"<?php echo $this->skin->tooltipAndAccesskey($val['id']) ?>><?php echo htmlspecialchars($val['text']) ?></a></li>
<?php     } ?>
      </ul>
<?php   } else {
      # allow raw HTML block to be defined by extensions
      print $cont;
    }
?>
    </div>
  </div>
<?php
  }

} // end of class
