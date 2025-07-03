<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Medilink_Core;

use radiustheme\Medilink\Helper;

$options = array();
$title 		= $data['title'];
$price 		= $data['price'];
$currency 	= $data['currency'];
$buttontext = $data['buttontext'];
$buttonurl 	= $data['buttonurl'];

foreach ( $data['options'] as $option ) {
	$options[] = array(				
		'option_title'   => $option['option_title'],		
	);
}

?>

<div class="pricing-box-layout1">
	<h3><?php echo wp_kses_post( $title );?></h3>
	<div class="pricing title-bar-primary6">
	    <span class="currency"><?php echo esc_attr($currency); ?></span>
	    <span class="amount"><?php echo esc_attr($price); ?></span>
	</div>
	<div class="box-content">
	    <ul>
	        <?php foreach ( $options as $option ): ?>
				<li><?php echo wp_kses_post( $option['option_title'] );?></li>
			<?php endforeach; ?>   
	    </ul>
	    <a href="<?php echo esc_url($buttonurl);?>" title="<?php echo esc_html($buttontext);?>" class="item-btn"><?php echo esc_html( $buttontext);?></a> 
	</div>
</div>