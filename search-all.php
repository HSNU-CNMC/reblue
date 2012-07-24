<?php
/*
 * Template Name: Bulletaeon & WP original search
 */
global $wpdb;

// If no search type is specified, show search form
if ( ( isset($_GET['type']) && !empty($_GET['type']) ) || ( isset($_GET['st']) && !empty($_GET['st']) ) )
{
	$type = ( isset($_GET['type']) ) ? $wpdb->escape($_GET['type']) : $wpdb->escape($_GET['st']);// search type
	$title_query = ( isset($_GET['title']) ) ? $wpdb->escape($_GET['title']) : $wpdb->escape($_GET['sq']);// title search keyword
	$owner_query = $wpdb->escape($_GET['owner']);//owner search keyword

	// Is this WP search or BT search?
	if ( $type == 'bt' )
	{
		get_header();
		$page = (empty($_GET['page'])) ? '' : $wpdb->escape($_GET['page']); // sp = search page
		if ( !$page ) $page = 1;
?>
<div class="content-box clear" >
	<div class="content">
<?php
		// Search by title or by owner?
		if ( isset($_GET['title']) ) {
			do_action('get_bt_search_by_title',$title_query,$page);
		} elseif ( isset($_GET['owner']) ) {
			do_action('get_bt_search_by_owner', $owner_query, $page);
		}
		?>
	</div><!--content-->
</div><!--content-box-->
<?php  get_footer(); 
	} elseif ( $type == 'wp' ) {
		// Show WP's search result
		$bg_url = get_bloginfo('wpurl');
		header("Location: $bg_url/?s=$title_query");// use title query as wordpress search keyword
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
