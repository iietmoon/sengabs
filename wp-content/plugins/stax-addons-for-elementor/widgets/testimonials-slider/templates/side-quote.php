<div class="swiper-slide <?php echo esc_attr( 'elementor-repeater-item-' . $item['_id'] ); ?>">
	<div class="stx-e-inner">
		<?php
		\StaxAddons\Utils::load_template(
			'widgets/testimonials-slider/templates/parts/quote',
			[
				'item'     => $item,
				'settings' => $settings,
			]
		);
		?>
		<div class="stx-e-content">
			<?php
			\StaxAddons\Utils::load_template(
				'widgets/testimonials-slider/templates/parts/text',
				[
					'item'     => $item,
					'settings' => $settings,
				]
			);
			?>
			<div class="stx-e-bottom-info">
				<?php
				\StaxAddons\Utils::load_templates(
					[
						'widgets/testimonials-slider/templates/parts/image',
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
</div>
