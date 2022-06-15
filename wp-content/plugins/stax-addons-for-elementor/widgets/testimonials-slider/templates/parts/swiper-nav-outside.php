<?php if ( 'no' !== $settings['slider_navigation'] ) {
	$nav_next_classes = '';
	$nav_prev_classes = '';

	if ( isset( $unique ) && ! empty( $unique ) ) {
		$nav_next_classes = 'swiper-button-outside swiper-button-next-' . esc_attr( $unique );
		$nav_prev_classes = 'swiper-button-outside swiper-button-prev-' . esc_attr( $unique );
	}
	?>
	<?php if ( 'together' === $settings['slider_navigation_position'] ) : ?>
		<div class="stx-swiper-together-nav">
	<?php endif; ?>

	<div class="swiper-button-prev <?php echo esc_attr( $nav_prev_classes ); ?>">
		<?php
		\StaxAddons\Utils::load_template(
			'widgets/testimonials-slider/templates/parts/arrow-left',
			[
				'settings' => $settings,
			]
		);
		?>
	</div>

	<div class="swiper-button-next <?php echo esc_attr( $nav_next_classes ); ?>">
		<?php
		\StaxAddons\Utils::load_template(
			'widgets/testimonials-slider/templates/parts/arrow-right',
			[
				'settings' => $settings,
			]
		);
		?>
	</div>

	<?php if ( 'together' === $settings['slider_navigation_position'] ) : ?>
		</div>
	<?php endif; ?>
<?php } ?>
