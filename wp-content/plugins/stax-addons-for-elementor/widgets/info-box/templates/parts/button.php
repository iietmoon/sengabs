<?php if ( ! empty( $settings['button_show'] ) ) : ?>
	<div class="stx-m-button stx-clear">
		<a href="<?php echo esc_url( $settings['link']['url'] ); ?>">
			<span class="stx-m-text"><?php echo esc_html( $settings['button_text'] ); ?></span>
			
			<?php if ( ! empty( $settings['button_icon'] ) && ! empty( $settings['button_icon']['value'] ) ) : ?>
				<span>
					<span class="stx-m-icon-inner">
						<?php \Elementor\Icons_Manager::render_icon( $settings['button_icon'], [ 'aria-hidden' => 'true' ] ); ?>
					</span>
				</span>
			<?php endif; ?>
		</a>
	</div>
<?php endif; ?>
