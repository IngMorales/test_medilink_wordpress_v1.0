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

if ( RDTheme::$options['header_btn'] ){
$rdtheme_menu_width = 10 - $rdtheme_logo_width;
$rdtheme_logo_class = "col-sm-{$rdtheme_logo_width} col-xs-12";
$rdtheme_menu_class = "col-sm-{$rdtheme_menu_width} col-xs-12";
}else{
$rdtheme_menu_width = 12 - $rdtheme_logo_width;
$rdtheme_logo_class = "col-sm-{$rdtheme_logo_width} col-xs-12";
$rdtheme_menu_class = "col-sm-{$rdtheme_menu_width} col-xs-12";
}
?>
<div class="masthead-container header-style1 header-style7">
	<div class="container">
		<div class="row d-flex align-items-center no-gutter">
			<div class="<?php echo esc_attr( $rdtheme_logo_class );?>">
				<div class="site-branding">
					<a class="dark-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><?php echo wp_kses( $rdtheme_dark_logo, 'alltext_allow' );?></a>
					<a class="light-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><?php echo wp_kses( $rdtheme_light_logo, 'alltext_allow' );?></a>
				</div>
			</div>
			<div class="<?php echo esc_attr( $rdtheme_menu_class );?>">
				<?php get_template_part( 'template-parts/header/icon', 'area' );?>
				<div id="site-navigation" class="main-navigation">
					<?php wp_nav_menu( $nav_menu_args );?>
				</div>
			</div>
				<?php if ( RDTheme::$options['header_btn'] ): ?>
				<div class="col-lg-2 col-md-2 d-none d-lg-block">
					<div class="header-action-items gradient-btn">					  
					        <a href="<?php echo esc_url( RDTheme::$options['header_buttonUrl'] );?>" title="<?php echo esc_html( RDTheme::$options['header_buttontext'] );?>" class="gradient-accent gradient-light-to-dark button-default button-after-common gradient-after-dark-to-light btn-fill color-yellow btn-header">
					        <i class="fas fa-calendar-alt"></i> <?php echo esc_html( RDTheme::$options['header_buttontext'] );?></a>					   
					</div>
				</div>
			  <?php endif; ?>
		</div>		
	</div>
</div>