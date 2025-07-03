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
$thumb_size  = "{$prefix}-size-new";

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

<div class="feature-wrap-layout1">
    <?php if ( $query->have_posts() ) :?>
    <div class="row">
        <?php
            $i = 0;
            $fbox_class = "";             
            while ( $query->have_posts() ) : $query->the_post();?>
            <?php
                $i++;
                $id                                     = get_the_id();   
                $_department_services                   = get_post_meta( $id, "{$cpt}_department_services", true );
                $_department_investigations             = get_post_meta( $id, "{$cpt}_department_investigations", true );
                $_doctor                                = get_post_meta( $id, "{$cpt}_doctor", true );
                $_icon_img                              = get_post_meta( $id, "{$cpt}_icon_img", true );                    
                $_icon_hover_img                        = get_post_meta( $id, "{$cpt}_icon_hover_img", true ); 
                $_doctor_c          = count((array)$_doctor);
                $buttontext         = $data['buttontext'];              
                $content = Helper::get_current_post_content();
                $content = wp_trim_words( $content, $data['count'] );
                if($i == 2){
                   $fbox_class = 'feature-box-layout4'; 
                }else if($i == 3){
                    $fbox_class = 'feature-box-layout5';
                }                   
        ?>

        <div class="<?php echo esc_attr( $col_class );?>">
          <div class="feature-box-layout8 <?php echo esc_attr( $fbox_class );?> wow zoomIn" data-wow-delay=".3s">
            <div class="item-content">
              <div class="item-title">
                <h3><?php the_title();?></h3>
              </div>
              <p><?php echo wp_kses_post( $content );?></p>
              <?php if ($data['detailbuttontext']): ?> 
              <div class="item-button">
                <a href="<?php the_permalink();?>" class="item-btn"><?php echo esc_html( $data['detailbuttontext']); ?><i class="fas fa-long-arrow-alt-right"></i></a>
              </div>
              <?php endif ?>
            </div>
            <div class="item-img">
              <a href="<?php the_permalink();?>"><?php  the_post_thumbnail( $thumb_size ); ?></a>
            </div>
            <div class="figure-img wow fadeInRight" data-wow-delay=".5s">
                <?php echo wp_get_attachment_image( $_icon_img,'full'); ?>
            </div>
          </div>
        </div>
        <?php endwhile;?>
    </div>
    <?php endif;?>
     <?php Helper::wp_reset_temp_query( $temp );?>
</div>

