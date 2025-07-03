<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Medilink;
$rdtheme_socials = Helper::socials();


 if ( RDTheme::$options['social_icon'] ){
	$rdtheme_top_class = "col-md-9 col-lg-10";
 }else{
	$rdtheme_top_class = "col-sm-12";
 }
 if ( RDTheme::$header_style == '2' ){
	$fullwidth_compress = 'full-width-left-compress';
	$container = 'container-fluid';
}elseif( RDTheme::$header_style == '5' ){
	$fullwidth_compress = 'full-width-left-compress';
	$container = 'container-fluid';
}else{
	$container = 'container';
	$fullwidth_compress = 'full-width-compress-none';
}	
if ( RDTheme::$options['phone_has_mobile'] ){
	$phone_has_mobile = 'phone-has-mobile';
}
$phone_has_mobile  	= empty( RDTheme::$options['phone_has_mobile'] ) ? 'phone-has-mobile-off' : 'phone-has-mobile';
$phone_has_email  	= empty( RDTheme::$options['phone_has_email'] ) ? 'phone-has-email-off' : 'phone-has-email';
$phone_has_opening  = empty( RDTheme::$options['phone_has_opening'] ) ? 'phone-has-opening-off' : 'phone-has-opening';
$phone_has_address  = empty( RDTheme::$options['phone_has_address'] ) ? 'phone-has-address-off' : 'phone-has-address';
$phone_has_social   = empty( RDTheme::$options['phone_has_social'] ) ? 'phone-has-social-off' : 'phone-has-social';

?>
<div class="top-bar-layout-4 <?php echo esc_attr( $fullwidth_compress );?> <?php echo esc_attr( $phone_has_address );?> <?php echo esc_attr( $phone_has_mobile );?>   <?php echo esc_attr( $phone_has_social );?>" id="tophead">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-6">		
				<div class="tophead-contact header-contact-layout4 <?php echo esc_attr( $phone_has_address );?>">
					<ul>								
						<?php if ( RDTheme::$options['address'] ): ?>
						<li>
							 <i class="fas fa-map-marker-alt" aria-hidden="true"></i>
							 <span><?php echo esc_attr( RDTheme::$options['address_label'] );?> <?php echo wp_kses_post( RDTheme::$options['address'] );?></span>
						</li>
					<?php endif; ?>	
					</ul>
				</div>	
				</div>	
			<div class="col-sm-12 col-md-12 col-lg-6">
				<div class="tophead-right header-social-layout4 <?php echo esc_attr( $phone_has_mobile );?>">
					<?php if ( RDTheme::$options['phone'] ): ?>							
						<?php if ( RDTheme::$options['phone'] ): ?>
							<div class="phone-layout4 <?php echo esc_attr( $phone_has_mobile );?>">
								<i class="fas fa-phone" aria-hidden="true"></i><?php echo esc_attr( RDTheme::$options['phone_label'] );?>&nbsp;<a href="tel:<?php echo esc_attr( RDTheme::$options['phone'] );?>"><?php echo esc_html( RDTheme::$options['phone'] );?></a>
							</div>
						<?php endif; ?>						
					<?php endif; ?>

					<?php if ( $rdtheme_socials ): ?>
						<ul class="tophead-social4  <?php echo esc_attr( $phone_has_social );?>">
							
							<?php foreach ( $rdtheme_socials as $rdtheme_social ): ?>
								<li><a target="_blank" href="<?php echo esc_url( $rdtheme_social['url'] );?>"><i class="fab <?php echo esc_attr( $rdtheme_social['icon'] );?>"></i></a></li>
							<?php endforeach; ?>					
						</ul>						
					<?php endif; ?>
				</div>
				<div class="clear"></div>
			</div>
		</div>
	</div>
</div>