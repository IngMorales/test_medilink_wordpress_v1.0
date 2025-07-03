<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Medilink_Core;

$attr = '';
if ( !empty( $data['url']['url'] ) ) {
	$attr  = 'href="' . $data['url']['url'] . '"';
	$attr .= !empty( $data['url']['is_external'] ) ? ' target="_blank"' : '';
	$attr .= !empty( $data['url']['nofollow'] ) ? ' rel="nofollow"' : '';
	$title = '<a ' . $attr . '>' . $data['title'] . '</a>';
}
else {
	$title = $data['title'];
}

// Style 3,4
if ( $data['style'] == 'style3' || $data['style'] == 'style4' ) {
	$size = MEDILINK_CORE_THEME . '-size2';
	if ( $attr ) {
		$img = '<a ' . $attr . '>' . wp_get_attachment_image( $data['image-alt']['id'], $size ) . '</a>';
	}
	else {
		$img = wp_get_attachment_image( $data['image-alt']['id'], $size );
	}
}

?>

<div class="choose-box1 wow fadeInUp" data-wow-delay=".4s">
	<div class="why-choose-box-5">
	  <div class="box-item">
	    <div class="choose-layout-1">
	      <div class="item-icon">
	        <i class="<?php echo esc_attr( $data['icon'] );?>"></i>
	      </div>
	      <div class="choose-title">
	        <h3><?php echo wp_kses_post( $title );?></h3>
	        <p><?php echo wp_kses_post( $data['content'] );?></p>
	      </div>
	    </div>
	  </div>
	</div>
</div>