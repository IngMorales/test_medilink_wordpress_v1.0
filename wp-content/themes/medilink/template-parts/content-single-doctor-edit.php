<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\Medilink;
use radiustheme\medilink\Helper;
global $post;
$medilink                         = MEDILINK_THEME_PREFIX;
$cpt                            = MEDILINK_THEME_CPT_PREFIX;
$thumb_size                     = "{$medilink}-size4";
$thumb_size6                    = "{$medilink}-size6";
$id                             = get_the_id();   
$_appointmnet_schedules         = get_post_meta( $id, "{$cpt}_doctors_schedule", true );
$_appointmnet_schedules_title   = get_post_meta( $id, "{$cpt}_schedule_title", true );
$_designation                   = get_post_meta( $id, "{$cpt}_designation", true );
$_experienced_title             = get_post_meta( $id, "{$cpt}_experienced_title", true );
$_experienced                   = get_post_meta( $id, "{$cpt}_experienced", true );
$_education_title               = get_post_meta( $id, "{$cpt}_skill_title", true );
$_education                     = get_post_meta( $id, "{$cpt}_doctor_skill", true );
$_about_title                   = get_post_meta( $id, "{$cpt}_doctor_about_title", true );
$_designation                   = get_post_meta( $id, "{$cpt}_designation", true );
$_degree                        = get_post_meta( $id, "{$cpt}_degree", true );
$_phone                         = get_post_meta( $id, "{$cpt}_phone", true );
$_office                        = get_post_meta( $id, "{$cpt}_office", true );
$_email                         = get_post_meta( $id, "{$cpt}_email", true );
$_emergency_cases               = get_post_meta( $id, "{$cpt}_emergency_cases", true );
$_about                         = get_post_meta( $id, "{$cpt}_doctor_about", true );
$_emergency_cases               = get_post_meta( $id, "{$cpt}_emergency_cases", true );
$socials                        = get_post_meta( $id, "{$cpt}_doctor_social", true );
$social_fields                  = Helper::doctor_socials();
?>
<div id="post-<?php the_ID(); ?>" <?php post_class( 'team-single' ); ?>>         
    <div class="row">
        <div class="col-lg-12">
            <div class="rtin-content-doctor d-content">
                <?php the_content();?>
            </div>
        </div>
    </div>
</div>