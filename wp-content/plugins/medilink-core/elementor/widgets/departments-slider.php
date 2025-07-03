<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Medilink_Core;

use Elementor\Controls_Manager;


if ( ! defined( 'ABSPATH' ) ) exit;

class Departments_Slider extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'Departments Slider', 'medilink-core' );
		$this->rt_base = 'rt-departments-slider';
		$this->rt_translate = array(
			'cols'  => array(
				'12' => esc_html__( '1 Col', 'medilink-core' ),
				'6'  => esc_html__( '2 Col', 'medilink-core' ),
				'4'  => esc_html__( '3 Col', 'medilink-core' ),
				'3'  => esc_html__( '4 Col', 'medilink-core' ),
				'2'  => esc_html__( '6 Col', 'medilink-core' ),
			),
		);
		parent::__construct( $data, $args );
	}


	private function rt_load_scripts(){
		wp_enqueue_style(  'owl-carousel' );
		wp_enqueue_style(  'owl-theme-default' );
		wp_enqueue_script( 'owl-carousel' );
	}


	public function rt_fields(){

		$cpt = MEDILINK_CORE_CPT;
		$terms  = get_terms( array( 'taxonomy' => "{$cpt}_departments_category", 'fields' => 'id=>name' ) );
		$category_dropdown = array( '0' => esc_html__( 'All Categories', 'medilink-core' ) );
		foreach ( $terms as $id => $name ) {
			$category_dropdown[$id] = $name;
		}

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
					'style5' => esc_html__( 'Style 5 (New)', 'medilink-core' ),
					'style6' => esc_html__( 'Style 6 (New)', 'medilink-core' ),
				),
				'default' => 'style1',
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'number',
				'label'   => esc_html__( 'Total number of items', 'medilink-core' ),
				'default' => 12,
				'description' => esc_html__( 'Write -1 to show all', 'medilink-core' ),
			),				
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'cat',
				'label'   => esc_html__( 'Categories', 'medilink-core' ),
				'options' => $category_dropdown,
				'default' => '0',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'orderby',
				'label'   => esc_html__( 'Order By', 'medilink-core' ),
				'options' => array(
					'date'        => esc_html__( 'Date (Recents comes first)', 'medilink-core' ),
					'title'       => esc_html__( 'Title', 'medilink-core' ),
					'menu_order'  => esc_html__( 'Custom Order (Available via Order field inside Page Attributes box)', 'medilink-core' ),
				),
				'default' => 'date',
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'count',
				'label'   => esc_html__( 'Word count', 'medilink-core' ),
				'default' => 15,
				'description' => esc_html__( 'Maximum number of words', 'medilink-core' ),
				'condition'   => array( 'style' => array( 'style1', 'style2', 'style3' ) ),
			),		
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'departments_btn',
				'label'       => esc_html__( 'Department link', 'medilink-core' ),
				'label_on'    => esc_html__( 'On', 'medilink-core' ),
				'label_off'   => esc_html__( 'Off', 'medilink-core' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Show or Hide Department link. Default: On', 'medilink-core' ),
			),
			array(
				'type'    		=> Controls_Manager::TEXT,
				'id'    		=> 'buttontext',
				'label'   		=> esc_html__( 'Link Text', 'medilink-core' ),
				'default' 		=> 'READ MORE',
				'condition' 	=> array( 'departments_btn' => 'yes' ),
			),
			array(
				'mode' => 'section_end',
			),

			// Responsive Columns
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_responsive',
				'label'   => esc_html__( 'Number of Responsive Columns', 'medilink-core' ),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'col_lg',
				'label'   => esc_html__( 'Desktops: > 1199px', 'medilink-core' ),
				'options' => $this->rt_translate['cols'],
				'default' => '4',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'col_md',
				'label'   => esc_html__( 'Desktops: > 991px', 'medilink-core' ),
				'options' => $this->rt_translate['cols'],
				'default' => '4',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'col_sm',
				'label'   => esc_html__( 'Tablets: > 767px', 'medilink-core' ),
				'options' => $this->rt_translate['cols'],
				'default' => '6',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'col_xs',
				'label'   => esc_html__( 'Phones: < 768px', 'medilink-core' ),
				'options' => $this->rt_translate['cols'],
				'default' => '6',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'col_mobile',
				'label'   => esc_html__( 'Small Phones: < 480px', 'medilink-core' ),
				'options' => $this->rt_translate['cols'],
				'default' => '12',
			),
			array(
				'mode' => 'section_end',
			),

			// Slider options
			array(
				'mode'        => 'section_start',
				'id'          => 'sec_slider',
				'label'       => esc_html__( 'Slider Options', 'medilink-core' ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'slider_nav',
				'label'       => esc_html__( 'Navigation Arrow', 'medilink-core' ),
				'label_on'    => esc_html__( 'On', 'medilink-core' ),
				'label_off'   => esc_html__( 'Off', 'medilink-core' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Enable or disable navigation arrow. Default: Off', 'medilink-core' ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'slider_dots',
				'label'       => esc_html__( 'Navigation Dots', 'medilink-core' ),
				'label_on'    => esc_html__( 'On', 'medilink-core' ),
				'label_off'   => esc_html__( 'Off', 'medilink-core' ),
				'default'     => 'no',
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

		$owl_data = array( 
			'nav'                => $data['slider_nav'] == 'yes' ? true : false,
			'dots'               => $data['slider_dots'] == 'yes' ? true : false,			
			'navText'            => array( "<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>" ),
			'autoplay'           => $data['slider_autoplay'] == 'yes' ? true : false,
			'autoplayTimeout'    => $data['slider_interval'],
			'autoplaySpeed'      => $data['slider_autoplay_speed'],
			'autoplayHoverPause' => $data['slider_stop_on_hover'] == 'yes' ? true : false,
			'loop'               => $data['slider_loop'] == 'yes' ? true : false,
			'margin'             => 20,
			'responsive'         => array(
				'0'    			 => array( 'items' => 12 / $data['col_mobile'] ),
				'480'  			 => array( 'items' => 12 / $data['col_xs'] ),
				'768'  			 => array( 'items' => 12 / $data['col_sm'] ),
				'992' 			 => array( 'items' => 12 / $data['col_md'] ),
				'1200' 			 => array( 'items' => 12 / $data['col_lg'] ),
			)
		);

		$data['owl_data'] = json_encode( $owl_data );

		$this->rt_load_scripts();

		switch ( $data['style'] ) {
			case 'style2':
				$template = 'department-slider-2';
			break;
			case 'style3':
				$template = 'department-slider-3';
			break;		
			case 'style4':
				$template = 'department-slider-4';
			break;		
			case 'style5':
				$template = 'department-slider-5';
			break;	
			case 'style6':
				$template = 'department-slider-6';
			break;			
			default:
				$template = 'department-slider-1';
			break;
		}

		return $this->rt_template( $template, $data );
	}
}