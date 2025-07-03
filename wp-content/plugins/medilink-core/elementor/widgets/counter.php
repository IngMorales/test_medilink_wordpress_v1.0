<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */


namespace radiustheme\Medilink_Core;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;


if ( ! defined( 'ABSPATH' ) ) exit;

class Counter extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = __( 'Counter', 'medilink-core' );
		$this->rt_base = 'rt-counter';
		parent::__construct( $data, $args );
	}

	private function rt_load_scripts(){
		wp_enqueue_script( 'waypoints' );
		wp_enqueue_script( 'jquery-counterup' );
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
				),
				'default' => 'layout1',
			),			
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'icontype',
				'label'   => esc_html__( 'Icon Type', 'medilink-core' ),
				'options' => array(
					'icon'  => esc_html__( 'Icon', 'medilink-core' ),
					'image' => esc_html__( 'Custom Image', 'medilink-core' ),
				),
				'default' => 'icon',	
			),
			array(
				'type'    => Controls_Manager::ICON,
				'id'      => 'icon',
				'label'   => esc_html__( 'Icon', 'medilink-core' ),
				'default' => 'fa fa-handshake-o',				
				'condition'   => array( 'icontype' => array( 'icon' )),
			),
			array(
				'type'    => Controls_Manager::MEDIA,
				'id'      => 'image',
				'label'   => esc_html__( 'Image', 'medilink-core' ),
				'condition'   => array( 'icontype' => array( 'image' ) ),
				'description' => esc_html__( 'Recommended image Background', 'medilink-core' ),
				'condition'   => array( 'icontype' => array( 'image' )),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'number',
				'label'   => esc_html__( 'Counter Number', 'medilink-core' ),
				'default' => 5000,
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'suffix',
				'label'   => esc_html__( 'Counter Suffix', 'medilink-core' ),
				'description' => esc_html__( 'Put any text or symbol after Counter Number eg. +', 'medilink-core' ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'title',
				'label'   => esc_html__( 'Title', 'medilink-core' ),
				'default' => esc_html__( 'Satisfied Customers', 'medilink-core' ),
			),
			array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'content',
				'label'   => esc_html__( 'Content', 'medilink-core' ),
				'default' => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing  in posuer risus.', 'medilink-core' ),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'speed',
				'label'   => esc_html__( 'Animation Speed', 'medilink-core' ),
				'default' => 5000,
				'description' => esc_html__( 'The total duration of the count animation in milisecond eg. 5000', 'medilink-core' ),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'steps',
				'label'   => esc_html__( 'Animation Steps', 'medilink-core' ),
				'default' => 10,
				'description' => esc_html__( 'Counter steps eg. 10', 'medilink-core' ),
			),
			array(
				'mode' => 'section_end',
			),
			array(
	            'mode'    => 'section_start',
	            'id'      => 'sec_counter_box_style',
	            'label'   => esc_html__( 'Counter Box', 'medilink-core' ),
	            'tab'     => Controls_Manager::TAB_STYLE,
	            'condition'   => array( 'layout' => array( 'layout3') ),
	        ),
	        array(
	            'type'    => Controls_Manager::COLOR,
	            'id'      => 'counter_boxbg_color',
	            'label'   => __( 'Background Color', 'medilink-core' ),
	            'default' => '',                       
	            'selectors' => array(
	                    '{{WRAPPER}} .progress-box-layout3' => 'background-color: {{VALUE}}',                           
	                ),
	        ),
		    array(
		        'mode' => 'section_end',
		    ),
		    array(
	            'mode'    => 'section_start',
	            'id'      => 'sec_iconbox_style',
	            'label'   => esc_html__( 'Icon Box', 'medilink-core' ),
	            'tab'     => Controls_Manager::TAB_STYLE,
	            'condition'   => array( 'layout' => array( 'layout3') ),
	        ),
	        array(
	            'type'    => Controls_Manager::COLOR,
	            'id'      => 'iconboxbg_color',
	            'label'   => __( 'Background Color', 'medilink-core' ),
	            'default' => '',                       
	            'selectors' => array(
	                    '{{WRAPPER}} .item-icon i' => 'background-color: {{VALUE}}',                           
	                ),
	        ),
	        array(
	            'type'    => Controls_Manager::COLOR,
	            'id'      => 'counter_icon_color',
	            'label'   => __( 'Icon Color', 'medilink-core' ),
	            'default' => '',                       
	            'selectors' => array(
	                    '{{WRAPPER}} .item-icon i' => 'color: {{VALUE}}',                           
	                ),
	        ),
	        array( 
	            'mode'      => 'group',
	            'type'      => Group_Control_Typography::get_type(),
	            'name'      => 'counter_icon_typo',                
	            'label'     => esc_html__( 'Icon Typography', 'medilink-core' ),
	            'selector'  => '{{WRAPPER}} .item-icon i',
	        ),  
		    array(
		        'mode' => 'section_end',
		    ),
		    array(
	            'mode'    => 'section_start',
	            'id'      => 'sec_number_style',
	            'label'   => esc_html__( 'Number', 'medilink-core' ),
	            'tab'     => Controls_Manager::TAB_STYLE,
	            'condition'   => array( 'layout' => array( 'layout3') ),
	        ),
	        array(
	            'type'    => Controls_Manager::COLOR,
	            'id'      => 'number_color',
	            'label'   => __( 'Color', 'medilink-core' ),
	            'default' => '',                       
	            'selectors' => array(
	                    '{{WRAPPER}} .item-content__text span' => 'color: {{VALUE}}',                           
	                ),
	        ),
	        array( 
	            'mode'      => 'group',
	            'type'      => Group_Control_Typography::get_type(),
	            'name'      => 'number_typo',                
	            'label'     => esc_html__( 'Typography', 'medilink-core' ),
	            'selector'  => '{{WRAPPER}} .item-content__text span',
	        ),  
		    array(
		        'mode' => 'section_end',
		    ),
		    array(
	            'mode'    => 'section_start',
	            'id'      => 'sec_content_style',
	            'label'   => esc_html__( 'Content', 'medilink-core' ),
	            'tab'     => Controls_Manager::TAB_STYLE,
	            'condition'   => array( 'layout' => array( 'layout3') ),
	        ),
	        array(
	            'type'    => Controls_Manager::COLOR,
	            'id'      => 'content_color',
	            'label'   => __( 'Color', 'medilink-core' ),
	            'default' => '',                       
	            'selectors' => array(
	                    '{{WRAPPER}} .item-content p' => 'color: {{VALUE}}',                           
	                ),
	        ),
	        array( 
	            'mode'      => 'group',
	            'type'      => Group_Control_Typography::get_type(),
	            'name'      => 'content_typo',                
	            'label'     => esc_html__( 'Typography', 'medilink-core' ),
	            'selector'  => '{{WRAPPER}} .item-content p',
	        ),  
		    array(
		        'mode' => 'section_end',
		    ),
		);
		return $fields;
	}

	protected function render() {
		$data = $this->get_settings();

		$this->rt_load_scripts();

		switch ( $data['layout'] ) {
		case 'layout2':
			$template = 'counter-2';
		break;
		case 'layout3':
			$template = 'counter-3';
		break;
		case 'layout4':
			$template = 'counter-4';
		break;		
		default:
			$template = 'counter-1';
		break;
		}
		return $this->rt_template( $template, $data );
	}

}