<div class="stx-testimonials-slider-wrapper" data-options="<?php echo esc_attr( $slider_options ); ?>">
	<div class="swiper-wrapper">
		<?php
		foreach ( $settings['items'] as $item ) {
			\StaxAddons\Utils::load_template(
				'widgets/testimonials-slider/templates/' . $settings['layout'],
				[
					'item'     => $item,
					'settings' => $settings,
				]
			);
		}
		?>
	</div>
	<?php
	if ( 'inside' === $settings['slider_navigation_position'] ) {
		\StaxAddons\Utils::load_template(
			'widgets/testimonials-slider/templates/parts/swiper-nav',
			[
				'settings' => $settings,
			]
		);
	}

	if ( 'inside' === $settings['slider_pagination_position'] ) {
		\StaxAddons\Utils::load_template(
			'widgets/testimonials-slider/templates/parts/swiper-pag',
			[
				'settings' => $settings,
			]
		);
	}
	?>
</div>

<?php
if ( 'outside' === $settings['slider_navigation_position'] || 'together' === $settings['slider_navigation_position'] ) {
	\StaxAddons\Utils::load_template(
		'widgets/testimonials-slider/templates/parts/swiper-nav',
		[
			'settings' => $settings,
		]
	);
}

if ( 'outside' === $settings['slider_pagination_position'] ) {
	\StaxAddons\Utils::load_template(
		'widgets/testimonials-slider/templates/parts/swiper-pag',
		[
			'settings' => $settings,
		]
	);
}
