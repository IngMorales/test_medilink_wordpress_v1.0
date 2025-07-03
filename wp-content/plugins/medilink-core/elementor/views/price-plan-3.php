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
$period 	= $data['period'];
$buttontext = $data['buttontext'];
$buttonurl 	= $data['buttonurl'];

foreach ( $data['options3'] as $option ) {
	$options[] = array(				
		'option_title'   => $option['option_title'],
    'icon'          => $option['icon'],	         
	);
}

?>

<div class="price-table-layout3">
    <div class="tpt-col-inner">
        <div class="tpt-header">
            <div class="tpt-header-top">
                <h3 class="tpt-title"><?php echo wp_kses_post( $title );?></h3>
            </div>
            <div class="tpt-header-bottom">
                <span class="currency"><?php echo esc_attr($currency); ?></span>
                <span class="amount"><?php echo esc_attr($price); ?></span>
                <small class="period"> <?php echo esc_attr($period); ?></small>
            </div>
        </div>
        <div class="tpt-body">
            <ul class="tpt-body-items">                
            <?php foreach ( $options as $option ): ?>                                          
               <li class="tpt-body-item">
                   <span class="tpt-body-item-icon">
                       <i class="<?php echo esc_attr( $option['icon'] );?>" aria-hidden="true"></i>
                   </span>
                   <div class="tpt-body-item-content"> <?php echo wp_kses_post( $option['option_title'] );?></div>
               </li>
           <?php endforeach; ?>
            </ul>
        </div>
        <div class="tpt-footer">
            <a href="<?php echo esc_url($buttonurl);?>" class="item-btn"><?php echo esc_html( $buttontext);?></a>
        </div>
    </div>
 </div>