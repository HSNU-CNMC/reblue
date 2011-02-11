<?php get_header(); ?>
			<div class="content-box " >
				<div class="content">
				<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); 
				if ( have_posts() ) {
					while ( have_posts() ) { 
						the_post();?> 
				<div class="entry-content"><?php the_content(); ?></div>
				<?php	wp_link_pages('before=<p>&after=</p>&next_or_number=number&pagelink=page %');
					}	
				}
				?>
				</div><!--content-->
			</div><!--content-box-->
<?php get_footer(); ?>
