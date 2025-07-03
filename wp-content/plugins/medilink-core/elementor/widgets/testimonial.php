<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */


namespace radiustheme\Medilink_Core;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit;
class Testimonials extends Custom_Widget_Base {
	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'Testimonials Slider', 'medilink-core' );
		$this->rt_base = 'rt-testimonials';
		parent::__construct( $data, $args );
	}
	private function rt_load_scripts(){
		wp_enqueue_style(  'owl-carousel' );
		wp_enqueue_style(  'owl-theme-default' );
		wp_enqueue_script( 'owl-carousel' );
		wp_enqueue_script( 'slick' );
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
					'layout6' => esc_html__( 'Layout 6', 'medilink-core' ),				
					'layout7' => esc_html__( 'Layout 7', 'medilink-core' ),				
					'layout8' => esc_html__( 'Layout 8', 'medilink-core' ),				
				),
				'default' => 'layout1',
			),		
			array(
				'type'    => Controls_Manager::REPEATER,
				'id'      => 'testimonials',
				'label'   => esc_html__( 'Add as many testimonials as you want', 'medilink-core' ),				
				'fields'  => array(
					array(
						'type'    => Controls_Manager::MEDIA,
						'name'    => 'image',
						'label'   => esc_html__( 'Image', 'medilink-core' ),
						'description' => esc_html__( 'Image size should be 90x90 px', 'medilink-core' ),
					),
					array(
						'type'    => Controls_Manager::TEXT,
						'name'    => 'title',
						'label'   => esc_html__( 'Title', 'medilink-core' ),
						'default' => 'Robert Adison',
						'label_block' => true,
					),					
					array(
						'type'    => Controls_Manager::TEXT,
						'name'    => 'subtitle',
						'label'   => esc_html__( 'Subtitle', 'medilink-core' ),
						'default' => 'Professor',
						'label_block' => true,
					),
					array(
						'type'    => Controls_Manager::TEXTAREA,
						'name'      => 'content',
						'label'   => esc_html__( 'Testimonials Content', 'medilink-core' ),
						'default' => 'Rimply dummy text of the printing and tRimply dummy text of the printing and typesetting industry.
                                psum has been the industry.',						
					),	
					array(
						'type'        => Controls_Manager::SWITCHER,
						'name'          => 'rating_edisable',
						'label'       => esc_html__( 'Rating Enable or disable', 'medilink-core' ),
						'label_on'    => esc_html__( 'On', 'medilink-core' ),
						'label_off'   => esc_html__( 'Off', 'medilink-core' ),
						'default'     => 'yes',
						'description' => esc_html__( 'Enable or disable rating. Default: On', 'medilink-core' ),
					),
					array(
						'type'    => Controls_Manager::SELECT2,
						'name'      => 'rating',
						'label'   => esc_html__( 'Rating', 'medilink-core' ),
						'options' => array(
							'1' => esc_html__( 'Rating 1', 'medilink-core' ),
							'2' => esc_html__( 'Rating 2', 'medilink-core' ),					
							'3' => esc_html__( 'Rating 3', 'medilink-core' ),					
							'4' => esc_html__( 'Rating 4', 'medilink-core' ),					
							'5' => esc_html__( 'Rating 5', 'medilink-core' ),					
					),
						'default' => '5',
						'condition'   => array( 'rating_edisable' => 'yes' ),
					),	
				),
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
				'condition'   => array( 'layout' => array( 'layout7' ) ),
			),
			array(
				'type'    => Controls_Manager::ICON,
				'id'      => 'icon',
				'label'   => esc_html__( 'Icon', 'medilink-core' ),
				'default' => 'fa fa-university',
				'condition'   => array( 'layout' => array( 'layout7' ), 'icontype' => array( 'icon' ) ),
			),
			array(
				'type'    => Controls_Manager::MEDIA,
				'id'      => 'image',
				'label'   => esc_html__( 'Image', 'medilink-core' ),
				'condition'   => array( 'layout' => array( 'layout7' ), 'icontype' => array( 'image' ) ),
				'description' => esc_html__( 'Recommended image size is 70x60 px', 'medilink-core' ),
			),
			array(
				'type'    => Controls_Manager::MEDIA,
				'id'      => 'shapeimg1',
				'label'   => esc_html__( 'Shape 1', 'medilink-core' ),
				'condition'   => array( 'layout' => array( 'layout7' ) ),
			),
			array(
				'type'    => Controls_Manager::MEDIA,
				'id'      => 'shapeimg2',
				'label'   => esc_html__( 'Shape 2', 'medilink-core' ),
				'condition'   => array( 'layout' => array( 'layout7' ) ),
			),
			array(
				'type'    => Controls_Manager::MEDIA,
				'id'      => 'shapeimg3',
				'label'   => esc_html__( 'Shape 3', 'medilink-core' ),
				'condition'   => array( 'layout' => array( 'layout7' ) ),
			),
			array(
				'mode' => 'section_end',
			),
			// Slider options
			array(
				'mode'        => 'section_start',
				'id'          => 'sec_slider',
				'label'       => esc_html__( 'Slider Options', 'medilink-core' ),
				'condition'   => array( 'layout!' => array( 'layout7' ) ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'slider_nav',
				'label'       => esc_html__( 'Navigation Arrow', 'medilink-core' ),
				'label_on'    => esc_html__( 'On', 'medilink-core' ),
				'label_off'   => esc_html__( 'Off', 'medilink-core' ),
				'default'     => '',
				'description' => esc_html__( 'Enable or disable navigation arrow. Default: Off', 'medilink-core' ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'slider_dots',
				'label'       => esc_html__( 'Navigation Dots', 'medilink-core' ),
				'label_on'    => esc_html__( 'On', 'medilink-core' ),
				'label_off'   => esc_html__( 'Off', 'medilink-core' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Enable or disable navigation dots. Default: On', 'medilink-core' ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'slider_autoplay',
				'label'       => esc_html__( 'Autoplay', 'medilink-core' ),
				'label_on'    => esc_html__( 'On', 'medilink-core' ),
				'label_off'   => esc_html__( 'Off', 'medilink-core' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Enable or disable autoplay. Default: On', 'medilink-core' ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'slider_stop_on_hover',
				'label'       => esc_html__( 'Stop on Hover', 'medilink-core' ),
				'label_on'    => esc_html__( 'On', 'medilink-core' ),
				'label_off'   => esc_html__( 'Off', 'medilink-core' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Stop autoplay on mouse hover. Default: On', 'medilink-core' ),
				'condition'   => array( 'slider_autoplay' => 'yes' ),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'slider_interval',
				'label'   => esc_html__( 'Autoplay Interval', 'medilink-core' ),
				'options' => array(
					'5000' => esc_html__( '5 Seconds', 'medilink-core' ),
					'4000' => esc_html__( '4 Seconds', 'medilink-core' ),
					'3000' => esc_html__( '3 Seconds', 'medilink-core' ),
					'2000' => esc_html__( '2 Seconds', 'medilink-core' ),
					'1000' => esc_html__( '1 Second',  'medilink-core' ),
				),
				'default' => '5000',
				'description' => esc_html__( 'Set any value for example 5 seconds to play it in every 5 seconds. Default: 5 Seconds', 'medilink-core' ),
				'condition'   => array( 'slider_autoplay' => 'yes' ),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'slider_autoplay_speed',
				'label'   => esc_html__( 'Autoplay Slide Speed', 'medilink-core' ),
				'default' => 200,
				'description' => esc_html__( 'Slide speed in milliseconds. Default: 200', 'medilink-core' ),
				'condition'   => array( 'slider_autoplay' => 'yes' ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'slider_loop',
				'label'       => esc_html__( 'Loop', 'medilink-core' ),
				'label_on'    => esc_html__( 'On', 'medilink-core' ),
				'label_off'   => esc_html__( 'Off', 'medilink-core' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Loop to first item. Default: On', 'medilink-core' ),
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
				$owl_data = array( 
					'nav'                => $data['slider_nav'] == 'yes' ? true : false,
					'dots'               => $data['slider_dots'] == 'yes' ? true : false,
					'navText'            => array( "<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>" ),
					'autoplay'           => $data['slider_autoplay'] == 'yes' ? true : false,
					'autoplayTimeout'    => $data['slider_interval'],
					'autoplaySpeed'      => $data['slider_autoplay_speed'],
					'autoplayHoverPause' => $data['slider_stop_on_hover'] == 'yes' ? true : false,
					'loop'               => $data['slider_loop'] == 'yes' ? true : false,
					'margin'             => 0,
					'responsive'         => array(
						'0'    => array( 'items' => 1),
						'480'  => array( 'items' => 1),
						'768'  => array( 'items' => 1),
						'992'  => array( 'items' => 1),
						'1200' => array( 'items' => 1),
					)
				);
				$data['owl_data'] = json_encode( $owl_data );
				$this->rt_load_scripts();			
				$template = 'testimonial-2';
			break;	
			case 'layout3':			
				$owl_data = array( 
					'nav'                => $data['slider_nav'] == 'yes' ? true : false,
					'dots'               => $data['slider_dots'] == 'yes' ? true : false,
					'navText'            => array( "<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>" ),
					'autoplay'           => $data['slider_autoplay'] == 'yes' ? true : false,
					'autoplayTimeout'    => $data['slider_interval'],
					'autoplaySpeed'      => $data['slider_autoplay_speed'],
					'autoplayHoverPause' => $data['slider_stop_on_hover'] == 'yes' ? true : false,
					'loop'               => $data['slider_loop'] == 'yes' ? true : false,
					'margin'             => 50,
					'responsive'         => array(
						'0'    => array( 'items' => 1),
						'480'  => array( 'items' => 1),
						'768'  => array( 'items' => 1),
						'992'  => array( 'items' => 2),
						'1200' => array( 'items' => 2),
					)
				);
				$data['owl_data'] = json_encode( $owl_data );
				$this->rt_load_scripts();			
				$template = 'testimonial-3';
			break;	
			case 'layout4':			
				$owl_data = array( 
					'nav'                => $data['slider_nav'] == 'yes' ? true : false,
					'dots'               => $data['slider_dots'] == 'yes' ? true : false,
					'navText'            => array( "<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>" ),
					'autoplay'           => $data['slider_autoplay'] == 'yes' ? true : false,
					'autoplayTimeout'    => $data['slider_interval'],
					'autoplaySpeed'      => $data['slider_autoplay_speed'],
					'autoplayHoverPause' => $data['slider_stop_on_hover'] == 'yes' ? true : false,
					'loop'               => $data['slider_loop'] == 'yes' ? true : false,
					'margin'             => 0,
					'responsive'         => array(
						'0'    => array( 'items' => 1),
						'480'  => array( 'items' => 1),
						'768'  => array( 'items' => 1),
						'992'  => array( 'items' => 1),
						'1200' => array( 'items' => 1),
					)
				);
				$data['owl_data'] = json_encode( $owl_data );
				$this->rt_load_scripts();			
				$template = 'testimonial-4';
			break;	
			case 'layout5':			
				$owl_data = array( 
					'nav'                => $data['slider_nav'] == 'yes' ? true : false,
					'dots'               => $data['slider_dots'] == 'yes' ? true : false,
					'navText'            => array( "<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>" ),
					'autoplay'           => $data['slider_autoplay'] == 'yes' ? true : false,
					'autoplayTimeout'    => $data['slider_interval'],
					'autoplaySpeed'      => $data['slider_autoplay_speed'],
					'autoplayHoverPause' => $data['slider_stop_on_hover'] == 'yes' ? true : false,
					'loop'               => $data['slider_loop'] == 'yes' ? true : false,
					'margin'             => 0,
					'responsive'         => array(
						'0'    => array( 'items' => 1),
						'480'  => array( 'items' => 1),
						'768'  => array( 'items' => 1),
						'992'  => array( 'items' => 1),
						'1200' => array( 'items' => 1),
					)
				);
				$data['owl_data'] = json_encode( $owl_data );
				$this->rt_load_scripts();			
				$template = 'testimonial-5';
			break;		
			case 'layout6':			
				$owl_data = array( 
					'nav'                => $data['slider_nav'] == 'yes' ? true : false,
					'dots'               => $data['slider_dots'] == 'yes' ? true : false,
					'navText'            => array( "<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>" ),
					'autoplay'           => $data['slider_autoplay'] == 'yes' ? true : false,
					'autoplayTimeout'    => $data['slider_interval'],
					'autoplaySpeed'      => $data['slider_autoplay_speed'],
					'autoplayHoverPause' => $data['slider_stop_on_hover'] == 'yes' ? true : false,
					'loop'               => $data['slider_loop'] == 'yes' ? true : false,
					'margin'             => 52,
					'responsive'         => array(
						'0'    => array( 'items' => 1),
						'480'  => array( 'items' => 1),
						'768'  => array( 'items' => 1),
						'992'  => array( 'items' => 2),
						'1200' => array( 'items' => 2),
					)
				);
				$data['owl_data'] = json_encode( $owl_data );
				$this->rt_load_scripts();			
				$template = 'testimonial-6';
			break;
			case 'layout7':			
				$owl_data = array( 
					'nav'                => $data['slider_nav'] == 'yes' ? true : false,
					'dots'               => $data['slider_dots'] == 'yes' ? true : false,
					'dotsData'           => true,
					'navText'            => array( "<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>" ),
					'autoplay'           => $data['slider_autoplay'] == 'yes' ? true : false,
					'autoplayTimeout'    => $data['slider_interval'],
					'autoplaySpeed'      => $data['slider_autoplay_speed'],
					'autoplayHoverPause' => $data['slider_stop_on_hover'] == 'yes' ? true : false,
					'loop'               => $data['slider_loop'] == 'yes' ? true : false,
					'margin'             => 52,
					'responsive'         => array(
						'0'    => array( 'items' => 1),
						'480'  => array( 'items' => 1),
						'768'  => array( 'items' => 1),
						'992'  => array( 'items' => 1),
						'1200' => array( 'items' => 1),
					)
				);
				$data['owl_data'] = json_encode( $owl_data );
				$this->rt_load_scripts();			
				$template = 'testimonial-7';
			break;
			case 'layout8':			
				$owl_data = array( 
					'nav'                => $data['slider_nav'] == 'yes' ? true : false,
					'dots'               => $data['slider_dots'] == 'yes' ? true : false,
					'navText'            => array( "<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>" ),
					'autoplay'           => $data['slider_autoplay'] == 'yes' ? true : false,
					'autoplayTimeout'    => $data['slider_interval'],
					'autoplaySpeed'      => $data['slider_autoplay_speed'],
					'autoplayHoverPause' => $data['slider_stop_on_hover'] == 'yes' ? true : false,
					'loop'               => $data['slider_loop'] == 'yes' ? true : false,
					'margin'             => 30,
					'responsive'         => array(
						'0'    => array( 'items' => 1),
						'480'  => array( 'items' => 1),
						'768'  => array( 'items' => 1),
						'992'  => array( 'items' => 2),
						'1200' => array( 'items' => 2),
					)
				);
				$data['owl_data'] = json_encode( $owl_data );
				$this->rt_load_scripts();			
				$template = 'testimonial-8';
			break;	
			default:		
				$owl_data = array( 
					'nav'                => $data['slider_nav'] == 'yes' ? true : false,
					'dots'               => $data['slider_dots'] == 'yes' ? true : false,
					'navText'            => array( "<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>" ),
					'autoplay'           => $data['slider_autoplay'] == 'yes' ? true : false,
					'autoplayTimeout'    => $data['slider_interval'],
					'autoplaySpeed'      => $data['slider_autoplay_speed'],
					'autoplayHoverPause' => $data['slider_stop_on_hover'] == 'yes' ? true : false,
					'loop'               => $data['slider_loop'] == 'yes' ? true : false,
					'margin'             => 0,
					'responsive'         => array(
						'0'    => array( 'items' => 1),
						'480'  => array( 'items' => 1),
						'768'  => array( 'items' => 1),
						'992'  => array( 'items' => 1),
						'1200' => array( 'items' => 1),
					)
				);
				$data['owl_data'] = json_encode( $owl_data );
				$this->rt_load_scripts();		
				$template = 'testimonial-1';
			break;
		}
		return $this->rt_template( $template, $data );
	}
}