<?php
/*
 * This file contains all options for '主題選項'
 */

function get_option_array()
{
	$options = array(
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
			'other_meta' => array(
				'default' => '',
				'type' => 'textarea_big',
				'inputlabel' => '完整的 HTML &lt;meta&gt; 標籤（可以有多個）',
				'title' => '其他 &lt;meta&gt; 標籤',
				'shortexp' => '以後與 Facebook 整合的時候應該會用到',
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
