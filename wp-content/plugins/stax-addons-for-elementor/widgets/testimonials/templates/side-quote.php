<div class="stx-grid-item <?php echo esc_attr( $item['item_classes'] ); ?>">
	<div class="stx-e-inner">
		<?php
		\StaxAddons\Utils::load_template(
			'widgets/testimonials/templates/parts/quote',
			[
				'item'     => $item,
				'settings' => $settings,
			]
		);
		?>
		<div class="stx-e-content">
			<?php
			\StaxAddons\Utils::load_template(
				'widgets/testimonials/templates/parts/text',
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
						'widgets/testimonials/templates/parts/image',
						'widgets/testimonials/templates/parts/author',
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
