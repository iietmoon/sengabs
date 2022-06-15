<?php

namespace StaxAddons\Widgets\IconWithText;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

use Elementor\Controls_Manager;

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
			],
		);
	}

	public function get_name() {
		return 'stax-el-icon-with-text';
	}

	public function get_title() {
		return __( 'Icon With Text', 'stax-addons-for-elementor' );
	}

	public function get_icon() {
		return 'stx-icon-icon-with-text sq-widget-label';
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
				'default' => 'before-content',
				'options' => [
					'before-content' => __( 'Before Content', 'stax-addons-for-elementor' ),
					'before-title'   => __( 'Before Title', 'stax-addons-for-elementor' ),
					'top'            => __( 'Top', 'stax-addons-for-elementor' ),
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'title_section',
			[
				'label' => __( 'Title', 'stax-addons-for-elementor' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'title_tag',
			[
				'label'   => __( 'Tag', 'stax-addons-for-elementor' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'h4',
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
			'title_text',
			[
				'label'   => __( 'Text', 'stax-addons-for-elementor' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Example Title', 'stax-addons-for-elementor' ),
				'dynamic' => [
					'active' => true,
				],
			]
		);

		$this->add_control(
			'title_link',
			[
				'label'       => __( 'Link', 'stax-addons-for-elementor' ),
				'type'        => Controls_Manager::URL,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'https://your-link.com', 'stax-addons-for-elementor' ),
				'default'     => [
					'url' => '',
				],
			]
		);

		$this->add_control(
			'separator_show',
			[
				'label'   => __( 'Show Separator', 'stax-addons-for-elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => '',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'text_section',
			[
				'label' => __( 'Text', 'stax-addons-for-elementor' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'text_show',
			[
				'label'   => __( 'Show Text', 'stax-addons-for-elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->add_control(
			'text',
			[
				'label'     => __( 'Text', 'stax-addons-for-elementor' ),
				'type'      => Controls_Manager::TEXTAREA,
				'default'   => __( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'stax-addons-for-elementor' ),
				'dynamic'   => [
					'active' => true,
				],
				'condition' => [
					'text_show' => 'yes',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'icon_section',
			[
				'label' => __( 'Icon', 'stax-addons-for-elementor' ),
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
					'value'   => 'far fa-paper-plane',
					'library' => 'regular',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'button_section',
			[
				'label' => __( 'Button', 'stax-addons-for-elementor' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'button_show',
			[
				'label'   => __( 'Show', 'stax-addons-for-elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->add_control(
			'button_text',
			[
				'label'     => __( 'Text', 'stax-addons-for-elementor' ),
				'type'      => Controls_Manager::TEXT,
				'default'   => __( 'Click Me', 'stax-addons-for-elementor' ),
				'dynamic'   => [
					'active' => true,
				],
				'condition' => [
					'button_show' => 'yes',
				],
			]
		);

		$this->add_control(
			'button_link',
			[
				'label'       => __( 'Link', 'stax-addons-for-elementor' ),
				'type'        => Controls_Manager::URL,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'https://your-link.com', 'stax-addons-for-elementor' ),
				'default'     => [
					'url' => '',
				],
				'condition'   => [
					'button_show' => 'yes',
				],
			]
		);

		$this->add_control(
			'button_icon',
			[
				'label'       => __( 'Icon', 'stax-addons-for-elementor' ),
				'type'        => Controls_Manager::ICONS,
				'label_block' => true,
				'default'     => [],
				'condition'   => [
					'button_show' => 'yes',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'style_container_section',
			[
				'label' => __( 'Container', 'stax-addons-for-elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		Utils::load_template(
			'widgets/icon-with-text/template',
			[
				'settings' => $settings,
			]
		);
	}

}
