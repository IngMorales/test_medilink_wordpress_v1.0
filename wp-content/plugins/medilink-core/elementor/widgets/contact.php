<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */


namespace radiustheme\Medilink_Core;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit;


class Contact extends Custom_Widget_Base {


	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'Contact', 'medilink-core' );
		$this->rt_base = 'rt-contact';
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
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'address',
				'label'   => esc_html__( 'Address', 'medilink-core' ),
				'default' => 'Lorem Ipsum text of the printing and typesetting industry',
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'phone1',
				'label'   => esc_html__( 'Phone 1', 'medilink-core' ),
				'default' => '+0000000000',
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'phone2',
				'label'   => esc_html__( 'Phone 2', 'medilink-core' ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'fax',
				'label'   => esc_html__( 'Fax', 'medilink-core' ),
				'default' => '+0000000000',
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'email',
				'label'   => esc_html__( 'Email', 'medilink-core' ),
				'default' => 'info@example.com',
			),
			array(
				'mode' => 'section_end',
			),
		);
		return $fields;
	}


	protected function render() {

		$data = $this->get_settings();

		$template = 'contact';

		return $this->rt_template( $template, $data );
	}
}