<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\Medilink;

$medilink      = MEDILINK_THEME_PREFIX;
$cpt         = MEDILINK_THEME_CPT_PREFIX;
$thumb_size  = "full";
$id            			  = get_the_id();
$_sub_title                 = get_post_meta( $id, "{$cpt}_sub_title", true );
$_short_detail              = get_post_meta( $id, "{$cpt}_short_detail", true );
$_services_info             = get_post_meta( $id, "{$cpt}_services_info", true );
$_video_link                = get_post_meta( $id, "{$cpt}_video_link", true );

wp_enqueue_script( 'imagesloaded' );
wp_enqueue_script( 'isotope-pkgd' );
?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="departments-box-layout2update">	                                         
		 <?php
			if ( has_post_thumbnail() ){ ?>									    
				<div class="item-icon">                           
				   <?php the_post_thumbnail( $thumb_size ); ?>	                            
				</div>
		<?php } ?>
		<h3 class="item-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
			<?php if ( !empty($_short_detail) ): ?>
				<p><?php echo esc_html($_short_detail); ?></p>
			<?php endif; ?>                    				
		</div>
	</article>