<?php
/**
 * Mediplus child theme functions and definitions.
 *
 * Add your custom PHP in this file. 
 * Only edit this file if you have direct access to it on your server (to fix errors if they happen).
 */

add_action( 'wp_enqueue_scripts', 'medilink_child_styles', 18 );
function medilink_child_styles() {
	wp_enqueue_style( 'medilink-child-style', get_stylesheet_uri() );
}