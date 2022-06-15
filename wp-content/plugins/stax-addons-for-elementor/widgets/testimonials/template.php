<?php

$wrapper_classes   = [];
$wrapper_classes[] = 'stx-layout-' . $settings['layout'];
$wrapper_classes[] = 'stx-grid';
$wrapper_classes[] = 'stx-columns-small-' . ( isset( $settings['columns_mobile'] ) ? $settings['columns_mobile'] : $settings['columns'] );
$wrapper_classes[] = 'stx-columns-medium-' . ( isset( $settings['columns_tablet'] ) ? $settings['columns_tablet'] : $settings['columns'] );
$wrapper_classes[] = 'stx-columns-large-' . $settings['columns'];
$wrapper_classes   = implode( ' ', $wrapper_classes );

?>

<div class="stx-testimonials-wrapper <?php echo esc_attr( $wrapper_classes ); ?>">
	<div class="stx-grid-inner stx-clear">
		<?php
		foreach ( $settings['items'] as $item ) {
			$item['item_classes'] = 'elementor-repeater-item-' . $item['_id'];

			\StaxAddons\Utils::load_template(
				'widgets/testimonials/templates/' . $settings['layout'],
				[
					'item'     => $item,
					'settings' => $settings,
				]
			);
		}
		?>
	</div>
</div>
