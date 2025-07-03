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
		'id'                    => $testimonial['image']['id'] ? $testimonial['image']['id'] : "",
		'title'        		   	=> $testimonial['title'],		
		'subtitle'     			=> $testimonial['subtitle'],		
		'content'        		=> $testimonial['content'],
		'rating'   				=> $testimonial['rating'],			
	);
} 

?>

<div class="owl-theme owl-carousel rt-owl-carousel dot-control-layout8" data-carousel-options="<?php echo esc_attr( $data['owl_data'] );?>">
	<?php foreach ( $testimonials as $testimonial ):?>
	<div class="testimonial-box-layout8">
		<div class="testimonial-layout-style-1 wow fadeInUp" data-wow-delay=".3s">
		  <div class="item-icon"><i class="fas fa-quote-left"></i></div>
		  <?php if( !empty( $testimonial['content'] ) ) : ?>
		  <p><?php echo wp_kses_post( $testimonial['content'] );?></p>
		  <?php endif; ?>
		  <div class="item-designation">
		  	<?php if ( !empty( $testimonial['id']) ): ?>
		    <div class="item-round-img">
		      <?php echo wp_get_attachment_image( $testimonial['id'],'full', "", array( "class" => "img-fulid rounded-circle" ) ); ?>
		    </div>
			<?php endif; ?>
		    <div class="item-content">
		      <?php if( !empty( $testimonial['title'] ) ) : ?>
		      <div class="item-title"><?php echo wp_kses_post( $testimonial['title'] );?></div>
		  	  <?php endif; if( !empty( $testimonial['subtitle'] ) ) : ?>
		      <div class="item-subtitle">
		        <?php echo wp_kses_post( $testimonial['subtitle'] );?>
		      </div>
		  	  <?php endif; ?>
		    </div>
		  </div>
		</div>
	</div>
	<?php endforeach; ?>
</div>







