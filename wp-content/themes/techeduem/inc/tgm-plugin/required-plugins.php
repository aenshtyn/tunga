<?php
/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1 for parent theme techeduem for publication on ThemeForest
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 *
 * Depending on your implementation, you may want to change the include call:
 *
 * Parent Theme:
 * require_once get_template_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Child Theme:
 * require_once get_stylesheet_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Plugin:
 * require_once dirname( __FILE__ ) . '/path/to/class-tgm-plugin-activation.php';
 */
require_once get_template_directory() . '/inc/tgm-plugin/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'techeduem_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variables passed to the `tgmpa()` function should be:
 * - an array of plugin arrays;
 * - optionally a configuration array.
 * If you are not changing anything in the configuration array, you can remove the array and remove the
 * variable from the function call: `tgmpa( $plugins );`.
 * In that case, the TGMPA default settings will be used.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function techeduem_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(
		array(
			'name'      		 => esc_html__('TechEdu Core', 'techeduem'), 
			'slug'      		 => 'techedu-core',
			'source'			 => get_template_directory().'/inc/demo-content/plugin/techedu-core.zip',
			'required'  		 => true,
			'required'           => true, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '1.0.2', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
		),
        array(
            'name'      => esc_html__('WP Education – Education WordPress Plugin for Elementor', 'techeduem'), 
            'slug'      => 'wp-education',
            'required'  => true,
        ),
        array(
            'name'      => esc_html__('CMB2','techeduem'), 
            'slug'      => 'cmb2',
            'required'  => false,
        ),
        array(
            'name'      => esc_html__('Redux Framework', 'techeduem'), 
            'slug'      => 'redux-framework',
            'required'  => false,
        ),
        array(
            'name'      => esc_html__('Contact Form 7', 'techeduem'), 
            'slug'      => 'contact-form-7',
            'required'  => false,
        ),
        array(
            'name'      => esc_html__('Elementor', 'techeduem'), 
            'slug'      => 'elementor', 
            'required'  => false,
        ),
        array(
            'name'      => esc_html__('Mailchimp For WP', 'techeduem'), 
            'slug'      => 'mailchimp-for-wp', 
            'required'  => false,
        ),
        array(
            'name'      => esc_html__('WooCommerce', 'techeduem'), 
            'slug'      => 'woocommerce', 
            'required'  => false,
        ),
        array(
            'name'      => esc_html__('One Click Demo', 'techeduem'), 
            'slug'      => 'one-click-demo-import', 
            'required'  => false,
        ),
	);

	// YITH Wishlist
	$plugins['yith_wishlist'] = array(
		'name'      => 'YITH WooCommerce Wishlist',
		'slug'      => 'yith-woocommerce-wishlist',
		'required'  => false,
	);

	// WishSuite Wishlist Plugin
	if( !class_exists('YITH_WCWL') ){
		$plugins['ht_wishsuite'] = array(
			'name'      => 'WishSuite – Wishlist for WooCommerce',
			'slug'      => 'wishsuite',
			'required'  => false,
		);
		unset( $plugins['yith_wishlist'] );
	}

	// Variation Swatches
	$plugins['variation_swatches'] = array(
        'name'      => esc_html__('Variation swatches for WooCommerce', 'techeduem'), 
        'slug'      => 'variation-swatches-for-woocommerce', 
        'required'  => false,
	);

	// Swatchly Variation Swatches
	if( !class_exists('TA_WC_Variation_Swatches_Admin') ){
		$plugins['ht_swatchly'] = array(
            'name'      => esc_html__('Swatchly – Variation Swatches for WooCommerce Products', 'techeduem'), 
            'slug'      => 'swatchly', 
            'required'  => false,
		);
		unset( $plugins['variation_swatches'] );
	}

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.

		
		'strings'      => array(
			'page_title'                      => esc_html__( 'Install Required Plugins', 'techeduem' ),
			'menu_title'                      => esc_html__( 'Install Plugins', 'techeduem' ),
			'installing'                      => esc_html__( 'Installing Plugin: %s', 'techeduem' ), // %s = plugin name.
			'oops'                            => esc_html__( 'Something went wrong with the plugin API.', 'techeduem' ),
			'notice_can_install_required'     => _n_noop(
				'This theme requires the following plugin: %1$s.',
				'This theme requires the following plugins: %1$s.',
				'techeduem'
			), // %1$s = plugin name(s).
			'notice_can_install_recommended'  => _n_noop(
				'This theme recommends the following plugin: %1$s.',
				'This theme recommends the following plugins: %1$s.',
				'techeduem'
			), // %1$s = plugin name(s).
			'notice_cannot_install'           => _n_noop(
				'Sorry, but you do not have the correct permissions to install the %1$s plugin.',
				'Sorry, but you do not have the correct permissions to install the %1$s plugins.',
				'techeduem'
			), // %1$s = plugin name(s).
			'notice_ask_to_update'            => _n_noop(
				'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
				'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
				'techeduem'
			), // %1$s = plugin name(s).
			'notice_ask_to_update_maybe'      => _n_noop(
				'There is an update available for: %1$s.',
				'There are updates available for the following plugins: %1$s.',
				'techeduem'
			), // %1$s = plugin name(s).
			'notice_cannot_update'            => _n_noop(
				'Sorry, but you do not have the correct permissions to update the %1$s plugin.',
				'Sorry, but you do not have the correct permissions to update the %1$s plugins.',
				'techeduem'
			), // %1$s = plugin name(s).
			'notice_can_activate_required'    => _n_noop(
				'The following required plugin is currently inactive: %1$s.',
				'The following required plugins are currently inactive: %1$s.',
				'techeduem'
			), // %1$s = plugin name(s).
			'notice_can_activate_recommended' => _n_noop(
				'The following recommended plugin is currently inactive: %1$s.',
				'The following recommended plugins are currently inactive: %1$s.',
				'techeduem'
			), // %1$s = plugin name(s).
			'notice_cannot_activate'          => _n_noop(
				'Sorry, but you do not have the correct permissions to activate the %1$s plugin.',
				'Sorry, but you do not have the correct permissions to activate the %1$s plugins.',
				'techeduem'
			), // %1$s = plugin name(s).
			'install_link'                    => _n_noop(
				'Begin installing plugin',
				'Begin installing plugins',
				'techeduem'
			),
			'update_link' 					  => _n_noop(
				'Begin updating plugin',
				'Begin updating plugins',
				'techeduem'
			),
			'activate_link'                   => _n_noop(
				'Begin activating plugin',
				'Begin activating plugins',
				'techeduem'
			),
			'return'                          => esc_html__( 'Return to Required Plugins Installer', 'techeduem' ),
			'plugin_activated'                => esc_html__( 'Plugin activated successfully.', 'techeduem' ),
			'activated_successfully'          => esc_html__( 'The following plugin was activated successfully:', 'techeduem' ),
			'plugin_already_active'           => esc_html__( 'No action taken. Plugin %1$s was already active.', 'techeduem' ),  // %1$s = plugin name(s).
			'plugin_needs_higher_version'     => esc_html__( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'techeduem' ),  // %1$s = plugin name(s).
			'complete'                        => esc_html__( 'All plugins installed and activated successfully. %1$s', 'techeduem' ), // %s = dashboard link.
			'contact_admin'                   => esc_html__( 'Please contact the administrator of this site for help.', 'techeduem' ),

			'nag_type'                        => 'updated', // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
		),
		
	);

	tgmpa( $plugins, $config );
}