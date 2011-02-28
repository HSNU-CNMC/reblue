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
		<script type='text/javascript' src="<?php bloginfo('template_directory')?>/js/jquery.cycle.all.min.js"></script>
		<script type="text/javascript">
		/* <![CDATA[ */
		$(document).ready(
		function()
		{
			jQuery.post(
				"./wp-admin/admin-ajax.php",
			{
				'action': 'rb_getslides',
			},
			function(response){
				response = response.replace(/-1$/g, '');
				response = response.replace(/1$/g, '');
				response = response.replace(/0$/g, '');
				var slides = jQuery.parseJSON(response);
				for(i in slides)
				{
					var sid = "fg-fs" + i;
					$('#slides').append("<div id='fg-fs" + i + "'><img width='970' src='" + slides[i].image + "'/></div>");
					if(slides[i].textboxwidth != "")
					{
						//chrome cause some problem with getting height
						//used haed-code to avoide temporarily.
						//var sh = $('div#' + sid ).children('img').css('height');
						var sh = 358;
						$('#' + sid ).append("<div class='fg-fs' style='width:" + slides[i].textboxwidth  + "px; height:" + sh +"px'>" + slides[i].text + "</div>");
					}
					$('#slides img').load();
				}
				var $j = jQuery.noConflict();
				$j(document).ready(function () {
					$j('#slides').cycle({
					fx: '<?php if(pagelines('feffect')):?><?php echo pagelines('feffect');?><?php else:?>fade<?php endif;?>',                        
					sync: <?php if(pagelines('fremovesync')):?>0<?php else:?>1<?php endif;?>,                                                    
					timeout: <?php if(pagelines('timeout')):?><?php echo pagelines('timeout');?><?php else:?>10000<?php endif;?>,                    
					speed:  <?php if(pagelines('fspeed')):?><?php echo pagelines('fspeed');?><?php else:?>1500<?php endif;?>,                        
					pager:  '#featurenav',
					cleartype: true,
					cleartypeNoBg: true
					});
					<?php if(pagelines('feature_nav_type') == 'names'):?>
						//Overide page numbers on cycle feature with custom text
						$j("div#featurenav").children("a").each(function(){ 
						<?php $count = 1;                                                                  
						foreach(pagelines('features') as $key => $feature):?>                    
							if($j(this).html() == "<?php echo $count;?>") { $j(this).html("<?php echo $feature['name'];?>");}
							<?php $count += 1;?>
						<?php endforeach;?>
						});
					<?php endif;?>
			
					<?php if(pagelines('feature_nav_type') == 'thumbs'):?>	
					//Overide page numbers on cycle feature with custom text
					$j("div#featurenav").children("a").each(function() {
						<?php $count = 1;?>
						<?php foreach(pagelines('features') as $key => $feature):?>
						if($j(this).html() == "<?php echo $count;?>") {$j(this).html('<span class="nav_thumb" style="background: transparent url(<?php echo $feature["thumb"];?>) no-repeat 0 0;"><span class="nav_overlay">&nbsp;</span></span>');}
						<?php $count += 1;?>
						<?php endforeach;?>
					});
					<?php endif;?>
					/*
					<?php if(pagelines('feature_playpause')):?>	
					// Play Pause
					$j('.playpause').click(function() { 
						if ($j(this).hasClass('pause')) {
							$j('#slides').cycle('pause');
						 	$j(this).removeClass('pause').addClass('resume');
						} else {
						   	$j(this).removeClass('resume').addClass('pause');
						    $j('#slides').cycle('resume'); 	
						}
					});
					<?php endif;?>
					*/
				});
			});
		});
		//]]>
		</script>
		<style type="text/css">
		.fc-text {
			background-color: #000;
			background-color: rgba(0, 0, 0, 0.5);
			-ms-filter:alpha(opacity=50);
			filter:alpha(opacity=50);
			color: #fff;
			height: 370px;
			position: absolute;
			z-index: 2;
			top: 0px;
			padding: 15px;
		}
		</style>
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
			delay:       10000,
			speed:       250,
			autoArrows:  false,                           
			dropShadows: false 
			}); });
			//]]>
			</script>
		</div><!--header-->
			<div class="fcontent-box" >
				<div class="fcontent">
					<?php wp_nav_menu(  array( 'menu' => 'hsnu-menu', 'container' => '', 'menu_class' => 'clear menu fg-bt-menu' ) ); ?>
					<div id="slides">
<?php
					/*foreach ( pagelines('features') as $key => $feature )
					{
						if ( isset($feature['draft']) && $feature['draft'] )
						{
							continue;
						} else {
							echo '<div>';
							echo '<img src="';
							echo $feature['image'];
							echo '" width="1000px">';
							if ( $feature['textboxwidth'] > 0 )
							{
								echo '<div class="fc-text" style=" width: ';
								echo $feature['textboxwidth'] . 'px ;">';
								echo $feature['text'];
								echo '</div>';
							}
							echo '</div>';
						}
					}
					echo '<!--';
					echo json_encode(pagelines('features'));
					echo 'exar-->';*/
					?>
					</div><!--slides-->
					<div id="featurenav">
						<!--Don't add anything, pager will be generated by the jQuery Cycle Plugin automatically-->
					</div>
					<script type='text/javascript' src="<?php bloginfo('template_directory')?>/js/effects.js"></script>
					<script type="text/javascript">
						/* <![CDATA[ */
						jQuery(function(){
						jQuery("ul.fg-bt-menu").superfish({ 
						delay:       3000,
						speed:       250,
						autoArrows:  false,                           
						dropShadows: false 
						 }); });
						/* ]]> */
					</script>
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
			<?php echo pagelines('contact_info'); ?>
			<a href="#top" class="mobile-text">top</a>
			</div><!--footer-->
		</div><!--wrapper-->
		<?php wp_footer(); ?>
	</body>
</html>
