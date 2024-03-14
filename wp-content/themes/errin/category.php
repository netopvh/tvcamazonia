<?php
/**
 * The template for displaying catgeory pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package errin
 */

get_header();

$errin_cat_style = get_term_meta(get_queried_object_id(), 'errin', true);
$errin_cat_style_template = ! empty($errin_cat_style['errin_cat_layout']) ? $errin_cat_style['errin_cat_layout'] : '';

?>

<!-- Category Breadcrumb -->
<div class="theme-breadcrumb__Wrapper theme-breacrumb-area">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-12">
				<h1 class="theme-breacrumb-title">
					<?php single_cat_title(); ?>
				</h1>

			</div>
		</div>
	</div>
</div>
<!-- Category Breadcrumb End -->

<section id="main-content" class="blog main-container cat-page-spacing" role="main">
	<div class="container">
		<div class="row">
			<div class="<?php if (is_active_sidebar('sidebar-1')) {
				echo "col-lg-8";
			} else {
				echo "col-lg-12";
			} ?> col-md-12">

				<?php if (have_posts()) : ?>

					<?php

					$errin_cat_global = errin_get_option('errin_cat_layout'); //for global
				
					if (is_category() && ! empty($errin_cat_style)) {

						get_template_part('template-parts/category-templates/' . $errin_cat_style_template . '');

					} elseif (class_exists('CSF') && ! empty($errin_cat_global)) {

						get_template_part('template-parts/category-templates/' . $errin_cat_global . '');

					} else {

						get_template_part('template-parts/category-templates/catt-two');
					}
					?>

					<div class="theme-pagination-style">
						<?php
						the_posts_pagination(array(
							'next_text' => '<i class="ri-arrow-right-line"></i>',
							'prev_text' => '<i class="ri-arrow-left-line"></i>',
							'screen_reader_text' => ' ',
							'type' => 'list'
						));
						?>
					</div>

				<?php else : ?>
					<?php get_template_part('template-parts/content', 'none'); ?>
				<?php endif; ?>

			</div>

			<?php get_sidebar(); ?>

		</div>
	</div>
</section>

<?php get_footer(); ?>