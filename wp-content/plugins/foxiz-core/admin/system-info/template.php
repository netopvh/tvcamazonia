<?php
/** Don't load directly */
defined( 'ABSPATH' ) || exit;

?><div class="rb-panel-wrap">
	<div class="rb-panel-header">
		<div class="rb-panel-heading">
			<h1><i class="dashicons dashicons-info-outline"></i><?php echo esc_html__( 'System Information', 'foxiz-core' ); ?></h1>
			<p class="sub-heading"><?php echo esc_html__( 'This theme can operate on nearly all servers. However, we recommend following the server settings below if you encounter any red values.', 'foxiz-core' ); ?></p>
		</div>
	</div>
	<div class="rb-system-info">
		<div class="rb-panel-col">
			<div class="rb-inner">
				<div class="rb-info-header"><h2><?php esc_html_e( 'PHP Information', 'foxiz-core' ); ?></h2></div>
				<div class="rb-info-content">
					<?php if ( ! empty( $system_info ) && is_array( $system_info ) ) :
						foreach ( $system_info as $info => $val ) :
							$class_name = 'info-el';
							if ( isset( $val['passed'] ) && ! $val['passed'] ) {
								$class_name .= ' is-warning';
							} ?>
							<div class="<?php echo esc_attr( $class_name ); ?>">
								<div class="info-content">
									<span class="info-label"><?php echo esc_attr( $val['title'] ) ?></span>
									<span class="info-value"><?php echo esc_attr( $val['value'] ) ?></span>
								</div>
								<?php if ( isset( $val['passed'] ) && ! $val['passed'] ) : ?>
									<span class="info-warning"><?php echo esc_attr( $val['warning'] ) ?></span>
								<?php endif; ?>
							</div>
						<?php endforeach;
					endif; ?>
				</div>
			</div>
		</div>
		<div class="rb-panel-col">
			<div class="rb-inner">
				<div class="rb-info-header"><h2><?php esc_html_e( 'WordPress Info', 'foxiz-core' ); ?></h2></div>
				<div class="rb-info-content">
					<?php if ( ! empty( $wp_info ) && is_array( $wp_info ) ) :
						foreach ( $wp_info as $info => $val ) :
							$class_name = 'info-el';
							if ( isset( $val['passed'] ) && ! $val['passed'] ) {
								$class_name .= ' is-warning';
							} ?>
							<div class="<?php echo esc_attr( $class_name ); ?>">
								<div class="info-content">
									<span class="info-label"><?php echo esc_attr( $val['title'] ) ?></span>
									<span class="info-value"><?php echo html_entity_decode( $val['value'] ) ?></span>
								</div>
								<?php if ( isset( $val['passed'] ) && ! $val['passed'] ) : ?>
									<span class="info-warning"><?php echo esc_attr( $val['warning'] ) ?></span>
								<?php endif; ?>
							</div>
						<?php endforeach;
					endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>