<form method="get" id="searchform" action="<?php bloginfo('url')?>/search">
	<div>
		<label class="screen-reader-text" for="s">搜尋</label>
		<input type="text" value="<?php the_search_query(); ?>" name="sq" id="s" tabindex="1" />
		<select name="st" tabindex="3">
			<option value="bt">公告</option>
			<option value="wp">文章</option>
		</select>
		<input type="submit" id="searchsubmit" value="搜尋" tabindex="2" />
	</div>
</form>
