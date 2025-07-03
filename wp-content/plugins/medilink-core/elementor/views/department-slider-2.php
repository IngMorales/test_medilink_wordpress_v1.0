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

<div class="departments-wrap-layout2 rc-carousel nav-control-layout-top <?php echo esc_attr( $class );?>">
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
				$bgimgid    = get_post_meta( $id, "medilink_icon_img", true );	
				$attch_url      = wp_get_attachment_image_src( $bgimgid, $thumb_size, true );
				$bgimg = $attch_url[0];					
				?>							
				<div class="rtin-item">
					<div class="departments-box-layout5">
						 <?php if ( has_post_thumbnail() ){ ?>   
					    <div class="item-img">
					          <?php  the_post_thumbnail( $thumb_size ); ?>
					        <div class="item-content">
					            <h3 class="item-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
					           <?php echo wp_kses_post( $content );?>
					            <a href="<?php the_permalink();?>" class="item-btn"><?php echo esc_html__( 'Detail', 'medilink-core' ); ?> <i class="fa fa-angle-right" aria-hidden="true"></i></a>
					        </div>
					    </div>
					 <?php  }else{ ?>
				 		<div class="item-img no-image">	         
					        <div class="item-content">
					            <h3 class="item-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
					            <?php echo wp_kses_post( $content );?>
					            <a href="<?php the_permalink();?>" class="item-btn"><?php echo wp_kses_post( $data['buttontext'] );?></a>
					        </div>
					    </div>
					<?php  } ?>
					</div>
				</div>
			<?php endwhile;?>
		<?php endif;?>
		<?php Helper::wp_reset_temp_query( $temp );?>
	</div>
</div>