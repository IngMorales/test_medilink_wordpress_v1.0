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

$shapeimg1 = wp_get_attachment_image( $data['shapeimg1']['id'], 'full' );
$shapeimg2 = wp_get_attachment_image( $data['shapeimg2']['id'], 'full' );
$shapeimg3 = wp_get_attachment_image( $data['shapeimg3']['id'], 'full' );
?>

<div class="rt-test-wrapper">
	<div class="row">
	   <div class="col-12">
	      <div class="slider-for">
	      	<?php foreach ( $testimonials as $testimonial ):?>
	         <div class="test-item">
	           <div class="row align-items-center">
	             <div class="col-lg-5">
	               <div class="testimonial-shape-img">
	                  <img src="<?php echo esc_url( $testimonial['image'] );?>" alt="<?php echo wp_kses_post( $testimonial['title'] );?>" />
	                    <ul class="shape-list-1">
	                    <?php if (!empty( $shapeimg1 ) ) : ?>
	                      <li><?php echo wp_kses_post( $shapeimg1 );?></li>
	                    <?php endif; if( !empty( $shapeimg2 ) ) : ?>
	                      <li><?php echo wp_kses_post( $shapeimg2 );?></li>
	                    <?php endif; if( !empty( $shapeimg3 ) ) : ?>
	                      <li><?php echo wp_kses_post( $shapeimg3 );?></li>
	                    <?php endif; ?>
	                    </ul>
	                </div>
	             </div>
	             <div class="col-lg-7">
	               <div class="testimonial-box-layout7">
	                 <div class="figure-icon">
	                   	<?php if ( $data['icontype'] == 'image' ): ?>
						<?php echo wp_get_attachment_image( $data['image']['id'] );?>
						<?php else: ?>
							<i class="<?php echo esc_attr( $data['icon_color'] );?> <?php echo esc_attr( $data['icon'] );?>" aria-hidden="true"></i>
						<?php endif; ?>
	                 </div>
	                 <p><?php echo wp_kses_post( $testimonial['content'] );?></p>
	                 <h3 class="item-title"><?php echo wp_kses_post( $testimonial['title'] );?></h3>
	                 <?php if ( $testimonial['subtitle']): ?>
	                 <h4 class="item-subtitle"><?php echo wp_kses_post( $testimonial['subtitle'] );?></h4>
	                 <?php endif; ?>
	               </div>
	             </div>
	           </div>
	         </div>
	         <?php endforeach; ?>
	       </div>
	   </div>
	</div>
	<div class="row justify-content-end">
	   <div class="col-lg-7">
	      <div class="row">
	         <div class="col-lg-9">
	            <div class="rt-slider-thumb-area">
	               <div class="slider-nav">
	               	<?php foreach ( $testimonials as $testimonial ):
	               		$img = attachment_url_to_postid( $testimonial['image'] );
	               	?>
	                    <div class="rt-slider-thumb-item">
	                    	<?php echo wp_get_attachment_image( $img, 'full' );?>
	                    </div>
	                <?php endforeach; ?>
	                </div>
	            </div> 
	        </div>
	      </div>
	   </div>
	</div>
</div>    


						
					
