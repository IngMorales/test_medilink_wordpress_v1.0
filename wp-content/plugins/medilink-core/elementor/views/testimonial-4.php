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

<div class="owl-theme owl-carousel rt-owl-carousel dot-control-layout2 nav-control-layout3" data-carousel-options="<?php echo esc_attr( $data['owl_data'] );?>">

	<?php foreach ( $testimonials as $testimonial ):?>		
		<div class="testmonial-box-layout5">
			<?php if ( !empty( $testimonial['id']) ): ?>
			    <div class="item-img">
			    	 <?php echo wp_get_attachment_image( $testimonial['id'],'full', "", array( "class" => "img-fulid rounded-circle" ) ); ?>
			    </div>
		   	<?php endif; ?>
		    <div class="item-content">
		        <p><?php echo wp_kses_post( $testimonial['content'] );?></p>
		        <h3 class="item-title"><?php echo wp_kses_post( $testimonial['title'] );?></h3>
		        <h4 class="sub-title"><?php echo wp_kses_post( $testimonial['subtitle'] );?></h4>
		    </div>
		</div>
	<?php endforeach; ?>
</div>







