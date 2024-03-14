<?php

/**
 * @package errin
 */
if (!class_exists('Errin_About_Author')) {
    class Errin_About_Author extends WP_Widget
    {
        /**
         * Register widget with WordPress.
         */
        function __construct()
        {
            parent::__construct('errin_about_author', esc_html__('Errin: About Author', 'errin-extra'), array(
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

            <div class="author_about_wrap">
                <div class="author_about_content" style="background-image: url(<?php echo esc_url(ERRIN_EXTRA_IMG . '/world-map-png.png'); ?>)">
                    <h4><?php if(!empty($instance['author_name'])){ echo $instance['author_name']; }?></h4>
                    <p><?php if(!empty($instance['author_bio'])){ echo $instance['author_bio']; }?></p>
                    <div class="author_social_n_img">
                        <div class="autho_social">
                            <span class="sos_title"><?php echo esc_html__('Follow Me', 'errin-extra'); ?></span>
                            <div class="sos_profile">
                                <?php if(!empty($instance['facebook_url'])){ ?>
                                    <a href="<?php echo esc_url($instance['facebook_url']); ?>"><i class="ri-facebook-fill"></i></a>
                                <?php }  if(!empty($instance['twitter_url'])){ ?>
                                    <a href="<?php echo esc_url($instance['twitter_url']); ?>"><i class="ri-twitter-fill"></i></a>
                                <?php } if(!empty($instance['linkedin_url'])){ ?>
                                    <a href="<?php echo esc_url($instance['linkedin_url']); ?>"><i class="ri-linkedin-fill"></i></a>
                                <?php } if(!empty($instance['instagram_url'])){ ?>
                                    <a href="<?php echo esc_url($instance['instagram_url']); ?>"><i class="ri-instagram-line"></i></a>
                                <?php } if(!empty($instance['youtube_url'])){ ?>
                                    <a href="<?php echo esc_url($instance['youtube_url']); ?>"><i class="ri-youtube-fill"></i></a>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="autho_img">
                            <img src="<?php if(!empty($instance['author_imge'])){ echo esc_url( $instance['author_imge']); }?>" alt="<?php if(!empty($instance['title'])){ $instance['title']; }?>">
                        </div>

                    </div>
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
                <label for="<?php echo $this->get_field_id('author_name'); ?>"><?php echo esc_html__('Author Name:', 'errin-extra'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id('author_name'); ?>" name="<?php echo $this->get_field_name('author_name'); ?>" type="text" value="<?php if (!empty($instance['author_name'])) {  echo esc_html__($instance['author_name'], 'errin-extra'); } ?>">
            </p>
            <p>
                <label for="<?php echo $this->get_field_id('author_bio'); ?>"><?php echo esc_html__('Author Bio:', 'errin-extra'); ?></label>
                <textarea class="widefat" id="<?php echo $this->get_field_id('author_bio'); ?>" name="<?php echo $this->get_field_name('author_bio'); ?>"><?php if (!empty($instance['author_bio'])) { echo esc_html__($instance['author_bio'], 'errin-extra'); } ?></textarea>
            </p>
            <p>
                <label for="<?php echo $this->get_field_id('author_imge'); ?>"><?php echo esc_html__('Author Image:', 'errin-extra'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id('author_imge'); ?>" name="<?php echo $this->get_field_name('author_imge'); ?>" type="text" value="<?php if (!empty($instance['author_imge'])) { echo $instance['author_imge']; } ?>">
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
            $instance['author_name'] = ( ! empty( $new_instance['author_name'] ) ) ? sanitize_text_field( $new_instance['author_name'] ) : '';
            $instance['author_bio'] = ( ! empty( $new_instance['author_bio'] ) ) ? sanitize_text_field( $new_instance['author_bio'] ) : '';
            $instance['author_imge'] = ( ! empty( $new_instance['author_imge'] ) ) ? sanitize_text_field( $new_instance['author_imge'] ) : '';
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
function errin_about_author_widget()
{
    register_widget('Errin_About_Author');
}
add_action('widgets_init', 'errin_about_author_widget');
