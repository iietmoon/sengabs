<?php

namespace StaxAddons\Widgets\InfoBox;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

use Elementor\Controls_Manager;
use Elementor\Repeater;
use Elementor\Group_Control_Background;

use StaxAddons\Widgets\Base;
use StaxAddons\Utils;

class Component extends Base {

	public function get_name() {
		return 'stax-el-info-box';
	}

	public function get_title() {
		return __( 'Info Box', 'stax-addons-for-elementor' );
	}

	public function get_icon() {
		return 'stx-icon-info-box sq-widget-label';
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
			'title',
			[
				'label'   => __( 'Title', 'stax-addons-for-elementor' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Title Here', 'stax-addons-for-elementor' ),
				'dynamic' => [
					'active' => true,
				],
			]
		);

		$this->add_control(
			'subtitle',
			[
				'label'   => __( 'Sub Title', 'stax-addons-for-elementor' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Sub Title Here', 'stax-addons-for-elementor' ),
				'dynamic' => [
					'active' => true,
				],
			]
		);

		$this->add_control(
			'title_tag',
			[
				'label'   => __( 'Title Tag', 'stax-addons-for-elementor' ),
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
			'subtitle_tag',
			[
				'label'   => __( 'Sub Title Tag', 'stax-addons-for-elementor' ),
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
			'text',
			[
				'label'   => __( 'Text', 'stax-addons-for-elementor' ),
				'type'    => Controls_Manager::TEXTAREA,
				'default' => __( 'Text Here', 'stax-addons-for-elementor' ),
				'dynamic' => [
					'active' => true,
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
					'value'   => 'far fa-paper-plane',
					'library' => 'regular',
				],
			]
		);

		$this->add_control(
			'link',
			[
				'label'       => __( 'Item Link', 'stax-addons-for-elementor' ),
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
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		Utils::load_template(
			'widgets/info-box/template',
			[
				'settings' => $settings,
			]
		);
	}

}
