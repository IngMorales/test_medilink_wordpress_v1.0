<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Medilink;

$rdtheme_socials = Helper::socials();
$nav_menu_args   = Helper::nav_menu_args();

// Logo
$rdtheme_dark_logo  = empty( RDTheme::$options['logo']['id'] ) ? '<img width="190" height="50" alt="'.get_bloginfo( 'name' ).'" src="'.Helper::get_img( 'logo-dark.png' ).'">' : wp_get_attachment_image(RDTheme::$options['logo']['id'],'full');
$rdtheme_light_logo = empty( RDTheme::$options['logo_light']['id'] ) ? '<img width="190" height="50" alt="'.get_bloginfo( 'name' ).'" src="'.Helper::get_img( 'logo-light.png' ).'">' : wp_get_attachment_image(RDTheme::$options['logo_light']['id'],'full');

$rdtheme_logo_width = (int) RDTheme::$options['logo_width'];
$rdtheme_menu_width = 12 - $rdtheme_logo_width;
$rdtheme_logo_class = "col-sm-{$rdtheme_logo_width} col-xs-12";
$rdtheme_menu_class = "col-sm-{$rdtheme_menu_width} col-xs-12";
?>
	<div class="header-top-bar layout-3 top-bar-border-bottom d-none d-md-block">
		<div class="container">
		    <div class="row">
		    	<div class="logo-area-layout2 <?php echo esc_attr( $rdtheme_logo_class );?>">	        
		           <div class="site-branding">
						<a class="dark-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><?php echo wp_kses( $rdtheme_dark_logo, 'alltext_allow' );?></a>
						<a class="light-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><?php echo wp_kses( $rdtheme_light_logo, 'alltext_allow' );?></a>
					</div>
		        </div>	
		        <div class="header-contact-layout3 <?php echo esc_attr( $rdtheme_menu_class );?>">
		            <ul class="contact-layout3-mid">
		            
					<?php if ( RDTheme::$options['phone'] ): ?>
					    <li>
					        <div class="media">
					            <i class="fas fa-phone"></i>
					            <div class="media-body space-sm">
					                <div class="title"><?php echo esc_attr( RDTheme::$options['phone_label'] );?></div>
					                <div class="info"><?php echo esc_attr( RDTheme::$options['phone'] );?></div>
					            </div>
					        </div>
					    </li>
					<?php endif; ?>		
					<?php if ( RDTheme::$options['address'] ): ?>
		                <li>
		                    <div class="media">
		                        <i class="fas fa-map-marker-alt"></i>
		                        <div class="media-body space-sm">
		                            <div class="title"><?php echo esc_attr( RDTheme::$options['address_label'] );?></div>
		                            <div class="info"><?php echo esc_attr( RDTheme::$options['address'] );?></div>
		                        </div>
		                    </div>
		                </li>
		            <?php endif; ?>
					<?php if ( RDTheme::$options['opening'] ): ?>
					    <li>
					        <div class="media">
					            <i class="far fa-clock"></i>
					            <div class="media-body space-sm">
					                <div class="title"><?php echo esc_attr( RDTheme::$options['opening_label'] );?></div>
					                <div class="info"><?php echo esc_attr( RDTheme::$options['opening'] );?></div>
					            </div>
					        </div>
					    </li>
					<?php endif; ?>	
					<?php if ( RDTheme::$options['header_btn'] ): ?>					
					    <li class="header-action-items">
					        <a href="<?php echo esc_url( RDTheme::$options['header_buttonUrl'] );?>" title="<?php echo esc_html( RDTheme::$options['header_buttontext'] );?>" class="btn-fill color-yellow btn-header"><?php echo esc_html( RDTheme::$options['header_buttontext'] );?> <i class="fa fa-angle-right" aria-hidden="true"></i></a>
					    </li>					
			  		<?php endif; ?>
		            </ul>
		        </div>
		    </div>
		</div>
	</div>
<div class="masthead-container">
	<div class="header-menu-area header-menu-layout2">		
		<div class="container">		
			<?php get_template_part( 'template-parts/header/icon', 'area' );?>
			<div id="site-navigation" class="main-navigation">
				<?php wp_nav_menu( $nav_menu_args );?>
			</div>
		</div>
	</div>
</div>