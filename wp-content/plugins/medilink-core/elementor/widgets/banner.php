<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */


namespace radiustheme\Medilink_Core;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit;

class Banner extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'Banner', 'medilink-core' );
		$this->rt_base = 'rt-banner';
		parent::__construct( $data, $args );
	}

	private function rt_load_scripts(){
		wp_enqueue_script( 'tween-max' );
	}


	public function rt_fields(){
		$cpt = MEDILINK_CORE_CPT;
		 $posts = get_posts( ['post_type' => "{$cpt}_doctor", 'posts_per_page' => -1, 'orderby' => 'title','order' => 'ASC','post_status' => 'publish','suppress_filters' => false]);
	    $posts_dropdown = [];
	    foreach ( $posts as $post ) {
	      $posts_dropdown[$post->ID] = $post->post_title;
	    }

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
	        'banner_shape_list_image', [
	            'label' => __( 'Choose shape Image', 'medilink-core' ),
	            'type' => Controls_Manager::MEDIA,
	            'default' => [
	                'url' => Utils::get_placeholder_image_src(),
	            ],
	        ]
	    );

	    $repeater->add_control(
	        'banner_list_image_select_motion_effect',
	        [
	            'label' => __( 'Select Motion Effect', 'medilink-core' ),
	            'type' => Controls_Manager::SELECT,
	            'default' => 'none',
	            'options' => [
	                'none'  => __( 'None', 'medilink-core' ),
	                'motion-effects1' => __( 'Effect 1', 'medilink-core' ),
	                'motion-effects2' => __( 'Effect 2', 'medilink-core' ),
	                'motion-effects3' => __( 'Effect 3', 'medilink-core' ),
	                'motion-effects4' => __( 'Effect 4', 'medilink-core' ),
	                'motion-effects5' => __( 'Effect 5', 'medilink-core' ),
	            ],
	            'label_block' => true,
	        ]
	    );

		$fields = array(
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_banner_hero_img',
				'label'   => esc_html__( 'Hero Image', 'medilink-core' ),
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
				'type' => Controls_Manager::MEDIA,
				'id'   => 'banner_hero_img',
				'label' => esc_html__('Banner Hero Image', 'medilink-core'),
				'default' => [
			            'url' => Utils::get_placeholder_image_src(),
			        ],
			),
			array(
				'type' => Controls_Manager::MEDIA,
				'id'   => 'banner_img2',
				'label' => esc_html__('Banner Image 2', 'medilink-core'),
				'default' => [
			            'url' => Utils::get_placeholder_image_src(),
			        ],
			    'condition'   => array( 'layout' => array( 'layout2') ),
			),
			array(
			   'mode' => 'section_end',
			),
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_banner_shapes',
				'label'   => esc_html__( 'Shapes', 'medilink-core' ),
			),
			array (
				'type'    => Controls_Manager::REPEATER,
				'id'      => 'banner_shape_lists',
				'label'   => esc_html__( 'Shape Lists', 'medilink-core' ),
				'fields' => $repeater->get_controls(),
			),
			array(
				'mode' => 'section_end',
			),
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_banner_title',
				'label'   => esc_html__( 'Title', 'medilink-core' ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'banner_title',
				'label'   => esc_html__( 'Title', 'medilink-core' ),
				'default' => esc_html__( 'We Take Care Of Your Healthy Health', 'medilink-core' ),
				'label_block' => true,
			),
			array(
				'mode' => 'section_end',
			),
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_banner_content',
				'label'   => esc_html__( 'Content', 'medilink-core' ),
			),
			array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'banner_content',
				'label'   => esc_html__( 'Content', 'medilink-core' ),
				'default' => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Massa
                  in posuer risus scelerisque. Nibh eget lobortis adipiscing
                  orci, scelerisque gravida there are many viverra quam vel.', 'medilink-core' ),
			),
			array(
				'mode' => 'section_end',
			),
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_button_link',
				'label'   => esc_html__( 'Button', 'medilink-core' ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'buttontext',
				'label'   => esc_html__( 'Button Text', 'medilink-core' ),
				'default' => esc_html__('Read More', 'medilink-core'),
			),
			array(
				'type'    => Controls_Manager::URL,
				'id'      => 'buttonurl',
				'label'   => esc_html__( 'Button URL', 'medilink-core' ),
				'placeholder' => 'https://your-link.com',
			),
			array(
			   'mode' => 'section_end',
			 ), 
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_banner_doctor',
				'label'   => esc_html__( 'Doctor', 'medilink-core' ),
				'condition'   => array( 'layout' => array( 'layout1') ),
			),
			array(
                'type'     => Controls_Manager::SELECT2,
                'id'       => 'single_doctor',
                'label'    => esc_html__('Select Doctor', 'medilink-core'),
                'options'  => $posts_dropdown,
                'default'  => '0',
                'multiple' => false,
                'label_block' => true,
            ),
			array(
			   'mode' => 'section_end',
			 ),
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_banner_patients',
				'label'   => esc_html__( 'Patients', 'medilink-core' ),
				'condition'   => array( 'layout' => array( 'layout1') ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'banner_patient_title',
				'label'   => esc_html__( 'Patient Title', 'medilink-core' ),
				'default' => esc_html__( 'Happy Patients', 'medilink-core' ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'banner_patient_qty',
				'label'   => esc_html__( 'Patient Quantity', 'medilink-core' ),
				'default' => esc_html__( '68k', 'medilink-core' ),
			),
			array(
			   'mode' => 'section_end',
			 ),
			 array(
	            'mode'    => 'section_start',
	            'id'      => 'sec_bft_style',
	            'label'   => esc_html__( 'Title', 'medilink-core' ),
	            'tab'     => Controls_Manager::TAB_STYLE,
	        ),	       
	        array(
	            'type'    => Controls_Manager::COLOR,
	            'id'      => 'bft_color',
	            'label'   => __( 'Color', 'medilink-core' ),
	            'default' => '',                       
	            'selectors' => array(
	                    '{{WRAPPER}} .heading-title h1' => 'color: {{VALUE}}',                           
	                ),
	        ),  
	        array( 
	            'mode'      => 'group',
	            'type'      => Group_Control_Typography::get_type(),
	            'name'      => 'bft_font_size',                
	            'label'     => esc_html__( 'Icon Typography', 'medilink-core' ),
	            'selector'  => '{{WRAPPER}} .heading-title h1',
	        ),
	        array(
	            'type'    => Controls_Manager::DIMENSIONS,
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'bft_padding',
	             'mode'          => 'responsive',
	            'label'   => __( 'Padding', 'medilink-core' ),
	            'selectors' => array(
	                '{{WRAPPER}} .heading-title h1' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',                   
	            ),
	            'separator' => 'before',
	        ),  
	        array(
	            'type'    => Controls_Manager::DIMENSIONS,
	            'size_units' => [ 'px', '%', 'em' ],
	             'mode'          => 'responsive',
	            'id'      => 'bft_margin',
	            'label'   => __( 'Margin', 'medilink-core' ),                 
	            'selectors' => array(
	                '{{WRAPPER}} .heading-title h1' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',                    
	            ),
	            'separator' => 'before',
	        ),  
		    array(
		        'mode' => 'section_end',
		    ),
		    array(
	            'mode'    => 'section_start',
	            'id'      => 'sec_bfc_style',
	            'label'   => esc_html__( 'Content', 'medilink-core' ),
	            'tab'     => Controls_Manager::TAB_STYLE,
	        ),	       
	        array(
	            'type'    => Controls_Manager::COLOR,
	            'id'      => 'bfc_color',
	            'label'   => __( 'Color', 'medilink-core' ),
	            'default' => '',                       
	            'selectors' => array(
	                    '{{WRAPPER}} .main-banner-box1 p' => 'color: {{VALUE}}',                           
	                ),
	        ),  
	        array( 
	            'mode'      => 'group',
	            'type'      => Group_Control_Typography::get_type(),
	            'name'      => 'bfc_font_size',                
	            'label'     => esc_html__( 'Typography', 'medilink-core' ),
	            'selector'  => '{{WRAPPER}} .main-banner-box1 p',
	        ),
	        array(
	            'type'    => Controls_Manager::DIMENSIONS,
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'bfc_padding',
	             'mode'          => 'responsive',
	            'label'   => __( 'Padding', 'medilink-core' ),
	            'selectors' => array(
	                '{{WRAPPER}} .main-banner-box1 p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',                   
	            ),
	            'separator' => 'before',
	        ),  
	        array(
	            'type'    => Controls_Manager::DIMENSIONS,
	            'size_units' => [ 'px', '%', 'em' ],
	             'mode'          => 'responsive',
	            'id'      => 'bfc_margin',
	            'label'   => __( 'Margin', 'medilink-core' ),                 
	            'selectors' => array(
	                '{{WRAPPER}} .main-banner-box1 p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',                    
	            ),
	            'separator' => 'before',
	        ),  
		    array(
		        'mode' => 'section_end',
		    ),
		    array(
	            'mode'    => 'section_start',
	            'id'      => 'sec_bbtn_style',
	            'label'   => esc_html__( 'Button', 'medilink-core' ),
	            'tab'     => Controls_Manager::TAB_STYLE,
	        ),
	        array(
	        	'id' => 'bbtn_normal',
	        	'label' => esc_html__( 'Normal', 'medilink-core'),
	        	'type' => Controls_Manager::HEADING,
				'separator' => 'before',
	        ),	       
	        array(
	            'type'    => Controls_Manager::COLOR,
	            'id'      => 'bbtn_color',
	            'label'   => __( 'Color', 'medilink-core' ),
	            'default' => '',                       
	            'selectors' => array(
	                    '{{WRAPPER}} .item-btn' => 'color: {{VALUE}}',                           
	                ),
	        ),
	        array(
	            'type'    => Controls_Manager::COLOR,
	            'id'      => 'bbtn_bg_color',
	            'label'   => __( 'Background Color', 'medilink-core' ),
	            'default' => '',                       
	            'selectors' => array(
	                    '{{WRAPPER}} .item-btn' => 'background-color: {{VALUE}}',                           
	                ),
	        ),
	        array(
				'name'       => 'bbtn_border',
				'mode'     => 'group',
				'type'     => Group_Control_Border::get_type(),
				'label'    => __( 'Border', 'medilink-core' ),
				'selector' => '{{WRAPPER}} .item-btn',
			),  
	        array( 
	            'mode'      => 'group',
	            'type'      => Group_Control_Typography::get_type(),
	            'name'      => 'bbtn_font_size',                
	            'label'     => esc_html__( 'Typography', 'medilink-core' ),
	            'selector'  => '{{WRAPPER}} .item-btn',
	        ),
	        array(
	            'type'    => Controls_Manager::DIMENSIONS,
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'bbtn_padding',
	             'mode'          => 'responsive',
	            'label'   => __( 'Padding', 'medilink-core' ),
	            'selectors' => array(
	                '{{WRAPPER}} .item-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',                   
	            ),
	            'separator' => 'before',
	        ),
	         array(
	        	'id' => 'bbtn_hover',
	        	'label' => esc_html__( 'Hover', 'medilink-core'),
	        	'type' => Controls_Manager::HEADING,
				'separator' => 'before',
	        ),
	        array(
	            'type'    => Controls_Manager::COLOR,
	            'id'      => 'bbtn_h_color',
	            'label'   => __( 'Color', 'medilink-core' ),
	            'default' => '',                       
	            'selectors' => array(
	                    '{{WRAPPER}} .item-btn:hover' => 'color: {{VALUE}}',                           
	                ),
	        ),
	        array(
	            'type'    => Controls_Manager::COLOR,
	            'id'      => 'bbtn_hbg_color',
	            'label'   => __( 'Background Color', 'medilink-core' ),
	            'default' => '',                       
	            'selectors' => array(
	                    '{{WRAPPER}} .item-btn:hover' => 'background-color: {{VALUE}}',                           
	                ),
	        ),
	        array(
				'name'       => 'bbtnh_border',
				'mode'     => 'group',
				'type'     => Group_Control_Border::get_type(),
				'label'    => __( 'Border', 'medilink-core' ),
				'selector' => '{{WRAPPER}} .item-btn:hover',
			),  
		    array(
		        'mode' => 'section_end',
		    ),
		    array(
	            'mode'    => 'section_start',
	            'id'      => 'sec_doctor_box_style',
	            'label'   => esc_html__( 'Doctor Box', 'medilink-core' ),
	            'tab'     => Controls_Manager::TAB_STYLE,
	        ),
	        array(
	            'type'    => Controls_Manager::COLOR,
	            'id'      => 'doctor_boxbg_color',
	            'label'   => __( 'Background Color', 'medilink-core' ),
	            'default' => '',                       
	            'selectors' => array(
	                    '{{WRAPPER}} .img-box1' => 'background-color: {{VALUE}}',                           
	                ),
	        ), 
	        array(
	            'type'    => Controls_Manager::COLOR,
	            'id'      => 'doctor_boxtitle_color',
	            'label'   => __( 'Title Color', 'medilink-core' ),
	            'default' => '',                       
	            'selectors' => array(
	                    '{{WRAPPER}} .banner-doctor-content h3' => 'color: {{VALUE}}',                           
	                ),
	        ),
	        array( 
	            'mode'      => 'group',
	            'type'      => Group_Control_Typography::get_type(),
	            'name'      => 'doctor_boxtitle_font',                
	            'label'     => esc_html__( 'Typography', 'medilink-core' ),
	            'selector'  => '{{WRAPPER}} .banner-doctor-content h3',
	        ),
	        array(
	            'type'    => Controls_Manager::COLOR,
	            'id'      => 'doctor_boxline_color',
	            'label'   => __( 'Line Color', 'medilink-core' ),
	            'default' => '',                       
	            'selectors' => array(
	                    '{{WRAPPER}} .img-box1 .line1' => 'background-color: {{VALUE}}',                           
	                    '{{WRAPPER}} .img-box1 .line2' => 'background-color: {{VALUE}}',                           
	                ),
	        ),
	        array(
				'name'       => 'doctor_box_border',
				'mode'     => 'group',
				'type'     => Group_Control_Border::get_type(),
				'label'    => __( 'Image Border', 'medilink-core' ),
				'selector' => '{{WRAPPER}} .img-box1 .doctor-img',
			),
	        array(
		        'mode' => 'section_end',
		    ),
		    array(
	            'mode'    => 'section_start',
	            'id'      => 'sec_patient_box_style',
	            'label'   => esc_html__( 'Patient Box', 'medilink-core' ),
	            'tab'     => Controls_Manager::TAB_STYLE,
	        ),
	        array(
	            'type'    => Controls_Manager::COLOR,
	            'id'      => 'patient_boxbg_color',
	            'label'   => __( 'Background Color', 'medilink-core' ),
	            'default' => '',                       
	            'selectors' => array(
	                    '{{WRAPPER}} .img-box2' => 'background-color: {{VALUE}}',                           
	                ),
	        ),
	        array(
	            'type'    => Controls_Manager::COLOR,
	            'id'      => 'pbox_leftbg_color',
	            'label'   => __( 'Left Box Background', 'medilink-core' ),
	            'default' => '',                       
	            'selectors' => array(
	                    '{{WRAPPER}} .banner-pabox-left' => 'background-color: {{VALUE}}',                           
	                ),
	        ),
	        array(
	            'type'    => Controls_Manager::COLOR,
	            'id'      => 'pleft_boxtitle_color',
	            'label'   => __( 'Left Box Title Color', 'medilink-core' ),
	            'default' => '',                       
	            'selectors' => array(
	                    '{{WRAPPER}} .banner-pabox-left h2' => 'color: {{VALUE}}',                           
	                ),
	        ),
	        array( 
	            'mode'      => 'group',
	            'type'      => Group_Control_Typography::get_type(),
	            'name'      => 'pleft_boxtitle_font',                
	            'label'     => esc_html__( 'Left Box Typography', 'medilink-core' ),
	            'selector'  => '{{WRAPPER}} .banner-pabox-left h2',
	        ),  
	        array(
	            'type'    => Controls_Manager::COLOR,
	            'id'      => 'patient_boxtitle_color',
	            'label'   => __( 'Title Color', 'medilink-core' ),
	            'default' => '',                       
	            'selectors' => array(
	                    '{{WRAPPER}} .banner-pabox-right h3' => 'color: {{VALUE}}',                           
	                ),
	        ),
	        array( 
	            'mode'      => 'group',
	            'type'      => Group_Control_Typography::get_type(),
	            'name'      => 'patient_boxtitle_font',                
	            'label'     => esc_html__( 'Typography', 'medilink-core' ),
	            'selector'  => '{{WRAPPER}} .banner-pabox-right h3',
	        ),
	        array(
	            'type'    => Controls_Manager::COLOR,
	            'id'      => 'patient_boxline_color',
	            'label'   => __( 'Line Color', 'medilink-core' ),
	            'default' => '',                       
	            'selectors' => array(
	                    '{{WRAPPER}} .banner-pabox-right .line1' => 'background-color: {{VALUE}}',                           
	                    '{{WRAPPER}} .banner-pabox-right .line2' => 'background-color: {{VALUE}}',                           
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

		$this->rt_load_scripts();

		switch ( $data['layout'] ) {
		case 'layout2':
			$template = 'banner-2';
		break;		
		default:
			$template = 'banner-1';
		break;
		}
		return $this->rt_template( $template, $data );

	}

}