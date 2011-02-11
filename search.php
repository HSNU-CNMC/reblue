<?php get_header(); ?>
			<div class="content-box" >
				<div class="content">
				<?php #if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
				<h2>搜尋結果：<?php the_search_query(); ?></h2>
				<?php if ( $wp_query->max_num_pages > 1 ) : ?>
				<div id="nav-above">
				<span class="nav-previous"><?php next_posts_link( '&larr;上一頁' ); ?></span>
				<span class="nav-next"><?php previous_posts_link( '下一頁&rarr;' ); ?></span>
				</div>
				<?php endif; 
				if ( have_posts() ) {
					while ( have_posts() ) { 
						the_post(); ?>
				<h3><a href="<?php the_permalink(); ?>"><?php the_title()?></a></h3>
				<div class="entry-content-search"><?php the_excerpt(); ?></div>
				<?php		
					}	
				}
				if ( $wp_query->max_num_pages > 1 ) : ?>
				<div id="nav-bottom">
				<span class="nav-previous"><?php next_posts_link( '&larr;上一頁' ); ?></span>
				<span class="nav-next"><?php previous_posts_link( '下一頁&rarr;' ); ?></span>
				</div>
				<?php endif; ?>
				</div><!--content-->
			</div><!--content-box-->
<?php get_footer(); ?>
