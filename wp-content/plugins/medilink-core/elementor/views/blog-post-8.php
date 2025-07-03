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

$thumb_size = 'medilink-size2';

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
$col_class = "col-lg-{$data['col_lg']} col-md-{$data['col_md']} col-sm-{$data['col_sm']} col-xs-{$data['col_xs']}";
$temp = Helper::wp_set_temp_query( $query );

?>

<div class="row justify-content-center">
	<?php if ( $query->have_posts() ) : ?>
		<?php while ( $query->have_posts() ) : $query->the_post();			
			$content = Helper::get_current_post_content();
			$content = wp_trim_words( $content, $data['count'] );
			$content = "<p>$content</p>";
			$comments_number = number_format_i18n( get_comments_number() );
			$comments_html   = $comments_number < 2 ? esc_html__( 'Comment' , 'medilink-core' ) : esc_html__( 'Comments' , 'medilink-core' );
			$comments_html  .= ': '. $comments_number;	?>
	<div class="blog-col-1st <?php echo esc_attr( $col_class );?>">
	  <div class="blog-box-layout2 blog-box-layout8">
	  	<?php if ( has_post_thumbnail() ){?>
	    <div class="item-img">
	      <a href="<?php the_permalink();?>">
	        <?php the_post_thumbnail( $thumb_size ); ?>
	      </a>
	      <?php if ( RDTheme::$options['blog_date'] ): ?>
	      <div class="post-date">
	      	<i class="fas fa-calendar-alt"></i><?php the_time( get_option( 'date_format' ) );?>
	      </div>
	  	  <?php endif; ?>
	    </div>
		<?php } ?>
	    <div class="item-content">
	     <?php if ( $data['meta']  == 'yes' ): ?>
	      <div class="post-meta">
	        <ul>
	          <li>
	            <i class="fas fa-user"></i><?php the_author_posts_link();?>
	          </li>
	          <li>
	            <a href="<?php the_permalink();?>"><i class="fas fa-clock"></i>
	              <span><?php echo helper::post_reading_time(); ?></span></a>
	          </li>
	        </ul>
	      </div>
	  	 <?php endif; ?>
	      <h3 class="item-title">
	        <a href="<?php the_permalink();?>"><?php the_title(); ?></a>
	      </h3>
	     <?php echo wp_kses_post( $content );?>
	     <?php if ( $data['readmorebtn']  == 'yes' ): ?>	
	      <div class="post-actions-wrapper-2">
	        <a class="item-btn" href="<?php the_permalink();?>"><?php echo esc_html($data['readmore']);?><i class="fas fa-long-arrow-alt-right"></i></a>
	      </div>
	  	<?php endif; ?>
	    </div>
	  </div>
	</div>
	<?php endwhile;		
		endif;?>
	<?php Helper::wp_reset_temp_query( $temp );?>
</div>