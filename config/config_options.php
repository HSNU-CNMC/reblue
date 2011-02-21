<?php
/*
 * This file contains all options for '主題選項'
 */

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
