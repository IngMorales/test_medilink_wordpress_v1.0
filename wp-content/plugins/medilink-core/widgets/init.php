<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */


namespace radiustheme\Medilink_Core;

use radiustheme\Medilink\RDTheme;
use radiustheme\Medilink\Helper;

class Custom_Widgets_Init {

	public $widgets;
	protected static $instance = null;

	public function __construct() {

		// Widgets -- filename=>classname /@dev
		$this->widgets =  array(	
			'recent-post-widget' 		=> 'Recent_Posts_Widget',
			'info-widget' 				=> 'Information_Widget',
			'open-hour-widget' 			=> 'Open_Hour_Widget',
			'about-widget' 				=> 'About_Widget',
		);

		add_action( 'widgets_init', array( $this, 'custom_widgets' ) );
	}

	public static function instance() {
		if ( null == self::$instance ) {
			self::$instance = new self;
		}
		return self::$instance;
	}

	public function custom_widgets() {
		if ( !class_exists( 'RT_Widget_Fields' ) ) return;
		foreach ( $this->widgets as $filename => $classname ) {			
			 $file  = MEDILINK_CORE_DIR . 'widgets'. '/'.  $filename . '.php';
			 $class = __NAMESPACE__ . '\\' . $classname;
			require_once $file;
			register_widget( $class );
		}
	}
}
Custom_Widgets_Init::instance();