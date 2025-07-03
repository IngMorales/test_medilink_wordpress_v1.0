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

<div class="price-table-layout2">
    <div class="tpt-header">
        <div class="tpt-header-bottom">
            <span class="currency"><?php echo esc_attr($currency); ?></span>
            <span class="amount"><?php echo esc_attr($price); ?></span>
        </div>
        <div class="tpt-header-top">
            <h3 class="tpt-title"><?php echo wp_kses_post( $title );?></h3>
        </div>
    </div>
    <div class="tpt-body">
        <ul class="tpt-body-items">
            <?php foreach ( $options as $option ): ?>                    
                <li class="tpt-body-item">
                 <span class="tpt-body-item-icon"></span>
                 <div class="tpt-body-item-content"><?php echo wp_kses_post( $option['option_title'] );?></div>
                </li>
            <?php endforeach; ?>                      
        </ul>
    </div>
    <div class="tpt-footer">
        <a href="<?php echo esc_url($buttonurl);?>" class="item-btn"><?php echo esc_html( $buttontext);?></a>
    </div>
</div>

