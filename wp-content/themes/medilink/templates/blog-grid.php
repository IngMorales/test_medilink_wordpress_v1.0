<?php
/**
 * Template Name: Blog Grid
 * 
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Medilink;

use \WP_Query;

// Layout class
if ( RDTheme::$layout == 'full-width' ) {
	$layout_class = 'col-sm-12 col-xs-12';
	$post_class = 'col-lg-4 col-md-6 col-sm-6 col-xs-12';
}
else{
	$layout_class = 'col-md-9 col-xs-12';
	$post_class = 'col-lg-6 col-md-6 col-sm-6 col-xs-12';
}

$args = array(
	'post_type' => "post",
);
if ( get_query_var('paged') ) {
	$args['paged'] = get_query_var('paged');
}
elseif ( get_query_var('page') ) {
	$args['paged'] = get_query_var('page');
}
else {
	$args['paged'] = 1;
}

$query = new WP_Query( $args );

global $wp_query;
$wp_query = NULL;
$wp_query = $query;
?>
<?php get_header(); ?>
<div id="primary" class="content-area">
	<div class="container">
		<div class="row">
			<?php
			if ( RDTheme::$layout == 'left-sidebar' ) {
				get_sidebar();
			}
			?>
			<div class="<?php echo esc_attr( $layout_class );?>">
				<main id="main" class="site-main site-index">
					<?php if ( have_posts() ) :?>
						<?php
						echo '<div class="row">';
						while ( have_posts() ) : the_post();
							echo '<div class="' . $post_class. '">';
							get_template_part( 'template-parts/content-grid', get_post_format() );
							echo '</div>';
						endwhile;
						echo '</div>';
						?>
						<div class="mt50"><?php Helper::pagination();?></div>
					<?php else:?>
						<?php get_template_part( 'template-parts/content', 'none' );?>
					<?php endif;?>
					<?php wp_reset_postdata(); ?>
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