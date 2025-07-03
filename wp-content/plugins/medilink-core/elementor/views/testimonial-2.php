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

<div class="owl-theme owl-carousel rt-owl-carousel dot-control-layout2 nav-control-layout-top2 dot-margin" data-carousel-options="<?php echo esc_attr( $data['owl_data'] );?>">
	<?php 
	$count = 1;
	foreach ( $testimonials as $testimonial ):?>	
	<?php  echo ($count == 1 ) ? '<div class="item">' : ''; ?>	
		   	 <div class="testmonial-box-layout2">
		        <h3 class="item-title"><?php echo wp_kses_post( $testimonial['title'] );?> <span> / <?php echo wp_kses_post( $testimonial['subtitle'] );?></span></h3>
		      <p>"<?php echo wp_kses_post( $testimonial['content'] );?>"</p>
		    </div>   
		<?php  if($count == 2 || count($testimonials) == $count){
			echo "</div>";
			$count = 1;
		}else{
			$count++;
		}
		?>
	<?php endforeach; ?>
</div>

