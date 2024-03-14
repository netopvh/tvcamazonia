<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package errin
 */

$errin_preloader = errin_get_option('preloader_enable', true);


?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<?php wp_head(); ?>
</head>


<body <?php body_class(); ?>>

	<?php wp_body_open(); ?>

	<!-- Theme Preloader -->
	<?php if ($errin_preloader == true) : ?>
		<div id="preloader">
			<div class="spinner">
				<div class="double-bounce1"></div>
				<div class="double-bounce2"></div>
			</div>
		</div>
	<?php endif; ?>



	<div class="body-inner-content" style="background: #010101;">

		<?php

		// Select Header Style
		
		$errin_nav_global = errin_get_option('nav_menu'); // Global
		$errin_nav_style = get_post_meta(get_the_ID(), 'errin_post_meta', true); // Post Metabox
		
		if (is_page() && ! empty($errin_nav_style)) {

			get_template_part('template-parts/headers/' . $errin_nav_style['nav_menu'] . '');

		} elseif (class_exists('CSF') && ! empty($errin_nav_global)) {

			get_template_part('template-parts/headers/' . $errin_nav_global . '');

		} else {

			get_template_part('template-parts/headers/nav-style-two');

		}

		?>