<div class="stx-m-digit"></div>
<?php if ( 'yes' === $settings['icon_enabled'] ) : ?>
	<div class="stx-m-icon">
		<?php if ( isset( $$settings['icon'] ) ) : ?>
			<?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?>
		<?php endif; ?>
	</div>
<?php endif; ?>
