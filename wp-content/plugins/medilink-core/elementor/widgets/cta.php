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


class CTA extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = __( 'Call to Action', 'medilink-core' );
		$this->rt_base = 'rt-cta';
		parent::__construct( $data, $args );
	}


	public function rt_fields(){

		$fields = array(			
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_general',
				'label'   => __( 'General', 'medilink-core' ),
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
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'subtitle',
				'label'   => __( 'Sub Title', 'medilink-core' ),
				'default' => 'Lorem Ipsum has been standard daand scrambled',
				'condition'   => array( 'layout' => array( 'layout4') ),				
			),
			array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'title',
				'label'   => __( 'Title', 'medilink-core' ),
				'default' => 'Lorem Ipsum has been standard daand scrambled',
			),
			array(
				'type'    => Controls_Manager::MEDIA,
				'id'    => 'image',
				'label'   => esc_html__( 'Image', 'medilink-core' ),
				'description' => esc_html__( 'Image size should be 1920x820 px', 'medilink-core' ),
				'condition'   => array( 'layout' => array( 'layout2') ),	
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'    => 'callphone',
				'label'   => esc_html__( 'Phone No', 'medilink-core' ),
				'default' => '',
			    'condition'   => array( 'layout' => array( 'layout2') ),	
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'theme',
				'label'   => __( 'Background Theme', 'medilink-core' ),
				'options' => array(
					'transparent' 	=> __( 'Transparent', 'medilink-core' ),
					'light' 		=> __( 'Light', 'medilink-core' ),
					'dark'  		=> __( 'Dark', 'medilink-core' ),
					'primary' 		=> __( 'Primary', 'medilink-core' ),
					'grey'  		=> __( 'Grey', 'medilink-core' ),
				),
				'default' => 'primary',		
				'condition'   => array( 'layout' => array( 'layout1') ),			
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'themecolor',
				'label'   => __( 'Theme Color', 'medilink-core' ),
				'options' => array(					
					'color-light' 		=> __( 'Light', 'medilink-core' ),
					'color-dark'  		=> __( 'Dark', 'medilink-core' ),
					'color-primary' 		=> __( 'Primary', 'medilink-core' ),					
				),
				'default' => 'color-dark',	
				'condition'   => array( 'theme' => array( 'transparent', 'grey', 'light'),'layout' => array( 'layout1') ),			
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'buttontext',
				'label'   => __( 'Button Text', 'medilink-core' ),
				'default' => 'Make an Appointment',
			),
			array(
				'type'    => Controls_Manager::URL,
				'id'      => 'buttonurl',
				'label'   => __( 'Button URL', 'medilink-core' ),
				'placeholder' => 'https://your-link.com',
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'btn_icon',
				'label'       => esc_html__( 'Icon', 'medilink-core' ),
				'label_on'    => esc_html__( 'On', 'medilink-core' ),
				'label_off'   => esc_html__( 'Off', 'medilink-core' ),
				'default'     => 'no',
				'description' => esc_html__( 'Show or Hide Button Icon. Default: Off', 'medilink-core' ),
				'condition'   => array( 'layout' => array( 'layout4') ),
			),
			array(
				'mode' => 'section_end',
			),
			// Button style
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_button_style',
				'label'   => esc_html__( 'Button Style', 'medilink-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
			),
			array(
				'id'      => 'btn_heading_normal',
				'type' => Controls_Manager::HEADING,
				'label'   => __( 'Normal', 'medilink-core' ),
				'separator' => 'before',
			),
			array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'button_typo',
				'label'   => esc_html__( 'Typography', 'medilink-core' ),
				'selector' => '{{WRAPPER}} .item-btn',
			),			
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'btn_text_color',
				'label'   => esc_html__( 'Text Color', 'medilink-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .item-btn' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'btn_bg_color',
				'label'   => esc_html__( 'Background Color', 'medilink-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .item-btn' => 'background-color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'border_color',
				'label'   => esc_html__( 'Border Color', 'medilink-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .item-btn' => 'border-color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::DIMENSIONS,
				'id'      => 'button_radius',
				'mode'    => 'responsive',
				'label'   => esc_html__( 'Border Radius', 'medilink-core' ),
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .item-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			),
			array(
				'type'    => Controls_Manager::DIMENSIONS,
				'id'      => 'button_margin',
				'mode'    => 'responsive',
				'label'   => esc_html__( 'Margin', 'medilink-core' ),
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .item-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			),
			array(
				'type'    => Controls_Manager::DIMENSIONS,
				'id'      => 'button_padding',
				'mode'    => 'responsive',
				'label'   => esc_html__( 'Padding', 'medilink-core' ),
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .item-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			),
			array(
				'id'      => 'btn_hheading_normal',
				'type' => Controls_Manager::HEADING,
				'label'   => __( 'Hover', 'medilink-core' ),
				'separator' => 'before',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'btn_htext_color',
				'label'   => esc_html__( 'Hover Text Color', 'medilink-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .item-btn:hover' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'btn_hbg_color',
				'label'   => esc_html__( 'Hover Background Color', 'medilink-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .item-btn:hover' => 'background-color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'border_hover_color',
				'label'   => esc_html__( 'Border Hover Color', 'medilink-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .item-btn:hover' => 'border-color: {{VALUE}}',
				),
			),	
			array(
				'mode' => 'section_end',
			),			
		);
		return $fields;
	}


	protected function render() {

		$data = $this->get_settings();

		switch ( $data['layout'] ) {
			case 'layout2':
				$template = 'cta-2';
			break;	
			case 'layout3':
				$template = 'cta-3';
			break;	
			case 'layout4':
				$template = 'cta-4';
			break;			
			default:
				$template = 'cta-1';
			break;
		}

		return $this->rt_template( $template, $data );
	}
}