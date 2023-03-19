<?php
/**
 * Plugin Name: WP Education
 * Description: Education WordPress Plugins for Elementor
 * Plugin URI: http://demo.wphash.com/education/
 * Version: 1.2.7
 * Author: HT Plugins
 * Author URI: https://htplugins.com/
 * License:  GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: wpeducation
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

define( 'WPEDUCATION_VERSION', '1.2.7' );
define( 'WPEDUCATION_ADDONS_PL_URL', plugins_url( '/', __FILE__ ) );
define( 'WPEDUCATION_ADDONS_PL_PATH', plugin_dir_path( __FILE__ ) );
define( 'WPEDUCATION_ADDONS_PL_ROOT', __FILE__ );

// Required File
require_once WPEDUCATION_ADDONS_PL_PATH.'includes/helper-function.php';
if( did_action( 'elementor/loaded' ) ) {
	require_once WPEDUCATION_ADDONS_PL_PATH.'includes/class.icon-manager.php';
}
require_once WPEDUCATION_ADDONS_PL_PATH.'init.php';
require_once WPEDUCATION_ADDONS_PL_PATH.'admin/init.php';

add_filter('single_template', 'wpeducation_single_template_modify');

function wpeducation_single_template_modify($single) {

    global $post;

    /* Checks for single template by post type */
    if ( $post->post_type == 'wpeducation' ) {
        if ( file_exists( WPEDUCATION_ADDONS_PL_PATH . '/single-wpeducation.php' ) ) {
            return WPEDUCATION_ADDONS_PL_PATH . '/single-wpeducation.php';
        }
    }

    /* Checks for single template by post type */
    if ( $post->post_type == 'teachers' ) {
        if ( file_exists( WPEDUCATION_ADDONS_PL_PATH . '/single-teachers.php' ) ) {
            return WPEDUCATION_ADDONS_PL_PATH . '/single-teachers.php';
        }
    }

    /* Checks for single template by post type */
    if ( $post->post_type == 'events' ) {
        if ( file_exists( WPEDUCATION_ADDONS_PL_PATH . '/single-events.php' ) ) {
            return WPEDUCATION_ADDONS_PL_PATH . '/single-events.php';
        }
    }

    return $single;

}

add_filter('archive_template', 'wpeducation_archive_modify');

function wpeducation_archive_modify($archive) {

    global $post;

    /* Checks for archive template by post type */
    if ( $post->post_type == 'wpeducation' ) {
        if ( file_exists( WPEDUCATION_ADDONS_PL_PATH . '/archive-wpeducation.php' ) ) {
            return WPEDUCATION_ADDONS_PL_PATH . '/archive-wpeducation.php';
        }
    }

    return $archive;

}

/**
 * Get the value of a settings field
 *
 * @param string $option settings field name
 * @param string $section the section name this field belongs to
 * @param string $default default text if it's not found
 *
 * @return mixed
 */
function wpeducation_get_option( $option, $section, $default = '' ) {

    $options = get_option( $section );

    if ( isset( $options[$option] ) ) {
        return $options[$option];
    }

    return $default;
}


// Check Plugins is Installed or not
function wpeducation_is_plugins_active( $pl_file_path = NULL ){
    $installed_plugins_list = get_plugins();
    return isset( $installed_plugins_list[$pl_file_path] );
}
// This notice for Cmb2 is not installed or activated or both.

function wpeducation_check_cmb2_status(){
    $cmb2 = 'cmb2/init.php';

    if( wpeducation_is_plugins_active($cmb2) ) {
        if( ! current_user_can( 'activate_plugins' ) ) {
            return;
        }
        $activation_url = wp_nonce_url( 'plugins.php?action=activate&amp;plugin=' . $cmb2 . '&amp;plugin_status=all&amp;paged=1&amp;s', 'activate-plugin_' . $cmb2 );
        $message = __( '<strong>WP Education Addons for Cmb2</strong> Requires Cmb2 plugin to be active. Please activate Cmb2 to continue.', 'wpeducation' );
        $button_text = __( 'Activate CMB2', 'wpeducation' );
    } else {
        if( ! current_user_can( 'activate_plugins' ) ) {
            return;
        }
        $activation_url = wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=cmb2' ), 'install-plugin_cmb2' );
        $message = sprintf( __( '<strong>WP Education Addons for Cmb2</strong> requires %1$s"Cmb2"%2$s plugin to be installed and activated. Please install Cmb2 to continue.', 'wpeducation' ), '<strong>', '</strong>' );
        $button_text = __( 'Install Cmb2', 'wpeducation' );
    }
    $button = '<p><a href="' . $activation_url . '" class="button-primary">' . $button_text . '</a></p>';
    printf( '<div class="error"><p>%1$s</p>%2$s</div>', __( $message ), $button );
}


if( ! defined( 'CMB2_LOADED' )) {
    add_action( 'admin_init', 'wpeducation_check_cmb2_status' );
}


// This notice for Elementor is not installed or activated or both.
function wpeducation_check_elementor_status(){
    $elementor = 'elementor/elementor.php';
    if( wpeducation_is_plugins_active($elementor) ) {
        if( ! current_user_can( 'activate_plugins' ) ) {
            return;
        }
        $activation_url = wp_nonce_url( 'plugins.php?action=activate&amp;plugin=' . $elementor . '&amp;plugin_status=all&amp;paged=1&amp;s', 'activate-plugin_' . $elementor );
        $message = __( '<strong>WP Education Addons for Elementor</strong> Requires Elementor plugin to be active. Please activate Elementor to continue.', 'wpeducation' );
        $button_text = __( 'Activate Elementor', 'wpeducation' );
    } else {
        if( ! current_user_can( 'activate_plugins' ) ) {
            return;
        }
        $activation_url = wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=elementor' ), 'install-plugin_elementor' );
        $message = sprintf( __( '<strong>WP Education Addons for Elementor</strong> requires %1$s"Elementor"%2$s plugin to be installed and activated. Please install Elementor to continue.', 'wpeducation' ), '<strong>', '</strong>' );
        $button_text = __( 'Install Elementor', 'wpeducation' );
    }
    $button = '<p><a href="' . $activation_url . '" class="button-primary">' . $button_text . '</a></p>';
    printf( '<div class="error"><p>%1$s</p>%2$s</div>', __( $message ), $button );
}

if( ! did_action( 'elementor/loaded' ) ) {
    add_action( 'admin_notices', 'wpeducation_check_elementor_status' );
}


// This notice for Cmb2 is not installed or activated or both.
function wpeducation_check_contact_form(){
    $contact = 'contact-form-7/wp-contact-form-7.php';
    if( wpeducation_is_plugins_active($contact) ) {
        if( ! current_user_can( 'activate_plugins' ) ) {
            return;
        }
        $activation_url = wp_nonce_url( 'plugins.php?action=activate&amp;plugin=' . $contact . '&amp;plugin_status=all&amp;paged=1&amp;s', 'activate-plugin_' . $contact );
        $message = __( '<strong>WP Education Addons for contact-form-7</strong> requires contact-form-7 plugin to be active. Please activate contact-form-7 to continue.', 'wpeducation' );
        $button_text = __( 'Activate contact-form-7', 'wpeducation' );
    } else {
        if( ! current_user_can( 'activate_plugins' ) ) {
            return;
        }
        $activation_url = wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=contact-form-7' ), 'install-plugin_contact-form-7' );
        $message = sprintf( __( '<strong>WP Education Addons for contact-form-7</strong> requires %1$s"contact-form-7"%2$s plugin to be installed and activated. Please install contact-form-7 to continue.', 'wpeducation' ), '<strong>', '</strong>' );
        $button_text = __( 'Install contact-form-7', 'wpeducation' );
    }
    $button = '<p><a href="' . $activation_url . '" class="button-primary">' . $button_text . '</a></p>';
    printf( '<div class="error"><p>%1$s</p>%2$s</div>', __( $message ), $button );
}

if( ! defined( 'WPCF7_VERIFY_NONCE')) {
    add_action( 'admin_notices', 'wpeducation_check_contact_form' );
}


/*
 * Display tabs related to Education in admin when user
 * viewing/editing Education/category/tags.
 */
function wpeducation_tabs($view) {
    if ( ! is_admin() ) {
        return;
    }
    $admin_tabs = apply_filters(
        'wpeducation_tabs_info',
        array(

            10 => array(
                "link" => "edit.php?post_type=wpeducation",
                "name" => __( "Courses", "wpeducation" ),
                "id"   => "edit-wpeducation",
            ),

            20 => array(
                "link" => "edit-tags.php?taxonomy=wpeducation_category&post_type=wpeducation",
                "name" => __( "Categories", "wpeducation" ),
                "id"   => "edit-wpeducation_category",
            ),

        )
    );
    ksort( $admin_tabs );
    $tabs = array();
    foreach ( $admin_tabs as $key => $value ) {
        array_push( $tabs, $key );
    }
    $pages = apply_filters(
        'wpeducation_admin_tabs_on_pages',
        array( 'edit-wpeducation', 'edit-wpeducation_category', 'edit-wpeducation_tag', 'wpeducation' )
    );
    $admin_tabs_on_page = array();
    foreach ( $pages as $page ) {
        $admin_tabs_on_page[ $page ] = $tabs;
    }

    $current_page_id = get_current_screen()->id;
    $current_user    = wp_get_current_user();
    if ( ! in_array( 'administrator', $current_user->roles ) ) {
        return;
    }
    if ( ! empty( $admin_tabs_on_page[ $current_page_id ] ) && count( $admin_tabs_on_page[ $current_page_id ] ) ) {
        echo '<h2 class="nav-tab-wrapper lp-nav-tab-wrapper">';
        foreach ( $admin_tabs_on_page[ $current_page_id ] as $admin_tab_id ) {

            $class = ( $admin_tabs[ $admin_tab_id ]["id"] == $current_page_id ) ? "nav-tab nav-tab-active" : "nav-tab";
            echo '<a href="' . esc_url(admin_url( $admin_tabs[ $admin_tab_id ]["link"] )) . '" class="' . $class . ' nav-tab-' . $admin_tabs[ $admin_tab_id ]["id"] . '">' . esc_html($admin_tabs[ $admin_tab_id ]["name"]) . '</a>';
        }
        echo '</h2>';
    }
    return $view;
}


add_filter('views_edit-wpeducation','wpeducation_tabs');
add_action('wpeducation_category','wpeducation_tabs');


/*
 * Display tabs related to teachers in admin when user
 * viewing/editing gallery/category.
 */
function wpeducation_teachers_tabs($view) {
    if ( ! is_admin() ) {
        return;
    }
    $admin_tabs = apply_filters(
        'wpeducation_teachers_tabs_info',
        array(

            10 => array(
                "link" => "edit.php?post_type=teachers",
                "name" => __( "Teachers", "wpeducation" ),
                "id"   => "edit-teachers",
            ),

            20 => array(
                "link" => "edit-tags.php?taxonomy=teachers_category&post_type=teachers",
                "name" => __( "Categories", "wpeducation" ),
                "id"   => "edit-teachers_category",
            ),

        )
    );
    ksort( $admin_tabs );
    $tabs = array();
    foreach ( $admin_tabs as $key => $value ) {
        array_push( $tabs, $key );
    }
    $pages = apply_filters(
        'teachers_admin_tabs_on_pages',
        array( 'edit-teachers', 'edit-teachers_category', 'edit-teachers_tag', 'teachers' )
    );
    $admin_tabs_on_page = array();
    foreach ( $pages as $page ) {
        $admin_tabs_on_page[ $page ] = $tabs;
    }
    $current_page_id = get_current_screen()->id;
    $current_user    = wp_get_current_user();
    if ( ! in_array( 'administrator', $current_user->roles ) ) {
        return;
    }
    if ( ! empty( $admin_tabs_on_page[ $current_page_id ] ) && count( $admin_tabs_on_page[ $current_page_id ] ) ) {
        echo '<h2 class="nav-tab-wrapper lp-nav-tab-wrapper">';
        foreach ( $admin_tabs_on_page[ $current_page_id ] as $admin_tab_id ) {

            $class = ( $admin_tabs[ $admin_tab_id ]["id"] == $current_page_id ) ? "nav-tab nav-tab-active" : "nav-tab";
            echo '<a href="' . esc_url(admin_url( $admin_tabs[ $admin_tab_id ]["link"] )) . '" class="' . esc_attr($class) . ' nav-tab-' . $admin_tabs[ $admin_tab_id ]["id"] . '">' . esc_html($admin_tabs[ $admin_tab_id ]["name"]) . '</a>';
        }
        echo '</h2>';
    }
    return $view;
}


add_filter('views_edit-teachers','wpeducation_teachers_tabs');
add_action('teachers_category','wpeducation_teachers_tabs');

/*
 * Display tabs related to gallery in admin when user
 * viewing/editing gallery/category.
 */
function wpeducation_gallery_tabs($view) {
    if ( ! is_admin() ) {
        return;
    }
    $admin_tabs = apply_filters(
        'wpeducation_gallery_tabs_info',
        array(

            10 => array(
                "link" => "edit.php?post_type=gallery",
                "name" => __( "Gallery", "wpeducation" ),
                "id"   => "edit-gallery",
            ),

            20 => array(
                "link" => "edit-tags.php?taxonomy=gallery_cat&post_type=gallery",
                "name" => __( "Categories", "wpeducation" ),
                "id"   => "edit-gallery_cat",
            ),

        )
    );
    ksort( $admin_tabs );
    $tabs = array();
    foreach ( $admin_tabs as $key => $value ) {
        array_push( $tabs, $key );
    }
    $pages = apply_filters(
        'gallery_admin_tabs_on_pages',
        array( 'edit-gallery', 'edit-gallery_cat', 'edit-gallery_tag', 'gallery' )
    );
    $admin_tabs_on_page = array();
    foreach ( $pages as $page ) {
        $admin_tabs_on_page[ $page ] = $tabs;
    }
    $current_page_id = get_current_screen()->id;
    $current_user    = wp_get_current_user();
    if ( ! in_array( 'administrator', $current_user->roles ) ) {
        return;
    }
    if ( ! empty( $admin_tabs_on_page[ $current_page_id ] ) && count( $admin_tabs_on_page[ $current_page_id ] ) ) {
        echo '<h2 class="nav-tab-wrapper lp-nav-tab-wrapper">';
        foreach ( $admin_tabs_on_page[ $current_page_id ] as $admin_tab_id ) {

            $class = ( $admin_tabs[ $admin_tab_id ]["id"] == $current_page_id ) ? "nav-tab nav-tab-active" : "nav-tab";
            echo '<a href="' . esc_url(admin_url( $admin_tabs[ $admin_tab_id ]["link"] )) . '" class="' . esc_attr($class) . ' nav-tab-' . $admin_tabs[ $admin_tab_id ]["id"] . '">' . esc_html($admin_tabs[ $admin_tab_id ]["name"]) . '</a>';
        }
        echo '</h2>';
    }
    return $view;
}


add_filter('views_edit-gallery','wpeducation_gallery_tabs');
add_action('gallery_cat','wpeducation_gallery_tabs');

/*
 * Display tabs related to events in admin when user
 * viewing/editing events/category.
 */
function wpeducation_events_tabs($view) {
    if ( ! is_admin() ) {
        return;
    }
    $admin_tabs = apply_filters(
        'wpeducation_events_tabs_info',
        array(

            10 => array(
                "link" => "edit.php?post_type=events",
                "name" => __( "Events", "wpeducation" ),
                "id"   => "edit-events",
            ),

            20 => array(
                "link" => "edit-tags.php?taxonomy=wpevents_category&post_type=events",
                "name" => __( "Categories", "wpeducation" ),
                "id"   => "edit-wpevents_category",
            ),

        )
    );
    ksort( $admin_tabs );
    $tabs = array();
    foreach ( $admin_tabs as $key => $value ) {
        array_push( $tabs, $key );
    }
    $pages = apply_filters(
        'events_admin_tabs_on_pages',
        array( 'edit-events', 'edit-wpevents_category', 'edit-gallery_tag', 'events' )
    );
    $admin_tabs_on_page = array();
    foreach ( $pages as $page ) {
        $admin_tabs_on_page[ $page ] = $tabs;
    }
    $current_page_id = get_current_screen()->id;
    $current_user    = wp_get_current_user();
    if ( ! in_array( 'administrator', $current_user->roles ) ) {
        return;
    }
    if ( ! empty( $admin_tabs_on_page[ $current_page_id ] ) && count( $admin_tabs_on_page[ $current_page_id ] ) ) {
        echo '<h2 class="nav-tab-wrapper lp-nav-tab-wrapper">';
        foreach ( $admin_tabs_on_page[ $current_page_id ] as $admin_tab_id ) {

            $class = ( $admin_tabs[ $admin_tab_id ]["id"] == $current_page_id ) ? "nav-tab nav-tab-active" : "nav-tab";
            echo '<a href="' . esc_url(admin_url( $admin_tabs[ $admin_tab_id ]["link"] )) . '" class="' . esc_attr($class) . ' nav-tab-' . $admin_tabs[ $admin_tab_id ]["id"] . '">' . esc_html($admin_tabs[ $admin_tab_id ]["name"]) . '</a>';
        }
        echo '</h2>';
    }
    return $view;
}

add_filter('views_edit-events','wpeducation_events_tabs');
add_action('wpevents_category','wpeducation_events_tabs');

add_action( 'wsa_form_bottom_pro_themes', 'wpeducation_pro_tab_advertise' );
function wpeducation_pro_tab_advertise(){
    echo '<h3> <a target="_blank" href="https://themeforest.net/item/techedu-education-wordpress-theme/18716168">
WP Education - Education WordPress Plugins for Elementor</a><h3/> <a target="_blank" href="https://themeforest.net/item/techedu-education-wordpress-theme/18716168"><img alt="Education WordPress Plugins for Elementor" src="https://s3.envato.com/files/219709312/techedu-prv.__large_preview.jpg"></a>';
}