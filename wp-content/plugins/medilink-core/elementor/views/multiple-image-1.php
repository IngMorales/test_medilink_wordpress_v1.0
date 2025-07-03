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

<div class="miimg-holder">
	<div class="icon-holder rt-paroller" data-paroller-factor="0.1" data-paroller-type="foreground" data-paroller-direction="vertical" data-paroller-transition="transform .2s linear" >	
		<div class="icon-holder2">
			<div class="icon-holder3">
			<?php if ( $data['icontype'] == 'image' ): ?>
				<?php echo Group_Control_Image_Size::get_attachment_image_html( $data, 'icon_image_size', 'icon_image' );?>
			<?php else: ?>
				<i class="<?php echo esc_attr( $data['icon'] );?>" aria-hidden="true"></i>
			<?php endif; ?>
			</div>
		</div>		
	</div>
	<div class="row no-gutter12">
		<div class="col-12 col-sm-6">
			<div class="image-holder-1">
				 <?php echo wp_kses_post( $img1 );?>
			</div>
			<div class="image-holder-2">
				 <?php echo wp_kses_post( $img2 );?>
			</div>
		</div>
		<div class="col-12 col-sm-6">
			<div class="image-holder-3">
				 <?php echo wp_kses_post( $img3 );?>
			</div>
			<div class="experience-holder">
				<div class="media">			 
				   <div class="miyears"><?php echo wp_kses_post( $data['mi_years'] );?></div> 
				  <div class="media-body">
				    <h5 class="mt-0 sigtitle"> <?php echo wp_kses_post( $data['mi_title'] );?></h5>			
				  </div>
				</div>
			</div>
		</div>
	</div>
</div>



