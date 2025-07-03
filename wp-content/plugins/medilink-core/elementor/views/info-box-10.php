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

<div class="rt-el-info-box departments-box-layout7  rtin-<?php echo esc_attr( $data['theme'] );?> rtin-<?php echo esc_attr( $data['style'] );?>">
 <div class="single-box">
	<?php if ( $data['icontype'] == 'image' ): ?>
		<div class="hover-no"><?php echo wp_get_attachment_image( $data['image']['id'] );?></div>
		<div class="hover-yes"><?php echo wp_get_attachment_image( $data['hover_image']['id'] );?></div>
	<?php else: ?>
		<i class="<?php echo esc_attr( $data['icon_color'] );?> <?php echo esc_attr( $data['icon'] );?>" aria-hidden="true"></i>
	<?php endif; ?>
        <p>
            <?php echo wp_kses_post( $title );?>
        </p>
    </div>
</div>