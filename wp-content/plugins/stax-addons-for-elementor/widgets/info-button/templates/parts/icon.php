<?php if ( ! empty( $settings['icon'] ) ) : ?>
	<span class="stx-info-button-icon">
		<span class="stx-m-icon-inner">
			<?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?>
		</span>
	</span>
<?php endif; ?>
