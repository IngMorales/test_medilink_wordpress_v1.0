<?php
/*
Plugin Name: Medilink-Core
Plugin URI: https://www.radiustheme.com
Description: Medilink Core Plugin for Medilink Theme
Version: 1.6.5
Author: RadiusTheme
Author URI: https://www.radiustheme.com
*/

if ( ! defined( 'ABSPATH' ) ) exit;
if ( ! defined( 'MEDILINK_CORE' ) ) {
	define( 'MEDILINK_CORE',  ( WP_DEBUG ) ? time() : '1.0' );
	define( 'MEDILINK_CORE_THEME',      'medilink' );
	define( 'MEDILINK_CORE_THEME_VAR',  'medilink' );
	define( 'MEDILINK_CORE_CPT', 		'medilink' );
	define( 'MEDILINK_CORE_DIR', plugin_dir_path( __FILE__ ) );
}


class Medilink_Core {
	public $plugin  = 'medilink-core';
	public $action  = 'medilink_theme_init';
	public function __construct() {
		$prefix = MEDILINK_CORE_THEME_VAR;
		add_action( 'plugins_loaded', 		array( $this, 'demo_importer' ), 15 );
		add_action( 'plugins_loaded', 		array( $this, 'load_textdomain' ), 16 );
		add_action( 'after_setup_theme', 	array( $this, 'post_types' ), 15 );
		add_action( 'after_setup_theme', 	array( $this, 'elementor_widgets' ) );
		add_action( $this->action,          array( $this, 'after_theme_loaded' ) );
		// Redux Flash permalink after options changed
		add_action( "redux/options/{$prefix}/saved", 			array( $this, 'flush_redux_saved' ), 10, 2 );
		add_action( "redux/options/{$prefix}/section/reset", 	array( $this, 'flush_redux_reset' ) );
		add_action( "redux/options/{$prefix}/reset", 			array( $this, 'flush_redux_reset' ) );
		add_action( 'init', 									array( $this, 'rewrite_flush_check' ) );
	}

	public function demo_importer() {
		require_once 'demo-importer.php';
	}


	public function load_textdomain() {
		load_plugin_textdomain( $this->plugin , false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
	}


	public function after_theme_loaded() {
		require_once MEDILINK_CORE_DIR . 'lib/wp-svg/init.php'; // SVG support
	}


	public function post_types(){
		if ( !did_action( $this->action ) || ! defined( 'RT_FRAMEWORK_VERSION' ) ) {
			return;
		}
		require_once 'post-types.php';
		require_once 'post-meta.php';
		require_once 'shortcode.php';
		require_once 'widgets/init.php';
		require_once 'sidebar-generator.php';
	}

	public function elementor_widgets(){
		if ( did_action( $this->action ) && did_action( 'elementor/loaded' ) ) {
			require_once 'elementor/init.php';
		}
	}

	// Flush rewrites

	public function flush_redux_saved( $saved_options, $changed_options ){
		if ( empty( $changed_options ) ) {
			return;
		}
		$prefix = MEDILINK_CORE_THEME_VAR;
		$flush  = false;
		$slugs  = array( 'speaker_slug', 'gallrey_slug' );
		foreach ( $slugs as $slug ) {
			if ( array_key_exists( $slug, $changed_options ) ) {
				$flush = true;
			}
		}
		if ( $flush ) {
			update_option( "{$prefix}_rewrite_flash", true );
		}
	}

	public function flush_redux_reset(){
		$prefix = MEDILINK_CORE_THEME_VAR;
		update_option( "{$prefix}_rewrite_flash", true );
	}

	public function rewrite_flush_check() {
		$prefix = MEDILINK_CORE_THEME_VAR;
		if ( get_option( "{$prefix}_rewrite_flash" ) == true ) {
			flush_rewrite_rules();
			update_option( "{$prefix}_rewrite_flash", false );
		}
	}
}
new Medilink_Core;

// Plugin Hooks
require_once MEDILINK_CORE_DIR . 'plugin-hooks.php';
require_once MEDILINK_CORE_DIR . 'lib/optimization/__init__.php';