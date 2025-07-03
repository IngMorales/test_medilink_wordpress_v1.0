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
$col_class = "col-lg-{$data['col_lg']} col-md-{$data['col_md']} col-sm-{$data['col_sm']} col-xs-{$data['col_xs']}";
$temp = Helper::wp_set_temp_query( $query );

?>

<div class="rt-departments departments-wrap-layout1" data-settings='<?php echo json_encode( $data ); ?>' data-paged='1'>
    <div class="menu-list-wrapper">
            <?php if ( $query->have_posts() ) :?>
        <div class="row menu-list">
            <?php             
            while ( $query->have_posts() ) : $query->the_post();?>
            <?php
                $id            = get_the_id();   
                $_department_services                   = get_post_meta( $id, "{$cpt}_department_services", true );
                $_department_investigations             = get_post_meta( $id, "{$cpt}_department_investigations", true );
                $_doctor                               = get_post_meta( $id, "{$cpt}_doctor", true );
                $_doctor_c          = count((array)$_doctor);
                $buttontext         = $data['buttontext'];                   
                $content = Helper::get_current_post_content();
                $content = wp_trim_words( $content, $data['count'] ); 
                ?>            

                <div class="rtin-item <?php echo esc_attr( $col_class );?>">
                    <div class="departments-box-layout5">
                         <?php if ( has_post_thumbnail() ){ ?>   
                        <div class="item-img">
                              <?php  the_post_thumbnail( $thumb_size ); ?>
                            <div class="item-content">
                                <h3 class="item-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
                            <?Php if($data['count'] != "0"):?>
                                <p><?php echo wp_kses_post( $content );?></p>
                            <?php endif ?> 
                            <?php if ($data['detailbuttontext']): ?> 
                                <a href="<?php the_permalink();?>" class="item-btn"><?php echo esc_html( $data['detailbuttontext']); ?> <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                            <?php endif ?>  
                            </div>
                        </div>
                     <?php  }else{ ?>
                        <div class="item-img no-image">          
                            <div class="item-content">
                                <h3 class="item-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
                                <?php echo wp_kses_post( $content );?>
                                <a href="<?php the_permalink();?>" class="item-btn"><?php echo esc_html__( 'Learn More', 'medilink-core' ); ?> <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    <?php  } ?>
                    </div> 
                </div>              
            <?php endwhile;?>          
                    </div>   
                    <?php if ($buttontext): ?> 
                        <div class="loadmore loadmore-layout1 margin-t-20" data-count="4">
                            <a href="#" class="item-btn rt-loadmore"><?php echo esc_html( $buttontext);?><i class="fa fa-refresh" aria-hidden="true"></i></a>
                        </div>  
                     <?php endif ?>              
            <?php endif;?>
        <?php Helper::wp_reset_temp_query( $temp );?>
        </div>  
    </div>