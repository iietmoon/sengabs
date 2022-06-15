<div class="stx-blockquote-wrapper">
	<?php if ( ! empty( $settings['text'] ) ) : ?>
		<<?php echo esc_attr( $settings['text_tag'] ); ?> class="stx-m-text">
			<?php if ( isset( $settings['icon'] ) && ! empty( $settings['icon']['value'] ) ) : ?>
				<span class="stx-m-icon">
					<?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?>
				</span>
			<?php endif; ?>
			<?php echo esc_html( $settings['text'] ); ?>
		</<?php echo esc_attr( $settings['text_tag'] ); ?>>
	<?php endif; ?>
</div>
