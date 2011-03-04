<?php
/*
 * Template Name: Bulletaeon & WP original search
 */
global $wpdb;
include_once(WP_PLUGIN_DIR . '/bulletaeon/bt_search.php');
?>
<?php
if ( isset($_GET['sq']) && isset($_GET['st']) && !empty($_GET['st']) && !empty($_GET['sq']) )
{
	$st = $wpdb->escape($_GET['st']);
	$sq = $wpdb->escape($_GET['sq']);
	
	if ( $st == 'bt' )
	{
		get_header();
		$sp = (empty($_GET['sp'])) ? '' : $wpdb->escape($_GET['sp']);
		if ( !$sp ) $sp = 1;
?>
			<div class="content-box clear" >
				<div class="content">
				<?php get_bt_search($sq,$sp); ?>
				</div><!--content-->
			</div><!--content-box-->
			<?php  get_footer(); 
	} elseif ( $st == 'wp' ) {
		// Show WP's search result
		$bg_url = get_bloginfo('wpurl');
		header("Location: $bg_url/?s=$sq");
		die;
	}
}
else 
{
	get_header();?>
		<div class="content-box clear" >
			<div class="content">
			<?php get_search_form(); ?>
			</div><!--content-->
		</div><!--content-box-->
<?php get_footer();
} ?>
