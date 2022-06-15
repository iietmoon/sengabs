<div class="stx-grid-item <?php echo esc_attr( $item['item_classes'] ); ?>">
	<div class="stx-e-inner">
		<div class="stx-e-side">
			<?php
			\StaxAddons\Utils::load_templates(
				[
					'widgets/testimonials/templates/parts/image',
					'widgets/testimonials/templates/parts/quote',
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
					'widgets/testimonials/templates/parts/title',
					'widgets/testimonials/templates/parts/text',
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
