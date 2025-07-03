<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */ 

namespace radiustheme\Medilink;
$nav_menu_args   = Helper::nav_menu_args();

$rdtheme_logo  =  empty(  RDTheme::$options['logo']['id'] ) ? '<img width="489" height="121" class="logo-small" alt="'.get_bloginfo( 'name' ).'" src="'.Helper::get_img( 'logo-dark.png' ).'">' :  wp_get_attachment_image(RDTheme::$options['logo']['id'],'full',"", array( "class" => "logo-small" ));
?>

<div class="rt-header-menu mean-container" id="meanmenu">
    <div class="mean-bar">
    	<a href="<?php echo esc_url(home_url('/'));?>"><?php echo wp_kses( $rdtheme_logo, 'alltext_allow' );?></a>

        <ul class="header-action-items">
           <?php if ( RDTheme::$options['header_btn'] ): ?> 
               <li class="phone-has-btn">
                  <a href="<?php echo esc_url( RDTheme::$options['header_buttonUrl'] );?>" class="btn-fill color-yellow btn-header"><?php echo esc_html( RDTheme::$options['header_buttontext'] );?></a>
               </li>
           <?php endif; ?>
           <li class="phone-search-btn">
                <?php if ( RDTheme::$options['search_icon'] ) {
                    get_template_part( 'template-parts/header/icon', 'search' );
                } ?>
           </li>
        </ul>

        <span class="sidebarBtn ">
            <span class="fa fa-bars">
            </span>
        </span>

    </div>

    <div class="rt-slide-nav">
        <div class="offscreen-navigation">
            <?php wp_nav_menu( $nav_menu_args );?>
        </div>
    </div>

</div>
