<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\Medilink;
$nav_menu_args = Helper::nav_menu_args();
// Logo
$rdtheme_dark_logo  = empty( RDTheme::$options['logo']['id'] ) ? '<img width="190" height="50" alt="'.get_bloginfo( 'name' ).'" src="'.Helper::get_img( 'logo-dark.png' ).'">' : wp_get_attachment_image(RDTheme::$options['logo']['id'],'full');
$rdtheme_light_logo = empty( RDTheme::$options['logo_light']['id'] ) ? '<img width="190" height="50" alt="'.get_bloginfo( 'name' ).'" src="'.Helper::get_img( 'logo-light.png' ).'">' : wp_get_attachment_image(RDTheme::$options['logo_light']['id'],'full');
?>
<div class="masthead-container">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-2 col-md-3 d-none d-lg-block">
				<div class="site-branding">
					<a class="dark-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><?php echo wp_kses( $rdtheme_dark_logo, 'alltext_allow' );?></a>
					<a class="light-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><?php echo wp_kses( $rdtheme_light_logo, 'alltext_allow' );?></a>
				</div>
			</div>
		<div class="col-lg-10 col-md-9 d-none d-lg-block">
			<div id="site-navigation" class="main-navigation">
				<?php wp_nav_menu( $nav_menu_args );?>
			</div>
		</div>
	  </div>
	</div>
</div>