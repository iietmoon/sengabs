<<?php echo esc_attr( $settings['title_tag'] ); ?> class="stx-e-title-holder">
	<span class="stx-e-title"><?php echo esc_html( $item['item_title'] ); ?></span>
	<span class="stx-e-mark">
		<span class="stx-icon--plus">
			<?php
			if ( isset( $settings['icon_open'] ) && ! empty( $settings['icon_open']['value'] ) ) {
				\StaxAddons\Utils::load_template(
					'widgets/accordion/templates/parts/icon',
					[
						'icon' => $settings['icon_open'],
					]
				);
			} else {
				?>
				+
				<?php
			}
			?>
		</span>
		<span class="stx-icon--minus">
			<?php
			if ( isset( $settings['icon_close'] ) && ! empty( $settings['icon_close']['value'] ) ) {
				\StaxAddons\Utils::load_template(
					'widgets/accordion/templates/parts/icon',
					[
						'icon' => $settings['icon_close'],
					]
				);
			} else {
				?>
				-
				<?php
			}
			?>
		</span>
	</span>
</<?php echo esc_attr( $settings['title_tag'] ); ?>>
<div class="stx-e-content">
	<div class="stx-e-content-inner">
		<?php echo esc_html( $item['item_content'] ); ?>
	</div>
</div>
