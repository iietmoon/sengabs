<div class="swiper-slide <?php echo esc_attr( 'elementor-repeater-item-' . $item['_id'] ); ?>">
	<div class="stx-e-inner">
		<div class="stx-e-top">
			<?php
			\StaxAddons\Utils::load_templates(
				[
					'widgets/testimonials-slider/templates/parts/image',
					'widgets/testimonials-slider/templates/parts/quote',
				],
				[
					'item'     => $item,
					'settings' => $settings,
				]
			);
			?>
		</div>
		<div class="stx-e-content">
			<?php
			\StaxAddons\Utils::load_templates(
				[
					'widgets/testimonials-slider/templates/parts/title',
					'widgets/testimonials-slider/templates/parts/text',
					'widgets/testimonials-slider/templates/parts/author',
				],
				[
					'item'     => $item,
					'settings' => $settings,
				]
			);
			?>
		</div>
	</div>
</div>
