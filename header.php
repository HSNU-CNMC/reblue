<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
<title><?php
global $page, $paged;
wp_title( '|', true, 'right' );
bloginfo('name');
$site_description = get_bloginfo( 'description', 'display' );
if ( $site_description && ( is_home() || is_front_page() ) )
	echo " | $site_description";
if ( $paged >= 2 || $page >= 2 )
	echo ' | ' . sprintf( __( 'Page %s'), max( $paged, $page ) );
?></title>

<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo( 'charset' ); ?>" />
<meta name="description" content="<?php echo ot_get_option('seo_desc'); ?>"/>
<meta name="keywords" content="<?php echo ot_get_option('seo_keyword'); ?>"/>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url') ?>?ver=<?php $file = dirname(__FILE__) . '/style.css'; echo filemtime($file);?>" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php bloginfo('template_directory') ?>/handheld.css?ver=<?php $file = dirname(__FILE__) . '/handheld.css'; echo filemtime($file);?>" type="text/css" media="handheld" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type='text/javascript' src="<?php bloginfo('template_directory')?>/js/jquery.cycle.all.min.js"></script>
<style type="text/css">
body {
	background: url(<?php echo ot_get_option('global_bg') ? ot_get_option('global_bg') : get_bloginfo('template_directory') . '/img/wood.jpg';?>) transparent repeat;
}
#header {
	background: url(<?php echo ot_get_option('global_banner') ? ot_get_option('global_banner') : get_bloginfo('template_directory') . '/img/banner.png';?>) #82b0d9 no-repeat;
}
</style>

<script type="text/javascript">
/* <![CDATA[ */
jQuery(document).ready(
	function($)
	{
		$('#meteor-buttons').hover(function(){ hoverst = 1;}, function(){ hoverst = 0;});
		$('.meteor-clip,#meteor-buttons').mouseover(function() {
			$('#meteor-buttons').stop().animate({
				'bottom': '-365px',
				'opacity':	'1'
			}, 200);
		});
		$('.meteor-clip,#meteor-buttons').mouseout(function() {
			$('#meteor-buttons').stop().animate({
				'bottom': '-372px',
				'opacity':	'0'
			}, 200);
		});
		// Tab navigation hover
		$('#fgcol-nav a').hover(
			function(){
				$(this).css({
					'background-color': '#F1F0ED',
						'z-index': '9'
				});
			},
				function(){
					if( !($(this).hasClass('curnav')) ){
						$(this).css({
							'background-color': 'transparent',
								'z-index': '1'
						});
					}
				}
		);
		// Dynamically set tab height
		$('#fgcol-tab').height( $('.curtab' ).css('height') );
		//the end of style
		// Action when click on tab nav link
		$('#fgcol-nav > li > a').click(
			function() {
				var tardiv = $(this).attr('href');

				if( !($(tardiv).hasClass('curtab')) )
				{
					$('.curtab').fadeOut().removeClass('curtab');
					$('.curnav').removeClass('curnav').css({
						'background-color': '#fff',
							'z-index': '1'
					});
					$('#fgcol-tab').animate({
						height: $(tardiv).height()
					}, 400);
					$(tardiv).fadeIn().addClass('curtab');
					$(this).addClass('curnav');
				}
				return false;
			}
		);
		// The end of handling mg-col
	});
//]]>
</script>
<!--[if IE 8]>
			<link rel="stylesheet" href="<?php bloginfo('template_directory')?>/IE8.css?ver=<?php $file = dirname(__FILE__) . '/IE8.css'; echo filemtime($file);?>" type="text/css" />
<script type="text/javascript">
jQuery(document).ready(
	function($) {
		$('body').prepend('<div id="notify-container">\
			<div style="" id="notify1">\
			<span class="notify-close"><a title="dismiss this notification">×</a></span>\
			<span class="notify-text">看起來您使用的是Internet Explorer 8，建議您改用<a href="http://www.hs.ntnu.edu.tw/choose-a-browser/">其他瀏覽器</a>，以獲得最佳瀏覽效果。</span>\
			</div></div>');
		$('.notify-close').click(function () { $('#notify-container').remove(); } );
				}
				);
				</script>
		<![endif]-->
<!--[if IE 7]>
			<link rel="stylesheet" href="<?php bloginfo('template_directory')?>/IE7.css?ver=<?php $file = dirname(__FILE__) . '/IE7.css'; echo filemtime($file);?>" type="text/css" />
<script type="text/javascript">
jQuery(document).ready(
	function($) {
		$('body').prepend('<div id="notify-container">\
			<div style="" id="notify1">\
			<span class="notify-close"><a title="dismiss this notification">×</a></span>\
			<span class="notify-text">看起來您使用的是Internet Explorer 7，建議您改用<a href="http://www.hs.ntnu.edu.tw/choose-a-browser/">其他瀏覽器</a>，以獲得最佳瀏覽效果。</span>\
			</div></div>');
		$('.notify-close').click(function () { $('#notify-container').remove(); } );
				}
				);
				</script>
		<![endif]-->
<!--[if IE 6]>
			<link rel="stylesheet" href="<?php bloginfo('template_directory')?>/IE6.css?ver=<?php $file = dirname(__FILE__) . '/IE6.css'; echo filemtime($file);?>" type="text/css" />
<script type="text/javascript">
jQuery(document).ready(
	function($) {
		$('body').prepend('<div id="notify-container">\
			<div style="" id="notify1">\
			<span class="notify-close"><a title="dismiss this notification">×</a></span>\
			<span class="notify-text">看起來您使用的是Internet Explorer 6，建議您改用<a href="http://www.hs.ntnu.edu.tw/choose-a-browser/">其他瀏覽器</a>，以獲得最佳瀏覽效果。</span>\
			</div></div>');
		$('.notify-close').click(function () { $('#notify-container').remove(); } );
				}
				);
				</script>
		<![endif]-->
<noscript>
	<style type="text/css">
.menu li:hover > ul,
.menu li > ul:hover {
	display: block;
}
	</style>
</noscript>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="wrapper">
	<div id="header" class="clear">
		<span id="top"></span>
		<?php get_sidebar(); ?>
		<script type='text/javascript' src="<?php bloginfo('template_directory')?>/js/effects.js"></script>
<script type="text/javascript">
/* <![CDATA[ */
jQuery(function(){
	jQuery("ul.menu").superfish({
		delay:       3000,
			speed:       250,
			autoArrows:  false,
			dropShadows: false
	}); });
	</script>
</div><!--header-->
