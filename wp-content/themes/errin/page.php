<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package errin
 */

get_header(); 


if(get_post_meta($post->ID, 'errin_post_meta', true)) {
    $page_meta = get_post_meta($post->ID, 'errin_post_meta', true);
} else {
    $page_meta = array();
}

if( array_key_exists( 'page_title_enable', $page_meta )) {
    $enable_title = $page_meta['page_title_enable'];
} else {
    $enable_title = true;
}



?>

    <!-- Page Breadcrumb -->
	
	<?php if( $enable_title == true ) : ?>
	
    <div class="theme-breadcrumb__Wrapper">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
					<h1 class="theme-breacrumb-title">
						<?php the_title(); ?>
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
	
	<?php endif; ?>
	
    <!-- Page Breadcrumb End -->

	<div id="main-content" class="main-container theme-page-spacing" role="main">
		<div class="container">   
			<div class="row">
				<div class="col-lg-12">
					<?php while ( have_posts() ) : the_post(); ?>
						<div class="single-content">
							<div class="entry-content">
								<?php get_template_part( 'template-parts/content', 'page' ); ?>
								
								<?php 
									// If comments are open or we have at least one comment, load up the comment template.
									if ( comments_open() || get_comments_number() ) :
										comments_template();
									endif;
								?>	
								
							</div>
						</div>
						
					<?php endwhile; ?>
				</div> 
			</div> 
		</div> 
	</div> 
	
	<?php get_footer(); ?>