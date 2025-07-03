<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Medilink;

use \Redux;
use \ReduxFrameworkPlugin;

if ( !class_exists( NS . 'RDTheme' ) ) {

	class RDTheme {

		protected static $instance = null;

		// Sitewide static variables
		public static $options = null;

		// Template specific variables
		public static $layout = null;
		public static $sidebar = null;
		public static $tr_header = null;
		public static $top_bar = null;	
		public static $top_bar_style = null;	
		public static $header_style = null;
		public static $footer_style = null;
		public static $padding_top = null;
		public static $padding_bottom = null;
		public static $has_banner = null;
		public static $has_breadcrumb = null;
		public static $bgtype = null;
		public static $bgimg = null;
		public static $bgcolor = null;

		public static $inner_padding_top = null;
		public static $inner_padding_bottom = null;

		private function __construct() {
			$this->redux_init();
			add_action( 'after_setup_theme', array( $this, 'set_options' ) );
			add_action( 'after_setup_theme', array( $this, 'set_redux_compability_options' ) );
		}

		public static function instance() {
			if ( null == self::$instance ) {
				self::$instance = new self;
			}
			return self::$instance;
		}

		public function redux_init() {
			$medilink = MEDILINK_THEME_PREFIX_VAR;
			add_action( 'admin_menu', array( $this, 'remove_redux_menu' ), 12 ); // Remove Redux Menu
			add_filter( "redux/{$medilink}/aURL_filter", '__return_empty_string' ); // Remove Redux Ads
			add_action( 'redux/loaded', array( $this, 'remove_redux_demo' ) ); // If Redux is running as a plugin, this will remove the demo notice and links
			add_action( "redux/page/{$medilink}/enqueue", array( $this, 'redux_admin_style' ) ); // Redux Admin CSS
		}

	
		public function set_options(){
		    include MEDILINK_THEME_INC_DIR . 'predefined-data.php';
				$options    = json_decode( $predefined_data, true );
				if ( class_exists( 'Redux' ) && isset( $GLOBALS[Constants::$theme_options] ) ) {
					$options    = wp_parse_args( $GLOBALS[Constants::$theme_options], $options );
				}
				self::$options  = $options;
		}

		public function remove_redux_menu() {
			remove_submenu_page( 'tools.php','redux-about' );
		}

		public function remove_redux_demo() {
			if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
			    add_filter( 'plugin_row_meta', array( $this, 'redux_remove_extra_meta' ), 12, 2 );
			    remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
			}
		}
		public function redux_remove_extra_meta( $links, $file ){
			if ( strpos( $file, 'redux-framework.php' ) !== false) {
			    $links = array_slice( $links, 0, 3 );
			}

		return $links;
		}

		// Backward compability for newly added options
		public function set_redux_compability_options(){
			$new_options = array(		
 
            'services_layout' => "right-sidebar",
            'services_archive_layout' => "right-sidebar",
   
            'services_sidebar' => "sidebar",
            'services_archive_sidebar' => "sidebar",
   
            'services_padding_top' => "95",
            'services_archive_padding_top' => "95",
     
            'services_padding_bottom' => "95",
            'services_archive_padding_bottom' => "95",
      
            'services_banner' => "true",
            'services_archive_banner' => "true",
      
            'services_breadcrumb' => "true",
            'services_archive_breadcrumb' => "true",
   
            'services_bgtype' => "bgimg",
            'services_archive_bgtype' => "bgimg",
     
            'services_bgimg' => "",
            'services_archive_bgimg' => "",
      
            'services_bgcolor' => "",
            'services_archive_bgcolor' => "",
      
            'services_inner_padding_top' => "100",
            'services_archive_inner_padding_top' => "100",
  
            'services_inner_padding_bottom' => "100",
            'services_archive_inner_padding_bottom' => "100",
            
            'departments_sidebar_title' => "All Departments",

            'mobile_header_style' => "1",

			'phone_has_mobile'=> "true",
			'phone_has_email'=> "true",
			'phone_has_opening'=> "true",
			'phone_has_address'=> "true",
			'phone_has_social'=> "true",
			
			'header_btn_has_mobile'=> "true",
			'header_search_has_mobile'=> "true",
			
			'doctors_title'=> "Doctors",
			'gallery_title'=> "Gallery",
			'departments_title'=> "Departments",
			'services_title'=> "Services",

			);

			foreach ( $new_options as $key => $value ) {
				if ( !isset( self::$options[$key] ) ) {
					self::$options[$key] = $value;
				}
			}
		}

		public function redux_admin_style() {
			$medilink = MEDILINK_THEME_PREFIX;
			wp_enqueue_style( "{$medilink}-redux-admin", Helper::get_css( 'redux-admin' ), array( 'redux-admin-css' ), MEDILINK_THEME_VERSION );
		}
	}
}

RDTheme::instance();