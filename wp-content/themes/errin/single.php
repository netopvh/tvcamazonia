<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package errin
 */

get_header();

errin_set_post_view();

?>


	<?php 

	//Single Blog Template
	
	$errin_singleb_global = errin_get_option( 'errin_single_blog_layout' ); //for globally	
	$errin_single_post_style = get_post_meta( get_the_ID(),'errin_blog_post_meta', true );

	$theme_post_meta_single = isset($errin_single_post_style['errin_single_blog_layout']) && !empty($errin_single_post_style['errin_single_blog_layout']) ? $errin_single_post_style['errin_single_blog_layout'] : '';
	
	if( is_single() && !empty( $errin_single_post_style  ) ) {
	 
		get_template_part( 'template-parts/single/'.$theme_post_meta_single.'' ); 
	
	} elseif ( class_exists( 'CSF' ) && !empty( $errin_singleb_global ) ) {
		
		get_template_part( 'template-parts/single/'.$errin_singleb_global.'' );  
		
	} else {
		
		get_template_part( 'template-parts/single/single-one' );
	}
		
	?>


<?php get_footer(); ?>
