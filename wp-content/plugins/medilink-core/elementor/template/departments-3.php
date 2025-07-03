<?php 

namespace radiustheme\Medilink_Core;

use \WP_Query;
use radiustheme\Medilink\RDTheme;
use radiustheme\Medilink\Helper;

while ( $query->have_posts() ) : $query->the_post();?>
    <?php
		$id                                     = get_the_id();   
		$_department_services                   = get_post_meta( $id, "{$cpt}_department_services", true );
		$_department_investigations             = get_post_meta( $id, "{$cpt}_department_investigations", true );
		$_doctor                                = get_post_meta( $id, "{$cpt}_doctor", true );
		$_icon_img                              = get_post_meta( $id, "{$cpt}_icon_img", true );
		$_icon_img_url                          = get_the_post_thumbnail_url($_icon_img, 'thumbnail' );
		$image_attributes                       = wp_get_attachment_image_src($_icon_img, $thumb_size ); 
		$_icon_hover_img                        = get_post_meta( $id, "{$cpt}_icon_hover_img", true );
		$hover_image_attributes                 = wp_get_attachment_image_src($_icon_hover_img, $thumb_size );
		$_doctor_c          = count((array)$_doctor);
		$buttontext         = $data['buttontext'];
		$buttonurl          = $data['buttonurl']; 
		$content = Helper::get_current_post_content();
		$content = wp_trim_words( $content, $data['count'] );

		?>

		<div class="rtin-item <?php echo esc_attr( $col_class );?> animated fadeInUp">
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
				    <?php echo wp_kses_post( $content );?>
				</div>
			</div>
		</div>              
	<?php endwhile;

