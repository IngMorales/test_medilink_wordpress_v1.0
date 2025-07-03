<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Medilink;

use \Redux;

if ( ! class_exists( 'Redux' ) ) {
    return;
}

$opt_name = MEDILINK_THEME_PREFIX_VAR;

$theme = wp_get_theme();
$args = array(
    // TYPICAL -> Change these values as you need/desire
    'opt_name'             => $opt_name,
    // This is where your data is stored in the database and also becomes your global variable name.
    'disable_tracking'     => true,
    'display_name'         => $theme->get( 'Name' ),
    // Name that appears at the top of your panel
    'display_version'      => $theme->get( 'Version' ),
    // Version that appears at the top of your panel
    'menu_type'            => 'submenu',
    //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
    'allow_sub_menu'       => true,
    // Show the sections below the admin menu item or not
    'menu_title'           =>esc_html__( 'Theme Options', 'medilink' ),
    'page_title'           =>esc_html__( 'Theme Options', 'medilink' ),
    // You will need to generate a Google API key to use this feature.
    // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
    //'google_api_key'       => 'AIzaSyC2GwbfJvi-WnYpScCPBGIUyFZF97LI0xs',
    // Set it you want google fonts to update weekly. A google_api_key value is required.
    'google_update_weekly' => false,
    // Must be defined to add google fonts to the typography module
    'async_typography'     => true,
    // Use a asynchronous font on the front end or font string
    //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
    'admin_bar'            => true,
    // Show the panel pages on the admin bar
    'admin_bar_icon'       => 'dashicons-menu',
    // Choose an icon for the admin bar menu
    'admin_bar_priority'   => 50,
    // Choose an priority for the admin bar menu
    'global_variable'      => '',
    // Set a different name for your global variable other than the opt_name
    'dev_mode'             => false,
    'forced_dev_mode_off'  => false,
    // Show the time the page took to load, etc
    'update_notice'        => false,
    // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
    'customizer'           => true,
    // Enable basic customizer support
    //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
    //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

    // OPTIONAL -> Give you extra features
    'page_priority'        => null,
    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
    'page_parent'          => 'themes.php',
    // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
    'page_permissions'     => 'manage_options',
    // Permissions needed to access the options panel.
    'menu_icon'            => '',
    // Specify a custom URL to an icon
    'last_tab'             => '',
    // Force your panel to always open to a specific tab (by id)
    'page_icon'            => 'icon-themes',
    // Icon displayed in the admin panel next to your menu_title
    'page_slug'            => MEDILINK_THEME_PREFIX . '-options',
    // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
    'save_defaults'        => true,
    // On load save the defaults to DB before user clicks save or not
    'default_show'         => true,
    // If true, shows the default value next to each field that is not the default value.
    'default_mark'         => '',
    // What to print by the field's title if the value shown is default. Suggested: *
    'show_import_export'   => true,
    // Shows the Import/Export panel when not used as a field.

    // CAREFUL -> These options are for advanced use only
    'transient_time'       => 60 * MINUTE_IN_SECONDS,
    'output'               => true,
    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
    'output_tag'           => true,
    // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
    // 'footer_credit'     => '',
    // Disable the footer credit of Redux. Please leave if you can help it.

    // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
    'database'             => '',
    // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
    'use_cdn'              => true,
    // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.
);

Redux::setArgs( $opt_name, $args );


// ------ Custom Functions -----------

// Generate Common post type fields
function rdtheme_redux_post_type_fields( $medilink ){
    return array(
        array(
            'id'       => $medilink. '_layout',
            'type'     => 'button_set',
            'title'    =>esc_html__( 'Layout', 'medilink' ),
            'options'  => array(
                'left-sidebar'  =>esc_html__( 'Left Sidebar', 'medilink' ),
                'full-width'    =>esc_html__( 'Full Width', 'medilink' ),
                'right-sidebar' =>esc_html__( 'Right Sidebar', 'medilink' ),
            ),
            'default' => 'right-sidebar'
        ),
        array(
            'id'       => $medilink. '_sidebar',
            'type'     => 'select',
            'title'    =>esc_html__( 'Custom Sidebar', 'medilink' ),
            'options'  => Helper::custom_sidebar_fields(),
            'default'  => 'sidebar',
            'required' => array( $medilink. '_layout', '!=', 'full-width' ),
        ),
        array(
            'id'       => $medilink. '_padding_top',
            'type'     => 'text',
            'title'    =>esc_html__( 'Content Padding Top', 'medilink' ),
            'validate' => 'numeric',
            'default'  => '95',
        ),
        array(
            'id'       => $medilink. '_padding_bottom',
            'type'     => 'text',
            'title'    =>esc_html__( 'Content Padding Bottom', 'medilink' ),
            'validate' => 'numeric',
            'default'  => '95'
        ),
        array(
            'id'       => $medilink. '_banner',
            'type'     => 'switch',
            'title'    =>esc_html__( 'Banner', 'medilink' ),
            'on'       =>esc_html__( 'Enabled', 'medilink' ),
            'off'      =>esc_html__( 'Disabled', 'medilink' ),
            'default'  => true,
        ),
        array(
            'id'       => $medilink. '_breadcrumb',
            'type'     => 'switch',
            'title'    =>esc_html__( 'Breadcrumb', 'medilink' ),
            'on'       =>esc_html__( 'Enabled', 'medilink' ),
            'off'      =>esc_html__( 'Disabled', 'medilink' ),
            'default'  => true,
            'required' => array( $medilink. '_banner', 'equals', true )
        ),
        array(
            'id'       => $medilink. '_bgtype',
            'type'     => 'button_set',
            'title'    =>esc_html__( 'Banner Background Type', 'medilink' ),
            'options'  => array(
                'bgimg'    =>esc_html__( 'Background Image', 'medilink' ),
                'bgcolor'  =>esc_html__( 'Background Color', 'medilink' ),
            ),
            'default' => 'bgimg',
            'required' => array( $medilink. '_banner', 'equals', true )
        ),
        array(
            'id'       => $medilink. '_bgimg',
            'type'     => 'media',
            'title'    =>esc_html__( 'Banner Background Image', 'medilink' ),
            'default'  => array(
                'url'=> Helper::get_img( 'banner.jpg' )
            ),
            'required' => array( $medilink. '_bgtype', 'equals', 'bgimg' )
        ), 
        array(
            'id'       => $medilink. '_bgcolor',
            'type'     => 'color',
            'title'    =>esc_html__('Banner Background Color', 'medilink'), 
            'validate' => 'color',
            'transparent' => false,
            'default' => '#396cf0',
            'required' => array( $medilink. '_bgtype', 'equals', 'bgcolor' ),
        ), 
        array(
            'id'       => $medilink. '_inner_padding_top',
            'type'     => 'text',
            'title'    =>esc_html__( 'Banner Padding Top', 'medilink' ),
            'validate' => 'numeric',
            'default'  => '100',
        ),
        array(
            'id'       => $medilink. '_inner_padding_bottom',
            'type'     => 'text',
            'title'    =>esc_html__( 'Banner Padding Bottom', 'medilink' ),
            'validate' => 'numeric',
            'default'  => '100'
        ),


    );
}

// ------ Fields -----------

Redux::setSection( $opt_name,
    array(
        'title'   =>esc_html__( 'General', 'medilink' ),
        'id'      => 'general_section',
        'heading' => '',
        'icon'    => 'el el-network',
        'fields'  => array(            
            array(
                'id'       => 'logo',
                'type'     => 'media',
                'title'    =>esc_html__( 'Main Logo', 'medilink' ),
                'default'  => array(
                    'url'=> Helper::get_img( 'logo-dark.png' )
                ),
            ),
            array(
                'id'       => 'logo_light',
                'type'     => 'media',
                'title'    =>esc_html__( 'Light Logo', 'medilink' ),
                'default'  => array(
                    'url'=> Helper::get_img( 'logo-light.png' )
                ),
                'subtitle' =>esc_html__( 'Used when Transparent Header is enabled', 'medilink' ),
            ),
            array(
                'id'       => 'logo_width',
                'type'     => 'select',
                'title'    =>esc_html__( 'Logo Area Width', 'medilink'), 
                'subtitle' =>esc_html__( 'Width is defined by the number of bootstrap columns. Please note, navigation menu width will be decreased with the increase of logo width', 'medilink' ),
                'options'  => array(
                    '1' =>esc_html__( '1 Column', 'medilink' ),
                    '2' =>esc_html__( '2 Column', 'medilink' ),
                    '3' =>esc_html__( '3 Column', 'medilink' ),
                    '4' =>esc_html__( '4 Column', 'medilink' ),
                ),
                'default'  => '2',
            ),       
            array(
                'id'       => 'preloader',
                'type'     => 'switch',
                'title'    =>esc_html__( 'Preloader', 'medilink' ),
                'on'       =>esc_html__( 'Enabled', 'medilink' ),
                'off'      =>esc_html__( 'Disabled', 'medilink' ),
                'default'  => true,
            ),
            array(
                'id'       => 'preloader_image',
                'type'     => 'media',
                'title'    =>esc_html__( 'Preloader Image', 'medilink' ),
                'subtitle' =>esc_html__( 'Please upload your choice of preloader image. Transparent GIF format is recommended', 'medilink' ),
                'default'  => array(
                    'url'=> Helper::get_img( 'preloader.gif' )
                ),
                'required' => array( 'preloader', 'equals', true )
            ),
            array(
                'id'       => 'preloader_bg_color',
                'type'     => 'color',
                'transparent' => false,
                'title'    =>esc_html__( 'Preloader background Color', 'medilink' ),
                'default'  => '#ffffff',
                'required' => array( 'preloader', 'equals', true )
            ),
            array(
                'id'       => 'back_to_top',
                'type'     => 'switch',
                'title'    =>esc_html__( 'Back to Top Arrow', 'medilink' ),
                'on'       =>esc_html__( 'Enabled', 'medilink' ),
                'off'      =>esc_html__( 'Disabled', 'medilink' ),
                'default'  => true,
            ),
            array(
                'id'       => 'inner_fix_banner',
                'type'     => 'switch',
                'title'    =>esc_html__( 'Inner Banner Parallax', 'medilink' ),
                'on'       =>esc_html__( 'Enabled', 'medilink' ),
                'off'      =>esc_html__( 'Disabled', 'medilink' ),
                'default'  => true,
            ),
            array(
                'id'       => 'no_preview_image',
                'type'     => 'media',
                'title'    =>esc_html__( 'Alternative Preview Image', 'medilink' ),
                'subtitle' =>esc_html__( 'This image will be used as preview image in some archive pages if no featured image exists', 'medilink' ),
                'default'  => array(
                    'url'=> Helper::get_img( 'noimage.jpg' )
                ),
            ),
             array(
                'id'       => 'doctors_title',
                'type'     => 'text',
                'title'    => esc_html__( 'Doctors Admin Title', 'medilink' ),               
                'default'  => 'Doctors',
            ),

            array(
                'id'       => 'doctors_slug',
                'type'     => 'text',
                'title'    => esc_html__( 'Doctors Slug', 'medilink' ),
                'subtitle' => esc_html__( 'Will be used in URL', 'medilink' ),
                'default'  => 'doctors',
            ),
            array(
                'id'       => 'doctors_cat_slug',
                'type'     => 'text',
                'title'    => esc_html__( 'Doctors Category Slug', 'medilink' ),
                'subtitle' => esc_html__( 'Will be used in URL', 'medilink' ),
                'default'  => 'doctors-cat',
            ),

             array(
                'id'       => 'gallery_title',
                'type'     => 'text',
                'title'    => esc_html__( 'Gallery Admin Title', 'medilink' ),               
                'default'  => 'Gallery',
            ),

            array(
                'id'       => 'gallery_slug',
                'type'     => 'text',
                'title'    => esc_html__( 'Gallery Slug', 'medilink' ),
                'subtitle' => esc_html__( 'Will be used in URL', 'medilink' ),
                'default'  => 'gallery',
            ),
            array(
                'id'       => 'gallery_cat_slug',
                'type'     => 'text',
                'title'    => esc_html__( 'Gallery Category Slug', 'medilink' ),
                'subtitle' => esc_html__( 'Will be used in URL', 'medilink' ),
                'default'  => 'gallery-cat',
            ), 
            array(
                'id'       => 'departments_title',
                'type'     => 'text',
                'title'    => esc_html__( 'Departments Admin Title', 'medilink' ),               
                'default'  => 'Departments',
            ),
            array(
                'id'       => 'departments_slug',
                'type'     => 'text',
                'title'    => esc_html__( 'Departments Slug', 'medilink' ),
                'subtitle' => esc_html__( 'Will be used in URL', 'medilink' ),
                'default'  => 'departments',
            ),
         
            array(
                'id'       => 'departments_cat_slug',
                'type'     => 'text',
                'title'    => esc_html__( 'Departments Category Slug', 'medilink' ),
                'subtitle' => esc_html__( 'Will be used in URL', 'medilink' ),
                'default'  => 'departments-cat',
            ), 
            array(
                'id'       => 'services_title',
                'type'     => 'text',
                'title'    => esc_html__( 'Services Admin Title', 'medilink' ),               
                'default'  => 'Services',
            ),
             array(
                'id'       => 'services_slug',
                'type'     => 'text',
                'title'    => esc_html__( 'Services Slug', 'medilink' ),
                'subtitle' => esc_html__( 'Will be used in URL', 'medilink' ),
                'default'  => 'services',
            ),
            array(
                'id'       => 'services_cat_slug',
                'type'     => 'text',
                'title'    => esc_html__( 'Services Category Slug', 'medilink' ),
                'subtitle' => esc_html__( 'Will be used in URL', 'medilink' ),
                'default'  => 'services-cat',
            ),            
            array(
                'id' => 'doctors_time_format',
                'type' => 'radio',
                'title' =>esc_html__( 'Doctors Time Format', 'medilink' ),
                'options' => array(
                '12' =>esc_html__( '12-hour', 'medilink' ),
                '24' =>esc_html__( '24-hour', 'medilink' ) 
                ),
                'default' => '12' 
            ) ,         
        )            
    ) 
);

Redux::setSection( $opt_name,
    array(
        'title'   =>esc_html__( 'Colors', 'medilink' ),
        'id'      => 'color_section',
        'heading' => '',
        'icon'    => 'el el-eye-open',
        'fields'  => array(
            array(
                'id'       => 'section-color-sitewide',
                'type'     => 'section',
                'title'    =>esc_html__( 'Sitewide Colors', 'medilink' ),
                'indent'   => true,
            ),
            array(
                'id'       => 'primary_color',
                'type'     => 'color',
                'transparent' => false,
                'title'    =>esc_html__( 'Primary Color', 'medilink' ),
                'default'  => '#396cf0',
            ),
            array(
                'id'       => 'primary_txt_color',
                'type'     => 'color',
                'transparent' => false,
                'title'    =>esc_html__( 'Primary Text Color', 'medilink' ),
                'default'  => '#ffffff',
            ),
            array(
                'id'       => 'secondery_color',
                'type'     => 'color',
                'transparent' => false,
                'title'    =>esc_html__( 'Secondery Color', 'medilink' ),
                'default'  => '#1c58ef',
            ),
            array(
                'id'       => 'sitewide_color',
                'type'     => 'button_set',
                'title'    =>esc_html__( 'Other Colors', 'medilink' ),
                'options'  => array(
                    'primary' =>esc_html__( 'Primary Color', 'medilink' ),
                    'custom'  =>esc_html__( 'Custom', 'medilink' ),
                ),
                'default' => 'primary',
                'subtitle' =>esc_html__( 'Selecting Primary Color will hide some color options from the below settings and replace them with Primary/Secondery Color', 'medilink' ),
            ),
            array(
                'id'       => 'section-color-topbar',
                'type'     => 'section',
                'title'    =>esc_html__( 'Top Bar', 'medilink' ),
                'indent'   => true,
            ),
            array(
                'id'       => 'top_bar_bgcolor',
                'type'     => 'color',
                'transparent' => false,
                'title'    =>esc_html__( 'Top Bar Background Color', 'medilink' ),
                'default'  => '#ffffff',
            ),
            array(
                'id'       => 'top_bar_color',
                'type'     => 'color',
                'transparent' => false,
                'title'    =>esc_html__( 'Top Bar Text Color', 'medilink' ),
                'default'  => '#444444',
            ),

            array(
                'id'       => 'top_bar_icon_color',
                'type'     => 'color',
                'transparent' => false,
                'title'    =>esc_html__( 'Top Bar Icon Color', 'medilink' ),
                'default'  => '#2055e4',
                'required' => array( 'sitewide_color', '=', 'custom' )
            ), 
            array(
                'id'       => 'top_bar_icon_color_hover',
                'type'     => 'color',
                'transparent' => false,
                'title'    =>esc_html__( 'Top Bar Icon Color Hover', 'medilink' ),
                'default'  => '#ffffff',
                'required' => array( 'sitewide_color', '=', 'custom' )
            ),
            array(
                'id'       => 'top_bar_color_tr',
                'type'     => 'color',
                'transparent' => false,
                'title'    =>esc_html__( 'Transparent Top Bar Text Color', 'medilink' ),
                'subtitle' =>esc_html__( 'Applied when Transparent Header is enabled', 'medilink' ),
                'default'  => '#ffffff',
            ),
            array(
                'id'       => 'top_bar_social_color',
                'type'     => 'color',
                'transparent' => false,
                'title'    =>esc_html__( 'Top Bar Social Color', 'medilink' ),               
                'default'  => '#8a8a8a',
            ), 
             array(
                'id'       => 'top_bar_social_hover__color',
                'type'     => 'color',
                'transparent' => false,
                'title'    =>esc_html__( 'Top Bar Social Hover Color', 'medilink' ),               
                'default'  => '#ffffff',
            ),

            array(
                'id'       => 'section-color-menu',
                'type'     => 'section',
                'title'    =>esc_html__( 'Main Menu', 'medilink' ),
                'indent'   => true,
            ),
            array(
                'id'       => 'menu_color',
                'type'     => 'color',
                'transparent' => false,
                'title'    =>esc_html__( 'Menu Color', 'medilink' ),
                'default'  => '#111111',
            ),
            array(
                'id'       => 'menu_hover_color',
                'type'     => 'color',
                'transparent' => false,
                'title'    =>esc_html__( 'Menu Hover Color', 'medilink' ),
                'default'  => '#2055e4',
                'required' => array( 'sitewide_color', '=', 'custom' )
            ),
            array(
                'id'       => 'menu_color_tr',
                'type'     => 'color',
                'transparent' => false,
                'title'    =>esc_html__( 'Transparent Menu Color', 'medilink' ),
                'subtitle' =>esc_html__( 'Applied when Transparent Header is enabled', 'medilink' ),
                'default'  => '#ffffff',
            ),
            array(
                'id'       => 'menu_hover_color_tr',
                'type'     => 'color',
                'transparent' => false,
                'title'    =>esc_html__( 'Transparent Menu Hover Color', 'medilink' ),
                'subtitle' =>esc_html__( 'Applied when Transparent Header is enabled', 'medilink' ),
                'default'  => '#2055e4',
                'required' => array( 'sitewide_color', '=', 'custom' )
            ),
            array(
                'id'       => 'section-color-submenu',
                'type'     => 'section',
                'title'    =>esc_html__( 'Sub Menu', 'medilink' ),
                'indent'   => true,
            ),
            array(
                'id'       => 'submenu_color',
                'type'     => 'color',
                'transparent' => false,
                'title'    =>esc_html__( 'Submenu Color', 'medilink' ),
                'default'  => '#111111',
            ), 
            array(
                'id'       => 'submenu_bgcolor',
                'type'     => 'color',
                'transparent' => false,
                'title'    =>esc_html__( 'Submenu Background Color', 'medilink' ),
                'default'  => '#ffffff',
                'required' => array( 'sitewide_color', '=', 'custom' )
            ),  
            array(
                'id'       => 'submenu_hover_color',
                'type'     => 'color',
                'transparent' => false,
                'title'    =>esc_html__( 'Submenu Hover Color', 'medilink' ),
                'default'  => '#ffffff',
            ), 
            array(
                'id'       => 'submenu_hover_bgcolor',
                'type'     => 'color',
                'transparent' => false,
                'title'    =>esc_html__( 'Submenu Hover Background Color', 'medilink' ),
                'default'  => '#f0f3f8',
                'required' => array( 'sitewide_color', '=', 'custom' )
            ),
            array(
                'id'       => 'section-color-banner',
                'type'     => 'section',
                'title'    =>esc_html__( 'Banner and Breadcrumb', 'medilink' ),
                'indent'   => true,
            ),
            array(
                'id'       => 'banner_heading_color',
                'type'     => 'color',
                'transparent' => false,
                'title'    => esc_html__( 'Banner Heading Color', 'medilink' ),
                'default'  => '#fff',
            ), 
            array(
                'id'       => 'breadcrumb_link_color',
                'type'     => 'color',
                'transparent' => false,
                'title'    =>esc_html__( 'Breadcrumb Link Color', 'medilink' ),
                'default'  => '#c5d5ff',
                'required' => array( 'sitewide_color', '=', 'custom' )
            ),
            array(
                'id'       => 'breadcrumb_link_hover_color',
                'type'     => 'color',
                'transparent' => false,
                'title'    =>esc_html__( 'Breadcrumb Link Hover Color', 'medilink' ),
                'default'  => '#fff',
            ),
            array(
                'id'       => 'breadcrumb_active_color',
                'type'     => 'color',
                'transparent' => false,
                'title'    =>esc_html__( 'Active Breadcrumb Color', 'medilink' ),
                'default'  => '#fff',
            ),
            array(
                'id'            => 'breadcrumb_seperator_color',
                'type'          => 'color',
                'transparent'   => false,
                'title'         => esc_html__( 'Breadcrumb Seperator Color', 'medilink' ),
                'default'       => '#c5d5ff',
            ),
            array(
                'id'       => 'section-color-footer',
                'type'     => 'section',
                'title'    =>esc_html__( 'Footer Area', 'medilink' ),
                'indent'   => true,
            ),
            array(
                'id'       => 'footer_bgcolor',
                'type'     => 'color',
                'transparent' => false,
                'title'    =>esc_html__( 'Footer Background Color', 'medilink' ),
                'default'  => '#111111',
            ), 
            array(
                'id'       => 'footer_title_color',
                'type'     => 'color',
                'transparent' => false,
                'title'    =>esc_html__( 'Footer Title Text Color', 'medilink' ),
                'default'  => '#ffffff',
            ), 
            array(
                'id'       => 'footer_color',
                'type'     => 'color',
                'transparent' => false,
                'title'    =>esc_html__( 'Footer Body Text Color', 'medilink' ),
                'default'  => '#e3e3e3',
            ), 
            array(
                'id'       => 'footer_link_color',
                'type'     => 'color',
                'transparent' => false,
                'title'    =>esc_html__( 'Footer Body Link Color', 'medilink' ),
                'default'  => '#e3e3e3',
            ), 
            array(
                'id'       => 'footer_link_hover_color',
                'type'     => 'color',
                'transparent' => false,
                'title'    =>esc_html__( 'Footer Body Link Hover Color', 'medilink' ),
                'default'  => '#2055e4',
                'required' => array( 'sitewide_color', '=', 'custom' )
            ),
            array(
                'id'       => 'section-color-copyright',
                'type'     => 'section',
                'title'    =>esc_html__( 'Copyright Area', 'medilink' ),
                'indent'   => true,
            ),
            array(
                'id'       => 'copyright_bgcolor',
                'type'     => 'color',
                'transparent' => false,
                'title'    =>esc_html__( 'Copyright Background Color', 'medilink' ),
                'default'  => '#111111',
            ),
            array(
                'id'       => 'copyright_color',
                'type'     => 'color',
                'transparent' => false,
                'title'    =>esc_html__( 'Copyright Text Color', 'medilink' ),
                'default'  => '#8f8f8f',
            ),
            array(
                'id'       => 'section-color-error',
                'type'     => 'section',
                'title'    =>esc_html__( 'Error Page', 'medilink' ),
                'indent'   => true,
            ),
            array(
                'id'       => 'error_bodybg',
                'type'     => 'color',
                'transparent' => false,
                'title'    =>esc_html__( 'Body Background Color', 'medilink' ),
                'default'  => '#f1f7fa',
                'required' => array( 'sitewide_color', '=', 'custom' )
            ),
            array(
                'id'       => 'error_text1_color',
                'type'     => 'color',
                'transparent' => false,
                'title'    =>esc_html__( 'Body Text 1 Color', 'medilink' ),
                'default'  => '#111111',
            ),
            array(
                'id'       => 'error_text2_color',
                'type'     => 'color',
                'transparent' => false,
                'title'    =>esc_html__( 'Body Text 2 Color', 'medilink' ),
                'default'  => '#111111',
            ),
        )
    )
);

Redux::setSection( $opt_name,
    array(
        'title'   =>esc_html__( 'Contact & Socials', 'medilink' ),
        'id'      => 'socials_section',
        'heading' => '',
        'desc'    =>esc_html__( 'In case you want to hide any field, just keep that field empty', 'medilink' ),
        'icon'    => 'el el-twitter',
        'fields'  => array(
            array(
                'id'       => 'phone_label',
                'type'     => 'text',
                'title'    =>esc_html__( 'Phone label', 'medilink' ),
                'default'  => '',
            ),
            array(
                'id'       => 'phone',
                'type'     => 'text',
                'title'    =>esc_html__( 'Phone', 'medilink' ),
                'default'  => '',
            ),

         


            array(
                'id'       => 'email_label',
                'type'     => 'text',
                'title'    =>esc_html__( 'Email label', 'medilink' ),
                'default'  => '',
            ),
            array(
                'id'       => 'email',
                'type'     => 'text',
                'title'    =>esc_html__( 'Email', 'medilink' ),
                'validate' => 'email',
                'default'  => '',
            ),  

            



            array(
                'id'       => 'opening_label',
                'type'     => 'text',
                'title'    =>esc_html__( 'Opening label', 'medilink' ),
                'default'  => '',
            ),
               array(
                'id'       => 'opening',
                'type'     => 'text',
                'title'    =>esc_html__( 'Opening Hours', 'medilink' ),              
                'default'  => '',
            ),

            

            array(
                'id'       => 'address_label',
                'type'     => 'text',
                'title'    =>esc_html__( 'Address label', 'medilink' ),
                'default'  => '',
            ),
            array(
                'id'       => 'address',
                'type'     => 'textarea',
                'title'    =>esc_html__( 'Address', 'medilink' ),
                'default'  => '',
            ),

          


             array(
                'id'       => 'social_label',
                'type'     => 'text',
                'title'    =>esc_html__( 'Social label', 'medilink' ),
                'default'  => 'Follow Us',
            ),
            array(
                'id'       => 'social_facebook',
                'type'     => 'text',
                'title'    =>esc_html__( 'Facebook', 'medilink' ),
                'default'  => '',
            ),
            array(
                'id'       => 'social_twitter',
                'type'     => 'text',
                'title'    =>esc_html__( 'Twitter', 'medilink' ),
                'default'  => '',
            ),
            array(
                'id'       => 'social_gplus',
                'type'     => 'text',
                'title'    =>esc_html__( 'Google Plus', 'medilink' ),
                'default'  => '',
            ),
            array(
                'id'       => 'social_linkedin',
                'type'     => 'text',
                'title'    =>esc_html__( 'Linkedin', 'medilink' ),
                'default'  => '',
            ),
            array(
                'id'       => 'social_youtube',
                'type'     => 'text',
                'title'    =>esc_html__( 'Youtube', 'medilink' ),
                'default'  => '',
            ),
            array(
                'id'       => 'social_pinterest',
                'type'     => 'text',
                'title'    =>esc_html__( 'Pinterest', 'medilink' ),
                'default'  => '',
            ),
            array(
                'id'       => 'social_instagram',
                'type'     => 'text',
                'title'    =>esc_html__( 'Instagram', 'medilink' ),
                'default'  => '',
            ),
            array(
                'id'       => 'social_rss',
                'type'     => 'text',
                'title'    =>esc_html__( 'RSS', 'medilink' ),
                'default'  => '',
            ),


        )            
    ) 
);


Redux::setSection( $opt_name,
    array(
        'title'   =>esc_html__( 'Header', 'medilink' ),
        'id'      => 'header_section',
        'heading' => '',
        'icon'    => 'el el-flag',
        'fields'  => array(
            array(
                'id'       => 'sticky_menu',
                'type'     => 'switch',
                'title'    =>esc_html__( 'Sticky Header', 'medilink' ),
                'on'       =>esc_html__( 'Enabled', 'medilink' ),
                'off'      =>esc_html__( 'Disabled', 'medilink' ),
                'default'  => true,
                'subtitle' =>esc_html__( 'Show header when scroll down', 'medilink' ),
            ),
            array(
                'id'       => 'tr_header',
                'type'     => 'switch',
                'title'    =>esc_html__( 'Transparent Header', 'medilink' ),
                'on'       =>esc_html__( 'Enabled', 'medilink' ),
                'off'      =>esc_html__( 'Disabled', 'medilink' ),
                'default'  => false,
                'subtitle' =>esc_html__( 'You have to enable Banner or Slider in page to make it work properly. You can override this settings in individual pages', 'medilink' ),
            ),       
             array(
                'id'       => 'top_bar',
                'type'     => 'switch',
                'title'    => esc_html__( 'Top Bar', 'medilink' ),
                'on'       => esc_html__( 'Enabled', 'medilink' ),
                'off'      => esc_html__( 'Disabled', 'medilink' ),
                'default'  => false,
                'subtitle' => esc_html__( 'You can override this settings in individual pages', 'medilink' ),
            ),
            array(
                'id'       => 'top_bar_style',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Top Bar Layout', 'medilink' ),
                'default'  => '1',
                'options' => array(                    
                    '1' => array(
                        'title' => '<b>'. esc_html__( 'Layout 1', 'medilink' ) . '</b>',
                        'img' => Helper::get_img( 'top1.jpg' ),
                    ),
                    '2' => array(
                        'title' => '<b>'. esc_html__( 'Layout 2', 'medilink' ) . '</b>',
                        'img' => Helper::get_img( 'top2.jpg' ),
                    ),
                    '3' => array(
                        'title' => '<b>'. esc_html__( 'Layout 3', 'medilink' ) . '</b>',
                        'img' => Helper::get_img( 'top2.jpg' ),
                    ), 
                    '4' => array(
                        'title' => '<b>'. esc_html__( 'Layout 4', 'medilink' ) . '</b>',
                        'img' => Helper::get_img( 'top4.jpg' ),
                    ),  
                    '5' => array(
                        'title' => '<b>'. esc_html__( 'Layout 5', 'medilink' ) . '</b>',
                        'img' => Helper::get_img( 'top5.jpg' ),
                    ),                   
                ),
                'subtitle' => esc_html__( 'You can override this settings in individual pages', 'medilink' ),
                'required' => array( 'top_bar', '=', true )
            ), 
            array(
                'id'       => 'header_style',
                'type'     => 'image_select',
                'title'    =>esc_html__( 'Header Layout', 'medilink' ),
                'default'  => '1',
                'options' => array(
                    '1' => array(
                        'title' => '<b>'.esc_html__( 'Layout 1', 'medilink' ) . '</b>',
                        'img' => Helper::get_img( 'header-1.jpg' ),
                    ),
                    '2' => array(
                        'title' => '<b>'.esc_html__( 'Layout 2', 'medilink' ) . '</b>',
                        'img' => Helper::get_img( 'header-2.jpg' ),
                    ),
                    '3' => array(
                        'title' => '<b>'.esc_html__( 'Layout 3', 'medilink' ) . '</b>',
                        'img' => Helper::get_img( 'header-3.jpg' ),
                    ),
                    '4' => array(
                        'title' => '<b>'.esc_html__( 'Layout 4', 'medilink' ) . '</b>',
                        'img' => Helper::get_img( 'header-4.jpg' ),
                    ),
                    '5' => array(
                        'title' => '<b>'.esc_html__( 'Layout 5', 'medilink' ) . '</b>',
                        'img' => Helper::get_img( 'header-5.jpg' ),
                    ), 
                    '6' => array(
                        'title' => '<b>'.esc_html__( 'Layout 6', 'medilink' ) . '</b>',
                        'img' => Helper::get_img( 'header-6.jpg' ),
                    ), 
                    '7' => array(
                        'title' => '<b>'.esc_html__( 'Layout 7', 'medilink' ) . '</b>',
                        'img' => Helper::get_img( 'header-7.jpg' ),
                    ), 
                    '8' => array(
                        'title' => '<b>'.esc_html__( 'Layout 8', 'medilink' ) . '</b>',
                        'img' => Helper::get_img( 'header-8.jpg' ),
                    ),
                ),
                'subtitle' =>esc_html__( 'You can override this settings in individual pages', 'medilink' ),
            ),

          

            array(
                'id'       => 'social_icon',
                'type'     => 'switch',
                'title'    =>esc_html__( 'Social Icon', 'medilink' ),
                'on'       =>esc_html__( 'Enabled', 'medilink' ),
                'off'      =>esc_html__( 'Disabled', 'medilink' ),
                'default'  => true,
            ),  

             
            array(
                'id'       => 'search_icon',
                'type'     => 'switch',
                'title'    =>esc_html__( 'Search Icon', 'medilink' ),
                'on'       =>esc_html__( 'Enabled', 'medilink' ),
                'off'      =>esc_html__( 'Disabled', 'medilink' ),
                'default'  => true,
            ), 
              
            array(
                'id'       => 'cart_icon',
                'type'     => 'switch',
                'title'    =>esc_html__( 'Cart Icon', 'medilink' ),
                'on'       =>esc_html__( 'Enabled', 'medilink' ),
                'off'      =>esc_html__( 'Disabled', 'medilink' ),
                'default'  => false,
            ), 
            array(
                'id'       => 'vertical_menu_icon',
                'type'     => 'switch',
                'title'    =>esc_html__( 'Vertical Menu Icon', 'medilink' ),
                'on'       =>esc_html__( 'Enabled', 'medilink' ),
                'off'      =>esc_html__( 'Disabled', 'medilink' ),
                'default'  => true,
            ),
            array(
                'id'       => 'header_btn',
                'type'     => 'switch',
                'title'    =>esc_html__( 'Appointment Button', 'medilink' ),
                'on'       =>esc_html__( 'Enabled', 'medilink' ),
                'off'      =>esc_html__( 'Disabled', 'medilink' ),
                'default'  => false,
            ),
             array(
                'id'       => 'header_buttontext',
                'type'     => 'text',
                'title'    =>esc_html__( 'Appointment Text', 'medilink' ),
                'default'  =>esc_html__( 'Appointment', 'medilink' ),
                'required' => array( 'header_btn', 'equals', true ),
            ),
             array(
                'id'       => 'header_buttonUrl',
                'type'     => 'text',                
                'default'  => '',
                'title'    =>esc_html__( 'Button Url', 'medilink' ),               
                'required' => array( 'header_btn', 'equals', true ),
            ),
          

        )
    ) 
);

Redux::setSection( $opt_name,
    array(
        'title'   =>esc_html__( 'Mobile Header', 'medilink' ),
        'id'      => 'mobile_header_section',
        'heading' => '',
        'icon'    => 'el el-flag',
        'subsection' => true,
        'fields'  => array(     


            array(
                'id'       => 'header_search_has_mobile',
                'type'     => 'switch',
                'title'    =>esc_html__( 'Search In Mobile', 'medilink' ),
                'on'       =>esc_html__( 'Enabled', 'medilink' ),
                'off'      =>esc_html__( 'Disabled', 'medilink' ),
                'default'  => false,
                 'subtitle' =>esc_html__( 'You can override this settings only Mobile', 'medilink' ),
            ),          

  
            array(
                'id'       => 'header_btn_has_mobile',
                'type'     => 'switch',
                'title'    =>esc_html__( 'Appointment Button In Mobile', 'medilink' ),
                'on'       =>esc_html__( 'Enabled', 'medilink' ),
                'off'      =>esc_html__( 'Disabled', 'medilink' ),
                'default'  => false,
                 'subtitle' =>esc_html__( 'You can override this settings only Mobile', 'medilink' ),
            ),
           
             
            array(
                'id'       => 'mobile_header_style',
                'type'     => 'image_select',
                'title'    =>esc_html__( 'Mobile Header Layout', 'medilink' ),
                'default'  => '1',
                'options' => array(
                    '1' => array(
                        'title' => '<b>'.esc_html__( 'Layout 1', 'medilink' ) . '</b>',
                        'img' => Helper::get_img( 'mobile-header-1.jpg' ),
                    ),
                    '2' => array(
                        'title' => '<b>'.esc_html__( 'Layout 2', 'medilink' ) . '</b>',
                        'img' => Helper::get_img( 'mobile-header-2.jpg' ),
                    ),
                   
                ),
                'subtitle' =>esc_html__( 'You can override this settings only Mobile', 'medilink' ),
            ),
            

           

              array(
                'id'       => 'phone_has_social',
                'type'     => 'switch',
                'title'    =>esc_html__( 'Header Top social in mobile', 'medilink' ),
                'on'       =>esc_html__( 'Enabled', 'medilink' ),
                'off'      =>esc_html__( 'Disabled', 'medilink' ),
                'default'  => false,
                'subtitle' =>esc_html__( 'Header Top social in mobile ', 'medilink' ),
            ),
           
           

                array(
                'id'       => 'phone_has_mobile',
                'type'     => 'switch',
                'title'    =>esc_html__( 'Header Top Phone in mobile', 'medilink' ),
                'on'       =>esc_html__( 'Enabled', 'medilink' ),
                'off'      =>esc_html__( 'Disabled', 'medilink' ),
                'default'  => false,
                'subtitle' =>esc_html__( 'You can override this settings only Mobile', 'medilink' ),
            ),
         array(
                'id'       => 'phone_has_email',
                'type'     => 'switch',
                'title'    =>esc_html__( 'Header Top email in mobile', 'medilink' ),
                'on'       =>esc_html__( 'Enabled', 'medilink' ),
                'off'      =>esc_html__( 'Disabled', 'medilink' ),
                'default'  => false,
                'subtitle' =>esc_html__( 'You can override this settings only Mobile ', 'medilink' ),
            ),
        array(
                'id'       => 'phone_has_opening',
                'type'     => 'switch',
                'title'    =>esc_html__( 'Header Top opening in mobile', 'medilink' ),
                'on'       =>esc_html__( 'Enabled', 'medilink' ),
                'off'      =>esc_html__( 'Disabled', 'medilink' ),
                'default'  => false,
                'subtitle' =>esc_html__( 'You can override this settings only Mobile ', 'medilink' ),
            ),

        array(
                'id'       => 'phone_has_address',
                'type'     => 'switch',
                'title'    =>esc_html__( 'Header Top address in mobile', 'medilink' ),
                'on'       =>esc_html__( 'Enabled', 'medilink' ),
                'off'      =>esc_html__( 'Disabled', 'medilink' ),
                'default'  => false,
                'subtitle' =>esc_html__( 'You can override this settings only Mobile', 'medilink' ),
            ),

        )
    ) 
);

Redux::setSection( $opt_name,
    array(
        'title'   =>esc_html__( 'Main Menu', 'medilink' ),
        'id'      => 'menu_section',
        'heading' => '',
        'icon'    => 'el el-book',
        'fields'  => array(
            array(
                'id'       => 'section-mainmenu',
                'type'     => 'section',
                'title'    =>esc_html__( 'Main Menu Items', 'medilink' ),
                'indent'   => true,
            ),
            array(
                'id'       => 'menu_typo',
                'type'     => 'typography',
                'title'    =>esc_html__( 'Menu Font', 'medilink' ),
                'text-align' => false,
                'color'   => false,
                'text-transform' => true,
                'default'     => array(
                    'font-family' => 'Roboto',
                    'google'      => true,
                    'font-size'   => '16px',
                    'font-weight' => '700',
                    'line-height' => '24px',
                    'text-transform' => 'none',
                ),
            ),
            array(
                'id'       => 'section-submenu',
                'type'     => 'section',
                'title'    =>esc_html__( 'Sub Menu Items', 'medilink' ),
                'indent'   => true,
            ), 
            array(
                'id'       => 'submenu_typo',
                'type'     => 'typography',
                'title'    =>esc_html__( 'Submenu Font', 'medilink' ),
                'text-align'   => false,
                'color'   => false,
                'text-transform' => true,
                'default'     => array(
                    'font-family' => 'Roboto',
                    'google'      => true,
                    'font-size'   => '16px',
                    'font-weight' => '500',
                    'line-height' => '22px',
                    'text-transform' => 'none',
                ),
            ),
            array(
                'id'       => 'section-resmenu',
                'type'     => 'section',
                'title'    =>esc_html__( 'Mobile Menu', 'medilink' ),
                'indent'   => true,
            ), 
            array(
                'id'       => 'resmenu_width',
                'type'     => 'slider',
                'title'    =>esc_html__( 'Screen width in which mobile menu activated', 'medilink' ),
                'subtitle' =>esc_html__( 'Recommended value is: 1024', 'medilink' ),
                'default'  => 1024,
                'min'      => 0,
                'step'     => 1,
                'max'      => 2000,
            ),
            array(
                'id'       => 'resmenu_typo',
                'type'     => 'typography',
                'title'    =>esc_html__( 'Mobile Menu Font', 'medilink' ),
                'text-align' => false,
                'color'   => false,
                'text-transform' => true,
                'default'     => array(
                    'font-family' => 'Roboto',
                    'google'      => true,
                    'font-size'   => '16px',
                    'font-weight' => '500',
                    'line-height' => '21px',
                    'text-transform' => 'none',
                ),
            ),          
        )            
    ) 
);

Redux::setSection( $opt_name,
    array(
        'title'   =>esc_html__( 'Footer', 'medilink' ),
        'id'      => 'footer_section',
        'heading' => '',
        'icon'    => 'el el-caret-down',
        'fields'  => array(
            array(
                'id'       => 'section-footer-area',
                'type'     => 'section',
                'title'    =>esc_html__( 'Footer Area', 'medilink' ),
                'indent'   => true,
            ),
            array(
                'id'       => 'footer_area',
                'type'     => 'switch',
                'title'    =>esc_html__( 'Display Footer Area', 'medilink' ),
                'on'       =>esc_html__( 'Enabled', 'medilink' ),
                'off'      =>esc_html__( 'Disabled', 'medilink' ),
                'default'  => true,
            ), 
             array(
                'id'       => 'footer_bottom_area',
                'type'     => 'switch',
                'title'    =>esc_html__( 'Display Footer Bottom Area', 'medilink' ),
                'on'       =>esc_html__( 'Enabled', 'medilink' ),
                'off'      =>esc_html__( 'Disabled', 'medilink' ),
                'default'  => true,
            ),
             array(
                'id'       => 'footer_logo',
                'type'     => 'media',
                'title'    =>esc_html__( 'Footer Logo', 'medilink' ),
                'default'  => array(
                    'url'=> Helper::get_img( 'footer-logo.png' )
                ),
            ),
             array(
                'id'       => 'footer_style',
                'type'     => 'image_select',
                'title'    =>esc_html__( 'Footer Layout', 'medilink' ),
                'default'  => '1',
                'options' => array(
                    '1' => array(
                        'title' => '<b>'.esc_html__( 'Layout 1', 'medilink' ) . '</b>',
                        'img' => Helper::get_img( 'footer-1.jpg' ),
                    ),
                    '2' => array(
                        'title' => '<b>'.esc_html__( 'Layout 2', 'medilink' ) . '</b>',
                        'img' => Helper::get_img( 'footer-2.jpg' ),
                    ), 
                  
                ),
                'subtitle' =>esc_html__( 'You can override this settings in individual pages', 'medilink' ),
            ),
            array(
                'id'       => 'footer_column',
                'type'     => 'select',
                'title'    =>esc_html__( 'Number of Columns', 'medilink' ),
                'options'  => array(
                    '1' =>esc_html__( '1 Column', 'medilink' ),
                    '2' =>esc_html__( '2 Columns', 'medilink' ),
                    '3' =>esc_html__( '3 Columns', 'medilink' ),
                    '4' =>esc_html__( '4 Columns', 'medilink' ),
                ),
                'default'  => '4',
                'required' => array( 'footer_style', 'equals', '2' )
            ),
            array(
                'id'       => 'section-copyright-area',
                'type'     => 'section',
                'title'    =>esc_html__( 'Copyright Area', 'medilink' ),
                'indent'   => true,
            ),
            array(
                'id'       => 'copyright_area',
                'type'     => 'switch',
                'title'    =>esc_html__( 'Display Copyright Area', 'medilink' ),
                'on'       =>esc_html__( 'Enabled', 'medilink' ),
                'off'      =>esc_html__( 'Disabled', 'medilink' ),
                'default'  => true,
            ),
            array(
                'id'       => 'copyright_text',
                'type'     => 'textarea',
                'title'    =>esc_html__( 'Copyright Text', 'medilink' ),
                'default'  => '&copy; Copyright medilink 2018. All Right Reserved. Designed and Developed by <a target="_blank" href="' . MEDILINK_THEME_AUTHOR_URI . '">RadiusTheme</a>',
                'required' => array( 'copyright_area', 'equals', true )
            ),
        )
    )
);


Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Typography', 'medilink' ),
    'id'               => 'typo_section',
    'icon'             => 'el el-text-width',
    'fields' => array(
        array(
            'id'       => 'typo_body',
            'type'     => 'typography',
            'title'    => esc_html__( 'Body', 'medilink' ),
            'google'   => true,
            'subsets'   => false,
            'text-align'   => false,
            'font-weight'   => false,
            'color'   => false,
            'default'     => array(
                'font-family' => 'Roboto',
                'google'      => true,
                'font-size'   => '16px',
                'font-weight' => '400',
                'line-height' => '26px',
            ),
        ),
        array(
            'id'       => 'typo_h1',
            'type'     => 'typography',
            'title'    => esc_html__( 'Header h1', 'medilink' ),
            'google'   => true,
            'subsets'   => false,
            'text-align'   => false,
            'font-weight'   => false,
            'color'   => false,
            'default'     => array(
                'font-family' => 'Raleway',
                'google'      => true,
                'font-size'   => '36px',
                'font-weight' => '700',
                'line-height'   => '44px',
            ),
        ),
        array(
            'id'       => 'typo_h2',
            'type'     => 'typography',
            'title'    => esc_html__( 'Header h2', 'medilink' ),
            'google'   => true,
            'subsets'   => false,
            'text-align'   => false,
            'font-weight'   => false,
            'color'   => false,
            'default'     => array(
                'font-family' => 'Raleway',
                'google'      => true,
                'font-size'   => '28px',
                'font-weight' => '700',
                'line-height' => '34px',
            ),
        ),
        array(
            'id'       => 'typo_h3',
            'type'     => 'typography',
            'title'    => esc_html__( 'Header h3', 'medilink' ),
            'google'   => true,
            'subsets'   => false,
            'text-align'   => false,
            'font-weight'   => false,
            'color'   => false,
            'default'     => array(
                'font-family' => 'Raleway',
                'google'      => true,
                'font-size'   => '22px',
                'font-weight' => '700',
                'line-height' => '28px',
            ),
        ),
        array(
            'id'       => 'typo_h4',
            'type'     => 'typography',
            'title'    => esc_html__( 'Header h4', 'medilink' ),
            'google'   => true,
            'subsets'   => false,
            'text-align'   => false,
            'font-weight'   => false,
            'color'   => false,
            'default'     => array(
                'font-family' => 'Raleway',
                'google'      => true,
                'font-size'   => '20px',
                'font-weight' => '700',
                'line-height' => '26px',
            ),
        ),
        array(
            'id'       => 'typo_h5',
            'type'     => 'typography',
            'title'    => esc_html__( 'Header h5', 'medilink' ),
            'google'   => true,
            'subsets'   => false,
            'text-align'   => false,
            'font-weight'   => false,
            'color'   => false,
            'default'     => array(
                'font-family' => 'Raleway',
                'google'      => true,
                'font-size'   => '18px',
                'font-weight' => '600',
                'line-height' => '24px',
            ),
        ),
        array(
            'id'       => 'typo_h6',
            'type'     => 'typography',
            'title'    => esc_html__( 'Header h6', 'medilink' ),
            'google'   => true,
            'subsets'   => false,
            'text-align'   => false,
            'font-weight'   => false,
            'color'   => false,
            'default'     => array(
                'font-family' => 'Raleway',
                'google'      => true,
                'font-size'   => '16px',
                'font-weight' => '600',
                'line-height' => '22px',
            ),
        ),
    )
) );


Redux::setSection( $opt_name,
    array(
        'title' =>esc_html__( 'Layout Defaults', 'medilink' ),
        'id'    => 'layout_defaults',
        'icon'  => 'el el-th',
    )
);

// Page
$rdtheme_page_fields = rdtheme_redux_post_type_fields( 'page' );
$rdtheme_page_fields[0]['default'] = 'full-width';
Redux::setSection( $opt_name,
    array(
        'title'      =>esc_html__( 'Page', 'medilink' ),
        'id'         => 'pages_section',
        'subsection' => true,
        'fields'     => $rdtheme_page_fields     
    )
);

//Post Archive
$rdtheme_post_archive_fields = rdtheme_redux_post_type_fields( 'blog' );
Redux::setSection( $opt_name,
    array(
        'title'      =>esc_html__( 'Blog / Archive', 'medilink' ),
        'id'         => 'blog_section',
        'subsection' => true,
        'fields'     => $rdtheme_post_archive_fields
    )
);

// Single Post
$rdtheme_single_post_fields = rdtheme_redux_post_type_fields( 'single_post' );
Redux::setSection( $opt_name,
    array(
        'title'      =>esc_html__( 'Post Single', 'medilink' ),
        'id'         => 'single_post_section',
        'subsection' => true,
        'fields'     => $rdtheme_single_post_fields           
    ) 
);

// Doctor Archive
$rdtheme_fields = rdtheme_redux_post_type_fields( 'services_archive' );
Redux::setSection( $opt_name,
    array(
    'title'         =>esc_html__( 'Services Archive', 'medilink' ),
    'id'            => 'services_archive_section',
    'subsection'    => true,
    'fields'        => $rdtheme_fields
    )
);
// Single services
$rdtheme_single_services_fields = rdtheme_redux_post_type_fields( 'services' );
Redux::setSection( $opt_name,
    array(
        'title'      =>esc_html__( 'Single Services', 'medilink' ),
        'id'         => 'single_services_section',
        'subsection' => true,
        'fields'     => $rdtheme_single_services_fields           
    ) 
);


// Doctor Archive
$rdtheme_fields = rdtheme_redux_post_type_fields( 'doctors_archive' );
$rdtheme_fields[0]['default'] = 'full-width';

$rdtheme_fields2 = array(
    array(
        'id'       => 'doctors_arc_section',
        'type'     => 'section',
        'title'    =>esc_html__( 'More Options', 'medilink' ),
        'indent'   => true,
    ),
    array(
        'id'       => 'doctors_arc_style',
        'type'     => 'button_set',
        'title'    =>esc_html__( 'Style', 'medilink' ),
        'options'  => array(
            'style1' =>esc_html__( 'Style 1', 'medilink' ),
            'style2' =>esc_html__( 'Style 2', 'medilink' ),
            'style3' =>esc_html__( 'Style 3', 'medilink' ),
        ),
        'default'  => 'style1'
    ),
    array(
        'id'       => 'doctors_arv_bgcolor',
        'type'     => 'color',
        'title'    =>esc_html__('Archive Background Color', 'medilink'), 
        'validate' => 'color',
        'transparent' => false,
        'default' => '#f1f7fa',
    ),    
    array(
        'id'       => 'doctors_arc_number',
        'type'     => 'text',
        'title'    =>esc_html__( 'Number of items per page', 'medilink' ),
        'validate' => 'numeric',
        'default'  => '9'
    ),
    array(
        'id'       => 'doctors_arc_orderby',
        'type'     => 'select',
        'title'    =>esc_html__( 'Order By', 'medilink' ),
        'options'  => array(
            'date'        =>esc_html__( 'Date (Recents comes first)', 'medilink' ),
            'title'       =>esc_html__( 'Title', 'medilink' ),
            'menu_order'  =>esc_html__( 'Custom Order (Available via Order field inside Page Attributes box)', 'medilink' ),
        ),
        'default'  => 'date'
    ),
    array(
        'id'       => 'doctors_arc_designation_display',
        'type'     => 'switch',
        'title'    =>esc_html__( 'Designation Display', 'medilink' ),
        'on'       =>esc_html__( 'Enabled', 'medilink' ),
        'off'      =>esc_html__( 'Disabled', 'medilink' ),
        'default'  => true,
    ),
    array(
        'id'       => 'doctors_arc_degree_display',
        'type'     => 'switch',
        'title'    =>esc_html__( 'Degree Display', 'medilink' ),
        'on'       =>esc_html__( 'Enabled', 'medilink' ),
        'off'      =>esc_html__( 'Disabled', 'medilink' ),
        'default'  => true,
    ),     
   
);

$rdtheme_fields = array_merge( $rdtheme_fields, $rdtheme_fields2 );
Redux::setSection( $opt_name,
    array(
    'title'         =>esc_html__( 'Doctors Archive', 'medilink' ),
    'id'            => 'doctors_archive_section',
    'subsection'    => true,
    'fields'        => $rdtheme_fields
    )
);


// Single Doctors

$rdtheme_fields = rdtheme_redux_post_type_fields( 'doctor' );
$rdtheme_fields2        = array(
      array(
        'id'       => 'doctor_arc_social_display',
        'type'     => 'switch',
        'title'    => esc_html__( 'Social Media Display', 'medilink' ),
        'on'       => esc_html__( 'Enabled', 'medilink' ),
        'off'      => esc_html__( 'Disabled', 'medilink' ),
        'default'  => true,
    ),
);
$rdtheme_fields = array_merge( $rdtheme_fields, $rdtheme_fields2 );

unset($rdtheme_fields[0]);
Redux::setSection( $opt_name,
    array(
    'title'         =>esc_html__( 'Single Doctors', 'medilink' ),
    'id'            => 'single_doctor_section',
    'subsection'    => true,
    'fields'        => $rdtheme_fields
    )
);


// Departments Archive
$rdtheme_fields = rdtheme_redux_post_type_fields( 'departments_archive' );
$rdtheme_fields[0]['default'] = 'full-width';
$rdtheme_fields2 = array(
    array(
        'id'       => 'doctors_arc_section',
        'type'     => 'section',
        'title'    =>esc_html__( 'More Options', 'medilink' ),
        'indent'   => true,
    ),
    array(
        'id'       => 'departments_arc_style',
        'type'     => 'button_set',
        'title'    =>esc_html__( 'Style', 'medilink' ),
        'options'  => array(
            'style1' =>esc_html__( 'Style 1', 'medilink' ),
            'style2' =>esc_html__( 'Style 2', 'medilink' ),
            'style3' =>esc_html__( 'Style 3', 'medilink' ),
        ),
        'default'  => 'style1'
    ),
    array(
        'id'       => 'departments_arv_bgcolor',
        'type'     => 'color',
        'title'    =>esc_html__('Archive Background Color', 'medilink'), 
        'validate' => 'color',
        'transparent' => false,
        'default' => '#f1f7fa',
    ),    
    array(
        'id'       => 'departments_arc_number',
        'type'     => 'text',
        'title'    =>esc_html__( 'Number of items per page', 'medilink' ),
        'validate' => 'numeric',
        'default'  => '9'
    ),
     array(
        'id'       => 'departments_content_number',
        'type'     => 'text',
        'title'    =>esc_html__( 'Number of Content (layout 2)', 'medilink' ),
        'validate' => 'numeric',
        'default'  => '8', 
    ),
    array(
        'id'       => 'departments_arc_orderby',
        'type'     => 'select',
        'title'    =>esc_html__( 'Order By', 'medilink' ),
        'options'  => array(
            'date'        =>esc_html__( 'Date (Recents comes first)', 'medilink' ),
            'title'       =>esc_html__( 'Title', 'medilink' ),
            'menu_order'  =>esc_html__( 'Custom Order (Available via Order field inside Page Attributes box)', 'medilink' ),
        ),
        'default'  => 'date'
    ),
    array(
        'id'       => 'departments_arc_doctors_display',
        'type'     => 'switch',
        'title'    =>esc_html__( 'Doctors Display', 'medilink' ),
        'on'       =>esc_html__( 'Enabled', 'medilink' ),
        'off'      =>esc_html__( 'Disabled', 'medilink' ),
        'default'  => true,
    ),       
   

);
$rdtheme_fields = array_merge( $rdtheme_fields, $rdtheme_fields2 );

Redux::setSection( $opt_name,
    array(
    'title'         =>esc_html__( 'Departments Archive', 'medilink' ),
    'id'            => 'departments_archive_section',
    'subsection'    => true,
    'fields'        => $rdtheme_fields
    )
);





$rdtheme_fields = rdtheme_redux_post_type_fields( 'departments' );
$rdtheme_fields2 = array(
    array(
        'id'       => 'departments_arc_section',
        'type'     => 'section',
        'title'    =>esc_html__( 'More Options', 'medilink' ),
        'indent'   => true,
    ),
    array(
        'id'       => 'departments_single_arc_style',
        'type'     => 'button_set',
        'title'    =>esc_html__( 'Style', 'medilink' ),
        'options'  => array(
            'style1' =>esc_html__( 'Style 1', 'medilink' ),
            'style2' =>esc_html__( 'Style 2', 'medilink' ),            
            'style3' => esc_html__( 'Style 3', 'medilink' ),            
        ),
        'default'  => 'style1'
    ),  
    array(
        'id'       => 'departments_sidebar_title',
        'type'     => 'text',
        'title'    =>esc_html__( 'Title of Departments Sidebar', 'medilink' ),
        'validate' => 'text',
        'default'  => esc_html__( 'All Departments', 'medilink' ),
    ),

);
$rdtheme_fields = array_merge( $rdtheme_fields, $rdtheme_fields2 );
$rdtheme_fields[0]['default'] = 'full-width';
// Single Departments
//unset($rdtheme_fields[0]);
Redux::setSection( $opt_name,
    array(
    'title'        =>esc_html__( 'Single Departments', 'medilink' ),
    'id'           => 'single_departments_section',
    'subsection'   => true,
    'fields'       => $rdtheme_fields           
    ) 
);

// Search
$rdtheme_search_fields = rdtheme_redux_post_type_fields( 'search' );
Redux::setSection( $opt_name,
    array(
        'title'      =>esc_html__( 'Search Layout', 'medilink' ),
        'id'         => 'search_section',
        'subsection' => true,
        'fields'     => $rdtheme_search_fields            
    )
);

// Error 404 Layout
$rdtheme_error_fields = rdtheme_redux_post_type_fields( 'error' );
unset($rdtheme_error_fields[0]);
Redux::setSection( $opt_name,
    array(
        'title'      =>esc_html__( 'Error 404 Layout', 'medilink' ),
        'id'         => 'error_section',
        'subsection' => true,
        'fields'     => $rdtheme_error_fields           
    )
);

if ( class_exists( 'WooCommerce' ) ) {
    // Woocommerce Shop Archive
    $rdtheme_shop_archive_fields = rdtheme_redux_post_type_fields( 'shop' );
    Redux::setSection( $opt_name,
        array(
            'title'      => esc_html__( 'Shop Archive', 'medilink' ),
            'id'         => 'shop_section',
            'subsection' => true,
            'fields'     => $rdtheme_shop_archive_fields
        ) 
    );

    // Woocommerce Product
    $rdtheme_product_fields = rdtheme_redux_post_type_fields( 'product' );
    Redux::setSection( $opt_name,
        array(
            'title'      => esc_html__( 'Product Single', 'medilink' ),
            'id'         => 'product_section',
            'subsection' => true,
            'fields'     => $rdtheme_product_fields
        ) 
    );
}

// Blog Settings
Redux::setSection( $opt_name,
    array(
        'title'   =>esc_html__( 'Blog Settings', 'medilink' ),
        'id'      => 'blog_settings_section',
        'icon'    => 'el el-tags',
        'heading' => '',
        'fields'  => array(
            array(
                'id'       =>'blog_style',
                'type'     => 'image_select',
                'title'    =>esc_html__( 'Blog/Archive Layout', 'medilink' ),
                'default'  => 'style1',
                'options'  => array(
                    'style1' => array(
                        'title' => '<b>'.esc_html__( 'Layout 1', 'medilink' ) . '</b>',
                        'img'   => Helper::get_img( 'blog1.jpg' ),
                    ),
                    'style2' => array(
                        'title' => '<b>'.esc_html__( 'Layout 2', 'medilink' ) . '</b>',
                        'img'   => Helper::get_img( 'blog2.jpg' ),
                    ),
                    'style3' => array(
                        'title' => '<b>'.esc_html__( 'Layout 3', 'medilink' ) . '</b>',
                        'img'   => Helper::get_img( 'blog3.jpg' ),
                    ),
                ),
            ),
            array(
                'id'       => 'blog_date',
                'type'     => 'switch',
                'title'    =>esc_html__( 'Show Date', 'medilink' ),
                'on'       =>esc_html__( 'On', 'medilink' ),
                'off'      =>esc_html__( 'Off', 'medilink' ),
                'default'  => true,
            ), 
            array(
                'id'       => 'blog_author_name',
                'type'     => 'switch',
                'title'    =>esc_html__( 'Show Author Name', 'medilink' ),
                'on'       =>esc_html__( 'On', 'medilink' ),
                'off'      =>esc_html__( 'Off', 'medilink' ),
                'default'  => true,
            ),
            array(
                'id'       => 'blog_cats',
                'type'     => 'switch',
                'title'    =>esc_html__( 'Show Categories', 'medilink' ),
                'on'       =>esc_html__( 'On', 'medilink' ),
                'off'      =>esc_html__( 'Off', 'medilink' ),
                'default'  => true,
            ),
            array(
                'id'       => 'blog_comment_num',
                'type'     => 'switch',
                'title'    =>esc_html__( 'Show Comment Number', 'medilink' ),
                'on'       =>esc_html__( 'On', 'medilink' ),
                'off'      =>esc_html__( 'Off', 'medilink' ),
                'default'  => true,
            ),
             array(
                'id'       => 'blog_content_number',
                'type'     => 'text',
                'title'    =>esc_html__( 'Number of Content', 'medilink' ),
                'validate' => 'numeric',
                'default'  => '20', 
            ),
        )
    ) 
);

// Post Settings
Redux::setSection( $opt_name,
    array(
        'title'   =>esc_html__( 'Post Settings', 'medilink' ),
        'id'      => 'post_settings_section',
        'icon'    => 'el el-file-edit',
        'heading' => '',
        'fields'  => array(
            array(
                'id'      => 'post_date',
                'type'    => 'switch',
                'title'   =>esc_html__( 'Show Post Date', 'medilink' ),
                'on'      =>esc_html__( 'On', 'medilink' ),
                'off'     =>esc_html__( 'Off', 'medilink' ),
                'default' => true,
            ),
            array(
                'id'      => 'post_author_name',
                'type'    => 'switch',
                'title'   =>esc_html__( 'Show Author Name', 'medilink' ),
                'on'      =>esc_html__( 'On', 'medilink' ),
                'off'     =>esc_html__( 'Off', 'medilink' ),
                'default' => true,
            ),
            array(
                'id'      => 'post_cats',
                'type'    => 'switch',
                'title'   =>esc_html__( 'Show Categories', 'medilink' ),
                'on'      =>esc_html__( 'On', 'medilink' ),
                'off'     =>esc_html__( 'Off', 'medilink' ),
                'default' => true,
            ),
            array(
                'id'      => 'post_comment_num',
                'type'    => 'switch',
                'title'   =>esc_html__( 'Show Comment Number', 'medilink' ),
                'on'      =>esc_html__( 'On', 'medilink' ),
                'off'     =>esc_html__( 'Off', 'medilink' ),
                'default' => true,
            ), 
            array(
                'id'      => 'post_tags',
                'type'    => 'switch',
                'title'   =>esc_html__( 'Show Tags', 'medilink' ),
                'on'      =>esc_html__( 'On', 'medilink' ),
                'off'     =>esc_html__( 'Off', 'medilink' ),
                'default' => true,
            ),
        )            
    ) 
);

// Error
Redux::setSection( $opt_name,
    array(
        'title'   =>esc_html__( 'Error Page Settings', 'medilink' ),
        'id'      => 'error_srttings_section',
        'heading' => '',
        'icon'    => 'el el-error-alt',
        'fields'  => array( 
            array(
                'id'       => 'error_title',
                'type'     => 'text',
                'title'    =>esc_html__( 'Page Title', 'medilink' ),
                'default'  =>esc_html__( 'Error 404', 'medilink' ),
            ), 
            array(
                'id'       => 'error_bodybanner',
                'type'     => 'media',
                'title'    =>esc_html__( 'Body Banner', 'medilink' ),
                'default'  => array(
                    'url'=> Helper::get_img( '404.png' )
                ),
            ), 
            array(
                'id'       => 'error_text1',
                'type'     => 'text',
                'title'    =>esc_html__( 'Body Text 1', 'medilink' ),
                'default'  =>esc_html__( 'OOPS! THAT PAGE CAN’T BE FOUND.', 'medilink' ),
            ),
            array(
                'id'       => 'error_text2',
                'type'     => 'text',
                'title'    =>esc_html__( 'Body Text 2', 'medilink' ),
                'default'  =>esc_html__( 'The page you are looking is not available or has been removed. Try going to Home Page by using the button below.', 'medilink' ),
            ),   
            array(
                'id'       => 'error_buttontext',
                'type'     => 'text',
                'title'    =>esc_html__( 'Button Text', 'medilink' ),
                'default'  =>esc_html__( 'GO TO HOME PAGE', 'medilink' ),
            )
        )
    )
);

if ( class_exists( 'WooCommerce' ) ) {
    // Woocommerce Settings
    Redux::setSection( $opt_name,
        array(
            'title'   => esc_html__( 'WooCommerce', 'medilink' ),
            'id'      => 'woo_Settings_section',
            'heading' => '',
            'icon'    => 'el el-shopping-cart',
            'fields'  => array(
                array(
                    'id'       => 'wc_sec_general',
                    'type'     => 'section',
                    'title'    => esc_html__( 'General', 'medilink' ),
                    'indent'   => true,
                ),
                array(
                    'id'       => 'wc_num_product',
                    'type'     => 'text',
                    'title'    => esc_html__( 'Number of Products Per Page', 'medilink' ),
                    'default'  => '9',
                ),
                array(
                    'id'       => 'wc_wishlist_icon',
                    'type'     => 'switch',
                    'title'    => esc_html__( 'Product Add to Wishlist Icon', 'medilink' ),
                    'on'       => esc_html__( 'Enabled', 'medilink' ),
                    'off'      => esc_html__( 'Disabled', 'medilink' ),
                    'default'  => true,
                ),
                array(
                    'id'       => 'wc_quickview_icon',
                    'type'     => 'switch',
                    'title'    => esc_html__( 'Product Quickview Icon', 'medilink' ),
                    'on'       => esc_html__( 'Enabled', 'medilink' ),
                    'off'      => esc_html__( 'Disabled', 'medilink' ),
                    'default'  => true,
                ),
                array(
                    'id'       => 'wc_sec_product',
                    'type'     => 'section',
                    'title'    => esc_html__( 'Product Single Page', 'medilink' ),
                    'indent'   => true,
                ),
                array(
                    'id'       => 'wc_show_excerpt',
                    'type'     => 'switch',
                    'title'    => esc_html__( "Show excerpt when short description doesn't exist", 'medilink' ),
                    'on'       => esc_html__( 'Enabled', 'medilink' ),
                    'off'      => esc_html__( 'Disabled', 'medilink' ),
                    'default'  => true,
                ),
                array(
                    'id'       => 'wc_cats',
                    'type'     => 'switch',
                    'title'    => esc_html__( 'Categories', 'medilink' ),
                    'on'       => esc_html__( 'Show', 'medilink' ),
                    'off'      => esc_html__( 'Hide', 'medilink' ),
                    'default'  => true,
                ),
                array(
                    'id'       => 'wc_tags',
                    'type'     => 'switch',
                    'title'    => esc_html__( 'Tags', 'medilink' ),
                    'on'       => esc_html__( 'Show', 'medilink' ),
                    'off'      => esc_html__( 'Hide', 'medilink' ),
                    'default'  => true,
                ),
                array(
                    'id'       => 'wc_related',
                    'type'     => 'switch',
                    'title'    => esc_html__( 'Related Products', 'medilink' ),
                    'on'       => esc_html__( 'Show', 'medilink' ),
                    'off'      => esc_html__( 'Hide', 'medilink' ),
                    'default'  => true,
                ),
                array(
                    'id'       => 'wc_description',
                    'type'     => 'switch',
                    'title'    => esc_html__( 'Description Tab', 'medilink' ),
                    'on'       => esc_html__( 'Show', 'medilink' ),
                    'off'      => esc_html__( 'Hide', 'medilink' ),
                    'default'  => true,
                ),
                array(
                    'id'       => 'wc_reviews',
                    'type'     => 'switch',
                    'title'    => esc_html__( 'Reviews Tab', 'medilink' ),
                    'on'       => esc_html__( 'Show', 'medilink' ),
                    'off'      => esc_html__( 'Hide', 'medilink' ),
                    'default'  => true,
                ),
                array(
                    'id'       => 'wc_additional_info',
                    'type'     => 'switch',
                    'title'    => esc_html__( 'Additional Information Tab', 'medilink' ),
                    'on'       => esc_html__( 'Show', 'medilink' ),
                    'off'      => esc_html__( 'Hide', 'medilink' ),
                    'default'  => true,
                ),
                array(
                    'id'       => 'wc_sec_cart',
                    'type'     => 'section',
                    'title'    => esc_html__( 'Cart Page', 'medilink' ),
                    'indent'   => true,
                ),
                array(
                    'id'       => 'wc_cross_sell',
                    'type'     => 'switch',
                    'title'    => esc_html__( 'Cross Sell Products', 'medilink' ),
                    'on'       => esc_html__( 'Show', 'medilink' ),
                    'off'      => esc_html__( 'Hide', 'medilink' ),
                    'default'  => true,
                ),
            )
        ) 
    );
}

do_action('rt_after_redux_options_loaded','medilink');