<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */


namespace radiustheme\Medilink_Core;

use radiustheme\Medilink\RDTheme;
use \RT_Posts;

if ( ! defined( 'ABSPATH' ) ) exit;

if ( !class_exists( 'RT_Posts' ) ) {
	return;
}

$prefix = MEDILINK_CORE_CPT;

$doctors_title = (RDTheme::$options['doctors_title']) ? RDTheme::$options['doctors_title']: "Doctors";
$gallery_title = (RDTheme::$options['gallery_title']) ? RDTheme::$options['gallery_title']: "Departments";
$departments_title = (RDTheme::$options['departments_title']) ? RDTheme::$options['departments_title']: "Gallery";
$services_title = (RDTheme::$options['services_title']) ? RDTheme::$options['services_title']: "Services";

$medilink_post_types = array(
	"{$prefix}_doctor"        => array(
		'title'        => esc_html__( $doctors_title, 'medilink-core' ),
		'plural_title' => esc_html__(  $doctors_title, 'medilink-core' ),
		'menu_icon'    => 'dashicons-businessman',
		'rewrite'      => RDTheme::$options['doctors_slug'],
        'supports'     => array( 'title', 'thumbnail', 'editor', 'excerpt', 'page-attributes' ),
		),
	"{$prefix}_departments"        => array(
		'title'        => esc_html__(  $departments_title, 'medilink-core' ),
		'plural_title' => esc_html__(  $departments_title, 'medilink-core' ),
		'menu_icon'    => 'dashicons-clipboard',
		'supports'     => array( 'title', 'thumbnail', 'editor', 'excerpt', 'page-attributes' ),
		'rewrite'      => RDTheme::$options['departments_slug'],
		),	
		"{$prefix}_gallrey"   => array(
			'title'           => esc_html__(  $gallery_title, 'medilink-core' ),
			'plural_title'    => esc_html__(  $gallery_title, 'medilink-core' ),
			'menu_icon'       => 'dashicons-format-gallery',
			'rewrite'         => RDTheme::$options['gallery_slug'],
			'supports'        => array( 'title', 'thumbnail', 'editor','excerpt', 'page-attributes' )
		),	
		"{$prefix}_services"   => array(
			'title'           => esc_html__(  $services_title, 'medilink-core' ),
			'plural_title'    => esc_html__(  $services_title, 'medilink-core' ),
			'menu_icon'       => 'dashicons-sos',
			'rewrite'         => RDTheme::$options['services_slug'],
			'supports'        => array( 'title', 'thumbnail', 'editor','excerpt', 'page-attributes' )
		),
	);


$medilink_taxonomies = array(
	"{$prefix}_doctor_category" => array(
		'title'        => esc_html__( $doctors_title . 'Category', 'medilink-core' ),
		'plural_title' => esc_html__( 'Categories', 'medilink-core' ),
		'post_types'   => "{$prefix}_doctor",
		),
	"{$prefix}_departments_category" => array(
		'title'        => esc_html__( $departments_title . 'Category', 'medilink-core' ),
		'plural_title' => esc_html__( 'Categories', 'medilink-core' ),
		'post_types'   => "{$prefix}_departments",
		),
		"{$prefix}_gallrey_category" => array(
			'title'        => esc_html__( $gallery_title . 'Category', 'medilink-core' ),
			'plural_title' => esc_html__( 'Gallery Categories', 'medilink-core' ),
			'post_types'   => "{$prefix}_gallrey",
			'rewrite'      => array( 'slug' => RDTheme::$options['gallery_cat_slug'] ),
		),
		"{$prefix}_services_category" => array(
			'title'        => esc_html__( $services_title . 'Category', 'medilink-core' ),
			'plural_title' => esc_html__( 'Categories', 'medilink-core' ),
			'post_types'   => "{$prefix}_services",
			'rewrite'      => array( 'slug' => RDTheme::$options['services_cat_slug'] ),
		),		
	);

$MEDILINK_Posts = RT_Posts::getInstance();
$MEDILINK_Posts->add_post_types( $medilink_post_types );
$MEDILINK_Posts->add_taxonomies( $medilink_taxonomies );