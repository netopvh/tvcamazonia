<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package errin
 */

get_header();

?>

    <!-- Archive Breadcrumb -->
    <div class="theme-breadcrumb__Wrapper theme-breacrumb-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
					<h1 class="theme-breacrumb-title">
						 <?php the_archive_title(); ?>
					</h1>
					<div class="breaccrumb-inner">
						<?php 
							if ( shortcode_exists( '[flexy_breadcrumb]' ) ) {
								echo do_shortcode( '[flexy_breadcrumb]');
							}
						?>
					</div>
                </div>
            </div>
        </div>
    </div>
    <!-- Archive Breadcrumb End -->
	
	<section id="main-content" class="blog main-container blog-spacing" role="main">
		<div class="container">
			<div class="row">
				<div class="<?php if(is_active_sidebar('sidebar-1')) { echo "col-lg-8"; } else { echo "col-lg-12";}?> col-md-12">
					<div class="heme-layout-mainn">
					<?php if (have_posts()): ?>
					<div class="theme_layout_post_wrap">
						<?php while (have_posts()): the_post(); ?>
							<?php get_template_part('template-parts/content', get_post_format());?>
						<?php
						endwhile; ?>
					</div>
						<div class="theme-pagination-style">
							<?php
								the_posts_pagination(array(
								'next_text' => '<i class="icofont-long-arrow-right"></i>',
								'prev_text' => '<i class="icofont-long-arrow-left"></i>',
								'screen_reader_text' => ' ',
								'type'               => 'list'
							));
							?>
						</div>
						
						<?php else: ?>
							<?php get_template_part('template-parts/content', 'none'); ?>
						<?php endif; ?>
						
					</div>
				</div>

				<?php get_sidebar(); ?>

			</div>
		</div>
	</section>
	
	<?php get_footer(); ?>
