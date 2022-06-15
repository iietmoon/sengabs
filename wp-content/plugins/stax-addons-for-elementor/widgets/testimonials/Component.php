<?php

namespace StaxAddons\Widgets\Testimonials;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

use Elementor\Controls_Manager;
use Elementor\Repeater;
use Elementor\Group_Control_Background;

use StaxAddons\Widgets\Base;
use StaxAddons\Utils;

class Component extends Base {

	public function __construct( $data = [], $args = null, $resources = false ) {
		parent::__construct( $data, $args, $resources );

		$this->register_widget_resources(
			[
				'extra_styles' => [
					[
						'name'     => 'stx-common',
						'fullpath' => STAX_EL_ASSETS_URL . 'css/common.css',
						'depends'  => [],
					],
				],
			]
		);
	}

	public function get_name() {
		return 'stax-el-testimonials';
	}

	public function get_title() {
		return __( 'Testimonials', 'stax-addons-for-elementor' );
	}

	public function get_icon() {
		return 'stx-icon-testimonials sq-widget-label';
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
				'default' => 'boxed',
				'options' => [
					'boxed'           => __( 'Boxed', 'stax-addons-for-elementor' ),
					'info-below'      => __( 'Info Below', 'stax-addons-for-elementor' ),
					'side-quote'      => __( 'Side Quote', 'stax-addons-for-elementor' ),
					'side-with-image' => __( 'Side With Image', 'stax-addons-for-elementor' ),
				],
			]
		);

		$this->add_responsive_control(
			'columns',
			[
				'label'           => __( 'Columns', 'stax-addons-for-elementor' ),
				'type'            => Controls_Manager::SELECT,
				'desktop_default' => '3',
				'tablet_default'  => '3',
				'mobile_default'  => '1',
				'options'         => [
					'1' => __( '1', 'stax-addons-for-elementor' ),
					'2' => __( '2', 'stax-addons-for-elementor' ),
					'3' => __( '3', 'stax-addons-for-elementor' ),
					'4' => __( '4', 'stax-addons-for-elementor' ),
					'5' => __( '5', 'stax-addons-for-elementor' ),
					'6' => __( '6', 'stax-addons-for-elementor' ),
					'7' => __( '7', 'stax-addons-for-elementor' ),
					'8' => __( '8', 'stax-addons-for-elementor' ),
				],
			]
		);

		$this->add_responsive_control(
			'items_spacing',
			[
				'label'     => __( 'Spacing', 'stax-addons-for-elementor' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => [
					'px' => [
						'max' => 100,
					],
				],
				'selectors' => [],
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'item_title',
			[
				'label'   => __( 'Title', 'stax-addons-for-elementor' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Title Here', 'stax-addons-for-elementor' ),
				'dynamic' => [
					'active' => true,
				],
			]
		);

		$repeater->add_control(
			'item_text',
			[
				'label'   => __( 'Text', 'stax-addons-for-elementor' ),
				'type'    => Controls_Manager::TEXTAREA,
				'default' => __( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'stax-addons-for-elementor' ),
				'dynamic' => [
					'active' => true,
				],
			]
		);

		$repeater->add_control(
			'item_author_name',
			[
				'label'   => __( 'Author Name', 'stax-addons-for-elementor' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'John Doe', 'stax-addons-for-elementor' ),
				'dynamic' => [
					'active' => true,
				],
			]
		);

		$repeater->add_control(
			'item_author_occupation',
			[
				'label'   => __( 'Author Occupation', 'stax-addons-for-elementor' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Developer', 'stax-addons-for-elementor' ),
				'dynamic' => [
					'active' => true,
				],
			]
		);

		$repeater->add_control(
			'item_author_avatar',
			[
				'label'   => __( 'Author Avatar', 'stax-addons-for-elementor' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => [
					'url' => '',
				],
				'dynamic' => [
					'active' => true,
				],
			]
		);

		$repeater->add_control(
			'quote_color',
			[
				'label'     => __( 'Quote Color', 'stax-addons-for-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}}' => 'color: {{VALUE}};',
				],
			]
		);

		$repeater->add_control(
			'title_color',
			[
				'label'     => __( 'Title Color', 'stax-addons-for-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}}' => 'color: {{VALUE}};',
				],
			]
		);

		$repeater->add_control(
			'text_color',
			[
				'label'     => __( 'Text Color', 'stax-addons-for-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}}' => 'color: {{VALUE}};',
				],
			]
		);

		$repeater->add_control(
			'author_name_color',
			[
				'label'     => __( 'Author Name Color', 'stax-addons-for-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}}' => 'color: {{VALUE}};',
				],
			]
		);

		$repeater->add_control(
			'author_occupation_color',
			[
				'label'     => __( 'Author Occupation Color', 'stax-addons-for-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}}' => 'color: {{VALUE}};',
				],
			]
		);

		$repeater->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'     => 'item_background',
				'label'    => __( 'Background', 'stax-addons-for-elementor' ),
				'types'    => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} ',
			]
		);

		$this->add_control(
			'items',
			[
				'label'       => __( 'Items', 'stax-addons-for-elementor' ),
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'default'     => [
					[
						'item_title'             => __( 'Title 1', 'stax-addons-for-elementor' ),
						'item_text'              => __( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'stax-addons-for-elementor' ),
						'item_author_name'       => __( 'John Doe', 'stax-addons-for-elementor' ),
						'item_author_occupation' => __( 'Developer', 'stax-addons-for-elementor' ),
					],
					[
						'item_title'             => __( 'Title 2', 'stax-addons-for-elementor' ),
						'item_text'              => __( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'stax-addons-for-elementor' ),
						'item_author_name'       => __( 'Anna Musk', 'stax-addons-for-elementor' ),
						'item_author_occupation' => __( 'Florist', 'stax-addons-for-elementor' ),
					],
					[
						'item_title'             => __( 'Title 3', 'stax-addons-for-elementor' ),
						'item_text'              => __( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'stax-addons-for-elementor' ),
						'item_author_name'       => __( 'Michael James', 'stax-addons-for-elementor' ),
						'item_author_occupation' => __( 'Medic', 'stax-addons-for-elementor' ),
					],
				],
				'title_field' => '{{{ item_title }}}',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'item_section',
			[
				'label' => __( 'Item Settings', 'stax-addons-for-elementor' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'icon',
			[
				'label'       => __( 'Icon', 'stax-addons-for-elementor' ),
				'type'        => Controls_Manager::ICONS,
				'label_block' => true,
				'default'     => [
					'value'   => 'fas fa-quote-right',
					'library' => 'solid',
				],
			]
		);

		$this->add_responsive_control(
			'image_width',
			[
				'label'     => __( 'Image Width', 'stax-addons-for-elementor' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => [
					'px' => [
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}}' => 'font-size: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'layout' => 'side-with-image',
				],
			]
		);

		$this->add_responsive_control(
			'item_padding',
			[
				'label'      => __( 'Padding', 'stax-addons-for-elementor' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors'  => [
					'{{WRAPPER}}' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition'  => [
					'layout' => 'boxed',
				],
			]
		);

		$this->add_control(
			'image_border_radius',
			[
				'label'      => __( 'Image Border Radius', 'stax-addons-for-elementor' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					'{{WRAPPER}}' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition'  => [
					'layout' => [
						'boxed',
						'side-with-image',
					],
				],
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'      => 'container_background',
				'label'     => __( 'Background', 'stax-addons-for-elementor' ),
				'types'     => [ 'classic', 'gradient', 'video' ],
				'selector'  => '{{WRAPPER}} ',
				'condition' => [
					'layout' => 'boxed',
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		Utils::load_template(
			'widgets/testimonials/template',
			[
				'settings' => $settings,
			]
		);
	}

}
