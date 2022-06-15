<div class="stx-blockquote-wrapper">
	<?php if ( isset( $settings['icon'] ) && ! empty( $settings['icon']['value'] ) ) : ?>
		<div class="stx-m-icon">
			<?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?>
		</div>
	<?php endif; ?>
	<?php if ( ! empty( $settings['text'] ) ) : ?>
		<<?php echo esc_attr( $settings['text_tag'] ); ?> class="stx-m-text">
			<?php echo esc_html( $settings['text'] ); ?>
		</<?php echo esc_attr( $settings['text_tag'] ); ?>>
	<?php endif; ?>
</div>
