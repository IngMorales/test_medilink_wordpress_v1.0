<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Medilink_Core;

use radiustheme\Medilink\Helper;
$size = MEDILINK_CORE_THEME . '-size3';
$img = wp_get_attachment_image( $data['image']['id'], $size );

?>

<div class="about-box-layout14">
	<div class="item-video">
	    <?php echo wp_kses_post($img); ?>
	     <div class="video-icon"><a class="play-btn popup-video popup-youtube rtin-<?php echo esc_attr( $data['layout'] );?>" href="<?php echo esc_url( $data['videourl']);?>"><i class="fa fa-play" aria-hidden="true"></i>
	    </a></div>
	</div>
</div>