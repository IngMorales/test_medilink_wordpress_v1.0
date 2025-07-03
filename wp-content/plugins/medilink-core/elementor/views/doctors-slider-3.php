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
$thumb_size  = "{$prefix}-size5";

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
$class = $data['slider_nav'] == 'yes' ? ' slider-nav-enabled' : '';
$temp = Helper::wp_set_temp_query( $query );

?>

<div class="rc-carousel nav-control-layout-top <?php echo esc_attr( $class );?>">
	<div class="owl-theme owl-carousel rt-owl-carousel" data-carousel-options="<?php echo esc_attr( $data['owl_data'] );?>">
		<?php if ( $query->have_posts() ) :?>
			<?php while ( $query->have_posts() ) : $query->the_post();?>
				<?php
				$id            					= get_the_id();
				$_appointmnet_schedules   		= get_post_meta( $id, "{$cpt}_doctors_schedule", true );
				$_designation   				= get_post_meta( $id, "{$cpt}_designation", true );
				$_degree   				  		= get_post_meta( $id, "{$cpt}_degree", true );
				?>
				<div class="rtin-item">		
					<div class="team-box-layout1 style3">
					    <div class="item-content">
					        <div class="title-bar">
					            <h3 class="item-title">
					                <a href="<?php the_permalink();?>"><?php the_title();?></a>
					            </h3>
					         <?php if ( !empty( RDTheme::$options['doctors_arc_designation_display'] ) ): ?>
									<p><?php echo esc_html($_designation); ?></p>
								<?php endif; ?>
					        </div>
					    	 <?php  if(!empty($_appointmnet_schedules)){ ?>
						        <div class="item-schedule">
						            <ul>
										<?php foreach ($_appointmnet_schedules as $schedule) {  ?> 
											<li><?php echo esc_html($schedule['week']); ?>
										    <span><?php echo esc_html($schedule['start_time']); ?> - <?php echo esc_html($schedule['end_time']); ?></span>
										</li>
										<?php } ?>
						            </ul>
						            <a href="<?php the_permalink();?>" class="item-btn"><?php echo wp_kses_post( $data['buttontext'] );?></a>
						        </div>
					  		<?php }  ?>
					    </div>
					    <?php
						if ( has_post_thumbnail() ){ ?>	
						    <div class="item-img">
						       <?php the_post_thumbnail( $thumb_size ); ?>
						    </div>
						<?php } ?>
					</div>
			    </div>               
			<?php endwhile;?>
		<?php endif;?>
		<?php Helper::wp_reset_temp_query( $temp );?>
	</div>
</div>