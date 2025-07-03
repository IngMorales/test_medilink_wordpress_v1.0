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
<div class="main-banner-wrap1 motion-effects-wrap">
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
    <div class="col-lg-5">
      <div class="main-banner-box1">
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
    <div class="col-lg-7">
      <div class="main-banner-box2">
        <div class="item-img">
        	<?php if( !empty( $data['banner_hero_img']['id'] ) ) : ?>
        	<?php echo wp_get_attachment_image( $data['banner_hero_img']['id'], 'full' ); ?>
        	<?php endif; ?>
          <?php if ( $grid_query->have_posts() ): ?>
          	<?php
			    while ( $grid_query->have_posts() ) : $grid_query->the_post();
			 ?>
          <div class="img-box1">
          	<?php if( has_post_thumbnail() ) : ?>
          	<div class="doctor-img">
          		<?php the_post_thumbnail();?>
          	</div>
          	<?php endif; ?>
          	<div class="banner-doctor-content">
          		<h3><?php the_title(); ?></h3>
          		<div class="line1"></div>
          		<div class="line2"></div>
          	</div>		
          </div>
          <?php endwhile; wp_reset_postdata(); ?>
      	  <?php endif; ?>
          <div class="img-box2">
            <div class="banner-pabox-left">
            	<?php if( !empty($data['banner_patient_qty']) ) : ?>
            	<h2><?php echo esc_html( $data['banner_patient_qty'] ); ?></h2>
            	<?php endif; ?>
            </div>
            <div class="banner-pabox-right">
            	<?php if( !empty($data['banner_patient_title']) ) : ?>
            	<h3><?php echo esc_html( $data['banner_patient_title'] ); ?></h3>
            	<?php endif; ?>
            	<div class="line1"></div>
          		<div class="line2"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>