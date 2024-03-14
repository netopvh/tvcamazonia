<?php

if (! defined('ABSPATH')) {
	exit; // Exit if accessed directly
}

$errin_logo = errin_get_option('theme_logo');
$errin_logo_id = isset($errin_logo['id']) && ! empty($errin_logo['id']) ? $errin_logo['id'] : '';
$errin_logo_url = isset($errin_logo['url']) ? $errin_logo['url'] : '';
$errin_logo_alt = get_post_meta($errin_logo_id, '_wp_attachment_image_alt', true);
$errin_header_search = errin_get_option('search_bar_enable', true);
$errin_header_social = errin_get_option('header_social_enable');
$errin_social_icon = errin_get_option('social-icon');
$ntext_btn_enable = errin_get_option('ntext_btn_enable');
$ntext_text_btn = errin_get_option('ntext_text_btn');
$ntext_btn_link = errin_get_option('ntext_btn_link');

$theme_header_sticky = errin_get_option('theme_header_sticky', true);

?>

<header id="theme-header-one" class="theme_header__main header-style-one header-one-wrapper H_one_fix">

	<div class="theme-logo-area">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-4 text-left newsletter-one">
					<?php if (! empty($errin_social_icon)) { ?>
						<div class="header_two_social hs-one">
							<ul>
								<?php foreach ($errin_social_icon as $ks_icon) { ?>
									<li><a href="<?php echo esc_url($ks_icon['link']); ?>"><i
												class="<?php echo esc_attr($ks_icon['icon']); ?>"></i></a></li>
								<?php } ?>
							</ul>
						</div>
					<?php } ?>
				</div>

				<div class="col-md-4">
					<div class="theme-logo text-md-center">
						<?php
						if (has_custom_logo() || ! empty($errin_logo_url)) {
							if (isset($errin_logo['url']) && ! empty($errin_logo_url)) {
								?>
								<a href="<?php echo esc_url(site_url('/')) ?>" class="logo">
									<img class="img-fluid" src="<?php echo esc_url($errin_logo_url); ?>"
										alt="<?php echo esc_attr($errin_logo_alt) ?>">
								</a>
								<?php
							} else {
								the_custom_logo();
							}

						} else { ?>

							<a href="<?php echo esc_url(site_url('/')) ?>" class="logo" style="padding: 100px 100px;">
								&nbsp;
							</a>

							<?php
						}
						?>
					</div>
				</div>
				<!-- <div class="col-md-4 text-right">
					<div class="header-one-search-btn">
						<a href="#" class="search-box-btn"><i class="icon-search-normal-11"></i></a>
					</div>
				</div> -->

			</div>
		</div>
	</div>

	<div class="theme-nav-area theme-navigation-style nav-design-one <?php if ($theme_header_sticky == true) {
		echo "stick-top";
	} else {
		echo "stick-disable";
	} ?>">
		<div class="container">
			<div class="row align-items-center">

				<?php if ($theme_header_sticky == true) : ?>
					<div class="col-lg-2 text-left newsletter-one">
						<?php if (! empty($errin_social_icon)) { ?>
							<div class="header_two_social hs-one">
								<ul>
									<?php foreach ($errin_social_icon as $ks_icon) { ?>
										<li><a href="<?php echo esc_url($ks_icon['link']); ?>"><i
													class="<?php echo esc_attr($ks_icon['icon']); ?>"></i></a></li>
									<?php } ?>
								</ul>
							</div>
						<?php } ?>
					</div>
				<?php endif; ?>

				<div class="<?php if ($theme_header_sticky == true) {
					echo "col-lg-8";
				} else {
					echo "col-lg-12";
				} ?> nav-style-one">
					<!-- <div class="nav-menu-wrapper">
						<div class="container">
							<div class="errin-responsive-menu"></div>
							<div class="mainmenu">
								<?php
								wp_nav_menu(array(
									'theme_location' => 'primary',
									'menu_id' => 'primary-menu',
									'fallback_cb' => 'errin_fallback_menu',
								));
								?>
							</div>
						</div>
					</div> -->
				</div>

				<?php if ($theme_header_sticky == true) : ?>
					<div class="col-lg-2 text-right">
						<div class="header-one-search-btn">
							<a href="#" class="search-box-btn"><i class="icon-search-normal-11"></i></a>
						</div>
					</div>
				<?php endif; ?>

			</div>
		</div>
	</div>

</header>

<div class="body-overlay" id="body-overlay"></div>

<!-- search popup area start -->
<div class="search-popup" id="search-popup">
	<form role="search" method="get" id="searchform" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
		<div class="form-group">
			<input type="text" class="search-input" value="<?php echo get_search_query(); ?>" name="s" id="s"
				placeholder="<?php esc_attr_e('Search.....', 'errin'); ?>" required />
		</div>
		<button type="submit" id="searchsubmit" class="search-button submit-btn"><i
				class="icon-search-normal-11"></i></button>
	</form>
</div>
<!-- search Popup end-->