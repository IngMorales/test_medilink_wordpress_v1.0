<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\Medilink;

$medilink      = MEDILINK_THEME_PREFIX;
$cpt         = MEDILINK_THEME_CPT_PREFIX;
$thumb_size  = "{$medilink}-size5";
$id            = get_the_id();
$_appointmnet_schedules   = get_post_meta( $id, "{$cpt}_appointmnet_schedules", true );
$_designation   		  = get_post_meta( $id, "{$cpt}_designation", true );
$_degree   				  = get_post_meta( $id, "{$cpt}_degree", true );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="rtin-item">
		<div class="team-box-layout5">
            <div class="media media-none-lg media-none-md media-none--xs">
            <?php
			if ( has_post_thumbnail() ){ ?>									    
        		<div class="item-img">                           
				   <?php the_post_thumbnail( $thumb_size ); ?>	                          
        		</div>
            <?php } ?>                                
                <div class="media-body">
                    <div class="item-content">
                        <h4 class="item-title">
                           <a href="<?php the_permalink();?>"><?php the_title();?></a>
                        </h4>
                       <?php if ( !empty( RDTheme::$options['doctors_arc_designation_display'] ) ): ?>
                        	<p class="designation"><?php echo esc_html($_designation); ?></p>
                    	<?php endif; ?>
						<?php if ( !empty( RDTheme::$options['doctors_arc_degree_display'] ) ): ?>
							 <div class="item-degree"><?php echo esc_html($_degree); ?></div>
						<?php endif; ?>                                   
                        <ul class="item-btns">
                            <li>
                                <a href="<?php the_permalink();?>" class="item-btn btn-ghost"><?php echo esc_html__( 'View Profile', 'medilink' ); ?></a>
                            </li>
                            <li>
                                <a href="<?php the_permalink();?>" class="item-btn btn-fill"><?php echo esc_html__( 'Make an Appointment', 'medilink' ); ?></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>