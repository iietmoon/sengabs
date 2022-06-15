<?php

namespace StaxAddons\Widgets\InfoButton;

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
		return 'stax-el-info-button';
	}

	public function get_title() {
		return __( 'Info Button', 'stax-addons-for-elementor' );
	}

	public function get_icon() {
		return 'stx-icon-info-button sq-widget-label';
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
					'standard'   => __( 'Standard', 'stax-addons-for-elementor' ),
					'icon-boxed' => __( 'Icon Boxed', 'stax-addons-for-elementor' ),
				],
			]
		);

		$this->add_control(
			'text',
			[
				'label'   => __( 'Text', 'stax-addons-for-elementor' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Text Here',
				'dynamic' => [
					'active' => true,
				],
			]
		);

		$this->add_control(
			'subtext',
			[
				'label'   => __( 'Sub Text', 'stax-addons-for-elementor' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'SubText Here',
				'dynamic' => [
					'active' => true,
				],
			]
		);

		$this->add_control(
			'link',
			[
				'label'       => __( 'Link', 'stax-addons-for-elementor' ),
				'type'        => Controls_Manager::URL,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'https://your-link.com', 'stax-addons-for-elementor' ),
				'default'     => [
					'url' => '#',
				],
			]
		);

		$this->add_control(
			'icon',
			[
				'label'       => __( 'Icon', 'stax-addons-for-elementor' ),
				'type'        => Controls_Manager::ICONS,
				'label_block' => true,
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		Utils::load_template(
			'widgets/info-button/template',
			[
				'settings' => $settings,
			]
		);
	}

}
