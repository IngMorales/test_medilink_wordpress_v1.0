<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */


namespace radiustheme\Medilink_Core;


use \FW_Ext_Backups_Demo;
use \WPCF7_ContactFormTemplate;


if ( ! defined( 'ABSPATH' ) ) exit;

class Demo_Importer {
	public function __construct() {
		add_filter( 'plugin_action_links_rt-demo-importer/rt-demo-importer.php', array( $this, 'add_action_links' ) ); // Link from plugins page 
		add_filter( 'rt_demo_installer_warning', array( $this, 'data_loss_warning' ) );
		add_filter( 'fw:ext:backups-demo:demos', array( $this, 'demo_config' ) );
		add_action( 'fw:ext:backups:tasks:success:id:demo-content-install', array( $this, 'after_demo_install' ) );
		//add_filter( 'fw:ext:backups:add-restore-task:image-sizes-restore', '__return_false' ); // Enable it to skip image restore step
	}


	public function add_action_links( $links ) {
		$mylinks = array(
			'<a href="' . esc_url( admin_url( 'tools.php?page=fw-backups-demo-content' ) ) . '">'.__( 'Install Demo Contents', 'medilink-core' ).'</a>',
		);
		return array_merge( $links, $mylinks );
	}


	public function data_loss_warning( $links ) {
		$html  = '<div style="margin-top:20px;color:#f00;font-size:20px;line-height:1.3;font-weight:600;margin-bottom:40px;border-color: #f00;border-style: dashed;border-width: 1px 0;padding:10px 0;">';
		$html .= esc_html__( 'Warning: All your old data will be lost if you install One Click demo data from here, so it is suitable only for a new website.', 'medilink-core');
		$html .= '</div>';
		return $html;
	}


	public function demo_config( $demos ) {
		$demos_array = array(
			'demo1' => array(
				'title' => esc_html__( 'Home 1', 'medilink-core' ),
				'screenshot' => plugins_url( 'screenshots/screenshot1.jpg', __FILE__ ),
				'preview_link' => 'https://radiustheme.com/demo/wordpress/themes/medilink/',
			),
			'demo2' => array(
				'title' => esc_html__( 'Home 2', 'medilink-core' ),
				'screenshot' => plugins_url( 'screenshots/screenshot2.jpg', __FILE__ ),
				'preview_link' => 'https://radiustheme.com/demo/wordpress/themes/medilink/home-2/',
			),	
			'demo3' => array(
				'title' => esc_html__( 'Home 3', 'medilink-core' ),
				'screenshot' => plugins_url( 'screenshots/screenshot3.jpg', __FILE__ ),
				'preview_link' => 'https://radiustheme.com/demo/wordpress/themes/medilink/home-3/',
			),	
			'demo4' => array(
				'title' => esc_html__( 'Home 4', 'medilink-core' ),
				'screenshot' => plugins_url( 'screenshots/screenshot4.jpg', __FILE__ ),
				'preview_link' => 'https://radiustheme.com/demo/wordpress/themes/medilink/home-4/',
			),	
			'demo5' => array(
				'title' => esc_html__( 'Home 5', 'medilink-core' ),
				'screenshot' => plugins_url( 'screenshots/screenshot5.jpg', __FILE__ ),
				'preview_link' => 'https://radiustheme.com/demo/wordpress/themes/medilink/home-5/',
			),
			'demo6' => array(
				'title' => esc_html__( 'Home 6', 'medilink-core' ),
				'screenshot' => plugins_url( 'screenshots/screenshot6.jpg', __FILE__ ),
				'preview_link' => 'https://radiustheme.com/demo/wordpress/themes/medilink/home-6/',
			),	
			'demo7' => array(
				'title' => esc_html__( 'Home 7', 'medilink-core' ),
				'screenshot' => plugins_url( 'screenshots/screenshot7.jpg', __FILE__ ),
				'preview_link' => 'https://radiustheme.com/demo/wordpress/themes/medilink/home-7/',
			),
			'demo8' => array(
				'title' => esc_html__( 'Home 8', 'medilink-core' ),
				'screenshot' => plugins_url( 'screenshots/screenshot8.jpg', __FILE__ ),
				'preview_link' => 'https://radiustheme.com/demo/wordpress/themes/medilink/home-8/',
			),
			'demo9' => array(
				'title' => esc_html__( 'Home 9', 'medilink-core' ),
				'screenshot' => plugins_url( 'screenshots/screenshot9.jpg', __FILE__ ),
				'preview_link' => 'https://radiustheme.com/demo/wordpress/themes/medilink/home-9/',
			),
			'demo10' => array(
				'title' => esc_html__( 'Home 10', 'medilink-core' ),
				'screenshot' => plugins_url( 'screenshots/screenshot10.jpg', __FILE__ ),
				'preview_link' => 'https://radiustheme.com/demo/wordpress/themes/medilink/home-10/',
			),
			'demo11' => array(
				'title' => esc_html__( 'Home 1 ( One Page)', 'medilink-core' ),
				'screenshot' => plugins_url( 'screenshots/screenshot1.jpg', __FILE__ ),
				'preview_link' => 'https://radiustheme.com/demo/wordpress/themes/medilink/home-1-onepage/',
			),
			'demo12' => array(
				'title' => esc_html__( 'Home 2 ( One Page)', 'medilink-core' ),
				'screenshot' => plugins_url( 'screenshots/screenshot2.jpg', __FILE__ ),
				'preview_link' => 'https://radiustheme.com/demo/wordpress/themes/medilink/home-2-onepage/',
			),	
			'demo13' => array(
				'title' => esc_html__( 'Home 3 ( One Page)', 'medilink-core' ),
				'screenshot' => plugins_url( 'screenshots/screenshot3.jpg', __FILE__ ),
				'preview_link' => 'https://radiustheme.com/demo/wordpress/themes/medilink/home-3-onepage/',
			),	
			'demo14' => array(
				'title' => esc_html__( 'Home 4 ( One Page)', 'medilink-core' ),
				'screenshot' => plugins_url( 'screenshots/screenshot4.jpg', __FILE__ ),
				'preview_link' => 'https://radiustheme.com/demo/wordpress/themes/medilink/home-4-onepage/',
			),	
			'demo15' => array(
				'title' => esc_html__( 'Home 5 ( One Page)', 'medilink-core' ),
				'screenshot' => plugins_url( 'screenshots/screenshot5.jpg', __FILE__ ),
				'preview_link' => 'https://radiustheme.com/demo/wordpress/themes/medilink/home-5-onepage/',
			),
			'demo16' => array(
				'title' => esc_html__( 'Home 6 ( One Page)', 'medilink-core' ),
				'screenshot' => plugins_url( 'screenshots/screenshot6.jpg', __FILE__ ),
				'preview_link' => 'https://radiustheme.com/demo/wordpress/themes/medilink/home-6-onepage/',
			),	
			'demo17' => array(
				'title' => esc_html__( 'Home 7 ( One Page)', 'medilink-core' ),
				'screenshot' => plugins_url( 'screenshots/screenshot7.jpg', __FILE__ ),
				'preview_link' => 'https://radiustheme.com/demo/wordpress/themes/medilink/home-7-onepage/',
			),
			'demo18' => array(
				'title' => esc_html__( 'Home 8 ( One Page)', 'medilink-core' ),
				'screenshot' => plugins_url( 'screenshots/screenshot8.jpg', __FILE__ ),
				'preview_link' => 'https://radiustheme.com/demo/wordpress/themes/medilink/home-8-onepage/',
			),
			'demo19' => array(
				'title' => esc_html__( 'Home 9 ( One Page)', 'medilink-core' ),
				'screenshot' => plugins_url( 'screenshots/screenshot9.jpg', __FILE__ ),
				'preview_link' => 'https://radiustheme.com/demo/wordpress/themes/medilink/home-9-onepage/',
			),
			'demo20' => array(
				'title' => esc_html__( 'Home 10 ( One Page)', 'medilink-core' ),
				'screenshot' => plugins_url( 'screenshots/screenshot10.jpg', __FILE__ ),
				'preview_link' => 'https://radiustheme.com/demo/wordpress/themes/medilink/home-10-onepage/',
			),			
		);
		$download_url = 'http://demo.radiustheme.com/wordpress/demo-content/medilink/';
		foreach ($demos_array as $id => $data) {
			$demo = new FW_Ext_Backups_Demo($id, 'piecemeal', array(
				'url' => $download_url,
				'file_id' => $id,
			));
			$demo->set_title($data['title']);
			$demo->set_screenshot($data['screenshot']);
			$demo->set_preview_link($data['preview_link']);

			$demos[ $demo->get_id() ] = $demo;

			unset($demo);
		}

		return $demos;
	}


	public function after_demo_install( $collection ){
		// Update front page id
		$demos = array(
			'demo1'  => 6,
			'demo2'  => 444,			
			'demo3'  => 2252,			
			'demo4'  => 2334,
			'demo5'  => 2377,			
			'demo6'  => 2410,	
			'demo7'  => 2823,			
			'demo8'  => 2829,
			'demo9'  => 3270,
			'demo10' => 4281,
			'demo11' => 2509,	
			'demo12' => 2552,	
			'demo13' => 2580,	
			'demo14' => 2600,	
			'demo15' => 2618,	
			'demo16' => 2524,	
			'demo17' => 2832,	
			'demo18' => 2834,	
			'demo19' => 4951,	
			'demo20' => 5027,	
		);

		$data = $collection->to_array();

		foreach( $data['tasks'] as $task ) {
			if( $task['id'] == 'demo:demo-download' ){
				$demo_id = $task['args']['demo_id'];
				$page_id = $demos[$demo_id];
				update_option( 'page_on_front', $page_id );
				flush_rewrite_rules();
				break;
			}

		}


		// Update contact form 7 email
		$cf7ids = array( 5 );
		foreach ( $cf7ids as $cf7id ) {
			$mail = get_post_meta( $cf7id, '_mail', true );
			$mail['recipient'] = get_option( 'admin_email' );

			if ( class_exists( 'WPCF7_ContactFormTemplate' ) ) {
				$pattern = "/<[^@\s]*@[^@\s]*\.[^@\s]*>/"; // <email@email.com>
				$replacement = '<'. WPCF7_ContactFormTemplate::from_email().'>';
				$mail['sender'] = preg_replace($pattern, $replacement, $mail['sender']);
			}			

			update_post_meta( $cf7id, '_mail', $mail );		
		}		
	}

}
new Demo_Importer;