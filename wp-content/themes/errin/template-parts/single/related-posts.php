<?php

global $post;

$relatedposts = get_posts(
	array(

		'category__in' => wp_get_post_categories($post->ID),
		'numberposts' => 4,
		'order'       => 'ASC',
		'post__not_in' => array($post->ID)
	)

);

if ($relatedposts) :

	echo '<div class="related_post_wrapper">';
	echo '<h2>' . esc_html__("Related Posts", "errin") . '</h2>';

	echo '<div class="row related_posts_items">';


	foreach ($relatedposts as $post) {

		setup_postdata($post); ?>


		<div class="col-lg-6">

			<div class="single__page__ext__post__item__wrap">

				<div class="spepiw-thumbnail-wrap">
					<a href="<?php the_permalink(); ?>" class="post-grid-thumbnail-one">
						<img src="<?php echo esc_attr(esc_url(get_the_post_thumbnail_url(null, 'full'))); ?>" alt="<?php the_title_attribute(); ?>">
					</a>
				</div>

				<div class="spepiw-content-wrap">
					
					<h3 class="post-title">
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					</h3>

					<div class="post-single-custom-meta">
						<div class="post-author-name">
							<?php printf(
								'<a href="%1$s">%2$s</a>',
								esc_url(get_author_posts_url(get_the_author_meta('ID'))),
								get_the_author()
							); ?>

						</div>
						<div class="blog_details__Date">
							<?php echo esc_html(get_the_date('F j, Y')); ?>
						</div>
					</div>
				</div>
			</div>
		</div>

<?php }

	wp_reset_postdata();

	echo '</div>';
	echo '</div>';

endif;
