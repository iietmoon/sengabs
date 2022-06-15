<?php

namespace StaxAddons\Widgets\Slider;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Typography;
use Elementor\Repeater;

use StaxAddons\Utils;
use StaxAddons\Widgets\Base;

class Component extends Base {

	public function __construct( $data = [], $args = null, $resources = false ) {
		parent::__construct( $data, $args, $resources );

		$this->register_widget_resources(
			[
				'js' => [ 'jquery', 'swiper' ],
			]
		);
	}

	public function get_name() {
		return 'stax-el-slider';
	}

	public function get_title() {
		return __( 'Slider', 'stax-addons-for-elementor' );
	}

	public function get_icon() {
		return 'stx-icon-slider sq-widget-label';
	}

	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Slides', 'stax-addons-for-elementor' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'slider_height',
			[
				'label'      => __( 'Height', 'stax-addons-for-elementor' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 1000,
						'step' => 5,
					],
					'%'  => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default'    => [
					'unit' => 'px',
					'size' => 300,
				],
				'selectors'  => [
					'{{WRAPPER}} .swiper-container' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'slider_base_style',
			[
				'label'     => __( 'Base Style', 'stax-addons-for-elementor' ),
				'type'      => Controls_Manager::HIDDEN,
				'default'   => '1',
				'selectors' => [
					'{{WRAPPER}} .swiper-pagination'   => 'display: block !important;',
					'{{WRAPPER}} .swiper-slide:before' => 'content: " "; position: absolute; width: 100%; height: 100%; top: 0; left: 0; z-index: 1;',
					'{{WRAPPER}} .swiper-slide > div, {{WRAPPER}} .swiper-slide > h3' => 'z-index: 2;',
				],
			]
		);

		$this->add_control(
			'autoplay',
			[
				'label'     => __( 'Autoplay', 'stax-addons-for-elementor' ),
				'type'      => Controls_Manager::SWITCHER,
				'label_on'  => __( 'Yes', 'stax-addons-for-elementor' ),
				'label_off' => __( 'No', 'stax-addons-for-elementor' ),
				'default'   => '',
			]
		);

		$this->add_control(
			'autoplay_speed',
			[
				'label'     => __( 'Autoplay Speed (ms)', 'stax-addons-for-elementor' ),
				'type'      => Controls_Manager::NUMBER,
				'min'       => 0,
				'max'       => 100000,
				'step'      => 10,
				'default'   => 5000,
				'condition' => [
					'autoplay' => 'yes',
				],
			]
		);

		$this->add_control(
			'nav_arrows',
			[
				'label'     => __( 'Nav Arrows', 'stax-addons-for-elementor' ),
				'type'      => Controls_Manager::SWITCHER,
				'label_on'  => __( 'Show', 'stax-addons-for-elementor' ),
				'label_off' => __( 'Hide', 'stax-addons-for-elementor' ),
				'default'   => 'yes',
			]
		);

		$this->add_control(
			'nav_pagination',
			[
				'label'     => __( 'Pagination', 'stax-addons-for-elementor' ),
				'type'      => Controls_Manager::SWITCHER,
				'label_on'  => __( 'Show', 'stax-addons-for-elementor' ),
				'label_off' => __( 'Hide', 'stax-addons-for-elementor' ),
				'default'   => 'yes',
			]
		);

		$repeater = new Repeater();

		$repeater->start_controls_tabs( 'slides_repeater' );

		$repeater->start_controls_tab( 'content', [ 'label' => __( 'Content', 'stax-addons-for-elementor' ) ] );

		$repeater->add_control(
			'list_default_style',
			[
				'label'     => __( 'H3 margin', 'stax-addons-for-elementor' ),
				'type'      => Controls_Manager::HIDDEN,
				'default'   => '1',
				'selectors' => [
					'{{WRAPPER}} h3' => 'margin: 0;',
				],
			]
		);

		$repeater->add_control(
			'list_title',
			[
				'label'       => __( 'Title', 'stax-addons-for-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'Demo title', 'stax-addons-for-elementor' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'list_sub_title',
			[
				'label'       => __( 'Sub Title', 'stax-addons-for-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'Demo sub-title', 'stax-addons-for-elementor' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'list_description',
			[
				'label'       => __( 'Description', 'stax-addons-for-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'Demo description', 'stax-addons-for-elementor' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'list_btn_text',
			[
				'label'       => __( 'Button Text', 'stax-addons-for-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'Click me', 'stax-addons-for-elementor' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'list_btn_link',
			[
				'label'         => __( 'Button Link', 'stax-addons-for-elementor' ),
				'type'          => Controls_Manager::URL,
				'placeholder'   => __( 'https://your-link.com', 'stax-addons-for-elementor' ),
				'show_external' => true,
				'default'       => [
					'url'         => '',
					'is_external' => false,
					'nofollow'    => false,
				],
			]
		);

		$repeater->end_controls_tab();

		$repeater->start_controls_tab( 'background', [ 'label' => __( 'Background', 'stax-addons-for-elementor' ) ] );

		$repeater->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'     => 'list_background',
				'types'    => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} {{CURRENT_ITEM}}',
			]
		);

		$repeater->end_controls_tab();

		$repeater->start_controls_tab( 'style', [ 'label' => __( 'Style', 'stax-addons-for-elementor' ) ] );

		$repeater->add_responsive_control(
			'align_horizontal',
			[
				'label'   => __( 'Horizontal Align', 'stax-addons-for-elementor' ),
				'type'    => Controls_Manager::CHOOSE,
				'options' => [
					'flex-start' => [
						'title' => __( 'Left', 'stax-addons-for-elementor' ),
						'icon'  => 'eicon-text-align-left',
					],
					'center'     => [
						'title' => __( 'Center', 'stax-addons-for-elementor' ),
						'icon'  => 'eicon-text-align-center',
					],
					'flex-end'   => [
						'title' => __( 'Right', 'stax-addons-for-elementor' ),
						'icon'  => 'eicon-text-align-right',
					],
				],
				'default' => '',
			]
		);

		$repeater->add_responsive_control(
			'align_vertical',
			[
				'label'     => __( 'Vertical Align', 'stax-addons-for-elementor' ),
				'type'      => Controls_Manager::CHOOSE,
				'options'   => [
					'flex-start' => [
						'title' => __( 'Top', 'stax-addons-for-elementor' ),
						'icon'  => 'eicon-v-align-top',
					],
					'center'     => [
						'title' => __( 'Middle', 'stax-addons-for-elementor' ),
						'icon'  => 'eicon-v-align-middle',
					],
					'flex-end'   => [
						'title' => __( 'Bottom', 'stax-addons-for-elementor' ),
						'icon'  => 'eicon-v-align-bottom',
					],
				],
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}}' => 'justify-content: {{VALUE}};',
				],
			]
		);

		$repeater->add_control(
			'list_overlay_color',
			[
				'label'     => __( 'Overlay Color', 'stax-addons-for-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}}:before' => 'background-color: {{VALUE}}',
				],
			]
		);

		$repeater->add_control(
			'list_title_color',
			[
				'label'     => __( 'Title Color', 'stax-addons-for-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}} h3' => 'color: {{VALUE}}',
				],
			]
		);

		$repeater->add_control(
			'list_sub_title_color',
			[
				'label'     => __( 'Sub-title Color', 'stax-addons-for-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}} .slide-subtitle' => 'color: {{VALUE}}',
				],
			]
		);

		$repeater->add_control(
			'list_description_color',
			[
				'label'     => __( 'Description Color', 'stax-addons-for-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}} .slide-description' => 'color: {{VALUE}}',
				],
			]
		);

		$repeater->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'label'    => __( 'Title Shadow', 'stax-addons-for-elementor' ),
				'name'     => 'list_title_shadow',
				'selector' => '{{WRAPPER}} {{CURRENT_ITEM}} h3',
			]
		);

		$repeater->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'label'    => __( 'Sub-title Shadow', 'stax-addons-for-elementor' ),
				'name'     => 'list_sub_title_shadow',
				'selector' => '{{WRAPPER}} {{CURRENT_ITEM}} .slide-subtitle',
			]
		);

		$repeater->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'label'    => __( 'Description Shadow', 'stax-addons-for-elementor' ),
				'name'     => 'list_description_shadow',
				'selector' => '{{WRAPPER}} {{CURRENT_ITEM}} .slide-description',
			]
		);

		$repeater->add_control(
			'list_btn_color',
			[
				'label'     => __( 'Button Color', 'stax-addons-for-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}} .slide-btn a' => 'color: {{VALUE}}',
				],
			]
		);

		$repeater->add_control(
			'list_btn_hover_color',
			[
				'label'     => __( 'Button Hover Color', 'stax-addons-for-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}} .slide-btn a:hover' => 'color: {{VALUE}}',
				],
			]
		);

		$repeater->add_control(
			'list_btn_bg_color',
			[
				'label'     => __( 'Button Background', 'stax-addons-for-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}} .slide-btn a' => 'background-color: {{VALUE}}',
				],
			]
		);

		$repeater->add_control(
			'list_btn_hover_bg_color',
			[
				'label'     => __( 'Button Hover Bg', 'stax-addons-for-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}} .slide-btn a:hover' => 'background-color: {{VALUE}}',
				],
			]
		);

		$repeater->add_control(
			'list_btn_border_color',
			[
				'label'     => __( 'Button Border Color', 'stax-addons-for-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}} .slide-btn a' => 'border-color: {{VALUE}}',
				],
			]
		);

		$repeater->add_control(
			'list_btn_hover_border_color',
			[
				'label'     => __( 'Button Border Hover Color', 'stax-addons-for-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}} .slide-btn a:hover' => 'border-color: {{VALUE}}',
				],
			]
		);

		$repeater->end_controls_tab();

		$repeater->end_controls_tabs();

		$this->add_control(
			'list',
			[
				'label'       => __( 'Slides List', 'stax-addons-for-elementor' ),
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'default'     => [
					[
						'list_title'       => __( 'Demo title', 'stax-addons-for-elementor' ),
						'list_sub_title'   => __( 'Demo sub-title', 'stax-addons-for-elementor' ),
						'list_description' => __( 'Demo description', 'stax-addons-for-elementor' ),
						'list_btn_text'    => __( 'Click me', 'stax-addons-for-elementor' ),
					],
				],
				'title_field' => '{{{ list_title }}}',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_slider_style',
			[
				'label' => __( 'Slider', 'stax-addons-for-elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'slide_padding',
			[
				'label'      => __( 'Padding', 'stax-addons-for-elementor' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .swiper-slide' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_title_style',
			[
				'label' => __( 'Title', 'stax-addons-for-elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label'    => __( 'Typography', 'stax-addons-for-elementor' ),
				'name'     => 'title_typography',
				'selector' => '{{WRAPPER}} .swiper-slide h3',
			]
		);

		$this->add_responsive_control(
			'title_margin',
			[
				'label'      => __( 'Margin', 'stax-addons-for-elementor' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .swiper-slide h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'title_padding',
			[
				'label'      => __( 'Padding', 'stax-addons-for-elementor' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .swiper-slide h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_sub_title_style',
			[
				'label' => __( 'Sub-Title', 'stax-addons-for-elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label'    => __( 'Typography', 'stax-addons-for-elementor' ),
				'name'     => 'subtitle_typography',
				'selector' => '{{WRAPPER}} .swiper-slide .slide-subtitle',
			]
		);

		$this->add_responsive_control(
			'subtitle_margin',
			[
				'label'      => __( 'Margin', 'stax-addons-for-elementor' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .swiper-slide .slide-subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'subtitle_padding',
			[
				'label'      => __( 'Padding', 'stax-addons-for-elementor' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .swiper-slide .slide-subtitle' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_description_style',
			[
				'label' => __( 'Description', 'stax-addons-for-elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label'    => __( 'Typography', 'stax-addons-for-elementor' ),
				'name'     => 'description_typography',
				'selector' => '{{WRAPPER}} .swiper-slide .slide-description',
			]
		);

		$this->add_responsive_control(
			'description_margin',
			[
				'label'      => __( 'Margin', 'stax-addons-for-elementor' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .swiper-slide .slide-description' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'description_padding',
			[
				'label'      => __( 'Padding', 'stax-addons-for-elementor' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .swiper-slide .slide-description' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_btn_style',
			[
				'label' => __( 'Button', 'stax-addons-for-elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label'    => __( 'Typography', 'stax-addons-for-elementor' ),
				'name'     => 'btn_typography',
				'selector' => '{{WRAPPER}} .slide-btn a',
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'      => 'btn_border',
				'selector'  => '{{WRAPPER}} .slide-btn a',
				'separator' => 'before',
			]
		);

		$this->add_control(
			'btn_border_radius',
			[
				'label'      => __( 'Border Radius', 'stax-addons-for-elementor' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .slide-btn a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'btn_margin',
			[
				'label'      => __( 'Margin', 'stax-addons-for-elementor' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .slide-btn a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'btn_padding',
			[
				'label'      => __( 'Padding', 'stax-addons-for-elementor' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .slide-btn a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		if ( empty( $settings['list'] ) ) {
			return;
		}

		$autoplay = '';

		if ( 'yes' === $settings['autoplay'] ) {
			$autoplay = 'data-autoplay="true" data-autoplay-speed="' . $settings['autoplay_speed'] . '"';
		}

		Utils::load_template(
			'widgets/slider/template',
			[
				'autoplay' => $autoplay,
				'settings' => $settings,
			]
		);
	}

}
