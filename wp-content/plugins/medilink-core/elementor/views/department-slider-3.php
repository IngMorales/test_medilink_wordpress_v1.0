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

<div class="departments-wrap-layout2 rc-carousel nav-control-layout-top <?php echo esc_attr( $class );?>">
	<div class="owl-theme owl-carousel rt-owl-carousel " data-carousel-options="<?php echo esc_attr( $data['owl_data'] );?>">

		<?php if ( $query->have_posts() ) :			
			?>
			<?php while ( $query->have_posts() ) : $query->the_post();?>
				<?php	
				    $id                                     = get_the_id();                     
                    $_icon_img                              = get_post_meta( $id, "{$cpt}_icon_img", true );                    
                    $_icon_hover_img                        = get_post_meta( $id, "{$cpt}_icon_hover_img", true );
                    $buttontext         = $data['buttontext'];              
                    $content = Helper::get_current_post_content();
                    $content = wp_trim_words( $content, $data['count'] ); 
				?>							

				<div class="rtin-item">
					<div class="departments-box-layout4">
						<div class="box-content">							
								<?php if ($_icon_img){ ?>             
								<?php if ($_icon_hover_img){ ?> 
								    <div class="icon-img non-hover">
								    	<?php echo wp_get_attachment_image( $_icon_img,$thumb_size); ?>
								    </div>
								    <div class="icon-img hover">
								    	<?php echo wp_get_attachment_image( $_icon_hover_img,$thumb_size); ?>
								    </div>
								<?php } else { ?> 
								    <div class="icon-img">
								    	<?php echo wp_get_attachment_image( $_icon_img,$thumb_size); ?>
								    </div>
								<?php  } ?>
                                <?php } else { ?> 
                                    <div class="thumbnail-img"><?php  the_post_thumbnail( $thumb_size ); ?></div>
                                <?php  } ?>
							<h3 class="item-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
							<p><?php echo wp_kses_post( $content );?></p>
						</div>
						</div>
				</div>
			<?php endwhile;?>
		<?php endif;?>
		<?php Helper::wp_reset_temp_query( $temp );?>
	</div>
</div>