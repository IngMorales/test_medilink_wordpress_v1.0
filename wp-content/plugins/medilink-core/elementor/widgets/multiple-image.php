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

class Multiple_Image extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'Multiple Image', 'medilink-core' );
		$this->rt_base = 'rt-multiple-image';
		parent::__construct( $data, $args );
	}

	public function rt_fields(){

		$fields = array(
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_layout',
				'label'   => esc_html__( 'Layout', 'medilink-core' ),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'layout',
				'label'   => esc_html__( 'Layout', 'medilink-core' ),
				'options' => array(
					'layout1' => esc_html__( 'Layout 1', 'medilink-core' ),
					'layout2' => esc_html__( 'Layout 2', 'medilink-core' ),
				),
				'default' => 'layout1',
			),						
			array(
			   'mode' => 'section_end',
			 ),
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_general',
				'label'   => esc_html__( 'Years / Title', 'medilink-core' ),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'icontype',
				'label'   => esc_html__( 'Icon Type', 'medilink-core' ),
					'options' => array(
						'icon'  => esc_html__( 'Icon', 'medilink-core' ),
						'image' => esc_html__( 'Custom Image', 'medilink-core' ),
					),
				'default' => 'image',				
				),
			array(
				'type'    => Controls_Manager::ICON,
				'id'      => 'icon',
				'label'   => esc_html__( 'Icon', 'medilink-core' ),
				'default' => 'fa fa-university',
				'condition'   => array( 'icontype' => array( 'icon' ) ),
			),
			array(
				'type'    => Controls_Manager::MEDIA,
				'id'      => 'icon_image',
				'label'   => esc_html__( 'Signechar image', 'roofit-core' ),
				'condition'   => array( 'icontype' => array( 'image' ) ),
				'default' => [
			        'url' => Utils::get_placeholder_image_src(),
			    ],			
				'description' => esc_html__( 'Recommended full image', 'roofit-core' ),
			),
			array(
				'type'    	=> Group_Control_Image_Size::get_type(),
				'mode'    	=> 'group',
				'label'   	=> esc_html__( 'Icon image size', 'roofit-core' ),	
				'name' 		=> 'icon_image_size', 
				'default' 	=> 'full',												
			),		
			array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'mi_years',
				'label'   => esc_html__( 'Title Befour', 'medilink-core' ),
				'default' => '15',
			),
			array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'mi_title',
				'label'   => esc_html__( 'Title', 'medilink-core' ),
				'default' => 'Years Of Experienced  in Medical Services',
			),	
            array(
			   'mode' => 'section_end',
			 ),
			 array(
				'mode'    => 'section_start',
				'id'      => 'sec_image_content',
				'label'   => esc_html__( 'Images', 'medilink-core' ),
			),
			array(
				'type'    => Controls_Manager::MEDIA,
				'id'      => 'miimg1',
				'label'   => esc_html__( 'Image One', 'roofit-core' ),
				'default' => [
			        'url' => Utils::get_placeholder_image_src(),
			    ],			
			    'condition' 	=> array( 'layout' => 'layout1' ),
				'description' => esc_html__( 'Recommended full image', 'roofit-core' ),
			),			
			array(
				'type'    	=> Group_Control_Image_Size::get_type(),
				'mode'    	=> 'group',
				'label'   	=> esc_html__( 'Image One size', 'roofit-core' ),	
				'name' 		=> 'miimg1_size', 
				'default' 	=> 'full',		
				'condition' 	=> array( 'layout' => 'layout1' ),										
			),			
			array(
				'type'    => Controls_Manager::MEDIA,
				'id'      => 'miimg2',
				'label'   => esc_html__( 'Image Two', 'roofit-core' ),
				'default' => [
			        'url' => Utils::get_placeholder_image_src(),
			    ],	
			    'separator' => 'before',
			    'condition' 	=> array( 'layout' => 'layout1' ),		
				'description' => esc_html__( 'Recommended full image', 'roofit-core' ),
			),			
			array(
				'type'    	=> Group_Control_Image_Size::get_type(),
				'mode'    	=> 'group',
				'label'   	=> esc_html__( 'Image Two size', 'roofit-core' ),	
				'name' 		=> 'miimg2_size', 
				'default' 	=> 'full',		
				'condition' 	=> array( 'layout' => 'layout1' ),										
			),		
			array(
				'type'    => Controls_Manager::MEDIA,
				'id'      => 'miimg3',
				'label'   => esc_html__( 'Image Three', 'roofit-core' ),
				'default' => [
			        'url' => Utils::get_placeholder_image_src(),
			    ],		
				'description' => esc_html__( 'Recommended full image', 'roofit-core' ),
			),			
			array(
				'type'    	=> Group_Control_Image_Size::get_type(),
				'mode'    	=> 'group',
				'label'   	=> esc_html__( 'Image Three size', 'roofit-core' ),	
				'name' 		=> 'miimg3_size', 
				'default' 	=> 'full',												
			),			
			 array(
			   'mode' => 'section_end',
			 ),

			// Before Title style
	        array(
	            'mode'    => 'section_start',
	            'id'      => 'sec_bft_style',
	            'label'   => esc_html__( 'Before Title', 'roofit-core' ),
	            'tab'     => Controls_Manager::TAB_STYLE,
	        ),	       
	        array(
	            'type'    => Controls_Manager::COLOR,
	            'id'      => 'bft_color',
	            'label'   => __( 'Color', 'roofit-core' ),
	            'default' => '',                       
	            'selectors' => array(
	                    '{{WRAPPER}} .item-title-befour' => 'color: {{VALUE}}',                           
	                ),
	        ),  
	        array( 
	            'mode'      => 'group',
	            'type'      => Group_Control_Typography::get_type(),
	            'name'      => 'bft_font_size',                
	            'label'     => esc_html__( 'Icon Typography', 'roofit-core' ),
	            'selector'  => '{{WRAPPER}} .item-title-befour',
	        ),
	        array(
	            'type'    => Controls_Manager::DIMENSIONS,
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'content_padding',
	             'mode'          => 'responsive',
	            'label'   => __( 'Padding', 'roofit-core' ),
	            'selectors' => array(
	                '{{WRAPPER}} .item-title-befour' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',                   
	            ),
	            'separator' => 'before',
	        ),  
	        array(
	            'type'    => Controls_Manager::DIMENSIONS,
	            'size_units' => [ 'px', '%', 'em' ],
	             'mode'          => 'responsive',
	            'id'      => 'content_margin',
	            'label'   => __( 'Margin', 'roofit-core' ),                 
	            'selectors' => array(
	                '{{WRAPPER}} .item-title-befour' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',                    
	            ),
	            'separator' => 'before',
	        ),  
		    array(
		        'mode' => 'section_end',
		    ), 	
		);

		return $fields;
	}


	private function rt_load_scripts(){
		wp_enqueue_script( 'paroller-min' );
	}


	protected function render() {

		$data 			= $this->get_settings();
		$this->rt_load_scripts();
		$template 		= 'multiple-image-' . str_replace("layout", "", $data['layout']);	
		return $this->rt_template( $template, $data );
	}
}