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
	$btn = '<a class="item-btn" ' . $attr . '>' . $data['buttontext'] . '<i class="fas fa-long-arrow-alt-right"></i></a>';
}

?>

<div class="rt-el-twt-3">	
	<div class="item-content">
		<?php if($data['title']){ ?>
		<h2 class="item-title"><?php echo wp_kses_post( $data['title'] );?></h2>
		<?php } ?>
		<?php if($data['subtitle']){ ?>
		<div class="sub-title"><?php echo wp_kses_post( $data['subtitle'] );?></div>
		<?php } ?>
		<?php if($data['content']){ ?>
		<?php echo wp_kses_post( $data['content'] );?>
		<?php } ?>
		<?php if ( $btn ): ?>
		<div class="rtin-button"><?php echo wp_kses_post( $btn );?></div>		
		<?php endif; ?>
	</div>
</div>

