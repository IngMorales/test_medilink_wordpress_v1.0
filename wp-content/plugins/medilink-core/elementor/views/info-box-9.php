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

<div class="rt-el-info-box clearfix media  rtin-<?php echo esc_attr( $data['theme'] );?> rtin-<?php echo esc_attr( $data['style'] );?>">
	<div class="rtin-icon">
		<?php if ( $data['style'] == 'style3' ): ?>
			<div class="rtin-button"><a href="<?php echo  $attr; ?>" class="rdtheme-button-3"><?php echo esc_html__( 'Detail', 'medilink-core' ); ?> &nbsp; <i class="fa fa-angle-right"></i></a></div>
		<?php endif; ?>
		<?php if ( $data['style'] == 'style3' || $data['style'] == 'style4' ): ?>
			<?php echo wp_kses_post($img);?>
		<?php else: ?>
			<?php if ( $data['icontype'] == 'image' ): ?>
				<?php echo wp_get_attachment_image( $data['image']['id'] );?>
			<?php else: ?>
				<i class="<?php echo esc_attr( $data['icon_color'] );?> <?php echo esc_attr( $data['icon'] );?>" aria-hidden="true"></i>
			<?php endif; ?>
		<?php endif; ?>
	</div>
	<div class="media-body rtin-content">
		<h3 class="media-heading rtin-title"><?php echo wp_kses_post( $title );?></h3>
		<p class="rtin-text"><?php echo wp_kses_post( $data['content'] );?></p>
	</div>
</div>