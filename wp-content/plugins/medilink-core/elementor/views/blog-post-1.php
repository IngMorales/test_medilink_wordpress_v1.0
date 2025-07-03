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
$temp = Helper::wp_set_temp_query( $query );
$attr = '';

if ( !empty( $data['buttonurl']['url'] ) ) {
	$attr  = 'href="' . $data['buttonurl']['url'] . '"';
	$attr .= !empty( $data['buttonurl']['is_external'] ) ? ' target="_blank"' : '';
	$attr .= !empty( $data['buttonurl']['nofollow'] ) ? ' rel="nofollow"' : '';	
}

$buttontext = $data['buttontext'];

?>
	<?php if ( $query->have_posts() ) :?>
		<div class="single-item">	
			<div class="single-item-wrp">	
			<?php while ( $query->have_posts() ) : $query->the_post();?>
				<?php
				$content = Helper::get_current_post_content();
				$content = wp_trim_words( $content, $data['count'] );
				$content = "<p>$content</p>";
				$comments_number = number_format_i18n( get_comments_number() );
				$comments_html   = $comments_number < 2 ? esc_html__( 'Comment' , 'medilink-core' ) : esc_html__( 'Comments' , 'medilink-core' );
				$comments_html  .= ': '. $comments_number;
				?>

			<div class="blog-box-layout1">
			    <h3 class="item-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
			   <?php if ( $data['meta']  == 'yes' ): ?>
			    <ul class="entry-meta">
			       <?php if ( RDTheme::$options['blog_date'] ): ?>
			        	<li><i class="far fa-calendar-alt"></i><?php the_time( get_option( 'date_format' ) );?></li>
			        <?php endif; ?>	
					<?php if ( RDTheme::$options['blog_author_name'] ): ?>
			        <li><i class="fas fa-user"></i> <span class="vcard author">Posted by <?php the_author_posts_link();?></span></li>				
					<?php endif; ?>	
			    </ul> 
			    <?php endif ?>	
			     <?php echo wp_kses_post( $content );?>
			</div>	
		<?php endwhile;?>	
		</div>
		<?php if ( !empty( $data['buttonurl']['url'] ) ) { ?>
		<a class="blog-btn" <?php echo esc_attr($attr);?>><?php echo esc_html( $buttontext);?><i class="fas fa-chevron-right"></i></a>
	<?php  } ?>
	</div>
	<?php endif;?>
<?php Helper::wp_reset_temp_query( $temp );?>