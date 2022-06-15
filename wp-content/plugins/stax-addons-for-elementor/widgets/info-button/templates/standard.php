<a class="stx-info-button-standard" href="<?php echo esc_url( $settings['link']['url'] ); ?>">
	<div class="stx-m-text-holder">
	<span class="stx-m-text"><?php echo esc_html( $settings['text'] ); ?></span>
		<?php
		\StaxAddons\Utils::load_template(
			'widgets/info-button/templates/parts/icon',
			[
				'settings' => $settings,
			]
		);
		?>
	</div>
	<?php if ( ! empty( $settings['subtext'] ) ) : ?>
		<span class="stx-info-button-subtext"><?php echo esc_html( $settings['subtext'] ); ?></span>
	<?php endif; ?>
</a>
