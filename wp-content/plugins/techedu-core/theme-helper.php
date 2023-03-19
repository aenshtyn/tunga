<?php
/**
 * Plugin Name: TechEdu Core
 * Plugin URI: https://devitems.com
 * Description: After install the TechEdu WordPress Theme, you must need to install this "TechEdu Core Plugin" first to get all functions of TechEdu WP Theme.
 * Version: 1.0.2
 * Author: Power Boosts
 * Author URI: http://hastech.company
 * Text Domain: techeduem
 * License: GPL/GNU.
 /*Copyright 2018 TechEdu(email:support@bootexperts.com)
    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

/**
* Define
*/
//define
define( 'PLG_URL', plugins_url() );
define( 'PLG_DIR', dirname( __FILE__ ) ); 

/**----------------------------------------------------------------*/
/* Include all file
/*-----------------------------------------------------------------*/  
include_once PLG_DIR . '/include/recent-post.php';
include_once PLG_DIR . '/include/newsletter.php';
include_once PLG_DIR . '/include/author-info.php';
include_once PLG_DIR . '/include/video-popup.php';
include_once PLG_DIR . '/include/single-banner.php';
include_once PLG_DIR . '/include/company-info-widget.php';

/*
 * Woocommerce widgets
 */
add_action( 'widgets_init', 'techeduem_woocommerce_widgets', 15 );
function techeduem_woocommerce_widgets() {
    if ( class_exists( 'WC_Widget_Layered_Nav' ) ) {
		include_once PLG_DIR . '/include/classes/class-wc-widget-layered-nav.php';
        register_widget( 'Techeduem_Widget_Layered_Nav' );
    }
}