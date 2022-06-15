<?php

namespace StaxAddons\Widgets\TypeoutText;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

use Elementor\Controls_Manager;
use Elementor\Repeater;
use Elementor\Group_Control_Typography;

use StaxAddons\Widgets\Base;
use StaxAddons\Utils;

class Component extends Base {

	public function __construct( $data = [], $args = null, $resources = false ) {
		parent::__construct( $data, $args, $resources );

		$this->register_widget_resources(
			[
				'extra_scripts' => [
					[
						'name'    => 'stx-typed',
						'path'    => 'js/typed',
						'depends' => [],
					],
				],
			],
		);
	}

	public function get_name() {
		return 'stax-el-typeout-text';
	}

	public function get_title() {
		return __( 'Typeout Text', 'stax-addons-for-elementor' );
	}

	public function get_icon() {
		return 'stx-icon-typeout-text sq-widget-label';
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
			'text',
			[
				'label'   => __( 'Text', 'stax-addons-for-elementor' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Your text here', 'stax-addons-for-elementor' ),
			]
		);

		$this->add_control(
			'text_tag',
			[
				'label'   => __( 'Text Tag', 'stax-addons-for-elementor' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'h2',
				'options' => [
					'h1'   => __( 'H1', 'stax-addons-for-elementor' ),
					'h2'   => __( 'H2', 'stax-addons-for-elementor' ),
					'h3'   => __( 'H3', 'stax-addons-for-elementor' ),
					'h4'   => __( 'H4', 'stax-addons-for-elementor' ),
					'h5'   => __( 'H5', 'stax-addons-for-elementor' ),
					'h5'   => __( 'H6', 'stax-addons-for-elementor' ),
					'div'  => __( 'div', 'stax-addons-for-elementor' ),
					'span' => __( 'span', 'stax-addons-for-elementor' ),
				],
			]
		);

		$this->add_control(
			'separator',
			[
				'label'   => __( 'Separator', 'stax-addons-for-elementor' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( '|', 'stax-addons-for-elementor' ),
			]
		);

		$this->add_control(
			'new_line',
			[
				'label'   => __( 'Strings on new line', 'stax-addons-for-elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => '',
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'item_text',
			[
				'label'   => __( 'Text', 'stax-addons-for-elementor' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Example', 'stax-addons-for-elementor' ),
			]
		);

		$this->add_control(
			'items',
			[
				'label'       => __( 'Strings', 'stax-addons-for-elementor' ),
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'default'     => [
					[
						'item_text' => __( 'Example 1', 'stax-addons-for-elementor' ),
					],
					[
						'item_text' => __( 'Example 2', 'stax-addons-for-elementor' ),
					],
					[
						'item_text' => __( 'Example 3', 'stax-addons-for-elementor' ),
					],
				],
				'title_field' => '{{{ item_text }}}',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'style_section',
			[
				'label' => __( 'General', 'stax-addons-for-elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'align',
			[
				'label'     => __( 'Alignment', 'stax-addons-for-elementor' ),
				'type'      => Controls_Manager::CHOOSE,
				'options'   => [
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
				'default'   => 'left',
				'selectors' => [
					'{{WRAPPER}} .stx-typeout-text-wrapper' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'typography',
				'selector' => '{{WRAPPER}} .stx-typeout-text-wrapper .stx-m-text',
			]
		);

		$this->add_control(
			'text_color',
			[
				'label'     => __( 'Text Color', 'stax-addons-for-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .stx-typeout-text-wrapper .stx-m-text' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'text_typeout_color',
			[
				'label'     => __( 'Typeout Color', 'stax-addons-for-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .stx-typeout-text-wrapper .stx-typeout-holder' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$items = [];

		foreach ( $settings['items'] as $item ) {
			$items[] = '"' . esc_attr( $item['item_text'] ) . '"';
		}

		$items = implode( ',', $items );
		$items = '[' . $items . ']';

		Utils::load_template(
			'widgets/typeout-text/template',
			[
				'items'    => $items,
				'settings' => $settings,
			]
		);
	}

}
