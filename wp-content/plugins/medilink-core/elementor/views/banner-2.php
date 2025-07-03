<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Medilink_Core;
use Elementor\Utils;
use Elementor\Group_Control_Image_Size;

$btn = $attr = '';
if ( !empty( $data['buttonurl']['url'] ) ) {
	$attr  = 'href="' . $data['buttonurl']['url'] . '"';
	$attr .= !empty( $data['buttonurl']['is_external'] ) ? ' target="_blank"' : '';
	$attr .= !empty( $data['buttonurl']['nofollow'] ) ? ' rel="nofollow"' : '';
	
}
if ( !empty( $data['buttontext'] ) ) {
	$btn = '<a class="item-btn" ' . $attr . '>' . $data['buttontext'] . '<i class="fas fa-angle-right"></i></a>';
}

$cpt = MEDILINK_CORE_CPT;
$grid_query= null;
$args = array(
  'post_type'   => $cpt.'_doctor',
  'post_status' => 'publish',
  'p'           =>  $data['single_doctor']
);
$grid_query = new \WP_Query( $args );

?>
<div class="main-banner-wrap2 motion-effects-wrap">
	<?php if( !empty( $data['banner_shape_lists'] ) ) : ?>
	<div class="shape-list">
	  <ul>
	   <?php 
	  		foreach ($data['banner_shape_lists']  as $shape_img ) { ?>
	  		<li><?php echo wp_get_attachment_image($shape_img['banner_shape_list_image']['id'], 'full', "", array("class" => $shape_img['banner_list_image_select_motion_effect']) ); ?></li>
	  	<?php } ?>
	  </ul>
	</div>
	<?php endif; ?>
	  <div class="row align-items-center">
	    <div class="col-lg-6">
	      <div class="main-banner-box1 main-banner-box4">
	      	<?php if( !empty( $data['banner_title'] ) ) : ?>
	        <div class="heading-title">
	          <h1><?php echo esc_html( $data['banner_title'] ); ?></h1>
	        </div>
	        <?php endif; if( !empty( $data['banner_content'] ) ) : ?>
	        <p><?php echo esc_html( $data['banner_content'] ); ?></p>
	        <?php endif; ?>
	        <?php if ( $btn ): ?>
	        <div class="item-button">
	          <?php echo wp_kses_post( $btn );?>
	        </div>
	        <?php endif; ?>
	      </div>
	    </div>
	    <div class="col-lg-6">
	      <div class="main-banner-box2 main-banner-box3 wow fadeInRight" data-wow-delay=".6s">
	        <div class="item-img">
	          <?php if( !empty( $data['banner_hero_img']['id'] ) ) : ?>
	        	<?php echo wp_get_attachment_image( $data['banner_hero_img']['id'], 'full' ); ?>
	          <?php endif; ?>
	          <?php if( !empty( $data['banner_img2']['id'] ) ) : ?>
	          <div class="circle-shape">
	            <?php echo wp_get_attachment_image( $data['banner_img2']['id'], 'full' ); ?>
	          </div>
	          <?php endif; ?>
	        </div>
	      </div>
	    </div>
	  </div>
</div>