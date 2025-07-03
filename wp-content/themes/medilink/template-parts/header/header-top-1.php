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
$phone_has_social  = empty( RDTheme::$options['phone_has_social'] ) ? 'phone-has-social-off' : 'phone-has-social';


?>
	<div class="header-top-bar rt-header-top-bar <?php echo esc_attr( $fullwidth_compress );?> <?php echo esc_attr( $phone_has_address );?> <?php echo esc_attr( $phone_has_mobile );?> <?php echo esc_attr( $phone_has_email );?> <?php echo esc_attr( $phone_has_opening );?> <?php echo esc_attr( $phone_has_social );?>" id="tophead">
		<div class="<?php echo esc_attr( $container );?>"> 
			<div class="row no-gutter">

				<div class="<?php echo esc_attr( $rdtheme_top_class );?>">
					<div class="rt-tophead-contact">
						<ul>
						<?php if ( RDTheme::$options['address'] ): ?>
							<li class="<?php echo esc_attr( $phone_has_address );?>">
								<i class="fas fa-map-marker-alt" aria-hidden="true"></i><span><?php echo wp_kses_post( RDTheme::$options['address'] );?></span>
							</li>
						<?php endif; ?>	
						<?php if ( RDTheme::$options['phone'] ): ?>
							<li class="<?php echo esc_attr( $phone_has_mobile );?>">
								<i class="fas fa-phone" aria-hidden="true"></i><?php echo esc_attr( RDTheme::$options['phone_label'] );?>&nbsp;<a href="tel:<?php echo esc_attr( RDTheme::$options['phone'] );?>"><?php echo esc_html( RDTheme::$options['phone'] );?></a>
							</li>
						<?php endif; ?>
						<?php if ( RDTheme::$options['email'] ): ?>
							<li class="<?php echo esc_attr( $phone_has_email );?>">
								<i class="fa fa-envelope-o" aria-hidden="true"></i><a href="mailto:<?php echo esc_attr( RDTheme::$options['email'] );?>"><?php echo esc_html( RDTheme::$options['email'] );?></a>
							</li>
						<?php endif; ?>																
							<?php if ( RDTheme::$options['opening'] ): ?>
								<li class="<?php echo esc_attr( $phone_has_opening );?>">
									<i class="far fa-clock" aria-hidden="true"></i> <span class="opening-label"><?php echo esc_html( RDTheme::$options['opening_label'] );?> &nbsp;</span> <?php echo esc_html( RDTheme::$options['opening'] );?>
								</li>
							<?php endif; ?>
						</ul>
					</div>
				</div>
					
			<?php if ( RDTheme::$options['social_icon'] ): ?>
				<?php if (  !empty($rdtheme_socials)): ?>
					<div class="col-md-3 col-lg-2 col-xs-12  tophead-right header-social-layout1  <?php echo esc_attr( $phone_has_social );?>">
							<ul class="tophead-social">
								<?php foreach ( $rdtheme_socials as $rdtheme_social ): ?>
									<li><a target="_blank" href="<?php echo esc_url( $rdtheme_social['url'] );?>"><i class="fab <?php echo esc_attr( $rdtheme_social['icon'] );?>"></i></a></li>
								<?php endforeach; ?>					
							</ul>						
					</div>
				<?php endif; ?>
			<?php endif; ?>			
			</div>
		</div>
	</div>