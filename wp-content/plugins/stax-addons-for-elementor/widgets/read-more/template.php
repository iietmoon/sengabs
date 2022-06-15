<div class="stax-read-more-editor">
	<div <?php echo $editor_attribute; ?>>
		<?php echo $editor_content; ?>
	</div>

	<div <?php echo $read_more_text_attribute; ?>><?php echo $editor_more_content; ?></div>

	<div <?php echo $read_more_wrap_attribute; ?>>
		<a <?php echo $read_more_toggle_attribute; ?>>
			<span <?php echo $read_more_label_attribute; ?>>
				<span <?php echo $read_more_icon_align_attribute; ?>>
					<?php \Elementor\Icons_Manager::render_icon( $settings['read_more_icon'], [ 'aria-hidden' => 'true' ] ); ?>
				</span>
				<?php echo wp_kses_post( $settings['read_more_label'] ); ?>
			</span>
			<span <?php echo $read_less_label_attribute; ?>>
					<span <?php echo $read_less_icon_align_attribute; ?>>
					<?php \Elementor\Icons_Manager::render_icon( $settings['read_less_icon'], [ 'aria-hidden' => 'true' ] ); ?>
					</span>
				<?php echo wp_kses_post( $settings['read_less_label'] ); ?>
			</span>
		</a>
	</div>
</div>
