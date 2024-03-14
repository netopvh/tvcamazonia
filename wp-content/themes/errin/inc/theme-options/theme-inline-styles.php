<?php
if (!defined('ABSPATH'))
{
	exit; // Exit if accessed directly
	
}

if (!function_exists('errin_theme_inline_style')):

	function errin_theme_inline_style()
	{

		wp_enqueue_style('errin-custom-style', get_template_directory_uri() . '/assets/css/custom-style.css');
		
		

		$custom_css = '';
		
		
		

		// Get Category Color for List Widget
		
		$categories_widget_color = get_terms('category');
		
        if ($categories_widget_color) {
            foreach( $categories_widget_color as $tag) {
				$tag_link = get_category_link($tag->term_id);
				$title_bg_Color = get_term_meta($tag->term_id, 'errin', true);
				$catColor = !empty( $title_bg_Color['cat-color'] )? $title_bg_Color['cat-color'] : '#5138EE';
				$custom_css .= '
					.cat-item-'.$tag->term_id.' span.post_count {background-color : '.$catColor.' !important;} 
				';
			}
        }
		
		wp_add_inline_style('errin-custom-style', $custom_css);
	}
	add_action('wp_enqueue_scripts', 'errin_theme_inline_style');

endif;

