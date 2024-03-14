<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package errin
 */
 
get_header();

?>

	<section id="main-container" class="blog main-container">
		<div class="container">
			<div class="row">
			   <div class="col-lg-12">
				  <div class="error-page text-left">
					 <div class="error-code">
						<strong><?php esc_html_e('404', 'errin'); ?></strong>
					 </div>
					 <div class="error-message">
						<h3><?php esc_html_e('Sorry!...Page Not Found!', 'errin'); ?></h3>
						<p><?php esc_html_e('Lorem ipsum dolor sit amet consectetur, adipisicing elit. Enim, recusandae consectetur nesciunt magnam facilis aliquid amet earum alias?', 'errin'); ?></p>
					 </div>
					 <div class="error-body">
						<a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-primary solid blank"><i class="icofont-home"></i> <?php esc_html_e('Go Home Page', 'errin'); ?></a>
					 </div>
				  </div>
			   </div>
			</div>
		</div>
	</section>

<?php get_footer(); ?>
