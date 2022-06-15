<a class="stx-info-button-icon-boxed" href="<?php echo esc_url( $settings['link']['url'] ); ?>">
	<div class="stx-m-text-holder">
		<span class="stx-m-text"><?php echo esc_html( $settings['text'] ); ?></span>
		<?php if ( ! empty( $settings['subtext'] ) ) : ?>
			<span class="stx-m-subtext"><?php echo esc_html( $settings['subtext'] ); ?></span>
		<?php endif; ?>
	</div>
	<?php if ( 'yes' === $settings['side-border'] ) : ?>
		<span class="stx-m-border"></span>
	<?php endif; ?>

	<?php
	\StaxAddons\Utils::load_template(
		'widgets/info-button/templates/parts/icon',
		[
			'settings' => $settings,
		]
	);
	?>
</a>
