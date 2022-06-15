<div class="stx-divider-with-icon">
	<div class="stx-m-line">
		<div class="stx-m-inner-line"></div>
		<?php if ( ! empty( $settings['icon'] ) ) : ?>
			<span class="stx-m-separator-icon">
				<?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?>
			</span>
		<?php endif; ?>
		<div class="stx-m-inner-line"></div>
	</div>
</div>
