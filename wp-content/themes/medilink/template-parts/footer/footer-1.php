<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Medilink;
$rdtheme_socials = Helper::socials();
$rdtheme_footer_column = RDTheme::$options['footer_column'];
switch ( $rdtheme_footer_column ) {
	case '1':
	$rdtheme_footer_class = 'col-sm-12 col-xs-12 single-item';
	break;
	case '2':
	$rdtheme_footer_class = 'col-sm-6 col-xs-12 single-item';
	break;
	case '3':
	$rdtheme_footer_class = 'col-sm-4 col-xs-12 single-item';
	break;
	default:
	$rdtheme_footer_class = 'col-sm-6 col-md-6 col-lg-3 col-xs-12 single-item';
	break;
}
?>
</div><!-- #content -->

<!-- Footer Area Start Here -->
<footer>
	<div class="footer-layout1">
		<?php if ( Helper::has_footer() ): ?>
		    <section class="footer-top-wrap">
		        <div class="container">
		            <div class="row">
		            	<?php
							for ( $i = 1; $i <= $rdtheme_footer_column; $i++ ) {
								echo '<div class="' . esc_attr($rdtheme_footer_class) . '">';
								dynamic_sidebar( 'footer-'. $i );
								echo '</div>';
							}
							?>
		            </div>
		        </div>
		    </section>
	    <?php endif; ?>
		    <?php if ( RDTheme::$options['footer_bottom_area'] ): ?>
			    <section class="footer-center-wrap">
			        <div class="container">
			            <div class="row no-gutters">
			                <div class="col-lg-4 col-12">
			                 	<?php if ( $rdtheme_socials ): ?>					
			                    	<div class="footer-social">
				                        <ul>
				                        	<li><?php echo esc_attr( RDTheme::$options['social_label'] );?></li>
											<?php foreach ( $rdtheme_socials as $rdtheme_social ): ?>
												<li><a target="_blank" href="<?php echo esc_url( $rdtheme_social['url'] );?>"><i class="fa <?php echo esc_attr( $rdtheme_social['icon'] );?>"></i></a></li>
											<?php endforeach; ?>
				                        </ul>
				                    </div>
							   <?php endif; ?>
			                </div>
			                <div class="col-lg-8 col-12">	                   
			                   <?php dynamic_sidebar( 'footer-mailchimp'); ?>	                  
			                </div>
			            </div>
			        </div>
			    </section>
		    <?php endif; ?>
	    <?php if ( RDTheme::$options['copyright_area'] ): ?>
		    <section class="footer-bottom-wrap">
		        <div class="copyright"><?php echo wp_kses_post( RDTheme::$options['copyright_text'] );?></div>
		    </section>
	    <?php endif; ?>
	</div>
</footer>
<!-- Footer Area End Here -->
