<?php

/**
 * @package errin
 */
if (!class_exists('Errin_Newsletter')) {
    class Errin_Newsletter extends WP_Widget
    {
        /**
         * Register widget with WordPress.
         */
        function __construct()
        {
            parent::__construct('errin_newsletter', esc_html__('Errin: Newsletter', 'errin-extra'), array(
                'description' => esc_html__('Newsletter Wisget for sidebar widgets')
            ));
        }

        public function widget($args, $instance)
        {
            
            echo $args['before_widget'];

            if(!empty($instance['title'])){
                echo $args['before_title'] . $instance['title']  . $args['after_title'];
            }
?>

            <div class="newsletter__wrap">
                <div class="newsletter__content" style="background-image: url(<?php if(!empty($instance['nlbg_image'])){ echo esc_url($instance['nlbg_image']); } ?>);">
                    <h4><?php if(!empty($instance['inner_title'])){ echo esc_html__($instance['inner_title'], 'errin-extra'); } ?></h4>
                    <p><?php if(!empty($instance['short_desc'])){ echo esc_html__($instance['short_desc'], 'errin-extra'); } ?></p>

                    <div class="sidebar_nl__form">
                        <?php if(!empty($instance['form_shortcode'])){ echo do_shortcode($instance['form_shortcode']); } ?>
                    </div>

                </div>
            </div>
<?php
            echo $args['after_widget'];
        }

        public function form($instance){
            ?>

            <p>
                <label for="<?php echo $this->get_field_id('title'); ?>"><?php echo esc_html__('Title:', 'errin-extra'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php if(!empty($instance['title'])){echo esc_html__($instance['title'], 'errin-extra');} ?>">
            </p>
            <p>
                <label for="<?php echo $this->get_field_id('inner_title'); ?>"><?php echo esc_html__('Inner Title:', 'errin-extra'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id('inner_title'); ?>" name="<?php echo $this->get_field_name('inner_title'); ?>" type="text" value="<?php if(!empty($instance['inner_title'])){echo esc_html__($instance['inner_title'], 'errin-extra');} ?>">
            </p>
            <p>
                <label for="<?php echo $this->get_field_id('short_desc'); ?>"><?php echo esc_html__('Short Description:', 'errin-extra'); ?></label>
                <textarea class="widefat" id="<?php echo $this->get_field_id('short_desc'); ?>" name="<?php echo $this->get_field_name('short_desc'); ?>"><?php if(!empty($instance['short_desc'])){echo esc_html__($instance['short_desc'], 'errin-extra');} ?></textarea>
            </p>
            <p>
                <label for="<?php echo $this->get_field_id('form_shortcode'); ?>"><?php echo esc_html__('Form ShortCode:', 'errin-extra'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id('form_shortcode'); ?>" name="<?php echo $this->get_field_name('form_shortcode'); ?>" type="text" value="<?php if(!empty($instance['form_shortcode'])){echo $instance['form_shortcode'];} ?>">
            </p>
            <p>
                <label for="<?php echo $this->get_field_id('nlbg_image'); ?>"><?php echo esc_html__('Newsletter Background Image Url:', 'errin-extra'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id('nlbg_image'); ?>" name="<?php echo $this->get_field_name('nlbg_image'); ?>" type="text" value="<?php if(!empty($instance['nlbg_image'])){echo $instance['nlbg_image'];} ?>">
            </p>
            

            <?php
        }


        public function update( $new_instance, $old_instance ) {
            $instance = array();
            $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
            $instance['inner_title'] = ( ! empty( $new_instance['inner_title'] ) ) ? sanitize_text_field( $new_instance['inner_title'] ) : '';
            $instance['short_desc'] = ( ! empty( $new_instance['short_desc'] ) ) ? sanitize_text_field( $new_instance['short_desc'] ) : '';
            $instance['form_shortcode'] = ( ! empty( $new_instance['form_shortcode'] ) ) ? sanitize_text_field( $new_instance['form_shortcode'] ) : '';
            $instance['nlbg_image'] = ( ! empty( $new_instance['nlbg_image'] ) ) ? sanitize_text_field( $new_instance['nlbg_image'] ) : '';
               
            return $instance;
        }

    }
}



// register Contact  Widget widget
function errin_newsletter_widget()
{
    register_widget('Errin_Newsletter');
}
add_action('widgets_init', 'errin_newsletter_widget');
