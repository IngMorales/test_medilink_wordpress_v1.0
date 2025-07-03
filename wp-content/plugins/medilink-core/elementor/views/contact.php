<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Medilink_Core;

?>

<div class="rt-el-contact">
	<ul>
		<?php 
		if( $data['address'] ){
			?><li><i class="fas fa-map-marker"></i> <?php echo wp_kses_post( $data['address'] ); ?></li><?php
		}
		if( $data['phone1'] ){
			?><li><i class="fas fa-phone-square"></i> <a href="tel:<?php echo esc_attr( $data['phone1'] ); ?>"><?php echo esc_html( $data['phone1'] ); ?></a></li><?php
		}
		if( $data['phone2'] ){
			?><li><i class="fas fa-phone-square"></i> <a href="tel:<?php echo esc_attr( $data['phone2'] ); ?>"><?php echo esc_html( $data['phone2'] ); ?></a></li><?php
		}
		if( $data['fax'] ){
			?><li><i class="fa fa-fax" aria-hidden="true"></i> <?php echo esc_html( $data['fax'] ); ?></li><?php
		}
		if( $data['email'] ){
			?><li><i class="fa fa-envelope-o" aria-hidden="true"></i> <a href="mailto:<?php echo esc_attr( $data['email'] ); ?>"><?php echo esc_html( $data['email'] ); ?></a></li><?php
		}
		?>
	</ul>
</div>