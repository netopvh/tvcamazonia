<?php

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}

$errin_logo = errin_get_option('theme_logo');
$errin_logo_id = isset($errin_logo['id']) && !empty($errin_logo['id']) ? $errin_logo['id'] : '';
$errin_logo_url = isset($errin_logo['url']) ? $errin_logo['url'] : '';
$errin_logo_alt = get_post_meta($errin_logo_id, '_wp_attachment_image_alt', true);
$errin_header_search = errin_get_option('search_bar_enable', true);
$errin_header_social = errin_get_option('header_social_enable');
$errin_social_icon = errin_get_option('social-icon');
$nesletter_enable = errin_get_option('nesletter_enable');
$nesletter_short_code = errin_get_option('nesletter_short_code');

?>

<header id="theme-header-two" class="theme_header__main header-style-one header-one-wrapper">

	<div class="theme-header-area">
		<div class="container">
			<div class="row align-items-center">

				<div class="col-lg-2">

					<div class="theme-logo">
						<?php
						if (has_custom_logo() || !empty($errin_logo_url)) {
							if (isset($errin_logo['url']) && !empty($errin_logo_url)) {
						?>
								<a href="<?php echo esc_url(site_url('/')) ?>" class="logo">
									<img class="img-fluid" src="<?php echo esc_url($errin_logo_url); ?>" alt="<?php echo esc_attr($errin_logo_alt) ?>">
								</a>
						<?php
							} else {
								the_custom_logo();
							}
						} else { ?>

									<a href="<?php echo esc_url( site_url('/')) ?>" class="logo">
										<img class="img-fluid" src="<?php echo esc_url( ERRIN_IMG . '/errin-logo-png.png' ); ?>" alt="<?php echo esc_attr( get_bloginfo('name')  ) ?>">
									</a>

							<?php
						}
						?>
					</div>

				</div>

				<div class="col-lg-7 nav-style-one nav-design-one">

					<div class="nav-menu-wrapper">

						<div class="errin-responsive-menu"></div>
						<div class="mainmenu">
							<?php
							wp_nav_menu(array(
								'theme_location' => 'primary',
								'menu_id'        => 'primary-menu',
								'fallback_cb'  => 'errin_fallback_menu',
							));
							?>
						</div>

					</div>


				</div>

				<div class="col-lg-3 newsletter-col">
					<?php if ($errin_header_social == true && !empty($errin_social_icon)) {

					?>
						<div class="header_two_social">
							<ul>
								<?php foreach ($errin_social_icon as $ks_icon) { ?>

									<li><a href="<?php echo esc_url($ks_icon['link']); ?>"><i class="<?php echo esc_attr($ks_icon['icon']); ?>"></i></a></li>

								<?php } ?>
							</ul>
						</div>
					<?php } ?>
					<div class="header-search-box">
						<a href="#" class="search-box-btn"><i class="icon-search-normal-11"></i></a>
					</div>
					<?php if( $nesletter_enable == true ){ ?>
					<div class="header-newsletter">
						<!-- Button to Open the Modal -->
						<button type="button" class="ns-box" data-toggle="modal" data-target="#kthModal">
							<i class="icon-send-11"></i> <?php echo esc_html__(' Subscribe', 'errin'); ?>
						</button>

						<!-- The Modal -->
						<div class="modal" id="kthModal">
							<div class="modal-dialog modal-dialog-centered">
								<div class="modal-content">

									<!-- Modal Header -->
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
									</div>

									<!-- Modal body -->
									<div class="modal-body">
										<?php echo do_shortcode($nesletter_short_code); ?>
									</div>


								</div>
							</div>
						</div>
					</div>
					<?php } ?>
				</div>



			</div>
		</div>
	</div>


</header>

<div class="body-overlay" id="body-overlay"></div>

<!-- search popup area start -->
<div class="search-popup" id="search-popup">
	<form role="search" method="get" id="searchform" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
		<div class="form-group">
			<input type="text" class="search-input" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="<?php esc_attr_e('Search.....', 'errin'); ?>" required />
		</div>
		<button type="submit" id="searchsubmit" class="search-button submit-btn"><i class="icon-search-normal-11"></i></button>
	</form>
</div>
<!-- search Popup end-->