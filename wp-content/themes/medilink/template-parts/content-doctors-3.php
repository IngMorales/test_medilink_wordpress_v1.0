<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\Medilink;

	$medilink      	= MEDILINK_THEME_PREFIX;
	$cpt         	= MEDILINK_THEME_CPT_PREFIX;
	$thumb_size  	= "{$medilink}-size5";
	$id             = get_the_id();
	$_appointmnet_schedules   = get_post_meta( $id, "{$cpt}_appointmnet_schedules", true );
	$_designation   		  = get_post_meta( $id, "{$cpt}_designation", true );
	$content = Helper::get_current_post_content();
	$content = wp_trim_words( $content, '10' );
	$content = "<p>$content</p>";
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="rtin-item">



<div class="team-box-layout2">
    <?php
	if ( has_post_thumbnail() ){ ?>									    
		<div class="item-img">                           
		   <?php the_post_thumbnail( $thumb_size ); ?>
        <ul class="item-icon">
            <li>
                <a href="<?php the_permalink();?>">
                    <i class="fas fa-plus"></i>
                </a>
            </li>
        </ul>
		</div>
<?php } ?>
<div class="item-content">
    <h3 class="item-title">
      <a href="<?php the_permalink();?>"><?php the_title();?></a>
    </h3>                       
	<?php if ( !empty( RDTheme::$options['doctors_arc_designation_display'] ) ): ?>	
	<p><?php echo esc_html($_designation); ?></p>
	<?php endif; ?>
</div>
	<div class="item-content-txt text-center"><?php echo wp_kses_post( $content );?></div>
    <div class="item-schedule">	
        	<div class="btn-holder"><a href="<?php the_permalink();?>" class="item-btn"><?php echo esc_html__( 'Make an Appointment', 'medilink' ); ?></a></div>
    </div>
	                      
</div>
	</div>
</article>