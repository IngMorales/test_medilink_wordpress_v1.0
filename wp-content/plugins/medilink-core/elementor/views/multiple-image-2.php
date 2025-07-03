<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Medilink_Core;
use Elementor\Utils;
use Elementor\Group_Control_Image_Size;
extract($data);

$img1 = Group_Control_Image_Size::get_attachment_image_html( $data, 'miimg1_size', 'miimg1' );
$img2 = Group_Control_Image_Size::get_attachment_image_html( $data, 'miimg2_size', 'miimg2' );
$img3 = Group_Control_Image_Size::get_attachment_image_html( $data, 'miimg3_size', 'miimg3' );

?>

<div class="miimg-holder2">
	<div class="image-holder-3">
		 <?php echo wp_kses_post( $img3 );?>
	</div>
	<div class="experience-holder  rt-paroller" data-paroller-factor="0.1" data-paroller-type="foreground" data-paroller-direction="vertical" data-paroller-transition="transform .2s linear" >
		<div class="media">			 
		   <div class="miyears"><?php echo wp_kses_post( $data['mi_years'] );?></div> 
		  <div class="media-body">
		    <h5 class="mt-0 sigtitle"> <?php echo wp_kses_post( $data['mi_title'] );?></h5>			
		  </div>
		</div>
	</div>
</div>



