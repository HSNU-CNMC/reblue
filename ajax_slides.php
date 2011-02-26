<?php
/*
 * This file handles AJAX calls for slides
 */
add_action('wp_ajax_rb_getslides', 'ajax_slide');
add_action('wp_ajax_nopriv_rb_getslides', 'ajax_slide');

function ajax_slide()
{
	// Under certain conditions pagelines('features') will return a non-associative array, 
	// but json_encode will output non-associative array as array, this will be tricky 
	// for front-end javascript to handle. So I added JSON_FORCE_OBJECT to make 
	// json_encode always return an object.
	// http://tw2.php.net/manual/en/function.json-encode.php
	echo stripslashes(json_encode(pagelines('features'), JSON_FORCE_OBJECT));	
}

?>
