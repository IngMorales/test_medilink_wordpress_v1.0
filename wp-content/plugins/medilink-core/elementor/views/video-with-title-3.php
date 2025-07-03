<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Medilink_Core;

use radiustheme\Medilink\Helper;
$play_img = Helper::get_img( 'play.png' );
$size = MEDILINK_CORE_THEME . '-size3';
$img = wp_get_attachment_image( $data['image']['id'], $size );

?>

<div class="video-area-layout rtin-<?php echo esc_attr( $data['layout'] );?>">
	<div class="align-items-center media-none--md">
	    <div class="video-area overlay-primary80">
	    	 <?php if ( !empty(  $data['title'] ) ) { ?>
	        	 <h3 class="title-bold color-primary size-lg margin-b-20"><?php echo wp_kses_post( $data['title'] );?></h3>
	         <?php } ?>
	       <?php echo wp_kses_post($img); ?>		       
			<?php 
	       	if ( !empty( $data['videourl'] ) ) { ?>
	       		 <?php if ( !empty(  $data['title'] ) ) { ?>
			        <a class="play-btn popup-youtube rtin-<?php echo esc_attr( $data['layout'] );?>" href="<?php echo esc_url( $data['videourl']);?>">
			            <img width="60" height="60" src="<?php echo esc_url($play_img);?>" alt="play" class="img-fluid">
			        </a>
	          <?php }else{ ?>
					<a class="play-btn popup-youtube" href="<?php echo esc_url( $data['videourl']);?>">
					    <img width="60" height="60" src="<?php echo esc_url($play_img);?>" alt="play" class="img-fluid">
					</a>
	          <?php } ?>
	        <?php } ?>
	    </div>
	</div>
</div>