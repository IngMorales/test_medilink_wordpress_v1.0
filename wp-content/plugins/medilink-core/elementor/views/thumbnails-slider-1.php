<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */


namespace radiustheme\Medilink_Core;

use radiustheme\Medilink\Helper;
use Elementor\Utils;
use Elementor\Group_Control_Image_Size;

extract($data);

?>

<div class="slide-cont rt-thumbnails-owl-carousel">
	  <div class="thumbnails-owl-carousel owl-carousel">			
	<?php foreach ( $data['img_list'] as $img_list ): ?>
		<?php if ( empty( $img_list['image']['id'] ) ) continue; ?>
		<div class="rtin-item">
			<?php if ( !empty( $img_list['url'] ) ): ?>
				<a href="<?php echo esc_url( $img_list['url'] );?>" target="_blank"><?php echo wp_get_attachment_image( $img_list['image']['id'], 'full' );?></a>
			<?php else: ?>
				<?php echo wp_get_attachment_image( $img_list['image']['id'], 'full' );?>
			<?php endif; ?>
		</div>
		<?php endforeach; ?>
	</div>
</div>

