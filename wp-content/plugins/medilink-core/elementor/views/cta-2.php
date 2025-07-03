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

if ( !empty( $data['buttontext'] ) ) {
	$btn = '<a class="item-btn" ' . $attr . '>' . $data['buttontext'] . '</a>';
}

$size = 'full';
$img = wp_get_attachment_image( $data['image']['id'], $size );
?>

<div class="call-to-action-wrap-layout4">
    <div class="item-img">
       <?php echo wp_kses_post($img);?>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-8 col-md-12 col-12">
                <div class="call-to-action-box-layout4">
                    <h2 class="item-title"><?php echo esc_attr( $data['title'] );?></h2>
                    <div class="call-to-action-phone">
                        <?php if ($data['callphone']) { ?>
                            <a href="tel:<?php echo esc_attr( $data['callphone'] );?>"><i class="fas fa-phone"></i><?php echo esc_attr( $data['callphone'] );?></a>
                        <?php } ?>
                    </div>
					<?php if ( $btn ): ?>
						<div class="call-to-action-btn">
							<?php echo wp_kses_post( $btn );?>									
						</div>		
					<?php endif; ?>	                 
                </div>
            </div>
        </div>
    </div>
</div>