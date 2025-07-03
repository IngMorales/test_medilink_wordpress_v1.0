<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\Medilink;
	class Layouts {
		public $medilink = MEDILINK_THEME_PREFIX;
		public $cpt    = MEDILINK_THEME_CPT_PREFIX;
		public function __construct() {
			add_action( 'template_redirect', array( $this, 'layout_settings' ) );
		}
		public function layout_settings() {
			// Single Pages
			if( is_single() || is_page() ) {
				$post_type = get_post_type();
				$post_id   = get_the_id();
				switch( $post_type ) {
					case 'page':
					$medilink = 'page';
					break;
					case 'post':
					$medilink = 'single_post';
					break;
					case "{$this->cpt}_doctor":
					$medilink = 'doctor';
					RDTheme::$options[$medilink . '_layout'] = 'full-width';
					break;
					case "{$this->cpt}_departments":
					$medilink = 'departments';					
					break;   
					case "{$this->cpt}_services":
					$medilink = 'services';					
					break;                
					case 'product':
					$medilink = 'product';
					break;
					default:
					$medilink = 'single_post';
					break;
				}

				$layout         = get_post_meta( $post_id, "{$this->cpt}_layout", true );
				$sidebar        = get_post_meta( $post_id, "{$this->cpt}_sidebar", true );
				$top_bar        = get_post_meta( $post_id, "{$this->cpt}_top_bar", true );
				$top_bar_style  = get_post_meta( $post_id, "{$this->cpt}_top_bar_style", true );
				$tr_header      = get_post_meta( $post_id, "{$this->cpt}_tr_header", true );								
				$header_style   = get_post_meta( $post_id, "{$this->cpt}_header", true );
				$footer_style   = get_post_meta( $post_id, "{$this->cpt}_footer", true );
				$padding_top    = get_post_meta( $post_id, "{$this->cpt}_top_padding", true );
				$padding_bottom = get_post_meta( $post_id, "{$this->cpt}_bottom_padding", true );
				$has_banner     = get_post_meta( $post_id, "{$this->cpt}_banner", true );
				$has_breadcrumb = get_post_meta( $post_id, "{$this->cpt}_breadcrumb", true );
				$bgtype         = get_post_meta( $post_id, "{$this->cpt}_banner_type", true );
				$bgcolor        = get_post_meta( $post_id, "{$this->cpt}_banner_bgcolor", true );
				$bgimg          = get_post_meta( $post_id, "{$this->cpt}_banner_bgimg", true );

				$inner_padding_top    = get_post_meta( $post_id, "{$this->cpt}_inner_padding_top", true );
				$inner_padding_bottom = get_post_meta( $post_id, "{$this->cpt}_inner_padding_bottom", true );

				RDTheme::$layout 			= ( empty( $layout ) || $layout == 'default' ) ? RDTheme::$options[$medilink . '_layout'] : $layout;
				RDTheme::$sidebar 			= ( empty( $sidebar ) || $sidebar == 'default' ) ? RDTheme::$options[$medilink . '_sidebar'] : $sidebar;
				RDTheme::$tr_header 		= ( empty( $tr_header ) || $tr_header == 'default' ) ? RDTheme::$options['tr_header'] : $tr_header;		
				RDTheme::$top_bar = ( empty( $top_bar ) || $top_bar == 'default' ) ? RDTheme::$options['top_bar'] : $top_bar;
				RDTheme::$top_bar_style = ( empty( $top_bar_style ) || $top_bar_style == 'default' ) ? RDTheme::$options['top_bar_style'] : $top_bar_style;					
				RDTheme::$header_style 		= ( empty( $header_style ) || $header_style == 'default' ) ? RDTheme::$options['header_style'] : $header_style;
				RDTheme::$footer_style 		= ( empty( $footer_style ) || $footer_style == 'default' ) ? RDTheme::$options['footer_style'] : $footer_style;
				$padding_top          		= ( empty( $padding_top ) || $padding_top == 'default' ) ? RDTheme::$options[$medilink . '_padding_top'] : $padding_top;
				RDTheme::$padding_top 		= (int) $padding_top;
				$padding_bottom          	= ( empty( $padding_bottom ) || $padding_bottom == 'default' ) ? RDTheme::$options[$medilink . '_padding_bottom'] : $padding_bottom;
				RDTheme::$padding_bottom 	= (int) $padding_bottom;
				$inner_padding_top          		= ( empty( $inner_padding_top ) || $inner_padding_top == 'default' ) ? RDTheme::$options[$medilink . '_inner_padding_top'] : $inner_padding_top;
				RDTheme::$inner_padding_top 		= (int) $inner_padding_top;
				$inner_padding_bottom          	= ( empty( $inner_padding_bottom ) || $inner_padding_bottom == 'default' ) ? RDTheme::$options[$medilink . '_inner_padding_bottom'] : $inner_padding_bottom;
				RDTheme::$inner_padding_bottom 	= (int) $inner_padding_bottom;
				RDTheme::$has_banner 		= ( empty( $has_banner ) || $has_banner == 'default' ) ? RDTheme::$options[$medilink . '_banner'] : $has_banner;
				RDTheme::$has_breadcrumb 	= ( empty( $has_breadcrumb ) || $has_breadcrumb == 'default' ) ? RDTheme::$options[$medilink . '_breadcrumb'] : $has_breadcrumb;
				RDTheme::$bgtype 			= ( empty( $bgtype ) || $bgtype == 'default' ) ? RDTheme::$options[$medilink . '_bgtype'] : $bgtype;
				RDTheme::$bgcolor 			= empty( $bgcolor ) ? RDTheme::$options[$medilink . '_bgcolor'] : $bgcolor;
				if( !empty( $bgimg ) ) {
					$attch_url      = wp_get_attachment_image_src( $bgimg, 'full', true );
					RDTheme::$bgimg = $attch_url[0];
				}
				elseif( !empty( RDTheme::$options[$medilink . '_bgimg']['id'] ) ) {
					$attch_url      = wp_get_attachment_image_src( RDTheme::$options[$medilink . '_bgimg']['id'], 'full', true );
					RDTheme::$bgimg = $attch_url[0];
				}
				else {
					RDTheme::$bgimg = Helper::get_img( 'banner.jpg' );
				}
				if ( !is_active_sidebar( 'sidebar' ) ){
					RDTheme::$layout = 'full-width';
				}
			}

			// Blog and Archive
			elseif( is_home() || is_archive() || is_search() || is_404() ) {
				if( is_search() ) {
					$medilink = 'search';
				}
				elseif( is_404() ) {
					$medilink = 'error';
					RDTheme::$options[$medilink . '_layout'] = 'full-width';
				}
				elseif( function_exists( 'is_woocommerce' ) && is_woocommerce() ) {
					$medilink = 'shop';
				}
				elseif( is_post_type_archive( "{$this->cpt}_doctor" ) || is_tax( "{$this->cpt}_doctor_category" ) ) {
					$medilink = 'doctors_archive';
				}
				elseif( is_post_type_archive( "{$this->cpt}_departments" ) || is_tax( "{$this->cpt}_departments_category" ) ) {
					$medilink = 'departments_archive';
				}	
				elseif( is_post_type_archive( "{$this->cpt}_services" ) || is_tax( "{$this->cpt}_services_category" ) ) {
					$medilink = 'services_archive';
				}				
				else {
					$medilink = 'blog';
				}

				RDTheme::$layout         		= RDTheme::$options[$medilink . '_layout'];
				RDTheme::$sidebar        		= RDTheme::$options[$medilink . '_sidebar'];
				RDTheme::$tr_header      		= RDTheme::$options['tr_header'];	
				RDTheme::$top_bar        		= RDTheme::$options['top_bar'];
				RDTheme::$top_bar_style  		= RDTheme::$options['top_bar_style'];			
				RDTheme::$header_style   		= RDTheme::$options['header_style'];
				RDTheme::$footer_style   		= RDTheme::$options['footer_style'];
				RDTheme::$padding_top    		= RDTheme::$options[$medilink . '_padding_top'];
				RDTheme::$padding_bottom 		= RDTheme::$options[$medilink . '_padding_bottom'];
				RDTheme::$has_banner     		= RDTheme::$options[$medilink . '_banner'];
				RDTheme::$has_breadcrumb 		= RDTheme::$options[$medilink . '_breadcrumb'];
				RDTheme::$bgtype         		= RDTheme::$options[$medilink . '_bgtype'];
				RDTheme::$bgcolor        		= RDTheme::$options[$medilink . '_bgcolor'];
				RDTheme::$inner_padding_top   	= RDTheme::$options[$medilink . '_inner_padding_top'];
				RDTheme::$inner_padding_bottom 	= RDTheme::$options[$medilink . '_inner_padding_bottom'];


				if( !empty( RDTheme::$options[$medilink . '_bgimg']['id'] ) ) {
					$attch_url      = wp_get_attachment_image_src( RDTheme::$options[$medilink . '_bgimg']['id'], 'full', true );
					RDTheme::$bgimg = $attch_url[0];
				} else {
					RDTheme::$bgimg = Helper::get_img( 'banner.jpg' );
				}
				if ( !is_active_sidebar( 'sidebar' ) ){
					RDTheme::$layout = 'full-width';
				}
			}
		}
	}
new Layouts;
