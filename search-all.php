<?php
/*
 * Template Name: Bulletaeon & WP original search
 */
global $wpdb;

// If no search type is specified, show search form
if ( isset($_GET['st']) && !empty($_GET['st']) )
{
	$st = $wpdb->escape($_GET['st']);
	$sq = $wpdb->escape($_GET['sq']);// search query
	$owner_query = $wpdb->escape($_GET['owner']);

	// Is this WP search or BT search?
	if ( $st == 'bt' )
	{
		get_header();
		$sp = (empty($_GET['sp'])) ? '' : $wpdb->escape($_GET['sp']); // sp = search page
		if ( !$sp ) $sp = 1;
?>
<div class="content-box clear" >
	<div class="content">
<?php
		// Search by title or by owner?
		if ( isset($_GET['sq']) ) {
			do_action('get_bt_search_by_title',$sq,$sp);
		} elseif ( isset($_GET['owner']) ) {
			do_action('get_bt_search_by_owner', $owner_query, $sp);
		}
		?>
	</div><!--content-->
</div><!--content-box-->
<?php  get_footer(); 
	} elseif ( $st == 'wp' ) {
		// Show WP's search result
		$bg_url = get_bloginfo('wpurl');
		header("Location: $bg_url/?s=$sq");
die;
	}
} else {
	get_header();?>
<div class="content-box clear" >
	<div class="content">
		<?php get_search_form(); ?>
	</div><!--content-->
</div><!--content-box-->
<?php get_footer();
} ?>
