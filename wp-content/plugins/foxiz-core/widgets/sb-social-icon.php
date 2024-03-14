<?php
/** Don't load directly */
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Foxiz_W_Social_Icon', false ) ) {
	class Foxiz_W_Social_Icon extends WP_Widget {

		private $params = [];
		private $widgetID = 'widget-social-icon';

		function __construct() {

			$this->params = [
				'title'       => 'Find Us on Socials',
				'content'     => '',
				'new_tab'     => true,
				'style'       => 1,
				'data_social' => 1,
				'facebook'    => '',
				'twitter'     => '',
				'googlenews'  => '',
				'instagram'   => '',
				'pinterest'   => '',
				'linkedin'    => '',
				'tumblr'      => '',
				'flickr'      => '',
				'skype'       => '',
				'snapchat'    => '',
				'myspace'     => '',
				'youtube'     => '',
				'bloglovin'   => '',
				'digg'        => '',
				'dribbble'    => '',
				'soundcloud'  => '',
				'vimeo'       => '',
				'reddit'      => '',
				'vk'          => '',
				'telegram'    => '',
				'whatsapp'    => '',
				'rss'         => '',
			];

			parent::__construct( $this->widgetID, esc_html__( 'Foxiz - Widget Social Icons/About', 'foxiz-core' ), [
				'classname'   => $this->widgetID,
				'description' => esc_html__( '[Sidebar Widget] Display about me information and social icons in the sidebar.', 'foxiz-core' ),
			] );
		}

		function update( $new_instance, $old_instance ) {

			if ( current_user_can( 'unfiltered_html' ) ) {
				return wp_parse_args( (array) $new_instance, $this->params );
			} else {
				$instance = [];
				foreach ( $new_instance as $id => $value ) {
					$instance[ $id ] = sanitize_text_field( $value );
				}

				return wp_parse_args( $instance, $this->params );
			}
		}

		function form( $instance ) {

			$instance = wp_parse_args( (array) $instance, $this->params );

			foxiz_create_widget_text_field( [
				'id'    => $this->get_field_id( 'title' ),
				'name'  => $this->get_field_name( 'title' ),
				'title' => esc_html__( 'Title', 'foxiz-core' ),
				'value' => $instance['title'],
			] );

			foxiz_create_widget_textarea_field( [
				'id'    => $this->get_field_id( 'content' ),
				'name'  => $this->get_field_name( 'content' ),
				'title' => esc_html__( 'Short biography (raw HTML allowed)', 'foxiz-core' ),
				'value' => $instance['content'],
			] );

			foxiz_create_widget_select_field( [
				'id'      => $this->get_field_id( 'style' ),
				'name'    => $this->get_field_name( 'style' ),
				'title'   => esc_html__( 'Align Content', 'foxiz-core' ),
				'options' => [
					'1' => esc_html__( 'Left', 'foxiz-core' ),
					'2' => esc_html__( 'Center', 'foxiz-core' ),
				],
				'value'   => $instance['style'],
			] );

			foxiz_create_widget_select_field( [
				'id'          => $this->get_field_id( 'data_social' ),
				'name'        => $this->get_field_name( 'data_social' ),
				'title'       => esc_html__( 'Social Profiles Source', 'foxiz-core' ),
				'description' => esc_html__( 'To set social profiles from the Theme Options, Navigate to: <strong>Theme Options -> Social Profiles.</strong>', 'foxiz-core' ),
				'options'     => [
					'1' => esc_html__( 'Theme Options', 'foxiz-core' ),
					'2' => esc_html__( 'Use Custom', 'foxiz-core' ),
				],
				'value'       => $instance['data_social'],
			] );

			foxiz_create_widget_select_field( [
				'id'      => $this->get_field_id( 'new_tab' ),
				'name'    => $this->get_field_name( 'new_tab' ),
				'title'   => esc_html__( 'Open in new tab', 'foxiz-core' ),
				'options' => [
					'1' => esc_html__( '- Default -', 'foxiz-core' ),
					'2' => esc_html__( 'New Tab', 'foxiz-core' ),
				],
				'value'   => $instance['new_tab'],
			] );

			foxiz_create_widget_heading_field( [
				'id'    => $this->get_field_id( 'settings' ),
				'name'  => $this->get_field_name( 'settings' ),
				'title' => esc_html__( 'Social Settings', 'foxiz-core' ),
			] );

			foxiz_create_widget_text_field( [
				'id'    => $this->get_field_id( 'facebook' ),
				'name'  => $this->get_field_name( 'facebook' ),
				'title' => esc_html__( 'Facebook URL', 'foxiz-core' ),
				'value' => $instance['facebook'],
			] );

			foxiz_create_widget_text_field( [
				'id'    => $this->get_field_id( 'twitter' ),
				'name'  => $this->get_field_name( 'twitter' ),
				'title' => esc_html__( 'Twitter URL', 'foxiz-core' ),
				'value' => $instance['twitter'],
			] );

			foxiz_create_widget_text_field( [
				'id'    => $this->get_field_id( 'youtube' ),
				'name'  => $this->get_field_name( 'youtube' ),
				'title' => esc_html__( 'Youtube URL', 'foxiz-core' ),
				'value' => $instance['youtube'],
			] );

			foxiz_create_widget_text_field( [
				'id'    => $this->get_field_id( 'googlenews' ),
				'name'  => $this->get_field_name( 'googlenews' ),
				'title' => esc_html__( 'GoogleNews URL', 'foxiz-core' ),
				'value' => $instance['googlenews'],
			] );

			foxiz_create_widget_text_field( [
				'id'    => $this->get_field_id( 'instagram' ),
				'name'  => $this->get_field_name( 'instagram' ),
				'title' => esc_html__( 'Instagram URL', 'foxiz-core' ),
				'value' => $instance['instagram'],
			] );

			foxiz_create_widget_text_field( [
				'id'    => $this->get_field_id( 'pinterest' ),
				'name'  => $this->get_field_name( 'pinterest' ),
				'title' => esc_html__( 'Pinterest URL', 'foxiz-core' ),
				'value' => $instance['pinterest'],
			] );

			foxiz_create_widget_text_field( [
				'id'    => $this->get_field_id( 'linkedin' ),
				'name'  => $this->get_field_name( 'linkedin' ),
				'title' => esc_html__( 'Linkedin URL', 'foxiz-core' ),
				'value' => $instance['linkedin'],
			] );

			foxiz_create_widget_text_field( [
				'id'    => $this->get_field_id( 'tumblr' ),
				'name'  => $this->get_field_name( 'tumblr' ),
				'title' => esc_html__( 'Tumblr URL', 'foxiz-core' ),
				'value' => $instance['tumblr'],
			] );

			foxiz_create_widget_text_field( [
				'id'    => $this->get_field_id( 'flickr' ),
				'name'  => $this->get_field_name( 'flickr' ),
				'title' => esc_html__( 'Flickr URL', 'foxiz-core' ),
				'value' => $instance['flickr'],
			] );

			foxiz_create_widget_text_field( [
				'id'    => $this->get_field_id( 'skype' ),
				'name'  => $this->get_field_name( 'skype' ),
				'title' => esc_html__( 'Skype URL', 'foxiz-core' ),
				'value' => $instance['skype'],
			] );

			foxiz_create_widget_text_field( [
				'id'    => $this->get_field_id( 'snapchat' ),
				'name'  => $this->get_field_name( 'snapchat' ),
				'title' => esc_html__( 'Snapchat URL', 'foxiz-core' ),
				'value' => $instance['snapchat'],
			] );

			foxiz_create_widget_text_field( [
				'id'    => $this->get_field_id( 'myspace' ),
				'name'  => $this->get_field_name( 'myspace' ),
				'title' => esc_html__( 'Myspace URL', 'foxiz-core' ),
				'value' => $instance['myspace'],
			] );

			foxiz_create_widget_text_field( [
				'id'    => $this->get_field_id( 'bloglovin' ),
				'name'  => $this->get_field_name( 'bloglovin' ),
				'title' => esc_html__( 'Bloglovin URL', 'foxiz-core' ),
				'value' => $instance['bloglovin'],
			] );

			foxiz_create_widget_text_field( [
				'id'    => $this->get_field_id( 'digg' ),
				'name'  => $this->get_field_name( 'digg' ),
				'title' => esc_html__( 'Digg URL', 'foxiz-core' ),
				'value' => $instance['digg'],
			] );

			foxiz_create_widget_text_field( [
				'id'    => $this->get_field_id( 'dribbble' ),
				'name'  => $this->get_field_name( 'dribbble' ),
				'title' => esc_html__( 'Dribbble URL', 'foxiz-core' ),
				'value' => $instance['dribbble'],
			] );

			foxiz_create_widget_text_field( [
				'id'    => $this->get_field_id( 'soundcloud' ),
				'name'  => $this->get_field_name( 'soundcloud' ),
				'title' => esc_html__( 'SoundCloud URL', 'foxiz-core' ),
				'value' => $instance['soundcloud'],
			] );

			foxiz_create_widget_text_field( [
				'id'    => $this->get_field_id( 'vimeo' ),
				'name'  => $this->get_field_name( 'vimeo' ),
				'title' => esc_html__( 'Vimeo URL', 'foxiz-core' ),
				'value' => $instance['vimeo'],
			] );

			foxiz_create_widget_text_field( [
				'id'    => $this->get_field_id( 'reddit' ),
				'name'  => $this->get_field_name( 'reddit' ),
				'title' => esc_html__( 'Reddit URL', 'foxiz-core' ),
				'value' => $instance['reddit'],
			] );

			foxiz_create_widget_text_field( [
				'id'    => $this->get_field_id( 'vk' ),
				'name'  => $this->get_field_name( 'vk' ),
				'title' => esc_html__( 'VKontakte URL', 'foxiz-core' ),
				'value' => $instance['vk'],
			] );

			foxiz_create_widget_text_field( [
				'id'    => $this->get_field_id( 'telegram' ),
				'name'  => $this->get_field_name( 'telegram' ),
				'title' => esc_html__( 'Telegram URL', 'foxiz-core' ),
				'value' => $instance['telegram'],
			] );

			foxiz_create_widget_text_field( [
				'id'    => $this->get_field_id( 'whatsapp' ),
				'name'  => $this->get_field_name( 'whatsapp' ),
				'title' => esc_html__( 'Whatsapp URL', 'foxiz-core' ),
				'value' => $instance['whatsapp'],
			] );

			foxiz_create_widget_text_field( [
				'id'    => $this->get_field_id( 'rss' ),
				'name'  => $this->get_field_name( 'rss' ),
				'title' => esc_html__( 'RSS URL', 'foxiz-core' ),
				'value' => $instance['rss'],
			] );
		}

		function widget( $args, $instance ) {

			$instance = wp_parse_args( (array) $instance, $this->params );

			if ( '2' === (string) $instance['new_tab'] ) {
				$instance['new_tab'] = true;
			} else {
				$instance['new_tab'] = false;
			}

			if ( '1' === (string) $instance['data_social'] ) {
				$data_social = $this->foxiz_get_web_socials();
			} else {
				$data_social = $instance;
			}

			$bio_class_name    = 'about-bio';
			$social_class_name = 'social-icon-wrap tooltips-n';

			if ( ! empty( $instance['style'] ) && '2' === (string) $instance['style'] ) {
				$bio_class_name    .= ' is-centered';
				$social_class_name .= ' is-centered';
			}

			echo $args['before_widget'];
			if ( ! empty( $instance['title'] ) ) {
				echo $args['before_title'] . foxiz_strip_tags( $instance['title'] ) . $args['after_title'];
			} ?>
			<div class="about-content-wrap">
				<?php if ( ! empty( $instance['content'] ) ) : ?>
					<div class="<?php echo strip_tags( $bio_class_name ); ?>">
						<?php echo foxiz_strip_tags( $instance['content'] ); ?>
					</div>
				<?php endif; ?>
				<div class="<?php echo strip_tags( $social_class_name ); ?>"><?php
					if ( function_exists( 'foxiz_get_social_list' ) ) {
						echo foxiz_get_social_list( $data_social, $instance['new_tab'] );
					}
					?></div>
			</div>
			<?php echo $args['after_widget'];
		}

		function foxiz_get_web_socials() {

			$data               = [];
			$data['facebook']   = foxiz_get_option( 'facebook' );
			$data['twitter']    = foxiz_get_option( 'twitter' );
			$data['googlenews'] = foxiz_get_option( 'googlenews' );
			$data['instagram']  = foxiz_get_option( 'instagram' );
			$data['pinterest']  = foxiz_get_option( 'pinterest' );
			$data['linkedin']   = foxiz_get_option( 'linkedin' );
			$data['tumblr']     = foxiz_get_option( 'tumblr' );
			$data['flickr']     = foxiz_get_option( 'flickr' );
			$data['skype']      = foxiz_get_option( 'skype' );
			$data['snapchat']   = foxiz_get_option( 'snapchat' );
			$data['myspace']    = foxiz_get_option( 'myspace' );
			$data['youtube']    = foxiz_get_option( 'youtube' );
			$data['bloglovin']  = foxiz_get_option( 'bloglovin' );
			$data['digg']       = foxiz_get_option( 'digg' );
			$data['dribbble']   = foxiz_get_option( 'dribbble' );
			$data['soundcloud'] = foxiz_get_option( 'soundcloud' );
			$data['vimeo']      = foxiz_get_option( 'vimeo' );
			$data['reddit']     = foxiz_get_option( 'reddit' );
			$data['vkontakte']  = foxiz_get_option( 'vk' );
			$data['telegram']   = foxiz_get_option( 'telegram' );
			$data['whatsapp']   = foxiz_get_option( 'whatsapp' );
			$data['rss']        = foxiz_get_option( 'rss' );

			return $data;
		}
	}
}