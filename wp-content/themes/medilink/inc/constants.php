<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Medilink;

define( __NAMESPACE__ . '\NS',    __NAMESPACE__ . '\\' );

$theme_data = wp_get_theme( get_template() );
define( NS . 'MEDILINK_THEME_VERSION',     ( WP_DEBUG ) ? time() : $theme_data->get( 'Version' ) );
define( NS . 'MEDILINK_THEME_AUTHOR_URI',  $theme_data->get( 'AuthorURI' ) );
define( NS . 'MEDILINK_THEME_PREFIX',      'medilink' );
define( NS . 'MEDILINK_THEME_PREFIX_VAR',  'medilink' );
define( NS . 'MEDILINK_WIDGET_PREFIX',     'medilink' );
define( NS . 'MEDILINK_THEME_CPT_PREFIX',  'medilink' );

// DIR
define( NS . 'MEDILINK_THEME_BASE_DIR',    get_template_directory(). '/' );
define( NS . 'MEDILINK_THEME_INC_DIR',     MEDILINK_THEME_BASE_DIR . 'inc/' );
define( NS . 'MEDILINK_THEME_VIEW_DIR',    MEDILINK_THEME_INC_DIR . 'views/' );
define( NS . 'MEDILINK_THEME_PLUGINS_DIR', MEDILINK_THEME_BASE_DIR . 'inc/plugin-bundle/' );