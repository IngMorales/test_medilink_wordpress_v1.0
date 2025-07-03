<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Medilink_Core;
use Elementor\Utils;
use Elementor\Group_Control_Image_Size;
?>
<div class="about-box-layout16 order-xl-1 order-lg-1">
	<div class="item-img">
	  <?php if( !empty( $data['about_hero_img']['id'] ) ) : ?>
	  <?php echo wp_get_attachment_image( $data['about_hero_img']['id'], 'full' ); ?>
	  <?php endif; ?>
	  <ul class="shape-list">
	  	<?php 
	  		foreach ($data['about_shape_lists']  as $shape_img ) { ?>
	    <li class="wow zoomIn" data-wow-delay=".1s">
	    	<?php echo wp_get_attachment_image($shape_img['about_shape_list_image']['id'], 'full', "", array("class" => $shape_img['about_image_motion_effect']) ); ?>
	    </li>
	    <?php } ?>
	  </ul>
	  <div class="about-box1">
	    <div class="about-content">
	      <?php if( !empty( $data['about_content_number']) ) : ?>
	      <div class="item-number"><?php echo esc_html($data['about_content_number']); ?></div>
	  	  <?php endif; ?>
	  	  <?php if( !empty( $data['about_content_title']) || !empty( $data['about_content_subtitle']) ) : ?>
	      <ul class="item-exprienced">
	        <li><?php echo esc_html( $data['about_content_title'] ); ?></li>
	        <li><?php echo esc_html( $data['about_content_subtitle'] ); ?></li>
	      </ul>
	  	  <?php endif; ?>
	    </div>
	  </div>
	</div>
</div>
