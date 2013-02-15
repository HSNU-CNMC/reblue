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
        'type'        => 'textarea_simple',
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
        'type'        => 'textarea_simple',
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
        'type'        => 'textarea_simple',
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
        'type'        => 'textarea_simple',
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
        'type'        => 'textarea_simple',
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
        'type'        => 'textarea_simple',
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
        'type'        => 'textarea_simple',
        'section'     => 'footer',
        'rows'        => '12',
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
