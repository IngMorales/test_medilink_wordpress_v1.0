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
	$size = MEDILINK_CORE_THEME . '-size315';
	if ( $attr ) {
		$img = '<a ' . $attr . '>' . wp_get_attachment_image( $data['image-alt']['id'], $size ) . '</a>';
	}
	else {
		$img = wp_get_attachment_image( $data['image-alt']['id'], $size );
	}
}

?>

<div class="rt-el-info-box clearfix rtin-style4 rtin-<?php echo esc_attr( $data['theme'] );?>">
	<div class="rt-number">
		<span><?php echo wp_kses_post( $data['number'] );?></span>	
	</div>
	<div class="rtin-icon">	
		<?php echo wp_kses_post($img);?>	
	</div>
	<div class="rtin-content">
		<h3 class="rtin-title"><?php echo wp_kses_post( $title );?></h3>
		<p class="rtin-text"><?php echo wp_kses_post( $data['content'] );?></p>
	</div>
</div>