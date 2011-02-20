<?php
/*
 * This file handles AJAX calls for slides
 */
add_action('wp_ajax_rb_getslides', 'ajax_slide');
add_action('wp_ajax_nopriv_rb_getslides', 'ajax_slide');

function ajax_slide()
{
	echo stripslashes(json_encode(pagelines('features')));	
}

?>
