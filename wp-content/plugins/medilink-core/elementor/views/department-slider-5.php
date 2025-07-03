<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Medilink_Core;

use \WP_Query;
use radiustheme\Medilink\RDTheme;
use radiustheme\Medilink\Helper;

$prefix      = MEDILINK_CORE_THEME;
$cpt         = MEDILINK_CORE_CPT;
$thumb_size  = "{$prefix}-size3";

$args = array(
    'post_type'      => "{$cpt}_departments",
    'posts_per_page' => $data['number'],
    'orderby'        => $data['orderby'],
    'paged' => 1
);

if ( !empty( $data['cat'] ) ) {

    $args['tax_query'] = array(
        array(
            'taxonomy' => "{$cpt}_departments_category",
            'field' => 'term_id',
            'terms' => $data['cat'],
        )
    );
}

switch ( $data['orderby'] ) {
    case 'title':
    case 'menu_order':
    $args['order'] = 'ASC';
    break;
}

$query = new WP_Query( $args );
$class = $data['slider_nav'] == 'yes' ? ' slider-nav-enabled' : '';
$temp = Helper::wp_set_temp_query( $query );

?>

<div class="departments-wrap-layout5 rc-carousel nav-control-middle <?php echo esc_attr( $class );?>">
	<div class="owl-theme owl-carousel rt-owl-carousel " data-carousel-options="<?php echo esc_attr( $data['owl_data'] );?>">
		<?php if ( $query->have_posts() ) :
			$counter = 1;   
			?>

			<?php while ( $query->have_posts() ) : $query->the_post();?>
				<?php
				$counter2 = $counter++;
				$id       = get_the_id();	
				$content  = Helper::get_current_post_content();
				$content  = wp_trim_words( $content, $data['count'] );
				$content  = "<p>$content</p>";
				$bgimgid    	= get_post_meta( $id, "medilink_icon_img", true );	
				$attch_url      = wp_get_attachment_image_src( $bgimgid, $thumb_size, true );
				$bgimg 			= $attch_url[0];	
				$bgimgid                = get_post_meta( $id, "medilink_icon_img", true );  
				$icon_hoverimg_id       = get_post_meta( $id, "{$cpt}_icon_hover_img", true ); 
				$attch_url              = wp_get_attachment_image_src( $bgimgid, $thumb_size, true );
				$hover_image_url        = wp_get_attachment_image_src( $icon_hoverimg_id, $thumb_size, true );
				$bgimg                  = $attch_url[0];     
				$bgimghover             = $hover_image_url[0];     
				$bgimgid_holder         = '';
				$bgimgid_hover_holder   = '';
				if ( $bgimgid ){
				if ($hover_image_url){  
                  $bgimgid_holder       = wp_get_attachment_image( $bgimgid, $thumb_size, "", array( "class" => "icon-image non-hover" ));
                  $bgimgid_hover_holder = wp_get_attachment_image( $icon_hoverimg_id, $thumb_size, "", array( "class" => "icon-image hover" ));
				} else { 
                    $bgimgid_holder       = wp_get_attachment_image( $bgimgid, $thumb_size, "", array( "class" => "icon-image non-hover" ));;
                    $bgimgid_hover_holder = get_the_post_thumbnail( $id, $thumb_size2 );
				}
				}elseif ( has_post_thumbnail()) {                           
					$bgimgid_holder = get_the_post_thumbnail( $id, $thumb_size );
				} 
			?>
				<div class="rtin-item">
					 <div class="departments5-image-box">					 	
						<?php if( has_post_thumbnail()) { ?>
							 <div class="item-img"><a href="<?php the_permalink();?>"><?php  the_post_thumbnail( $thumb_size ); ?></a></div>
						<?php } ?>		
					 </div>
					 <div class="departments5-box-layout8">	                                       
						<?php if ( $bgimgid ){ 
		                      echo '<div class="item-icon">'. $bgimgid_holder .' '. $bgimgid_hover_holder .'</div>';						
						} ?>		
	                    <h3 class="item-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
	                     <div class="departments5-content"><?php echo wp_kses_post( $content );?></div>
	                     <?php if ( $data['departments_btn']): ?>
	                    	<a class="item-btn" href="<?php the_permalink();?>"><?php echo wp_kses_post( $data['buttontext'] );?> <i class="fa fa-angle-right"></i></a>
	                    <?php endif; ?>				
	                </div>
                </div>
			<?php endwhile;?>
		<?php endif;?>
		<?php Helper::wp_reset_temp_query( $temp );?>
	</div>
</div>