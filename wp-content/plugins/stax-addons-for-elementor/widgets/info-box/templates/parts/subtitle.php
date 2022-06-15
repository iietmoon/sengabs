<?php if ( ! empty( $settings['subtitle'] ) ) : ?>
	<<?php echo esc_attr( $settings['subtitle_tag'] ); ?> class="stx-m-subtitle">
		<?php echo esc_html( $settings['subtitle'] ); ?>
	</<?php echo esc_attr( $settings['subtitle_tag'] ); ?>>
<?php endif; ?>
