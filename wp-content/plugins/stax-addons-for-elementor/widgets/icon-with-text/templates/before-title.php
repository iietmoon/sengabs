<div class="stx-icon-with-text stx-variation-before-title">
	<div class="stx-m-content">
		<?php
		\StaxAddons\Utils::load_templates(
			[
				'widgets/icon-with-text/templates/parts/title-with-icon',
				'widgets/icon-with-text/templates/parts/separator',
				'widgets/icon-with-text/templates/parts/text',
				'widgets/icon-with-text/templates/parts/button',
			],
			[
				'settings' => $settings,
			]
		);
		?>
	</div>
</div>
