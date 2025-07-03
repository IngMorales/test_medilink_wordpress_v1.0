<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */


namespace radiustheme\Medilink_Core;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Typography;
use Elementor\Utils;
use radiustheme\Roofit\Helper;


if ( ! defined( 'ABSPATH' ) ) exit;

class Thumbnails_Slider extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'Thumbnails Slider', 'medilink-core' );
		$this->rt_base = 'rt-thumbnails-slider';
		parent::__construct( $data, $args );
	}


	public function rt_fields(){

		$fields = array(
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_general',
				'label'   => esc_html__( 'General', 'medilink-core' ),
			),	
			array(
				'type'    => Controls_Manager::REPEATER,
				'id'      => 'img_list',
				'label'   => esc_html__( 'Add as many Image as you want', 'medilink-core' ),
				'fields'  => array(
					array(
						'type'    => Controls_Manager::TEXT,
						'name'      => 'title',
						'label'   => esc_html__( 'Title', 'medilink-core' ),
						'default' => 'Lorem Ipsum',
					),
					array(
						'type'  => Controls_Manager::MEDIA,
						'name'  => 'image',
						'label' => esc_html__( 'Image', 'medilink-core' ),
					),
					array(
						'type'  => Controls_Manager::TEXT,
						'name'  => 'url',
						'label' => esc_html__( 'URL(optional)', 'medilink-core' ),
					),
				),
			),
			array(
				'mode' => 'section_end',
			),
		);

		return $fields;
	}


	private function rt_load_scripts(){
		wp_enqueue_style(  'owl-carousel' );
		wp_enqueue_style(  'owl-theme-default' );
		wp_enqueue_script( 'owl-carousel' );
	}


	protected function render() {

		$data = $this->get_settings();		
		$this->rt_load_scripts();			
		$template = 'thumbnails-slider-1';	

		return $this->rt_template( $template, $data );
	}
}