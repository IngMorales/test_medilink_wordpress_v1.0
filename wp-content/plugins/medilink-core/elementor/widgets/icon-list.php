<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */


namespace radiustheme\Medilink_Core;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit;

class Icon_List extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'Icon List', 'medilink-core' );
		$this->rt_base = 'rt-icon-list';
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
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'style',
				'label'   => esc_html__( 'Style', 'medilink-core' ),
				'options' => array(
					'style1' => esc_html__( 'Style 1', 'medilink-core' ),
					'style2' => esc_html__( 'Style 2', 'medilink-core' ),
					'style3' => esc_html__( 'Style 3 (Primary bg)', 'medilink-core' ),
					'style4' => esc_html__( 'Style 4', 'medilink-core' ),
					'style5' => esc_html__( 'Style 5', 'medilink-core' ),
				),

				'default' => 'style1',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'theme',
				'label'   => __( 'Theme', 'medilink-core' ),
				'options' => array(
					'theme1' => __( 'Inline List', 'medilink-core' ),
					'theme2'  => __( 'Block List', 'medilink-core' ),
				),
				'default' => 'theme1',
			),
			array(
				'type'    => Controls_Manager::REPEATER,
				'id'      => 'list',
				'label'   => esc_html__( 'Add as many list as you want', 'medilink-core' ),				
				'fields'  => array(
					array(
						'type'    => Controls_Manager::TEXTAREA,
						'name'    => 'list_title',
						'label'   => esc_html__( 'List Title', 'medilink-core' ),
						'default' => 'LOREM IPSUM DUMMY TEXT',
					),					
					array(
						'type'  => Controls_Manager::URL,
						'name'    => 'url',
						'label' => esc_html__( 'Link (Optional)', 'medilink-core' ),
						'placeholder' => 'https://your-link.com',
					),
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

		switch ( $data['style'] ) {
		case 'style2':			
			$template = 'list-2';
		break;	
		case 'style3':			
			$template = 'list-3';
		break;			
		case 'style4':			
			$template = 'list-4';
		break;
		case 'style5':			
			$template = 'list-5';
		break;			
		default:			
			$template = 'list-1';

		break;
		}

		return $this->rt_template( $template, $data );
	}
}