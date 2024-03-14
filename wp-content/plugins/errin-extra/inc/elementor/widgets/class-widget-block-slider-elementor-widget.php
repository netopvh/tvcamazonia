<?php

/**
 * Elementor Widget
 * @package Errin
 * @since 1.0.0
 */

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly.

class errin_widget_block_slider extends Widget_Base
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
        return 'widget-block-slider';
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
        return esc_html__('Widget Block Slider', 'errin-extra');
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
        return 'eicon-post-slider';
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

        // Post Sort

        $this->add_control(
            'post_sorting',
            [
                'type'    => Controls_Manager::SELECT2,
                'label' => esc_html__('Post Sorting', 'errin-extra'),
                'default' => 'date',
                'options' => [
                    'date' => esc_html__('Recent Post', 'errin-extra'),
                    'rand' => esc_html__('Random Post', 'errin-extra'),
                    'title'         => __('Title Sorting Post', 'errin-extra'),
                    'modified' => esc_html__('Last Modified Post', 'errin-extra'),
                    'comment_count' => esc_html__('Most Commented Post', 'errin-extra'),

                ],
            ]
        );

        // Post Order

        $this->add_control(
            'post_ordering',
            [
                'type'    => Controls_Manager::SELECT2,
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
            'post_categories',
            [
                'type'      => Controls_Manager::SELECT2,
                'label' => esc_html__('Select Categories', 'errin-extra'),
                'options'   => $this->posts_cat_list(),
                'label_block' => true,
                'multiple'  => true,
            ]
        );



        // Post Items.

        $this->add_control(
            'post_number',
            [
                'label'         => esc_html__('Number Of Posts', 'errin-extra'),
                'type'          => Controls_Manager::NUMBER,
                'default'       => '8',
            ]
        );

        $this->add_control(
            'enable_offset_post',
            [
                'label' => esc_html__('Enable Skip Post', 'errin-extra'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'errin-extra'),
                'label_off' => esc_html__('No', 'errin-extra'),
                'default' => 'no',

            ]
        );

        $this->add_control(
            'post_offset_count',
            [
                'label'         => esc_html__('Skip Post Count', 'errin-extra'),
                'type'          => Controls_Manager::NUMBER,
                'default'       => '1',
                'condition' => ['enable_offset_post' => 'yes']

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
            'display_cat',
            [
                'label' => esc_html__('Display Category Name', 'errin-extra'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'errin-extra'),
                'label_off' => esc_html__('No', 'errin-extra'),
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'display_author',
            [
                'label' => esc_html__('Display Author', 'errin-extra'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'errin-extra'),
                'label_off' => esc_html__('No', 'errin-extra'),
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'display_date',
            [
                'label' => esc_html__('Display Date', 'errin-extra'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'errin-extra'),
                'label_off' => esc_html__('No', 'errin-extra'),
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
                'selector' => '{{WRAPPER}} .widget_block_slider_wrap .home-top-block-content .htbc_category a',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => esc_html__('Post Title Typography', 'errin-extra'),
                'selector' => '{{WRAPPER}} .widget_block_slider_wrap .home-top-block-content h3.post-title',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'author_typography',
                'label' => esc_html__('Author Typography', 'errin-extra'),
                'selector' => '{{WRAPPER}} .widget_block_slider_wrap .home-top-block-content .htbc-meta-items .author-name a',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'meta_typography',
                'label' => esc_html__('Date Typography', 'errin-extra'),
                'selector' => '{{WRAPPER}} .widget_block_slider_wrap .home-top-block-content .htbc-date-box',
            ]
        );

        $this->end_controls_section();
    }



    protected function render()
    {


        $settings = $this->get_settings_for_display();

        $section_widget_title = $settings['section_widget_title'];

        $post_count = $settings['post_number'];

        $post_order  = $settings['post_ordering'];
        $post_sortby = $settings['post_sorting'];

        $display_blog_cat = $settings['display_cat'];
        $display_blog_author = $settings['display_author'];
        $display_blog_date = $settings['display_date'];


        $args = [
            'post_type' => 'post',
            'post_status' => 'publish',
            'order' => $settings['post_ordering'],
            'posts_per_page' => $settings['post_number'],
            'ignore_sticky_posts' => 1,
        ];

        // Category
        if (!empty($settings['post_categories'])) {
            $args['category_name'] = implode(',', $settings['post_categories']);
        }

        // Post Sorting
        if (!empty($settings['post_sorting'])) {
            $args['orderby'] = $settings['post_sorting'];
        }

        // Post Offset		
        if ($settings['enable_offset_post'] == 'yes') {
            $args['offset'] = $settings['post_offset_count'];
        }

        // Query
        $query = new \WP_Query($args);

?>



        <script type="text/javascript">
            jQuery(document).ready(function($) {
                var swiper = new Swiper(".widget_block_carousel", {
                    slidesPerView: 1,
                    spaceBetween: 30,
                    grabCursor: true,
                    navigation: {
                        nextEl: ".swiper-button-next",
                        prevEl: ".swiper-button-prev",
                    },
                });
            });
        </script>

        <?php if ($section_widget_title) { ?>
            <div class="section_widget_title">
                <h3 class="sw_title"><?php echo esc_html($section_widget_title); ?></h3>
            </div>
        <?php } ?>


        <?php if ($query->have_posts()) : ?>

            <div class="widget_block_slider_wrap widget_block_carousel swiper">
                <div class="swiper-wrapper">
                    <?php while ($query->have_posts()) : $query->the_post(); ?>
                        <div class="home-top-block-inner swiper-slide">
                            <div class="home-top-thumbnail-wrap">
                                <a href="<?php the_permalink(); ?>" class="home-top-thumbnail-one">
                                    <img src="<?php echo esc_attr(esc_url(get_the_post_thumbnail_url(null, 'full'))); ?>" alt="<?php the_title_attribute(); ?>">
                                </a>
                            </div>

                            <div class="home-top-block-content">
                                <?php if( 'yes' == $display_blog_cat ){ ?>
                                <div class="htbc_category">
                                    <?php require ERRIN_THEME_DIR . '/template-parts/cat-color.php'; ?>
                                </div>
                                <?php } ?>
                                <h3 class="post-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h3>

                                <div class="htbc-meta-items">
                                <?php if( 'yes' == $display_blog_author ){ ?>
                                    <div class="author-name">
                                        <?php printf(
                                            '%1$s<a href="%2$s">%3$s</a>',
                                            get_avatar(get_the_author_meta('ID'), 32),
                                            esc_url(get_author_posts_url(get_the_author_meta('ID'))),
                                            get_the_author()
                                        ); ?>
                                    </div>
                                    <?php } 
                                    if( 'yes' == $display_blog_date){
                                    ?>
                                    <div class="htbc-date-box">
                                    <i class="icon-calendar1"></i> <?php echo esc_html(get_the_date('F j, Y')); ?>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
                <div class="wbc_swiper_nav">
                    <div class="swiper-button-next wbc_next"></div>
                    <div class="swiper-button-prev wbc_prev"></div>
                </div>
            </div>

            <?php wp_reset_postdata(); ?>

        <?php endif; ?>


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


Plugin::instance()->widgets_manager->register_widget_type(new errin_widget_block_slider());
