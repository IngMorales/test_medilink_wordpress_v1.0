<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Medilink;

class Activation {

	protected static $instance = null;

	public function __construct() {
		add_action( 'after_switch_theme', array( $this, 'init' ) );
	}

	public static function instance() {
		if ( null == self::$instance ) {
			self::$instance = new self;
		}
		return self::$instance;
	}

	public function init() {
		if ( !get_option( 'medilink_activated_before' ) ) {
			update_option( 'medilink_activated_before', 'yes' );
			$this->set_elementor_default_options();
			$this->set_woocommerce_default_options(); 
		}
	}

	public function set_elementor_default_options() {
		$data = array(
			'elementor_disable_typography_schemes' => 'yes',
			'elementor_disable_color_schemes'      => 'yes',
			'elementor_css_print_method'           => 'internal',
			'elementor_cpt_support'                => array( 'page' ),
			'elementor_container_width'            => '1320',

			'_elementor_general_settings'          => array(
				'default_generic_fonts' => 'Sans-serif',
				'global_image_lightbox' => 'yes',
				'container_width'       => '1320',
			),
			'_elementor_global_css' 	=> array(
				'time'   => '1534145031',
				'fonts'  => array(),
				'status' => 'inline',
				'0'      => false,
				'css'    => '.elementor-section.elementor-section-boxed > .elementor-container{max-width:1320px;}',
			),
		);

		foreach ( $data as $key => $value ) {
			update_option( $key, $value );
		}
	}

	public function set_woocommerce_default_options() {
		update_option( 'woocommerce_single_image_width', '570' ); // 570x653
		update_option( 'woocommerce_thumbnail_image_width', '360' );
		update_option( 'woocommerce_thumbnail_cropping', 'custom' );
		update_option( 'woocommerce_thumbnail_cropping_custom_width', '5' );
		update_option( 'woocommerce_thumbnail_cropping_custom_height', '6' );
	}

}

Activation::instance();