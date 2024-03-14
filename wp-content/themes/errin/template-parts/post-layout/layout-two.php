
	<div class="blog_post_layout_two_inner">
	<div <?php post_class('blog_post_layout_two'); ?>>
		
		<?php if(has_post_thumbnail()): ?>
			<div class="blog_layout_two-thumbnail-wrap">
				<a href="<?php the_permalink(); ?>" class="latest-post-block-thumbnail">
				<?php if(errin_is_activated()){ ?>
					<img class="img-fluid" src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" alt="<?php the_title_attribute(); ?>">
					<?php } else{ ?>
						<img src="<?php echo esc_attr(esc_url(get_the_post_thumbnail_url(null, 'full'))); ?>" alt="<?php the_title_attribute(); ?>">
					<?php } ?>
				</a>
			</div>
		<?php endif; ?>
		
		<div class="blog_post_layout_two_content <?php if(has_post_thumbnail()) { echo "has-featured-blog"; } else { echo "no-featured-blog"; } ?>">
		
			<div class="htbc_category">
				<?php require ERRIN_THEME_DIR . '/template-parts/cat-color.php'; ?>
			</div>
			<h3 class="post-title">
				<a href="<?php echo esc_url(get_the_permalink()); ?>"><?php echo get_the_title(); ?></a>
			</h3>
			
			<div class="post-single-custom-meta">
				<div class="post-author-name">
					<?php printf('%1$s<a href="%2$s">%3$s</a>',
					get_avatar( get_the_author_meta( 'ID' ), 32 ), 
					esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ), 
					get_the_author()
					); ?>
								
				</div>
				<div class="blog_details__Date">
					<?php echo esc_html( get_the_date( 'F j, Y' ) ); ?>
				</div>
				<div class="post-comment-count">
					<i class="icon-messages-11"></i>
					<?php echo get_comments_number(get_the_ID()); ?>
				</div>
			</div>

			<div class="post-excerpt-box">
				<p><?php echo esc_html( wp_trim_words(get_the_excerpt(), 16 ,'') );?></p>
			</div>
			

		</div>

		</div>
		
	</div>
	
