<?php

namespace StaxAddons;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Widget_Base;
use Elementor\Plugin;

/**
 * Class StaxWidgets
 *
 * @package StaxAddons
 */
class StaxWidgets {

	/**
	 * @var null
	 */
	public static $instance;

	/**
	 * @return StaxWidgets|null
	 */
	public static function instance() {
		if ( self::$instance === null ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * StaxAddons constructor.
	 */
	public function __construct() {
		add_action( 'elementor/elements/categories_registered', [ $this, 'register_elementor_category' ] );
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'register_widgets' ] );
		add_action( 'elementor/editor/after_enqueue_styles', [ $this, 'editor_css' ] );
	}

	/**
	 * Get widgets
	 *
	 * @param bool $active
	 * @param bool $with_status
	 *
	 * @return array
	 */
	public function get_widgets( $active = false, $with_status = false ) {
		$widgets = [];

		$widgets['breadcrumbs'] = [
			'scope' => 'Breadcrumbs',
			'name'  => 'Breadcrumbs',
			'slug'  => 'stax-el-breadcrumbs',
		];

		$widgets['button'] = [
			'scope' => 'Button',
			'name'  => 'Button',
			'slug'  => 'stax-el-button',
		];

		$widgets['dropdown'] = [
			'scope' => 'Dropdown',
			'name'  => 'Dropdown',
			'slug'  => 'stax-el-dropdown',
		];

		$widgets['heading'] = [
			'scope' => 'Heading',
			'name'  => 'Heading',
			'slug'  => 'stax-el-heading',
		];

		$widgets['read-more'] = [
			'scope' => 'ReadMore',
			'name'  => 'Read More',
			'slug'  => 'stax-el-read-more',
		];

		$widgets['interval-image'] = [
			'scope' => 'IntervalImage',
			'name'  => 'Interval Image',
			'slug'  => 'stax-el-interval-image',
		];

		$widgets['scroll-top'] = [
			'scope' => 'ScrollTop',
			'name'  => 'Scroll Top',
			'slug'  => 'stax-el-scroll-top',
		];

		$widgets['slider'] = [
			'scope' => 'Slider',
			'name'  => 'Slider',
			'slug'  => 'stax-el-slider',
		];

		$widgets['typeout-text'] = [
			'scope' => 'TypeoutText',
			'name'  => 'Typeout Text',
			'slug'  => 'stax-el-typeout-text',
		];

		$widgets['blockquote'] = [
			'scope' => 'BlockQuote',
			'name'  => 'Blockquote',
			'slug'  => 'stax-el-blockquote',
		];

		$widgets['icon-with-text'] = [
			'scope' => 'IconWithText',
			'name'  => 'Icon With Text',
			'slug'  => 'stax-el-icon-with-text',
		];

		$widgets['info-button'] = [
			'scope' => 'InfoButton',
			'name'  => 'Info Button',
			'slug'  => 'stax-el-info-button',
		];

		$widgets['section-title'] = [
			'scope' => 'SectionTitle',
			'name'  => 'Section Title',
			'slug'  => 'stax-el-section-title',
		];

		$widgets['divider'] = [
			'scope' => 'Divider',
			'name'  => 'Divider',
			'slug'  => 'stax-el-divider',
		];

		$widgets['counter'] = [
			'scope' => 'Counter',
			'name'  => 'Counter',
			'slug'  => 'stax-el-counter',
		];

		$widgets['testimonials'] = [
			'scope' => 'Testimonials',
			'name'  => 'Testimonials',
			'slug'  => 'stax-el-testimonials',
		];

		$widgets['testimonials-slider'] = [
			'scope' => 'TestimonialsSlider',
			'name'  => 'Testimonials Slider',
			'slug'  => 'stax-el-testimonials-slider',
		];

		$widgets['info-box'] = [
			'scope' => 'InfoBox',
			'name'  => 'Info Box',
			'slug'  => 'stax-el-info-box',
		];

		$widgets['accordion'] = [
			'scope' => 'Accordion',
			'name'  => 'Accordion & Toggle',
			'slug'  => 'stax-el-accordion',
		];

		// Remove disabled widgets.
		if ( $active && ! $with_status ) {
			$disabled_widgets = get_option( '_stax_addons_disabled_widgets', [] );
			foreach ( $widgets as $k => $widget ) {
				if ( isset( $disabled_widgets[ $widget['slug'] ] ) ) {
					unset( $widgets[ $k ] );
				}
			}
		}

		if ( $with_status ) {
			$disabled_widgets = get_option( '_stax_addons_disabled_widgets', [] );
			foreach ( $widgets as $k => $widget ) {
				if ( isset( $disabled_widgets[ $widget['slug'] ] ) ) {
					$widgets[ $k ]['status'] = false;
				} else {
					$widgets[ $k ]['status'] = true;
				}
			}
		}

		return $widgets;
	}

	/**
	 * Register Elementor widgets
	 */
	public function register_widgets() {
		// get our own widgets up and running:
		if ( defined( 'ELEMENTOR_PATH' ) && class_exists( Widget_Base::class ) && class_exists( Plugin::class ) && is_callable( Plugin::class, 'instance' ) ) {
			$elementor = \Elementor\Plugin::instance();

			if ( isset( $elementor->widgets_manager ) && method_exists( $elementor->widgets_manager, 'register_widget_type' ) ) {
				// Require Base class for widgets
				require_once STAX_EL_PATH . '/widgets/Base.php';

				$elements = $this->get_widgets( true );
				foreach ( $elements as $folder => $element ) {
					if ( $widget_file = $this->get_widget_file( $folder ) ) {

						require_once $widget_file;
						$class_name = '\StaxAddons\Widgets\\' . $element['scope'] . '\Component';
						$elementor->widgets_manager->register_widget_type( new $class_name() );
					}
				}
			}
		}
	}

	/**
	 * Register new Elementor category
	 */
	public function register_elementor_category() {
		if ( defined( 'ELEMENTOR_PATH' ) && class_exists( Widget_Base::class ) && class_exists( Plugin::class ) && is_callable( Plugin::class, 'instance' ) ) {
			\Elementor\Plugin::instance()->elements_manager->add_category(
				'stax-elementor',
				[
					'title' => 'Stax Elements',
					'icon'  => 'fa fa-plug',
				]
			);
		}
	}

	/**
	 * Get widget file path
	 *
	 * @param $folder
	 *
	 * @return bool|string
	 */
	public function get_widget_file( $folder ) {
		$template_file = STAX_EL_WIDGET_PATH . $folder . '/Component.php';

		if ( $template_file && is_readable( $template_file ) ) {
			return $template_file;
		}

		return false;
	}

	/**
	 * Enqueue Elementor Editor CSS
	 */
	public function editor_css() {
		$this->enqueue_icons();

		wp_enqueue_style(
			'stax-elementor-panel-label-style',
			STAX_EL_ASSETS_URL . 'css/label.css',
			null,
			STAX_EL_VERSION
		);
	}

	public function enqueue_icons() {
		wp_enqueue_style(
			'stax-elementor-panel-style',
			STAX_EL_ASSETS_URL . 'css/editor.css',
			null,
			STAX_EL_VERSION
		);
	}

}

StaxWidgets::instance();
