<?php

namespace StaxAddons\Widgets\IntervalImage;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

use DateInterval;
use DateTime;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Image_Size;
use Elementor\Repeater;

use StaxAddons\Widgets\Base;
use StaxAddons\Utils;

/**
 * Class Component
 *
 * @package StaxAddons\Widgets\IntervalImage
 */
class Component extends Base {

	public function get_name() {
		return 'stax-el-interval-image';
	}

	public function get_title() {
		return esc_html__( 'Interval Image', 'stax-addons-for-elementor' );
	}

	public function get_icon() {
		return 'stx-icon-interval-image sq-widget-label';
	}

	public function get_keywords() {
		return [ 'image', 'logo' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'general_section',
			[
				'label' => esc_html__( 'General', 'stax-addons-for-elementor' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'important_note',
			[
				'label'           => esc_html__( 'Current System Time', 'stax-addons-for-elementor' ),
				'type'            => Controls_Manager::RAW_HTML,
				'raw'             => '<div style="padding: 10px 0; font-weight: bold;">' .
									 ( new DateTime( 'now' ) )->format( 'Y-m-d H:i' ) .
									 '</div>' .
									 esc_html__( 'This Widget allows you to show a different image by different date intervals and also define a default image.', 'stax-addons-for-elementor' ),
				'content_classes' => '',
			]
		);

		$this->add_control(
			'hr',
			[
				'type' => Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'fallback_image',
			[
				'label' => __( 'Choose Image', 'stax-addons-for-elementor' ),
				'type'  => Controls_Manager::MEDIA,
			]
		);

		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name'    => 'fallback_image',
				'default' => 'large',
			]
		);

		$this->add_control(
			'fallback_link',
			[
				'label'         => __( 'Link', 'stax-addons-for-elementor' ),
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

		$this->add_control(
			'hr2',
			[
				'type' => Controls_Manager::DIVIDER,
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'title',
			[
				'label'       => __( 'Title', 'stax-addons-for-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'Default title', 'stax-addons-for-elementor' ),
				'placeholder' => __( 'Type your title here', 'stax-addons-for-elementor' ),
			]
		);

		$repeater->add_control(
			'image',
			[
				'label' => __( 'Choose Image', 'stax-addons-for-elementor' ),
				'type'  => Controls_Manager::MEDIA,
			]
		);

		$repeater->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name'    => 'image',
				'default' => 'large',
			]
		);

		$repeater->add_control(
			'link',
			[
				'label'         => __( 'Link', 'stax-addons-for-elementor' ),
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

		$repeater->add_control(
			'date_start',
			[
				'label'          => __( 'Date Start', 'stax-addons-for-elementor' ),
				'type'           => Controls_Manager::DATE_TIME,
				'picker_options' => [
					'dateFormat'  => 'Y-m-d H:i',
					'time_24hr'   => true,
					'allowInput'  => true,
					'defaultHour' => 00,
				],
			]
		);

		$repeater->add_control(
			'date_end',
			[
				'label'          => __( 'Date End', 'stax-addons-for-elementor' ),
				'type'           => Controls_Manager::DATE_TIME,
				'picker_options' => [
					'dateFormat'  => 'Y-m-d H:i',
					'time_24hr'   => true,
					'allowInput'  => true,
					'defaultHour' => 00,
				],
			]
		);

		$repeater->add_control(
			'repeat',
			[
				'label'        => __( 'Repeat Every Year', 'stax-addons-for-elementor' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => __( 'Yes', 'stax-addons-for-elementor' ),
				'label_off'    => __( 'No', 'stax-addons-for-elementor' ),
				'return_value' => 'yes',
				'default'      => '',
				'description'  => esc_html__( 'Apply the above condition to upcoming years too.', 'stax-addons-for-elementor' ),
			]
		);

		$this->add_control(
			'images_list',
			[
				'label'       => __( 'Image List', 'stax-addons-for-elementor' ),
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'default'     => [],
				'title_field' => '{{{ title }}}',
			]
		);

		$this->add_control(
			'hr3',
			[
				'type' => Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'repeat_general',
			[
				'label'        => __( 'Repeat All Every Year', 'stax-addons-for-elementor' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => __( 'Yes', 'stax-addons-for-elementor' ),
				'label_off'    => __( 'No', 'stax-addons-for-elementor' ),
				'return_value' => 'yes',
				'default'      => '',
				'description'  => esc_html__( 'Apply the above conditions to upcoming years too.', 'stax-addons-for-elementor' ),
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$data = [];

		$repeat = false;

		if ( $settings['repeat_general'] ) {
			$repeat = true;
		}

		foreach ( $settings['images_list'] as $item ) {
			if ( ! empty( $data ) ) {
				continue;
			}

			if ( ! $item['date_start'] || ! $item['date_end'] ) {
				continue;
			}

			if ( ! $repeat && $item['repeat'] ) {
				$repeat = true;
			}

			try {
				$start = new DateTime( $item['date_start'] );
				$end   = new DateTime( $item['date_end'] );
				$now   = new DateTime( 'now' );

				if ( $repeat ) {
					$startYear = $start->format( 'Y' );
					$endYear   = $end->format( 'Y' );
					$nowYear   = $now->format( 'Y' );

					$addStarYear = $nowYear - $startYear;
					$addEndYear  = $nowYear - $endYear;

					if ( $addStarYear > 0 ) {
						$start->add( new DateInterval( 'P' . $addStarYear . 'Y' ) );
					}

					if ( $addEndYear > 0 ) {
						$end->add( new DateInterval( 'P' . $addEndYear . 'Y' ) );
					}
				}

				if ( $start <= $now && $end >= $now ) {
					$data = $item;
				}
			} catch ( \Exception $e ) {

			}
		}

		if ( empty( $data ) ) {
			$data['image']      = $settings['fallback_image'];
			$data['link']       = $settings['fallback_link'];
			$data['image_size'] = $settings['fallback_image_size'];
			if ( isset( $settings['fallback_image_custom_dimensions'] ) ) {
				$data['image_custom_dimensions'] = $settings['fallback_image_custom_dimensions'];
			}
		}

		if ( ! empty( $data ) ) {
			$link_extra = '';

			if ( $data['link']['url'] ) {

				if ( $data['link']['external'] ) {
					$link_extra .= 'target=_blank';
				}

				if ( $data['link']['nofollow'] ) {
					$link_extra .= ' rel=nofollow';
				}
			}

			Utils::load_template(
				'widgets/interval-image/template',
				[
					'link'       => $data['link']['url'],
					'link_extra' => $link_extra,
					'image_html' => Group_Control_Image_Size::get_attachment_image_html( $data ),
					'settings'   => $settings,
				]
			);
		}
	}

}
