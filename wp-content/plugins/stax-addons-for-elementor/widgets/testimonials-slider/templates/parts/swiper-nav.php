<?php if ( 'no' !== $settings['slider_navigation'] ) : ?>
	<div class="swiper-button-prev">
		<?php
		\StaxAddons\Utils::load_template(
			'widgets/testimonials-slider/templates/parts/arrow-left',
			[
				'settings' => $settings,
			]
		);
		?>
	</div>
	<div class="swiper-button-next">
		<?php
		\StaxAddons\Utils::load_template(
			'widgets/testimonials-slider/templates/parts/arrow-left',
			[
				'settings' => $settings,
			]
		);
		?>
	</div>
<?php endif; ?>
