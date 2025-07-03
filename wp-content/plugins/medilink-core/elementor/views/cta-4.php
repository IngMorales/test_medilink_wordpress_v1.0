<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */


namespace radiustheme\Medilink_Core;

$btn = $attr = '';


if ( !empty( $data['buttonurl']['url'] ) ) {
	$attr  = 'href="' . $data['buttonurl']['url'] . '"';
	$attr .= !empty( $data['buttonurl']['is_external'] ) ? ' target="_blank"' : '';
	$attr .= !empty( $data['buttonurl']['nofollow'] ) ? ' rel="nofollow"' : '';
}

if( $data['btn_icon'] == 'yes'){
    $icon_class = '<i class="fas fa-angle-right"></i>';
}else{
    $icon_class = '';
}

if ( !empty( $data['buttontext'] ) ) {
	$btn = '<a class="item-btn" ' . $attr . '>' . $data['buttontext']. $icon_class . '</a>';
}

$size = 'full';
$img = wp_get_attachment_image( $data['image']['id'], $size );

?>

<div class="call-to-action-box-layout6">
    <?php if ( $data['subtitle'] ): ?>
        <p class="item-sub-title"><?php echo wp_kses_post( $data['subtitle'] );?></p>
    <?php endif; ?>   
     <?php if ( $data['title'] ): ?>
     <h2 class="item-title"><?php echo wp_kses_post( $data['title'] );?></h2>
         <?php endif; ?> 
    <?php if ( $btn ): ?>
    <div class="call-to-action-btn">
        <?php echo wp_kses_post( $btn );?>                                  
    </div>      
    <?php endif; ?>   
</div>

