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

$position_loop = $data['position_loop'] == 'yes' ? 'position-loop' : 'position-none';

?>

<div class="rt-el-info-box service-wrap-layout1 rtin-<?php echo esc_attr( $data['theme'] );?>">
	<div class="service-inner-layout1 <?php echo esc_attr( $position_loop );?>">
		<div class="single-item">
			  <div class="service-box-layout1 <?php echo esc_attr( $data['bradius'] );?>">
		        <div class="item-icon">
		           <?php if ( $data['icontype'] == 'image' ): ?>
						<?php echo wp_get_attachment_image( $data['image']['id'] );?>
					<?php else: ?>
						<i class="<?php echo esc_attr( $data['icon_color'] );?> <?php echo esc_attr( $data['icon'] );?>" aria-hidden="true"></i>
					<?php endif; ?>
		        </div>
		        <h4 class="item-title">
		             <?php echo wp_kses_post( $title );?>
		        </h4>
		        <p><?php echo wp_kses_post( $data['content'] );?></p>
		    </div>
		</div>
	</div>
</div>