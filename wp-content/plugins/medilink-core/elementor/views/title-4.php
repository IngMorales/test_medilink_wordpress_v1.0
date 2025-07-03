<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Medilink_Core;

?>

<div class="rt-el-title section-heading heading-layout4  <?php echo esc_html( $data['theme2'] );?> <?php echo esc_html( $data['style'] );?>">	
        <span class="rtin-beforetitle"><?php echo wp_kses_post( $data['beforetitle'] );?></span>
        <h2 class="rtin-title"><?php echo wp_kses_post( $data['title'] );?></h2>        
        <?php if ($data['subtitle']) { ?>
				<p class="rtin-subtitle"><?php echo wp_kses_post( $data['subtitle'] );?></p>
		<?php } ?>
</div>