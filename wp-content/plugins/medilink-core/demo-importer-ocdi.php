<?php
/**
 * @author  RadiusTheme
 * @since   1.2
 * @version 1.2
 */


namespace radiustheme\Medilink_Core;

use \WPCF7_ContactFormTemplate;

if ( ! defined( 'ABSPATH' ) ) exit;


class Demo_Importer_OCDI {


	public function __construct() {
		add_filter( 'pt-ocdi/import_files',          array( $this, 'demo_config' ) );		
		add_filter( 'pt-ocdi/after_import',          array( $this, 'after_import' ) );
		add_filter( 'pt-ocdi/before_widgets_import', array( $this, 'before_widgets_import' ) );		
		add_filter( 'pt-ocdi/disable_pt_branding',   '__return_true' );
		add_action( 'init',                          array( $this, 'rewrite_flush_check' ) );
	}


	public function demo_config() {

		$demos_array = array(
			'demo1' => array(
				'title' => __( 'Home 1', 'medilink-core' ),
				'page'  => __( 'Home 1', 'medilink-core' ),
				'screenshot' => plugins_url( 'screenshots/screenshot1.jpg', dirname(__FILE__) ),
				'preview_link' => 'https://radiustheme.com/demo/wordpress/themes/medilink/',
			),
			'demo2' => array(
				'title' => __( 'Home 2', 'medilink-core' ),
				'page'  => __( 'Home 2', 'medilink-core' ),
				'screenshot' => plugins_url( 'screenshots/screenshot2.jpg', dirname(__FILE__) ),
				'preview_link' => 'https://radiustheme.com/demo/wordpress/themes/medilink/home-2/',
			),
			'demo3' => array(
				'title' => __( 'Home 3', 'medilink-core' ),
				'page'  => __( 'Home 3', 'medilink-core' ),
				'screenshot' => plugins_url( 'screenshots/screenshot3.jpg', dirname(__FILE__) ),
				'preview_link' => 'https://radiustheme.com/demo/wordpress/themes/medilink/home-3/',
			),
			'demo4' => array(
				'title' => __( 'Home 4', 'medilink-core' ),
				'page'  => __( 'Home 4', 'medilink-core' ),
				'screenshot' => plugins_url( 'screenshots/screenshot4.jpg', dirname(__FILE__) ),
				'preview_link' => 'https://radiustheme.com/demo/wordpress/themes/medilink/home-4/',
			),
			'demo5' => array(
				'title' => __( 'Home 5', 'medilink-core' ),
				'page'  => __( 'Home 5', 'medilink-core' ),
				'screenshot' => plugins_url( 'screenshots/screenshot5.jpg', dirname(__FILE__) ),
				'preview_link' => 'https://radiustheme.com/demo/wordpress/themes/medilink/home-5/',
			),
			'demo6' => array(
				'title' => __( 'Home 6', 'medilink-core' ),
				'page'  => __( 'Home 6', 'medilink-core' ),
				'screenshot' => plugins_url( 'screenshots/screenshot6.jpg', dirname(__FILE__) ),
				'preview_link' => 'https://radiustheme.com/demo/wordpress/themes/medilink/home-6/',
			),
			'demo7' => array(
				'title' => __( 'Home 7', 'medilink-core' ),
				'page'  => __( 'Home 7', 'medilink-core' ),
				'screenshot' => plugins_url( 'screenshots/screenshot7.jpg', dirname(__FILE__) ),
				'preview_link' => 'https://radiustheme.com/demo/wordpress/themes/medilink/home-7/',

			),
			'demo8' => array(
				'title' => __( 'Home 8', 'medilink-core' ),
				'page'  => __( 'Home 8', 'medilink-core' ),
				'screenshot' => plugins_url( 'screenshots/screenshot8.jpg', dirname(__FILE__) ),
				'preview_link' => 'https://radiustheme.com/demo/wordpress/themes/medilink/home-8/',
			),
			'demo9' => array(
				'title' => __( 'Home 9', 'medilink-core' ),
				'page'  => __( 'Home 9', 'medilink-core' ),
				'screenshot' => plugins_url( 'screenshots/screenshot9.jpg', dirname(__FILE__) ),
				'preview_link' => 'https://radiustheme.com/demo/wordpress/themes/medilink/home-9/',
			),
			'demo10' => array(
				'title' => __( 'Home 10', 'medilink-core' ),
				'page'  => __( 'Home 10', 'medilink-core' ),
				'screenshot' => plugins_url( 'screenshots/screenshot10.jpg', dirname(__FILE__) ),
				'preview_link' => 'https://radiustheme.com/demo/wordpress/themes/medilink/home-10/',
			),

			// one page	
			'demo11' => array(
				'title' => __( 'Home 1 ( One Page)', 'medilink-core' ),
				'page'  => __( 'Home 1 ( One Page) ', 'medilink-core' ),
				'screenshot' => plugins_url( 'screenshots/screenshot1.jpg', dirname(__FILE__) ),
				'preview_link' => 'https://radiustheme.com/demo/wordpress/themes/medilink/home-1-onepage',
			),
			'demo12' => array(
				'title' => __( 'Home  2  ( One Page)', 'medilink-core' ),
				'page'  => __( 'Home  2  ( One Page)', 'medilink-core' ),
				'screenshot' => plugins_url( 'screenshots/screenshot2.jpg', dirname(__FILE__) ),
				'preview_link' => 'https://radiustheme.com/demo/wordpress/themes/medilink/home-2-onepage/',
			),
			'demo13' => array(
				'title' => __( 'Home 3  ( One Page)', 'medilink-core' ),
				'page'  => __( 'Home 3  ( One Page)', 'medilink-core' ),
				'screenshot' => plugins_url( 'screenshots/screenshot3.jpg', dirname(__FILE__) ),
				'preview_link' => 'https://radiustheme.com/demo/wordpress/themes/medilink/home-3-onepage/',
			),
			'demo14' => array(
				'title' => __( 'Home 4  ( One Page)', 'medilink-core' ),
				'page'  => __( 'Home 4  ( One Page)', 'medilink-core' ),
				'screenshot' => plugins_url( 'screenshots/screenshot4.jpg', dirname(__FILE__) ),
				'preview_link' => 'https://radiustheme.com/demo/wordpress/themes/medilink/home-4-onepage/',
			),
			'demo15' => array(
				'title' => __( 'Home  5  ( One Page)', 'medilink-core' ),
				'page'  => __( 'Home  5  ( One Page)', 'medilink-core' ),
				'screenshot' => plugins_url( 'screenshots/screenshot5.jpg', dirname(__FILE__) ),
				'preview_link' => 'https://radiustheme.com/demo/wordpress/themes/medilink/home-5-onepage/',
			),
			'demo16' => array(
				'title' => __( 'Home 6  ( One Page)', 'medilink-core' ),
				'page'  => __( 'Home 6  ( One Page)', 'medilink-core' ),
				'screenshot' => plugins_url( 'screenshots/screenshot6.jpg', dirname(__FILE__) ),
				'preview_link' => 'https://radiustheme.com/demo/wordpress/themes/medilink/home-6-onepage/',
			),
			'demo17' => array(
				'title' => __( 'Home  7  ( One Page)', 'medilink-core' ),
				'page'  => __( 'Home  7  ( One Page)', 'medilink-core' ),
				'screenshot' => plugins_url( 'screenshots/screenshot7.jpg', dirname(__FILE__) ),
				'preview_link' => 'https://radiustheme.com/demo/wordpress/themes/medilink/home-7-onepage/',
			),
			'demo18' => array(
				'title' => __( 'Home 8  ( One Page)', 'medilink-core' ),
				'page'  => __( 'Home 8  ( One Page)', 'medilink-core' ),
				'screenshot' => plugins_url( 'screenshots/screenshot8.jpg', dirname(__FILE__) ),
				'preview_link' => 'https://radiustheme.com/demo/wordpress/themes/medilink/home-8-onepage/',
			),
			'demo19' => array(
				'title' => __( 'Home 9  ( One Page)', 'medilink-core' ),
				'page'  => __( 'Home 9  ( One Page)', 'medilink-core' ),
				'screenshot' => plugins_url( 'screenshots/screenshot9.jpg', dirname(__FILE__) ),
				'preview_link' => 'https://radiustheme.com/demo/wordpress/themes/medilink/home-9-onepage/',
			),
			'demo20' => array(
				'title' => __( 'Home 10  ( One Page)', 'medilink-core' ),
				'page'  => __( 'Home 10  ( One Page)', 'medilink-core' ),
				'screenshot' => plugins_url( 'screenshots/screenshot10.jpg', dirname(__FILE__) ),
				'preview_link' => 'https://radiustheme.com/demo/wordpress/themes/medilink/home-10-onepage/',
			),

		);

		$config = array();
		$import_path  = trailingslashit( get_template_directory() ) . 'sample-data/';
		$redux_option = 'medilink';

		foreach ( $demos_array as $key => $demo ) {
			$config[] = array(
				'import_file_id'               => $key,
				'import_page_name'             => $demo['page'],
				'import_file_name'             => $demo['title'],
				'local_import_file'            => $import_path . 'contents.xml',
				'local_import_widget_file'     => $import_path . 'widgets.wie',
				'local_import_customizer_file' => $import_path . 'customizer.dat',
				'local_import_redux'           => array(
					array(
						'file_path'   => $import_path . 'options.json',
						'option_name' => $redux_option,
					),
				),
				'import_preview_image_url'   => $demo['screenshot'],
				'preview_url'                => $demo['preview_link'],
			);
		}
		return $config;
	}


	public function before_widgets_import( $selected_import ) {
		{
		    // Remove 'Hello World!' post
		    wp_delete_post(1, true);
		    // Remove 'Sample page' page
		    wp_delete_post(2, true);		    

		    $sidebars_widgets = get_option('sidebars_widgets');
		    $sidebars_widgets['sidebar'] = array();
		    update_option('sidebars_widgets', $sidebars_widgets);
		}
	}



	public function after_import( $selected_import ) {
		$this->assign_menu( $selected_import['import_file_id'] );
		$this->assign_frontpage( $selected_import );
		$this->update_contact_form_sender_email();
		$this->update_permalinks();
		
		update_option( 'medilink_ocdi_importer_rewrite_flash', true );
	}


	private function assign_menu( $demo ) {
		$primary  = get_term_by( 'name', 'Main Menu', 'nav_menu' );

		set_theme_mod( 'nav_menu_locations', array(
			'primary'  => $primary->term_id,
		));
	}



	private function assign_frontpage( $selected_import ) {
		$blog_page  = get_page_by_title( 'Blog' );
		$front_page = get_page_by_title( $selected_import['import_page_name'] );

		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front',  $front_page->ID );
		update_option( 'page_for_posts', $blog_page->ID );
	}



	private function update_contact_form_sender_email() {
		$form1 = get_page_by_title( 'Contact', OBJECT, 'wpcf7_contact_form' );

		$forms = array( $form1 );
		foreach ( $forms as $form ) {
			if ( !$form ) {
				continue;
			}
			$cf7id = $form->ID;
			$mail  = get_post_meta( $cf7id, '_mail', true );
			if ( class_exists( 'WPCF7_ContactFormTemplate' ) ) {
				$pattern = "/<[^@\s]*@[^@\s]*\.[^@\s]*>/"; // <email@email.com>
				$replacement = '<'. WPCF7_ContactFormTemplate::from_email().'>';
				$mail['sender'] = preg_replace($pattern, $replacement, $mail['sender']);
			}
			update_post_meta( $cf7id, '_mail', $mail );		
		}
	}


	private function update_permalinks() {
		update_option( 'permalink_structure', '/%postname%/' );
	}


	public function rewrite_flush_check() {
		if ( get_option( 'medilink_ocdi_importer_rewrite_flash' ) == true  ) {
			flush_rewrite_rules();
			delete_option( 'medilink_ocdi_importer_rewrite_flash' );
		}
	}
}

new Demo_Importer_OCDI;