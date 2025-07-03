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
		'list_day'     			=> $list['list_day'],
		'to_list'    			=> $list['to_list'],		
	);
}

?>

<div class="opening-hours-info-list">
	<div class="opening-hours-head">
		<span class="sub-title rtin-sub-title"><?php echo esc_html( $data['sub_title'] );?></span>
		<h2 class="opening-hours-title"><?php echo esc_html( $data['title'] );?></h2>
		<i class="far fa-clock"></i>
	</div>
	<div class="opening-hours-info">
		<?php foreach ( $lists as $list ): ?>			
			<ul>
				<li><?php echo wp_kses_post( $list['list_day'] );?></li>
				<li><?php echo wp_kses_post( $list['to_list'] );?></li>
			</ul>		
		<?php endforeach; ?>
	</div>
</div>

