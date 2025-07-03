<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */


namespace radiustheme\Medilink_Core;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit;

class Price_Plan extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'Price & Plan', 'medilink-core' );
		$this->rt_base = 'rt-price-plan';
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
				'type'    => Controls_Manager::TEXT,
				'id'      => 'title',
				'label'   => esc_html__( 'Title', 'medilink-core' ),
				'default' => 'Personal Plan',
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'price',
				'label'   => esc_html__( 'Price', 'medilink-core' ),
				'default' => 49,
				'description' => esc_html__( 'Maximum number of words', 'medilink-core' ),				
			),
            array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'period',
				'label'   => esc_html__( 'Period', 'medilink-core' ),
                'condition'   => array( 'layout' => array( 'layout3')),
				'default' => 'mo',
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'currency',
				'label'   => esc_html__( 'Currency', 'medilink-core' ),
				'default' => '$',
				'description' => esc_html__( 'Select Currency', 'medilink-core' ),				
			),
			array(
				'type'    => Controls_Manager::REPEATER,
				'id'      => 'options3',
				'label'   => esc_html__( 'Add as many slides as you want', 'medilink-core' ),			                 
				'fields'  => array(					
					array(
						'type'    => Controls_Manager::TEXT,
						'name'    => 'option_title',
						'label'   => esc_html__( 'Options', 'medilink-core' ),
						'default' => 'Dorem ipsum dolor',
					),
			        array(
			            'type'    => Controls_Manager::ICON,
			            'name'      => 'icon',
			            'label'   => esc_html__( 'Icon', 'medilink-core' ),
			            'default' => 'fa fa-check',                                           
			        ),
				),				
			),
			array(
				'type'    => Controls_Manager::REPEATER,
				'id'      => 'options',
				'label'   => esc_html__( 'Add as many slides as you want', 'medilink-core' ),			              
				'fields'  => array(					
					array(
						'type'    => Controls_Manager::TEXT,
						'name'    => 'option_title',
						'label'   => esc_html__( 'Options', 'medilink-core' ),
						'default' => 'Dorem ipsum dolor',
					),                                        
				),				
			),                    
			array(
				'type'    => Controls_Manager::TEXT,
				'id'    => 'buttontext',
				'label'   => esc_html__( 'Button Text', 'medilink-core' ),
				'default' => 'Buy Now',
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'    => 'buttonurl',
				'label'   => esc_html__( 'Button URL', 'medilink-core' ),
			),
			array(
				'mode' => 'section_end',
			),
		);

		return $fields;
	}

	protected function render() {

		$data = $this->get_settings();	
     	$template = 'price-plan';                        

		return $this->rt_template( $template, $data );

	}

}