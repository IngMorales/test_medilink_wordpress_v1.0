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

class Opening_Hours extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'Opening Hours', 'medilink-core' );
		$this->rt_base = 'rt-opening-hours-list';
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
				'default' => 'Opening Hours',
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'sub_title',
				'label'   => esc_html__( 'Title', 'medilink-core' ),
				'default' => 'We Are For You',
			),
			array(
				'type'    => Controls_Manager::ICONS,
				'id'      => 'icon_class',
				'label'   => esc_html__( 'Icon', 'roofit-core' ),
				'default' => [
			      'value' => 'fas fa-smile-wink',
			      'library' => 'fa-solid',
			  ],			  	
			),	
			array(
				'type'    => Controls_Manager::REPEATER,
				'id'      => 'list',
				'label'   => esc_html__( 'Add Todo list', 'medilink-core' ),				
				'fields'  => array(
					array(
						'type'    => Controls_Manager::TEXT,
						'name'    => 'list_day',
						'label'   => esc_html__( 'Days From', 'medilink-core' ),
						'default' => 'Sun - Wed :',
					),					
					array(
						'type'  => Controls_Manager::TEXT,
						'name'    => 'to_list',
						'label' => esc_html__( 'To List', 'medilink-core' ),
						'default' => '8:00 - 17:00',
					),
				),
			),
			array(
				'mode' => 'section_end',
			),

			 // Before Title style
            array(
                'mode'    => 'section_start',
                'id'      => 'sec_title_style',
                'label'   => esc_html__( 'Title', 'medilink-core' ),
                'tab'     => Controls_Manager::TAB_STYLE,
            ),         
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'title_color',
                'label'   => esc_html__( 'Title Color', 'medilink-core' ),
                'default' => '#111111',
                'selectors' => array(
                    '{{WRAPPER}} .opening-hours-title' => 'color: {{VALUE}}',                                
                ),
           ),     
            array( 
                'mode'      => 'group',
                'type'      => Group_Control_Typography::get_type(),
                'name'      => 'titles_font_size',                
                'label'     => esc_html__( 'Typography', 'medilink-core' ),
                'selector'  => '{{WRAPPER}} .opening-hours-title',
            ),
            array(
                'type'    => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'id'      => 'title_padding',
                 'mode'          => 'responsive',
                'label'   => __( 'Padding', 'medilink-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .opening-hours-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',                   
                ),
                'separator' => 'before',
            ),  
            array(
                'type'    => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                 'mode'          => 'responsive',
                'id'      => 'title_margin',
                'label'   => __( 'Margin', 'medilink-core' ),                 
                'selectors' => array(
                    '{{WRAPPER}} .opening-hours-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',                    
                ),
                'separator' => 'before',
            ),  
            array(
                'mode' => 'section_end',
            ),  

            // Before Title style
            array(
                'mode'    => 'section_start',
                'id'      => 'sec_sub_title_style',
                'label'   => esc_html__( 'Sub Title', 'medilink-core' ),
                'tab'     => Controls_Manager::TAB_STYLE,
            ),         
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'sub_title_color',
                'label'   => esc_html__( 'Sub Title Color', 'medilink-core' ),
                'default' => '#111111',
                'selectors' => array(
                    '{{WRAPPER}} .rtin-sub-title' => 'color: {{VALUE}}',                                
                ),
           ),     
            array( 
                'mode'      => 'group',
                'type'      => Group_Control_Typography::get_type(),
                'name'      => 'sub_titles_font_size',                
                'label'     => esc_html__( 'Typography', 'medilink-core' ),
                'selector'  => '{{WRAPPER}} .rtin-sub-title',
            ),
            array(
                'type'    => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'id'      => 'sub_title_padding',
                 'mode'          => 'responsive',
                'label'   => __( 'Padding', 'medilink-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .rtin-sub-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',                   
                ),
                'separator' => 'before',
            ),                  
            array(
                'type'    => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                 'mode'          => 'responsive',
                'id'      => 'sub_title_margin',
                'label'   => __( 'Margin', 'medilink-core' ),                 
                'selectors' => array(
                    '{{WRAPPER}} .rtin-sub-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',                    
                ),
                'separator' => 'before',
            ),  
            array(
                'mode' => 'section_end',
            ),
		);

		return $fields;
	}

	protected function render() {

		$data = $this->get_settings();					
		$template = 'opening-hours-1';	
		return $this->rt_template( $template, $data );

	}
}