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
		<form method="get" id="searchform" action="<?php bloginfo('url')?>/search">
			<label id="type">搜尋目標
				<select name="type" tabindex="3">
					<option value="bt">公告</option>
					<option value="wp">文章</option>
				</select>
			</label>
			<div id="inserthere"></div>
			<input type="submit" id="searchsubmit" value="搜尋" tabindex="2" />
		</form>
	<script type="text/javascript">
	function check_search_type() {
		$('div#inserthere').empty();
		if ( $('select option:selected:last').val() == 'bt' ) {
			$('div#inserthere').append('<label>公告標題<input type="text" value="<?php the_search_query(); ?>" name="title" id="s" tabindex="1" /></label><label>公告單位<input type="text" value="" name="owner" id="o" tabindex="2" /></label><p>輸入一個條件即可，不會同時檢查兩個條件</p>');
		} else if ( $('select option:selected:last').val() == 'wp' ) {
			$('div#inserthere').append('<label>文章關鍵字<input type="text" value="" name="post" id="p" tabindex="1" /></label>');
		}
	}
	check_search_type();
	$('select[name="type"]').change(function () {
		check_search_type(); });
		</script>
	</div><!--content-->
</div><!--content-box-->
<?php get_footer();
} ?>
