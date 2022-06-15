<div class="stx-typeout-text-wrapper" data-strings="<?php echo esc_attr( $items ); ?>" data-cursor="<?php echo esc_attr( $settings['separator'] ); ?>">
	<<?php echo esc_attr( $settings['text_tag'] ); ?> class="stx-m-text">
		<?php if ( ! empty( $settings['text'] ) ) : ?>
			<?php echo esc_html( $settings['text'] ); ?>
		<?php endif; ?>
		<?php if ( $settings['new_line'] ) : ?>
			<br />
		<?php endif; ?>
		<span class="stx-typeout-holder">
			<span class="stx-typeout"></span>
		</span>
	</<?php echo esc_attr( $settings['text_tag'] ); ?>>
</div>
