<?php
/**
 * Initialize the options before anything else.
 */
add_action( 'admin_init', 'custom_theme_options', 1 );

/**
 * Build the custom settings & update OptionTree.
 */
function custom_theme_options() {
  /**
   * Get a copy of the saved settings array. 
   */
  $saved_settings = get_option( 'option_tree_settings', array() );
  
  /**
   * Custom settings array that will eventually be 
   * passes to the OptionTree Settings API Class.
   */
  $custom_settings = array( 
    'sections'        => array( 
      array(
        'id'          => 'general_default',
        'title'       => '全域設定'
      ),
      array(
        'id'          => 'seo',
        'title'       => 'SEO'
      ),
      array(
        'id'          => 'footer',
        'title'       => '頁尾'
      ),
      array(
        'id'          => 'feature_settings',
        'title'       => '特色內容'
      ),
      array(
        'id'          => 'content',
        'title'       => '自定內容'
      )
    ),
    'settings'        => array( 
      array(
        'id'          => 'global_banner',
        'label'       => '頁首橫幅',
        'desc'        => '圖片大小 1000*150 px',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'general_default',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'global_bg',
        'label'       => '背景圖片',
        'desc'        => '會 repeat',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'general_default',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'seo_desc',
        'label'       => '給搜尋引擎看的網站描述',
        'desc'        => '&lt;meta name=&quot;description&quot; content=&quot;...&quot;/&gt;
只有在首頁套用',
        'std'         => '',
        'type'        => 'textarea',
        'section'     => 'seo',
        'rows'        => '4',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'seo_keyword',
        'label'       => '給搜尋引擎看的網站關鍵字',
        'desc'        => '&lt;meta name=&quot;keywords&quot; content=&quot;...&quot;/&gt;
關鍵字之間請用半形逗號 , 隔開
只有在首頁套用',
        'std'         => '',
        'type'        => 'textarea',
        'section'     => 'seo',
        'rows'        => '4',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'seo_analytics',
        'label'       => 'Analytics',
        'desc'        => 'HTML &amp;lt;script&amp;gt;',
        'std'         => '',
        'type'        => 'textarea',
        'section'     => 'seo',
        'rows'        => '10',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'footer_contact',
        'label'       => '頁尾的訊息',
        'desc'        => '版權與聯絡訊息，文字或 HTML',
        'std'         => '',
        'type'        => 'textarea',
        'section'     => 'footer',
        'rows'        => '10',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'footer_column_1',
        'label'       => '頁尾第1欄',
        'desc'        => '',
        'std'         => '',
        'type'        => 'textarea',
        'section'     => 'footer',
        'rows'        => '12',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'footer_column_2',
        'label'       => '頁尾第2欄',
        'desc'        => '建議使用 &amp;lt;ul&amp;gt;',
        'std'         => '',
        'type'        => 'textarea',
        'section'     => 'footer',
        'rows'        => '12',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'footer_column_3',
        'label'       => '頁尾第3欄',
        'desc'        => '建議使用 &amp;lt;ul&amp;gt;',
        'std'         => '',
        'type'        => 'textarea',
        'section'     => 'footer',
        'rows'        => '12',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'slide_timeout',
        'label'       => '每張 Slide 的顯示時間（毫秒）',
        'desc'        => '如果設成0，Slide 就不會自動輪換，1000毫秒=1秒',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'feature_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'slide_transition_time',
        'label'       => '轉換動畫持續多久？',
        'desc'        => '轉換時間（毫秒）',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'feature_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'slide_effect',
        'label'       => '轉換動畫效果',
        'desc'        => '',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'feature_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'blindX',
            'label'       => 'blindX',
            'src'         => ''
          ),
          array(
            'value'       => 'blindY',
            'label'       => 'blindY',
            'src'         => ''
          ),
          array(
            'value'       => 'blindZ',
            'label'       => 'blindZ',
            'src'         => ''
          ),
          array(
            'value'       => 'cover',
            'label'       => 'cover',
            'src'         => ''
          ),
          array(
            'value'       => 'curtainX',
            'label'       => 'curtainX',
            'src'         => ''
          ),
          array(
            'value'       => 'curtianY',
            'label'       => 'curtianY',
            'src'         => ''
          ),
          array(
            'value'       => 'fade',
            'label'       => 'fade',
            'src'         => ''
          ),
          array(
            'value'       => 'fadeZoom',
            'label'       => 'fadeZoom',
            'src'         => ''
          ),
          array(
            'value'       => 'growX',
            'label'       => 'growX',
            'src'         => ''
          ),
          array(
            'value'       => 'growY',
            'label'       => 'growY',
            'src'         => ''
          ),
          array(
            'value'       => 'none',
            'label'       => 'none',
            'src'         => ''
          ),
          array(
            'value'       => 'scrollDown',
            'label'       => 'scrollDown',
            'src'         => ''
          ),
          array(
            'value'       => 'scrollUp',
            'label'       => 'scrollUp',
            'src'         => ''
          ),
          array(
            'value'       => 'scrollLeft',
            'label'       => 'scrollLeft',
            'src'         => ''
          ),
          array(
            'value'       => 'scrollRight',
            'label'       => 'scrollRight',
            'src'         => ''
          ),
          array(
            'value'       => 'scrollHorz',
            'label'       => 'scrollHorz',
            'src'         => ''
          ),
          array(
            'value'       => 'scrollVert',
            'label'       => 'scrollVert',
            'src'         => ''
          ),
          array(
            'value'       => 'shuffle',
            'label'       => 'shuffle',
            'src'         => ''
          ),
          array(
            'value'       => 'slideX',
            'label'       => 'slideX',
            'src'         => ''
          ),
          array(
            'value'       => 'slideY',
            'label'       => 'slideY',
            'src'         => ''
          ),
          array(
            'value'       => 'toss',
            'label'       => 'toss',
            'src'         => ''
          ),
          array(
            'value'       => 'turnUp',
            'label'       => 'turnUp',
            'src'         => ''
          ),
          array(
            'value'       => 'turnDown',
            'label'       => 'turnDown',
            'src'         => ''
          ),
          array(
            'value'       => 'turnLeft',
            'label'       => 'turnLeft',
            'src'         => ''
          ),
          array(
            'value'       => 'turnRight',
            'label'       => 'turnRight',
            'src'         => ''
          ),
          array(
            'value'       => 'uncover',
            'label'       => 'uncover',
            'src'         => ''
          ),
          array(
            'value'       => 'wipe',
            'label'       => 'wipe',
            'src'         => ''
          ),
          array(
            'value'       => 'zoom',
            'label'       => 'zoom',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'slides',
        'label'       => '圖片',
        'desc'        => '圖片大小 970*388 px',
        'std'         => '',
        'type'        => 'slider',
        'section'     => 'content',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'btcol',
        'label'       => '公告欄位',
        'desc'        => '',
        'std'         => '',
        'type'        => 'slider',
        'section'     => 'content',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      )
    )
  );
  
  /* allow settings to be filtered before saving */
  $custom_settings = apply_filters( 'option_tree_settings_args', $custom_settings );
  
  /* settings are not the same update the DB */
  if ( $saved_settings !== $custom_settings ) {
    update_option( 'option_tree_settings', $custom_settings ); 
  }
  
}
