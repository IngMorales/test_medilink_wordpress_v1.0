<?php
/**
 * Template Name: Doctors 1
 * 
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Medilink;

RDTheme::$options['doctors_arc_style'] = 'style1';

$query = Helper::doctors_query();

global $wp_query;
$wp_query = NULL;
$wp_query = $query;

get_template_part( 'template-parts/archive', 'doctors' );

wp_reset_postdata(); 