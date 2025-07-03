<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Medilink;

require_once MEDILINK_THEME_INC_DIR . 'helper.php';
Helper::requires( 'class-tgm-plugin-activation.php' );
//Helper::requires( 'activation.php' );
Helper::requires( 'tgm-config.php' );
Helper::requires( 'redux-config.php' );
Helper::requires( 'redux-include.php' );
Helper::requires( 'rdtheme.php' );
Helper::requires( 'general.php' );
Helper::requires( 'scripts.php' );
Helper::requires( 'layout-settings.php' );

// WooCommerce
if ( class_exists( 'WooCommerce' ) ) {
	Helper::requires( 'woo-functions.php', 'woocommerce/custom' );
	Helper::requires( 'woo-hooks.php', 'woocommerce/custom' );
}