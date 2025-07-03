<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */


namespace radiustheme\Medilink_Core;

use Elementor\Controls_Manager;


if ( ! defined( 'ABSPATH' ) ) exit;

class Departments extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'Departments', 'medilink-core' );
		$this->rt_base = 'rt-departments';
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

			// array(
			// 	'type'    => Controls_Manager::NUMBER,
			// 	'id'      => 'hidden_number',
			// 	'label'   => esc_html__( 'Total number of display items', 'medilink-core' ),
			// 	'default' => 4,				
			// ),

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
				'condition'   => array( 'style' => array( 'style2', 'style3', 'style4' ) ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'doctor_display',
				'label'       => esc_html__( 'Doctor Display', 'medilink-core' ),
				'label_on'    => esc_html__( 'On', 'medilink-core' ),
				'label_off'   => esc_html__( 'Off', 'medilink-core' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Show or Hide Doctors No. Default: On', 'medilink-core' ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'    => 'detailbuttontext',
				'label'   => esc_html__( 'Detail Button Text', 'medilink-core' ),
				'default' => 'Detail',
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'    => 'buttontext',
				'label'   => esc_html__( 'More Departments Button Text', 'medilink-core' ),
				'default' => 'More Departments',
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
				'default' => '3',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'col_md',
				'label'   => esc_html__( 'Desktops: > 991px', 'medilink-core' ),
				'options' => $this->rt_translate['cols'],
				'default' => '3',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'col_sm',
				'label'   => esc_html__( 'Tablets: > 767px', 'medilink-core' ),
				'options' => $this->rt_translate['cols'],
				'default' => '4',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'col_xs',
				'label'   => esc_html__( 'Phones: < 768px', 'medilink-core' ),
				'options' => $this->rt_translate['cols'],
				'default' => '12',
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
		);

		return $fields;
	}

	protected function render() {

		$data = $this->get_settings();				

		switch ( $data['style'] ) {
			case 'style2':
			$template = 'departments-2';
			break;
			case 'style3':
			$template = 'departments-3';
			break;
			case 'style4':
			$template = 'departments-4';
			break;			
			default:
			$template = 'departments-1';
			break;
		}

		return $this->rt_template( $template, $data );
	}
}