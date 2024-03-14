<?php
/** Don't load directly */
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'foxiz_register_options_color' ) ) {
	function foxiz_register_options_color() {

		return [
			'id'     => 'foxiz_config_section_color',
			'title'  => esc_html__( 'Global Colors', 'foxiz' ),
			'desc'   => esc_html__( 'Customize the website\'s colors.', 'foxiz' ),
			'icon'   => 'el el-tint',
			'fields' => [
				[
					'id'     => 'section_start_global_color',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Highlight Elements', 'foxiz' ),
					'indent' => true,
				],
				[
					'id'          => 'global_color',
					'title'       => esc_html__( 'Global Highlight Color', 'foxiz' ),
					'subtitle'    => esc_html__( 'Select a global color. This setting applies to all links, menus, category overlays, main pages, and many contrasting elements.', 'foxiz' ),
					'description' => esc_html__( 'Consider choosing a color to ensure it will contrast with white text.', 'foxiz' ),
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
				],
				[
					'id'          => 'dark_global_color',
					'title'       => esc_html__( 'Dark Mode - Global Highlight Color', 'foxiz' ),
					'subtitle'    => esc_html__( 'Select a global color in dark mode.', 'foxiz' ),
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
				],
				[
					'id'     => 'section_end_global_color',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
				[
					'id'     => 'section_start_accent_color',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Dark Accent', 'foxiz' ),
					'indent' => true,
				],
				[
					'id'          => 'accent_color',
					'title'       => esc_html__( 'Dark Accent Color', 'foxiz' ),
					'subtitle'    => esc_html__( 'Select a dark accent color for your site, This setting apply to single header background, gradient colors.', 'foxiz' ),
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
				],
				[
					'id'          => 'dark_accent_color',
					'title'       => esc_html__( 'Dark Mode - Dark Accent Color', 'foxiz' ),
					'subtitle'    => esc_html__( 'Select dark accent color in dark mode.', 'foxiz' ),
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
				],
				[
					'id'     => 'section_end_accent_color',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
				[
					'id'     => 'section_start_dark_bg_color',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Body Background', 'foxiz' ),
					'indent' => true,
				],
				[
					'id'          => 'body_background',
					'title'       => esc_html__( 'Body Background', 'foxiz' ),
					'subtitle'    => esc_html__( 'Select a light solid background the website body. Leave blank to set it as the default.', 'foxiz' ),
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
				],
				[
					'id'          => 'dark_background',
					'title'       => esc_html__( 'Dark Mode Background', 'foxiz' ),
					'subtitle'    => esc_html__( 'Select a dark solid background for dark mode. Leave blank to set it as the default.', 'foxiz' ),
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
				],
				[
					'id'     => 'section_end_dark_bg_color',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
				[
					'id'     => 'section_start_mode_switcher',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Mode Switcher', 'foxiz' ),
					'indent' => true,
				],
				[
					'id'          => 'light_switcher_color',
					'title'       => esc_html__( 'Light Switcher - Icon Color', 'foxiz' ),
					'subtitle'    => esc_html__( 'Select a color for for the sun icon.', 'foxiz' ),
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
				],
				[
					'id'          => 'light_switcher_bg',
					'title'       => esc_html__( 'Light Switcher - Icon Background', 'foxiz' ),
					'subtitle'    => esc_html__( 'Select a background for the sun icon.', 'foxiz' ),
					'type'        => 'color',
					'transparent' => false,
				],
				[
					'id'          => 'light_switcher_slide',
					'title'       => esc_html__( 'Light Switcher - Slide Background', 'foxiz' ),
					'subtitle'    => esc_html__( 'Select a background for the slider in light mode.', 'foxiz' ),
					'type'        => 'color',
					'transparent' => false,
				],
				[
					'id'          => 'dark_switcher_color',
					'title'       => esc_html__( 'Dark Switcher - Icon Color', 'foxiz' ),
					'subtitle'    => esc_html__( 'Select a color for for the moon icon.', 'foxiz' ),
					'type'        => 'color',
					'transparent' => false,
				],
				[
					'id'          => 'dark_switcher_bg',
					'title'       => esc_html__( 'Dark Switcher - Icon Background', 'foxiz' ),
					'subtitle'    => esc_html__( 'Select a background for the moon icon.', 'foxiz' ),
					'type'        => 'color',
					'transparent' => false,
				],
				[
					'id'          => 'dark_switcher_slide',
					'title'       => esc_html__( 'Dark Switcher - Slide Background', 'foxiz' ),
					'subtitle'    => esc_html__( 'Select a background for the slider in dark mode.', 'foxiz' ),
					'type'        => 'color',
					'transparent' => false,
				],
				[
					'id'     => 'section_end_mode_switcher',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
				[
					'id'     => 'section_start_bookmark_color',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Bookmark Hover Color', 'foxiz' ),
					'indent' => true,
				],
				[
					'id'          => 'bookmark_color',
					'title'       => esc_html__( 'Bookmark Hover Color', 'foxiz' ),
					'subtitle'    => esc_html__( 'Select a color value when hovering on the bookmark.', 'foxiz' ),
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
				],
				[
					'id'          => 'dark_bookmark_color',
					'title'       => esc_html__( 'Dark Mode - Bookmark Hover Color', 'foxiz' ),
					'subtitle'    => esc_html__( 'Select a color value when hovering on the bookmark in dark mode.', 'foxiz' ),
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
				],
				[
					'id'     => 'section_end_bookmark_color',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
				[
					'id'     => 'section_start_review_color',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Review Stars', 'foxiz' ),
					'indent' => true,
				],
				[
					'id'          => 'review_color',
					'title'       => esc_html__( 'Review Star Color', 'foxiz' ),
					'subtitle'    => esc_html__( 'Select a color value for the star icons.', 'foxiz' ),
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
				],
				[
					'id'          => 'dark_review_color',
					'title'       => esc_html__( 'Dark Mode - Review Star Color', 'foxiz' ),
					'subtitle'    => esc_html__( 'Select a color value for the star icons in dark mode.', 'foxiz' ),
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
				],
				[
					'id'     => 'section_end_review_color',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
				[
					'id'     => 'section_start_sponsor_color',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Sponsor Label', 'foxiz' ),
					'indent' => true,
				],
				[
					'id'          => 'sponsor_color',
					'title'       => esc_html__( 'Sponsor Label Color', 'foxiz' ),
					'subtitle'    => esc_html__( 'Select a color value for the sponsor label.', 'foxiz' ),
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
				],
				[
					'id'          => 'dark_sponsor_color',
					'title'       => esc_html__( 'Dark Mode - Sponsor Label Color', 'foxiz' ),
					'subtitle'    => esc_html__( 'Select a color value for the sponsor label in dark mode.', 'foxiz' ),
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
				],
				[
					'id'     => 'section_end_sponsor_color',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
				[
					'id'     => 'section_start_counter_color',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Popular Counter', 'foxiz' ),
					'indent' => true,
				],
				[
					'id'          => 'counter_color',
					'title'       => esc_html__( 'Popular Counter Color', 'foxiz' ),
					'subtitle'    => esc_html__( 'Select a color for the counter elements.', 'foxiz' ),
					'description' => esc_html__( 'Transparent color is recommended.', 'foxiz' ),
					'type'        => 'color_rgba',
				],
				[
					'id'       => 'dark_counter_color',
					'title'    => esc_html__( 'Dark Mode - Popular Counter Color', 'foxiz' ),
					'subtitle' => esc_html__( 'Select a color for the counter elements in dark mode.', 'foxiz' ),
					'type'     => 'color_rgba',
				],
				[
					'id'     => 'section_end_counter_color',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
				[
					'id'     => 'section_start_live_blog_color',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Live Blogging', 'foxiz' ),
					'indent' => true,
				],
				[
					'id'          => 'live_blog_color',
					'title'       => esc_html__( 'Color', 'foxiz' ),
					'subtitle'    => esc_html__( 'Select a color for the live blogging icons.', 'foxiz' ),
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
				],
				[
					'id'          => 'dark_live_blog_color',
					'title'       => esc_html__( 'Dark Mode - Color', 'foxiz' ),
					'subtitle'    => esc_html__( 'Select a color for the live blogging icons in dark mode.', 'foxiz' ),
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
				],
				[
					'id'     => 'section_end_global_color',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false,
				],
			],
		];
	}
}
