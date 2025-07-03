<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Medilink_Core;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;

if ( ! defined( 'ABSPATH' ) ) exit;

class Info_Box extends Custom_Widget_Base {
	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'Info Box', 'medilink-core' );
		$this->rt_base = 'rt-info-box';
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
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'style',
				'label'   => esc_html__( 'Style', 'medilink-core' ),
				'options' => array(
					'style1' => esc_html__( 'Style 1', 'medilink-core' ),
					'style2' => esc_html__( 'Style 2', 'medilink-core' ),
					'style3' => esc_html__( 'Style 3', 'medilink-core' ),
					'style4' => esc_html__( 'Style 4', 'medilink-core' ),
					'style5' => esc_html__( 'Style 5', 'medilink-core' ),
					'style6' => esc_html__( 'Style 6', 'medilink-core' ),
					'style7' => esc_html__( 'Style 7', 'medilink-core' ),
					'style8' => esc_html__( 'Style 8', 'medilink-core' ),
					'style9' => esc_html__( 'Style 9', 'medilink-core' ),
					'style10' => esc_html__( 'Style 10', 'medilink-core' ),
					'style11' => esc_html__( 'Style 11', 'medilink-core' ),
					'style12' => esc_html__( 'Style 12', 'medilink-core' ),
					'style13' => esc_html__( 'Style 13', 'medilink-core' ),
					'style14' => esc_html__( 'Style 14', 'medilink-core' ),
				),
				'default' => 'style1',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'theme',
				'label'   => esc_html__( 'Theme', 'medilink-core' ),
				'options' => array(
					'light' => esc_html__( 'Primary', 'medilink-core' ),
					'dark'  => esc_html__( 'Dark Primary', 'medilink-core' ),					
				),
				'default' => 'light',
				'condition'   => array( 'style' => array( 'style1' ) ),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'bradius',
				'label'   => esc_html__( 'Radius', 'medilink-core' ),
				'options' => array(
					'no' => esc_html__( 'Radius None', 'medilink-core' ),
					'all' => esc_html__( 'Radius All', 'medilink-core' ),
					'left' => esc_html__( 'Radius Left', 'medilink-core' ),
					'right'  => esc_html__( 'Radius Right', 'medilink-core' ),					
				),
				'default' => 'no',
				'condition'   => array( 'style' => array( 'style1' ) ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'position_loop',
				'label'       => esc_html__( 'Position', 'medilink-core' ),
				'label_on'    => esc_html__( 'On', 'medilink-core' ),
				'label_off'   => esc_html__( 'Off', 'medilink-core' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Position Default: On', 'medilink-core' ),
				 'condition'   => array( 'style' => array( 'style1') ),
			),
			array(
				'type' => Controls_Manager::SLIDER,
				'mode' => 'responsive',
				'id'      => 'position_top',
				'label'   => __( 'Position Top', 'medilink-core' ),
				'condition'   => array( 'style' => array( 'style1') , 'position_loop' => array( 'yes') ),
				'size_units' => array( 'px' ),
				'range' => array(
					'px' => array(
						'min' => -400,
						'max' => 0,
					),
				),
				'default' => array(
					'unit' => 'px',
					'size' => 0,
				),
				'selectors' => array(
					'{{WRAPPER}} .service-wrap-layout1 .service-inner-layout1.position-loop .single-item' => 'top: {{SIZE}}{{UNIT}};',
				)
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
				'condition'   => array( 'style' => array( 'style1', 'style2', 'style6' , 'style7', 'style8', 'style10', 'style13', 'style14' ) ),
			),
			array(
				'type'    => Controls_Manager::ICON,
				'id'      => 'icon',
				'label'   => esc_html__( 'Icon', 'medilink-core' ),
				'default' => 'fa fa-university',
				'condition'   => array( 'style' => array( 'style1', 'style2','style6','style7','style8','style9','style10','style11','style12','style13','style14' ), 'icontype' => array( 'icon' ) ),
			),
			array(
				'type'    => Controls_Manager::MEDIA,
				'id'      => 'image',
				'label'   => esc_html__( 'Image', 'medilink-core' ),
				'condition'   => array( 'style' => array( 'style1', 'style2' , 'style6', 'style8', 'style10', 'style13', 'style14'), 'icontype' => array( 'image' ) ),
				'description' => esc_html__( 'Recommended image size is 67x67 px', 'medilink-core' ),
			),
			array(
				'type'    => Controls_Manager::MEDIA,
				'id'      => 'hover_image',
				'label'   => esc_html__( 'Hover Image', 'medilink-core' ),
				'condition'   => array( 'style' => array( 'style10'), 'icontype' => array( 'image' ) ),
				'description' => esc_html__( 'Hover image:: Recommended image size is 67x67 px', 'medilink-core' ),
			),
			array(
				'type'    => Controls_Manager::MEDIA,
				'id'      => 'image-alt',
				'label'   => esc_html__( 'Image', 'medilink-core' ),
				'condition'   => array( 'style' => array( 'style3', 'style4', 'style5', 'style13' ) ),
			),
            array(
                    'type'    => Controls_Manager::SELECT2,
                    'id'      => 'icon_color',
                    'label'   => esc_html__( 'Icon Color', 'medilink-core' ),
                    'options' => array(
                            'primaryColor'  => esc_html__( 'Primary Color', 'medilink-core' ),
                            'secondaryColor' => esc_html__( 'Secondary Color', 'medilink-core' ),
                            'colorGreen'  => esc_html__( 'Accent Color', 'medilink-core' ),					
                    ),
                    'default' => 'primaryColor',
                    'condition'   => array( 'icontype' => array( 'icon' ),'style' => array( 'style2' ) ),
                ),
            array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'number',
				'label'   => __( 'Number', 'medilink-core' ),
				'default' => '01',
				'condition'   => array( 'style' => array( 'style4') ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'title',
				'label'   => esc_html__( 'Title', 'medilink-core' ),
				'default' => 'Lorem Ipsum',
				'condition'   => array( 'style' => array( 'style1','style2','style3','style4','style6','style7','style8','style9','style10','style11','style12','style13','style14' ) ),
			),
			array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'content',
				'label'   => esc_html__( 'Content', 'medilink-core' ),
				'default' => 'Lorem Ipsum hasbeen standard daand scrambled. Rimply dummy text of the printing and typesetting industry',
				 'condition'   => array( 'style' => array( 'style1','style2','style3','style4','style8','style9' ,'style11','style12','style13') ),
			),
			array(
				'type'  => Controls_Manager::URL,
				'id'    => 'url',
				'label' => esc_html__( 'Link (Optional)', 'medilink-core' ),
				'placeholder' => 'https://your-link.com',
				'condition'   => array( 'style!' => array( 'style12' ) ),
			),
			array(
				'type'  => Controls_Manager::TEXT,
				'id'    => 'url_text',
				'label' => esc_html__( 'Button Text (Optional)', 'medilink-core' ),
				'placeholder' => 'SEE DETAILS',
				 'condition'   => array( 'style' => array( 'style5', 'style13' ) ),
			),
			array(
	            'type'    => Controls_Manager::COLOR,
	            'id'      => 'boxbg_color',
	            'label'   => __( 'Background Color', 'medilink-core' ),
	            'default' => '',                       
	            'selectors' => array(
	                    '{{WRAPPER}} .feature-box-layout8' => 'background-color: {{VALUE}}',                           
	                ),
	            'condition'   => array( 'style' => array( 'style13' ) ),
	        ), 
			array(
				'mode' => 'section_end',
			),
		);
		return $fields;
	}
	protected function render() {
		$data = $this->get_settings();	
		switch ( $data['style'] ) {
		case 'style2':			
			$template = 'info-box-2';
		break;	
		case 'style3':			
			$template = 'info-box-3';
		break;			
		case 'style4':			
			$template = 'info-box-4';
		break;
		case 'style5':			
			$template = 'info-box-5';
		break;	
		case 'style6':			
			$template = 'info-box-6';
		break;	
		case 'style7':			
			$template = 'info-box-7';
		break;
		case 'style8':			
			$template = 'info-box-8';
		break;
		case 'style9':			
			$template = 'info-box-9';
		break;
		case 'style10':			
			$template = 'info-box-10';
		break;		
		case 'style11':			
			$template = 'info-box-11';
		break;
		case 'style12':			
			$template = 'info-box-12';
		break;
		case 'style13':			
			$template = 'info-box-13';
		break;
		case 'style14':			
			$template = 'info-box-14';
		break;			
		default:			
			$template = 'info-box-1';
		break;
		}
		return $this->rt_template( $template, $data );
	}
}