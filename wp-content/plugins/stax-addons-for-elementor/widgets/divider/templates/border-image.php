<?php
$separator_image = isset( $settings['border_image'] ) ? 'background-image: url(' . $settings['border_image']['url'] . ')' : '';
?>
<div class="stx-divider-border-image">
	<div class="stx-m-line" style="<?php echo esc_attr( $separator_image ); ?>"></div>
</div>
