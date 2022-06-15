<?php if ( ! empty( $settings['title_text'] ) ) : ?>
	<<?php echo esc_attr( $settings['title_tag'] ); ?> class="stx-m-title">
		<?php if ( ! empty( $settings['title_link']['url'] ) ) : ?>
			<a itemprop="url" href="<?php echo esc_url( $settings['title_link']['url'] ); ?>">
		<?php endif; ?>
			<span class="stx-m-title-text"><?php echo esc_html( $settings['title_text'] ); ?></span>
		<?php if ( ! empty( $settings['title_link']['url'] ) ) : ?>
			</a>
		<?php endif; ?>
	</<?php echo esc_attr( $settings['title_tag'] ); ?>>
<?php endif; ?>
