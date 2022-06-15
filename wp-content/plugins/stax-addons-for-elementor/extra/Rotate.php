<?php

namespace StaxAddons\Extra;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

use Elementor\Controls_Manager;

/**
 * Class Rotate
 *
 * @package StaxAddons\Enhancements
 */
class Rotate {

	/**
	 * @var null
	 */
	public static $instance;

	/**
	 * @return Rotate|null
	 */
	public static function instance() {
		if ( self::$instance === null ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	public function __construct() {
		add_action(
			'elementor/element/common/_section_style/after_section_end',
			static function ( $element, $args ) {
				$element->start_controls_section(
					'stx_rotate_section',
					[
						'tab'   => Controls_Manager::TAB_ADVANCED,
						'label' => __( 'Rotate', 'stax-addons-for-elementor' ),
					]
				);

				$element->add_control(
					'reference_point',
					[
						'label'   => __( 'Reference Point', 'stax-addons-for-elementor' ),
						'type'    => Controls_Manager::SELECT,
						'default' => 'center',
						'options' => [
							'center'       => __( 'Center', 'stax-addons-for-elementor' ),
							'top-left'     => __( 'Top Left', 'stax-addons-for-elementor' ),
							'top-right'    => __( 'Top Right', 'stax-addons-for-elementor' ),
							'bottom-right' => __( 'Bottom Right', 'stax-addons-for-elementor' ),
							'bottom-left'  => __( 'Bottom Left', 'stax-addons-for-elementor' ),
						],
					]
				);

				$element->add_control(
					'reference_center',
					[
						'label'     => __( 'Center', 'stax-addons-for-elementor' ),
						'type'      => Controls_Manager::HIDDEN,
						'default'   => '1',
						'selectors' => [
							'{{WRAPPER}}' => '-webkit-transform-origin: 50% 50%; -ms-transform-origin: 50% 50%; transform-origin: 50% 50%;',
						],
						'condition' => [
							'reference_point' => 'center',
						],
					]
				);

				$element->add_control(
					'reference_top_left',
					[
						'label'     => __( 'Top Left', 'stax-addons-for-elementor' ),
						'type'      => Controls_Manager::HIDDEN,
						'default'   => '1',
						'selectors' => [
							'{{WRAPPER}}' => '-webkit-transform-origin: 0% 0%; -ms-transform-origin: 0% 0%; transform-origin: 0% 0%;',
						],
						'condition' => [
							'reference_point' => 'top-left',
						],
					]
				);

				$element->add_control(
					'reference_top_right',
					[
						'label'     => __( 'Top Right', 'stax-addons-for-elementor' ),
						'type'      => Controls_Manager::HIDDEN,
						'default'   => '1',
						'selectors' => [
							'{{WRAPPER}}' => '-webkit-transform-origin: 100% 0%; -ms-transform-origin: 100% 0%; transform-origin: 100% 0%;',
						],
						'condition' => [
							'reference_point' => 'top-right',
						],
					]
				);

				$element->add_control(
					'reference_bottom_right',
					[
						'label'     => __( 'Bottom Right', 'stax-addons-for-elementor' ),
						'type'      => Controls_Manager::HIDDEN,
						'default'   => '1',
						'selectors' => [
							'{{WRAPPER}}' => '-webkit-transform-origin: 100% 100%; -ms-transform-origin: 100% 100%; transform-origin: 100% 100%;',
						],
						'condition' => [
							'reference_point' => 'bottom-right',
						],
					]
				);

				$element->add_control(
					'reference_bottom_left',
					[
						'label'     => __( 'Bottom Left', 'stax-addons-for-elementor' ),
						'type'      => Controls_Manager::HIDDEN,
						'default'   => '1',
						'selectors' => [
							'{{WRAPPER}}' => '-webkit-transform-origin: 0% 100%; -ms-transform-origin: 0% 100%; transform-origin: 0% 100%;',
						],
						'condition' => [
							'reference_point' => 'bottom-left',
						],
					]
				);

				$element->add_responsive_control(
					'angle',
					[
						'label'      => __( 'Angle', 'stax-addons-for-elementor' ),
						'type'       => Controls_Manager::SLIDER,
						'size_units' => [ 'px' ],
						'range'      => [
							'px' => [
								'min'  => 0,
								'max'  => 360,
								'step' => 1,
							],
						],
						'selectors'  => [
							'{{WRAPPER}}' => '-webkit-transform: rotate(-{{SIZE}}deg); -ms-transform: rotate(-{{SIZE}}deg); transform: rotate(-{{SIZE}}deg);',
						],
					]
				);

				$element->end_controls_section();
			},
			10,
			2
		);
	}

}

Rotate::instance();
