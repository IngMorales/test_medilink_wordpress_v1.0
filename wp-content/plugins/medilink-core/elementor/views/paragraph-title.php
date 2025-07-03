<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */


namespace radiustheme\Medilink_Core;  

?>

<div class="rt-el-paragraph-title">
    <<?php echo esc_html( $data['title_tag'] );?> class="rtin-title"><?php echo wp_kses_post( $data['title'] );?></<?php echo esc_html( $data['title_tag'] );?>>
	<?php if ($data['subtitle']): ?>
		<div class="sub-title"><?php echo wp_kses_post( $data['subtitle'] );?></div>
	<?php endif ?> 
    <?php if ($data['paragraph']): ?>
        <p class="rtin-paragraph"><?php echo wp_kses_post( $data['paragraph'] );?></p>            
    <?php endif ?> 
</div>