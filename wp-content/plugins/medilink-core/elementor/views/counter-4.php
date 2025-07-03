<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */


namespace radiustheme\Medilink_Core;

?>


<div class="progress-box-layout4">
	 <div class="feature-info-layout">
	  <span class="rt-el-counter rtin-counter counting-text counter"><span class="rt-counter-num" data-num="<?php echo esc_attr( $data['number'] );?>" data-rtspeed="<?php echo esc_attr( $data['speed'] );?>" data-rtsteps="<?php echo esc_attr( $data['steps'] );?>"><?php echo esc_html( $data['number'] );?></span><?php echo esc_html( $data['suffix'] );?></span>
	  <?php if( !empty( $data['title'] ) ) : ?>
	  <div class="item-title"><?php echo esc_html( $data['title'] );?></div>
	  <?php endif; if( !empty( $data['content'] ) ) : ?>
	  <p><?php echo esc_html( $data['content'] );?></p>
	  <?php endif; ?>
	</div>
</div>
