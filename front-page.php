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
		<meta name="description" content="<?php echo pagelines('description'); ?>"/>
		<meta name="keywords" content="<?php echo pagelines('keywords'); ?>"/>
		<!-- Facebook-->
		<?php pagelines('fb_meta'); ?>
		<!-- /Facebook-->
		<link rel="stylesheet" href="<?php bloginfo('template_directory') ?>/handheld.css?ver=<?php $file = dirname(__FILE__) . '/handheld.css'; echo filemtime($file);?>" type="text/css" media="handheld" />
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url') ?>?ver=<?php $file = dirname(__FILE__) . '/style.css'; echo filemtime($file);?>" type="text/css" media="screen" />
		<!--[if IE 8]><link rel="stylesheet" href="<?php bloginfo('template_directory')?>/IE8.css?ver=<?php $file = dirname(__FILE__) . '/IE8.css'; echo filemtime($file);?>" type="text/css" /><![endif]-->
		<!--[if IE 7]><link rel="stylesheet" href="<?php bloginfo('template_directory')?>/IE7.css?ver=<?php $file = dirname(__FILE__) . '/IE7.css'; echo filemtime($file);?>" type="text/css" /><![endif]-->
		<!--[if IE 6]><link rel="stylesheet" href="<?php bloginfo('template_directory')?>/IE6.css?ver=<?php $file = dirname(__FILE__) . '/IE6.css'; echo filemtime($file);?>" type="text/css" /><![endif]-->
		<style type="text/css">
		body {
			background: url(<?php echo pagelines('custom_bg') ? pagelines('custom_bg') : get_bloginfo('template_directory') . '/img/wood.jpg';?>) transparent repeat;
		}
		#header {
			background: url(<?php echo pagelines('custom_bg') ? pagelines('custom_header') : get_bloginfo('template_directory') . '/img/banner.png';?>) #82b0d9 no-repeat;
		}	
		</style>
		<script type='text/javascript' src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
		<script type='text/javascript' src="<?php bloginfo('template_directory')?>/js/jquery.cycle.all.min.js"></script>
		<script type="text/javascript">
		/* <![CDATA[ */
			var slides=<?php echo json_encode(pagelines('features'), JSON_FORCE_OBJECT);?>;
		$(document).ready(
		function()
		{
			$('<div id="slides"></div>').insertBefore('#featurenav');
				for(i in slides)
				{
					if(slides[i].draft == "on")
						continue;
					var sid = "fg-fs" + i;
					$('#slides').append("<div id='fg-fs" + i + "'><img width='970' src='" + slides[i].image + "'/></div>");
					if(slides[i].textboxwidth != "")
					{
						//chrome cause some problem with getting height
						//hard-code to solve
						//var sh = $('div#' + sid ).children('img').css('height');
						var sh = 358;
						$('#' + sid ).append("<div class='fg-fs' style='width:" + slides[i].textboxwidth  + "px; height:" + sh +"px'>" + slides[i].text + "</div>");
					}
					$('#slides img').load();
				}
				var $j = jQuery.noConflict();
				$j(document).ready(function () {
					$j('#slides').cycle({
					fx: '<?php echo pagelines('feffect') ? pagelines('feffect') : 'fade';?>',                        
					sync: <?php echo pagelines('fremovesync') ? '0' : '1';?>,                                                    
					timeout: <?php echo pagelines('timeout') ? pagelines('timeout') : '10000';?>,                    
					speed:  <?php echo pagelines('fspeed') ? pagelines('fspeed') : '1500';?>,                        
					pager:  '#featurenav',
					cleartype: true,
					cleartypeNoBg: true
					});
				});
		});
		//]]>
		</script>
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
					<noscript>
					<div id="" style="height: 390px;">
<?php
					foreach ( pagelines('features') as $key => $feature )
					{
						if ( isset($feature['draft']) && $feature['draft'] )
						{
							continue;
						} else {
							echo '<div style="position: absolute;">';
							echo '<img src="';
							echo $feature['image'];
							echo '" width="970px">';
							if ( $feature['textboxwidth'] > 0 )
							{
								echo '<div class="fg-fs" style=" height: 358px; width: ';
								echo $feature['textboxwidth'] . 'px ;">';
								echo $feature['text'];
								echo '</div>';
							}
							echo '</div>';
							break;
						}
					}
?>
					</div><!--slides-->
					</noscript>
					<div id="featurenav">
						<!--Don't add anything, pager will be generated by the jQuery Cycle Plugin automatically-->
					</div>
					<div class="mg-col text">
<?php
					if ( has_action('get_newmsg') )
					{
						foreach ( pagelines('fboxes') as $fbox )
						{
							echo '<div class="fgcol">';
							do_action('get_newmsg', $fbox['bt_amount'], $fbox['bt_category'], $fbox['title'], $fbox['bt_more']);
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
					</div><!--mg-col-->
				</div><!--fcontent-->
			</div><!--fcontent-box-->
			<div id="fg-footer" class="clear text">
			<?php echo pagelines('contact_info');
			echo pagelines('fb_script'); ?>
			<a href="#top" class="mobile-text">top</a>
			</div><!--footer-->
		</div><!--wrapper-->
		<?php echo pagelines('analytics_script'); wp_footer(); ?>
	</body>
</html>
