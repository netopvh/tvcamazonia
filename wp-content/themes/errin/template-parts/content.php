<div class="main-content-inner">
  
	<div <?php post_class('post-block-wrapper-latest post-block-style-latest blog-block-latest-single-item'); ?>>
		
		<?php if(has_post_thumbnail()): ?>
			<div class="latest-post-thumbnail-wrap">
				<a href="<?php the_permalink(); ?>" class="latest-post-block-thumbnail">
				<?php if(errin_is_activated()){ ?>
					<img class="img-fluid" src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" alt="<?php the_title_attribute(); ?>">
					<?php } else{ ?>
						<img src="<?php echo esc_attr(esc_url(get_the_post_thumbnail_url(null, 'full'))); ?>" alt="<?php the_title_attribute(); ?>">
					<?php } ?>
				</a>
			</div>
		<?php endif; ?>
		
		<div class="latest-post-block-content <?php if (has_post_thumbnail()) {	echo "has-featured-blog"; } else { echo "no-featured-blog";	} ?>">

					<div class="post-top-meta-box htbc_category">
						<?php require ERRIN_THEME_DIR . '/template-parts/cat-color.php'; ?>
						<div class="read-time">
							<?php echo errin_reading_time(); ?>
						</div>
						<div class="post-view">
							<i class="icon-flash1"></i>
							<?php echo errin_get_post_view(); ?>
						</div>
					</div>

					<h3 class="post-title">
						<a href="<?php echo esc_url(get_the_permalink()); ?>"><?php echo get_the_title(); ?></a>
					</h3>

					<div class="post-single-custom-meta">
						<div class="post-author-name">
							<?php printf(
								'%1$s<a href="%2$s">%3$s</a>',
								get_avatar(get_the_author_meta('ID'), 32),
								esc_url(get_author_posts_url(get_the_author_meta('ID'))),
								get_the_author()
							); ?>

						</div>
						<div class="blog_details__Date">
							<i class="icon-calendar1"></i>
							<?php echo esc_html(get_the_date('F j, Y')); ?>
						</div>
						<div class="post-comment-count">
							<i class="icon-messages-11"></i>
							<?php echo get_comments_number(get_the_ID()); ?>
						</div>
					</div>

					<div class="post-excerpt-box">
						<p><?php echo esc_html(wp_trim_words(get_the_excerpt(), 50, '')); ?></p>
					</div>

					<div class="latest-post-list-btn">
						<div class="post-read-btn">
							<a href="<?php the_permalink(); ?>"><?php echo esc_html__("Continue Reading", "errin"); ?> <i class="icon-arrow-right1"></i></a>
						</div>
					</div>
				</div>
		
		
	</div>


</div>