<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Medilink;
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="profile" href="https://gmpg.org/xfn/11">	
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<?php	
		// Preloader
		if ( RDTheme::$options['preloader'] ) {
			if ( !empty( RDTheme::$options['preloader_image']['url'] ) ) {
				$preloader_img = RDTheme::$options['preloader_image']['url'];
				echo '<div id="preloader" style="background-image:url(' . esc_url( $preloader_img ) . ');"></div>';			
			}
		}       
	?>
	<div id="page" class="site site-wrp">
		<a class="skip-link screen-reader-text" href="#content">
			<?php esc_html_e( 'Skip to content', 'medilink' ); ?></a>	
				<?php			
					if ( RDTheme::$options['mobile_header_style'] == 2 ){  ?>
						<div class="mobile-new-header-option">
							<div class="mobile-top-menu">
								<?php if ( RDTheme::$top_bar == 1 || RDTheme::$top_bar == 'on' ){
									get_template_part( 'template-parts/header/header-top', RDTheme::$top_bar_style );
								} ?>
							</div>	
						</div>					  
					<?php } ?>
						<header id="masthead" class="site-header mobile-menu-open">
							<?php			
								if ( RDTheme::$top_bar == 1 || RDTheme::$top_bar == 'on' ){
									get_template_part( 'template-parts/header/header-top', RDTheme::$top_bar_style );
								}	
								get_template_part( 'template-parts/header/header', RDTheme::$header_style );
							?>
						</header>	

						<?php get_template_part('template-parts/header/header', 'offscreen');?>						
				<div id="content" class="site-content">
					<?php get_template_part('template-parts/content', 'banner');?>