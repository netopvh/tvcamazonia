<?php

/**
 * @package errin
 */
if (!class_exists('Errin_Footer_Socials')) {
    class Errin_Footer_Socials extends WP_Widget
    {
        /**
         * Register widget with WordPress.
         */
        function __construct()
        {
            parent::__construct('errin_footer_socials', esc_html__('Errin: Footer Socials', 'errin-extra'), array(
                'description' => esc_html__('About author wisget for sidebar widgets')
            ));
        }

        public function widget($args, $instance)
        {


            echo $args['before_widget'];

            if (!empty($instance['title'])) {
                echo $args['before_title'] . $instance['title']  . $args['after_title'];
            }
?>

            <div class="social_widget_wrap">
                <div class="fsocial_content">
                    
                        <?php if(!empty($instance['facebook_url'])){ ?>
                            <a href="<?php echo esc_url($instance['facebook_url']); ?>"><i class="ri-facebook-fill"></i><?php echo esc_html__('Facebook', 'errin-extra');?></a>
                        <?php }  if(!empty($instance['twitter_url'])){ ?>
                            <a href="<?php echo esc_url($instance['twitter_url']); ?>"><i class="ri-twitter-fill"></i><?php echo esc_html__('Twitter', 'errin-extra');?></a>
                        <?php } if(!empty($instance['linkedin_url'])){ ?>
                            <a href="<?php echo esc_url($instance['linkedin_url']); ?>"><i class="ri-linkedin-fill"></i><?php echo esc_html__('Linkedin', 'errin-extra');?></a>
                        <?php } if(!empty($instance['instagram_url'])){ ?>
                            <a href="<?php echo esc_url($instance['instagram_url']); ?>"><i class="ri-instagram-line"></i><?php echo esc_html__('Instagram', 'errin-extra');?></a>
                        <?php } if(!empty($instance['youtube_url'])){ ?>
                            <a href="<?php echo esc_url($instance['youtube_url']); ?>"><i class="ri-youtube-fill"></i><?php echo esc_html__('Youtube', 'errin-extra');?></a>
                        <?php } ?>
                    
                </div>
            </div>

        <?php
            echo $args['after_widget'];
        }

        public function form($instance)
        {
        ?>

            <p>
                <label for="<?php echo $this->get_field_id('title'); ?>"><?php echo esc_html__('Title:', 'errin-extra'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php if (!empty($instance['title'])) { echo esc_html__($instance['title'], 'errin-extra'); } ?>">
            </p>
            <p>
                <label for="<?php echo $this->get_field_id('facebook_url'); ?>"><?php echo esc_html__('Facebook Profile Link:', 'errin-extra'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id('facebook_url'); ?>" name="<?php echo $this->get_field_name('facebook_url'); ?>" type="text" value="<?php if (!empty($instance['facebook_url'])) { echo $instance['facebook_url']; } ?>">
            </p>
            <p>
                <label for="<?php echo $this->get_field_id('twitter_url'); ?>"><?php echo esc_html__('Twitter Profile Link:', 'errin-extra'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id('twitter_url'); ?>" name="<?php echo $this->get_field_name('twitter_url'); ?>" type="text" value="<?php if (!empty($instance['twitter_url'])) { echo $instance['twitter_url']; } ?>">
            </p>
            <p>
                <label for="<?php echo $this->get_field_id('linkedin_url'); ?>"><?php echo esc_html__('Linkedin_url Profile Link:', 'errin-extra'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id('linkedin_url'); ?>" name="<?php echo $this->get_field_name('linkedin_url'); ?>" type="text" value="<?php if (!empty($instance['linkedin_url'])) { echo $instance['linkedin_url']; } ?>">
            </p>
            <p>
                <label for="<?php echo $this->get_field_id('instagram_url'); ?>"><?php echo esc_html__('Instagram_url Profile Link:', 'errin-extra'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id('instagram_url'); ?>" name="<?php echo $this->get_field_name('instagram_url'); ?>" type="text" value="<?php if (!empty($instance['instagram_url'])) { echo $instance['instagram_url']; } ?>">
            </p>
            <p>
                <label for="<?php echo $this->get_field_id('youtube_url'); ?>"><?php echo esc_html__('Youtube_url Profile Link:', 'errin-extra'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id('youtube_url'); ?>" name="<?php echo $this->get_field_name('youtube_url'); ?>" type="text" value="<?php if (!empty($instance['youtube_url'])) { echo $instance['youtube_url']; } ?>">
            </p>


<?php
        }


        public function update( $new_instance, $old_instance ) {
            $instance = array();
            $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
            $instance['facebook_url'] = ( ! empty( $new_instance['facebook_url'] ) ) ? sanitize_text_field( $new_instance['facebook_url'] ) : '';
            $instance['twitter_url'] = ( ! empty( $new_instance['twitter_url'] ) ) ? sanitize_text_field( $new_instance['twitter_url'] ) : '';
            $instance['linkedin_url'] = ( ! empty( $new_instance['linkedin_url'] ) ) ? sanitize_text_field( $new_instance['linkedin_url'] ) : '';
            $instance['instagram_url'] = ( ! empty( $new_instance['instagram_url'] ) ) ? sanitize_text_field( $new_instance['instagram_url'] ) : '';
            $instance['youtube_url'] = ( ! empty( $new_instance['youtube_url'] ) ) ? sanitize_text_field( $new_instance['youtube_url'] ) : '';
    
            return $instance;
        }

    }
}



// register Contact  Widget widget
function errin_footer_socials_widget()
{
    register_widget('Errin_Footer_Socials');
}
add_action('widgets_init', 'errin_footer_socials_widget');
