<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Medilink_Core;

use \WP_Query;
use radiustheme\Medilink\RDTheme;
use radiustheme\Medilink\Helper;

$thumb_size = MEDILINK_CORE_THEME . '-size2';

$args = array(
	'posts_per_page' => $data['number'],
	'cat'            => (int) $data['cat'],
	'orderby'        => $data['orderby'],
);

switch ( $data['orderby'] ) {
	case 'title':
	case 'menu_order':
	$args['order'] = 'ASC';
	break;
}

$query = new WP_Query( $args );
$class = $data['slider_nav'] == 'yes' ? ' slider-nav-enabled' : '';
$temp = Helper::wp_set_temp_query( $query );

?>

<div class="rt-el-blgo-post owl-wrap nav-control-layout-top rt-owl-dot  <?php echo esc_attr( $class );?>">
	<div class="owl-theme owl-carousel rt-owl-carousel" data-carousel-options="<?php echo esc_attr( $data['owl_data'] );?>">
		<?php if ( $query->have_posts() ) :?>
			<?php while ( $query->have_posts() ) : $query->the_post();?>
				<?php
				$content = Helper::get_current_post_content();
				$content = wp_trim_words( $content, $data['count'] );
				$content = "<p>$content</p>";
				$comments_number = number_format_i18n( get_comments_number() );
				$comments_html   = $comments_number < 2 ? esc_html__( 'Comment' , 'medilink-core' ) : esc_html__( 'Comments' , 'medilink-core' );
				$comments_html  .= ': '. $comments_number;
				?>
				<div class="rtin-item">
					<div class="blog-layout1">
					    <div class="item-img">
						<?php
							if ( has_post_thumbnail() ){
								the_post_thumbnail( $thumb_size );
							}
						?>
						<?php if ( $data['meta']  == 'yes' ): ?>							
							<?php if ( RDTheme::$options['blog_date'] ): ?>
								 <div class="item-date"><?php the_time( get_option( 'date_format' ) );?></div>
							<?php endif; ?>		
						<?php endif ?>		        
					    </div>
					    <div class="item-content">
					        <div class="item-title">		        	
					            <h3 class="title-medium color-dark hover-primary">
					               <a href="<?php the_permalink();?>"><?php the_title();?></a>
					            </h3>
					        </div>
					        <div class="item-deccription">
					           <?php echo wp_kses_post( $content );?>
					        </div>		       
					        <a href="<?php the_permalink();?>" class="btn-text"><?php esc_html_e( 'Read More', 'medilink-core' );?></a>
					    </div>
					</div>			
				</div>
			<?php endwhile;?>
		<?php endif;?>
		<?php Helper::wp_reset_temp_query( $temp );?>
	</div>
</div>