<?php

/**
 * Elementor Widget
 * @package Bloggi
 * @since 1.0.0
 */

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly.

class Errin_Post_List_Tabs extends Widget_Base
{

	public function get_name()
	{
		return 'post-list-tabs';
	}

	public function get_title()
	{
		return esc_html__('Post List Tabs', 'errin-core');
	}

	public function get_icon()
	{
		return 'eicon-tabs';
	}

	public function get_categories()
	{
		return ['errin_widgets'];
	}

	protected function register_controls()
	{

		/**
		 * Tab Item Options
		 */

		$this->start_controls_section(
			'tab_option',
			[
				'label' => __('Tabs and Section Settings', 'errin-core'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'tabs',
			[
				'label' => esc_html__('Tab Items', 'errin-core'),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'tab_title' => esc_html__('Add Tab Item Menu', 'errin-core'),
					],
				],

				'fields' => [

					[
						'name' => 'post_categories',
						'label' => esc_html__('Select Categories', 'errin-core'),
						'type'      => Controls_Manager::SELECT2,
						'options'   => $this->posts_cat_list(),
						'label_block' => true,
						'multiple'  => true,
						'placeholder' => __('All Categories', 'errin-core'),
					],

					[
						'name' => 'tab_menu_name',
						'label'         => esc_html__('Tab Menu Name', 'errin-core'),
						'type'          => Controls_Manager::TEXT,
						'default'       => 'Latest',
					],

					[
						'name' => 'enable_offset_post',
						'label'         => esc_html__('Enable Skip Post', 'errin-core'),
						'type' => Controls_Manager::SWITCHER,
						'label_on' => esc_html__('Yes', 'errin-core'),
						'label_off' => esc_html__('No', 'errin-core'),
						'default' => 'no',
					],

					[
						'name' => 'post_offset_count',
						'label'         => esc_html__('Skip Post Count', 'errin-core'),
						'type'          => Controls_Manager::NUMBER,
						'default'       => '1',
						'condition' => ['enable_offset_post' => 'yes']
					],

				],
			]
		);


		$this->end_controls_section();


		/**
		 * Post Query Options
		 */

		$this->start_controls_section(
			'post_query_option',
			[
				'label' => __('Post Options', 'errin-core'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		// Post Items
		$this->add_control(
			'post_number',
			[
				'label'         => esc_html__('Number Of Posts Show', 'errin-core'),
				'type'          => Controls_Manager::NUMBER,
				'default'       => '4',
			]
		);

		// Post Sort
		$this->add_control(
			'post_sorting',
			[
				'type'    => Controls_Manager::SELECT2,
				'label' => esc_html__('Post Sorting', 'errin-core'),
				'default' => 'date',
				'options' => [
					'date' => esc_html__('Recent Post', 'errin-core'),
					'rand' => esc_html__('Random Post', 'errin-core'),
					'title'         => __('Title Sorting Post', 'errin-core'),
					'modified' => esc_html__('Last Modified Post', 'errin-core'),
					'comment_count' => esc_html__('Most Commented Post', 'errin-core'),

				],
			]
		);

		// Post Order
		$this->add_control(
			'post_ordering',
			[
				'type'    => Controls_Manager::SELECT2,
				'label' => esc_html__('Post Ordering', 'errin-core'),
				'default' => 'DESC',
				'options' => [
					'DESC' => esc_html__('Desecending', 'errin-core'),
					'ASC' => esc_html__('Ascending', 'errin-core'),
				],
			]
		);

		$this->add_control(
			'show_post_date',
			[
				'label' => esc_html__('Show Post Date', 'errin-core'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__('Show', 'errin-core'),
				'label_off' => esc_html__('Hide', 'errin-core'),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->end_controls_section();

		/**
		 * Post Query Options
		 */

		 $this->start_controls_section(
			'post_design_option',
			[
				'label' => __('Typography', 'errin-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'tab_title_typography',
				'label' => esc_html__('Title Typography', 'errin-extra'),
				'selector' => '{{WRAPPER}} .post_list_tabs_inner .plpn_content h4',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'tab_date_typography',
				'label' => esc_html__('Date Typography', 'errin-extra'),
				'selector' => '{{WRAPPER}} .post_list_tabs_inner .plpn_content span',
			]
		);


		$this->end_controls_section();


	}

	protected function render()
	{
		$settings = $this->get_settings_for_display();

		$post_number        = $settings['post_number'];
		$post_order         = $settings['post_ordering'];
		$post_sortby        = $settings['post_sorting'];
		$tabs               = $settings['tabs'];

		$show_post_date = $settings['show_post_date'];

?>

		<div class="theme-post-tab-wrapper blog-tab-wrapper">
			<div class="post-tab-block-element news_tab_Block">
				<ul class="nav nav-tabs plpn_tabs" role="tablist">
					<?php
					foreach ($tabs as $tab_Menu_key => $value) {

						if ($tab_Menu_key == 0) {
							echo '<li class="nav-item"><a class="nav-link post-tab-nav-btn active" href="#tab' . $this->get_id() . $value['_id'] . '" data-toggle="list" role="tab"><span class="tab_menu_Item">' . $value['tab_menu_name'] . '</span></a></li>';
						} else {
							echo '<li class="nav-item"><a class="nav-link post-tab-nav-btn" href="#tab' . $this->get_id() . $value['_id'] . '" data-toggle="list" role="tab"><span class="tab_menu_Item">' . $value['tab_menu_name'] . '</span></a></li>';
						}
					}
					?>
				</ul>

				<div class="theme_post_Tab__content theme_post_Tabone__content tab-content">

					<?php

					foreach ($tabs as $tab_Content_key => $value) {

						if ($tab_Content_key == 0) {
							echo '<div role="tabpanel" class="tab-pane fade active show" id="tab' . $this->get_id() . $value['_id'] . '">';
						} else {
							echo '<div role="tabpanel" class="tab-pane fade" id="tab' . $this->get_id() . $value['_id'] . '">';
						}

						$args = array(
							'post_type'   =>  'post',
							'post_status' => 'publish',
							'posts_per_page' => $post_number,
							'order' => $post_order,
							'orderby' => $post_sortby,
							'ignore_sticky_posts' => 1,
						);

						// Category

						if (!empty($value['post_categories'])) {
							$args['category_name'] = implode(',', $value['post_categories']);
						}

						// Post Offset

						if ($value['enable_offset_post'] == 'yes') {
							$args['offset'] = $value['post_offset_count'];
						}

						$tabquery = new \WP_Query($args);

					?>

						<?php if ($tabquery->have_posts()) : ?>
							<?php while ($tabquery->have_posts()) : $tabquery->the_post(); ?>

								<div class="post_list_tabs">
									<div class="post_list_tabs_inner">
										<div class="plpn_thumbnail">
											<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
										</div>

										<div class="plpn_content">
											<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
											<?php if('yes' == $show_post_date ){ ?>
											<span><i class="icon-calendar1"></i> <?php echo esc_html(get_the_date( 'F j, Y' )); ?></span>
											<?php } ?>
										</div>
									</div>

								</div>
							<?php endwhile; ?>
							<?php wp_reset_postdata(); ?>
						<?php endif; ?>
				</div>
			<?php } ?>
			</div>
		</div>
		</div>

<?php

	}

	public function posts_cat_list()
	{

		$terms = get_terms(array(
			'taxonomy'    => 'category',
			'hide_empty'  => true
		));

		$cat_list = [];
		foreach ($terms as $post) {
			$cat_list[$post->slug]  = [$post->name];
		}
		return $cat_list;
	}
}


Plugin::instance()->widgets_manager->register(new Errin_Post_List_Tabs());
