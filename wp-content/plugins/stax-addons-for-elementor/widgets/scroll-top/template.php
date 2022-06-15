<div class="stx-btn-wrapper">
	<a <?php echo $button_attribute; ?>>
		<span class="stx-btn-content-wrapper">
			<span <?php echo $icon_attribute; ?>>
				<?php if ( $settings['selected_icon']['value'] ) : ?>
					<?php \Elementor\Icons_Manager::render_icon( $settings['selected_icon'], [ 'aria-hidden' => 'true' ] ); ?>
				<?php endif; ?>
			</span>
		</span>
	</a>
</div>
