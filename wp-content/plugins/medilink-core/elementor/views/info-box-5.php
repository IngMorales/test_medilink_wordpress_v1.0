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

$size = 'full';
$img = wp_get_attachment_image( $data['image-alt']['id'], $size );

?>

<div class="widget-ad-area">
    <div class="ad-wrap">
       <?php echo wp_kses_post($img);?>
	   <?php if( !empty( $data['url_text'] ) ) { ?>
        <div class="item-btn-wrap">
            <a class="item-btn" <?php echo $attr;?>  ><?php echo wp_kses_post( $data['url_text'] );?><i class="fas fa-chevron-right"></i></a>
        </div>
	   <?php } ?>
    </div>
</div>