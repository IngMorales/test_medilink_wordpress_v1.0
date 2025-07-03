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
$thumb_size  = "{$prefix}-size360";

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
	<div class="owl-theme owl-carousel rt-owl-carousel dot-control-layout1 nav-control-layout2" data-carousel-options="<?php echo esc_attr( $data['owl_data'] );?>">

		<?php if ( $query->have_posts() ) :?>
			<?php while ( $query->have_posts() ) : $query->the_post();?>
					<?php
					$id            				= get_the_id();
					$_appointmnet_schedules   	= get_post_meta( $id, "{$cpt}_doctors_schedule", true );
					$_designation   			= get_post_meta( $id, "{$cpt}_designation", true );
					$content = Helper::get_current_post_content();
					$content = wp_trim_words( $content, $data['count'] );
					$content = "<p>$content</p>";
					$socials       = get_post_meta( $id, "{$cpt}_doctor_social", true );
					$social_fields = Helper::doctor_socials();
				?>
				<div class="rtin-item">
					 <div class="team-box-layout42">
						 <div class="item-mid">
	                            <?php
								if ( has_post_thumbnail() ){ ?>									    
	                        		<div class="item-img">                           
									   <?php the_post_thumbnail( $thumb_size ); ?>	                            
	                        		</div>
	                        <?php } ?>
	                        <div class="item-content">
		                        <div class="item-content-mid">
										<h3 class="item-title">
										<a href="<?php the_permalink();?>"><?php the_title();?></a>
										</h3>                       
									<?php if ( !empty( $data['designation_display'] ) ): ?>
										<p><?php echo esc_html($_designation); ?></p>
									<?php endif; ?>
									<div class="item-social">
										<ul>
										<?php foreach ( $socials as $key => $social ): ?>
										<?php if ( !empty( $social ) ): ?>
										<li><a target="_blank" href="<?php echo esc_url( $social );?>"><i class="fa <?php echo esc_attr( $social_fields[$key]['icon'] );?>" aria-hidden="true"></i></a></li>
										<?php endif; ?>
										<?php endforeach; ?>
										</ul>
									</div>
							    </div>
						    </div>
	                    </div>
	                </div>
                </div>
			<?php endwhile;?>
		<?php endif;?>
		<?php Helper::wp_reset_temp_query( $temp );?>
	</div>
</div>