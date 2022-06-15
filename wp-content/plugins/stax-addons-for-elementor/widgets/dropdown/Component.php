<?php

namespace StaxAddons\Widgets\Dropdown;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Typography;
use Elementor\Icons_Manager;
use Elementor\Repeater;

use StaxAddons\Widgets\Base;
use StaxAddons\Utils;

class Component extends Base {

	public function get_name() {
		return 'stax-el-dropdown';
	}

	public function get_title() {
		return __( 'Dropdown', 'stax-addons-for-elementor' );
	}

	public function get_icon() {
		return 'stx-icon-dropdown sq-widget-label';
	}

	protected function register_controls() {
		$this->start_controls_section(
			'section_button',
			[
				'label' => __( 'Button', 'stax-addons-for-elementor' ),
			]
		);

		$this->add_control(
			'text',
			[
				'label'       => __( 'Text', 'stax-addons-for-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'default'     => __( 'Click here', 'stax-addons-for-elementor' ),
				'placeholder' => __( 'Click here', 'stax-addons-for-elementor' ),
			]
		);

		$this->add_responsive_control(
			'align',
			[
				'label'        => __( 'Alignment', 'stax-addons-for-elementor' ),
				'type'         => Controls_Manager::CHOOSE,
				'options'      => [
					'left'    => [
						'title' => __( 'Left', 'stax-addons-for-elementor' ),
						'icon'  => 'eicon-text-align-left',
					],
					'center'  => [
						'title' => __( 'Center', 'stax-addons-for-elementor' ),
						'icon'  => 'eicon-text-align-center',
					],
					'right'   => [
						'title' => __( 'Right', 'stax-addons-for-elementor' ),
						'icon'  => 'eicon-text-align-right',
					],
					'justify' => [
						'title' => __( 'Justified', 'stax-addons-for-elementor' ),
						'icon'  => 'eicon-text-align-justify',
					],
				],
				'prefix_class' => 'elementor%s-align-',
				'default'      => '',
			]
		);

		$this->add_control(
			'trigger',
			[
				'label'        => __( 'Dropdown Trigger', 'stax-addons-for-elementor' ),
				'type'         => Controls_Manager::CHOOSE,
				'options'      => [
					'hover' => [
						'title' => __( 'Hover', 'stax-addons-for-elementor' ),
						'icon'  => 'eicon-drag-n-drop',
					],
					'click' => [
						'title' => __( 'Click', 'stax-addons-for-elementor' ),
						'icon'  => 'eicon-click',
					],
				],
				'prefix_class' => 'stx-trigger-',
				'default'      => 'hover',
			]
		);

		$this->add_control(
			'size',
			[
				'label'          => __( 'Size', 'elementor' ),
				'type'           => Controls_Manager::SELECT,
				'default'        => 'sm',
				'options'        => [
					'xs' => __( 'Extra Small', 'elementor' ),
					'sm' => __( 'Small', 'elementor' ),
					'md' => __( 'Medium', 'elementor' ),
					'lg' => __( 'Large', 'elementor' ),
					'xl' => __( 'Extra Large', 'elementor' ),
				],
				'style_transfer' => true,
			]
		);

		$this->add_control(
			'selected_icon',
			[
				'label'       => __( 'Icon', 'stax-addons-for-elementor' ),
				'type'        => Controls_Manager::ICONS,
				'label_block' => true,
			]
		);

		$this->add_control(
			'icon_align',
			[
				'label'     => __( 'Icon Position', 'stax-addons-for-elementor' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'left'  => __( 'Before', 'stax-addons-for-elementor' ),
					'right' => __( 'After', 'stax-addons-for-elementor' ),
				],
				'default'   => 'right',
				'condition' => [
					'selected_icon[value]!' => '',
				],
			]
		);

		$this->add_control(
			'icon_indent',
			[
				'label'     => __( 'Icon Spacing', 'stax-addons-for-elementor' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => [
					'px' => [
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .stx-dropdown-wrapper .stx-btn .stx-btn-content-wrapper .stx-btn-icon.stx-icon-right' => 'margin-left: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .stx-dropdown-wrapper .stx-btn .stx-btn-content-wrapper .stx-btn-icon.stx-icon-left'  => 'margin-right: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'view',
			[
				'label'   => __( 'View', 'stax-addons-for-elementor' ),
				'type'    => Controls_Manager::HIDDEN,
				'default' => 'traditional',
			]
		);

		$this->add_control(
			'button_css_id',
			[
				'label'       => __( 'Button ID', 'stax-addons-for-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'default'     => '',
				'title'       => __( 'Add your custom id WITHOUT the Pound key. e.g: my-id', 'stax-addons-for-elementor' ),
				'label_block' => false,
				'description' => __( 'Please make sure the ID is unique and not used elsewhere on the page this form is displayed. This field allows <code>A-z 0-9</code> & underscore chars without spaces.', 'stax-addons-for-elementor' ),
				'separator'   => 'before',

			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_button_style',
			[
				'label' => __( 'Button', 'stax-addons-for-elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'typography',
				'selector' => '{{WRAPPER}} a.stx-btn, {{WRAPPER}} .stx-btn',
			]
		);

		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name'     => 'text_shadow',
				'selector' => '{{WRAPPER}} a.stx-btn, {{WRAPPER}} .stx-btn',
			]
		);

		$this->start_controls_tabs( 'tabs_button_style' );

		$this->start_controls_tab(
			'tab_button_normal',
			[
				'label' => __( 'Normal', 'stax-addons-for-elementor' ),
			]
		);

		$this->add_control(
			'button_text_color',
			[
				'label'     => __( 'Text Color', 'stax-addons-for-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} a.stx-btn, {{WRAPPER}} .stx-btn' => 'fill: {{VALUE}}; color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'background_color',
			[
				'label'     => __( 'Background Color', 'stax-addons-for-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} a.stx-btn, {{WRAPPER}} .stx-btn' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'button_box_shadow',
				'selector' => '{{WRAPPER}} .stx-btn',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_button_hover',
			[
				'label' => __( 'Hover', 'stax-addons-for-elementor' ),
			]
		);

		$this->add_control(
			'hover_color',
			[
				'label'     => __( 'Text Color', 'stax-addons-for-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} a.stx-btn:hover, {{WRAPPER}} .stx-btn:hover, {{WRAPPER}} a.stx-btn:focus, {{WRAPPER}} .stx-btn:focus'                 => 'color: {{VALUE}};',
					'{{WRAPPER}} a.stx-btn:hover svg, {{WRAPPER}} .stx-btn:hover svg, {{WRAPPER}} a.stx-btn:focus svg, {{WRAPPER}} .stx-btn:focus svg' => 'fill: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_background_hover_color',
			[
				'label'     => __( 'Background Color', 'stax-addons-for-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} a.stx-btn:hover, {{WRAPPER}} .stx-btn:hover, {{WRAPPER}} a.stx-btn:focus, {{WRAPPER}} .stx-btn:focus' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_hover_border_color',
			[
				'label'     => __( 'Border Color', 'stax-addons-for-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'condition' => [
					'border_border!' => '',
				],
				'selectors' => [
					'{{WRAPPER}} a.stx-btn:hover, {{WRAPPER}} .stx-btn:hover, {{WRAPPER}} a.stx-btn:focus, {{WRAPPER}} .stx-btn:focus' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'button_hover_box_shadow',
				'selector' => '{{WRAPPER}} .stx-btn:hover',
			]
		);

		$this->add_control(
			'hover_animation',
			[
				'label' => __( 'Hover Animation', 'stax-addons-for-elementor' ),
				'type'  => Controls_Manager::HOVER_ANIMATION,
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'      => 'border',
				'selector'  => '{{WRAPPER}} .stx-btn',
				'separator' => 'before',
			]
		);

		$this->add_control(
			'border_radius',
			[
				'label'      => __( 'Border Radius', 'stax-addons-for-elementor' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					'{{WRAPPER}} a.stx-btn, {{WRAPPER}} .stx-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'text_padding',
			[
				'label'      => __( 'Padding', 'stax-addons-for-elementor' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors'  => [
					'{{WRAPPER}} a.stx-btn, {{WRAPPER}} .stx-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator'  => 'before',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_dropdown',
			[
				'label' => __( 'Dropdown', 'stax-addons-for-elementor' ),
			]
		);

		$this->add_control(
			'dropdown_min_width',
			[
				'label'      => __( 'Min Width', 'stax-addons-for-elementor' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range'      => [
					'%'  => [
						'max' => 100,
					],
					'px' => [
						'max' => 2000,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .stx-dropdown-wrapper .stx-dropdown-content-wrapper' => 'min-width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'dropdown_columns',
			[
				'label'       => __( 'Columns', 'stax-addons-for-elementor' ),
				'description' => __( 'Max 3 columns can be displayed in the dropdown.', 'stax-addons-for-elementor' ),
				'type'        => Controls_Manager::NUMBER,
				'min'         => 1,
				'max'         => 3,
				'step'        => 1,
				'default'     => 1,
			]
		);

		$this->add_control(
			'dropdown_column_spacing',
			[
				'label'     => __( 'Column Spacing', 'stax-addons-for-elementor' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => [
					'px' => [
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .stx-dropdown-content ul' => 'margin-left: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .stx-dropdown-content ul:first-child' => 'margin-left: 0;',
					'{{WRAPPER}} .stx-dropdown-content ul:last-child' => 'margin-right: 0;',
				],
			]
		);

		$this->add_control(
			'dropdown_hr',
			[
				'type' => Controls_Manager::DIVIDER,
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'dropdown_item_text',
			[
				'label'       => __( 'Item Text', 'stax-addons-for-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'default'     => __( 'Item', 'stax-addons-for-elementor' ),
				'placeholder' => __( 'Item', 'stax-addons-for-elementor' ),
			]
		);

		$repeater->add_control(
			'dropdown_item_link',
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

		$repeater->add_control(
			'dropdown_item_column',
			[
				'label'       => __( 'Item Column', 'stax-addons-for-elementor' ),
				'description' => __( 'Attach this item to a column number.', 'stax-addons-for-elementor' ),
				'type'        => Controls_Manager::NUMBER,
				'min'         => 1,
				'max'         => 3,
				'step'        => 1,
				'default'     => 1,
			]
		);

		$this->add_control(
			'dropdown_items',
			[
				'label'       => __( 'Dropdown Items', 'stax-editor' ),
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'default'     => [
					[
						'dropdown_item_text'   => __( 'My first item', 'stax-addons-for-elementor' ),
						'dropdown_item_link'   => '#',
						'dropdown_item_column' => 1,
					],
				],
				'title_field' => '{{{ dropdown_item_text }}}',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_dropdown_style',
			[
				'label' => __( 'Dropdown', 'stax-addons-for-elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'dropdown_typography',
				'selector' => '{{WRAPPER}} .stx-dropdown-content a',
			]
		);

		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name'     => 'dropdown_text_shadow',
				'selector' => '{{WRAPPER}} .stx-dropdown-content a',
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'dropdown_box_shadow',
				'selector' => '{{WRAPPER}} .stx-dropdown-content',
			]
		);

		$this->add_control(
			'dropdown_background_color',
			[
				'label'     => __( 'Background Color', 'stax-addons-for-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .stx-dropdown-content' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->start_controls_tabs( 'tabs_dropdown_style' );

		$this->start_controls_tab(
			'tab_dropdown_normal',
			[
				'label' => __( 'Normal', 'stax-addons-for-elementor' ),
			]
		);

		$this->add_control(
			'dropdown_link_color',
			[
				'label'     => __( 'Link Color', 'stax-addons-for-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .stx-dropdown-content a' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_dropdown_hover',
			[
				'label' => __( 'Hover', 'stax-addons-for-elementor' ),
			]
		);

		$this->add_control(
			'dropdown_link_hover_color',
			[
				'label'     => __( 'Link Color', 'stax-addons-for-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .stx-dropdown-content a:hover, {{WRAPPER}} .stx-dropdown-content a:focus' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'      => 'dropdown_border',
				'selector'  => '{{WRAPPER}} .stx-dropdown-content',
				'separator' => 'before',
			]
		);

		$this->add_control(
			'dropdown_border_radius',
			[
				'label'      => __( 'Border Radius', 'stax-addons-for-elementor' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .stx-dropdown-content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'dropdown_padding',
			[
				'label'      => __( 'Padding', 'stax-addons-for-elementor' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .stx-dropdown-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator'  => 'before',
			]
		);

		$this->add_responsive_control(
			'dropdown_margin',
			[
				'label'      => __( 'Margin', 'stax-addons-for-elementor' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .stx-dropdown-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		$this->add_render_attribute( 'icon', 'class', 'stx-btn-icon' );

		if ( $settings['selected_icon']['value'] ) {
			$this->add_render_attribute( 'icon', 'class', 'stx-icon-' . $settings['icon_align'] );
		}

		$this->add_render_attribute( 'button', 'role', 'button' );
		$this->add_render_attribute( 'button', 'class', 'stx-btn' );
		$this->add_render_attribute( 'button', 'class', 'stx-btn-' . $settings['size'] );
		$this->add_render_attribute( 'button', 'class', 'stx-btn-dropdown' );

		if ( ! empty( $settings['button_css_id'] ) ) {
			$this->add_render_attribute( 'button', 'id', $settings['button_css_id'] );
		}

		Utils::load_template(
			'widgets/dropdown/template',
			[
				'button_attribute' => $this->get_render_attribute_string( 'button' ),
				'icon_attribute'   => $this->get_render_attribute_string( 'icon' ),
				'settings'         => $settings,
			]
		);
	}

}
