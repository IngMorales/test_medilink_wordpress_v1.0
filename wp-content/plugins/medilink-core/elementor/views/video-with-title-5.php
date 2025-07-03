<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Medilink_Core;

use radiustheme\Medilink\Helper;

$size = MEDILINK_CORE_THEME . '-size3';
$img = wp_get_attachment_image( $data['image']['id'], 'full' );

?>
<div class="video-box1 wow fadeInDown" data-wow-delay=".3s">
    <div class="item-img">
      <?php echo wp_kses_post($img); ?>
      <div class="play-icon">
        <a href="<?php echo esc_url( $data['videourl']);?>" class="item-icon popup-youtube"><span><i class="fas fa-play"></i></span></a>
      </div>
    </div>
</div>