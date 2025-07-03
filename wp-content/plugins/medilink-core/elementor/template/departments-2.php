<?php 

namespace radiustheme\Medilink_Core;

use \WP_Query;
use radiustheme\Medilink\RDTheme;
use radiustheme\Medilink\Helper;

while ( $query->have_posts() ) : $query->the_post();?>
        <?php
		$id            = get_the_id();   
		$_department_services                   = get_post_meta( $id, "{$cpt}_department_services", true );
		$_department_investigations             = get_post_meta( $id, "{$cpt}_department_investigations", true );
		$_doctor                               = get_post_meta( $id, "{$cpt}_doctor", true );
		$_doctor_c          = count((array)$_doctor);
		$buttontext         = $data['buttontext'];
		$buttonurl          = $data['buttonurl']; 
		$content = Helper::get_current_post_content();
		$content = wp_trim_words( $content, $data['count'] );			

	?>

	<div class="rtin-item <?php echo esc_attr( $col_class );?> animated fadeInUp">
		<div class="departments-box-layout5">
                 <?php if ( has_post_thumbnail() ){ ?>   
                <div class="item-img">
                      <?php  the_post_thumbnail( $thumb_size ); ?>
                    <div class="item-content">
                        <h3 class="item-title title-bar-primary3"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
                        <p> <?php echo wp_kses_post( $content );?></p>
                        <a href="<?php the_permalink();?>" class="item-btn"><?php echo esc_html__( 'Detail', 'medilink-core' ); ?> <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                    </div>
                </div>
             <?php  }else{ ?>
                <div class="item-img no-image">          
                    <div class="item-content">
                        <h3 class="item-title title-bar-primary3"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
                        <?php echo wp_kses_post( $content );?>
                        <a href="<?php the_permalink();?>" class="item-btn"><?php echo esc_html__( 'Detail', 'medilink-core' ); ?> <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                    </div>
                </div>
            <?php  } ?>
            </div>   
	</div>              
<?php endwhile;

