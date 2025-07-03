<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Medilink_Core;

use Elementor\Controls_Manager;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit;

class Doctors extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){

		$this->rt_name = esc_html__( 'Doctors', 'medilink-core' );
		$this->rt_base = 'rt-doctor';
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
		wp_enqueue_script( 'imagesloaded' );
		wp_enqueue_script( 'isotope-pkgd' );
	}

	private function rt_select2_load_scripts(){
            wp_enqueue_style(  'select2');
			wp_enqueue_script( 'select2' );
	}

	public function rt_fields(){

		$cpt = MEDILINK_CORE_CPT;
		$terms  = get_terms( array( 'taxonomy' => "{$cpt}_doctor_category", 'fields' => 'id=>name' ) );
		$category_dropdown = [];
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
				'label'   => esc_html__( 'Layout', 'medilink-core' ),
				'options' => array(
					'style1' => esc_html__( 'Style 1', 'medilink-core' ),
					'style2' => esc_html__( 'Style 2', 'medilink-core' ),
					'style3' => esc_html__( 'Style 3', 'medilink-core' ),
					'style4' => esc_html__( 'Style 4 (Filter)', 'medilink-core' ),
					'style5' => esc_html__( 'Style 5', 'medilink-core' ),
					'style6' => esc_html__( 'Style 6', 'medilink-core' ),
				),

				'default' => 'style1',
			),

			[
				'type'    => Controls_Manager::SLIDER,
				'id'      => 'minheight',
				'mode'    => 'responsive',
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 1,
                    ],
                ],
                'size_units' => [ 'px'],
				'label'   => __( 'Minimum height', 'medilink-core' ),
				'selectors' => [
					'{{WRAPPER}} .team-box-layout2' => 'min-height: {{SIZE}}{{UNIT}}'
				],
			],

			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'number',
				'label'   => esc_html__( 'Total number of items', 'medilink-core' ),
				'default' => 5,
				'description' => esc_html__( 'Write -1 to show all', 'medilink-core' ),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'count',
				'label'   =>esc_html__( 'Word count', 'medilink-core' ),
				'default' => 10,
				'description' =>esc_html__( 'Maximum number of words', 'medilink-core' ),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'cat',
				'multiple' => true,
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
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'designation_display',
				'label'       => esc_html__( 'Designation Display', 'medilink-core' ),
				'label_on'    => esc_html__( 'On', 'medilink-core' ),
				'label_off'   => esc_html__( 'Off', 'medilink-core' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Show or Hide Designation. Default: On', 'medilink-core' ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'doctor_btn',
				'label'       => esc_html__( 'Doctor link', 'medilink-core' ),
				'label_on'    => esc_html__( 'On', 'medilink-core' ),
				'label_off'   => esc_html__( 'Off', 'medilink-core' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Show or Hide Doctor link. Default: On', 'medilink-core' ),
			),
			array(
				'type'    		=> Controls_Manager::TEXT,
				'id'    		=> 'buttontext2',
				'label'   		=> esc_html__( 'View Profile Text', 'medilink-core' ),
				'default' 		=> 'View Profile',
				'condition' 	=> array( 'doctor_btn' => 'yes' ),
			),
			array(
				'type'    		=> Controls_Manager::TEXT,
				'id'    		=> 'buttontext',
				'label'   		=> esc_html__( 'Link Text', 'medilink-core' ),
				'default' 		=> 'Book an Appointment',
				'condition' 	=> array( 'doctor_btn' => 'yes' ),
			),
			array(
				'type'    		=> Controls_Manager::SWITCHER,
				'id'    		=> 'buttonlinktype',
				'label'   		=> esc_html__( 'Link to profile', 'medilink-core' ),
				'condition' 	=> array( 'doctor_btn' => 'yes' ),
			), 
			array(
				'type'    => Controls_Manager::URL,
				'id'      => 'buttonurl',
				'label'   => __( 'Button URL', 'medilink-core' ),
				'placeholder' => 'https://your-link.com',
				'condition' 	=> array( 'buttonlinktype!' => 'yes' ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'doctor_readmore_btn',
				'label'       => esc_html__( 'Read More', 'medilink-core' ),
				'label_on'    => esc_html__( 'On', 'medilink-core' ),
				'label_off'   => esc_html__( 'Off', 'medilink-core' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Show or Hide Read More Button. Default: On', 'medilink-core' ),
				'condition' 	=> array( 'style' => array( 'style5', 'style6' ) ),
			),
			array(
				'type'    		=> Controls_Manager::TEXT,
				'id'    		=> 'rm_buttontext',
				'label'   		=> esc_html__( 'Read More Text', 'medilink-core' ),
				'default' 		=> esc_html__( 'Load More', 'medilink-core'),
				'condition' 	=> array( 'doctor_readmore_btn' => 'yes', 'style' => array( 'style5', 'style6' ) ),
			),
			array(
				'type' => Controls_Manager::MEDIA,
				'id'   => 'background_shape',
				'label' => esc_html__('Background Shape', 'medilink-core'),
				'default' => [
			            'url' => Utils::get_placeholder_image_src(),
			        ],
			    'condition' 	=> array( 'style' => 'style6' ),
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
				'default' => '2',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'col_sm',
				'label'   => esc_html__( 'Tablets: > 767px', 'medilink-core' ),
				'options' => $this->rt_translate['cols'],
				'default' => '12',
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
			case 'style1':
				$this->rt_load_scripts();
				$template = 'doctor-1';
			break;
			case 'style2':
				$this->rt_load_scripts();
				$template = 'doctor-2';
			break;
			case 'style3':
				$this->rt_select2_load_scripts();
				$template = 'doctor-3';
			break;
			case 'style4':
				$this->rt_load_scripts();
				$template = 'doctor-filter';
			break;
			case 'style5':
				$this->rt_load_scripts();
				$template = 'doctor-5';
			break;
			case 'style6':
				$this->rt_load_scripts();
				$template = 'doctor-6';
			break;
			default:
				$template = 'doctor-1';
			break;
		}

		return $this->rt_template( $template, $data );
	}
}