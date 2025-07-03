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
	$title = $data['title'];
}
else {
	$title = $data['title'];
}
// Style 3,4
if ( $data['style'] == 'style3' || $data['style'] == 'style4' || $data['style'] == 'style13' ) {
	$size = MEDILINK_CORE_THEME . '-size2';
	if ( $attr ) {
		$img = '<a ' . $attr . '>' . wp_get_attachment_image( $data['image-alt']['id'], $size ) . '</a>';
	}
	else {
		$img = wp_get_attachment_image( $data['image-alt']['id'], $size );
	}
}
?>
<div class="feature-box-layout8 animated" style="visibility: visible; animation-delay: 0.3s; animation-name: zoomIn;">
	<div class="item-content">
	  <div class="item-title">
	    <h3><?php echo wp_kses_post( $title );?></h3>
	  </div>
	  <p><?php echo wp_kses_post( $data['content'] );?></p>
	  <?php if( !empty( $data['url_text'] ) ) : ?>
	  <div class="item-button">
	    <a <?php echo $attr;?> class="item-btn"><?php echo wp_kses_post( $data['url_text'] );?><i class="fas fa-long-arrow-alt-right"></i></a>
	  </div>
	 <?php endif; ?>
	</div>
	<?php if( !empty( $img ) ) : ?>
	<div class="item-img">
	  <?php echo wp_kses_post( $img );?>
	</div>
	<?php endif; ?>
	<div class="figure-img animated" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInRight;">
		<?php if ( $data['icontype'] == 'image' ): ?>
			<?php echo wp_get_attachment_image( $data['image']['id'] );?>
		<?php else: ?>
			<i class="<?php echo esc_attr( $data['icon_color'] );?> <?php echo esc_attr( $data['icon'] );?>" aria-hidden="true"></i>
		<?php endif; ?>
	</div>
</div>