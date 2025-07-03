<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Medilink_Core;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit;

class Departments_Tab extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){

		$this->rt_name = esc_html__( 'Departments Tab', 'medilink-core' );
		$this->rt_base = 'rt-departments-tab';
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
		wp_enqueue_style(  'slick' );
		wp_enqueue_style(  'slick-theme' );
		wp_enqueue_script( 'slick' );
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
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'doctor_display',
				'label'       => esc_html__( 'Doctors Display', 'medilink-core' ),
				'label_on'    => esc_html__( 'On', 'medilink-core' ),
				'label_off'   => esc_html__( 'Off', 'medilink-core' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Show or Hide Doctors No. Default: On', 'medilink-core' ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'doctor_opening_hours',
				'label'       => esc_html__( 'Opening Hours Display', 'medilink-core' ),
				'label_on'    => esc_html__( 'On', 'medilink-core' ),
				'label_off'   => esc_html__( 'Off', 'medilink-core' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Show or Hide Opening Hours No. Default: On', 'medilink-core' ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'    => 'buttontext',
				'label'   => esc_html__( 'Button Text', 'medilink-core' ),
				'default' => 'More Departments',
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
		$this->rt_load_scripts();
		$template = 'departments-tab-1';			
		return $this->rt_template( $template, $data );
	}
}