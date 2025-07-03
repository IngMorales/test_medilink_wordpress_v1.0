<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\Medilink;

$medilink                               = MEDILINK_THEME_PREFIX;
$cpt                                    = MEDILINK_THEME_CPT_PREFIX;
$thumb_size  							= "{$medilink}-size3";
$id            							= get_the_id();   
$_department_services                   = get_post_meta( $id, "{$cpt}_department_services", true );
$_department_investigations             = get_post_meta( $id, "{$cpt}_department_investigations", true );
$_doctor                                = get_post_meta( $id, "{$cpt}_doctor", true );
$_doctor_c          					= count((array)$_doctor);
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>	 
    <div class="rtin-item">
        <div class="departments-box-layout1">
           <?php if ( has_post_thumbnail() ){ ?>                               
            <div class="item-img">
                  <?php  the_post_thumbnail( $thumb_size ); ?>
                <div class="item-btn-wrap">
                    <a href="<?php the_permalink();?>" class="item-btn"><?php echo esc_html__( 'Details', 'medilink' ); ?></a>
                </div>
            </div>
         <?php  } ?>
            <div class="item-content">
            <h3 class="item-title">
                <a href="<?php the_permalink();?>"><?php the_title();?></a>
            </h3>
             <?php if ( !empty( RDTheme::$options['departments_arc_doctors_display'] ) ): ?>          
                <ul class="department-info">
                    <li>
                        <i class="flaticon-doctor"></i>
                        <span><?php echo esc_html($_doctor_c);?></span> <?php echo esc_html__( 'Specialist Docotrs', 'medilink' ); ?>
                    </li>
                </ul>
              <?php endif;?>
            </div>
        </div>  
    </div>    
</article>