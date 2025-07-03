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
$thumb_size  = "{$prefix}-size3";

$args = array(
	'post_type'        => "{$cpt}_gallrey",
	'posts_per_page'   => -1,
	'suppress_filters' => false,
	'orderby'          => $data['orderby'],
);

switch ( $data['orderby'] ) {
	case 'title':
	case 'menu_order':
	$args['order'] = 'ASC';
	break;
}

$posts = get_posts( $args );
$uniqueid = time() . rand( 1, 99 );
$gallrey = array();
$cats    = array();

foreach ( $posts as $post ) {
	$cats_comma       = array();
	$img              = get_the_post_thumbnail_url( $post, $thumb_size );
	$terms            = get_the_terms( $post, "{$cpt}_gallrey_category" );
	$terms            = $terms ? $terms : array();
	$terms_html       = '';
	$terms_comma_html = '';

	if ( !$img ) {
		if( !empty( RDTheme::$options['no_preview_image']['id'] ) ) {
			$img = wp_get_attachment_image_src( RDTheme::$options['no_preview_image']['id'], $thumb_size, true );
			$img = $img[0];
		}
		else {
			$img  = Helper::get_img( 'noimage_500x400.jpg' );
		}
	}

	foreach ( $terms as $term ) {
		$terms_html  .= " {$uniqueid}-{$term->slug}";
		$cats_comma[] = $term->name;
		if ( !isset( $cats[$term->slug] ) ) {
			$cats[$term->slug] = $term->name;
		}
	}

	$gallrey[] = array(
		'img'        => $img,
		'id'        => $post->ID,
		'title'      => $post->post_title,
		'url'        => get_the_permalink( $post ),
		'cats'       => $terms_html,
		'cats_comma' => implode(", ", $cats_comma ),		
	);
}

$col_class = "col-lg-{$data['col_lg']} col-md-{$data['col_md']} col-sm-{$data['col_sm']} col-xs-{$data['col_xs']}";

?>

<div class="rt-el-gallrey-4 rt-isotope-wrapper">
	<?php if($data['filter'] == 'yes'){ ?>
		<div class="text-center">
            <div class="isotope-classes-tab isotop-btn rt-isotope-tab">
				<a href="#" data-filter="*" class="current"><?php esc_html_e( 'All', 'medilink-core' );?></a>
				<?php foreach ( $cats as $key => $value): ?>
					<?php $cat_filter = "{$uniqueid}-{$key}";?>
					<a href="#" data-filter=".<?php echo esc_attr( $cat_filter );?>"><?php echo esc_html( $value );?></a>
				<?php endforeach; ?>
			</div>
		</div>
	<?php } ?>
	<div class="row rt-isotope-content">
		<?php foreach ( $gallrey as $gallrey_each ): ?>
			<div class="<?php echo esc_attr( $col_class . $gallrey_each['cats'] );?>">
				<div class="gallery-box-layout1">
				  <?php echo get_the_post_thumbnail( $gallrey_each['id'], $thumb_size);?>
				    <div class="item-icon">
				        <a href="<?php echo esc_url( $gallrey_each['img'] );?>" class="popup-zoom" data-fancybox-group="gallery"
				            title="">
				            <i class="flaticon-search"></i>
				        </a>
				    </div>
				    <div class="item-content">
				        <h3 class="item-title"><?php echo esc_html( $gallrey_each['title'] );?></h3>
				        <span class="title-ctg">Cancer Care, Cardiac</span>
				    </div>
				</div>
			</div>
		<?php endforeach;?>
	</div>
</div>



