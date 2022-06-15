<?php

$wrapper_classes   = [];
$wrapper_classes[] = 'stx-behaviour-' . $settings['type'];
$wrapper_classes[] = 'stx-style-' . $settings['style'];
$wrapper_classes   = implode( ' ', $wrapper_classes );

?>
<div class="stx-accordion-wrapper <?php echo esc_attr( $wrapper_classes ); ?>">
	<?php
	foreach ( $settings['items'] as $item ) {
		\StaxAddons\Utils::load_template(
			'widgets/accordion/templates/child',
			[
				'item'     => $item,
				'settings' => $settings,
			]
		);
	}
	?>
</div>
