<?php

function get_option_array()
{
	$default_options = array(
		'front_page' => array(
			'contact_info' => array(
				'default' => 'Made by CNMC',
				'type' => 'textarea_big',
				'inputlabel' => '文字或 HTML',
				'title' => '首頁頁尾的訊息',
				'shortexp' => '版權與聯絡訊息',
				'exp' => ''
			)
		),
		'footer_options' => array(
			'inside_contact_info' => array(
				'default' => 'Made by CNMC',
				'type' => 'textarea_big',
				'inputlabel' => '文字或 HTML',
				'title' => '內頁頁尾的訊息',
				'shortexp' => '版權與聯絡訊息',
				'exp' => ''
			)
		),
	
		'global_options' => array(
			'colorscheme' => array(
					'version' => 'pro',
					'default' => 'green',
					'type' => 'radio',
					'selectvalues' => array(
						'green' => 'Green Color Scheme',
						'blue'=>'Blue Color Scheme',
						'black' => 'Black Color Scheme',
						'orange' => 'Orange Color Scheme',
						'red' => 'Red Color Scheme'
					),
					'title' => 'Theme Color Scheme',
					'shortexp' => 'Choose the color scheme for the theme',
					'exp' => ''
			),
			'twittername' => array(
					'default' => '',
					'type' => 'text',
					'inputlabel' => 'Your Twitter Username',
					'title' => 'Twitter Feed',
					'shortexp' => 'Places your Twitter feed in your site',
					'exp' => 'This places your Twitter feed on the site. Leave blank if you want to hide or not use.'
			),
			'no_wp_format' => array(
					'default' => false,
					'type' => 'check',
					'inputlabel' => 'Remove default WP formatting?',
					'title' => 'WordPress Auto-Formatting',
					'shortexp' => 'Prevent WordPress from adding "br" and "p" tags in content',
					'exp' => 'By default WordPress will attempt to add "br" and "p" tags in your content. If you feel more comfortable adding these elements in yourself, you can select this option.'
			),
			'google_ie' => array(
					'default' => false,
					'type' => 'check',
					'inputlabel' => 'Include Google IE Compatibility Script?',
					'title' => 'Google IE Compatibility Fix',
					'shortexp' => 'Include a Google JS script that fixes problems with IE.',
					'exp' => 'More info on this can be found here: <strong>http://code.google.com/p/ie7-js/</strong>.'
			),				
			'touchicon' => array(
				'version' => 'pro',
				'default' => '',
				'type' => 'image_url',
				'imagepreview' => '57',
				'title' => 'Apple Touch Image',						
				'shortexp' => 'Input Full URL to Apple touch image (.jpg, .gif, .png)',
				'exp' => 'Enter the full URL location of your Apple Touch Icon which is visible when ' .
						 'your users set your site as a <strong>webclip</strong> in Apple Iphone and ' . 
						 'Touch Products. It is an image approximately 57px by 57px in either .jpg, ' .
						 '.gif or .png format.'
			)
		),
		'custom_code' => array(
			'partner_link' => array(
					'default' => '',
					'type' => 'text',
					'inputlabel' => 'Enter Partner Link',
					'title' => 'PageLines Partner Link',
					'shortexp' => 'Change your PageLines footer link to a partner link',
					'exp' => 'If you are a <a href="http://www.pagelines.com/partners">PageLines Partner</a> enter your link here and the footer link will become a partner or affiliate link.'
				),
			'customcss' => array(
					'version' => 'pro',
					'default' => 'body{}',
					'type' => 'textarea',
					'layout' => 'full',
					'inputlabel' => 'CSS Rules',
					'title' => 'Custom CSS',
					'shortexp' => 'Insert custom CSS styling here (this will override any default styling)',
					'exp' => '<div class="theexample">Example:<br/> <strong>body{<br/> &nbsp;&nbsp;color:  #3399CC;<br/>&nbsp;&nbsp;line-height: 20px;<br/>&nbsp;&nbsp;font-size: 11px<br/>}</strong></div>Enter CSS Rules to change the style of your site.<br/><br/> A lot can be accomplished by simply changing the default styles of the "body" tag such as "line-height", "font-size", or "color" (as in text color).'
				),
			'headerscripts' => array(
					'version' => 'pro',
					'default' => '',
					'type' => 'textarea',
					'layout' => 'full',
					'inputlabel' => 'Headerscripts Code',
					'title' => 'Header Scripts',
					'shortexp' => 'Scripts inserted directly before the end of the HTML &lt;head&gt; tag',
					'exp' => ''
				),
			'footerscripts' => array(
					'default' => '',						
					'type' => 'textarea',
					'layout' => 'full',
					'inputlabel' => 'Footerscripts Code or Analytics',
					'title' => 'Footer Scripts &amp; Analytics',
					'shortexp' => 'Any footer scripts including Google Analytics',
					'exp' => ""
				),
			'asynch_analytics' => array(
					'version' => 'pro',
					'default' => '',						
					'type' => 'textarea',
					'layout' => 'full',
					'inputlabel' => 'Asynchronous Analytics',
					'title' => 'Asynchronous Analytics',
					'shortexp' => 'Placeholder for Google asynchronous analytics. Goes underneath "body" tag.',
					'exp' => ""
				),
			'hide_introduction' => array(
					'default' => '',
					'type' => 'check',
					'inputlabel' => '',
					'wp_option' => true,
					'inputlabel' => 'Hide the introduction?',
					'title' => 'Show Theme Introduction',
					'shortexp' => 'Uncheck this option to show theme introduction.',
					'exp' => ""
				)
		)
	);

	// Use loop to generate footer options
	$footer_col = array();
	for ( $i = 1;  $i <= 4; $i++ )
	{
		$footer_col['footer_col'.$i] = array(
			'default' => '',
			'type' => 'textarea_big',
			'inputlabel' => '文字或 HTML',
			'title' => '頁尾第'.$i.'欄',
			'shortexp' => '建議使用 &lt;ul&gt;',
			'exp' => ''
		);
	}

	$default_options['footer_options'] = array_merge($default_options['footer_options'], $footer_col);
	return $default_options;
}

?>
