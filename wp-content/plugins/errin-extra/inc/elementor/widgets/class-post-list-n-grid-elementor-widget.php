<?php

/**
 * Elementor Widget
 * @package Errin
 * @since 1.0.0
 */

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly.

class errin_post_list_n_grid extends Widget_Base
{

	/**
	 * Get widget name.
	 *
	 * Retrieve Elementor widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name()
	{
		return 'post-list-n-grid';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Elementor widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title()
	{
		return esc_html__('Posts List & Grid Style', 'errin-extra');
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Elementor widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon()
	{
		return 'eicon-inner-section';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Elementor widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories()
	{
		return ['errin_widgets'];
	}

	/**
	 * Register Elementor widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */


	protected function register_controls()
	{
		$this->post_query_options();
		$this->meta_options();
		$this->design_options();
	}

	/**
	 * Post Query Options
	 */
	private function post_query_options()
	{


		$this->start_controls_section(
			'post_query_option',
			[
				'label' => __('Post Options', 'errin-extra'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'section_widget_title',
			[
				'label' => esc_html__('Title', 'errin-extra'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__('Section Widget Title', 'errin-extra'),
				'description' => esc_html__('If don\'t show section widget title, keep it blank', 'errin-extra'),
				'label_block' => true,
			]
		);


		$this->add_control(
			'post_sortby',
			[
				'label'     => esc_html__('Post sort by', 'errin-extra'),
				'type'      => Controls_Manager::SELECT,
				'default'   => 'latestpost',
				'options'   => [
					'latestpost'      => esc_html__('Latest posts', 'errin-extra'),
					//'popularposts'    => esc_html__('Popular posts', 'errin-extra'),
					'mostdiscussed'    => esc_html__('Most discussed', 'errin-extra'),
					'title'       => esc_html__('Title', 'errin-extra'),
					'name'       => esc_html__('Name', 'errin-extra'),
					'rand'       => esc_html__('Random', 'errin-extra'),
					'ID'       => esc_html__('ID', 'errin-extra'),
				],
			]
		);

		// Post Order

		$this->add_control(
			'post_order',
			[
				'type'    => Controls_Manager::SELECT,
				'label' => esc_html__('Post Ordering', 'errin-extra'),
				'default' => 'DESC',
				'options' => [
					'DESC' => esc_html__('Desecending', 'errin-extra'),
					'ASC' => esc_html__('Ascending', 'errin-extra'),
				],
			]
		);


		// Post Categories

		$this->add_control(
			'post_cats',
			[
				'type'      => Controls_Manager::SELECT2,
				'label' => esc_html__('Select Categories', 'errin-extra'),
				'options'   => $this->posts_cat_list(),
				'label_block' => true,
				'multiple'  => true,
			]
		);

		$this->add_control(
			'post_tags',
			[
				'label' => esc_html__('Select tags', 'errin-extra'),
				'type'      => Controls_Manager::SELECT2,
				'options'   => errin_post_tags(),
				'label_block' => true,
				'multiple'  => true,
			]
		);

		// Post Items.

		$this->add_control(
			'post_count',
			[
				'label'         => esc_html__('Number Of Posts', 'errin-extra'),
				'type'          => Controls_Manager::NUMBER,
				'default'       => '4',
			]
		);

		$this->end_controls_section();
	}

	/**
	 * Meta Options
	 */
	private function meta_options()
	{


		$this->start_controls_section(
			'meta_option',
			[
				'label' => __('Meta Options', 'errin-extra'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'show_cat',
			[
				'label' => esc_html__('Display Category Name', 'errin-extra'),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__('Yes', 'errin-extra'),
				'label_off' => esc_html__('No', 'errin-extra'),
				'default' => 'yes',
			]
		);

		$this->add_control(
			'show_author',
			[
				'label' => esc_html__('Display Author', 'errin-extra'),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__('Yes', 'errin-extra'),
				'label_off' => esc_html__('No', 'errin-extra'),
				'default' => 'yes',
			]
		);

		$this->add_control(
			'show_date',
			[
				'label' => esc_html__('Display Date', 'errin-extra'),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__('Yes', 'errin-extra'),
				'label_off' => esc_html__('No', 'errin-extra'),
				'default' => 'yes',
			]
		);

		$this->add_control(
			'show_comment_count',
			[
				'label' => esc_html__('Display Comment Count', 'errin-extra'),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__('Yes', 'errin-extra'),
				'label_off' => esc_html__('No', 'errin-extra'),
				'default' => 'yes',
			]
		);

		$this->add_control(
			'show_desc',
			[
				'label' => esc_html__('Display Post Excerpt', 'ennlil-extra'),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__('Yes', 'ennlil-extra'),
				'label_off' => esc_html__('No', 'ennlil-extra'),
				'default' => 'yes',
			]
		);


		$this->end_controls_section();
	}

	/**
	 * Design Options
	 */
	private function design_options()
	{


		$this->start_controls_section(
			'design_option',
			[
				'label' => __('Typography', 'errin-extra'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'cat_typography',
				'label' => esc_html__('Category Typography', 'errin-extra'),
				'selector' => '{{WRAPPER}} .post-list-n-grid-content .htbc_category a, {{WRAPPER}} .post_list_n_grid_btm .htbc_category a',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => esc_html__('Post Title Typography', 'errin-extra'),
				'selector' => '{{WRAPPER}} .post-list-n-grid-content h3.post-title, {{WRAPPER}} .post_list_n_grid_btm h3.post-title',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'excerpt_typography',
				'label' => esc_html__('Post Excerpt Typography', 'errin-extra'),
				'selector' => '{{WRAPPER}} .post-list-n-grid-content p',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'author_typography',
				'label' => esc_html__('Author Typography', 'errin-extra'),
				'selector' => '{{WRAPPER}} .post-list-n-grid-content .post-single-custom-meta .post-author-name a, {{WRAPPER}} .post_list_n_grid_btm .htbc-meta-items .author-name a',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'meta_typography',
				'label' => esc_html__('Post Meta Typography', 'errin-extra'),
				'selector' => '{{WRAPPER}} .post-list-n-grid-content .post-view, {{WRAPPER}} .post-list-n-grid-content .post-comment-count, {{WRAPPER}} .post-list-n-grid-content .blog_details__Date, {{WRAPPER}} .post_list_n_grid_btm .htbc-date-box',
			]
		);

		$this->add_control(
			'desc_limit',
			[
				'label'         => esc_html__('Post Excerpt Length', 'ennlil-extra'),
				'type'          => Controls_Manager::NUMBER,
				'default'       => '16',
			]
		);


		$this->end_controls_section();
	}



	protected function render()
	{


		$settings = $this->get_settings_for_display();

		$section_widget_title = $settings['section_widget_title'];
		$show_cat = $settings['show_cat'];
		$show_author = $settings['show_author'];
		$show_date = $settings['show_date'];
		$show_comment_count = $settings['show_comment_count'];
		$show_desc = $settings['show_desc'];



		$arg = [
			'post_type'   =>  'post',
			'post_status' => 'publish',
			'order' => $settings['post_order'],
			'posts_per_page' => $settings['post_count'],
			'tag__in' => $settings['post_tags'],
			'suppress_filters' => false,

		];

		if ($settings['post_cats'] != '' && !empty($settings['post_cats'])) {

			$arg['tax_query'] = array(
				array(
					'taxonomy' => 'category',
					'terms'    => $settings['post_cats'],
					'field' => 'id',
					'include_children' => true,
					'operator' => 'IN'
				),
			);
		}

		switch ($settings['post_sortby']) {
			case 'mostdiscussed':
				$arg['orderby'] = 'comment_count';
				break;
			case 'title':
				$arg['orderby'] = 'title';
				break;
			case 'ID':
				$arg['orderby'] = 'ID';
				break;
			case 'rand':
				$arg['orderby'] = 'rand';
				break;
			case 'name':
				$arg['orderby'] = 'name';
				break;
			default:
				$arg['orderby'] = 'date';
				break;
		}

		$query = new \WP_Query($arg);

		$ajax_json_data = [
			'order' => $settings['post_order'],
			'posts_per_page' => $settings['post_count'],
			'terms'          => $settings['post_cats'],
			'tags'           => $settings['post_tags'],
			'post_sortby'    => $settings['post_sortby'],
			'total_post'     => $query->found_posts,
			'show_cat'       => $settings['show_cat'],
			'show_author'    => $settings['show_author'],
			'show_date'      => $settings['show_date'],
			'show_desc'      =>  $settings['show_desc'],
			'desc_limit'     => $settings['desc_limit'],

		];

		$ajax_json_data = json_encode($ajax_json_data);

		$loadmore_class = 'post-grid-loadmore';

?>

		<?php if ($section_widget_title) { ?>
			<div class="section_widget_title">
				<h3 class="sw_title"><?php echo esc_html($section_widget_title); ?></h3>
			</div>
		<?php } ?>

		<?php if ($query->have_posts()) { ?>

			<div class="post_list_n_grid_wrap">
			<div class="row">

				<?php while ($query->have_posts()) : $query->the_post(); ?>
					<?php if ($query->current_post <= 1) { ?>
						<div class="col-12 post_list_n_grid_top_wrap">
							<div class="post_list_n_grid_top">
								<div class="post-list-n-grid-img">
									<a href="<?php the_permalink(); ?>">
										<img src="<?php echo esc_attr(esc_url(get_the_post_thumbnail_url(null, 'full'))); ?>" alt="<?php the_title_attribute(); ?>">
									</a>
								</div>
								<div class="post-list-n-grid-content">
									<?php if( 'yes' == $show_cat ){ ?>
									<div class="htbc_category">
										<?php require ERRIN_THEME_DIR . '/template-parts/cat-color.php'; ?>
									</div>
									<?php } ?>
									<h3 class="post-title">
										<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
									</h3>

									<div class="post-single-custom-meta">
										<?php if( 'yes' == $show_author ){ ?>
										<div class="post-author-name">
											<?php printf(
												'%1$s<a href="%2$s">%3$s</a>',
												get_avatar(get_the_author_meta('ID'), 32),
												esc_url(get_author_posts_url(get_the_author_meta('ID'))),
												get_the_author()
											); ?>

										</div>
										<?php } 
										if( 'yes' == $show_date){
										?>
										<div class="blog_details__Date">
											<i class="icon-calendar1"></i>
											<?php echo esc_html(get_the_date('F j, Y')); ?>
										</div>
										<?php } 
										if( 'yes' == $show_comment_count){
										?>
										<div class="post-comment-count">
											<i class="icon-messages-11"></i>
											<?php echo esc_html__(get_comments_number(get_the_ID()), 'errin'); ?>
										</div>
										<?php } ?>
									</div>
									<?php if( 'yes' == $show_desc ){ ?>
									<p><?php echo esc_html(wp_trim_words(get_the_excerpt(), $settings['desc_limit'], '')); ?></p>
									<?php } ?>

								</div>
							</div>
						</div>
					<?php } else {	?>
						<div class="col-md-6">
							<div class="post_list_n_grid_btm">

								<div class="home-top-block-inner">
									<div class="home-top-thumbnail-wrap">
										<a href="<?php the_permalink(); ?>" class="home-top-thumbnail-one">
											<img src="<?php echo esc_attr(esc_url(get_the_post_thumbnail_url(null, 'full'))); ?>" alt="<?php the_title_attribute(); ?>">
										</a>
									</div>

									<div class="home-top-block-content">
									<?php if( 'yes' == $show_cat ){ ?>
										<div class="htbc_category">
											<?php require ERRIN_THEME_DIR . '/template-parts/cat-color.php'; ?>
										</div>
										<?php } ?>
										<h3 class="post-title">
											<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
										</h3>

										<div class="htbc-meta-items">
										<?php if( 'yes' == $show_author ){ ?>
											<div class="author-name">
												<?php printf(
													'%1$s<a href="%2$s">%3$s</a>',
													get_avatar(get_the_author_meta('ID'), 32),
													esc_url(get_author_posts_url(get_the_author_meta('ID'))),
													get_the_author()
												); ?>
											</div>
											<?php } 
											if( 'yes' == $show_date){
											?>

											<div class="htbc-date-box">
											<i class="icon-calendar1"></i> <?php echo esc_html(get_the_date('F j, Y')); ?>
											</div>
											<?php } ?>
										</div>
									</div>
								</div>

							</div>
						</div>
					<?php } ?>
				<?php endwhile; ?>
			</div>
			</div>
		<?php } ?>

<?php }


	protected function content_template()
	{
	}

	public function posts_cat_list()
	{

		$terms = get_terms(array(
			'taxonomy'    => 'category',
			'hide_empty'  => false,
			'posts_per_page' => -1,
		));

		$cat_list = [];
		foreach ($terms as $post) {
			$cat_list[$post->term_id]  = [$post->name];
		}
		return $cat_list;
	}
}


Plugin::instance()->widgets_manager->register_widget_type(new errin_post_list_n_grid());
