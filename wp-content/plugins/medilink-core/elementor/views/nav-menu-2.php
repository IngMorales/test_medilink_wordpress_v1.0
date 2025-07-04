<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Medilink_Core;

?>

<div class="rt-el-nav-menu widget-about-info">
	<?php if ( $data['title'] ): ?>
		<h3 class="widgettitle"><?php echo esc_html( $data['title'] );?></h3>
	<?php endif; ?>
	<?php
	if ( ! empty( $data['menu'] ) ) {
		wp_nav_menu( array( 'menu' => $data['menu'], 'fallback_cb' => '') );
	}
	?>
</div>

