<?php

namespace foxizElementor\Widgets;
defined( 'ABSPATH' ) || exit;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Repeater;
use Elementor\Widget_Base;
use foxizElementorControl\Options;
use function foxiz_get_categories_6;

/**
 * Class Categories_List_6
 *
 * @package foxizElementor\Widgets
 */
class Categories_List_6 extends Widget_Base {

	public function get_name() {

		return 'foxiz-categories-6';
	}

	public function get_title() {

		return esc_html__( 'Foxiz - Taxonomies List 6', 'foxiz-core' );
	}

	public function get_keywords() {

		return [ 'foxiz', 'ruby', 'category', 'follow', 'bookmark', 'interest', 'tag', 'tax' ];
	}

	public function get_icon() {

		return 'eicon-folder-o';
	}

	public function get_categories() {

		return [ 'foxiz_element' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'followed_section', [
				'label' => esc_html__( 'User Followed', 'foxiz-core' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'display_mode_info',
			[
				'type'            => Controls_Manager::RAW_HTML,
				'raw'             => Options::display_mode_info(),
				'content_classes' => 'elementor-panel-alert elementor-panel-alert-info',
			]
		);
		$this->add_control(
			'tax_slug_info',
			[
				'type'            => Controls_Manager::RAW_HTML,
				'raw'             => Options::tax_name_description(),
				'content_classes' => 'elementor-panel-alert elementor-panel-alert-info',
			]
		);
		$this->add_control(
			'followed',
			[
				'label'       => esc_html__( 'Show Followed', 'foxiz-core' ),
				'type'        => Controls_Manager::SELECT,
				'description' => Options::taxonomies_followed_description(),
				'options'     => Options::followed_dropdown(),
				'default'     => '-1',
			]
		);
		$this->add_control(
			'tax_followed',
			[
				'label'       => esc_html__( 'or Show Followed by Taxonomy Keys', 'foxiz-core' ),
				'description' => Options::tax_slug_followed_description(),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => 'category, post_tag, genre',
				'ai'          => [ 'active' => false ],
				'rows'        => 2,
				'default'     => '',
			]
		);
		$this->add_control(
			'display_mode',
			[
				'label'       => esc_html__( 'Display Mode', 'foxiz-core' ),
				'type'        => Controls_Manager::SELECT,
				'description' => Options::categories_display_mode_description(),
				'options'     => [
					'0'      => esc_html__( '- AJAX -', 'foxiz-core' ),
					'direct' => esc_html__( 'Direct', 'foxiz-core' ),
				],
				'default'     => '0',
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'general_section', [
				'label' => esc_html__( 'Manually Add', 'foxiz-core' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'tax_featured_info',
			[
				'type'            => Controls_Manager::RAW_HTML,
				'raw'             => Options::tax_featured_info(),
				'content_classes' => 'elementor-panel-alert elementor-panel-alert-info',
			]
		);
		$categories = new Repeater();
		$categories->add_control(
			'category',
			[
				'label'   => esc_html__( 'Select a Category', 'foxiz-core' ),
				'type'    => Controls_Manager::SELECT,
				'options' => Options::cat_slug_dropdown( 'post', esc_html__( '- Select a category -', 'foxiz-core' ) ),
				'default' => 0,
			]
		);
		$categories->add_control(
			'tax_id',
			[
				'label'       => esc_html__( 'or Term ID', 'foxiz-core' ),
				'description' => esc_html__( 'Input the tag or taxonomy Term ID; ensure that the featured image for this taxonomy is set for display in Posts > Edit "your taxonomy".', 'foxiz-core' ),
				'type'        => Controls_Manager::TEXT,
				'ai'          => [ 'active' => false ],
				'default'     => '',
			]
		);
		$this->add_control(
			'categories',
			[
				'label'       => esc_html__( 'Add Taxonomies', 'foxiz-core' ),
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $categories->get_controls(),
				'default'     => [
					[
						'category' => '',
						'tax_id'   => '',
					],
				],
				'title_field' => '{{{ tax_id ? "Term ID: " + tax_id : "Category: " + category }}}',
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'design_section', [
				'label' => esc_html__( 'Block Design', 'foxiz-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'feat',
			[
				'label'       => esc_html__( 'Featured Image', 'foxiz-core' ),
				'type'        => Controls_Manager::SELECT,
				'description' => esc_html__( 'Enable or disable the featured image.', 'foxiz-core' ),
				'options'     => Options::switch_dropdown( false ),
				'default'     => '1',
			]
		);
		$this->add_responsive_control(
			'featured_width', [
				'label'       => esc_html__( 'Featured Image Width', 'foxiz-core' ),
				'type'        => Controls_Manager::NUMBER,
				'description' => esc_html__( 'Input custom width values (in pixels) for the taxonomy featured image.', 'foxiz-core' ),
				'selectors'   => [
					'{{WRAPPER}}' => '--featured-width: {{VALUE}}px',
				],
			]
		);
		$this->add_control(
			'title_tag',
			[
				'label'       => esc_html__( 'Title HTML Tag', 'foxiz-core' ),
				'type'        => Controls_Manager::SELECT,
				'description' => Options::heading_html_description(),
				'options'     => Options::heading_html_dropdown(),
				'default'     => '0',
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label'    => esc_html__( 'Title Font', 'foxiz-core' ),
				'name'     => 'category_font',
				'selector' => '{{WRAPPER}} .cbox-title > *',
			]
		);
		$this->add_control(
			'count_posts',
			[
				'label'       => esc_html__( 'Count Posts', 'foxiz-core' ),
				'type'        => Controls_Manager::SELECT,
				'description' => Options::count_posts_description(),
				'options'     => Options::count_posts_dropdown(),
				'default'     => '1',
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label'    => esc_html__( 'Count Posts Font', 'foxiz-core' ),
				'name'     => 'count_font',
				'selector' => '{{WRAPPER}} .cbox-count.is-meta',
			]
		);
		$this->add_control(
			'follow',
			[
				'label'       => esc_html__( 'Follow Button', 'foxiz-core' ),
				'type'        => Controls_Manager::SELECT,
				'options'     => Options::switch_dropdown( false ),
				'description' => esc_html__( 'Enable or disable the follow button.', 'foxiz-core' ),
				'default'     => '-1',
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'rounded_section', [
				'label' => esc_html__( 'Rounded Corner', 'foxiz-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'box_border',
			[
				'label'       => esc_html__( 'Border Radius', 'foxiz-core' ),
				'type'        => Controls_Manager::NUMBER,
				'description' => Options::border_description(),
				'selectors'   => [
					'{{WRAPPER}}' => '--wrap-border: {{VALUE}}px;',
				],
			]
		);
		$this->add_control(
			'featured_border',
			[
				'label'     => esc_html__( 'Featured Image Border Radius', 'foxiz-core' ),
				'type'      => Controls_Manager::NUMBER,
				'selectors' => [
					'{{WRAPPER}}' => '--featured-border: {{VALUE}}px;',
				],
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'color_section', [
				'label' => esc_html__( 'Text Color Scheme', 'foxiz-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'color_scheme',
			[
				'label'       => esc_html__( 'Text Color Scheme', 'foxiz-core' ),
				'type'        => Controls_Manager::SELECT,
				'description' => Options::color_scheme_description(),
				'options'     => [
					'0' => esc_html__( 'Default (Dark Text)', 'foxiz-core' ),
					'1' => esc_html__( 'Light Text', 'foxiz-core' ),
				],
				'default'     => '0',
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'spacing_section', [
				'label' => esc_html__( 'Spacing', 'foxiz-core' ),
				'tab'   => Controls_Manager::TAB_LAYOUT,
			]
		);
		$this->add_responsive_control(
			'item_padding',
			[
				'label'      => esc_html__( 'Inner Padding', 'foxiz-core' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .cbox' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'gap', [
				'label'       => esc_html__( 'Gap', 'foxiz-core' ),
				'type'        => Controls_Manager::NUMBER,
				'description' => esc_html__( 'Input custom margin values (in pixels) between items.', 'foxiz-core' ),
				'selectors'   => [ '{{WRAPPER}}' => '--item-gap: {{VALUE}}px;' ],
			]
		);
		$this->add_responsive_control(
			'item_width', [
				'label'       => esc_html__( 'Item Min Width', 'foxiz-core' ),
				'type'        => Controls_Manager::NUMBER,
				'description' => esc_html__( 'Input a minimum width (in pixels) for the item.', 'foxiz-core' ),
				'selectors'   => [ '{{WRAPPER}}' => '--cbox-width: {{VALUE}}px;' ],
			]
		);
		$this->end_controls_section();
	}

	protected function render() {

		if ( function_exists( 'foxiz_get_categories_6' ) ) {
			$settings         = $this->get_settings();
			$settings['uuid'] = 'uid_' . $this->get_id();
			echo foxiz_get_categories_6( $settings );
		}
	}
}