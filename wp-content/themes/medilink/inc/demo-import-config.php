<?php
/**
 * @param $options
 * dialog
 */
function medilink_confirmation_dialog_options($options)
{
    return array_merge($options, array(
        'width' => 500,
        'dialogClass' => 'wp-dialog',
        'resizable' => false,
        'height' => 'auto',
        'modal' => true,
    ));
}

add_filter('pt-ocdi/confirmation_dialog_options', 'medilink_confirmation_dialog_options', 10, 1);

/**
 * medilink_import_files
 * @return array
 */

function medilink_import_files()
{
    return array(
        array(
            'import_file_name' => 'Home',
            'import_file_url' => 'http://radiustheme.com/demo/wordpress/demo-content/medilink/demo/demo-content.xml',
            'import_widget_file_url' => 'http://radiustheme.com/demo/wordpress/demo-content/medilink/demo/widget.json',
            'import_customizer_file_url' => 'http://radiustheme.com/demo/wordpress/demo-content/medilink/demo/customizer.dat',
            'import_redux' => array(
                array(
                    'file_url' => 'http://radiustheme.com/demo/wordpress/demo-content/medilink/demo/redux_options.json',
                    'option_name' => 'medilink',
                )
            ),
            'import_preview_image_url' => 'http://radiustheme.com/demo/wordpress/demo-content/medilink/demo/preview/home1.jpg',
            'preview_url' => 'http://radiustheme.net/manik/medilink/',
            'import_notice' => __('After you import this demo, you will have setup all content.', 'medilink'),
        ),
        array(
            'import_file_name' => 'Home2',
            'import_file_url' => 'http://radiustheme.com/demo/wordpress/demo-content/medilink/demo/demo-content.xml',
            'import_widget_file_url' => 'http://radiustheme.com/demo/wordpress/demo-content/medilink/demo/widget.json',
            'import_customizer_file_url' => 'http://radiustheme.com/demo/wordpress/demo-content/medilink/demo/customizer.dat',
            'import_redux' => array(
                array(
                    'file_url' => 'http://radiustheme.com/demo/wordpress/demo-content/medilink/demo/redux_options.json',
                    'option_name' => 'medilink',
                )
            ),
            'import_preview_image_url' => 'http://radiustheme.com/demo/wordpress/demo-content/medilink/demo/preview/home2.jpg',
            'preview_url' => 'http://radiustheme.net/manik/medilink/home2/',
            'import_notice' => __('After you import this demo, you will have setup all content.', 'medilink'),
        ),
        array(
            'import_file_name' => 'Home3',
            'import_file_url' => 'http://radiustheme.com/demo/wordpress/demo-content/medilink/demo/demo-content.xml',
            'import_widget_file_url' => 'http://radiustheme.com/demo/wordpress/demo-content/medilink/demo/widget.json',
            'import_customizer_file_url' => 'http://radiustheme.com/demo/wordpress/demo-content/medilink/demo/customizer.dat',
            'import_redux' => array(
                array(
                    'file_url' => 'http://radiustheme.com/demo/wordpress/demo-content/medilink/demo/redux_options.json',
                    'option_name' => 'medilink',
                )
            ),
            'import_preview_image_url' => 'http://radiustheme.com/demo/wordpress/demo-content/medilink/demo/preview/home3.jpg',
            'preview_url' => 'http://radiustheme.net/manik/medilink/home3/',
            'import_notice' => __('After you import this demo, you will have setup all content.', 'medilink'),
        ),
        array(
            'import_file_name' => 'Home4',
            'import_file_url' => 'http://radiustheme.com/demo/wordpress/demo-content/medilink/demo/demo-content.xml',
            'import_widget_file_url' => 'http://radiustheme.com/demo/wordpress/demo-content/medilink/demo/widget.json',
            'import_customizer_file_url' => 'http://radiustheme.com/demo/wordpress/demo-content/medilink/demo/customizer.dat',
            'import_redux' => array(
                array(
                    'file_url' => 'http://radiustheme.com/demo/wordpress/demo-content/medilink/demo/redux_options.json',
                    'option_name' => 'medilink',
                )
            ),
            'import_preview_image_url' => 'http://radiustheme.com/demo/wordpress/demo-content/medilink/demo/preview/home4.jpg',
            'preview_url' => 'http://radiustheme.net/manik/medilink/home4/',
            'import_notice' => __('After you import this demo, you will have setup all content.', 'medilink'),
        ),
        array(
            'import_file_name' => 'Home5',
            'import_file_url' => 'http://radiustheme.com/demo/wordpress/demo-content/medilink/demo/demo-content.xml',
            'import_widget_file_url' => 'http://radiustheme.com/demo/wordpress/demo-content/medilink/demo/widget.json',
            'import_customizer_file_url' => 'http://radiustheme.com/demo/wordpress/demo-content/medilink/demo/customizer.dat',
            'import_redux' => array(
                array(
                    'file_url' => 'http://radiustheme.com/demo/wordpress/demo-content/medilink/demo/redux_options.json',
                    'option_name' => 'medilink',
                )
            ),
            'import_preview_image_url' => 'http://radiustheme.com/demo/wordpress/demo-content/medilink/demo/preview/home5.jpg',
            'preview_url' => 'http://radiustheme.net/manik/medilink/home5/',
            'import_notice' => __('After you import this demo, you will have setup all content.', 'medilink'),
        ),
        array(
            'import_file_name' => 'Home6',
            'import_file_url' => 'http://radiustheme.com/demo/wordpress/demo-content/medilink/demo/demo-content.xml',
            'import_widget_file_url' => 'http://radiustheme.com/demo/wordpress/demo-content/medilink/demo/widget.json',
            'import_customizer_file_url' => 'http://radiustheme.com/demo/wordpress/demo-content/medilink/demo/customizer.dat',
            'import_redux' => array(
                array(
                    'file_url' => 'http://radiustheme.com/demo/wordpress/demo-content/medilink/demo/redux_options.json',
                    'option_name' => 'medilink',
                )
            ),
            'import_preview_image_url' => 'http://radiustheme.com/demo/wordpress/demo-content/medilink/demo/preview/home6.jpg',
             'preview_url' => 'http://radiustheme.net/manik/medilink/home6/',
             'import_notice' => __('After you import this demo, you will have setup all content.', 'medilink'),
        )
    );
}

add_filter('pt-ocdi/import_files', 'medilink_import_files');


/**
 * medilink_before_widgets_import
 * @param $selected_import
 */
function medilink_before_widgets_import($selected_import)
{
    // Remove 'Hello World!' post
    wp_delete_post(1, true);
    // Remove 'Sample page' page
    wp_delete_post(2, true);
    
    $sidebars_widgets = get_option('sidebars_widgets');
    $sidebars_widgets['sidebar'] = array();
    update_option('sidebars_widgets', $sidebars_widgets);

}

add_action('pt-ocdi/before_widgets_import', 'medilink_before_widgets_import');

/*
 * Automatically assign
 * "Front page",
 * "Posts page" and menu
 * locations after the importer is done
 */
function medilink_after_import_setup($selected_import){

    $demo_imported = get_option('medilink_demo_imported');

    $cpt_support = get_option('elementor_cpt_support');
    $elementor_disable_color_schemes = get_option('elementor_disable_color_schemes');
    $elementor_disable_typography_schemes = get_option('elementor_disable_typography_schemes');
    $elementor_container_width = get_option('elementor_container_width');
    $hseparator = get_option('bcn_options[hseparator]');
    $shared_counts_options_style = get_option('shared_counts_options[style]');
    $socialcountplus_settings_facebook_active = get_option('socialcountplus_settings[facebook_active]');

    //check if option DOESN'T exist in db
    if (!$cpt_support) {
        $cpt_support = ['page', 'post', 'elementor_disable_color_schemes']; //create array of our default supported post types
        update_option('elementor_cpt_support', $cpt_support); //write it to the database
    }
    if (empty($elementor_disable_color_schemes)) {
        update_option('elementor_disable_color_schemes', 'yes'); //update database
    }
    if (empty($elementor_disable_typography_schemes)) {
        update_option('elementor_disable_typography_schemes', 'yes'); //update database
    }
    if (empty($elementor_container_width)) {
        update_option('elementor_container_width', '1260'); //update database
    }

    $elementor_general_settings = array(
        'container_width' => (!empty($elementor_container_width)) ? $elementor_container_width : '1260',
    );
    update_option('_elementor_general_settings', $elementor_general_settings); //update database

    // Update Global Css Options For Elementor
    $currentTime = strtotime("now");
    $elementor_global_css = array(
        'time' => $currentTime,
        'fonts' => array()
    );
    update_option('_elementor_global_css', $elementor_global_css); //update database
    update_option('bcn_options[hseparator]', '<span class="dvdr"> / </span>'); //update database
    update_option('shared_counts_options[style]', 'abctw_style'); //update database
    update_option('socialcountplus_settings[facebook_active]', '1'); //update database
    update_option('medilink_elementor_custom_setting_imported', 'elementor_custom_setting_imported');

    if (empty($demo_imported)) {

        // Home page selected
        if ('Home' === $selected_import['import_file_name']) {
            $front_page_id = get_page_by_title('Home');
            update_option('medilink_theme_active_demo', $selected_import['import_file_name']);
        } elseif ('Home2' === $selected_import['import_file_name']) {
            $front_page_id = get_page_by_title(' x');
            update_option('medilink_theme_active_demo', $selected_import['import_file_name']);
        } elseif ('Home3' === $selected_import['import_file_name']) {
            $front_page_id = get_page_by_title('Home3');
            update_option('medilink_theme_active_demo', $selected_import['import_file_name']);
        } elseif ('Home4' === $selected_import['import_file_name']) {
            $front_page_id = get_page_by_title('Home4');
            update_option('medilink_theme_active_demo', $selected_import['import_file_name']);
        } elseif ('Home5' === $selected_import['import_file_name']) {
            $front_page_id = get_page_by_title('Home5');
            update_option('medilink_theme_active_demo', $selected_import['import_file_name']);
        }elseif ('Home6' === $selected_import['import_file_name']) {
            $front_page_id = get_page_by_title('Home6');
            update_option('medilink_theme_active_demo', $selected_import['import_file_name']);
        }

        $blog_page_id = get_page_by_title('Tact');
        update_option('show_on_front', 'page');
        update_option('page_on_front', $front_page_id->ID);
        update_option('page_for_posts', $blog_page_id->ID);

        update_option('medilink_demo_imported', 'imported');
    }

    // Set Menu As Primary && Off Canvus Menu
    $main_menu = get_term_by('name', 'main menu', 'nav_menu');
    $offcanvus_menu = get_term_by('name', 'Off Canvas', 'nav_menu');
    $headertop = get_term_by('name', 'header top', 'nav_menu');
    $footerbottom = get_term_by('name', 'footer-bottom-menu', 'nav_menu');
    set_theme_mod('nav_menu_locations', array(
        'primary' => $main_menu->term_id,
        'offcanvas' => $offcanvus_menu->term_id,
        'headertop' => $headertop->term_id,
        'footerbottom' => $footerbottom->term_id
    ));

}

add_action('pt-ocdi/after_import', 'medilink_after_import_setup');


/**
 * time_for_one_ajax_call
 * @return int
 */
function medilink_change_time_of_single_ajax_call()
{
    return 20;
}
add_action('pt-ocdi/time_for_one_ajax_call', 'medilink_change_time_of_single_ajax_call');


// To make demo imported items selected
add_action('admin_footer', 'medilink_pt_ocdi_add_scripts');
function medilink_pt_ocdi_add_scripts()
{
    $demo_imported = get_option('medilink_theme_active_demo');
     if (!empty($demo_imported)) {
        ?>
        <script>
            jQuery(document).ready(function ($) {
                $('.ocdi__gl-item.js-ocdi-gl-item').each(function () {
                    var ocdi_theme_title = $(this).data('name');
                    var current_ocdi_theme_title = '<?php echo strtolower($demo_imported); ?>';
                    if (ocdi_theme_title == current_ocdi_theme_title) {
                        $(this).addClass('active_demo');
                        return false;
                    }
                });
            });
        </script>
        <?php
    }
}

/**
 * Remove ads
 */
add_filter('pt-ocdi/disable_pt_branding', '__return_true');