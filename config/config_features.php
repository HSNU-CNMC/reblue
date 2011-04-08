<?php

function get_feature_array()
{	
	return array(
		'feature_settings' => array(
			'timeout' => array(
					'default' => 0,
					'type' => 'text_small',
					'inputlabel' => 'Timeout (ms)',
					'title' => '每張 Slide 的顯示時間（毫秒）',
					'shortexp' => '',
					'exp' => '如果設成0，Slide 就不會自動輪換，1000毫秒=1秒'
				),
			'fspeed' => array(
					'default' => 1500,
					'type' => 'text_small',
					'inputlabel' => '轉換時間（毫秒）',
					'title' => '轉換動畫持續多久？',
					'shortexp' => '',
					'exp' => '',
				),
			'feffect' => array(
					'default' => 'fade',
					'type' => 'select_same',
					'selectvalues' => array('blindX','blindY','blindZ', 'cover','curtainX','curtainY','fade','fadeZoom','growX','growY','none','scrollUp','scrollDown','scrollLeft','scrollRight','scrollHorz','scrollVert','shuffle','slideX','slideY','toss','turnUp','turnDown','turnLeft','turnRight','uncover','wipe','zoom'),
					'inputlabel' => '轉換動畫效果',
					'title' => '轉換動畫效果',
					'shortexp' => '',
					'exp' => ''
				),
			'fremovesync' => array(
					'default' => false,
					'type' => 'check',
					'inputlabel' => 'Remove Transition Syncing',
					'title' => 'Remove Feature Transition Syncing',
					'shortexp' => "Make features wait to move on until after the previous one has cleared the screen",
					'exp' => "This controls whether features can move on to the screen while another is transitioning off. If removed features will have to leave the screen before the next can transition on to it."
			)
						
		)
	); 
		
}

function get_feature_setup()
{
	return array(
		'image' => array(
			'title' => '大圖片',
			'shortexp' => '就是會輪換的大圖片，圖片大小為 970*390 pixel',
			'exp' => '',
			'inputlabel' => '',
			'type' => 'image_url',
		),
		'text' => array(
			'title' => '文字',
			'shortexp'=> '文字、超連結與 HTML 標籤',
			'exp' => '',
			'inputlabel' => '',
			'type' => 'textarea_big'
		),
		'textboxwidth' => array(
			'title' => '半透明文字框的寬度',
			'shortexp' => '文字框會靠左對齊',
			'exp' => '以<strong>像素</strong>為單位, 可設為 auto',
			'inputlabel' => '',
			'type' => 'text_small'
		),
		'name' => array(
			'title' => '名稱（可留空）',
			'shortexp'=> '這樣找起來比較容易',
			'exp' => 'This just allows you to change the name of the feature in the menu navigation. It may be used for more features in the future.',
			'inputlabel' => '名稱',
			'type' => 'text'
		),
		'draft' => array(
			'title' => '草稿',
			'shortexp' => '還在打草稿嗎？',
			'exp' => '如果打勾的話，只有在後臺才看得到',
			'inputlabel' => '標示為草稿',
			'type' => 'check'
		),
	);
}

function get_default_features()
{
	return array(
		'1' => array(
	        	'title' => '<h1 class="ftitle">10% Donated</h1><h3 class="fsub">to the environment</h3>',
	        	'text' => '<p>Buy Reblue and we will donate 10% to help save the environment.</p>',
	        	'media' => '<img src="" alt="feature1" />',
	        	'link' => '#',
			'name'=>'Feature 1',
	   	),
		'2' => array(
	        	'title' => '<h3 class="fsub">Make An</h3><h1 class="ftitle">Impression</h1>',
	        	'text' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam quis molestie nunc. Vivamus.</p>',
	        	'media' => '',
	        	'link' => '#',
			'name'=>'Feature 2'
	    	),
		'3' => array(
			'title' => '<h3 class="fsub">Wordpress Theme By</h3><h1 class="ftitle">PageLines</h1>',
	        	'text' => '<p>Welcome to a professional WordPress theme by PageLines. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>',
	        	'media' => '<img src="feature3.png" />',
	        	'link' => '',
			'name'=>'Feature 3'
		),
		'4' => array(
	        	'title' => '',
	        	'text' => '',
	        	'media' => '',
	        	'link' => '',
			'name'=>'Feature 4'
		),
		'5' => array(
	        	'title' => '',
	        	'text' => '',
	        	'media' => '',
	        	'link' => '',
			'name'=>'Feature 5'
		),
		'6' => array(
	        	'title' => '',
	        	'text' => '',
	        	'media' => '',
	        	'link' => '',
			'name'=>'Feature 6'
		)
	);
}

function get_fbox_setup()
{
	$rb_fbox = array(	
		'title' => array(
			'title' => '標題',
			'shortexp'=> '首頁欄位的標題',
			'exp' => '不可包含 HTML',
			'inputlabel' => '欄位標題',
			'type' => 'text_small'
			),
		'text' => array(
			'title' => '段落文字',
			'shortexp' => "The text inside of your footer text boxes",
			'exp' => "Set the text for your feature boxes. Use HTML markup including image tags for pictures.<br/><br/>For example:<br/> <strong>&lt;img src='image_url.com' alt='alt text' /&gt;</strong>",
			'inputlabel' => 'Feature box text and html',
			'type' => 'textarea_big'
			),
		'name' => array(
			'title' => "Name (optional)",
			'shortexp' => "The name of this feature box for reference",
			'exp' => "Simply add a name for this box so you can navigate to it quickly.",
			'inputlabel' => 'Name',
			'type' => 'text'
			)
		);

	if ( has_action('get_newmsg') )
	{
		$bt_fbox = array(
			'bt_category' => array(
				'title' => '公告分類',
				'shortexp' => '要在這個欄位顯示哪一個分類的公告呢？',
				'exp' => '請輸入分類 ID ，如果留空的話將會顯示「段落文字」，如果輸入 all 的話會顯示全部分類的',
				'inputlabel' => '分類 ID （正整數）/ all',
				'type' => 'text_small'
			),
			'bt_amount' => array(
				'title' => '顯示數量',
				'shortexp' => '要顯示幾條公告呢？',
				'exp' => '顯示最新的 n 條公告',
				'inputlabel' => '正整數 n',
				'type' => 'text_small'
			),
			'bt_more' => array(
				'title' => '「更多」連結',
				'shortexp' => '控制「更多」按鈕要連到哪裡去',
				'exp' => '留空的話就不會顯示「更多」連結',
				'inputlabel' => 'URL',
				'type' => 'text'
			),
		);

		return array_merge($rb_fbox, $bt_fbox);
	} else {
		return $rb_fbox;
	}
}

function get_default_fboxes()
{
	return array(
		'1' => array(
	        	'title' => '<h3>You\'ll love this theme</h3>',
	        	'text' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In et nulla diam, ac interdum nisl. Nunc mattis tincidunt dictum. Etiam luctus consequat ipsum.</p>', 
			'name' => 'Feature Box 1',
	 	),
		'2' => array(
	        	'title' => '<h3>PageLines Themes</h3>',
	        	'text' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In et nulla diam, ac interdum nisl. Nunc mattis tincidunt dictum. Etiam luctus consequat ipsum.</p>',
			'name' => 'Feature Box 2',
	    	),
		'3' => array(
	        	'title' => '<h3>Thanks!</h3>',
	        	'text' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In et nulla diam, ac interdum nisl. Nunc mattis tincidunt dictum. Etiam luctus consequat ipsum.</p>',
			'name' => 'Feature Box 3',
	    	)
	);
}

?>
