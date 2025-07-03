<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */


namespace radiustheme\Medilink_Core;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit;

class Video_With_Title extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'Video With Title', 'medilink-core' );
		$this->rt_base = 'rt-video-with-title';
		parent::__construct( $data, $args );
	}

	private function rt_load_scripts(){
		wp_enqueue_script( 'jquery-magnific-popup' );	
		wp_enqueue_style( 'magnific-popup' );	
	}

	public function rt_fields(){

		$fields = array(
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_general',
				'label'   => esc_html__( 'General', 'medilink-core' ),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'layout',
				'label'   => esc_html__( 'Layout', 'medilink-core' ),
				'options' => array(
					'layout1' => esc_html__( 'Layout 1', 'medilink-core' ),
					'layout2' => esc_html__( 'Layout 2', 'medilink-core' ),					
					'layout3' => esc_html__( 'Layout 3', 'medilink-core' ),					
					'layout4' => esc_html__( 'Layout 4', 'medilink-core' ),					
					'layout5' => esc_html__( 'Layout 5', 'medilink-core' ),					
				),
				'default' => 'layout1',
			),
			array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'title',
				'label'   => esc_html__( 'Title', 'medilink-core' ),
				'default' => 'Lorem Ipsum Dummy Text',
				'condition'   => array( 'layout' => array( 'layout2','layout3' ,'layout4') ),
			),
			array(
				'type'    => Controls_Manager::MEDIA,
				'id'    => 'image',
				'label'   => esc_html__( 'Image', 'medilink-core' ),
				'description' => esc_html__( 'Image size should be 1920x820 px', 'medilink-core' ),
			),
			array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'videourl',
				'label'   => esc_html__( 'Video URL', 'medilink-core' ),
				'default' => 'http://www.youtube.com/watch?v=1iIZeIy7TqM',
			),						
		);

		return $fields;
	}

	protected function render() {

		$data = $this->get_settings();

		$this->rt_load_scripts();

		switch ( $data['layout'] ) {
			case 'layout2':
				$template = 'video-with-title-2';
			break;
			case 'layout3':
				$template = 'video-with-title-3';
			break;	
			case 'layout4':
				$template = 'video-with-title-4';
			break;
			case 'layout5':
				$template = 'video-with-title-5';
			break;		
			default:
				$template = 'video-with-title-1';
			break;
			}

		return $this->rt_template( $template, $data );
	}
}