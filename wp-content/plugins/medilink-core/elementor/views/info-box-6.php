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

<div class="about-box-layout2">
    <ul>
        <li><a href="<?php echo esc_url($data['url']['url']); ?>" <?php echo esc_attr($attr);?>>
        	<?php if ( $data['icontype'] == 'image' ): ?>
				<?php echo wp_get_attachment_image( $data['image']['id'] );?>
			<?php else: ?>
				<i class="<?php echo esc_attr( $data['icon'] );?>" aria-hidden="true"></i>
			<?php endif; ?>
		<?php echo wp_kses_post( $data['title'] );?></a></li>       
    </ul>
</div>