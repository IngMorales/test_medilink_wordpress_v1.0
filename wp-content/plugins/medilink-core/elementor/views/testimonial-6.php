<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Medilink_Core;

use radiustheme\Medilink\Helper;
$testimonials = array();

foreach ( $data['testimonials'] as $testimonial ) {
	$testimonials[] = array(
		'id'           			=> 'testimonial-' . time().rand( 1, 99 ),
		'image'        		 	=> $testimonial['image']['url'] ? $testimonial['image']['url'] : "",
		'title'        		   	=> $testimonial['title'],		
		'subtitle'     			=> $testimonial['subtitle'],		
		'content'        		=> $testimonial['content'],
		'rating'   				=> $testimonial['rating'],			
	);
}

?>

<div class="testmonial-box-layout3new">
	<div class="owl-theme owl-carousel rt-owl-carousel dot-control-layout2 nav-control-layout2" data-carousel-options="<?php echo esc_attr( $data['owl_data'] );?>">
		<?php foreach ( $testimonials as $testimonial ):?>
		<div class="rtin-item">
			<div class="testimonial-item">					
				<div class="media">
					<?php if ( $testimonial['image'] ): ?>
						<div class="rtin-thumb"> 
							<img src="<?php echo esc_url( $testimonial['image'] );?>" class="img-fulid rounded-circle" alt="<?php echo wp_kses_post( $testimonial['title'] );?>">
						</div>
					<?php endif; ?>
					<div class="media-body">
						<div class="rtin-header">
							<h3 class="rtin-title"><?php echo wp_kses_post( $testimonial['title'] );?></h3>
							<?php if ( $testimonial['subtitle']): ?>
								<h4 class="rtin-designation"><?php echo wp_kses_post( $testimonial['subtitle'] );?></h4>
							<?php endif; ?>								
						</div>												
					</div>					
				</div>
				<div class="rtin-content"><p><?php echo wp_kses_post( $testimonial['content'] );?></p></div>	
					<div class="testimonial-quote-icon">
						<span class="quote-right-code">&nbsp;</span>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</div>



