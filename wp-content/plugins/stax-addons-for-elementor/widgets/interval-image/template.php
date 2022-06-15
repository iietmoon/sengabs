<?php if ( $link ) : ?>
<a href="<?php echo esc_url( $data['link']['url'] ); ?>" <?php echo esc_attr( $link_extra ); ?>>
<?php endif; ?>

<?php echo $image_html; ?>

<?php if ( $link ) : ?>
</a>
<?php endif; ?>
