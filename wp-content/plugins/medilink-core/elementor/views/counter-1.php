<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */


namespace radiustheme\Medilink_Core;

?>

<div class="progress-box-layout1">
	<div class="inner-item">
			<div class="item-icon">
		<?php if ( $data['icontype'] == 'image' ): ?>
				<?php
				if ( !empty( $data['image']['id'] ) ) {
					echo wp_get_attachment_image( $data['image']['id'], 'full', true );
				}
				?>
			<?php else: ?>
				<i class="<?php echo esc_attr( $data['icon'] );?>" aria-hidden="true"></i>
			<?php endif; ?>
	    </div>
	    <div class="item-content">	           
	        <div class="rt-el-counter rtin-counter counting-text counter"><span class="rt-counter-num" data-num="<?php echo esc_attr( $data['number'] );?>" data-rtspeed="<?php echo esc_attr( $data['speed'] );?>" data-rtsteps="<?php echo esc_attr( $data['steps'] );?>"><?php echo esc_html( $data['number'] );?></span><?php echo esc_html( $data['suffix'] );?></div>

	        	<p><?php echo esc_html( $data['title'] );?></p>
	    </div>
	</div>
</div>

