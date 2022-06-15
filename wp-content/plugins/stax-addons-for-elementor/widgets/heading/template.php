<div <?php echo $wrapper_attribute; ?>>
	<?php

	echo $separator_top;
	echo $subtitle_before_title;
	echo $separator_before;

	?>

	<?php

	if ( ! empty( $settings['title'] ) ) {
		echo '<' . $settings['title_tag'] . ' class="stx-title"><span class="' . esc_attr__( $settings['title_ornament'] ) . '">
            ' . \StaxAddons\Utils::curly( $settings['title'] ) . '
        </span></' . $settings['title_tag'] . '>';
	}

	?>

	<?php

	echo $separator_after;
	echo $subtitle_after_title;

	if ( ! empty( $settings['description'] ) && $settings['description_section_show'] === 'yes' ) {
		?>
		<div class="stx-description"><?php echo $settings['description']; ?></div>
		<?php
	}

	?>

	<?php echo $separator_bottom; ?>

</div>
