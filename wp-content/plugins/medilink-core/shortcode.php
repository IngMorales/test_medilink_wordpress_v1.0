<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Medilink_Core;

//ex: [rt-countdown style="1" date="2018/11/29"]

	class ShortCode {		

		function __construct() {
			add_shortcode('rt-countdown', array($this, 'rt_countdown'));			
		}		

		function rt_countdown($atts, $content = null) {
			extract(shortcode_atts(array(					
				'date' =>'',				
				'style' =>'',				
		), $atts));	

		$rtHtml = null;

		if(!empty($date)){
			$edate = date("Y/m/d", strtotime($date));		

		$rtHtml .= ' <div class="rt-shortcode countdown-layout'. $style .'">
		        <div data-countdown="'. $edate .'" class="idcountdown"></div>		   
		</div>';
		return $rtHtml;
		}
	}
}
new ShortCode;



