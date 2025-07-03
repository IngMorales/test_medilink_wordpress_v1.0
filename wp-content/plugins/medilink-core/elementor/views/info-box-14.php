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

<div class="why-choose-box-6">
	 <a href="<?php echo esc_url($data['url']['url']); ?>" class="choose-icon-box" <?php echo esc_attr($attr);?>>
      <div class="item-icon">
      	<?php if ( $data['icontype'] == 'image' ): ?>
			<?php echo wp_get_attachment_image( $data['image']['id'] );?>
		<?php else: ?>
			<i class="<?php echo esc_attr( $data['icon'] );?>" aria-hidden="true"></i>
		<?php endif; ?>
      </div>
      <div class="item-content"><?php echo wp_kses_post( $data['title'] );?></div>
    </a>
</div>