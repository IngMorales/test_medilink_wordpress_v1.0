<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Medilink_Core;

$attr = '';
if ( !empty( $data['url']['url'] ) ) {
	$attr .= !empty( $data['url']['is_external'] ) ? ' target="_blank"' : '';
	$attr .= !empty( $data['url']['nofollow'] ) ? ' rel="nofollow"' : '';	
}

?>

<div class="call-to-action-box-layout3">
    <div class="single-item">
        <a <?php echo esc_attr($attr);?> href="<?php echo esc_url($data['url']['url']); ?>"><i class="<?php echo esc_attr( $data['icon'] );?>" aria-hidden="true"></i> 
        <?php echo wp_kses_post( $data['title'] );?></a>
    </div>
</div>