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

<div class="price-table-layout1">
    <div class="item-wrapper">
        <div class="item-title">
            <h3 class="title-medium color-dark text-uppercase"><?php echo wp_kses_post( $title );?></h3>
        </div>
        <div class="item-price"><?php echo esc_attr($price); ?>
            <span class="currency"><?php echo esc_attr($currency); ?></span>
        </div>
        <div class="item-body">
            <ul>
		     <?php foreach ( $options as $option ): ?>
				<li><?php echo wp_kses_post( $option['option_title'] );?></li>
			<?php endforeach; ?>   
            </ul>
        </div>
        <a href="<?php echo esc_url($buttonurl);?>" title="<?php echo esc_html($buttontext);?>" class="item-btn"><?php echo esc_html( $buttontext);?></a>
    </div>
</div>

