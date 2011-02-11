<?php
$themename = 'iDewdrop 2';
$shortname = 'ide2';

$options = array(
	array(
		"name" => __('Front-page column 1'),
		"desc" => __(''),
		"id" => $shortname."_fgcol1",
		"std" => __(""),
		"type" => "textarea",
		"options" => array(
			"rows" => "12",
			"cols" => "100") ),
	array(
		"name" => __('Front-page column 2'),
		"desc" => __(''),
		"id" => $shortname."_fgcol2",
		"std" => __(""),
		"type" => "textarea",
		"options" => array(
			"rows" => "12",
			"cols" => "100") ),
	array(
		"name" => __('Front-page column 3'),
		"desc" => __('#Currently no use'),
		"id" => $shortname."_fgcol3",
		"std" => __(""),
		"type" => "textarea",
		"options" => array(
			"rows" => "12",
			"cols" => "100") ),
	array(
		"name" => __('Footer column 1'),
		"desc" => __('Suggest: &lt;h3&gt; followed by &lt;ul&gt;. ex. &lt;h3&gt;Title&lt;/h3&gt;&lt;ul&gt;&lt;li&gt;item1&lt;/li&gt;&lt;li&gt;item2&lt;/li&gt;&lt;/ul&gt;'),
		"id" => $shortname."_fcol1",
		"std" => __(""),
		"type" => "textarea",
		"options" => array(
			"rows" => "12",
			"cols" => "100") ),
	array(
		"name" => __('Footer column 2'),
		"desc" => __(''),
		"id" => $shortname."_fcol2",
		"std" => __(""),
		"type" => "textarea",
		"options" => array(
			"rows" => "12",
			"cols" => "100") ),
	array(
		"name" => __('Footer column 3'),
		"desc" => __(''),
		"id" => $shortname."_fcol3",
		"std" => __(""),
		"type" => "textarea",
		"options" => array(
			"rows" => "12",
			"cols" => "100") ),
	array(
		"name" => __('Footer column 4'),
		"desc" => __(''),
		"id" => $shortname."_fcol4",
		"std" => __(""),
		"type" => "textarea",
		"options" => array(
			"rows" => "12",
			"cols" => "100") ),
);

$fcontent = array(
	array(
		"name" => __('Featured Slide 1'),
		"desc" => __(''),
		"id" => $shortname."_fslide1",
		"std" => __(""),
		"type" => "textarea",
		"options" => array(
			"rows" => "12",
			"cols" => "100") ),
	array(
		"name" => __('Featured Slide 2'),
		"desc" => __(''),
		"id" => $shortname."_fslide2",
		"std" => __(""),
		"type" => "textarea",
		"options" => array(
			"rows" => "12",
			"cols" => "100") ),
	array(
		"name" => __('Featured Slide 3'),
		"desc" => __(''),
		"id" => $shortname."_fslide3",
		"std" => __(""),
		"type" => "textarea",
		"options" => array(
			"rows" => "12",
			"cols" => "100") ),
	array(
		"name" => __('Featured Slide 4'),
		"desc" => __(''),
		"id" => $shortname."_fslide4",
		"std" => __(""),
		"type" => "textarea",
		"options" => array(
			"rows" => "12",
			"cols" => "100") ),
	array(
		"name" => __('Featured Slide 5'),
		"desc" => __(''),
		"id" => $shortname."_fslide5",
		"std" => __(""),
		"type" => "textarea",
		"options" => array(
			"rows" => "12",
			"cols" => "100") ),
	array(
		"name" => __('Featured Slide 6'),
		"desc" => __(''),
		"id" => $shortname."_fslide6",
		"std" => __(""),
		"type" => "textarea",
		"options" => array(
			"rows" => "12",
			"cols" => "100") ),
);

function ide2_add_admin()
{
	global $themename, $shortname, $options, $fcontent;
	if ( isset($_GET['page']) && $_GET['page'] == 'ide2-options' )
	{
		if ( isset($_REQUEST['action']) && $_REQUEST['action'] == 'save' )
		{
			foreach ($options as $value)
			{
				update_option( $value['id'], $_REQUEST[ $value['id'] ] );
			}
			foreach ($options as $value)
			{
				if( isset( $_REQUEST[ $value['id'] ] ) )
				{
					update_option( $value['id'], $_REQUEST[ $value['id'] ]  );
				} else {
					delete_option( $value['id'] );
				}
			}
			header("Location: themes.php?page=ide2-options&saved=true");
			die;
		} elseif ( isset($_REQUEST['action']) && $_REQUEST['action'] == 'reset' ) {
			foreach ($options as $value)
			{
				delete_option( $value['id'] );
			}
			header("Location: themes.php?page=ide2-options&reset=true");
			die;
		} elseif ( isset($_REQUEST['action']) && $_REQUEST['action'] == 'reset_widgets' ) {
			$null = null;
			update_option('sidebars_widgets',$null);
			header("Location: themes.php?page=ide2-options&reset=true");
			die;
		}
	} elseif ( isset($_GET['page']) && $_GET['page'] == 'ide2-fcontent' ) {
		if ( isset($_REQUEST['action']) && $_REQUEST['action'] == 'save' )
		{
			foreach ($fcontent as $value)
			{
				update_option( $value['id'], $_REQUEST[ $value['id'] ] );
			}
			foreach ($fcontent as $value)
			{
				if( isset( $_REQUEST[ $value['id'] ] ) )
				{
					update_option( $value['id'], $_REQUEST[ $value['id'] ]  );
				} else {
					delete_option( $value['id'] );
				}
			}
			header("Location: themes.php?page=ide2-fcontent&saved=true");
			die;
		} elseif ( isset($_REQUEST['action']) && $_REQUEST['action'] == 'reset' ) {
			foreach ($fcontent as $value)
			{
				delete_option( $value['id'] );
			}
			header("Location: themes.php?page=ide2-fcontent&reset=true");
			die;
		} elseif ( isset($_REQUEST['action']) && $_REQUEST['action'] == 'reset_widgets' ) {
			$null = null;
			update_option('sidebars_widgets',$null);
			header("Location: themes.php?page=ide2-fcontent&reset=true");
			die;
		}
	}
        add_theme_page($themename." 設定", "ide2 設定", 'edit_themes', 'ide2-options', 'ide2_options_admin');
        add_theme_page($themename." Featured Content", "Featured Content", 'edit_themes', 'ide2-fcontent', 'ide2_fcontent_admin');
}

function ide2_options_admin()
{
	global $options;
	// Wrapper function for handling the ordinate ide2 Options Admin Page
	ide2_admin_generator($options);
}

function ide2_fcontent_admin()
{
	global $fcontent;
	// Wrapper function for handling Featured Content Admin Page
	ide2_admin_generator($fcontent);
}

function ide2_admin_generator($options_to_generate)
{
	// This function renders the actual admin page based on $options_to_generate
	global $themename, $shortname;
	if ( isset($_REQUEST['saved']) && $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' '.__('settings saved.','thematic').'</strong></p></div>';
	if ( isset($_REQUEST['reset']) && $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' '.__('settings reset.','thematic').'</strong></p></div>';
	if ( isset($_REQUEST['reset_widgets']) && $_REQUEST['reset_widgets'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' '.__('widgets reset.','thematic').'</strong></p></div>';
?>
<div class="wrap">
	<?php if ( function_exists('screen_icon') ) screen_icon(); ?>
	<h2><?php echo $themename; ?> 設定</h2>
	<form method="post" action="">
		<table class="form-table">
		<?php foreach ($options_to_generate as $value) {
			switch ( $value['type'] )
			{
				case 'text': ?>
		<tr valign="top">
			<th scope="row"><label for="<?php echo $value['id']; ?>"><?php echo __($value['name'],'thematic'); ?></label></th>
			<td>
				<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_option( $value['id'] ) != "") { echo get_option( $value['id'] ); } else { echo $value['std']; } ?>" />
				<?php echo __($value['desc'],'thematic'); ?>
			</td>
		</tr>
	<?php				break;

				case 'textarea':
							$ta_options = $value['options']; ?>
		<tr valign="top">
			<th scope="row"><label for="<?php echo $value['id']; ?>"><?php echo __($value['name'],'thematic'); ?></label></th>
			<td><textarea name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" cols="<?php echo $ta_options['cols']; ?>" rows="<?php echo $ta_options['rows']; ?>"><?php
			if ( get_option($value['id']) != '')
			{
				echo __(stripslashes(get_option($value['id'])),'thematic');
			} else {
				echo __($value['std'],'thematic');
			} ?></textarea><br />
			<?php echo __($value['desc'],'thematic'); ?>
			</td>
		</tr>
		<?php			break;
				case 'nothing':
						$ta_options = $value['options']; ?>
		</table>
			<?php echo __($value['desc'],'thematic'); ?>
		<table class="form-table">
		<?php			break;
				case 'radio': ?>
		<tr valign="top">
			<th scope="row"><?php echo __($value['name'],'thematic'); ?></th>
			<td>
			<?php foreach ( $value['options'] as $key=>$option )
				{
					$radio_setting = get_option($value['id']);
					if ( $radio_setting != '' )
					{
						if ($key == get_option($value['id']) )
						{
							$checked = 'checked="checked"';
						} else {
							$checked = '';
						}
				} else {
					if ( $key == $value['std'] )
					{
						$checked = 'checked="checked"';
					} else {
						$checked = '';
					}
				} ?>
				<input type="radio" name="<?php echo $value['id']; ?>" id="<?php echo $value['id'] . $key; ?>" value="<?php echo $key; ?>" <?php echo $checked; ?> />
				<label for="<?php echo $value['id'] . $key; ?>"><?php echo $option; ?></label><br />
				<?php } ?>
			</td>
		</tr>
		<?php			break;
				case 'checkbox': ?>
		<tr valign="top">
			<th scope="row"><?php echo __($value['name'],'thematic'); ?></th>
			<td>
				<?php
					if ( get_option($value['id']) )
					{
						$checked = 'checked="checked"';
					} else {
						$checked = '';
					}
				?>
				<input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
				<label for="<?php echo $value['id']; ?>"><?php echo __($value['desc'],'thematic'); ?></label>
			</td>
		</tr>
		<?php			break;
				default:
					break;
			}
		}
?>

	</table>

	<p class="submit">
		<input name="save" type="submit" value="<?php _e('Save changes','thematic'); ?>" />
		<input type="hidden" name="action" value="save" />
	</p>
</form>
<form method="post" action="">
	<p class="submit">
		<input type="hidden" name="action" value="reset" />
	</p>
</form>
</div>
<?php
}

?>
