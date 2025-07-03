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
				$has_entry_meta_1  = RDTheme::$options['blog_date'] || ( RDTheme::$options['blog_cats'] && has_category() ) ? true : false;
				$has_entry_meta_2  = RDTheme::$options['blog_author_name'] || RDTheme::$options['blog_comment_num'] ? true : false;
				?>
				<div class="blog-posts">
					<div class="blog-box-layout2">
						<?php if ( has_post_thumbnail() ){?>
	                        <div class="item-img">
	                            <a href="single-news.html">
	                               <?php the_post_thumbnail( $thumb_size ); ?>
	                            </a>
	                        </div>
	                	<?php } ?>
	                    <div class="item-content">                           
							<?php if ( $data['meta']  == 'yes' ): ?>							
								<?php if ( RDTheme::$options['blog_date'] ): ?>
									<div class="post-date"><?php the_time( get_option( 'date_format' ) );?></div>
								<?php endif; ?>		
							<?php endif ?>	
	                        <h3 class="item-title">
	                            <a href="<?php the_permalink();?>"><?php the_title();?></a>
	                        </h3>                            
	                         <?php echo wp_kses_post( $content );?>
	                        <div class="post-actions-wrapper">
	                            <ul>
	                            	<?php if ( $data['readmorebtn']  == 'yes' ): ?>	
	                                    <li>
	                                        <a class="item-btn" href="<?php the_permalink();?>"><?php echo esc_html($data['readmore']);?><i class="fas fa-long-arrow-alt-right"></i></a>
	                                    </li>
									<?php endif; ?>	
	                                <?php if ( RDTheme::$options['blog_comment_num']): ?>
											<li class="vcard-comments"> <a href="<?php the_permalink();?>"><i class="fa fa-comments" aria-hidden="true"></i> <?php echo wp_kses_post( $comments_number );?></a></li>
									<?php endif; ?>	
	                            </ul>
	                        </div>
	                    </div>
	                </div>		
				</div>
			<?php endwhile;?>
		<?php endif;?>
		<?php Helper::wp_reset_temp_query( $temp );?>
	</div>
</div>