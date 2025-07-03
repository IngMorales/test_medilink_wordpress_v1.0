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
$thumb_size  = "{$prefix}-size6";

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

<div class="departments-wrap-layout4 rc-carousel nav-control-middle <?php echo esc_attr( $class );?>">
	<div class="owl-theme owl-carousel rt-owl-carousel " data-carousel-options="<?php echo esc_attr( $data['owl_data'] );?>">
		<?php if ( $query->have_posts() ) :			
			?>
			<?php while ( $query->have_posts() ) : $query->the_post();?>
				<?php			
				$id       = get_the_id();	
				$content  = Helper::get_current_post_content();
				$content  = wp_trim_words( $content, $data['count'] );
				$content  = "<p>$content</p>";
				$bgimgid    	= get_post_meta( $id, "medilink_icon_img", true );					
				?>
				<div class="rtin-item">
					 <div class="departments-box-layout4update gradient-btn">	                                         
						<?php if ( $bgimgid ){ ?>
		                      <div class="item-icon">
		                      	<?php echo wp_get_attachment_image( $bgimgid,$thumb_size); ?>
		                      </div>
						<?php  }elseif ( has_post_thumbnail()) { ?>
							 <div class="item-img"><?php  the_post_thumbnail( $thumb_size ); ?>	</div>
						<?php } ?>					
	                    <h3 class="item-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
	                     <?php echo wp_kses_post( $content );?>
	                     <?php if ( $data['departments_btn']): ?>
	                    	 <div class="gradient-btn">	      
	                    	 	<a class="gradient-accent gradient-light-to-dark button-default button-after-common gradient-after-dark-to-light" href="<?php the_permalink();?>">
	                    	 		<?php echo wp_kses_post( $data['buttontext'] );?> &nbsp; 
	                    	 		<i class="fas fa-angle-right"></i>
	                    	 </a>
	                    	</div>
	                    <?php endif; ?>				
	                </div>
                </div>
			<?php endwhile;?>
		<?php endif;?>
		<?php Helper::wp_reset_temp_query( $temp );?>
	</div>
</div>