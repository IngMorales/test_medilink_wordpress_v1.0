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

$prefix      = MEDILINK_CORE_THEME;
$cpt         = MEDILINK_CORE_CPT;
$thumb_size  = "medilink-size315";

$args = array(
	'post_type'      => "{$cpt}_doctor",
	'posts_per_page' => $data['number'],
	'orderby'        => $data['orderby'],
);

if ( !empty( $data['cat'] ) ) {
	$args['tax_query'] = array(
		array(
			'taxonomy' => "{$cpt}_doctor_category",
			'field' => 'term_id',
			'terms' => $data['cat'],
		)
	);
}

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

 <div class="rt-doctor team-wrap-layout1"  data-settings='<?php echo json_encode( $data ); ?>' data-paged='1'>
 	<div class="row doctor-list">
 		<?php if ( $query->have_posts() ) :?>
		<?php while ( $query->have_posts() ) : $query->the_post();?>
		<?php
			$id            = get_the_id();
			$_appointmnet_schedules   = get_post_meta( $id, "{$cpt}_appointmnet_schedules", true );
			$_designation   = get_post_meta( $id, "{$cpt}_designation", true );
			$_degree   = get_post_meta( $id, "{$cpt}_degree", true );
			$content = Helper::get_current_post_content();
			$content = wp_trim_words( $content, $data['count'] );
			$content = "<p>$content</p>";
		?>
	    <div class="<?php echo esc_attr( $col_class );?>">
	      <div class="team-box-layout1 team-box-layout5 team-box-layout6">
	        <div class="media media-none-lg media-none-md media-none--xs">
	         <?php
				if ( has_post_thumbnail() ){ ?>	
	          <div class="item-img">
	             <?php the_post_thumbnail( $thumb_size ); ?>
	          </div>
	          <?php } ?>
	          <div class="media-body">
	            <div class="item-content">
	              <h3 class="item-title">
	                <a href="<?php the_permalink();?>"><?php the_title();?></a>
	              </h3>
	              <?php if ( !empty( $data['designation_display'] ) ): ?>
	              <div class="item-degree">
	                <?php echo esc_html($_degree); ?>
	              </div>
	              <?php endif; ?>
	              <?php echo wp_kses_post( $content );?>
	              <ul class="item-btns">
                    <li>
					<?php if ( !empty( $data['doctor_btn'] ) ): ?>
						<?php if ( $data['buttonlinktype'] == 'yes' ){ ?>
							<a href="<?php the_permalink();?>" class="item-btn btn-fill"><?php echo esc_html($data['buttontext2']); ?></a>
						<?php }else{ ?>
							<a href="<?php echo esc_url($data['buttonurl']['url']); ?>" class="item-btn btn-fill"><?php echo esc_html($data['buttontext']); ?></a>
						<?php } ?>
					<?php endif; ?>
                    </li>
                </ul>
	            </div>
	          </div>
	        </div>
	      </div>
	    </div>
	    <?php endwhile;?>
		<?php endif;?>
		<?php Helper::wp_reset_temp_query( $temp );?>
	  </div>
	  <?php if ( $data['doctor_readmore_btn'] == 'yes' ) : ?>
	  <div class="loading-button">
	    <a href="#" class="item-btn doctor-loadmore"><?php echo esc_html($data['rm_buttontext']); ?><i class="fas fa-angle-right"></i></a>
	  </div>
		<?php endif; ?>
 </div>