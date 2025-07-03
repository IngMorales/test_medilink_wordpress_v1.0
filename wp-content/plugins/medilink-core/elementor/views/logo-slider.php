<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Medilink_Core;

?>

<div class="sponsonrs-layout1">
	<div class="rt-el-logo-slider owl-wrap rt-owl-nav slider-nav-enabled">
	<?php if ( !empty($data['title']) ): ?>
		<div class="sponsonrs-type-title">
		    <h3><?php echo esc_attr( $data['title'] );?></h3>
		</div>
	<?php endif; ?>
		<div class="owl-theme owl-carousel rt-owl-carousel nav-control-layout1" data-carousel-options="<?php echo esc_attr( $data['owl_data'] );?>">
			<?php foreach ( $data['logos'] as $logo ): ?>
				<?php if ( empty( $logo['image']['id'] ) ) continue; ?>
				<div class="rtin-item sponsonrs-box">
					<?php if ( !empty( $logo['url'] ) ): ?>
						<a href="<?php echo esc_url( $logo['url'] );?>" target="_blank"><?php echo wp_get_attachment_image( $logo['image']['id'], 'full' );?></a>
					<?php else: ?>
						<?php echo wp_get_attachment_image( $logo['image']['id'], 'full' );?>
					<?php endif; ?>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>