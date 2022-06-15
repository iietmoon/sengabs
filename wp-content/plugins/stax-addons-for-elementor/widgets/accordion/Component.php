<?php

namespace StaxAddons\Widgets\Accordion;

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
				'js' => [
					'jquery-ui-accordion',
				],
			],
		);
	}

	public function get_name() {
		return 'stax-el-accordion';
	}

	public function get_title() {
		return __( 'Accordion & Toggle', 'stax-addons-for-elementor' );
	}

	public function get_icon() {
		return 'stx-icon-accordion-toggle sq-widget-label';
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
			'type',
			[
				'label'   => __( 'Type', 'stax-addons-for-elementor' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'accordion',
				'options' => [
					'accordion' => __( 'Accordion', 'stax-addons-for-elementor' ),
					'toggle'    => __( 'Toggle', 'stax-addons-for-elementor' ),
				],
			]
		);

		$this->add_control(
			'style',
			[
				'label'   => __( 'Style', 'stax-addons-for-elementor' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'standard',
				'options' => [
					'standard'       => __( 'Standard', 'stax-addons-for-elementor' ),
					'boxed'          => __( 'Boxed', 'stax-addons-for-elementor' ),
					'border-top'     => __( 'Border Top', 'stax-addons-for-elementor' ),
					'border-between' => __( 'Border Between', 'stax-addons-for-elementor' ),
				],
			]
		);

		$this->add_control(
			'title_tag',
			[
				'label'   => __( 'Title Tag', 'stax-addons-for-elementor' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'h3',
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
			'icon_open',
			[
				'label'       => __( 'Icon Open', 'stax-addons-for-elementor' ),
				'type'        => Controls_Manager::ICONS,
				'label_block' => true,
				'default'     => [
					'value'   => 'fas fa-plus',
					'library' => 'solid',
				],
			]
		);

		$this->add_control(
			'icon_close',
			[
				'label'       => __( 'Icon Close', 'stax-addons-for-elementor' ),
				'type'        => Controls_Manager::ICONS,
				'label_block' => true,
				'default'     => [
					'value'   => 'fas fa-minus',
					'library' => 'solid',
				],
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
			'item_content',
			[
				'label'   => __( 'Content', 'stax-addons-for-elementor' ),
				'type'    => Controls_Manager::WYSIWYG,
				'default' => __( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'stax-addons-for-elementor' ),
				'dynamic' => [
					'active' => true,
				],
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
						'item_title'   => __( 'Title 1', 'stax-addons-for-elementor' ),
						'item_content' => __( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'stax-addons-for-elementor' ),
					],
					[
						'item_title'   => __( 'Title 2', 'stax-addons-for-elementor' ),
						'item_content' => __( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'stax-addons-for-elementor' ),
					],
				],
				'title_field' => '{{{ item_title }}}',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		Utils::load_template(
			'widgets/accordion/template',
			[
				'settings' => $settings,
			]
		);
	}

}
