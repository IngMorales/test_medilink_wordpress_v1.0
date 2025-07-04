<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Medilink;


class Constants {

  public static $theme_version;
  public static $theme_author_uri;
  public static $theme_prefix;
  public static $theme_options;
  public static $theme_ad_options;
  public static $widget_prefix;
  public static $theme_namespace;

  public static $theme_base_dir;
  public static $theme_inc_dir;
  public static $theme_vendor_dir;
  public static $theme_plugins_bundle_dir;


  public function __construct() {
    $theme_data                      = wp_get_theme( get_template() );
    self::$theme_version             = ( WP_DEBUG ) ? time() : $theme_data->get( 'Version' );
    self::$theme_author_uri          = $theme_data->get( 'AuthorURI' );
    self::$theme_prefix              = 'medilink';
    self::$widget_prefix             = 'medilink';
    self::$theme_options             = 'medilink';
    self::$theme_ad_options          = 'medilink_ads';
    self::$theme_namespace           = "radiustheme\\medilink\\";
    self::$theme_base_dir            = get_template_directory(). '/';
    self::$theme_inc_dir             = self::$theme_base_dir . 'inc/';
    self::$theme_vendor_dir          = self::$theme_inc_dir . 'vendor/';
    self::$theme_plugins_bundle_dir  = self::$theme_inc_dir . 'plugin-bundle/';
  }
}

new Constants;
