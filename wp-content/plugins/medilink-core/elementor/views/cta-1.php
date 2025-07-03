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

?>

<div class="rt-el-cta-1 rt-<?php echo wp_kses_post( $data['theme'] );?> rt-<?php echo wp_kses_post( $data['themecolor'] );?>">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-sm-12 col-xs-12">
				<h3 class="rtin-title"><?php echo wp_kses_post( $data['title'] );?></h3>
			</div>
			<div class="col-md-4 col-sm-12 col-xs-12 v-center-item">
				<?php if ( $btn ): ?>
					<div class="rtin-button-mid"><?php echo wp_kses_post( $btn );?></div>		
				<?php endif; ?>
			</div>
		</div>		
	</div>
</div>