<?php
/** Don't load directly */
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'foxiz_register_options_performance' ) ) {
	function foxiz_register_options_performance() {

		return [
			'id'     => 'foxiz_config_section_performance',
			'title'  => esc_html__( 'Performance', 'foxiz' ),
			'desc'   => esc_html__( 'Select options to optimize your site speed.', 'foxiz' ),
			'icon'   => 'el el-dashboard',
			'fields' => [
				[
					'id'    => 'performance_info',
					'type'  => 'info',
					'title' => sprintf( esc_html__( 'We recommend you to refer this <a target="_blank" href="%s">DOCUMENTATION</a> to optimize for you website', 'foxiz' ), 'https://help.themeruby.com/foxiz/optimizing-your-site-speed-and-google-pagespeed-insights/' ),
					'style' => 'info',
				],
				[
					'id'    => 'ui_font_info',
					'type'  => 'info',
					'title' => esc_html__( 'All font-family settings will not be available if you disable Google Fonts. System UI font will replace them.', 'foxiz' ),
					'style' => 'warning',
				],
				[
					'id'     => 'section_start_image_optimization',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Images', 'foxiz' ),
					'indent' => true,
				],
				[
					'id'          => 'lazy_load',
					'type'        => 'switch',
					'title'       => esc_html__( 'Featured Image - Lazy Load', 'foxiz' ),
					'subtitle'    => esc_html__( 'Enable or disable the lazy load for featured image.', 'foxiz' ),
					'description' => esc_html__( 'You can also manage lazy load for individual blocks in the live editor.', 'foxiz' ),
					'default'     => true,
				],
				[
					'id'       => 'disable_srcset',
					'type'     => 'switch',
					'title'    => esc_html__( 'Feature Image - Disable Srcset', 'foxiz' ),
					'subtitle' => esc_html__( 'Disable srcset attribute for the featured images to optimize page speed score.', 'foxiz' ),
					'default'  => true,
				],
				[
					'id'          => 'lazy_load_single_feat',
					'type'        => 'switch',
					'title'       => esc_html__( 'Single Post - Lazy Load Featured Image', 'foxiz' ),
					'subtitle'    => esc_html__( 'Enable or disable the lazy load for the single featured image.', 'foxiz' ),
					'description' => esc_html__( 'As default, Above the fold single featured image will not load lazily. This setting may help to improve the mobile score but it will also negative effect for the desktop.', 'foxiz' ),
					'default'     => false,
				],
				[
					'id'       => 'lazy_load_content',
					'type'     => 'switch',
					'title'    => esc_html__( 'Single Post - Lazy Load Content Images', 'foxiz' ),
					'subtitle' => esc_html__( 'Enable or disable the lazy load for images in the post content.', 'foxiz' ),
					'default'  => true,
				],
				[
					'id'       => 'disable_srcset_content',
					'type'     => 'switch',
					'title'    => esc_html__( 'Single Post - Disable Srcset Content Images', 'foxiz' ),
					'subtitle' => esc_html__( 'Disable srcset attribute for images in the post content.', 'foxiz' ),
					'default'  => false,
				],
				[
					'id'          => 'disable_dashicons',
					'type'        => 'switch',
					'title'       => esc_html__( 'Disable Dashicons', 'foxiz' ),
					'subtitle'    => esc_html__( 'Disable unused libraries to improve the load time..', 'foxiz' ),
					'description' => esc_html__( 'Some 3rd party plugins will load this font icon. Disable it if you have not plan to use it.', 'foxiz' ),
					'default'     => true,
				],
				[
					'id'     => 'section_end_image_optimization',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
				[
					'id'     => 'section_start_font_optimization',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Fonts', 'foxiz' ),
					'indent' => true,
				],
				[
					'id'       => 'preload_gfonts',
					'type'     => 'switch',
					'title'    => esc_html__( 'Preload Google Fonts', 'foxiz' ),
					'subtitle' => esc_html__( 'Enable or disable preload Google fonts to increase the site speed score.', 'foxiz' ),
					'default'  => true,
				],
				[
					'id'       => 'preload_font_icon',
					'type'     => 'switch',
					'title'    => esc_html__( 'Preload Font Icon', 'foxiz' ),
					'subtitle' => esc_html__( 'Enable or disable preload font icons to increase the site speed score.', 'foxiz' ),
					'default'  => true,
				],
				[
					'id'          => 'disable_default_fonts',
					'type'        => 'switch',
					'title'       => esc_html__( 'Disable Default Fonts', 'foxiz' ),
					'subtitle'    => esc_html__( 'The theme will load default fonts to render some elements as heading tags, body, meta.', 'foxiz' ),
					'description' => esc_html__( 'Enable this option if all fonts in Typography panels is set.', 'foxiz' ),
					'default'     => false,
				],
				[
					'id'          => 'disable_google_font',
					'type'        => 'switch',
					'title'       => esc_html__( 'Disable All Google Fonts', 'foxiz' ),
					'subtitle'    => esc_html__( 'The theme will load System UI fonts for all elements if you enable this setting.', 'foxiz' ),
					'description' => esc_html__( 'This is a quick method to choose the System UI font. You can select it for individual elements in the typography settings panel.', 'foxiz' ),
					'default'     => false,
				],
				[
					'id'     => 'section_end_font_optimization',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
				[
					'id'     => 'section_start_more_optimization',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'More', 'foxiz' ),
					'indent' => true,
				],
				[
					'id'       => 'disable_block_style',
					'type'     => 'switch',
					'title'    => esc_html__( 'Disable Gutenberg Style on Page Builder', 'foxiz' ),
					'subtitle' => esc_html__( 'Disable the block style css on the page built with Page Builder.', 'foxiz' ),
					'default'  => false,
				],
				[
					'id'       => 'css_file',
					'type'     => 'switch',
					'title'    => esc_html__( 'Force write Dynamic CSS to file', 'foxiz' ),
					'subtitle' => esc_html__( 'Write CSS to file to reduce CPU usage and reduce the load time.', 'foxiz' ),
					'desc'     => esc_html__( 'The dynamic file CSS may not apply immediately on some servers due to the server cache.', 'foxiz' ),
					'default'  => false,
				],
				[
					'id'     => 'section_end_more_optimization',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false,
				],
			],
		];
	}
}

if ( ! function_exists( 'foxiz_register_options_seo' ) ) {
	/**
	 * @return array
	 */
	function foxiz_register_options_seo() {

		return [
			'id'     => 'foxiz_config_section_seo',
			'title'  => esc_html__( 'SEO Optimized', 'foxiz' ),
			'desc'   => esc_html__( 'The settings below helps your site optimized for SEO and appear better on the search engines.', 'foxiz' ),
			'icon'   => 'el el-graph',
			'fields' => [
				[
					'id'     => 'section_start_seo_snippets',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'SEO Snippets', 'foxiz' ),
					'notice' => [
						esc_html__( 'Duplicate meta description, Schema markup, and other SEO tags may cause issues. The theme will automatically optimize settings for popular SEO plugins. However, please double check the below settings to ensure.', 'foxiz' ),
						esc_html__( 'We suggest you to use Google rich results test tool here: search.google.com/test/rich-results', 'foxiz' ),
					],
					'indent' => true,
				],
				[
					'id'          => 'organization_markup',
					'type'        => 'switch',
					'title'       => esc_html__( 'Organization Schema Markup', 'foxiz' ),
					'subtitle'    => esc_html__( 'Enable or disable schema markup for the website, helps generate brand signals.', 'foxiz' ),
					'description' => esc_html__( 'Disable this option if you want to use 3rd party plugin.', 'foxiz' ),
					'default'     => true,
				],
				[
					'id'       => 'website_markup',
					'type'     => 'switch',
					'title'    => esc_html__( 'Sitelinks Search Box', 'foxiz' ),
					'subtitle' => esc_html__( 'Enable or disable website markup, helps to show the Search Box feature for brand SERPs and can help your site name to appear in search results.', 'foxiz' ),
					'default'  => true,
				],
				[
					'id'       => 'site_itemlist',
					'type'     => 'switch',
					'title'    => esc_html__( 'ItemList (Carousel) Markup', 'foxiz' ),
					'subtitle' => esc_html__( 'Enable the Carousels (Item List) schema markup for your Homepage.', 'foxiz' ),
					'default'  => true,
				],
				[
					'id'          => 'site_breadcrumb',
					'type'        => 'switch',
					'title'       => esc_html__( 'Breadcrumbs bar', 'foxiz' ),
					'subtitle'    => esc_html__( 'Breadcrumbs are a hierarchy of links displayed in search engines and your site.', 'foxiz' ),
					'description' => esc_html__( 'This setting is only for the "Breadcrumb NavXT" plugin.', 'foxiz' ),
					'default'     => false,
				],
				[
					'id'          => 'website_description',
					'type'        => 'switch',
					'title'       => esc_html__( 'Meta Description', 'foxiz' ),
					'subtitle'    => esc_html__( 'Automatically generate meta description tag for your site.', 'foxiz' ),
					'description' => esc_html__( 'Disable if you want to use a 3rd party SEO plugin.', 'foxiz' ),
					'default'     => true,
				],
				[
					'id'          => 'single_post_article_markup',
					'type'        => 'select',
					'title'       => esc_html__( 'Article Markup', 'foxiz' ),
					'subtitle'    => esc_html__( 'Select structured data (schema markup) or disable the default for the single post.', 'foxiz' ),
					'description' => esc_html__( 'Disable this option if you want to use a 3rd party SEO plugin.', 'foxiz' ),
					'options'     => [
						'0' => esc_html__( 'Disable', 'foxiz' ),
						'1' => esc_html__( 'Article', 'foxiz' ),
						'2' => esc_html__( 'News Article', 'foxiz' ),
					],
					'default'     => '1',
				],
				[
					'id'          => 'single_post_review_markup',
					'type'        => 'switch',
					'title'       => esc_html__( 'Post Review Markup', 'foxiz' ),
					'subtitle'    => esc_html__( 'Enable or disable review product markup for the single post.', 'foxiz' ),
					'description' => esc_html__( 'Disable this option if you want to use a 3rd party SEO plugin.', 'foxiz' ),
					'default'     => true,
				],
				[
					'id'          => 'single_post_live_markup',
					'type'        => 'switch',
					'title'       => esc_html__( 'Live Blogging Markup', 'foxiz' ),
					'subtitle'    => esc_html__( 'Enable or disable LiveBlogPosting markup for the live blogging post.', 'foxiz' ),
					'description' => esc_html__( 'Disable this option if you want to use a 3rd party SEO plugin.', 'foxiz' ),
					'default'     => true,
				],
				[
					'id'     => 'section_end_seo_snippets',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],

				[
					'id'     => 'section_start_date_meta',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Google Search Date', 'foxiz' ),
					'notice' => [
						esc_html__( 'Google estimates the date by reviewing the dates on your content. This setting updates the datePublished property to the dateModified. This way, Google will displays the updated date on search results.', 'foxiz' ),
						esc_html__( 'Note: If you use a third-party schema plugin, the date information will be controlled by that plugin, and this setting may not have an effect.', 'foxiz' ),
						esc_html__( 'After enabling the setting, you should use Google Search Console\'s URL inspection tool or submit a sitemap with the modified post URLs to request indexing and reflect the changes on search results.', 'foxiz' ),
					],
					'indent' => true,
				],
				[
					'id'          => 'force_modified_date',
					'title'       => esc_html__( 'Try to Show Updated Date on Google Search', 'foxiz' ),
					'subtitle'    => esc_html__( 'Force Google to display the updated date in search results. This setting also changes the publication date on the frontend.', 'foxiz' ),
					'description' => esc_html__( 'This change won\'t have an immediate effect on Google search. It may take several days for the changes to be reflected, depending on your site\'s crawl rate and the number of modified posts.', 'foxiz' ),
					'type'        => 'switch',
					'default'     => false,
				],
				[
					'id'     => 'section_end_date_meta',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
				[
					'id'     => 'section_start_seo_information',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Organization Info', 'foxiz' ),
					'indent' => true,
				],
				[
					'id'          => 'logo_organization',
					'type'        => 'media',
					'url'         => true,
					'preview'     => true,
					'title'       => esc_html__( 'Organization Logo', 'foxiz' ),
					'subtitle'    => esc_html__( 'This logo will be showcased on social media when sharing the front page and will also appear in search results.', 'foxiz' ),
					'description' => esc_html__( 'IMPORTANT NOTE: Please ensure that this setting is configured for schema markup. The main logo will be used as a fallback if this setting is not configured.', 'foxiz' ),
				],
				[
					'id'          => 'site_description',
					'type'        => 'textarea',
					'rows'        => 3,
					'title'       => esc_html__( 'Home Description', 'foxiz' ),
					'subtitle'    => esc_html__( 'Short description will display when searching the website domain.', 'foxiz' ),
					'description' => esc_html__( ' Leave blank if you you want to use a 3rd party SEO plugin.', 'foxiz' ),
					'default'     => '',
				],
				[
					'id'       => 'site_phone',
					'type'     => 'text',
					'title'    => esc_html__( 'Phone Number', 'foxiz' ),
					'subtitle' => esc_html__( 'input your company phone number.', 'foxiz' ),
					'default'  => '',
				],
				[
					'id'       => 'site_email',
					'type'     => 'text',
					'title'    => esc_html__( 'Email', 'foxiz' ),
					'subtitle' => esc_html__( 'input your company main email.', 'foxiz' ),
					'default'  => '',
				],
				[
					'id'       => 'site_locality',
					'type'     => 'text',
					'title'    => esc_html__( 'Locality Address', 'foxiz' ),
					'subtitle' => esc_html__( 'input your company city and country address.', 'foxiz' ),
					'default'  => '',
				],
				[
					'id'       => 'site_street',
					'type'     => 'text',
					'title'    => esc_html__( 'Street Address', 'foxiz' ),
					'subtitle' => esc_html__( 'input your company street address.', 'foxiz' ),
					'default'  => '',
				],
				[
					'id'       => 'postal_code',
					'type'     => 'text',
					'title'    => esc_html__( 'Postal Code', 'foxiz' ),
					'subtitle' => esc_html__( 'input your company local postal code.', 'foxiz' ),
					'default'  => '',
				],
				[
					'id'     => 'section_end_seo_information',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
				[
					'id'     => 'section_start_og_tag',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Open Graph', 'foxiz' ),
					'indent' => true,
				],
				[
					'id'          => 'open_graph',
					'type'        => 'switch',
					'title'       => esc_html__( 'Open Graph', 'foxiz' ),
					'subtitle'    => esc_html__( 'Enable or disable Open Graph (share on socials).', 'foxiz' ),
					'description' => esc_html__( 'Disable this option if you want to use a 3rd party SEO plugin.', 'foxiz' ),
					'default'     => true,
				],
				[
					'id'       => 'facebook_app_id',
					'type'     => 'text',
					'title'    => esc_html__( 'Facebook APP ID', 'foxiz' ),
					'subtitle' => esc_html__( 'input your facebook app ID for OG tags.', 'foxiz' ),
					'default'  => '',
				],
				[
					'id'       => 'facebook_default_img',
					'type'     => 'media',
					'url'      => true,
					'preview'  => true,
					'title'    => esc_html__( 'Fallback Share Image', 'foxiz' ),
					'subtitle' => esc_html__( 'This image is used as a fallback option if the page being shared does not contain a featured image.', 'foxiz' ),
				],
				[
					'id'     => 'section_end_og_tag',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false,
				],
			],
		];
	}
}