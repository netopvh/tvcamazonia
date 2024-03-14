<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package errin
 */

$blog_title = errin_get_option('blog_title', true);
$blog_breadcrumb = errin_get_option('blog_breadcrumb_enable', true);

$errin_blog_layout = errin_get_option( 'errin_blog_layout', true ); //for global

get_header();

?>

	<?php if($blog_breadcrumb == true) :?>
    <!-- Blog Breadcrumb -->
    <div class="theme-breadcrumb__Wrapper theme-breacrumb-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
					<h1 class="theme-breacrumb-title">
						<?php if($blog_title){
							esc_html_e($blog_title, 'errin');
						}else{
							 esc_html_e('Blog', 'errin');
						}
						?>
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
    <!-- Blog Breadcrumb End -->
	<?php endif; ?>
	
	<section id="main-content" class="blog main-container blog-spacing" role="main">
		<div class="container">
			<div class="row">
				<div class="<?php if(is_active_sidebar('sidebar-1')) { echo "col-lg-8"; } else { echo "col-lg-12";}?> col-md-12">
					<div class="theme-layout-mainn">
					<?php if (have_posts()): ?>
						<div class="theme_layout_post_wrap">
						<?php while (have_posts()): the_post(); 

						if( $errin_blog_layout == 'layout-one'){
							get_template_part( "template-parts/post-layout/layout-one" );
						}elseif($errin_blog_layout == 'layout-two'){
							get_template_part( "template-parts/post-layout/layout-two" );
						}else{
							get_template_part( 'template-parts/content', get_post_format() );
						}										
							endwhile; ?>
						</div>
						<div class="theme-pagination-style">
							<?php
								the_posts_pagination(array(
								'next_text' => '<i class="icon-arrow-right1"></i>', 
								'prev_text' => '<i class="icon-arrow-left1"></i>',
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
