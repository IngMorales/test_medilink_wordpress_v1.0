<?php
/**
 * Template Name: Archive Departments 3
 * 
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Medilink;

RDTheme::$options['departments_arc_style'] = 'style3';

$query = Helper::departments_query();

global $wp_query;
$wp_query = NULL;
$wp_query = $query;

get_template_part( 'template-parts/archive', 'departments' );

wp_reset_postdata(); 