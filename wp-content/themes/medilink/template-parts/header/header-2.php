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

$rdtheme_logo_width = (int) RDTheme::$options['logo_width'];
$rdtheme_menu_width = 9 - $rdtheme_logo_width;
$rdtheme_logo_class = "col-sm-{$rdtheme_logo_width} col-xs-12";
$rdtheme_menu_class = "col-sm-{$rdtheme_menu_width} col-xs-12";
?>
<div class="masthead-container full-width-left-compress new-header-2">
	<div class="container-fluid">
		<div class="row no-gutters d-flex align-items-center">
			<div class="<?php echo esc_attr( $rdtheme_logo_class );?>">
				<div class="site-branding site-logo">
					<a class="dark-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><?php echo wp_kses( $rdtheme_dark_logo, 'alltext_allow' );?></a>
					<a class="light-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><?php echo wp_kses( $rdtheme_light_logo, 'alltext_allow' );?></a>
				</div>
			</div>
			<div class="<?php echo esc_attr( $rdtheme_menu_class );?>">		
				<div id="site-navigation" class="main-navigation">
					<?php wp_nav_menu( $nav_menu_args );?>
				</div>
			</div>
			<div class="col-lg-3 col-md-2 d-none d-lg-block">
				<?php if ( RDTheme::$options['header_btn'] ): ?>
					<ul class="header-action-items">
					    <li>
					        <a href="<?php echo esc_url( RDTheme::$options['header_buttonUrl'] );?>" title="<?php echo esc_html( RDTheme::$options['header_buttontext'] );?>" class="btn-fill color-yellow btn-header"><?php echo esc_html( RDTheme::$options['header_buttontext'] );?></a>
					    </li>
					</ul>
			  <?php endif; ?>
			</div>
		</div>		
	</div>
</div>