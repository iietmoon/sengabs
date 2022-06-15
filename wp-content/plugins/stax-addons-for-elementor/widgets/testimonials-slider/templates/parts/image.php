<?php
if ( ! empty( $item['item_author_avatar'] ) ) : ?>
	<div class="stx-e-media-image">
		<img src="<?php echo esc_url( $item['item_author_avatar']['url'] ); ?>">
	</div>
<?php endif; ?>
