<?php

namespace StaxAddons\Widgets\Counter;

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
		return 'stax-el-counter';
	}

	public function get_title() {
		return __( 'Counter', 'stax-addons-for-elementor' );
	}

	public function get_icon() {
		return 'stx-icon-counter sq-widget-label';
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
			'start_digit',
			[
				'label'   => __( 'Start Digit', 'stax-addons-for-elementor' ),
				'type'    => Controls_Manager::NUMBER,
				'min'     => 0,
				'max'     => 999999,
				'step'    => 1,
				'default' => 0,
				'dynamic' => [
					'active' => true,
				],
			]
		);

		$this->add_control(
			'end_digit',
			[
				'label'   => __( 'End Digit', 'stax-addons-for-elementor' ),
				'type'    => Controls_Manager::NUMBER,
				'min'     => 0,
				'max'     => 999999,
				'step'    => 1,
				'default' => 20,
				'dynamic' => [
					'active' => true,
				],
			]
		);

		$this->add_control(
			'digit_label',
			[
				'label'   => __( 'Digit Label', 'stax-addons-for-elementor' ),
				'type'    => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
			]
		);

		$this->add_control(
			'title',
			[
				'label'   => __( 'Title', 'stax-addons-for-elementor' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Your title here', 'stax-addons-for-elementor' ),
				'dynamic' => [
					'active' => true,
				],
			]
		);

		$this->add_control(
			'text',
			[
				'label'   => __( 'Text', 'stax-addons-for-elementor' ),
				'type'    => Controls_Manager::TEXTAREA,
				'default' => __( 'Your text here', 'stax-addons-for-elementor' ),
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

		$this->end_controls_section();

		$this->start_controls_section(
			'icon_section',
			[
				'label' => __( 'Icon', 'stax-addons-for-elementor' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'icon_enabled',
			[
				'label'     => __( 'Show Icon', 'stax-addons-for-elementor' ),
				'type'      => Controls_Manager::SWITCHER,
				'label_off' => __( 'No', 'stax-addons-for-elementor' ),
				'label_on'  => __( 'Yes', 'stax-addons-for-elementor' ),
				'default'   => '',
			]
		);

		$this->add_control(
			'icon',
			[
				'label'       => __( 'Icon', 'stax-addons-for-elementor' ),
				'type'        => Controls_Manager::ICONS,
				'label_block' => true,
				'condition'   => [
					'icon_enabled' => 'yes',
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		Utils::load_template(
			'widgets/counter/template',
			[
				'settings' => $settings,
			]
		);
	}

}
