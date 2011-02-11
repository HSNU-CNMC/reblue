<?php
$themename = 'Reblue';
$shortname = 'rb';

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

function rb_add_admin()
{
	global $themename, $shortname, $options, $fcontent;
	if ( isset($_GET['page']) && $_GET['page'] == 'rb-options' )
	{
		if ( isset($_REQUEST['action']) && $_REQUEST['action'] == 'save' )
		{
			if ( BACKUP_OPTIONS )
			{
				foreach ($options as $value)
				{
					update_option( $value['id'].'bak', get_option($value['id']) );
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
				header("Location: themes.php?page=rb-options&saved=true");
				die;
			} else {
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
				header("Location: themes.php?page=rb-options&saved=true");
				die;
			}
		} elseif ( isset($_REQUEST['action']) && $_REQUEST['action'] == 'reset' ) {
			foreach ($options as $value)
			{
				delete_option( $value['id'] );
			}
			header("Location: themes.php?page=rb-options&reset=true");
			die;
		} elseif ( BACKUP_OPTIONS && isset($_REQUEST['action']) && $_REQUEST['action'] == 'revert' ) {
			foreach ( $options as $value )
			{
				$tmp = get_option($value['id'].'bak');
				update_option($value['id'].'bak', get_option($value['id']));
				update_option($value['id'], $tmp);
			}
			header("Location: themes.php?page=rb-options&reverted=true");
			die;
		}
	} elseif ( isset($_GET['page']) && $_GET['page'] == 'rb-fcontent' ) {
		if ( isset($_REQUEST['action']) && $_REQUEST['action'] == 'save' )
		{
			if ( BACKUP_OPTIONS )
			{
				foreach ($fcontent as $value)
				{
					update_option( $value['id'].'bak', get_option($value['id']) );
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
				header("Location: themes.php?page=rb-fcontent&saved=true");
				die;
			} else {
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
				header("Location: themes.php?page=rb-fcontent&saved=true");
				die;
			}
		} elseif ( isset($_REQUEST['action']) && $_REQUEST['action'] == 'reset' ) {
			foreach ($fcontent as $value)
			{
				delete_option( $value['id'] );
			}
			header("Location: themes.php?page=rb-fcontent&reset=true");
			die;
		} elseif ( BACKUP_OPTIONS && isset($_REQUEST['action']) && $_REQUEST['action'] == 'revert' ) {
			foreach ( $options as $value )
			{
				$tmp = get_option($value['id'].'bak');
				update_option($value['id'].'bak', get_option($value['id']));
				update_option($value['id'], $tmp);
			}
			header("Location: themes.php?page=rb-options&reverted=true");
			die;
		}
	}
        add_theme_page($themename." 設定", "Reblue 設定", 'edit_themes', 'rb-options', 'rb_options_admin');
        add_theme_page($themename." 特色內容", "特色內容", 'edit_themes', 'rb-fcontent', 'rb_fcontent_admin');
}

function rb_options_admin()
{
	global $options;
	// Wrapper function for handling the ordinate Reblue Options Admin Page
	rb_admin_generator($options);
}

function rb_fcontent_admin()
{
	global $fcontent;
	// Wrapper function for handling Featured Content Admin Page
	rb_admin_generator($fcontent);
}

function rb_admin_generator($options_to_generate)
{
	// This function renders the actual admin page based on $options_to_generate
	global $themename, $shortname;
	if ( isset($_REQUEST['saved']) && $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>已儲存</strong></p></div>';
	if ( isset($_REQUEST['reset']) && $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>已重設</strong></p></div>';
	if ( isset($_REQUEST['reverted']) && $_REQUEST['reverted'] ) echo '<div id="message" class="updated fade"><p><strong>已回復</strong></p></div>';
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
			<th scope="row"><label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label></th>
			<td>
				<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_option( $value['id'] ) != "") { echo get_option( $value['id'] ); } else { echo $value['std']; } ?>" />
				<?php echo $value['desc']; ?>
			</td>
		</tr>
	<?php				break;

				case 'textarea':
							$ta_options = $value['options']; ?>
		<tr valign="top">
			<th scope="row"><label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label></th>
			<td><textarea name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" cols="<?php echo $ta_options['cols']; ?>" rows="<?php echo $ta_options['rows']; ?>"><?php
			if ( get_option($value['id']) != '')
			{
				echo stripslashes(get_option($value['id']));
			} else {
				echo $value['std'];
			} ?></textarea><br />
			<?php echo $value['desc']; ?>
			</td>
		</tr>
		<?php			break;
				case 'nothing':
						$ta_options = $value['options']; ?>
		</table>
			<?php echo $value['desc']; ?>
		<table class="form-table">
		<?php			break;
				case 'radio': ?>
		<tr valign="top">
			<th scope="row"><?php echo $value['name']; ?></th>
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
			<th scope="row"><?php echo $value['name']; ?></th>
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
				<label for="<?php echo $value['id']; ?>"><?php echo $value['desc']; ?></label>
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
	<select name="action">
		<option value="save">儲存</option>
		<option value="revert">回復</option>
	</select>
	<input name="save" type="submit" value="送出" />
	</p>
</form>
</div>
<?php
}

?>
