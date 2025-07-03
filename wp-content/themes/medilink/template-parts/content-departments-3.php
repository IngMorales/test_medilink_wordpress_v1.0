<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\Medilink;

$medilink      = MEDILINK_THEME_PREFIX;
$cpt         = MEDILINK_THEME_CPT_PREFIX;
$thumb_size                             = "{$medilink}-size6";
$id                                     = get_the_id();   
$_department_services                   = get_post_meta( $id, "{$cpt}_department_services", true );
$_department_investigations             = get_post_meta( $id, "{$cpt}_department_investigations", true );
$_doctor                                = get_post_meta( $id, "{$cpt}_doctor", true );
$_icon_img                              = get_post_meta( $id, "{$cpt}_icon_img", true );
$_icon_img_url                          = get_the_post_thumbnail_url($_icon_img, 'thumbnail' );
$image_attributes                       = wp_get_attachment_image_src($_icon_img, $thumb_size );  

$_doctor_c              = count((array)$_doctor);
$content                = Helper::get_current_post_content();
$content                = wp_trim_words( $content, RDTheme::$options['departments_content_number'] );
$content                = "$content";
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>   
    <div class="departments-box-layout4">
        <div class="box-content">
            <?php if ($image_attributes[0]){ ?>             
                 <div class="icon-img"><img src="<?php echo esc_attr($image_attributes[0]); ?>" alt="<?php the_title_attribute();?>"></div>
            <?php } else { ?> 
                <div class="thumbnail-img"><?php  the_post_thumbnail( $thumb_size ); ?></div>
            <?php  } ?>
            <h3 class="item-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
             <?php echo wp_kses_post( $content );?>
        </div>
    </div>
</article>
