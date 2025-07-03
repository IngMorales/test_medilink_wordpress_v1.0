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
use Elementor\Group_Control_Border;
use Elementor\Utils;
use radiustheme\Roofit\Helper;


if ( ! defined( 'ABSPATH' ) ) exit;
class About_Us extends Custom_Widget_Base {
	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'About Us', 'medilink-core' );
		$this->rt_base = 'rt-about-us';
		parent::__construct( $data, $args );
	}

	public function rt_fields(){

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
	        'about_shape_list_image', [
	            'label' => __( 'Choose shape Image', 'medilink-core' ),
	            'type' => Controls_Manager::MEDIA,
	            'default' => [
	                'url' => Utils::get_placeholder_image_src(),
	            ],
	        ]
	    );
	    $repeater->add_control(
	        'about_image_motion_effect',
	        [
	            'label' => __( 'Select Motion Effect', 'medilink-core' ),
	            'type' => Controls_Manager::SELECT,
	            'default' => 'none',
	            'options' => [
	                'none'  => __( 'None', 'medilink-core' ),
	                'motion-effects1' => __( 'Effect 1', 'medilink-core' ),
	                'motion-effects2' => __( 'Effect 2', 'medilink-core' ),
	                'motion-effects3' => __( 'Effect 3', 'medilink-core' ),
	            ],
	            'label_block' => true,
	        ]
	    );


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
	            'type'    => Controls_Manager::CHOOSE,
	            'id'      => 'Alignment',
	            'label'   => esc_html__( 'Style', 'medilink-core' ),
	                'options' => [
	                    'left' => [
	                        'title' => __( 'Left', 'htmega-addons' ),
	                        'icon' => 'fa fa-align-left',
	                    ],
	                    'center' => [
	                        'title' => __( 'Center', 'htmega-addons' ),
	                        'icon' => 'fa fa-align-center',
	                    ],
	                    'right' => [
	                        'title' => __( 'Right', 'htmega-addons' ),
	                        'icon' => 'fa fa-align-right',
	                    ],
	                    'justify' => [
	                        'title' => __( 'Justified', 'htmega-addons' ),
	                        'icon' => 'fa fa-align-justify',
	                    ],
	                ],
	                'selectors' => [
	                    '{{WRAPPER}} .about-box-layout1-new' => 'text-align: {{VALUE}};',
	                ],
	             'default' => 'center',
	             'condition'   => array( 'layout' => array( 'layout1') ),
	        ),
		    array(
	            'type'    => Controls_Manager::CHOOSE,
	            'id'      => 'title_tag',
	            'label'   => esc_html__( 'Title HTML Tag', 'medilink-core' ),
	            'options' => array(
	                'h1'  => [
	                    'title' => esc_html__( 'H1', 'medilink-core' ),
	                    'icon' => 'eicon-editor-h1'
	                ],
	                'h2'  => [
	                    'title' => esc_html__( 'H2', 'medilink-core' ),
	                    'icon' => 'eicon-editor-h2'
	                ],
	                'h3'  => [
	                    'title' => esc_html__( 'H3', 'medilink-core' ),
	                    'icon' => 'eicon-editor-h3'
	                ],
	                'h4'  => [
	                    'title' => esc_html__( 'H4', 'medilink-core' ),
	                    'icon' => 'eicon-editor-h4'
	                ],
	                'h5'  => [
	                    'title' => esc_html__( 'H5', 'medilink-core' ),
	                    'icon' => 'eicon-editor-h5'
	                ],
	                'h6'  => [
	                    'title' => esc_html__( 'H6', 'medilink-core' ),
	                    'icon' => 'eicon-editor-h6'
	                ],
	                'div'  => [
	                    'title' => esc_html__( 'div', 'medilink-core' ),
	                    'icon' => 'eicon-font'
	                ]
	            ),
		        'default' => 'h2',
		        'condition'   => array( 'layout' => array( 'layout1') ),			            
	        ),  
			array(
			   'mode' => 'section_end',
			 ),
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_general',
				'label'   => esc_html__( 'Title / Sub Title', 'medilink-core' ),
				'condition'   => array( 'layout' => array( 'layout1') ),
			),
			array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'title_befour',
				'label'   => esc_html__( 'Title Befour', 'medilink-core' ),
				'default' => 'About Us',
			),
			array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'title',
				'label'   => esc_html__( 'Title', 'medilink-core' ),
				'default' => 'Lorem Ipsum Dummy Text',
			),	
			array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'subtitle',
				'label'   => esc_html__( 'Subtitle', 'medilink-core' ),
				'default' => 'Lorem Ipsum Dummy Text',
			),
            array(
			   'mode' => 'section_end',
			 ),
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_content',
				'label'   => esc_html__( 'Content', 'medilink-core' ),
				'condition'   => array( 'layout' => array( 'layout1') ),
			),
			array(
				'type'    => Controls_Manager::WYSIWYG,
				'id'      => 'content',
				'label'   => esc_html__( 'Content', 'medilink-core' ),
				'default' => 'Lorem Ipsum has been the industrys standard dummy text ever since printer took a galley. Rimply dummy text of the printing and typesetting industry',
			),
			 array(
			   'mode' => 'section_end',
			 ),	
			 array(
				'mode'    => 'section_start',
				'id'      => 'sec_footer_content',
				'label'   => esc_html__( 'Footer', 'medilink-core' ),
				'condition'   => array( 'layout' => array( 'layout1') ),
			),
			array(
				'type'    => Controls_Manager::MEDIA,
				'id'      => 'sig_image',
				'label'   => esc_html__( 'Signechar image', 'medilink-core' ),
				'default' => [
			        'url' => Utils::get_placeholder_image_src(),
			    ],			
				'description' => esc_html__( 'Recommended full image', 'medilink-core' ),
			),
			array(
				'type'    	=> Group_Control_Image_Size::get_type(),
				'mode'    	=> 'group',
				'label'   	=> esc_html__( 'Signechar image size', 'medilink-core' ),	
				'name' 		=> 'sig_image_size', 
				'default' 	=> 'full',												
			),			
			array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'sigtitle',
				'label'   => esc_html__( 'Signechar Title', 'medilink-core' ),						
				'default' => esc_html__( 'John Jefferson', 'medilink-core' ),
			),	
			array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'sigsubtitle',
				'label'   => esc_html__( 'Signechar Subtitle', 'medilink-core' ),						
				'default' => esc_html__( 'chief medical officer.', 'medilink-core' ),
			),
			array(
			    'mode' => 'section_end',
			),
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_button_link',
				'label'   => esc_html__( 'Button', 'medilink-core' ),
				'condition'   => array( 'layout' => array( 'layout1') ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'buttontext',
				'label'   => esc_html__( 'Button Text', 'medilink-core' ),
				'default' => 'LOREM IPSUM',
			),
			array(
				'type'    => Controls_Manager::URL,
				'id'      => 'buttonurl',
				'label'   => esc_html__( 'Button URL', 'medilink-core' ),
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
				'condition'   => array( 'layout' => array( 'layout1') ),
			),
			array(
			   'mode' => 'section_end',
			 ),
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_about_hero_img',
				'label'   => esc_html__( 'Hero Image', 'medilink-core' ),
				'condition'   => array( 'layout' => array( 'layout2') ),
			),
			array(
				'type' => Controls_Manager::MEDIA,
				'id'   => 'about_hero_img',
				'label' => esc_html__('About Hero Image', 'medilink-core'),
				'default' => [
			            'url' => Utils::get_placeholder_image_src(),
			        ],
			),
			array(
			   'mode' => 'section_end',
			 ),
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_about_shapes',
				'label'   => esc_html__( 'Shapes', 'medilink-core' ),
				'condition'   => array( 'layout' => array( 'layout2') ),
			),
			array (
				'type'    => Controls_Manager::REPEATER,
				'id'      => 'about_shape_lists',
				'label'   => esc_html__( 'Shape Lists', 'medilink-core' ),
				'fields' => $repeater->get_controls(),
			),
			array(
				'mode' => 'section_end',
			),
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_about_contents',
				'label'   => esc_html__( 'Content', 'medilink-core' ),
				'condition'   => array( 'layout' => array( 'layout2') ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'about_content_number',
				'label'   => esc_html__( 'Number', 'medilink-core' ),
				'default' => esc_html__( '25', 'medilink-core' ),
				'label_block' => true,
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'about_content_title',
				'label'   => esc_html__( 'Title', 'medilink-core' ),
				'default' => esc_html__( 'Years Of Experienced', 'medilink-core' ),
				'label_block' => true,
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'about_content_subtitle',
				'label'   => esc_html__( 'Sub Title', 'medilink-core' ),
				'default' => esc_html__( 'in Medical Services', 'medilink-core' ),
				'label_block' => true,
			),
			array(
				'mode' => 'section_end',
			),

			// Before Title style
	        array(
	            'mode'    => 'section_start',
	            'id'      => 'sec_bft_style',
	            'label'   => esc_html__( 'Before Title', 'medilink-core' ),
	            'tab'     => Controls_Manager::TAB_STYLE,
	            'condition'   => array( 'layout' => array( 'layout1') ),
	        ),	       
	        array(
	            'type'    => Controls_Manager::COLOR,
	            'id'      => 'bft_color',
	            'label'   => __( 'Color', 'medilink-core' ),
	            'default' => '',                       
	            'selectors' => array(
	                    '{{WRAPPER}} .item-title-befour' => 'color: {{VALUE}}',                           
	                ),
	        ),  
	        array( 
	            'mode'      => 'group',
	            'type'      => Group_Control_Typography::get_type(),
	            'name'      => 'bft_font_size',                
	            'label'     => esc_html__( 'Icon Typography', 'medilink-core' ),
	            'selector'  => '{{WRAPPER}} .item-title-befour',
	        ),
	        array(
	            'type'    => Controls_Manager::DIMENSIONS,
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'content_padding',
	             'mode'          => 'responsive',
	            'label'   => __( 'Padding', 'medilink-core' ),
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
	            'label'   => __( 'Margin', 'medilink-core' ),                 
	            'selectors' => array(
	                '{{WRAPPER}} .item-title-befour' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',                    
	            ),
	            'separator' => 'before',
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
		        'condition'   => array( 'layout' => array( 'layout1') ),
		    ),	       
	        array(
	            'type'    => Controls_Manager::COLOR,
	            'id'      => 'title_color',
	            'label'   => __( 'Color', 'medilink-core' ),
	            'default' => '',                       
	            'selectors' => array(
	                    '{{WRAPPER}} .item-title' => 'color: {{VALUE}}',                           
	                ),
	        ),  
	        array( 
	            'mode'      => 'group',
	            'type'      => Group_Control_Typography::get_type(),
	            'name'      => 'titles_font_size',                
	            'label'     => esc_html__( 'Icon Typography', 'medilink-core' ),
	            'selector'  => '{{WRAPPER}} .item-title',
	        ),
	        array(
	            'type'    => Controls_Manager::DIMENSIONS,
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'title_padding',
	             'mode'          => 'responsive',
	            'label'   => __( 'Padding', 'medilink-core' ),
	            'selectors' => array(
	                '{{WRAPPER}} .item-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',                   
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
	                '{{WRAPPER}} .item-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',                    
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
		        'condition'   => array( 'layout' => array( 'layout1') ),
		    ),	       
	        array(
	            'type'    => Controls_Manager::COLOR,
	            'id'      => 'sub_title_color',
	            'label'   => __( 'Color', 'medilink-core' ),
	            'default' => '',                       
	            'selectors' => array(
	                    '{{WRAPPER}} .sub-title' => 'color: {{VALUE}}',                           
	                ),
	        ),  
	        array( 
	            'mode'      => 'group',
	            'type'      => Group_Control_Typography::get_type(),
	            'name'      => 'sub_titles_font_size',                
	            'label'     => esc_html__( 'Icon Typography', 'medilink-core' ),
	            'selector'  => '{{WRAPPER}} .sub-title',
	        ),
	        array(
	            'type'    => Controls_Manager::DIMENSIONS,
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'sub_title_padding',
	             'mode'          => 'responsive',
	            'label'   => __( 'Padding', 'medilink-core' ),
	            'selectors' => array(
	                '{{WRAPPER}} .sub-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',                   
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
	                '{{WRAPPER}} .sub-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',                    
	            ),
	            'separator' => 'before',
	        ),  
			array(
			    'mode' => 'section_end',
			), 

			// Before Title style
		    array(
		        'mode'    => 'section_start',
		        'id'      => 'sec_about_content_style',
		        'label'   => esc_html__( 'Content', 'medilink-core' ),
		        'tab'     => Controls_Manager::TAB_STYLE,
		        'condition'   => array( 'layout' => array( 'layout1') ),
		    ),	       
	        array(
	            'type'    => Controls_Manager::COLOR,
	            'id'      => 'about_content_color',
	            'label'   => __( 'Color', 'medilink-core' ),
	            'default' => '#646464',                       
	            'selectors' => array(
	                    '{{WRAPPER}} .about-content' => 'color: {{VALUE}}',                           
	                ),
	        ),  
	        array( 
	            'mode'      => 'group',
	            'type'      => Group_Control_Typography::get_type(),
	            'name'      => 'about_content_font_size',                
	            'label'     => esc_html__( 'Icon Typography', 'medilink-core' ),
	            'selector'  => '{{WRAPPER}} .about-content',
	        ),
	        array(
	            'type'    => Controls_Manager::DIMENSIONS,
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'about_content_padding',
	             'mode'          => 'responsive',
	            'label'   => __( 'Padding', 'medilink-core' ),
	            'selectors' => array(
	                '{{WRAPPER}} .about-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',                   
	            ),
	            'separator' => 'before',
	        ),  
	        array(
	            'type'    => Controls_Manager::DIMENSIONS,
	            'size_units' => [ 'px', '%', 'em' ],
	             'mode'          => 'responsive',
	            'id'      => 'about_content_margin',
	            'label'   => __( 'Margin', 'medilink-core' ),                 
	            'selectors' => array(
	                '{{WRAPPER}} .about-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',                    
	            ),
	            'separator' => 'before',
	        ),  
			array(
			    'mode' => 'section_end',
			),
			array(
		        'mode'    => 'section_start',
		        'id'      => 'sec_about_content_box_style',
		        'label'   => esc_html__( 'Content Box', 'medilink-core' ),
		        'tab'     => Controls_Manager::TAB_STYLE,
		        'condition'   => array( 'layout' => array( 'layout2') ),
		    ),	       
	        array(
	            'type'    => Controls_Manager::COLOR,
	            'id'      => 'about_contentbox_bg_color',
	            'label'   => __( 'Background Color', 'medilink-core' ),                      
	            'selectors' => array(
	                    '{{WRAPPER}} .about-box1' => 'background-color: {{VALUE}}',                           
	                ),
	        ),
	        array(
				'name'       => 'content_box_border',
				'mode'     => 'group',
				'type'     => Group_Control_Border::get_type(),
				'label'    => __( 'Box Border', 'medilink-core' ),
				'selector' => '{{WRAPPER}} .about-box1',
			),
			array(
	            'type'    => Controls_Manager::COLOR,
	            'id'      => 'about_number_bg_color',
	            'label'   => __( 'Number Background', 'medilink-core' ),                      
	            'selectors' => array(
	                    '{{WRAPPER}} .item-number' => 'background-color: {{VALUE}}',                           
	                ),
	        ),
	        array(
	            'type'    => Controls_Manager::COLOR,
	            'id'      => 'about_number_color_color',
	            'label'   => __( 'Number Color', 'medilink-core' ),                      
	            'selectors' => array(
	                    '{{WRAPPER}} .item-number' => 'color: {{VALUE}}',                           
	                ),
	        ),
	        array( 
	            'mode'      => 'group',
	            'type'      => Group_Control_Typography::get_type(),
	            'name'      => 'about_number_typo',                
	            'label'     => esc_html__( 'Number Typography', 'medilink-core' ),
	            'selector'  => '{{WRAPPER}} .item-number',
	        ),
	        array(
	            'type'    => Controls_Manager::COLOR,
	            'id'      => 'about_box_content_color',
	            'label'   => __( 'Content Color', 'medilink-core' ),                      
	            'selectors' => array(
	                    '{{WRAPPER}} ul.item-exprienced li' => 'color: {{VALUE}}',                           
	                ),
	        ),
	        array( 
	            'mode'      => 'group',
	            'type'      => Group_Control_Typography::get_type(),
	            'name'      => 'about_box_content_typo',                
	            'label'     => esc_html__( 'Content Typography', 'medilink-core' ),
	            'selector'  => '{{WRAPPER}} ul.item-exprienced li',
	        ), 
			array(
			    'mode' => 'section_end',
			),
			// Button style
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_button_style',
				'label'   => esc_html__( 'Button', 'medilink-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
				'condition'   => array( 'layout' => array( 'layout1' ) ),
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
		$template 	= 'about-' . str_replace("layout", "", $data['layout']);	
		return $this->rt_template( $template, $data );
	}
}