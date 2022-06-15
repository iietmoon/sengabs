<?php

namespace StaxAddons\Widgets\Divider;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;

use StaxAddons\Widgets\Base;
use StaxAddons\Utils;

class Component extends Base {

	public function get_name() {
		return 'stax-el-divider';
	}

	public function get_title() {
		return __( 'Divider', 'stax-addons-for-elementor' );
	}

	public function get_icon() {
		return 'stx-icon-divider sq-widget-label';
	}

	protected function register_controls() {
		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'General', 'stax-addons-for-elementor' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'layout',
			[
				'label'   => __( 'Layout', 'stax-addons-for-elementor' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'standard',
				'options' => [
					'standard'     => __( 'Standard', 'stax-addons-for-elementor' ),
					'with-icon'    => __( 'With Icon', 'stax-addons-for-elementor' ),
					'border-image' => __( 'Border Image', 'stax-addons-for-elementor' ),
				],
			]
		);

		$this->add_control(
			'icon',
			[
				'label'       => __( 'Icon', 'stax-addons-for-elementor' ),
				'type'        => Controls_Manager::ICONS,
				'label_block' => true,
				'default'     => [
					'value'   => 'fas fa-plus',
					'library' => 'solid',
				],
				'condition'   => [
					'layout' => 'with-icon',
				],
			]
		);

		$this->add_control(
			'border_image',
			[
				'label'     => __( 'Choose Image', 'stax-addons-for-elementor' ),
				'type'      => Controls_Manager::MEDIA,
				'default'   => [
					'id'  => '',
					'url' => STAX_EL_ASSETS_URL . 'img/pattern_01.png',
				],
				'condition' => [
					'layout' => 'border-image',
				],
			]
		);

		$this->add_control(
			'border_image_repeat',
			[
				'label'     => __( 'Repeat', 'stax-addons-for-elementor' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => 'default',
				'options'   => [
					'default'   => __( 'Default', 'stax-addons-for-elementor' ),
					'no-repeat' => __( 'No-repeat', 'stax-addons-for-elementor' ),
					'repeat-x'  => __( 'Repeat-x', 'stax-addons-for-elementor' ),
					'repeat-y'  => __( 'Repeat-y', 'stax-addons-for-elementor' ),
					'round'     => __( 'Round', 'stax-addons-for-elementor' ),
					'space'     => __( 'Space', 'stax-addons-for-elementor' ),
				],
				'condition' => [
					'layout' => 'border-image',
				],
			]
		);

		$this->add_control(
			'border_image_no_repeat_style',
			[
				'label'     => __( 'Border Image No-repeat Style', 'stax-addons-for-elementor' ),
				'type'      => Controls_Manager::HIDDEN,
				'default'   => '1',
				'selectors' => [
					'{{WRAPPER}} .stx-divider-border-image .stx-m-line'   => 'background-repeat: no-repeat;',
				],
				'condition' => [
					'border_image_repeat' => 'no-repeat',
				],
			]
		);

		$this->add_control(
			'border_image_repeat_x_style',
			[
				'label'     => __( 'Border Image Repeat-x Style', 'stax-addons-for-elementor' ),
				'type'      => Controls_Manager::HIDDEN,
				'default'   => '1',
				'selectors' => [
					'{{WRAPPER}} .stx-divider-border-image .stx-m-line'   => 'background-repeat: repeat-x;',
				],
				'condition' => [
					'border_image_repeat' => 'repeat-x',
				],
			]
		);

		$this->add_control(
			'border_image_repeat_y_style',
			[
				'label'     => __( 'Border Image Repeat-y Style', 'stax-addons-for-elementor' ),
				'type'      => Controls_Manager::HIDDEN,
				'default'   => '1',
				'selectors' => [
					'{{WRAPPER}} .stx-divider-border-image .stx-m-line'   => 'background-repeat: repeat-y;',
				],
				'condition' => [
					'border_image_repeat' => 'repeat-y',
				],
			]
		);

		$this->add_control(
			'border_image_round_style',
			[
				'label'     => __( 'Border Image Round Style', 'stax-addons-for-elementor' ),
				'type'      => Controls_Manager::HIDDEN,
				'default'   => '1',
				'selectors' => [
					'{{WRAPPER}} .stx-divider-border-image .stx-m-line'   => 'background-repeat: round;',
				],
				'condition' => [
					'border_image_repeat' => 'round',
				],
			]
		);

		$this->add_control(
			'border_image_space_style',
			[
				'label'     => __( 'Border Image Space Style', 'stax-addons-for-elementor' ),
				'type'      => Controls_Manager::HIDDEN,
				'default'   => '1',
				'selectors' => [
					'{{WRAPPER}} .stx-divider-border-image .stx-m-line'   => 'background-repeat: space;',
				],
				'condition' => [
					'border_image_repeat' => 'space',
				],
			]
		);

		$this->add_control(
			'border_image_size',
			[
				'label'     => __( 'Size', 'stax-addons-for-elementor' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => 'default',
				'options'   => [
					'default' => __( 'Default', 'stax-addons-for-elementor' ),
					'cover'   => __( 'Cover', 'stax-addons-for-elementor' ),
					'contain' => __( 'Contain', 'stax-addons-for-elementor' ),
				],
				'condition' => [
					'layout' => 'border-image',
				],
			]
		);

		$this->add_control(
			'border_image_size_cover_style',
			[
				'label'     => __( 'Border Image Size Cover Style', 'stax-addons-for-elementor' ),
				'type'      => Controls_Manager::HIDDEN,
				'default'   => '1',
				'selectors' => [
					'{{WRAPPER}} .stx-divider-border-image .stx-m-line'   => 'background-size: cover;',
				],
				'condition' => [
					'border_image_size' => 'cover',
				],
			]
		);

		$this->add_control(
			'border_image_size_contain_style',
			[
				'label'     => __( 'Border Image Size Contain Style', 'stax-addons-for-elementor' ),
				'type'      => Controls_Manager::HIDDEN,
				'default'   => '1',
				'selectors' => [
					'{{WRAPPER}} .stx-divider-border-image .stx-m-line'   => 'background-size: contain;',
				],
				'condition' => [
					'border_image_size' => 'contain',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_general_style',
			[
				'label' => __( 'General', 'stax-addons-for-elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'divider_general_color',
			[
				'label'     => __( 'Color', 'stax-addons-for-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .stx-m-line' => 'color: {{VALUE}};',
				],
				'condition' => [
					'layout!' => 'border-image',
				],
			]
		);

		$this->add_control(
			'divider_general_width',
			[
				'label'      => __( 'Width', 'stax-addons-for-elementor' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'vw' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 500,
						'step' => 1,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .stx-m-line' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'divider_general_thickness',
			[
				'label'      => __( 'Thickness', 'stax-addons-for-elementor' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 100,
						'step' => 1,
					],
				],
				/*
				'default'    => [
					'unit' => 'px',
					'size' => 3,
				],*/
				'selectors'  => [
					'{{WRAPPER}} .stx-m-line' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'divider_general_nargin_top',
			[
				'label'      => __( 'Margin top', 'stax-addons-for-elementor' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'vw' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 300,
						'step' => 1,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .stx-m-line' => 'margin-top: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'divider_general_nargin_bottom',
			[
				'label'      => __( 'Margin bottom', 'stax-addons-for-elementor' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'vw' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 300,
						'step' => 1,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .stx-m-line' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_with_image_style',
			[
				'label'     => __( 'With image', 'stax-addons-for-elementor' ),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition' => [
					'layout' => 'border-image',
				],
			]
		);

		$this->add_control(
			'divider_border_image_thickness',
			[
				'label'      => __( 'Thickness', 'stax-addons-for-elementor' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 500,
						'step' => 1,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .stx-divider-border-image .stx-m-line' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		Utils::load_template(
			'widgets/divider/template',
			[
				'settings' => $settings,
			]
		);
	}

}
