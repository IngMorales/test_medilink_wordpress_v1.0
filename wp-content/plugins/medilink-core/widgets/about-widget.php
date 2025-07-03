<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */


namespace radiustheme\Medilink_Core;


use \WP_Widget;
use \RT_Widget_Fields;


class About_Widget extends WP_Widget {

	public function __construct() {

		$id = 'medilink_about';

		parent::__construct(
            $id, // Base ID
            esc_html__( 'medilink: About', 'medilink-core' ), // Name
            array( 'description' => esc_html__( 'medilink: About Widget', 'medilink-core' )
            	) );

	}


	public function widget( $args, $instance ){

		echo wp_kses_post( $args['before_widget'] );

		if ( !empty( $instance['logo'] ) ) {
			$html = '<div class="footer-logo"><a class="footer-widget-logo" href="'. esc_url( home_url( '/' ) ) . '">'. wp_get_attachment_image( $instance['logo'], 'full' ) .'</a></div>';
		}
		elseif ( !empty( $instance['title'] ) ) {
			$html = apply_filters( 'widget_title', $instance['title'] );
			$html = $args['before_title'] . $html .$args['after_title'];
		}
		else {
			$html = '';
		}

		echo wp_kses_post( $html );

		?>

		<div class="footer-about"><p class="rtin-des"><?php if( !empty( $instance['description'] ) ) echo wp_kses_post( $instance['description'] ); ?></p></div>
		<div class="footer-contact-info">	
			<ul>
				<?php 
				if( !empty( $instance['address'] ) ){
					?><li><i class="fas fa-map-marker-alt" aria-hidden="true"></i><?php echo wp_kses_post( $instance['address'] ); ?></li><?php
				}
				if( !empty( $instance['phone'] ) ){
					?><li><i class="fas fa-phone" aria-hidden="true"></i> <a href="tel:<?php echo esc_attr( $instance['phone'] ); ?>"><?php echo esc_html( $instance['phone'] ); ?></a></li><?php
				}
				if( !empty( $instance['phone2'] ) ){
					?><li><i class="fas fa-phone" aria-hidden="true"></i> <a href="tel:<?php echo esc_attr( $instance['phone2'] ); ?>"><?php echo esc_html( $instance['phone2'] ); ?></a></li><?php
				}
				if( !empty( $instance['fax'] ) ){
					?><li><i class="fas fa-fax" aria-hidden="true"></i> <?php echo esc_html( $instance['fax'] ); ?></li><?php
				}
				if( !empty( $instance['email'] ) ){
					?><li><i class="far fa-envelope" aria-hidden="true"></i> <a href="mailto:<?php echo esc_attr( $instance['email'] ); ?>"><?php echo esc_html( $instance['email'] ); ?></a></li><?php
				}
				?>
			</ul>
		</div>
		<div class="footer-social">
		<ul>
			<?php
			if( !empty( $instance['facebook'] ) ){
				?><li><a href="<?php echo esc_url( $instance['facebook'] ); ?>" target="_blank"><i class="fab fa-facebook-f"></i></a></li><?php
			}
			if( !empty( $instance['twitter'] ) ){
				?><li><a href="<?php echo esc_url( $instance['twitter'] ); ?>" target="_blank"><i class="fab fa-twitter"></i></a></li><?php
			}
			if( !empty( $instance['gplus'] ) ){
				?><li><a href="<?php echo esc_url( $instance['gplus'] ); ?>" target="_blank"><i class="fab fa-google-plus"></i></a></li><?php
			}
			if( !empty( $instance['linkedin'] ) ){
				?><li><a href="<?php echo esc_url( $instance['linkedin'] ); ?>" target="_blank"><i class="fab fa-linkedin"></i></a></li><?php
			}
			if( !empty( $instance['pinterest'] ) ){
				?><li><a href="<?php echo esc_url( $instance['pinterest'] ); ?>" target="_blank"><i class="fab fa-pinterest"></i></a></li><?php
			}
			if( !empty( $instance['rss'] ) ){
				?><li><a href="<?php echo esc_url( $instance['rss'] ); ?>" target="_blank"><i class="fa fa-rss"></i></a></li><?php
			}
			if( !empty( $instance['instagram'] ) ){
				?><li><a href="<?php echo esc_url( $instance['instagram'] ); ?>" target="_blank"><i class="fab fa-instagram"></i></a></li><?php
			}
			?>
		</ul>
	</div>
		<?php
		echo wp_kses_post( $args['after_widget'] );
	}


	public function update( $new_instance, $old_instance ){
		$instance                  = array();
		$instance['title']         = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['logo']          = ( ! empty( $new_instance['logo'] ) ) ? sanitize_text_field( $new_instance['logo'] ) : '';
		$instance['description']   = ( ! empty( $new_instance['description'] ) ) ? wp_kses_post( $new_instance['description'] ) : '';
		$instance['address']   = ( ! empty( $new_instance['address'] ) ) ? wp_kses_post( $new_instance['address'] ) : '';
		$instance['phone']     = ( ! empty( $new_instance['phone'] ) ) ? sanitize_text_field( $new_instance['phone'] ) : '';
		$instance['phone2']    = ( ! empty( $new_instance['phone2'] ) ) ? sanitize_text_field( $new_instance['phone2'] ) : '';
		$instance['email']     = ( ! empty( $new_instance['email'] ) ) ? sanitize_email( $new_instance['email'] ) : '';
		$instance['fax']       = ( ! empty( $new_instance['fax'] ) ) ? sanitize_text_field( $new_instance['fax'] ) : '';
		$instance['facebook']      = ( ! empty( $new_instance['facebook'] ) ) ? sanitize_text_field( $new_instance['facebook'] ) : '';
		$instance['twitter']       = ( ! empty( $new_instance['twitter'] ) ) ? sanitize_text_field( $new_instance['twitter'] ) : '';
		$instance['gplus']         = ( ! empty( $new_instance['gplus'] ) ) ? sanitize_text_field( $new_instance['gplus'] ) : '';
		$instance['linkedin']      = ( ! empty( $new_instance['linkedin'] ) ) ? sanitize_text_field( $new_instance['linkedin'] ) : '';
		$instance['pinterest']     = ( ! empty( $new_instance['pinterest'] ) ) ? sanitize_text_field( $new_instance['pinterest'] ) : '';
		$instance['rss']           = ( ! empty( $new_instance['rss'] ) ) ? sanitize_text_field( $new_instance['rss'] ) : '';
		$instance['instagram']     = ( ! empty( $new_instance['instagram'] ) ) ? sanitize_text_field( $new_instance['instagram'] ) : '';
		return $instance;
	}


	public function form( $instance ){
		$defaults = array(
			'title'         => '',
			'logo'          => '',
			'description'   => '',
			'address' 		=> '',
			'phone'   		=> '',
			'phone2'  		=> '',
			'email'   		=> '',
			'fax'     		=> '',
			'facebook'      => '',
			'twitter'       => '',
			'gplus'         => '',
			'linkedin'      => '',
			'pinterest'     => '',
			'rss'           => '', 
			'instagram'     => ''
		);

		$instance = wp_parse_args( (array) $instance, $defaults );

		$fields = array(
			'title'       => array(
				'label'   => esc_html__( 'Title', 'medilink-core' ),
				'type'    => 'text',
			),
			'logo'        => array(
				'label'   => esc_html__( 'Logo', 'medilink-core' ),
				'type'    => 'image',
			),
			'description' => array(
				'label'   => esc_html__( 'Description', 'medilink-core' ),
				'type'    => 'textarea',
			),
			'address'   => array(
				'label' => esc_html__( 'Address', 'medilink-core' ),
				'type'  => 'textarea',
			),
			'phone'     => array(
				'label' => esc_html__( 'Phone 1', 'medilink-core' ),
				'type'  => 'text',
			),
			'phone2'    => array(
				'label' => esc_html__( 'Phone 2', 'medilink-core' ),
				'type'  => 'text',
			),
			'fax'       => array(
				'label' => esc_html__( 'Fax', 'medilink-core' ),
				'type'  => 'text',
			),
			'email'     => array(
				'label' => esc_html__( 'Email', 'medilink-core' ),
				'type'  => 'text',
			),
			'facebook'    => array(
				'label'   => esc_html__( 'Facebook URL', 'medilink-core' ),
				'type'    => 'url',
			),
			'twitter'     => array(
				'label'   => esc_html__( 'Twitter URL', 'medilink-core' ),
				'type'    => 'url',
			),
			'gplus'       => array(
				'label'   => esc_html__( 'Google Plus URL', 'medilink-core' ),
				'type'    => 'url',
			),
			'linkedin'    => array(
				'label'   => esc_html__( 'Linkedin URL', 'medilink-core' ),
				'type'    => 'url',
			),
			'pinterest'   => array(
				'label'   => esc_html__( 'Pinterest URL', 'medilink-core' ),
				'type'    => 'url',
			),
			'rss'         => array(
				'label'   => esc_html__( 'Rss Feed URL', 'medilink-core' ),
				'type'    => 'url',
			),
			'instagram'   => array(
				'label'   => esc_html__( 'Instagram URL', 'medilink-core' ),
				'type'    => 'url',
			),
		);

		RT_Widget_Fields::display( $fields, $instance, $this );
	}
}