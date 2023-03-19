<?php

// Exit if accessed directly
if( ! defined( 'ABSPATH' ) ) exit();

if ( !class_exists( 'WPeducation_Addons_Init' ) ) {
    class WPeducation_Addons_Init{
        
        public function __construct(){
            if ( wpeducation_is_elementor_version( '>=', '3.5.0' ) ) {
                add_action( 'elementor/widgets/register', [$this, 'wpeducation_includes_widgets'] );
            }else{
                add_action( 'elementor/widgets/widgets_registered', [ $this, 'wpeducation_includes_widgets' ] );
            }
        }
        // Include Widgets File
        public function wpeducation_includes_widgets(){

            if ( file_exists( WPEDUCATION_ADDONS_PL_PATH.'includes/widgets/wpeducation_addons_course.php' ) ) {
                require_once WPEDUCATION_ADDONS_PL_PATH.'includes/widgets/wpeducation_addons_course.php';
            }

            if ( file_exists( WPEDUCATION_ADDONS_PL_PATH.'includes/widgets/wpeducation_addons_teachers.php' ) ) {
                require_once WPEDUCATION_ADDONS_PL_PATH.'includes/widgets/wpeducation_addons_teachers.php';
            }

            if ( file_exists( WPEDUCATION_ADDONS_PL_PATH.'includes/widgets/wpeducation_addons_section_divider.php' ) ) {
                require_once WPEDUCATION_ADDONS_PL_PATH.'includes/widgets/wpeducation_addons_section_divider.php';
            }

            if ( file_exists( WPEDUCATION_ADDONS_PL_PATH.'includes/widgets/wpeducation_addons_section-title.php' ) ) {
                require_once WPEDUCATION_ADDONS_PL_PATH.'includes/widgets/wpeducation_addons_section-title.php';
            }

            if ( file_exists( WPEDUCATION_ADDONS_PL_PATH.'includes/widgets/wpeducation_addons_our_benefit_box.php' ) ) {
                require_once WPEDUCATION_ADDONS_PL_PATH.'includes/widgets/wpeducation_addons_our_benefit_box.php';
            }

            if ( file_exists( WPEDUCATION_ADDONS_PL_PATH.'includes/widgets/wpeducation_addons_info_box.php' ) ) {
                require_once WPEDUCATION_ADDONS_PL_PATH.'includes/widgets/wpeducation_addons_info_box.php';
            }

            if ( file_exists( WPEDUCATION_ADDONS_PL_PATH.'includes/widgets/wpeducation_addons_testimonial.php' ) ) {
                require_once WPEDUCATION_ADDONS_PL_PATH.'includes/widgets/wpeducation_addons_testimonial.php';
            }

            if ( file_exists( WPEDUCATION_ADDONS_PL_PATH.'includes/widgets/wpeducation_addons_gallery.php' ) ) {
                require_once WPEDUCATION_ADDONS_PL_PATH.'includes/widgets/wpeducation_addons_gallery.php';
            }

            if ( file_exists( WPEDUCATION_ADDONS_PL_PATH.'includes/widgets/wpeducation_addons_events.php' ) ) {
                require_once WPEDUCATION_ADDONS_PL_PATH.'includes/widgets/wpeducation_addons_events.php';
            }

            if ( file_exists( WPEDUCATION_ADDONS_PL_PATH.'includes/widgets/wpeducation_addons_counter.php' ) ) {
                require_once WPEDUCATION_ADDONS_PL_PATH.'includes/widgets/wpeducation_addons_counter.php';
            }

            if ( file_exists( WPEDUCATION_ADDONS_PL_PATH.'includes/widgets/wpeducation_addons_call_to_action.php' ) ) {
                require_once WPEDUCATION_ADDONS_PL_PATH.'includes/widgets/wpeducation_addons_call_to_action.php';
            }

            if ( file_exists( WPEDUCATION_ADDONS_PL_PATH.'includes/widgets/wpeducation_addons_slider.php' ) ) {
                require_once WPEDUCATION_ADDONS_PL_PATH.'includes/widgets/wpeducation_addons_slider.php';
            }

            if ( file_exists( WPEDUCATION_ADDONS_PL_PATH.'includes/widgets/wpeducation_addons_blog.php' ) ) {
                require_once WPEDUCATION_ADDONS_PL_PATH.'includes/widgets/wpeducation_addons_blog.php';
            }

            if ( file_exists( WPEDUCATION_ADDONS_PL_PATH.'includes/widgets/wpeducation_addons_service_box.php' ) ) {
                require_once WPEDUCATION_ADDONS_PL_PATH.'includes/widgets/wpeducation_addons_service_box.php';
            }

            if ( file_exists( WPEDUCATION_ADDONS_PL_PATH.'includes/widgets/wpeducation_addons_icon_list.php' ) ) {
                require_once WPEDUCATION_ADDONS_PL_PATH.'includes/widgets/wpeducation_addons_icon_list.php';
            }

            if ( file_exists( WPEDUCATION_ADDONS_PL_PATH.'includes/widgets/wpeducation_addons_progress_bar.php' ) ) {
                require_once WPEDUCATION_ADDONS_PL_PATH.'includes/widgets/wpeducation_addons_progress_bar.php';
            }

            if ( file_exists( WPEDUCATION_ADDONS_PL_PATH.'includes/widgets/wpeducation_addons_schedule.php' ) ) {
                require_once WPEDUCATION_ADDONS_PL_PATH.'includes/widgets/wpeducation_addons_schedule.php';
            }

            if ( file_exists( WPEDUCATION_ADDONS_PL_PATH.'includes/widgets/wpeducation_addons_google_maps.php' ) ) {
                require_once WPEDUCATION_ADDONS_PL_PATH.'includes/widgets/wpeducation_addons_google_maps.php';
            }

            if ( file_exists( WPEDUCATION_ADDONS_PL_PATH.'includes/widgets/wpeducation_addons_accrodion_tab.php' ) ) {
                require_once WPEDUCATION_ADDONS_PL_PATH.'includes/widgets/wpeducation_addons_accrodion_tab.php';
            }

            if ( file_exists( WPEDUCATION_ADDONS_PL_PATH.'includes/widgets/wpeducation_addons_teachers_sidebar_widgets.php' ) ) {
                require_once WPEDUCATION_ADDONS_PL_PATH.'includes/widgets/wpeducation_addons_teachers_sidebar_widgets.php';
            }

            if ( file_exists( WPEDUCATION_ADDONS_PL_PATH.'includes/widgets/wpeducation_addons_countdown.php' ) ) {
                require_once WPEDUCATION_ADDONS_PL_PATH.'includes/widgets/wpeducation_addons_countdown.php';
            }

            
        }
}
    new WPeducation_Addons_Init();
}

if ( !function_exists( 'WPeducation_fonts_url' ) ) :
function WPeducation_fonts_url() {
    $fonts_url = '';
    $fonts     = array();
    $subsets   = 'latin,latin-ext';

    /* translators: If there are characters in your language that are not supported by Open Sans, translate this to 'off'. Do not translate into your own language. */
    if ( 'off' !== _x( 'on', 'Poppins font: on or off', 'wpeducation' ) ) {
        $fonts[] = 'Open Sans:100,200,300,400,500,600,700,800,900';
    }

    /* translators: If there are characters in your language that are not supported by Raleway, translate this to 'off'. Do not translate into your own language. */
    if ( 'off' !== _x( 'on', 'Raleway font: on or off', 'wpeducation' ) ) {
        $fonts[] = 'Raleway:300,400,500,600,700,900';
    }

    if ( $fonts ) {
        $fonts_url = add_query_arg( array(
            'family' => urlencode( implode( '|', $fonts ) ),
            'subset' => urlencode( $subsets ),
        ), 'https://fonts.googleapis.com/css' );
    }

    return $fonts_url;
}
endif;

// enqueue scripts
add_action( 'wp_enqueue_scripts','wpeducation_enqueue_scripts');
function  wpeducation_enqueue_scripts(){
    // enqueue styles
	wp_enqueue_style('wpeducation-font',WPeducation_fonts_url());
    wp_enqueue_style( 'bootstrap', WPEDUCATION_ADDONS_PL_URL . 'assets/css/bootstrap.min.css');
    wp_enqueue_style( 'font-awesome', WPEDUCATION_ADDONS_PL_URL . 'assets/css/font-awesome.min.css');
    wp_enqueue_style( 'fancybox', WPEDUCATION_ADDONS_PL_URL . 'assets/css/jquery.fancybox.css');
    wp_enqueue_style( 'wpeducation-vendors', WPEDUCATION_ADDONS_PL_URL.'assets/css/wpeducation-vendors.css');
    wp_enqueue_style( 'wpeducation-widgets', WPEDUCATION_ADDONS_PL_URL.'assets/css/wpeducation-widgets.css');
    // enqueue js
     wp_enqueue_script( 'popper', WPEDUCATION_ADDONS_PL_URL . 'assets/js/popper.min.js', array('jquery'), '1.0.0', true);    
     wp_enqueue_script( 'bootstrap', WPEDUCATION_ADDONS_PL_URL . 'assets/js/bootstrap.min.js', array('jquery'), '4.0.0', true);
     wp_enqueue_script( 'fancybox', WPEDUCATION_ADDONS_PL_URL . 'assets/js/jquery.fancybox.min.js', array('jquery'), '3.1.20', true);
     wp_enqueue_script( 'waypoints', WPEDUCATION_ADDONS_PL_URL . 'assets/js/waypoints.js', array('jquery'), '4.0.1', true );
     wp_enqueue_script( 'counterup', WPEDUCATION_ADDONS_PL_URL . 'assets/js/jquery.counterup.js', array('jquery'), '1.0.0', true );
     wp_enqueue_script( 'countdown', WPEDUCATION_ADDONS_PL_URL . 'assets/js/jquery.countdown.js', array('jquery'), '1.0.0', true );
     wp_enqueue_script( 'maps', WPEDUCATION_ADDONS_PL_URL . 'assets/js/maps.js', array('jquery'), '1.0.0', true );
     wp_enqueue_script( 'maps-address', WPEDUCATION_ADDONS_PL_URL . 'assets/js/maps-address.js', array('jquery'), '1.0.0', true );
     wp_enqueue_script( 'wow-js', WPEDUCATION_ADDONS_PL_URL . 'assets/js/wow-js.js', array('jquery'), '1.1.3', true );
     wp_enqueue_script( 'wpeducation-vendors', WPEDUCATION_ADDONS_PL_URL.'assets/js/wpeducation-vendors.js', array('jquery'), '', false);
     wp_enqueue_script( 'imagesloaded' );
     wp_enqueue_script( 'isotope', WPEDUCATION_ADDONS_PL_URL.'assets/js/isotope.pkgd.min.js', array('jquery'), '3.0.3',false );
     wp_enqueue_script( 'wpeducation-active', WPEDUCATION_ADDONS_PL_URL.'assets/js/wpeducation-jquery-widgets-active.js', array('jquery'), '', true);
}

add_action('init','wpeducation_size');
function wpeducation_size(){
    add_image_size('wpeducation_img1170x600',1170,600,true);
    add_image_size('wpeducation_img550x348',550,348,true);
    add_image_size('wpeducation_img370x410',370,410,true);
    add_image_size('wpeducation_img162x100',162,100,true);
    add_image_size('wpevents_img380x260',380,260,true);
    add_image_size('wpeducation_img100x100',100,100,true);
}

/**
* Elementor Version check
* Return boolean value
*/
function wpeducation_is_elementor_version( $operator = '<', $version = '2.6.0' ) {
    return defined( 'ELEMENTOR_VERSION' ) && version_compare( ELEMENTOR_VERSION, $version, $operator );
}

// Compatibility with elementor version 3.6.1
function wpeducation_widget_register_manager($widget_class){
    $widgets_manager = \Elementor\Plugin::instance()->widgets_manager;
    
    if ( wpeducation_is_elementor_version( '>=', '3.5.0' ) ){
        $widgets_manager->register( $widget_class );
    }else{
        $widgets_manager->register_widget_type( $widget_class );
    }
}