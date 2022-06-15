<div class="stx-dropdown-wrapper">
	<a <?php echo $button_attribute; ?> href="#">
		<span class="stx-btn-content-wrapper">
			<span <?php echo $icon_attribute; ?>>
				<?php if ( $settings['selected_icon']['value'] ) : ?>
					<?php \Elementor\Icons_Manager::render_icon( $settings['selected_icon'], [ 'aria-hidden' => 'true' ] ); ?>
				<?php endif; ?>
			</span>
			<span class="stx-btn-text"><?php echo $settings['text']; ?></span>
		</span>
	</a>
	<div class="stx-dropdown-content-wrapper">
		<div class="stx-dropdown-content">
			<?php for ( $i = 1; $i <= $settings['dropdown_columns']; $i ++ ) : ?>
				<?php
				$items = [];
				foreach ( $settings['dropdown_items'] as $dropdown_item ) {
					if ( $dropdown_item['dropdown_item_column'] === $i ) {
						$items[] = $dropdown_item;
					}
				}
				?>
				<ul>
					<?php foreach ( $items as $item ) : ?>
						<?php
						$link_attrs = [];

						if ( $item['dropdown_item_link']['is_external'] ) {
							$link_attrs[] = 'target="_blank"';
						}

						if ( $item['dropdown_item_link']['nofollow'] ) {
							$link_attrs[] = 'rel="nofollow"';
						}

						$link_attrs = implode( ' ', $link_attrs );
						?>
						<li>
							<a href="<?php echo esc_url( $item['dropdown_item_link']['url'] ); ?>" <?php echo esc_attr( $link_attrs ); ?>>
								<?php echo $item['dropdown_item_text']; ?>
							</a>
						</li>
					<?php endforeach; ?>
				</ul>
			<?php endfor; ?>
		</div>
	</div>
</div>
