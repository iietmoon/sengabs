<?php

namespace StaxAddons\Enhancements;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

use Elementor\Controls_Manager;

/**
 * Class Counter
 * @package StaxAddons\Enhancements
 */
class Counter {

	/**
	 * @var null
	 */
	public static $instance;

	/**
	 * @return Counter|null
	 */
	public static function instance() {
		if ( self::$instance === null ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	public function __construct() {
		add_action( 'elementor/element/counter/section_title/after_section_end', static function ( $element, $args ) {
			$element->start_controls_section(
				'section_alignment',
				[
					'label' => __( 'Alignment', 'elementor' ),
					'tab'   => Controls_Manager::TAB_STYLE,
				]
			);

			$element->add_responsive_control(
				'content_align',
				[
					'label'        => __( 'Alignment', 'stax-addons-for-elementor' ),
					'type'         => Controls_Manager::CHOOSE,
					'options'      => [
						'left'   => [
							'title' => __( 'Left', 'stax-addons-for-elementor' ),
							'icon'  => 'eicon-text-align-left',
						],
						'center' => [
							'title' => __( 'Center', 'stax-addons-for-elementor' ),
							'icon'  => 'eicon-text-align-center',
						],
						'right'  => [
							'title' => __( 'Right', 'stax-addons-for-elementor' ),
							'icon'  => 'eicon-text-align-right',
						],
					],
					'prefix_class' => 'elementor%s-align-',
					'default'      => '',
					'selectors'    => [
						'{{WRAPPER}}.elementor-align-left .elementor-counter-number-prefix'  => 'flex-grow: 0;',
						'{{WRAPPER}}.elementor-align-left .elementor-counter-title'          => 'text-align: left;',
						'{{WRAPPER}}.elementor-align-right .elementor-counter-number-suffix' => 'flex-grow: 0;',
						'{{WRAPPER}}.elementor-align-right .elementor-counter-title'         => 'text-align: right;'
					]
				]
			);

			$element->end_controls_section();
		}, 10, 3 );
	}

}

Counter::instance();
