<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */



namespace radiustheme\Medilink_Core;


use Elementor\Plugin;
use \WP_Query;
use radiustheme\Medilink\RDTheme;
use radiustheme\Medilink\Helper;


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class Custom_Widget_Init {


	public function __construct() {
		add_action( 'elementor/widgets/widgets_registered', 		array( $this, 'init' ) );
		add_action( 'elementor/elements/categories_registered', 	array( $this, 'widget_categoty' ) );

		/*ajax actions*/
		add_action('wp_ajax_rt_loadmore_department', 				array( $this, 'rt_loadmore_department' ) );
		add_action('wp_ajax_nopriv_rt_loadmore_department', 		array( $this, 'rt_loadmore_department' ));

		add_action('wp_ajax_rt_loadmore_doctor', 				array( $this, 'rt_loadmore_doctor' ) );
		add_action('wp_ajax_nopriv_rt_loadmore_doctor', 		array( $this, 'rt_loadmore_doctor' ));
	}


	public function init() {

		require_once __DIR__ . '/base.php';

		// Widgets -- filename=>classname /@dev
		$widgets = array(
			'opening-hours'         => 'Opening_Hours',
			'title'           		=> 'Title',
			'paragraph-title'       => 'Paragraph_Title',
			'services-tab'          => 'Services_Tab',
			'cta'             		=> 'CTA',
			'routine'             	=> 'Routine',
			'icon-list'             => 'Icon_List',
			'departments'           => 'Departments',
			'departments-tab'       => 'Departments_Tab',
			'departments-slider'    => 'Departments_Slider',
			'departments-grid'      => 'Departments_Grid',
			'doctors'    			=> 'Doctors',
			'doctors-search'    	=> 'Doctors_Search',
			'doctors-slider'    	=> 'Doctors_Slider',
			'text-with-title' 		=> 'Text_With_Title',
			'info-box'        		=> 'Info_Box',
			'counter'        		=> 'Counter',
			'testimonial'        	=> 'Testimonials',
			'video-with-title' 		=> 'Video_With_Title',		
			'logo-slider'     		=> 'Logo_Slider',			
			'contact'         		=> 'Contact',
			'nav-menu'        		=> 'Nav_Menu',
			'price-plan' 	  		=> 'Price_Plan',
			'blog-post' 	  		=> 'Blog_post',
			'post-slider'     		=> 'Post_Slider',		
			'gallrey'         		=> 'Gallrey',
			'about-us'         		=> 'About_Us',
			'multiple-image'        => 'Multiple_Image',
			'thumbnails-slider'     => 'Thumbnails_Slider',
			'banner'                => 'Banner',						
		);

		foreach ( $widgets as $widget => $class ) {

			$template_name = "/elementor-custom/widgets/{$widget}.php";
			if ( file_exists( STYLESHEETPATH . $template_name ) ) {
				$file = STYLESHEETPATH . $template_name;
			}
			elseif ( file_exists( TEMPLATEPATH . $template_name ) ) {
				$file = TEMPLATEPATH . $template_name;
			}
			else {
				$file = __DIR__ . '/widgets/' . $widget. '.php';
			}

			require_once $file;

			$classname = __NAMESPACE__ . '\\' . $class;
			Plugin::instance()->widgets_manager->register_widget_type( new $classname );
		}
	}


	public function widget_categoty( $class ) {

		$id         = MEDILINK_CORE_THEME . '-widgets'; // Category /@dev

		$properties = array(
			'title' => esc_html__( 'RadiusTheme Elements', 'medilink-core' ),
		);

		Plugin::$instance->elements_manager->add_category( $id, $properties );
	}


	public function rt_loadmore_department() {

		$html = null;
		$remaining = true;
		$prefix      = MEDILINK_CORE_THEME;
		$cpt         = MEDILINK_CORE_CPT;
		$thumb_size  = "{$prefix}-size3";
		$data = $_POST['data'];
		$page = absint($_POST['page']) + 1;

		$args = array(
			'post_type'      => "{$cpt}_departments",
			'posts_per_page' => $data['number'],
			'orderby'        => $data['orderby'],
			'paged' => $page
		);

		if ( !empty( $data['cat'] ) ) {
			$args['tax_query'] = array(
				array(
					'taxonomy' => "{$cpt}_departments_category",
					'field' => 'term_id',
					'terms' => $data['cat'],
				)
			);
		}

		switch ( $data['orderby'] ) {
			case 'title':
			case 'menu_order':
			$args['order'] = 'ASC';
			break;
		}		

		$query = new WP_Query( $args );
		$col_class = "col-lg-{$data['col_lg']} col-md-{$data['col_md']} col-sm-{$data['col_sm']} col-xs-{$data['col_xs']}";
		$temp = Helper::wp_set_temp_query( $query );

		if ( $query->have_posts() ) :
			if($query->max_num_pages == $page){
				$remaining = false;
			}

		ob_start(); 		 

		switch ( $data['style']) {
			case 'style2':
				include( 'template/departments-2.php' );
			break;
			case 'style3':
				include( 'template/departments-3.php' );
			break;			
			default:
				include( 'template/departments-1.php' );
			break;
		}
	else:
		$remaining = false;		
	endif;

		$html = ob_get_clean();
		$var = $_POST;			   
		wp_send_json( compact('html', 'page', 'remaining', 'query'));
	}


	public function rt_loadmore_doctor() {

		$html = null;
		$remaining = true;
		$prefix      = MEDILINK_CORE_THEME;
		$cpt         = MEDILINK_CORE_CPT;
		$thumb_size  = "{$prefix}-size3";
		$data = $_POST['data'];
		$page = absint($_POST['page']) + 1;

		$args = array(
			'post_type'      => "{$cpt}_doctor",
			'posts_per_page' => $data['number'],
			'orderby'        => $data['orderby'],
			'paged' => $page
		);

		if ( !empty( $data['cat'] ) ) {
			$args['tax_query'] = array(
				array(
					'taxonomy' => "{$cpt}_doctor_category",
					'field' => 'term_id',
					'terms' => $data['cat'],
				)
			);
		}

		switch ( $data['orderby'] ) {
			case 'title':
			case 'menu_order':
			$args['order'] = 'ASC';
			break;
		}		

		$query = new WP_Query( $args );
		$col_class = "col-lg-{$data['col_lg']} col-md-{$data['col_md']} col-sm-{$data['col_sm']} col-xs-{$data['col_xs']}";
		$temp = Helper::wp_set_temp_query( $query );

		if ( $query->have_posts() ) :
			if($query->max_num_pages == $page){
				$remaining = false;
			}

		ob_start(); 		 

		switch ( $data['style']) {
			case 'style5':
				include( 'template/doctor-5.php' );
			break;
			case 'style6':
				include( 'template/doctor-6.php' );
			break;		
			default:
				include( 'template/doctor-6.php' );
			break;
		}
	else:
		$remaining = false;		
	endif;

		$html = ob_get_clean();
		$var = $_POST;			   
		wp_send_json( compact('html', 'page', 'remaining', 'query'));
	}

}
new Custom_Widget_Init();