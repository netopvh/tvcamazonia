<?php 

$blog_single_cat = errin_get_option('blog_single_cat');
$blog_single_author= errin_get_option('blog_single_author', false);
$blog_single_navigation = errin_get_option('blog_nav');
$blog_single_related = errin_get_option('blog_related');
$blog_single_taglist = errin_get_option('blog_tags');
$blog_single_views = errin_get_option('blog_views');

?>


<div id="main-content" class="bloglayout__One main-container blog-single post-layout-style2 single-one-bwrap"  role="main">
	<div class="container">
		<div class="row single-blog-content">

		<div class="<?php if(is_active_sidebar('sidebar-1')) { echo "col-lg-8"; } else { echo "col-lg-12";}?> col-md-12">
		<?php while (have_posts()):
		the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(["post-content", "post-single"]); ?>>

				<div class="blog_layout_one_Top">
					
						<?php if ( has_post_thumbnail() && !post_password_required() ) : ?>
						<div class="post-featured-image">
						<?php if(get_post_format()=='video'): ?>
							<?php get_template_part( 'template-parts/single/post', 'video' ); ?>  
							<?php else: ?>
							<img class="img-fluid" src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" alt="<?php the_title_attribute(); ?>">
							<?php endif; ?>
						</div>
						<?php endif; ?>
				
					<div class="post-header-style1">
						<header class="entry-header clearfix single-blog-header">
						
						<div class="single-top-meta-wrapper">
							
							<div class="category-box">
								<?php require ERRIN_THEME_DIR . '/template-parts/cat-color.php'; ?>
							</div>
										
						</div>
						
							
						
						<h1 class="post-title single_blog_inner__Title">
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						</h1>
						
						<div class="single-bottom-meta-wrapper">
						
							<div class="single-meta-left-infos">
							
								<div class="meta-author-thumb">
									<?php echo get_avatar( get_the_author_meta( 'ID' ), 45 ); ?>
								</div>
								
								
								<div class="single-meta-content">
									<h4 class="post-author-name">
										<?php echo get_the_author_link(); ?>
									</h4>
									
									<ul class="single-top-meta-list">
										<li class="blog_details__Date"><?php echo esc_html( get_the_date( 'F j, Y' ) ); ?></li>
											
									</ul>
								</div>
								
							</div>					
						</header>
					</div>  

				</div>
							
				<div class="theme-blog-details">
				
				
				<div class="post-body clearfix single-blog-header single-blog-inner blog-single-block blog-details-content">
					<!-- Article content -->
					<div class="entry-content clearfix">
						
						<?php
						if ( is_search() ) {
							the_excerpt();
						} else {
							the_content();
							errin_link_pages();
						}
						?>
						
					<?php if(has_tag() && $blog_single_taglist == true ) : ?>
					<div class="post-footer clearfix theme-tag-list-wrapp">
						<?php errin_single_post_tags(); ?>
					</div>
					 
					<?php endif; ?>	

					</div>
				</div>
				
				</div>
							
			</article>
					   
				<?php if($blog_single_author == true) :?>
					<?php errin_theme_author_box(); ?>
				<?php endif; ?>
			   
				<?php if($blog_single_navigation == true) :?>
					<?php errin_theme_post_navigation(); ?>
				<?php endif; ?>

				<?php comments_template(); ?>
				<?php endwhile; ?>
			</div>
					
			<?php get_sidebar(); ?>

		</div>
		
		<?php if($blog_single_related == true) :?>
		<div class="theme_related_posts_Wrapper">
			
			<div class="row">
				<div class="col-md-12">
					<?php get_template_part('template-parts/single/related', 'posts'); ?>
				</div>
			</div>
			
		</div>
		<?php endif; ?>
	</div> 
	
</div>






