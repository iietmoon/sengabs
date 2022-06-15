<?php if ( ! empty( $settings['title'] ) ) : ?>
	<<?php echo esc_attr( $settings['title_tag'] ); ?> class="stx-m-title">
		<?php if ( ! empty( $settings['link']['url'] ) ) : ?>
			<a itemprop="url" href="<?php echo esc_url( $settings['link']['url'] ); ?>">
		<?php endif; ?>
			<?php echo esc_html( $settings['title'] ); ?>
		<?php if ( ! empty( $settings['link']['url'] ) ) : ?>
			</a>
		<?php endif; ?>
	</<?php echo esc_attr( $settings['title_tag'] ); ?>>
<?php endif; ?>
