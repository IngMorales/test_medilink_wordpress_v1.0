<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\Medilink;
// Template
switch ( RDTheme::$options['departments_single_arc_style'] ) {
	case 'style2':
	 	get_template_part( 'template-parts/single-department/single', 'department-2');
	break;	
	case 'style3':
 		get_template_part( 'template-parts/single-department/single', 'department-3');
	break;	
	default:
	 	get_template_part( 'template-parts/single-department/single', 'department-1');
	break;
}
?>