<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Medilink;
use radiustheme\medilink\Helper;
global $post;
$medilink                   = MEDILINK_THEME_PREFIX;
$cpt                        = MEDILINK_THEME_CPT_PREFIX;
$thumb_size                 = "{$medilink}-size4";
$thumb_size6                = "{$medilink}-size6";
$id                         = get_the_id();   
$sub_title                 = get_post_meta( $id, "{$cpt}_sub_title", true );

?>
<div id="post-<?php the_ID(); ?>" <?php post_class( 'services-single' ); ?>>   
    <div class="row">
        <div class="col-lg-12">
            <div class="rtin-content-doctor d-content">
                 <?php  if(!empty($sub_title)){ ?> 
                     <h3 class="section-title title-bar-primary2"><?php echo esc_html($sub_title); ?></h3>
                 <?php }  ?> 
                <?php the_content();?>
            </div>
        </div>
    </div>
</div>