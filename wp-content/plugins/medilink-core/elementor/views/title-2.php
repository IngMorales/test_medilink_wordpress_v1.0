<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Medilink_Core;

?>

<div class="section-heading heading-dark text-left heading-layout1">
    <h2 class="rtin-title"><?php echo wp_kses_post( $data['title'] );?></h2>
    <?php if ($data['subtitle']) { ?>
		<p class="rtin-subtitle"><?php echo wp_kses_post( $data['subtitle'] );?></p> 
    <?php } ?>
 </div>