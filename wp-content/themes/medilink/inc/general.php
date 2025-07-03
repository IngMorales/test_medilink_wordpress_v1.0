<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Medilink;

class General_Setup {

	public function __construct() {
		add_action( 'after_setup_theme',   array( $this, 'theme_setup' ) );	
		add_action( 'widgets_init',        array( $this, 'register_sidebars' ) );		
		add_filter( 'body_class',          array( $this, 'body_classes' ) );
		add_action( 'wp_head',             array( $this, 'noscript_hide_preloader' ), 1 );
		add_action( 'wp_footer',           array( $this, 'scroll_to_top_html' ), 1 );
		add_filter( 'get_search_form',     array( $this, 'search_form' ) );
		add_filter( 'comment_form_fields', array( $this, 'move_textarea_to_bottom' ) );
		add_filter( 'excerpt_more',        array( $this, 'excerpt_more' ) );		
		add_filter( 'elementor/widgets/wordpress/widget_args', array( $this, 'elementor_widget_args' ) );
		add_action( 'pre_get_posts', array($this, 'wp_doctor_query' ), 999);
		add_action( 'pre_get_posts', array($this, 'wp_departments_query' ), 999);
		add_action( 'wp_head', array($this, 'medi_pingback_header' ), 999);
		add_filter( 'wp_kses_allowed_html', array( $this,  'medilink_kses_allowed_html' ), 10, 2 );	
	}
	/**
	* Add a pingback url auto-discovery header for single posts, pages, or attachments.
	*/
	function medi_pingback_header() {
		if ( is_singular() && pings_open() ) {
			printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );		

		}
	}	
	public function wp_doctor_query( $query ) {		
		if ( ! is_admin() ) {
				if ( is_post_type_archive( "medilink_doctor" ) || is_tax( "medilink_doctor_category" ) ) {
				 $query->set( 'posts_per_page', RDTheme::$options['doctors_arc_number']);;
				}
			}
		}
	public function wp_departments_query( $query ) {	
		if ( ! is_admin() ) {	
				if ( is_post_type_archive( "medilink_departments" ) || is_tax( "medilink_departments_category" ) ) {
				 $query->set( 'posts_per_page', RDTheme::$options['departments_arc_number']);;
				}
			}
		}

	public function theme_setup() {
		$medilink = MEDILINK_THEME_PREFIX;		
		// Theme supports
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
		add_theme_support( 'woocommerce' );	
		add_editor_style();
		remove_theme_support( 'widgets-block-editor' );
		
		// for gutenberg support
		add_theme_support( 'align-wide' );
		add_theme_support( 'editor-color-palette', array(
			array(
				'name' => esc_html__( 'strong magenta', 'medilink' ),
				'slug' => 'strong-magenta',
				'color' => '#a156b4',
			),
			array(
				'name' => esc_html__('light grayish magenta', 'medilink' ),
				'slug' => 'light-grayish-magenta',
				'color' => '#d0a5db',
			),
			array(
				'name' => esc_html__('very light gray', 'medilink' ),
				'slug' => 'very-light-gray',
				'color' => '#eee',
			),
			array(
				'name' => esc_html__('very dark gray', 'medilink' ),
				'slug' => 'very-dark-gray',
				'color' => '#444',
			),
		) );
		add_theme_support( 'editor-font-sizes', array(
			array(
				'name' => esc_html__('Small', 'medilink' ),
				'size' => 12,
				'slug' => 'small'
			),
			array(
				'name' => esc_html__('Normal', 'medilink' ),
				'size' => 16,
				'slug' => 'normal'
			),
			array(
				'name' => esc_html__('Large', 'medilink' ),
				'size' => 36,
				'slug' => 'large'
			),
			array(
				'name' => esc_html__('Huge', 'medilink' ),
				'size' => 50,
				'slug' => 'huge'
			)
		) );
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'responsive-embeds' );
		add_theme_support('editor-styles');	
		// Image sizes
		add_image_size( "medilink-size1", 		1200, 438, true ); // Single page thumbnail
		add_image_size( "medilink-size2", 		665,  494, true ); // Department lg 
		add_image_size( "medilink-size3", 		630,  408, true ); // Department sm 
		add_image_size( "medilink-size4", 		213,  420, true ); // doctor 1
		add_image_size( "medilink-size5", 		230,  230, true ); // doctor 1
		add_image_size( "medilink-size6", 		70,   70, true );  // doctor 1
		add_image_size( "medilink-size-new", 	307,  402, true );  // doctor 1
		add_image_size( "medilink-size7", 		700,  568, true );  // tab
		add_image_size( "medilink-size8", 	    100,  89, true );  // Single recent posts
		add_image_size( "medilink-size360", 	420,  360, true );  // blog
		add_image_size( "medilink-size980", 	980,  481, true );  // Department single
		add_image_size( "medilink-size315", 	315,  315, true );  // Department single
		add_image_size( "medilink-size295", 	295,  300, true );  // Department single
			

		// Register menus
		register_nav_menus( array(
			'primary'  => esc_html__( 'Primary', 'medilink' ),
			'topright' => esc_html__( 'Header Right', 'medilink' ),
		) );
	}


	public function register_sidebars() {		
		$footer_widget_titles = array(
			'1' => esc_html__( 'Footer 1', 'medilink' ),
			'2' => esc_html__( 'Footer 2', 'medilink' ),
			'3' => esc_html__( 'Footer 3', 'medilink' ),
			'4' => esc_html__( 'Footer 4', 'medilink' ),
		);

		register_sidebar( array(
			'name'          => esc_html__( 'Sidebar', 'medilink' ),
			'id'            => 'sidebar',
			'before_widget' => '<div id="%1$s" class="widget %2$s single-sidebar">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widgettitle">',
			'after_title'   => '</h3>',
		) );	
		register_sidebar( array(
			'name'          => esc_html__( 'MailChimp', 'medilink' ),
			'id'            => 'footer-mailchimp',
			'before_widget' => '<div id="%1$s" class="widgets %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
		register_sidebar( array(
			'name'          => esc_html__( 'Departments Sidebar', 'medilink' ),
			'id'            => 'sidebar-departments',
			'before_widget' => '<div id="%1$s" class="widget %2$s single-sidebar">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );

		for ( $i = 1; $i <= RDTheme::$options['footer_column']; $i++ ) {
			register_sidebar( array(
				'name'          => $footer_widget_titles[$i],
				'id'            => 'footer-'. $i,
				'before_widget' => '<div id="%1$s" class="widget footer-box %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<div class="footer-header"><h3 class="widgettitle ">',
				'after_title'   => '</h3></div>',
			) );		
		}
	}

	

	public function body_classes( $classes ) {

		// Header
		if (RDTheme::$options['sticky_menu'] ) {
			$classes[] = 'non-stick';
		}

		$classes[] = 'header-style-'. RDTheme::$header_style;
		
		if ( RDTheme::$tr_header == 1 || RDTheme::$tr_header == 'on' ){
			$classes[] = 'trheader';
		}else{
			$classes[] = 'non-trheader';

		}

		if (RDTheme::$options['search_icon'] && RDTheme::$options['cart_icon'] ) {
			$classes[] = 'cartoff';
		}else{
			$classes[] = 'carton';

		}	
        // Sidebar
		$classes[] = ( RDTheme::$layout == 'full-width' ) ? 'no-sidebar' : 'has-sidebar';

        // WooCommerce
		if( isset( $_COOKIE["shopview"] ) && $_COOKIE["shopview"] == 'list' ) {
			$classes[] = 'product-list-view';
		} else {
			$classes[] = 'product-grid-view';
		}

		return $classes;
	}

	public function noscript_hide_preloader(){
		// Hide preloader if js is disabled
		echo '<noscript><style>#preloader{display:none;}</style></noscript>';
	}

	public function scroll_to_top_html(){
		// Back-to-top link
		if ( RDTheme::$options['back_to_top'] ){
			echo '<a href="#" class="scrollToTop"><i class="fa fa-angle-double-up"></i></a>';
		}
	}

	public function search_form(){
		$output = '
		<form role="search" method="get" class="search-form" action="' . esc_url( home_url( '/' ) ) . '">
		<div class="custom-search-input">
		<div class="input-group col-md-12">
		<input type="text" class="search-query form-control" placeholder="' . esc_attr__( 'Search here ...', 'medilink' ) . '" value="' . get_search_query() . '" name="s" />
		<span class="input-group-btn">
		<button class="btn" type="submit">
		<span class="flaticon-search" aria-hidden="true"></span>
		</button>
		</span>
		</div>
		</div>
		</form>
		';
		return $output;
	}

	public function move_textarea_to_bottom( $fields ) {
		$temp = $fields['comment'];
		unset( $fields['comment'] );
		$fields['comment'] = $temp;
		return $fields;
	}

	/*Allow HTML for the kses post*/
	public function medilink_kses_allowed_html($tags, $context) {
		switch($context) {
			case 'social':
				$tags = array(
					'a' => array('href' => array()),
					'b' => array()
				);
			return $tags;
			case 'allow_link':
				$tags = array(
					'a' => array(
						'class' => array(),
						'href'  => array(),
						'rel'   => array(),
						'title' => array(),
						'target' => array(),
					),
					'b' => array()
				);
			return $tags;
			case 'alltext_allow':
				$tags = array(
					'a' => array(
						'class' => array(),
						'href'  => array(),
						'rel'   => array(),
						'title' => array(),
						'target' => array(),
					),
					'abbr' => array(
						'title' => array(),
					),
					'b' => array(),
					'br' => array(),
					'blockquote' => array(
						'cite'  => array(),
					),
					'cite' => array(
						'title' => array(),
					),
					'code' => array(),
					'del' => array(
						'datetime' => array(),
						'title' => array(),
					),
					'dd' => array(),
					'div' => array(
						'class' => array(),
						'title' => array(),
						'style' => array(),
						'id' 	=> array(),
					),
					'dl' => array(),
					'dt' => array(),
					'em' => array(),
					'h1' => array(),
					'h2' => array(),
					'h3' => array(),
					'h4' => array(),
					'h5' => array(),
					'h6' => array(),
					'i' => array(),
					'img' => array(
						'alt'    => array(),
						'class'  => array(),
						'height' => array(),
						'src'    => array(),
						'srcset' => array(),
						'width'  => array(),
					),
					'li' => array(
						'class' => array(),
					),
					'ol' => array(
						'class' => array(),
					),
					'p' => array(
						'class' => array(),
					),
					'q' => array(
						'cite' => array(),
						'title' => array(),
					),
					'span' => array(
						'class' => array(),
						'title' => array(),
						'style' => array(),
					),
					'strike' => array(),
					'strong' => array(),
					'ul' => array(
						'class' => array(),
					),
				);
				return $tags;
			default:
			return $tags;
		}
	}


	public function excerpt_more() {
		return esc_html__( '...', 'medilink' ) ;
	}
	
	function elementor_widget_args( $args ) {
		$args['before_widget'] = '<div class="widget single-sidebar padding-bottom1">';
		$args['after_widget']  = '</div>';
		$args['before_title']  = '<h3>';
		$args['after_title']   = '</h3>';
		return $args;
	}
}

new General_Setup;