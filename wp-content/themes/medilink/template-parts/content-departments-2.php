<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\Medilink;

$medilink      = MEDILINK_THEME_PREFIX;
$cpt         = MEDILINK_THEME_CPT_PREFIX;
$thumb_size  							= "{$medilink}-size3";
$id            							= get_the_id();   
$_department_services                   = get_post_meta( $id, "{$cpt}_department_services", true );
$_department_investigations             = get_post_meta( $id, "{$cpt}_department_investigations", true );
$_doctor                                = get_post_meta( $id, "{$cpt}_doctor", true );
$_doctor_c          					= count((array)$_doctor);
$content 				= Helper::get_current_post_content();
$content 				= wp_trim_words( $content, RDTheme::$options['departments_content_number'] );
$content 				= "$content";
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>	
	<div class="departments-box-layout5">
		 <?php if ( has_post_thumbnail() ){ ?>   
	    <div class="item-img">
	          <?php  the_post_thumbnail( $thumb_size ); ?>
	        <div class="item-content">
	            <h3 class="item-title title-bar-primary3"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
	            <p> <?php echo wp_kses_post( $content );?></p>
	            <a href="<?php the_permalink();?>" class="item-btn"><?php echo esc_html__( 'DETAILS', 'medilink' ); ?></a>
	        </div>
	    </div>
	 <?php  }else{ ?>
 		<div class="item-img no-image">	         
	        <div class="item-content">
	            <h3 class="item-title title-bar-primary3"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
	            <?php echo wp_kses_post( $content );?>
	            <a href="<?php the_permalink();?>" class="item-btn"><?php echo esc_html__( 'DETAILS', 'medilink' ); ?></a>
	        </div>
	    </div>
	<?php  } ?>
	</div>
</article>