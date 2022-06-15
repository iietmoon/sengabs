<div class="stx-counter-wrapper" 
	data-start-digit="<?php echo (int) esc_html( $settings['start_digit'] ); ?>" 
	data-end-digit="<?php echo (int) esc_html( $settings['end_digit'] ); ?>"
	data-digit-label="<?php echo esc_html( $settings['digit_label'] ); ?>">
	<div class="stx-m-digit-wrapper">
		<?php
		\StaxAddons\Utils::load_template(
			'widgets/counter/templates/parts/digit',
			[
				'settings' => $settings,
			]
		);
		?>
	</div>
	<div class="stx-m-content">
		<?php
		\StaxAddons\Utils::load_templates(
			[
				'widgets/counter/templates/parts/title',
				'widgets/counter/templates/parts/text',
			],
			[
				'settings' => $settings,
			]
		);
		?>
	</div>
</div>
