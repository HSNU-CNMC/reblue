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
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url') ?>?ver=<?php $file = dirname(__FILE__) . '/style.css'; echo filemtime($file);?>" type="text/css" media="screen" />
		<!--[if IE 8]><link rel="stylesheet" href="<?php bloginfo('template_directory')?>/IE.css?ver=<?php $file = dirname(__FILE__) . '/IE8.css'; echo filemtime($file);?>" type="text/css" /><![endif]-->
		<!--[if IE 7]><link rel="stylesheet" href="<?php bloginfo('template_directory')?>/IE7.css?ver=<?php $file = dirname(__FILE__) . '/IE7.css'; echo filemtime($file);?>" type="text/css" /><![endif]-->
		<!--[if IE 6]><link rel="stylesheet" href="<?php bloginfo('template_directory')?>/IE6.css?ver=<?php $file = dirname(__FILE__) . '/IE6.css'; echo filemtime($file);?>" type="text/css" /><![endif]-->
		<script type='text/javascript' src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>

		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<div id="wrapper">
		<div id="header" class="clear">
			<span id="top"></span>
			<?php get_sidebar(); ?>
			<?php wp_nav_menu(  array( 'menu' => 'hsnu-menu', 'container' => '', 'menu_class' => 'clear menu inset' ) );//wp_list_pages('title_li=&depth=1'); ?>
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
					<!--<script type='text/javascript'>
//<![CDATA[
							$(".children").hide();
							$("#menu > li").hover(
							  function () {
									$(this).children("ul").slideDown('fast');
								}, 
							  function () {
									$(this).children("ul").hide();
								}
							);
//]]>
					</script>-->
			</div><!--header-->
