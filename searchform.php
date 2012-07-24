<form method="get" id="searchform" action="<?php bloginfo('url')?>/search">
	<label id="type">搜尋目標
		<select name="type" tabindex="3">
			<option value="bt">公告</option>
			<option value="wp">文章</option>
		</select>
	</label>
	<div id="inserthere"></div>
	<input type="submit" id="searchsubmit" value="搜尋" tabindex="2" />
</form>
<script>
function check_search_type() {
	$('div#inserthere').empty();
	if ( $('select option:selected').val() == 'bt' ) {
		$('div#inserthere').append('<label>公告標題<input type="text" value="<?php the_search_query(); ?>" name="title" id="s" tabindex="1" /></label><label>公告單位<input type="text" value="" name="owner" id="o" tabindex="2" /></label><p>輸入一個條件即可，不會同時檢查兩個條件</p>');
	} else if ( $('select option:selected').val() == 'wp' ) {
		$('div#inserthere').append('<label>文章關鍵字<input type="text" value="" name="post" id="p" tabindex="1" /></label>');
	}
}
check_search_type();
$('select').change(function () {
	check_search_type(); });
</script>
