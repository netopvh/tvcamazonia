<?php

/**
 * @package errin
 */
if (!class_exists('errin_Recent_Post')) {
    class errin_Recent_Post extends WP_Widget
    {
        /**
         * Register widget with WordPress.
         */
        function __construct()
        {

            $widget_options = array(
                'description'                   => esc_html__('Errin: Recent Posts', 'errin'),
                'customize_selective_refresh'   => true,
            );

            parent::__construct('errin_Recent_Post', esc_html__('Errin: Recent Posts', 'errin'), $widget_options);
        }
        /**
         * Front-end display of widget.
         *
         * @see WP_Widget::widget()
         *
         * @param array $args     Widget arguments.
         * @param array $instance Saved values from database.
         */
        public function widget($args, $instance)
        {

            if (!isset($args['widget_id'])) {

                $args['widget_id'] = $this->id;
            }

            $title = (!empty($instance['title'])) ? $instance['title'] : esc_html__('Recent Posts', 'errin');

            $title = apply_filters('widget_title', $title, $instance, $this->id_base);

            $show_item = (!empty($instance['show_item'])) ? absint($instance['show_item']) : 3;
            $num_title_word = (!empty($instance['num_title_word'])) ? absint($instance['num_title_word']) : 7;


            $show_date = isset($instance['show_date']) ? $instance['show_date'] : true;
            $show_read_time = isset($instance['show_read_time']) ? $instance['show_read_time'] : true;

            echo $args['before_widget'];
            if ($title) :
                echo $args['before_title'];
                echo esc_html($title);
                echo $args['after_title'];
            endif;
            $posts = new WP_Query(array(
                'post_type'      => 'post',
                'ignore_sticky_posts' => 1,
                'posts_per_page' => $show_item,
            )); ?>

        <div class="recent__post__blog__item__wrap">
            <?php
            while ($posts->have_posts()) : $posts->the_post();  ?>
            <div class="rpbiw__inner">
                <div class="recent-post-blog-item">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="recent-postthumb">
                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
                        </div>
                    <?php endif ?>
                    <div class="recent-post-list-inner recent_post_Content">

                        <h4 class="title"><a href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(), $num_title_word, ' '); ?></a></h4>
                        <?php
                        if ($show_date && $show_read_time) { ?>
                            <div class="post-single-custom-meta">
                                <div class="post-author-name">
                                    <?php printf(
                                        '<a href="%1$s">%2$s</a>',
                                        esc_url(get_author_posts_url(get_the_author_meta('ID'))),
                                        get_the_author()
                                    ); ?>

                                </div>
                                <div class="blog_details__Date">
                                    <?php echo esc_html(get_the_date('F j, Y')); ?>
                                </div>
                            </div>
                        <?php }  ?>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
            <a href="<?php echo esc_url(site_url('/blog')); ?>" class="widget-see-btn">See All</a>

            <?php echo $args['after_widget']; ?>

        <?php wp_reset_postdata();
        }
        /**
         * Sanitize widget form values as they are saved.
         *
         * @see WP_Widget::update()
         *
         * @param array $new_instance Values just sent to be saved.
         * @param array $old_instance Previously saved values from database.
         *
         * @return array Updated safe values to be saved.
         */
        public function update($new_instance, $old_instance)
        {
            $instance = $old_instance;
            $instance['title'] = sanitize_text_field($new_instance['title']);
            $instance['show_item'] = (int) $new_instance['show_item'];
            $instance['num_title_word'] = (int) $new_instance['num_title_word'];
            $instance['show_date'] = isset($new_instance['show_date']) ? (bool) $new_instance['show_date'] : false;
            return $instance;
        }

        /**
         * Back-end widget form.
         *
         * @see WP_Widget::form()
         *
         * @param array $instance Previously saved values from database.
         */

        public function form($instance)
        {
            $title              = isset($instance['title']) ? esc_attr($instance['title']) : '';
            $show_item          = isset($instance['show_item']) ? absint($instance['show_item']) : 3;
            $num_title_word     = isset($instance['num_title_word']) ? absint($instance['num_title_word']) : 7;
            $show_date          = isset($instance['show_date']) ? (bool) $instance['show_date'] : true;
            $show_read_time          = isset($instance['show_read_time']) ? (bool) $instance['show_read_time'] : true;
        ?>
            <p><label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php echo esc_html__('Title:', 'errin'); ?></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
            </p>


            <p>
                <label for="<?php echo esc_attr($this->get_field_id('show_item')); ?>"><?php echo esc_html__('No. of Item of posts to show:', 'errin'); ?></label>
                <input class="tiny-text" id="<?php echo esc_attr(esc_attr($this->get_field_id('show_item'))); ?>" name="<?php echo esc_attr($this->get_field_name('show_item')); ?>" type="number" step="1" min="1" value="<?php echo esc_attr($show_item); ?>" size="3" />
            </p>

            <p>
                <label for="<?php echo esc_attr($this->get_field_id('num_title_word')); ?>"><?php echo esc_html__('Title Word', 'errin'); ?></label>
                <input class="tiny-text" id="<?php echo esc_attr(esc_attr($this->get_field_id('num_title_word'))); ?>" name="<?php echo esc_attr($this->get_field_name('num_title_word')); ?>" type="number" step="1" min="1" value="<?php echo esc_attr($num_title_word); ?>" size="3">
            </p>

            <p>
                <input class="checkbox" type="checkbox" <?php checked($show_date); ?> id="<?php echo esc_attr($this->get_field_id('show_date')); ?>" name="<?php echo esc_attr($this->get_field_name('show_date')); ?>" />
                <label for="<?php echo esc_attr($this->get_field_id('show_date')); ?>"><?php echo esc_html__('Display post date?', 'errin'); ?></label>
            </p>
            <p>
                <input class="checkbox" type="checkbox" <?php checked($show_read_time); ?> id="<?php echo esc_attr($this->get_field_id('show_read_time')); ?>" name="<?php echo esc_attr($this->get_field_name('show_read_time')); ?>" />
                <label for="<?php echo esc_attr($this->get_field_id('show_read_time')); ?>"><?php echo esc_html__('Display Read Time?', 'errin'); ?></label>
            </p>
<?php
        }
    }
}



// register Contact  Widget widget
function errin_Recent_Post()
{
    register_widget('errin_Recent_Post');
}
add_action('widgets_init', 'errin_Recent_Post');
