<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */


namespace radiustheme\Medilink_Core;
use radiustheme\Medilink\RDTheme;
use radiustheme\Medilink\Helper;

use \RT_Postmeta;

if ( ! defined( 'ABSPATH' ) ) exit;

if ( !class_exists( 'RT_Postmeta' ) ) {
	return;
}

$medilink_Postmeta  = RT_Postmeta::getInstance();
$prefix 			= MEDILINK_CORE_CPT;
$nav_menus 			= wp_get_nav_menus( array( 'fields' => 'id=>name' ) );
$nav_menus 			= array( 'default' => esc_html__( 'Default', 'medilink-core' ) ) + $nav_menus;
$sidebars  			= array( 'default' => esc_html__( 'Default', 'medilink-core' ) ) + Helper::custom_sidebar_fields();


$medilink_Postmeta->add_meta_box( 'custom_page_title', __( 'Custom Page Title', 'medilink-core' ), array( "page" ), '', '', 'high', array(
	'fields' => array(
		"{$prefix}_custom_page_title" => array(
			'label' => __( 'Title', 'medilink-core' ),
			'type'  => 'text',
		),
	)
) );



$medilink_Postmeta->add_meta_box( 'page_settings', esc_html__( 'Layout Settings', 'medilink-core' ), array( 'page', 'post', "{$prefix}_doctor", "{$prefix}_departments" ), '', '', 'high', array(
	'fields' => array(
		"{$prefix}_layout" => array(
			'label'   => esc_html__( 'Layout', 'medilink-core' ),
			'type'    => 'select',
			'options' => array(
				'default'       => esc_html__( 'Default', 'medilink-core' ),
				'full-width'    => esc_html__( 'Full Width', 'medilink-core' ),
				'left-sidebar'  => esc_html__( 'Left Sidebar', 'medilink-core' ),
				'right-sidebar' => esc_html__( 'Right Sidebar', 'medilink-core' ),
				),
			'default'  			=> 'default',
			),			
		"{$prefix}_sidebar" => array(
			'label'    		=> esc_html__( 'Custom Sidebar', 'medilink-core' ),
			'type'     		=> 'select',
			'options'  		=> $sidebars,
			'default'  		=> 'default',
			),
		"{$prefix}_page_menu" => array(
			'label'   => esc_html__( 'Main Menu', 'medilink-core' ),
			'type'    => 'select',
			'options' => $nav_menus,
			'default' => 'default',
			),
		"{$prefix}_tr_header" => array(
			'label'   => esc_html__( 'Transparent Header', 'medilink-core' ),
			'type'    => 'select',
			'options' => array(
				'default' => esc_html__( 'Default', 'medilink-core' ),
				'on'      => esc_html__( 'Enabled', 'medilink-core' ),
				'off'     => esc_html__( 'Disabled', 'medilink-core' ),
				),
			'default'  => 'default',
			),	
		"{$prefix}_top_bar" => array(
			'label' 	  => __( 'Top Bar', 'medilink-core' ),
			'type'  	  => 'select',
			'options' => array(
				'default' => __( 'Default', 'medilink-core' ),
				'on'      => __( 'Enabled', 'medilink-core' ),
				'off'     => __( 'Disabled', 'medilink-core' ),
			),
			'default'  	  => 'default',
		),	
		"{$prefix}_top_bar_style" => array(
			'label'   => esc_html__( 'Top Bar Layout', 'medilink-core' ),
			'type'    => 'select',
			'options' => array(
				'default' => esc_html__( 'Default', 'medilink-core' ),
				'1'       => esc_html__( 'Layout 1', 'medilink-core' ),
				'2'       => esc_html__( 'Layout 2', 'medilink-core' ),
				'3'       => esc_html__( 'Layout 3', 'medilink-core' ),					
				'4'       => esc_html__( 'Layout 4', 'medilink-core' ),					
				'5'       => esc_html__( 'Layout 5', 'medilink-core' ),					
				),
			'default'  => 'default',
			),	
		"{$prefix}_header" => array(
			'label'   => esc_html__( 'Header Layout', 'medilink-core' ),
			'type'    => 'select',
			'options' => array(
				'default' => esc_html__( 'Default', 'medilink-core' ),
				'1'       => esc_html__( 'Layout 1', 'medilink-core' ),
				'2'       => esc_html__( 'Layout 2', 'medilink-core' ),
				'3'       => esc_html__( 'Layout 3', 'medilink-core' ),
				'4'       => esc_html__( 'Layout 4', 'medilink-core' ),
				'5'       => esc_html__( 'Layout 5', 'medilink-core' ),			
				'6'       => esc_html__( 'Layout 6', 'medilink-core' ),			
				'7'       => esc_html__( 'Layout 7', 'medilink-core' ),			
				'8'       => esc_html__( 'Layout 8', 'medilink-core' ),			
				'9'       => esc_html__( 'Layout 9', 'medilink-core' ),			
				),
			'default'  => 'default',
			),	
		"{$prefix}_footer" => array(
			'label'   => esc_html__( 'Footer Layout', 'medilink-core' ),
			'type'    => 'select',
			'options' => array(
				'default' => esc_html__( 'Default', 'medilink-core' ),
				'1'       => esc_html__( 'Layout 1', 'medilink-core' ),
				'2'       => esc_html__( 'Layout 2', 'medilink-core' ),											
				),
			'default'  => 'default',
			),
		"{$prefix}_top_padding" => array(
			'label'   => esc_html__( 'Content Padding Top', 'medilink-core' ),
			'type'    => 'select',
			'options' => array(
				'default' => esc_html__( 'Default', 'medilink-core' ),
				 '0px'     => '0px',
				'10'    => '10px',
				'20'    => '20px',
				'30'    => '30px',
				'40'    => '40px',
				'50'    => '50px',
				'60'    => '60px',
				'70'    => '70px',
				'80'    => '80px',
				'90'    => '90px',
				'100'   => '100px',
				),			
			'default'  => 'default',
			),
		"{$prefix}_bottom_padding" => array(
			'label'   => esc_html__( 'Content Padding Bottom', 'medilink-core' ),
			'type'    => 'select',
			'options' => array(
				'default' => esc_html__( 'Default', 'medilink-core' ),
				 '0px'     => '0px',
				'10'    => '10px',
				'20'    => '20px',
				'30'    => '30px',
				'40'    => '40px',
				'50'    => '50px',
				'60'    => '60px',
				'70'    => '70px',
				'80'    => '80px',
				'90'    => '90px',
				'100'   => '100px',
				),
			'default'  => 'default',
			),
		"{$prefix}_banner" => array(
			'label'   => esc_html__( 'Banner', 'medilink-core' ),
			'type'    => 'select',
			'options' => array(
				'default' => esc_html__( 'Default', 'medilink-core' ),
				'on'      => esc_html__( 'Enable', 'medilink-core' ),
				'off'     => esc_html__( 'Disable', 'medilink-core' ),
				),
			'default'  => 'default',
			),
		"{$prefix}_breadcrumb" => array(
			'label'   => esc_html__( 'Breadcrumb', 'medilink-core' ),
			'type'    => 'select',
			'options' => array(
				'default' => esc_html__( 'Default', 'medilink-core' ),
				'on'      => esc_html__( 'Enable', 'medilink-core' ),
				'off'     => esc_html__( 'Disable', 'medilink-core' ),
				),
			'default'  => 'default',
			),
		"{$prefix}_banner_type" => array(
			'label'   => esc_html__( 'Banner Background Type', 'medilink-core' ),
			'type'    => 'select',
			'options' => array(
				'default'  => esc_html__( 'Default', 'medilink-core' ),
				'bgimg'    => esc_html__( 'Background Image', 'medilink-core' ),
				'bgcolor'  => esc_html__( 'Background Color', 'medilink-core' ),
				),
			'default'  => 'default',
			),
		"{$prefix}_banner_bgimg" => array(
			'label' => esc_html__( 'Banner Background Image', 'medilink-core' ),
			'type'  => 'image',
			'desc'  => esc_html__( 'If not selected, default will be used', 'medilink-core' ),
			),
		"{$prefix}_banner_bgcolor" => array(
			'label' => esc_html__( 'Banner Background Color', 'medilink-core' ),
			'type'  => 'color_picker',
			'desc'  => esc_html__( 'If not selected, default will be used', 'medilink-core' ),
			),
		"{$prefix}_inner_padding_top" => array(
				'label' => esc_html__( 'Banner Padding Top', 'medilink-core' ),
				'type'  => 'text',
				'default'  => '',
				'desc'  => esc_html__( 'If not selected, default will be used 120 "px"', 'medilink-core' ),
			),	
		"{$prefix}_inner_padding_bottom" => array(
				'label' => esc_html__( 'Banner Padding Bottom', 'medilink-core' ),
				'type'  => 'text',
				'default'  => '',
				'desc'  => esc_html__( 'If not selected, default will be used 120 "px" ', 'medilink-core' ),
			),	
		),
	) 
);


$medilink_Postmeta->add_meta_box( 'doctor_info', esc_html__( 'Doctor Personal Info', 'medilink-core' ), array( "{$prefix}_doctor" ), '', '', 'high', array(
	'fields' => array(
		"{$prefix}_doctor_about_title" => array(
			'label' => esc_html__( 'About Me Title', 'medilink-core' ),
			'type'  => 'text',
			'default'  => 'About Me:',
			),
		"{$prefix}_doctor_about" => array(
			'label' => esc_html__( 'About', 'medilink-core' ),
			'type'  => 'textarea_html',
			'default'  => '',
			),
		"{$prefix}_designation" => array(
				'label' => esc_html__( 'Designation', 'medilink-core' ),
				'type'  => 'text',
			),	
		"{$prefix}_degree" => array(
				'label' => esc_html__( 'Degree', 'medilink-core' ),
				'type'  => 'text',
			),	
			"{$prefix}_phone" => array(
				'label' => esc_html__( 'Phone', 'medilink-core' ),
				'type'  => 'text',
			),	
			"{$prefix}_office" => array(
				'label' => esc_html__( 'Office:', 'medilink-core' ),
				'type'  => 'text',
			),	
			"{$prefix}_email" => array(
				'label' => esc_html__( 'E-mail:', 'medilink-core' ),
				'type'  => 'text',
			),	
			"{$prefix}_emergency_cases" => array(
				'label' => esc_html__( 'Emergency Cases:', 'medilink-core' ),
				'type'  => 'text',
			),							
		)
	)
);


$time_picker_format = ( RDTheme::$options['doctors_time_format'] == 24 ) ? 'time_picker_24' : 'time_picker';

$medilink_Postmeta->add_meta_box( 'doctor_schedule', __( 'Appointmnet Schedules', 'medilink-core' ), array( "{$prefix}_doctor" ), '', '', 'high', array(
	'fields' => array(	
		"{$prefix}_schedule_title" => array(
			'label' => esc_html__( 'Title', 'medilink-core' ),
			'type'  => 'text',
			'default'  => 'Appointmnet Schedules:',
		),		
		"{$prefix}_doctors_schedule" => array(
			'type'  => 'repeater',
			'button' => __( 'Add New Schedule', 'medilink-core' ),
			'value'  => array(
				'department' => array(
					'label' => __( 'Departments', 'medilink-core' ),
					'type'  => 'select',
					'options' => Helper::get_departments(),
					'default'  => 'default',
				),
				'week' => array(
					'label' => __( 'Weekday', 'medilink-core' ),
					'type'  => 'select',
					'options' => array(
						'none' => __( 'Select a Weekday', 'medilink-core' ),
						'mon'  => __( 'Monday', 'medilink-core' ),
						'tue'  => __( 'Tuesday', 'medilink-core' ),
						'wed'  => __( 'Wednesday', 'medilink-core' ),
						'thu'  => __( 'Thursday', 'medilink-core' ),
						'fri'  => __( 'Friday', 'medilink-core' ),
						'sat'  => __( 'Saturday', 'medilink-core' ),
						'sun'  => __( 'Sunday', 'medilink-core' ),
					),
				),				
				'start_time' => array(
					'label' => __( 'Start Time', 'medilink-core' ),
					'type'  => $time_picker_format,
				),
				'end_time' => array(
					'label' => __( 'End Time', 'medilink-core' ),
					'type'  => $time_picker_format,
				),
				'address' => array(
					'label' => esc_html__( 'Address', 'medilink-core' ),
					'type'  => 'textarea_html',
					'desc'  => esc_html__( 'Address Or google Map ', 'medilink-core' ),
				),
				"appbtn_text" => array(
					'label' => esc_html__( 'Button Text', 'medilink-core' ),
					'type'  => 'text',
				),
				"appbtn_link" => array(
					'label' => esc_html__( 'Button Link', 'medilink-core' ),
					'type'  => 'text',
				),	
			)
		),
	)
) );


$medilink_Postmeta->add_meta_box( 'doctor_socials', esc_html__( 'Doctor Socials', 'medilink-core' ), array( "{$prefix}_doctor" ), '', '', 'high', array(
	'fields' => array(
		"{$prefix}_doctor_socials_header" => array(
			'label' => esc_html__( 'Socials', 'medilink-core' ),
			'type'  => 'header',
			'desc'  => esc_html__( 'Put your Doctor links here', 'medilink-core' ),
			),
		"{$prefix}_doctor_social" => array(
			'type'  => 'group',
			'value'  => Helper::doctor_socials()
			),
		)
	)
);

$medilink_Postmeta->add_meta_box( 'doctor_education', esc_html__( 'Doctor Education', 'medilink-core' ), array( "{$prefix}_doctor" ), '', '', 'high', array(
	'fields' => array(
		"{$prefix}_skill_title" => array(
			'label' => esc_html__( 'Title', 'medilink-core' ),
			'type'  => 'text',
			'default'  => 'Education:',
		),		
		"{$prefix}_doctor_skill" => array(
			'type'  => 'repeater',
			'button' => esc_html__( 'Add New', 'medilink-core' ),
			'value'  => array(
				'year' => array(
					'label' => esc_html__( 'Year', 'medilink-core' ),
					'type'  => 'text',				
					),
				'degree' => array(
					'label' => esc_html__( 'Degree', 'medilink-core' ),
					'type'  => 'text',					
					),
				'institute' => array(
					'label' => esc_html__( 'Institute', 'medilink-core' ),
					'type'  => 'text',					
					),
				)
			),
		)
	)
);

$medilink_Postmeta->add_meta_box( 'doctor_experienced', esc_html__( 'Experienced:', 'medilink-core' ), array( "{$prefix}_doctor" ), '', '', 'high', array(
	'fields' => array(
		"{$prefix}_experienced_title" => array(
				'label' => esc_html__( 'Title', 'medilink-core' ),
				'type'  => 'text',
			),	
		"{$prefix}_experienced" => array(
			'type'  => 'repeater',
			'button' => esc_html__( 'Add New', 'medilink-core' ),
			'value'  => array(
				'year' => array(
					'label' => esc_html__( 'Year', 'medilink-core' ),
					'type'  => 'text',				
					),
				'department' => array(
					'label' => esc_html__( 'Department', 'medilink-core' ),
					'type'  => 'text',					
					),
				'position' => array(
					'label' => esc_html__( 'Position', 'medilink-core' ),
					'type'  => 'text',					
					),
				'hospital' => array(
					'label' => esc_html__( 'Hospital', 'medilink-core' ),
					'type'  => 'text',					
					),	
				)
			),
		)
	)
);


/////////////////

// Testimonial //

/////////////////

$medilink_Postmeta->add_meta_box( 'testimonial_info',

	esc_html__( 'Testimonial Information', 'medilink-core' ), array( "{$prefix}_testimonial" ), '', '', 'high', array(

	'fields' => array(
		"{$prefix}_testimonial_rating" => array(
			'label' => esc_html__( 'Select the Rating', 'medilink-core' ),
			'type'  => 'select',
			'options' => array(
				'default' => esc_html__( 'Default', 'medilink-core' ),
				'0'     => '',
				'1'    => '1',
				'2'    => '2',
				'3'    => '3',
				'4'    => '4',
				'5'    => '5'
				),
			'default'  => 'default',
			),
		"{$prefix}_testimonial_designation" => array(
			'label' => esc_html__( 'Designation', 'medilink-core' ),
			'type'  => 'text',
			'default'  => '',
			)		
		)
	)
);

/////////////////

//	 Schedule  //

/////////////////

$medilink_event_social = array(
	'facebook' => array(
		'label' => esc_html__( 'Facebook', 'medilink-core' ),
		'type'  => 'text',
		'icon'  => 'fa-facebook',
		),
	'twitter' => array(
		'label' => esc_html__( 'Twitter', 'medilink-core' ),
		'type'  => 'text',
		'icon'  => 'fa-twitter',
		),
	'linkedin' => array(
		'label' => esc_html__( 'Linkedin', 'medilink-core' ),
		'type'  => 'text',
		'icon'  => 'fa-linkedin',
		),
	'gplus' => array(
		'label' => esc_html__( 'Google Plus', 'medilink-core' ),
		'type'  => 'text',
		'icon'  => 'fa-google-plus',
		),
	'skype' => array(
		'label' => esc_html__( 'Skype', 'medilink-core' ),
		'type'  => 'text',
		'icon'  => 'fa-skype',
		),
	'youtube' => array(
		'label' => esc_html__( 'Youtube', 'medilink-core' ),
		'type'  => 'text',
		'icon'  => 'fa-youtube-play',
		),
	'pinterest' => array(
		'label' => esc_html__( 'Pinterest', 'medilink-core' ),
		'type'  => 'text',
		'icon'  => 'fa-pinterest-p',
		),
	'instagram' => array(
		'label' => esc_html__( 'Instagram', 'medilink-core' ),
		'type'  => 'text',
		'icon'  => 'fa-instagram',
		),
	'github' => array(
		'label' => esc_html__( 'Github', 'medilink-core' ),
		'type'  => 'text',
		'icon'  => 'fa-github',
		),
	'stackoverflow' => array(
		'label' => esc_html__( 'Stackoverflow', 'medilink-core' ),
		'type'  => 'text',
		'icon'  => 'fa-stack-overflow',
		),
	);



/*-------------------------------------

#. Case Study

---------------------------------------*/
$args = array(
	'posts_per_page' => -1,
	'exclude'        => !empty( $_GET['post'] ) ? $_GET['post'] : '',
	'orderby'        => 'title',
	'order'          => 'DESC',
	'post_type'      => "{$prefix}_doctor",
);

$cases = get_posts( $args );
$cases_array = array();

foreach ( $cases as $case ) {
	$cases_array[$case->ID] = $case->post_title;
}

$medilink_Postmeta->add_meta_box( 'departments_doctor', esc_html__( 'Doctor Info', 'medilink-core' ), array( "{$prefix}_departments" ), '', '', 'high', array(
	'fields' => array(	
			"{$prefix}_doctor" => array(
				'label' => esc_html__( 'Doctors', 'medilink-core' ),
				'type'  => 'multi_select',
				'options' => $cases_array,
				'desc'  => esc_html__( 'Select your Doctors', 'medilink-core' ),					
			),
			"{$prefix}_icon_img" => array(
				'label' => esc_html__( 'Icon Image', 'medilink-core' ),
				'type'  => 'image',
				'desc'  => esc_html__( 'If not selected, default will be featured image', 'medilink-core' ),
			),
			"{$prefix}_icon_hover_img" => array(
				'label' => esc_html__( 'Icon Hover Image', 'medilink-core' ),
				'type'  => 'image',
				'desc'  => esc_html__( 'If not selected, default will be featured image', 'medilink-core' ),
			),
			"{$prefix}_emergency_cases" => array(
					'label' => esc_html__( 'Emergency Cases', 'medilink-core' ),
					'type'  => 'text',
					'default'  => '',
				),
			"{$prefix}_opening_header" => array(
				'label' => esc_html__( 'Opening Hours', 'medilink-core' ),
				'type'  => 'header',
				'desc'  => esc_html__( 'Add Opening Hours here', 'medilink-core' ),
			),
			"{$prefix}_opening_hour" => array(
				'type'  => 'repeater',
				'button' => esc_html__( 'Add New Day', 'medilink-core' ),
				'value'  => array(		
					"hours_label" => array(
						'label' => esc_html__( 'Opening Label', 'medilink-core' ),
						'type'  => 'text',
						'default'  => '',
					),			
					"hours" => array(
						'label' => esc_html__( 'Opening Hours', 'medilink-core' ),
						'type'  => 'text',
						'default'  => '',
					),	
				)
			),		
		)
	)
);


$medilink_Postmeta->add_meta_box( 'departments_services', esc_html__( 'Services', 'medilink-core' ), array( "{$prefix}_departments"), '', '', 'high', array(
	'fields' => array(	
		"{$prefix}_our_pricing_plan_title" => array(
			'label' => esc_html__( 'Our Pricing Plan Title', 'medilink-core' ),
			'type'  => 'text',
			'default'  => '',
		),
		"{$prefix}_department_services" => array(
			'type'  => 'repeater',
			'button' => esc_html__( 'Add New Services', 'medilink-core' ),
			'value'  => array(					
				"services_name" => array(
					'label' => esc_html__( 'Services Name', 'medilink-core' ),
					'type'  => 'text',
					'default'  => '',
				),
				"services_price" => array(
					'label' => esc_html__( 'Services Price', 'medilink-core' ),
					'type'  => 'text',
					'default'  => '',
				),	
			)
		),
	)
) );


$medilink_Postmeta->add_meta_box( 'departments_investigations', esc_html__( 'Investigations', 'medilink-core' ), array( "{$prefix}_departments"), '', '', 'high', array(
	'fields' => array(		
		"{$prefix}_department_investigations" => array(
			'type'  => 'repeater',
			'button' => esc_html__( 'Add New Investigations', 'medilink-core' ),
			'value'  => array(					
				"investigation_name" => array(
					'label' => esc_html__( 'Investigations Name', 'medilink-core' ),
					'type'  => 'text',
					'default'  => '',
				),
				"investigation_price" => array(
					'label' => esc_html__( 'Investigations Price', 'medilink-core' ),
					'type'  => 'text',
					'default'  => '',
				),	
			)
		),
	)
) );


$medilink_Postmeta->add_meta_box( 'services_info', esc_html__( 'Services Info', 'medilink-core' ), array( "{$prefix}_services"), '', '', 'high', array(
	'fields' => array(
		"{$prefix}_sub_title" => array(
			'label' => esc_html__( 'Sub Title', 'medilink-core' ),
			'type'  => 'text',
			'default'  => '',
		),
		"{$prefix}_short_detail" => array(
			'label' => esc_html__( 'Short Detail', 'medilink-core' ),
			'type'  => 'textarea_html',			
		),	
		"{$prefix}_services_info" => array(
			'type'  => 'repeater',
			'button' => esc_html__( 'Add New List', 'medilink-core' ),
			'value'  => array(					
				"services_list" => array(
					'label' => esc_html__( 'List', 'medilink-core' ),
					'type'  => 'text',
					'default'  => '',
				),				
			)
		),
		"{$prefix}_video_link" => array(
			'label' => esc_html__( 'Video link', 'medilink-core' ),
			'type'  => 'text',			
		),			
	)
) );