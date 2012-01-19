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
		<style type="text/css">
		body {
			background: url(<?php echo pagelines('custom_bg') ? pagelines('custom_bg') : get_bloginfo('template_directory') . '/img/wood.jpg';?>) transparent repeat;
		}
		#header {
			background: url(<?php echo pagelines('custom_bg') ? pagelines('custom_header') : get_bloginfo('template_directory') . '/img/banner.png';?>) #82b0d9 no-repeat;
		}	
		</style>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<script type='text/javascript' src="<?php bloginfo('template_directory')?>/js/jquery.cycle.all.min.js"></script>
		<script type="text/javascript">
		/* <![CDATA[ */
		var slides=<?php $features = pagelines('features');
			/* Show slides in reverse order, newer first
			 * Firefox determines the order by the sequence of echoed slides, so we need only krsort() to make it work.
			 * However, Chrome and IE9 determines the order by the array keys of slides (low to high) ,
			 * so we need array_values() to re-generate the array keys */
		krsort($features);
		echo json_encode(array_values($features), JSON_FORCE_OBJECT);?>;
		var fgtab=<?php do_action('bt_get_allmsg', 10 );?>;

		jQuery(document).ready(
		function($)
		{
			$('<div id="slides" class="feature_hover"></div>').insertBefore('#featurenav');

			var hoverst = 0;
			$('#featurenav').hover(function(){ hoverst = 1;}, function(){ hoverst = 0;});
			$('.feature_hover').mouseover(
				function()
				{	
					$('#featurenav > a').stop().animate(
					{
						'top': '-50px',
						'opacity':	'1'
					}, 200
					);
				}
			);
			$('.feature_hover').mouseout(
				function()
				{
						$('#featurenav > a').stop().animate(
						{
							'top': '-42px',
							'opacity':	'0'
						}, 200
						);
				}
			);
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
			// Handling mg-col
			var fgcol = $('.fgcol');
			var fgcol_cnt = fgcol.size();

			$('.mg-col').append('<ul id="fgcol-nav"></ul><div class="fgcol" id="fgcol-tab"></div>');

			var first = 0;
			//fgtab.reverse(); // Reverse array key for fgtab
			
			var seq = new Array(); // http://stackoverflow.com/questions/640745/google-chrome-javascript-associative-arrays-evaluated-out-of-sequence
			var k=100;
			for (i in fgtab)
				seq[k++]=i;
			seq.sort();
			seq.reverse();
			for(k in seq)
			{
				i=seq[k];
				$('#fgcol-nav').append('<li><a href="#tab'+ i + '">' + fgtab[i].name + "</a></li>" );
				var tabmsg='';
				for(j in fgtab[i].msgs)
				{
					tabmsg += '<tr><td>' + fgtab[i].msgs[j].msg_time + '</td><td><a href="?mid=' + fgtab[i].msgs[j].msg_id + '">' + fgtab[i].msgs[j].msg_title + '</a></td></tr>';
					
				}
				if(fgtab[i].link == "")
				{
					var tabdiv = '<div id="tab' + i + '"><table id="newmsg"><colgroup><col id="newmsg_time"/><col /></colgroup>' + tabmsg + '</table></div>';
				}else{
					var tabdiv = '<div id="tab' + i + '"><table id="newmsg"><colgroup><col id="newmsg_time"/><col /></colgroup>' + tabmsg + '</table><p style="text-align: right;"><a href="' + fgtab[i].link + '">更多</a></p></div>';
				}
				$('#fgcol-tab').append(tabdiv);
				if( !first )
				{
					$('#fgcol-nav > li > a').addClass('curnav');
					$('#fgcol-tab > div').addClass('curtab');
					first = 1;
				}
			}
			//style
			$('#fgcol-nav').css({
				'width': '93%',
				'text-align': 'left',
				'margin': '1%5% 0'
			});
			$('#fgcol-nav > li').css({ 'display': 'inline'});
			$('#fgcol-nav a').css({
				'padding': '8px 15px 5px',
				'margin': '0 2px',
				'border': '1px solid #ddd',
				'border-bottom': '0',
				'border-radius':				'5px 5px 0 0',
				'-moz-border-radius':			'5px 5px 0 0',
				'-khtml-border-radius':			'5px 5px 0 0',
				'-webkit-border-radius':		'5px 5px 0 0',
				'box-shadow': 'inset 0 20px 8px #fff',
				'text-shadow': '0 1px 0 #fff, 0 -0.5px 0 #222',
				'font-size': '1.3em',
				'position': 'relative',
				'color': '#666',
				'text-decoration': 'none'
			});
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
			$('.curnav').css({
				'background-color': '#F1F0ED',
				'z-index': '9'
			});
			$('#fgcol-tab').css({
				'position': 'relative',
				'box-shadow': '0 0 10px #bbb',
				'margin-top': '0',
				'z-index': '5'
			});
			$('#fgcol-tab > div').css({ 
				'position': 'absolute',
				'display': 'none',
				'width': '95%'
		   	});
			$('.curtab').css({ 'display': 'block' });
			$('#fgcol-tab').height( $('.curtab' ).css('height') );
			//the end of style
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
			var $j = jQuery.noConflict();
			$j(document).ready(function () {
				$j('#slides').cycle({
				fx: '<?php echo pagelines('feffect') ? pagelines('feffect') : 'fade';?>',                        
				sync: <?php echo pagelines('fremovesync') ? '0' : '1';?>,                                                    
				timeout: <?php echo pagelines('timeout') ? pagelines('timeout') : '10000';?>,                    
				speed:  <?php echo pagelines('fspeed') ? pagelines('fspeed') : '1500';?>,                        
				pager:  '#featurenav',
				cleartype: true,
				cleartypeNoBg: true,
				pause: true
				});
			});
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
					<noscript>
					<div style="height: 390px;">
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
					<div id="featurenav" class="feature_hover">
						<!--Don't add anything, pager will be generated by the jQuery Cycle Plugin automatically-->
					</div>
					<div class="mg-col text">
					<noscript>
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
