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
<link rel="stylesheet" href="<?php bloginfo('template_directory') ?>/handheld.css?ver=<?php $file = dirname(__FILE__) . '/handheld.css'; echo filemtime($file);?>" type="text/css" media="handheld" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url') ?>?ver=<?php $file = dirname(__FILE__) . '/style.css'; echo filemtime($file);?>" type="text/css" media="screen" />
<style type="text/css">
body {
	background: url(<?php echo ot_get_option('global_bg') ? ot_get_option('global_bg') : get_bloginfo('template_directory') . '/img/wood.jpg';?>) transparent repeat;
}
#header {
	background: url(<?php echo ot_get_option('global_banner') ? ot_get_option('global_banner') : get_bloginfo('template_directory') . '/img/banner.png';?>) #82b0d9 no-repeat;
}	
</style>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
<script type='text/javascript' src="<?php bloginfo('template_directory')?>/js/jquery.cycle.all.min.js"></script>
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
<!--<div id="notify-container"><div style="" id="notify1"><span class="notify-close"><a title="dismiss this notification">×</a></span><span class="notify-text">Welcome to Q&amp;A for professional and enthusiast programmers &mdash; check out the <a href="/faq" onclick="StackExchange.notify.closeFirstTime(); return false;">FAQ</a>!</span></div></div>-->
<div id="wrapper">
	<div id="header" class="clear">
		<span id="top"></span>
		<?php get_sidebar();?>
		<script type='text/javascript' src="<?php bloginfo('template_directory'); ?>/js/effects.js"></script>
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
	<div class="fcontent-box" >
		<div class="fcontent">
			<?php wp_nav_menu(  array( 'menu' => 'hsnu-menu', 'container' => '', 'menu_class' => 'clear menu fg-bt-menu' ) ); ?>
			<?php if ( function_exists( 'meteor_slideshow' ) ) { meteor_slideshow(); } ?>
			<div class="mg-col text">
				<ul id="fgcol-nav">
<?php
$fboxes = pagelines('fboxes');
$i=1;
foreach ( $fboxes as $fbox ) {
	echo '<li><a ';
	if ( $i == 1 ) echo 'class="curnav" ';
	echo 'href="#tab'.$i.'">'.$fbox['title'].'</a></li>';
	$i++;
}
?>
				</ul>
				<div id="fgcol-tab" class="fgcol">
<?php
$i=1;
foreach ( $fboxes as $fbox ) {
	echo '<div id="tab'.$i.'" ';
	if ( $i == 1 ) echo 'class="curtab"';
	echo '>';
	echo '<table id="newmsg">
		<colgroup><col id="newmsg_time"><col></colgroup>
		<tbody>';
	foreach ( get_newmsg($fbox['bt_amount'], $fbox['bt_category'], true) as $msg ) {
		if ( $msg->sticky ) {
			$user = get_user_by('login', $msg->msg_owner);
			echo '<tr><td>'.$user->display_name.'</td><td><a href="bulletin/?mid='.$msg->msg_id.'">'.$msg->msg_title.'</a></td></tr>';
		} else {
			echo '<tr><td>'.convert_timestamp($msg->msg_time).'</td><td><a href="bulletin/?mid='.$msg->msg_id.'">'.$msg->msg_title.'</a></td></tr>';
		}
	}
	echo '</tbody>
		</table>';
	if ( ! empty($fbox['bt_more']) ) echo '<p id="newmsg_time_more"><a href="' . $fbox['bt_more'] . '">更多</a></p>';
	echo '</div>';
	$i++;
}
?>
				</div>
				<noscript>
<?php
if ( has_action('get_newmsg') )
{
	foreach ( pagelines('fboxes') as $fbox )
	{
		echo '<div class="fgcol">';
		echo var_dump(get_newmsg($fbox['bt_amount'], $fbox['bt_category'], true));
		echo '</div>';
	}
} else {
	// Make Bulletaeon pluggable
	echo '<div class="fgcol">';
	echo '<h3>'.$fbox['title'].'</h3>';
	echo $fbox['text'];
	echo '</div>';
}
?>
				</noscript>
			</div><!--mg-col-->
		</div><!--fcontent-->
	</div><!--fcontent-box-->
	<div class="footer clear text">
		<div class="effect">
			<div class="fcolumns_container text">
<?php	for ( $i = 1 ; $i <= 4 ; $i++ )
	{
		echo '<div class="fcol">';
		echo pagelines('footer_col'.$i);
		echo '</div>';
	} ?>
				<div class="fcol">
					<?php echo pagelines('inside_contact_info'); ?>
				</div>
			</div><!--fcolumns_container-->
			<a href="#top" class="mobile-text">top</a>
		</div><!--effect-->
		<?php echo pagelines('fb_script'); ?>
	</div><!--footer-->
</div><!--wrapper-->
<?php echo pagelines('analytics_script'); wp_footer(); ?>
</body>
</html>
