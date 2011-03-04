<?php

	//Runs at the beginning of every admin page before the page is rendered
	add_action( 'admin_init', 'load_scripts' );
		function load_scripts(){
			if( isset($_GET['page']) && ($_GET['page'] == 'reblue' || $_GET['page'] == 'reblue_feature') )
			{
				wp_enqueue_script( 'jquery' );
				wp_enqueue_script( 'jquery-ui-core' );
				wp_enqueue_script( 'jquery-ui-tabs' );	
			}
		}


	//Runs in the HTML <head> section of the admin panel. 
	add_action( 'admin_head', 'load_head' );
	function load_head(){
					echo '<link rel="stylesheet" href="';
					echo bloginfo("template_directory") ;
					echo '/config/admin.css" type="text/css" media="screen" />';
	}
	
	// Load Top Level 
	add_action( 'admin_menu', 'load_panels' );
	function load_panels(){	
		//add_menu_page('Page title', 'Top-level menu title', 'administrator', 'my-top-level-handle', 'my_magic_function');
		add_object_page ('Page Title', THEMENAME, 'edit_theme_options','reblue', 'pagelines_theme_options');
	}
	
	// Theme Options
	add_action('admin_menu', 'add_option_interface');
	function add_option_interface() {
		//add_submenu_page(parent, page_title, menu_title, capability required, file/handle, [function]); 
		$reblue_options_page = add_submenu_page('reblue', '主題選項', '主題選項', 'edit_theme_options', 'reblue','pagelines_theme_options');
		$reblue_features_page = add_submenu_page('reblue', '特色內容', '特色內容', 'edit_theme_options', 'reblue_feature','pagelines_feature_options');
	}
	
	// Show Options Panel after activate  
	if (is_admin() && isset($_GET['activated'] ) && $pagenow == "themes.php" ) {

		//Do redirect
		header( 'Location: '.admin_url().'admin.php?page=reblue&pageaction=activated' ) ;

	}

	
?>
