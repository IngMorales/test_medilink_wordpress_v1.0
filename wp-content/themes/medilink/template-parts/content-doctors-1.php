<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\Medilink;

$medilink      = MEDILINK_THEME_PREFIX;
$cpt         = MEDILINK_THEME_CPT_PREFIX;
$thumb_size  = "{$medilink}-size4";
$id            			  = get_the_id();
$_appointmnet_schedules   = get_post_meta( $id, "{$cpt}_appointmnet_schedules", true );
$_designation   		  = get_post_meta( $id, "{$cpt}_designation", true );
$socials       = get_post_meta( $id, "{$cpt}_doctor_social", true );
$social_fields = Helper::doctor_socials();
wp_enqueue_script( 'imagesloaded' );
wp_enqueue_script( 'isotope-pkgd' );
?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="team-box-layout42">
		 <div class="item-mid">
		        <?php
				if ( has_post_thumbnail() ){ ?>									    
		    		<div class="item-img">                           
					   <?php the_post_thumbnail( $thumb_size ); ?>	                            
		    		</div>
		    <?php } ?>
		    <div class="item-content ">
		        <div class="item-content-mid">
					<h3 class="item-title">
						<a href="<?php the_permalink();?>"><?php the_title();?></a>
					</h3>  
					<?php if ( !empty( RDTheme::$options['doctors_arc_designation_display'] ) ): ?>
						<p><?php echo esc_html($_designation); ?></p>
					<?php endif; ?>			
					<div class="item-social">
						<ul>
						<?php foreach ( $socials as $key => $social ): ?>
							<?php if ( !empty( $social ) ): ?>
							<li><a target="_blank" href="<?php echo esc_url( $social );?>"><i class="fa <?php echo esc_attr( $social_fields[$key]['icon'] );?>" aria-hidden="true"></i></a></li>
							<?php endif; ?>
						<?php endforeach; ?>
						</ul>
					</div>
			    </div>
		    </div>				                      
		</div>
	</div>
</article>