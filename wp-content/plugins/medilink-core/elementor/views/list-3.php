<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Medilink_Core;

use radiustheme\Medilink\Helper;

$lists = array();

foreach ( $data['list'] as $list ) {
	$lists[] = array(	
		'list_title'     	=> $list['list_title'],
		'url'    			=> $list['url'],		
	);
}

?>

<div class="features-box-layout1">
	<ul class="list-info <?php echo esc_html( $data['theme'] );?>">
		<?php foreach ( $lists as $list ): ?>
			<li>
				<?php 
				$attr = '';
				if ( !empty( $list['url']['url'] ) ) {
					$attr  = 'href="' . $list['url']['url']. '"';
					$attr .= !empty( $list['url']['is_external'] ) ? ' target="_blank"' : '';
					$attr .= !empty( $list['url']['nofollow'] ) ? ' rel="nofollow"' : '';
					$rlist = '<a ' . $attr . '>' . $list['list_title'] . '</a>';
				}
				else {
					$rlist = $list['list_title'];
				} ?>
				<?php echo wp_kses_post( $rlist );?>
			</li>
		<?php endforeach; ?>
	</ul>
</div>



