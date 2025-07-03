<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */


namespace radiustheme\Medilink_Core;

use Elementor\Controls_Manager;


if ( ! defined( 'ABSPATH' ) ) exit;

class Text_With_Title extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'Text With Title', 'medilink-core' );
		$this->rt_base = 'rt-text-with-title';
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
				'id'      => 'layout',
				'label'   => esc_html__( 'Layout', 'medilink-core' ),
				'options' => array(
					'layout1' => esc_html__( 'Layout 1', 'medilink-core' ),
					'layout2' => esc_html__( 'Layout 2', 'medilink-core' ),
					'layout3' => esc_html__( 'Layout 3', 'medilink-core' ),
					'layout4' => esc_html__( 'Layout 4', 'medilink-core' ),
				),
				'default' => 'layout1',
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
				'type'    => Controls_Manager::WYSIWYG,
				'id'      => 'content',
				'label'   => esc_html__( 'Content', 'medilink-core' ),
				'default' => 'Lorem Ipsum has been the industrys standard dummy text ever since printer took a galley. Rimply dummy text of the printing and typesetting industry',
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
		);
		return $fields;
	}

	protected function render() {

		$data = $this->get_settings();

		switch ( $data['layout'] ) {
			case 'layout2':
			$template = 'text-with-title-2';
			break;
			case 'layout3':
			$template = 'text-with-title-3';
			break;
			case 'layout4':
			$template = 'text-with-title-4';
			break;
			default:
			$template = 'text-with-title-1';
			break;
		}

		return $this->rt_template( $template, $data );
	}
}