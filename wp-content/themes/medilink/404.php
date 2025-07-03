<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Medilink;

$rdtheme_error_img = empty( RDTheme::$options['error_bodybanner']['url'] ) ? Helper::get_img( '404.png' ) : RDTheme::$options['error_bodybanner']['url'];
?>
<?php get_header();?>
<div id="primary" class="content-area error-page-area">
	<div class="container">
		<div class="error-page error-box-layout1">
			<img src="<?php echo esc_url( $rdtheme_error_img );?>" alt="<?php esc_attr_e( '404', 'medilink' );?>">
			<h3 class="title"><?php echo esc_html( RDTheme::$options['error_text1'] );?></h3>
			<p><?php echo wp_kses_post( RDTheme::$options['error_text2'] );?></p>
			<a class="item-btn" href="<?php echo esc_url( home_url( '/' ) );?>"><?php echo esc_html( RDTheme::$options['error_buttontext'] );?></a>
		</div>
	</div>
</div>
<?php get_footer(); ?>