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

<div class="rt-el-blgo-post owl-wrap nav-control-layout-top rt-owl-dot <?php echo esc_attr( $class );?>">
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
		$has_entry_meta_1  = RDTheme::$options['blog_date'] || ( RDTheme::$options['blog_cats'] && has_category() ) ? true : false;
		$has_entry_meta_2  = RDTheme::$options['blog_author_name'] || RDTheme::$options['blog_comment_num'] ? true : false;
		?>	

		<div class="rtin-item post-each">
			<?php
			if ( has_post_thumbnail() ){ ?>
				<div class="entry-thumbnail-area">
					<a href="<?php the_permalink();?>" class="entry-title" rel="bookmark">
						<?php the_post_thumbnail( $thumb_size );?>								
					</a>
				</div>
				<?php }	?>
				<div class="entry-content-area">
					<div class="entry-header">
						<?php if ( $has_entry_meta_1 ): ?>
						<ul class="entry-meta-1">
							<?php if ( RDTheme::$options['blog_date'] ): ?>
								<li><span class="updated published"> <i class="fa fa-calendar" aria-hidden="true"></i>  <?php the_time( get_option( 'date_format' ) );?></span></li>
							<?php endif; ?>				
						</ul>
					<?php endif; ?>
						<h3><a href="<?php the_permalink();?>" class="entry-title" rel="bookmark"><?php the_title();?></a></h3>			
					</div>
					<div class="entry-content">
						 <?php echo wp_kses_post( $content );?>
						<?php if ( $has_entry_meta_2 ): ?>
							<ul class="entry-meta-2">
								<?php if ( RDTheme::$options['blog_author_name'] ): ?>
									<li class="vcard-author"><i class="fa fa-user" aria-hidden="true"></i> <span class="vcard author"><?php the_author_posts_link();?></span></li>
								<?php endif; ?>					
								<?php if ( RDTheme::$options['blog_comment_num']): ?>
									<li class="vcard-comments"> <i class="fa fa-comments" aria-hidden="true"></i> <?php echo wp_kses_post( $comments_html );?></li>
								<?php endif; ?>		
							</ul>
						<?php endif; ?>
					</div>
				</div>			
			</div>
			<?php endwhile;?>
		<?php endif;?>
		<?php Helper::wp_reset_temp_query( $temp );?>
	</div>
</div>