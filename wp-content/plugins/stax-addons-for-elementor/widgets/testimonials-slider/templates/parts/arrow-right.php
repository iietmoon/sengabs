<?php
$icon = isset( $slider_navigation_arrow_next ) ? $slider_navigation_arrow_next : [];

if ( isset( $settings['next_icon'] ) && ! empty( $settings['next_icon']['value'] ) ) {
	\Elementor\Icons_Manager::render_icon( $settings['next_icon'], [ 'aria-hidden' => 'true' ] );
}
