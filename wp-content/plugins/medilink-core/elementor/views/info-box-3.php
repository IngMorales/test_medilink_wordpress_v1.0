<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.2
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

<div class="rt-el-info-box rtin-style3 rtin-<?php echo esc_attr( $data['theme'] );?>">
	<div class="rtin-icon">		
		<div class="rtin-button"><a <?php echo $attr;?> class="rdtheme-button-3"><?php echo esc_html__( 'Detail', 'medilink-core' ); ?> &nbsp; <i class="fa fa-angle-right"></i></a></div>
		<?php echo wp_kses_post($img);?>		
	</div>
	<div class="rtin-content">
		<h3 class="media-heading rtin-title"><?php echo wp_kses_post( $title );?></h3>
		<p class="rtin-text"><?php echo wp_kses_post( $data['content'] );?></p>
	</div>
</div>