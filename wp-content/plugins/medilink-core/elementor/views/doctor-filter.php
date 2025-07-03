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
	'post_type'        => "{$cpt}_doctor",
	'posts_per_page'   => -1,
	'suppress_filters' => false,
	'orderby'          => $data['orderby'],

    'tax_query' => array(
        array (
            'taxonomy' => 'medilink_doctor_category',
            'field' => 'term_id',
            'terms' => $data['cat']
        )
    ),
);

switch ( $data['orderby'] ) {
	case 'title':
	case 'menu_order':
	$args['order'] = 'ASC';
	break;
}

$col_class = "col-lg-{$data['col_lg']} col-md-{$data['col_md']} col-sm-{$data['col_sm']} col-xs-{$data['col_xs']}";
$uniqueid = time() . rand( 1, 99 );

?>



<div class="rt-el-gallrey-1 rt-isotope-wrapper">
	<div class="rt-isotope-tab isotope-classes-tab isotop-btn ">
		<a href="#" data-filter="*" class="current"><?php esc_html_e( 'All', 'medilink-core' );?></a>
		<?php foreach ( $data['cat'] as $key => $value):$term_title = get_term( $value ); ?>
			<a href="#" data-filter=".<?php echo esc_attr( strtolower($term_title->slug) );?>"><?php echo esc_html( $term_title->name );?></a>
		<?php endforeach; ?>
	</div>
<div class="row rt-isotope-content">

<?php

$query = new WP_Query( $args );

while ( $query->have_posts() ) : $query->the_post();
$designation = get_post_meta(get_the_ID(),"{$cpt}_designation", true );
$terms = get_the_terms( get_the_ID(), "{$cpt}_doctor_category" );
$content= null;
$content = Helper::get_current_post_content();
$content = wp_trim_words( $content, $data['count'] );
$content = "<p>$content</p>";
$terms = $terms ? $terms : array();
$terms_html       = '';

if (!$terms ){ continue;}

foreach ( $terms as $term ) {
	$terms_html  .= " {$term->slug}";
}?>

	<div class="<?php echo esc_attr( $col_class . $terms_html);?>">
		<div class="team-box-layout2">
                <?php
				if ( has_post_thumbnail() ){ ?>
            		<div class="item-img">
            		<?php the_post_thumbnail($thumb_size);?>
                    <ul class="item-icon">
                        <li>
                            <a href="<?php the_permalink();?>">
                                <i class="fas fa-plus"></i>
                            </a>
                        </li>
                    </ul>
            		</div>
                <?php } ?>
                <div class="item-content">
                    <h3 class="item-title">
                      <a href="<?php the_permalink();?>"><?php echo the_title();?></a>
                    </h3>
                    <?php if ( !empty( $data['designation_display'] ) ): ?>
                    	<p><?php echo esc_html($designation); ?></p>
						<?php endif; ?>
                </div>
				<div class="item-schedule text-center">
					<?php if ($data['count'] != "0") { ?>
						<?php if ($content) { ?>
							<?php echo $content; ?>
						<?php  } ?>
					<?php  } ?>
				<?php if ($data['doctor_btn']) { 
					$profile_link = $data['buttonlinktype'] ? get_the_permalink() : $data['buttonurl']['url'];
					?>
					<a href="<?php echo esc_url( $profile_link );?>" class="item-btn"><?php echo wp_kses_post( $data['buttontext'] );?></a>
				<?php  } ?>
				</div>
        </div>
	</div>
<?php endwhile;wp_reset_query();?>
   </div>
</div>