<?php if ( ! empty( $settings['link']['url'] ) ) : ?>
	<a itemprop="url" href="<?php echo esc_url( $settings['link']['url'] ); ?>">
<?php endif; ?>
		<div class="stx-m-icon-holder">
			<?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?>
		</div>
<?php if ( ! empty( $settings['link']['url'] ) ) : ?>
	</a>
<?php endif; ?>
