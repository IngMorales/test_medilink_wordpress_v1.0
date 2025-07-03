<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Medilink_Core;
use Elementor\Utils;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit;

class Services_Tab extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'Services Tab', 'medilink-core' );
		$this->rt_base = 'rt-services-tab';
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
		wp_enqueue_script( 'jquery-magnific-popup' );	
		wp_enqueue_style( 'magnific-popup' );	
	}

	public function rt_fields(){

		$cpt = MEDILINK_CORE_CPT;
		$terms  = get_terms( array( 'taxonomy' => "{$cpt}_services_category", 'fields' => 'id=>name' ) );
		$category_dropdown = array( '0' => esc_html__( 'All Categories', 'medilink-core' ) );
		foreach ( $terms as $id => $name ) {
			$category_dropdown[$id] = $name;
		}

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
	        'tab_title', [
	            'label' => __( 'Title', 'medilink-core' ),
	            'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Modern Technology', 'medilink-core' ),
				'label_block' => true,
	        ]
	    );
	    $repeater->add_control(
	        'tab_icon', [
	            'label' => __( 'Icon', 'medilink-core' ),
	            'type' => Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-laptop',
					'library' => 'solid',
				],
	        ]
	    );
	    $repeater->add_control(
	        'tab_image1', [
	            'label' => __( 'Image 1', 'medilink-core' ),
	            'type' => Controls_Manager::MEDIA,
	            'default' => [
	                'url' => Utils::get_placeholder_image_src(),
	            ],
	        ]
	    );
	    $repeater->add_control(
	        'tab_image2', [
	            'label' => __( 'Image 2', 'medilink-core' ),
	            'type' => Controls_Manager::MEDIA,
	            'default' => [
	                'url' => Utils::get_placeholder_image_src(),
	            ],
	        ]
	    );
	    $repeater->add_control(
	        'tab_subtitle', [
	            'label' => __( 'Sub Title', 'medilink-core' ),
	            'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Certified Doctors', 'medilink-core' ),
				'label_block' => true,
	        ]
	    );
		$repeater->add_control(
	        'tab_content', [
	            'label' => __( 'Content', 'medilink-core' ),
	            'type' => Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'medilink-core' ),
				'label_block' => true,
	        ]
	    );
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
				),
				'default' => 'layout1',
			),			
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'number',
				'label'   => esc_html__( 'Total number of items', 'medilink-core' ),
				'default' => 3,
				'description' => esc_html__( 'Write -1 to show all', 'medilink-core' ),
				'condition' 	=> array( 'layout' => 'layout1' ),
			),				
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'cat',
				'label'   => esc_html__( 'Categories', 'medilink-core' ),
				'options' => $category_dropdown,
				'default' => '0',
				'condition' 	=> array( 'layout' => 'layout1' ),
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
				'condition' 	=> array( 'layout' => 'layout1' ),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'count',
				'label'   => esc_html__( 'Word count', 'medilink-core' ),
				'default' => 20,
				'description' => esc_html__( 'Maximum number of words', 'medilink-core' ),
				'condition' 	=> array( 'layout' => 'layout1' ),				
			),			
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'services_btn',
				'label'       => esc_html__( 'Services link', 'medilink-core' ),
				'label_on'    => esc_html__( 'On', 'medilink-core' ),
				'label_off'   => esc_html__( 'Off', 'medilink-core' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Show or Hide Services link. Default: On', 'medilink-core' ),
				'condition' 	=> array( 'layout' => 'layout1' ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'    => 'buttontext',
				'label'   => esc_html__( 'Button Text', 'medilink-core' ),
				'default' => 'See All Services',
				'condition' 	=> array( 'services_btn' => 'yes', 'layout' => array( 'layout1' ) ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'    => 'buttonurl',
				'label'   => esc_html__( 'Button URL', 'medilink-core' ),
				'condition' 	=> array( 'services_btn' => 'yes', 'layout' => array( 'layout1' ) ),
			),
			array (
				'type'    => Controls_Manager::REPEATER,
				'id'      => 'tab_items',
				'label'   => esc_html__( 'Tab Items', 'medilink-core' ),
				'fields' => $repeater->get_controls(),
				'condition' => array( 'layout' => 'layout2' ),
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
			$template = 'services-tab-2';
		break;		
		default:
			$template = 'services-tab-1';
		break;
		}		

		return $this->rt_template( $template, $data );

	}

}