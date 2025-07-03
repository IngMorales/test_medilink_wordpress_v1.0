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
$col_class = "col-lg-{$data['col_lg']} col-md-{$data['col_md']} col-sm-{$data['col_sm']} col-xs-{$data['col_xs']}";
$temp = Helper::wp_set_temp_query( $query );

?>

<div class="departments-wrap-layout2">
	<div class="row">
		<?php if ( $query->have_posts() ) :			
			?>

			<?php while ( $query->have_posts() ) : $query->the_post();?>
				<?php	
				    $id                                     = get_the_id();                     
                    $_icon_img                              = get_post_meta( $id, "{$cpt}_icon_img", true );                    
                    $_icon_hover_img                        = get_post_meta( $id, "{$cpt}_icon_hover_img", true );
                    $_icon_img_url                          = get_the_post_thumbnail_url($_icon_img, 'thumbnail' );
                    $image_attributes                       = wp_get_attachment_image_src($_icon_img, $thumb_size );  
                    $hover_image_attributes                 = wp_get_attachment_image_src($_icon_hover_img, $thumb_size ); 
                    $buttontext         = $data['buttontext'];              
                    $content = Helper::get_current_post_content();
                    $content = wp_trim_words( $content, $data['count'] ); 
				?>							

				<div class="rtin-item <?php echo esc_attr( $col_class );?>">
					<div class="departments-box-layout4">
						<div class="box-content">							
								<?php if ($image_attributes[0]){ ?>             
								<?php if ($hover_image_attributes[0]){ ?> 
								    <div class="icon-img non-hover"><img src="<?php echo esc_attr($image_attributes[0]); ?>" alt="<?php the_title();?>"></div>
								    <div class="icon-img hover"><img src="<?php echo esc_attr($hover_image_attributes[0]); ?>" alt="<?php the_title();?>"></div>
								<?php } else { ?> 
								    <div class="icon-img"><img src="<?php echo esc_attr($image_attributes[0]); ?>" alt="<?php the_title();?>"></div>
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