<?php get_header(); ?>
			<div class="content-box clear" >
				<div class="content">
					<h2><?php single_cat_title(); ?></h2>
					<?php $category_description = category_description();
					if ( ! empty( $category_description ) )	?>
					<span class="cat-description"><?php echo $category_description ?></span>
					<?php if ( $wp_query->max_num_pages > 1 ) : ?>
					<div id="nav-above">
					<span class="nav-previous"><?php previous_posts_link( '&larr;上一頁' ); ?></span>
					<span class="nav-next"><?php next_posts_link( '下一頁&rarr;' ); ?></span>
					</div>
					<?php endif; 
						if ( have_posts() ) { 
						while ( have_posts() ) { 
							the_post();
					?>
					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<h3><a href="<?php the_permalink(); ?>"><?php the_title()?></a></h3>
						<div class="entry-content-category">
						<?php 
							the_excerpt();
						?>
						</div><!--entry-content-category--></div>
							<?php	}	}
						else { ?>
								<div class="entry-content-category">
									<?php _e('Sorry, no posts matched your criteria.'); ?>
								</div><!--entry-content-category-->
						<?php	}?>
					<?php if ( $wp_query->max_num_pages > 1 ) : ?>
					<div id="nav-bottom">
					<span class="nav-previous"><?php previous_posts_link( '&larr;上一頁' ); ?></span>
					<span class="nav-next"><?php next_posts_link( '下一頁&rarr;' ); ?></span>
					</div>
					<?php endif; ?>
				</div><!--content-->
			</div><!--content-box-->
<?php get_footer(); ?>
