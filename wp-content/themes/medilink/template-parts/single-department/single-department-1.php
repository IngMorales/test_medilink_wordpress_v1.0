<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\Medilink;
$template = 'single-department-1';
?>
<?php get_header(); ?>
<div id="primary" class="content-area single-department-wrap-layout1 bg-light-primary100">
	<div class="container">
		<div class="row">			
			<div class="col-sm-12 col-xs-12">
				<main id="main" class="site-main">
					  <div class="row"> 
						<?php while ( have_posts() ) : the_post(); ?>
							<?php
							 get_template_part( 'template-parts/content', $template );
							if ( comments_open() || get_comments_number() ){
								comments_template();
							}
							?>
						<?php endwhile; ?>
					</div>					
				</main>					
			</div>			
		</div>
	</div>
</div>
<?php get_footer(); ?>