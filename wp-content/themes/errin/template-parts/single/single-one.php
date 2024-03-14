<?php

$blog_single_cat = errin_get_option('blog_single_cat');
$blog_single_author = errin_get_option('blog_single_author', false);
$blog_single_navigation = errin_get_option('blog_nav');
$blog_single_related = errin_get_option('blog_related');
$blog_single_taglist = errin_get_option('blog_tags');
$blog_single_views = errin_get_option('blog_views');

?>


<div id="main-content" class="bloglayout__One main-container blog-single post-layout-style2 single-one-bwrap"
	role="main">
	<div class="container">
		<div class="row single-blog-content">

			<div class="<?php if (is_active_sidebar('sidebar-1')) {
				echo "col-lg-8";
			} else {
				echo "col-lg-12";
			} ?> col-md-12">
				<?php while (have_posts()) :
					the_post(); ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class(["post-content", "post-single"]); ?>>

						<div class="blog_layout_one_Top">

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

							<h1 class="post-title single_blog_inner__Title">
								<?php the_title(); ?>
							</h1>

							<div class="post-single-custom-meta single_page">
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

							<?php if (has_post_thumbnail() && ! post_password_required()) : ?>
								<div class="post-featured-image">
									<?php if (get_post_format() == 'video') : ?>
										<?php get_template_part('template-parts/single/post', 'video'); ?>
									<?php else : ?>
										<?php if (errin_is_activated()) { ?>
											<img class="img-fluid" src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>"
												alt="<?php the_title_attribute(); ?>">
										<?php } else { ?>
											<img src="<?php echo esc_attr(esc_url(get_the_post_thumbnail_url(null, 'full'))); ?>"
												alt="<?php the_title_attribute(); ?>">
										<?php } ?>
									<?php endif; ?>
								</div>
							<?php endif; ?>



						</div>

						<div class="theme-blog-details">


							<div
								class="post-body clearfix single-blog-header single-blog-inner blog-single-block blog-details-content">
								<!-- Article content -->
								<div class="entry-content clearfix">

									<?php
									if (is_search()) {
										the_excerpt();
									} else {
										the_content();
										errin_link_pages();
									}
									?>

									<?php if (has_tag()) : ?>
										<div class="post-footer clearfix theme-tag-list-wrapp">
											<?php errin_single_post_tags(); ?>
										</div>

									<?php endif; ?>

								</div>
							</div>

						</div>

					</article>

					<div class="single__bottom_author__box">
						<div class="container">
							<div class="row">
								<div class="col-md-6">
									<div class="author__box__info">
										<div class="author_top">
											<div class="author-thumb">
												<?php echo get_avatar(get_the_author_meta('ID'), 100); ?>
											</div>
											<div class="author-meta">
												<span>
													<?php echo esc_html("Sobre o autor"); ?>
												</span>
												<div class="author__name">
													<?php if (empty(get_the_author_meta('display_name'))) {
														echo get_the_author_meta('nickname');
													} else {
														echo get_the_author_meta('display_name');
													} ?>
												</div>
												<?php echo errin_single_author_social(); ?>
											</div>
										</div>

										<div class="author__box_desc">
											<?php echo wpautop(get_the_author_meta('description')); ?>
										</div>
										<div class="author_more_post_btn">
											<a
												href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))) ?>">
												<?php echo esc_html__("Ver todos artigos", "errin") ?>
											</a>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="author__bottom_more__posts">
										<span>
											<?php echo esc_html__("Check latest article from this author !", "errin"); ?>
										</span>

										<?php global $current_user;
										$args = array(
											'author' => $current_user->ID,
											'orderby' => 'post_date',
											'order' => 'DESC',
											'posts_per_page' => 3, // post limit
											'post__not_in' => array(get_the_ID()),
										);

										$c_u_ps = new \WP_Query($args);

										while ($c_u_ps->have_posts()) :
											$c_u_ps->the_post();
											?>
											<div class="more_article">
												<div class="leftcontent">
													<img src="<?php echo esc_attr(esc_url(get_the_post_thumbnail_url(null, 'full'))); ?>"
														alt="<?php the_title_attribute(); ?>">
												</div>
												<div class="rightcontent">
													<h3><a href="<?php the_permalink(); ?>">
															<?php the_title(); ?>
														</a></h3>
													<div class="mdate">
														<?php echo esc_html(get_the_date('F j, Y')); ?>
													</div>
												</div>
											</div>

										<?php endwhile; ?>
										<?php wp_reset_postdata(); ?>
									</div>
								</div>
							</div>
						</div>

					</div>

					<?php if ($blog_single_author == true) : ?>
						<?php // errin_theme_author_box();         ?>
					<?php endif; ?>

					<?php if ($blog_single_navigation == true) : ?>
						<?php errin_theme_post_navigation(); ?>
					<?php endif; ?>

					<?php comments_template(); ?>
				<?php endwhile; ?>


				<?php if ($blog_single_related == true) : ?>
					<?php get_template_part('template-parts/single/related', 'posts'); ?>
				<?php endif; ?>

			</div>

			<?php get_sidebar(); ?>

		</div>


	</div>

</div>