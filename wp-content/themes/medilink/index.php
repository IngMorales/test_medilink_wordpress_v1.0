<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Medilink;
use \WP_Query;

// CPT Redirection
$cpt = MEDILINK_THEME_CPT_PREFIX;
if ( is_post_type_archive( "{$cpt}_doctor" ) || is_tax( "{$cpt}_doctor_category" ) ) {
	get_template_part( 'template-parts/archive', 'doctors' );
	return;
}
if ( is_post_type_archive( "{$cpt}_departments" ) || is_tax( "{$cpt}_departments_category" ) ) {
	get_template_part( 'template-parts/archive', 'departments' );
	return;
}
if ( is_post_type_archive( "{$cpt}_services" ) || is_tax( "{$cpt}_services_category" ) ) {
	get_template_part( 'template-parts/archive', 'services' );
	return;
}

// Layout class
if ( RDTheme::$layout == 'full-width' ) {
	$layout_class = 'col-sm-12 col-xs-12';
	$post_class = 'col-lg-4 col-md-6 col-sm-6 col-xs-12 no-equal-item';
}
else{
	$layout_class = 'col-md-9 col-xs-12 rt-content';
	$post_class = 'col-lg-6 col-md-6 col-sm-6 col-xs-12 no-equal-item';
}

?>
<?php get_header(); 
?>
<div id="primary" class="content-area">
	<div class="container">
		<div class="row theiaStickySidebar">
			<?php
			if ( RDTheme::$layout == 'left-sidebar' ) {
				get_sidebar();
			}
			?>
			<div class="<?php echo esc_attr( $layout_class );?>">
				<main id="main" class="site-main site-index">
					<?php if ( have_posts() ) :?>
					<?php
						echo '<div class="row no-equal-gallery">';
						while ( have_posts() ) : the_post();
							echo '<div class="' . $post_class. '">';
							get_template_part( 'template-parts/content-masonry', get_post_format() );
							echo '</div>';
						endwhile;
						echo '</div>';
						?>
					<div class="mt50">
						<?php Helper::pagination();?>
					</div>
					<?php else:?>
					<?php get_template_part( 'template-parts/content', 'none' );?>
					<?php endif;?>
				</main>
			</div>
			<?php
			if ( RDTheme::$layout == 'right-sidebar' ) {
				get_sidebar();
			}
			?>
		</div>
	</div>
</div>
<?php get_footer(); ?>