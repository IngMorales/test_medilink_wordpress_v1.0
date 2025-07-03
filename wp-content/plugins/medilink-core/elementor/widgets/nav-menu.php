<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */


namespace radiustheme\Medilink_Core;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit;

class Nav_Menu extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'Navigation Manu', 'medilink-core' );
		$this->rt_base = 'rt-nav-menu';
		parent::__construct( $data, $args );
	}

	public function rt_fields(){

		$menus = wp_get_nav_menus( array( 'orderby' => 'name', 'order' => 'ASC' ) );

		$menu_items      = array();
		$menu_items['0'] = esc_html__( '---Select---', 'builder-pro' );
		foreach ( $menus as $menu ) {
			$menu_items[$menu->term_id] = $menu->name;
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
				),
				'default' => 'style1',
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'title',
				'label'   => esc_html__( 'Title', 'medilink-core' ),
				'default' => 'Lorem Ipsum',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'menu',
				'label'   => esc_html__( 'Navigation Manu', 'medilink-core' ),
				'options' => $menu_items,
				'default' => '0',
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
			$template = 'nav-menu-2';
			break;			
			default:
			$template = 'nav-menu-1';
			break;
		}

		return $this->rt_template( $template, $data );
	}
}