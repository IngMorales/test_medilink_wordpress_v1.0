<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.1
 */

namespace radiustheme\Medilink;
use \WP_Query;
class Helper {


	public static function get_doctor_cat(){	
		$medilink = MEDILINK_THEME_PREFIX_VAR;
		$terms  = get_terms( array( 'taxonomy' => "{$medilink}_doctor_category", 'fields' => 'all' ) );
		$doctor_category_dropdown = array(array( 'id'=> '', 'name' => esc_html__( 'Select Doctor Category', 'medilink' ) , "url" => ''));
		if(!empty($terms)){
			foreach ( $terms as $term ) {
				$doctor_category_dropdown[] = array(
					'id' => $term->term_id,
					'name' => $term->name,
					'url' => get_term_link($term)
				);
			}
		}
			return $doctor_category_dropdown;
	}

	public static function check_string_not_empty ($values){

		if ( !empty(array_filter($values))) {
		    return true;
		} else {
		    return false;
		};
	}

	public static function get_doctor(){
		
			$medilink = MEDILINK_THEME_PREFIX_VAR;
			$args = array(
				'posts_per_page'   => -1,
				'orderby'          => 'title',
				'order'            => 'ASC',
				'post_type'        => "{$medilink}_doctor",
			);
			$posts = get_posts( $args );			
			foreach ( $posts as $post ) {
				$doctors[$post->ID] = $post->post_title;
			}
			return $doctors;
		}

	public static function get_departments_doctor($_doctors){
			$medilink = MEDILINK_THEME_PREFIX_VAR;                          
			$args = array(				
				'posts_per_page'   => -1,
				'post__in'   	   => $_doctors,				
				'orderby'          => 'title',
				'order'            => 'ASC',
				'post_type'        => "{$medilink}_doctor",
			);
			$doctors = get_posts( $args );	
			return $doctors;
		}

	public static function custom_sidebar_fields() {
		$medilink = MEDILINK_THEME_PREFIX_VAR;
		$sidebar_fields = array();

		$sidebar_fields['sidebar'] = esc_html__( 'Sidebar', 'medilink' );
		$sidebar_fields['sidebar-departments'] = esc_html__( 'Departments Sidebar ', 'medilink' );

		$sidebars = get_option( "{$medilink}_custom_sidebars", array() );
		if ( $sidebars ) {
			foreach ( $sidebars as $sidebar ) {
				$sidebar_fields[$sidebar['id']] = $sidebar['name'];
			}
		}

		return $sidebar_fields;
	}


	public function rt_loadmore_single_department() {
		$html = null;
		$remaining = true;
		$medilink      = MEDILINK_CORE_THEME;
		$cpt         = MEDILINK_CORE_CPT;
		$thumb_size  = "{$medilink}-size3";		
	
		$args = array(
		'post_type'      	=> "{$cpt}_departments",
		'post_status' 		=> 'publish',
		'p'         		=> 42, 		
		);				
		$query = new WP_Query( $args );
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
	public static function get_departments(){
		$medilink = MEDILINK_THEME_PREFIX_VAR;
		$departments = array();
		$args = array(
			'posts_per_page'   => -1,
			'orderby'          => 'title',
			'order'            => 'ASC',
			'post_type'        => "{$medilink}_departments",
		);	
		$posts = get_posts( $args );			
		foreach ( $posts as $post ) {
			$departments[$post->ID] = $post->post_title;
		}
		return $departments;
	}
	public static function requires( $filename, $dir = false ){
		if ( $dir) {
			$child_file = get_stylesheet_directory() . '/' . $dir . '/' . $filename;

			if ( file_exists( $child_file ) ) {
				$file = $child_file;
			}
			else {
				$file = get_template_directory() . '/' . $dir . '/' . $filename;
			}
		}
		else {
			$child_file = get_stylesheet_directory() . '/inc/' . $filename;

			if ( file_exists( $child_file ) ) {
				$file = $child_file;
			}
			else {
				$file = MEDILINK_THEME_INC_DIR . $filename;
			}
		}

		require_once $file;
	}

	public static function get_img( $img ){
		$img = get_template_directory_uri() . '/assets/img/' . $img;
		return $img;
	}

	public static function get_theme_css( $file ){
		$file = get_template_directory_uri() . '/' . $file . '.css';
		return $file;
	}
	public static function get_css( $file ){
		$file = get_template_directory_uri() . '/assets/css/' . $file . '.css';
		return $file;
	}
	public static function get_fonts_css( $file ){
		$file = get_template_directory_uri() . '/assets/fonts/' . $file . '.css';
		return $file;
	}

	public static function get_js( $file ){
		$file = get_template_directory_uri() . '/assets/js/' . $file . '.js';
		return $file;
	}

	public static function filter_content( $content ){
		// wp filters
		$content = wptexturize( $content );
		$content = convert_smilies( $content );
		$content = convert_chars( $content );
		$content = wpautop( $content );
		$content = shortcode_unautop( $content );

		// remove shortcodes
		$pattern= '/\[(.+?)\]/';
		$content = preg_replace( $pattern,'',$content );

		// remove tags
		$content = strip_tags( $content );

		return $content;
	}

	public static function get_current_post_content( $post = false ) {
		if ( !$post ) {
			$post = get_post();				
		}
		$content = has_excerpt( $post->ID ) ? $post->post_excerpt : $post->post_content;
		$content = self::filter_content( $content );
		return $content;
	}

	public static function pagination( $max_num_pages = false ) {
		global $wp_query;

		$max = $max_num_pages ? $max_num_pages : $wp_query->max_num_pages;
		$max = intval( $max );

		/** Stop execution if there's only 1 page */
		if( $max <= 1 ) return;

		$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;

		/**	Add current page to the array */
		if ( $paged >= 1 )
			$links[] = $paged;

		/**	Add the pages around the current page to the array */
		if ( $paged >= 3 ) {
			$links[] = $paged - 1;
			$links[] = $paged - 2;
		}

		if ( ( $paged + 2 ) <= $max ) {
			$links[] = $paged + 2;
			$links[] = $paged + 1;
		}
		include MEDILINK_THEME_VIEW_DIR . 'pagination.php';
	}

	public static function comments_callback( $comment, $args, $depth ){
		include MEDILINK_THEME_VIEW_DIR . 'comments-callback.php';
	}

	public static function hex2rgb($hex) {
		$hex = str_replace("#", "", $hex);
		if(strlen($hex) == 3) {
			$r = hexdec(substr($hex,0,1).substr($hex,0,1));
			$g = hexdec(substr($hex,1,1).substr($hex,1,1));
			$b = hexdec(substr($hex,2,1).substr($hex,2,1));
		} else {
			$r = hexdec(substr($hex,0,2));
			$g = hexdec(substr($hex,2,2));
			$b = hexdec(substr($hex,4,2));
		}
		$rgb = "$r, $g, $b";
		return $rgb;
	}

	public static function socials(){
		$rdtheme_socials = array(
			'social_facebook' => array(
				'icon' => 'fa-facebook-f',
				'url'  => RDTheme::$options['social_facebook'],
			),
			'social_twitter' => array(
				'icon' => 'fa-twitter',
				'url'  => RDTheme::$options['social_twitter'],
			),
			'social_gplus' => array(
				'icon' => 'fa-google-plus',
				'url'  => RDTheme::$options['social_gplus'],
			),
			'social_linkedin' => array(
				'icon' => 'fa-linkedin-in',
				'url'  => RDTheme::$options['social_linkedin'],
			),
			'social_youtube' => array(
				'icon' => 'fa-youtube',
				'url'  => RDTheme::$options['social_youtube'],
			),
			'social_pinterest' => array(
				'icon' => 'fa-pinterest',
				'url'  => RDTheme::$options['social_pinterest'],
			),
			'social_instagram' => array(
				'icon' => 'fa-instagram',
				'url'  => RDTheme::$options['social_instagram'],
			),
			'social_rss' => array(
				'icon' => 'fa-rss',
				'url'  => RDTheme::$options['social_rss'],
			),
		);
		return array_filter( $rdtheme_socials, array( __CLASS__ , 'filter_social' ) );
	}	

	public static function filter_social( $args ){
		return ( $args['url'] != '' );
	}

	//@rtl
		public static function maybe_rtl( $file ){
			if ( is_rtl() ) {
				$file =get_template_directory_uri() . '/assets/css-auto-rtl/' . $file . '.css';
				return $file;
			}
			else {
				$file = get_template_directory_uri() . '/assets/css/' . $file . '.css';
				return $file;
			}
		}

	public static function doctor_socials(){
		$doctor_socials = array(
			'facebook' => array(
				'label' => esc_html__( 'Facebook', 'medilink' ),
				'type'  => 'text',
				'icon'  => 'fa-facebook',
			),
			'twitter' => array(
				'label' => esc_html__( 'Twitter', 'medilink' ),
				'type'  => 'text',
				'icon'  => 'fa-twitter',
			),
			'linkedin' => array(
				'label' =>esc_html__( 'Linkedin', 'medilink' ),
				'type'  => 'text',
				'icon'  => 'fa-linkedin',
			),
			'gplus' => array(
				'label' =>esc_html__( 'Google Plus', 'medilink' ),
				'type'  => 'text',
				'icon'  => 'fa-google-plus',
			),
			'youtube' => array(
				'label' =>esc_html__( 'Youtube', 'medilink' ),
				'type'  => 'text',
				'icon'  => 'fa-youtube-play',
			),
			'pinterest' => array(
				'label' =>esc_html__( 'Pinterest', 'medilink' ),
				'type'  => 'text',
				'icon'  => 'fa-pinterest-p',
			),
			'instagram' => array(
				'label' =>esc_html__( 'Instagram', 'medilink' ),
				'type'  => 'text',
				'icon'  => 'fa-instagram',
			),
			'github' => array(
				'label' =>esc_html__( 'Github', 'medilink' ),
				'type'  => 'text',
				'icon'  => 'fa-github',
			),
			'stackoverflow' => array(
				'label' =>esc_html__( 'Stackoverflow', 'medilink' ),
				'type'  => 'text',
				'icon'  => 'fa-stack-overflow',
			),
		);
		
		return apply_filters( 'doctor_socials', $doctor_socials );
	}	

	public static function nav_menu_args(){
		$medilink   = MEDILINK_THEME_PREFIX_VAR;
		$pagemenu = false;
		if ( ( is_single() || is_page() ) ) {
			$menuid = get_post_meta( get_the_id(), "{$medilink}_page_menu", true );
			if ( !empty( $menuid ) && $menuid != 'default' ) {
				$pagemenu = $menuid;
			}
		}
		if ( $pagemenu ) {
			$nav_menu_args = array( 'menu' => $pagemenu,'container' => 'nav' );
		}
		else {
				$nav_menu_args = array( 'theme_location' => 'primary','container' => 'nav' );
		}
		return $nav_menu_args;
	}	
	public static function has_footer(){
		if ( !RDTheme::$options['footer_area'] ) {
			return false;
		}
		$footer_column = RDTheme::$options['footer_column'];
		for ( $i = 1; $i <= $footer_column; $i++ ) {
			if ( is_active_sidebar( 'footer-'. $i ) ) {
				return true;
			}
		}
		return false;
	}
	public static function doctors_query() {
		$cpt = MEDILINK_THEME_CPT_PREFIX;
		$args = array(
			'post_type'      => "{$cpt}_doctor",
			'posts_per_page' => RDTheme::$options['doctors_arc_number'],
		);

		$orderby = '';
		switch ( RDTheme::$options['doctors_arc_orderby'] ) {
			case 'title':
			case 'menu_order':
			$orderby = RDTheme::$options['doctors_arc_orderby'];
			$order = 'ASC';
			break;
		}
		if ( $orderby ) {
			$args['orderby'] = $orderby;
			$args['order'] = $order;
		}

		if ( get_query_var('paged') ) {
			$args['paged'] = get_query_var('paged');
		}
		elseif ( get_query_var('page') ) {
			$args['paged'] = get_query_var('page');
		}
		else {
			$args['paged'] = 1;
		}

		$query = new WP_Query( $args );

		return $query;
	}
	
	public static function departments_query() {
		$cpt = MEDILINK_THEME_CPT_PREFIX;
		$args = array(
			'post_type'      => "{$cpt}_departments",
			'posts_per_page' => RDTheme::$options['departments_arc_number'],
		);

		$orderby = '';
		switch ( RDTheme::$options['departments_arc_orderby'] ) {
			case 'title':
			case 'menu_order':
			$orderby = RDTheme::$options['departments_arc_orderby'];
			$order = 'ASC';
			break;
		}
		if ( $orderby ) {
			$args['orderby'] = $orderby;
			$args['order'] = $order;
		}

		if ( get_query_var('paged') ) {
			$args['paged'] = get_query_var('paged');
		}
		elseif ( get_query_var('page') ) {
			$args['paged'] = get_query_var('page');
		}
		else {
			$args['paged'] = 1;
		}

		$query = new WP_Query( $args );

		return $query;
	}


	public static function wp_set_temp_query( $query ) {
		global $wp_query;
		$temp = $wp_query;
		$wp_query = $query;
		return $temp;
	}

	public static function wp_reset_temp_query( $temp ) {
		global $wp_query;
		$wp_query = $temp;
		wp_reset_postdata();
	}

	//Post reading time
	public static function post_reading_time() {
		$content = get_post_field( 'post_content', get_the_ID() );
		$word_count = str_word_count( strip_tags( $content ) );
		$readingtime = ceil($word_count / 200);
		if ($readingtime == 1) {
			$timer = esc_html__(" Min Read", "medilink" );
		} else {
			$timer = esc_html__( "Min Read", "medilink" );
		}

		$totalreadingtime = $readingtime . $timer;
		return $totalreadingtime;
	}
}