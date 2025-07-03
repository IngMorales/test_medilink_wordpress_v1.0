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
		add_action( 'elementor/widgets/widgets_registered', array( $this, 'init' ) );
		add_action( 'elementor/elements/categories_registered', array( $this, 'widget_categoty' ) );

		/*ajax actions*/
		add_action('wp_ajax_rt_loadmore_department', array( $this, 'rt_loadmore_department' ) );
		add_action('wp_ajax_nopriv_rt_loadmore_department', array( $this, 'rt_loadmore_department' ));
	}



	public function init() {

		require_once __DIR__ . '/base.php';
		// Widgets -- filename=>classname /@dev

		$widgets = array(
			'title'           		=> 'Title',
			'paragraph-Title'       => 'Paragraph_Title',
			'cta'             		=> 'CTA',
			'icon-list'             => 'Icon_List',
			'departments'           => 'Departments',
			'doctors'    			=> 'Doctors',
			'doctors-slider'    	=> 'Doctors_Slider',
			'text-with-title' 		=> 'Text_With_Title',
			'info-box'        		=> 'Info_Box',
			'counter'        		=> 'Counter',
			'testimonial'        	=> 'Testimonials',
			'video-with-title' 		=> 'Video_With_Title',
			'full-banner' 	  		=> 'full_banner',		
			'slider'          		=> 'Slider',		
			'countdown'       		=> 'CountDown',
			'logo-slider'     		=> 'Logo_Slider',			
			'contact'         		=> 'Contact',
			'nav-menu'        		=> 'Nav_Menu',
			'price-plan' 	  		=> 'Price_Plan',
			'blog-post' 	  		=> 'Blog_post',
			'post-slider'     		=> 'Post_Slider',		
			'gallrey'         		=> 'Gallrey',
			'about-us'         		=> 'About_Us',
			'thumbnails-slider'     => 'Thumbnails_Slider',						
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
		else:
			$remaining = false;
		endif;
		$html = ob_get_clean();
		$var = $_POST;
		wp_send_json( compact('html', 'page', 'remaining', 'query'));
	}
}
new Custom_Widget_Init();