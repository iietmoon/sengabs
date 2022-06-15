<?php if ( is_array( $items ) && count( $items ) ) : ?>
	<div class="stx-m-social-icons">
		<?php
		foreach ( $items as $item ) {
			if ( ! empty( $item['icon'] ) ) {
				if ( ! empty( $item['link']['url'] ) ) {
					?>
					<a class="stx-e-social-icon-link" itemprop="url" href="<?php echo esc_url( $item['link']['url'] ); ?>">
				<?php } ?>
				<span class="stx-e-social-icon">
					<?php \Elementor\Icons_Manager::render_icon( $item['icon'], [ 'aria-hidden' => 'true' ] ); ?>
				</span>
				<?php if ( ! empty( $item['link']['url'] ) ) { ?>
					</a>
					<?php
				}
			}
		}
		?>
	</div>
<?php endif; ?>
