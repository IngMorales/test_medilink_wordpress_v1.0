<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
add_editor_style( 'style-editor.css' );
if ( !isset( $content_width ) ) {
	$content_width = 1200;
}
$arr = array();
$arr['medilink_license'] = ['key' => '********','domain' => esc_url( home_url() ) ];
update_option('rt_licenses', $arr);
class medilink_Main {
	public $theme   = 'medilink';
	public $action  = 'medilink_theme_init';
	public function __construct() {
		add_action( 'after_setup_theme', array( $this, 'load_textdomain' ) );
		$this->includes();
	}
	public function load_textdomain(){
		load_theme_textdomain( $this->theme, get_template_directory() . '/languages' );
	}
	public function includes(){
		do_action( $this->action );
		require_once get_template_directory() . '/inc/constants.php';
		require_once get_template_directory() . '/inc/includes.php';
		require_once get_template_directory() . '/inc/class-constants.php';
		require_once get_template_directory() . '/inc/lc-helper.php';
		require_once get_template_directory() . '/inc/lc-utility.php';
	}
}
new medilink_Main;
add_editor_style( 'style-editor.css' );
