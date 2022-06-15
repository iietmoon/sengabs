<?php

if ( isset( $settings['prev_icon'] ) && ! empty( $settings['prev_icon']['value'] ) ) {
	\Elementor\Icons_Manager::render_icon( $settings['prev_icon'], [ 'aria-hidden' => 'true' ] );
}
