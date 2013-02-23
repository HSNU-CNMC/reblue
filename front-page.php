<?php get_header(); ?>
<div class="fcontent-box" >
		<div class="fcontent">
			<?php wp_nav_menu(  array( 'menu' => 'hsnu-menu', 'container' => '', 'menu_class' => 'clear menu fg-bt-menu' ) ); ?>
			<?php if ( function_exists( 'meteor_slideshow' ) ) { meteor_slideshow(); } ?>
			<div class="mg-col text">
				<ul id="fgcol-nav">
<?php
$fboxes = pagelines('fboxes');
$i=1;
foreach ( $fboxes as $fbox ) {
	echo '<li><a ';
	if ( $i == 1 ) echo 'class="curnav" ';
	echo 'href="#tab'.$i.'">'.$fbox['title'].'</a></li>';
	$i++;
}
?>
				</ul>
				<div id="fgcol-tab" class="fgcol">
<?php
$i=1;
foreach ( $fboxes as $fbox ) {
	echo '<div id="tab'.$i.'" ';
	if ( $i == 1 ) echo 'class="curtab"';
	echo '>';
	echo '<table id="newmsg">
		<colgroup><col id="newmsg_time"><col></colgroup>
		<tbody>';
	foreach ( get_newmsg($fbox['bt_amount'], $fbox['bt_category'], true) as $msg ) {
		if ( $msg->sticky ) {
			$user = get_user_by('login', $msg->msg_owner);
			echo '<tr><td>'.$user->display_name.'</td><td><a href="bulletin/?mid='.$msg->msg_id.'">'.$msg->msg_title.'</a></td></tr>';
		} else {
			echo '<tr><td>'.convert_timestamp($msg->msg_time).'</td><td><a href="bulletin/?mid='.$msg->msg_id.'">'.$msg->msg_title.'</a></td></tr>';
		}
	}
	echo '</tbody>
		</table>';
	if ( ! empty($fbox['bt_more']) ) echo '<p id="newmsg_time_more"><a href="' . $fbox['bt_more'] . '">更多</a></p>';
	echo '</div>';
	$i++;
}
?>
				</div>
				<noscript>
<?php
if ( has_action('get_newmsg') )
{
	foreach ( pagelines('fboxes') as $fbox )
	{
		echo '<div class="fgcol">';
		echo var_dump(get_newmsg($fbox['bt_amount'], $fbox['bt_category'], true));
		echo '</div>';
	}
} else {
	// Make Bulletaeon pluggable
	echo '<div class="fgcol">';
	echo '<h3>'.$fbox['title'].'</h3>';
	echo $fbox['text'];
	echo '</div>';
}
?>
				</noscript>
			</div><!--mg-col-->
		</div><!--fcontent-->
	</div><!--fcontent-box-->
	<?php get_footer(); ?>
</div><!--wrapper-->
<?php echo pagelines('analytics_script'); wp_footer(); ?>
</body>
</html>
