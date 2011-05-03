<?php
/*
 * This file contains all options for '主題選項'
 */

function get_option_array()
{
	$options = array(
		'footer_options' => array(
			'inside_contact_info' => array(
				'default' => 'Made by CNMC',
				'type' => 'textarea_big',
				'inputlabel' => '文字或 HTML',
				'title' => '頁尾的訊息',
				'shortexp' => '版權與聯絡訊息',
				'exp' => ''
			)
		),
		'global_options' => array(
			'custom_header' => array(
				'default' => get_bloginfo('template_directory') . '/img/banner.png',
				'type' => 'image_url',
				'inputlabel' => '',
				'title' => '頁首橫幅',
				'shortexp' => '圖片大小 1000*150 px',
				'exp' => ''
			),
			'custom_bg' => array(
				'default' => get_bloginfo('template_directory') . '/img/wood.jpg',
				'type' => 'image_url',
				'inputlabel' => '',
				'title' => '背景圖片',
				'shortexp' => '會 repeat',
				'exp' => ''
			),
			'fb_script' => array(
				'default' => '',
				'type' => 'textarea_big',
				'inputlabel' => 'Facebook 提供給你的「讚」按鈕原始碼，應該是 &lt;script&gt;',
				'title' => 'Facebook 「讚」按鈕原始碼',
				'shortexp' => '我只用 Javascript 版本測試過喔',
				'exp' => ''
			)
		),
		'SEO' => array(
			'description' => array(
				'default' => '',
				'type' => 'textarea',
				'inputlabel' => '段落',
				'title' => '給搜尋引擎看的網站描述',
				'shortexp' => '&lt;meta name=&quot;description&quot; content=&quot;...&quot;/&gt;',
				'exp' => '只有在首頁套用'
			),
			'keywords' => array(
				'default' => '',
				'type' => 'textarea',
				'inputlabel' => '關鍵字之間請用半形逗號 , 隔開',
				'title' => '給搜尋引擎看的網站關鍵字',
				'shortexp' => '&lt;meta name=&quot;keywords&quot; content=&quot;...&quot;/&gt;',
				'exp' => '只有在首頁套用'
			),
			'fb_meta' => array(
				'default' => '',
				'type' => 'textarea_big',
				'inputlabel' => 'Facebook 提供給你的 Open Graph Tags',
				'title' => 'Facebook 「讚」',
				'shortexp' => '與 Facebook 整合的時候應該會用到',
				'exp' => ''
			)
		),
		'analytics' => array(
			'analytics_script' => array(
				'default' => '',
				'type' => 'textarea_big',
				'inputlabel' => 'HTML &lt;script&gt;',
				'title' => '分析',
				'shortexp' => 'Google Analytics',
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

	$options['footer_options'] = array_merge($options['footer_options'], $footer_col);
	return $options;
}

?>
