<?php

/**
 * ReduxFramework Sample Config File
 * For full documentation, please visit: http://docs.reduxframework.com/
 */
if (!class_exists('Redux')) {
    return;
}

// This is your option name where all the Redux data is stored.
$opt_name = "techeduem_opt";

// This line is only for altering the demo. Can be easily removed.
$opt_name = apply_filters('redux_demo/opt_name', $opt_name);
/**
 * ---> SET ARGUMENTS
 * All the possible arguments for Redux.
 * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
 * */


$theme = wp_get_theme(); // For use with some settings. Not necessary.

$args = array(
    'opt_name'             => $opt_name,

    'display_name'         => $theme->get('Name'),
    'display_version'      => $theme->get('Version'),

    'menu_title'           => esc_html__('TechEdu Options', 'techeduem'),
    'page_title'           => esc_html__('TechEdu Options', 'techeduem'),

    'menu_type'            => 'menu',
    'menu_icon'            => get_template_directory_uri() . '/images/menu-logo.png',

    'async_typography'     => false,
    'admin_bar'            => false,
    'dev_mode'             => false,

    'page_priority'        => 3,
    'page_permissions'     => 'manage_options',

    'output'               => true,
    'output_tag'           => true,
    'allow_sub_menu'       => false,
    'hide_expand'          => true

);

// SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
$args['share_icons'][] = array(
    'url'   => 'https://www.facebook.com/devitems',
    'title' => 'Like us on Facebook',
    'icon'  => 'el el-facebook'
);
$args['share_icons'][] = array(
    'url'   => 'https://twitter.com/devitemsllc',
    'title' => 'Follow us on Twitter',
    'icon'  => 'el el-twitter'
);
$args['share_icons'][] = array(
    'url'   => 'https://www.linkedin.com/in/devitems-llc-a87b38106/',
    'title' => 'Find us on LinkedIn',
    'icon'  => 'el el-linkedin'
);
$args['share_icons'][] = array(
    'url'   => 'https://www.behance.net/DevItems',
    'title' => 'Find us on Behance',
    'icon'  => 'el el-behance'
);
$args['share_icons'][] = array(
    'url'   => 'https://dribbble.com/devitems',
    'title' => 'Find us on Dribbble',
    'icon'  => 'el el-dribbble'
);
$args['share_icons'][] = array(
    'url'   => 'https://www.instagram.com/devitems/',
    'title' => 'Find us on Instagram',
    'icon'  => 'el el-instagram'
);

$devitems = 'https://devitems.com';

$args['footer_text'] = wp_kses_post('<p class="theme_option_footer_text" > Theme developed by <a href=" ' . esc_url($devitems) . ' " target="_blank">Dev Items LLC</a>. Powered by <a href=" ' . esc_url($devitems) . ' " target="_blank">WPHash Framework</a> </p>', 'techeduem');

Redux::set_args($opt_name, $args);

/*
 * ---> END ARGUMENTS
 */

// -> START Basic Fields

/**
 * General 
 */
Redux::set_section($opt_name, array(
    'title'            => esc_html__('General', 'techeduem'),
    'id'               => 'techeduem-general-setting',
    'icon'             => 'el el-adjust-alt',
    'customizer_width' => '500px',
    'fields'           => array(
        array(
            'id'          => 'techeduem_primary_color',
            'type'        => 'color',
            'title'       => esc_html__('Primary Color', 'techeduem'),
            'subtitle'    => esc_html__('Choose your preferred color to change theme main color.', 'techeduem'),
        ),
        array(
            'id'          => 'techeduem_courses_color',
            'type'        => 'color',
            'title'       => esc_html__('Course Details Color', 'techeduem'),
            'subtitle'    => esc_html__('Choose your preferred color to change theme main color.', 'techeduem'),
        ),
        array(
            'id'                    => 'techeduem_scroll_to_top_enable',
            'type'                  => 'button_set',
            'title'                 => esc_html__('Enable Back To Top', 'techeduem'),
            'subtitle'              => esc_html__('Enable the back to top button that appears in the bottom right corner of the screen.', 'techeduem'),
            'options'               => array(
                'yes'               => esc_html__('Yes', 'techeduem'),
                'no'                => esc_html__('No', 'techeduem'),
            ),
            'default'               => 'yes'
        ),
        array(
            'id'                    => 'techeduem_preloader_enable',
            'type'                  => 'button_set',
            'title'                 => esc_html__('Preloader', 'techeduem'),
            'subtitle'              => esc_html__('Enable or disable the site preloader.', 'techeduem'),
            'options'               => array(
                'yes'               => esc_html__('Yes', 'techeduem'),
                'no'                => esc_html__('No', 'techeduem'),
            ),
            'default'               => 'no'
        ),
        array(
            'id'                    => 'techeduem_preloader_style',
            'type'                  => 'select',
            'title'                 => esc_html__('Preloader Style', 'techeduem'),
            'subtitle'              => esc_html__('Choose preloader style.', 'techeduem'),
            'options'               => array(
                'default'               => esc_html__('Default', 'techeduem'),
                'style2'                => esc_html__('Style Two', 'techeduem'),
            ),
            'default'               => 'default',
            'required'              => array('techeduem_preloader_enable', 'equals', 'yes'),
        ),
        array(
            'id'                    => 'techeduem_preloader_background_color',
            'type'                  => 'background',
            'output'                => array('#loading-default, #loading2, #loading3 '),
            'title'                 => esc_html__('Preloader Background', 'techeduem'),
            'subtitle'              => esc_html__('Pick a background color for body.', 'techeduem'),
            'background-color'      => true,
            'background-image'      => false,
            'background-attachment' => false,
            'background-position'   => false,
            'background-size'       => false,
            'background-repeat'     => false,
            'preview'               => false,
            'required'              => array('techeduem_preloader_enable', 'equals', 'yes'),
        ),
        array(
            'id'                    => 'techeduem_preloader_element_color',
            'type'                  => 'color',
            'title'                 => esc_html__('Preloader Icon color', 'techeduem'),
            'subtitle'              => esc_html__('Pick color for preloader icon.', 'techeduem'),
            'required'              => array('techeduem_preloader_enable', 'equals', 'yes'),
        ),
        array(
            'id'                    => 'techeduem_ga_tracking_id',
            'type'                  => 'text',
            'title'                 => esc_html__('Google Analytics Tracking ID', 'techeduem'),
            'subtitle'              => esc_html__('Set Google Analytics Tracking ID. Help link: https://analytics.google.com', 'techeduem'),
        ),
    )
));

/**
 * layout
 */
Redux::set_section(
    $opt_name,
    array(
        'title'            => esc_html__('Layout Settings', 'techeduem'),
        'id'               => 'techeduem_layout',
        'customizer_width' => '400px',
        'icon'             => 'el el-website',
        'fields'           => array(
            array(
                'id'                    => 'techeduem_layout_width',
                'type'                  => 'button_set',
                'title'                 => esc_html__('Theme Layout', 'techeduem'),
                'subtitle'              => esc_html__('Select the site layout.', 'techeduem'),
                'options'               => array(
                    'wide-layout'       => esc_html__('Full Width',  'techeduem'),
                    'boxed-layout'      => esc_html__('Boxed', 'techeduem'),
                ),
                'default'               => 'wide-layout'
            ),
            array(
                'id'                    => 'techeduem_layout_page',
                'type'                  => 'text',
                'title'                 => esc_html__('Container Width', 'techeduem'),
                'subtitle'              => esc_html__('Controls the overall site width. Enter value excluding any valid CSS unit, ex: 1170', 'techeduem'),
                'required'              => array('techeduem_layout_width', 'equals', 'wide-layout'),
            ),
            array(
                'id'                    => 'techeduem_boxlayout_box_width',
                'type'                  => 'text',
                'required'              => array('techeduem_layout_width', 'equals', 'boxed-layout'),
                'title'                 => esc_html__('Site Width For Box Layout', 'techeduem'),
                'subtitle'              => esc_html__('Controls the overall site width. Enter value excluding any valid CSS unit, ex: 1170', 'techeduem'),
            ),
            array(
                'id'                    => 'techeduem_enable_page_content_full_width',
                'type'                  => 'button_set',
                'title'                 => esc_html__('Page Content Full Width', 'techeduem'),
                'subtitle'              => esc_html__('Select yes to set the content area to 100% of the browser width.', 'techeduem'),
                'options'               => array(
                    'yes'               => esc_html__('Yes',  'techeduem'),
                    'no'                => esc_html__('No', 'techeduem'),
                ),
                'default'               => 'no'
            ),
            array(
                'id'                    => 'techeduem_page_layout_padding',
                'type'                  => 'spacing',
                'title'                 => esc_html__('Page Content Padding', 'techeduem'),
                'subtitle'              => esc_html__('Controls the top /bottom padding for page content. Enter values including any valid CSS unit, ex: 100px,100px.', 'techeduem'),
                'mode'                  => 'padding',
                'units'                 => array('em', 'px'),
                'units_extended'        => false,
            ),
            array(
                'id'                    => 'techeduem_body_background_color',
                'type'                  => 'background',
                'output'                => array('.site-wrapper.boxed-layout'),
                'title'                 => esc_html__('Box Background', 'techeduem'),
                'subtitle'              => esc_html__('Controls the  background of the body which is everything below header and above footer.', 'techeduem'),
                'required'              => array('techeduem_layout_width', 'equals', 'boxed-layout'),
            ),
            array(
                'id'                    => 'techeduem_boxlayout_body_bg',
                'type'                  => 'background',
                'output'                => array('body, body.boxed-layout-active'),
                'title'                 => esc_html__('Body Background', 'techeduem'),
                'subtitle'              => esc_html__('Controls the background when the site is in box layout.', 'techeduem'),
            ),

        )
    )
);
/**
 * Header Panel
 */
Redux::set_section($opt_name, array(
    'title'            => esc_html__('Header', 'techeduem'),
    'id'               => 'techeduem_header_panel',
    'icon'             => 'el el-photo',
));
/**
 * Header 
 */
Redux::set_section(
    $opt_name,
    array(
        'title'      => esc_html__('General', 'techeduem'),
        'id'         => 'header_id',
        'subsection' => true,
        'icon'       => 'el el-photo',
        'fields'     => array(

            array(
                'id'                        => 'techeduem_enable_header',
                'type'                      => 'switch',
                'title'                     => esc_html__('Header', 'techeduem'),
                'subtitle'                  => esc_html__('Enable or disable the header area.', 'techeduem'),
                'default'                   => true,
            ),
            array(
                'id'                        => 'techeduem_select_header_style_type',
                'title'                     => esc_html__('Header Type', 'techeduem'),
                'subtitle'                     => esc_html__('Select header type, if the default is chosen the existing options below will work, or choose the custom option to get headers from header post type.', 'techeduem'),
                'type'                      => 'button_set',
                'options'                   => array(
                    'default'               => esc_html__('Default', 'techeduem'),
                    'custom'                => esc_html__('Custom', 'techeduem'),
                ),
                'default'                   => 'default'
            ),
            // Header Custom Style
            array(
                'id'                    => 'techeduem_select_header_template',
                'type'                  => 'select',
                'title'                 => esc_html__('Header Template', 'techeduem'),
                'subtitle'              => esc_html__('Choose the header template where you created headers from the header post type.', 'techeduem'),
                'data'                  => 'posts',
                'args'                  => array(
                    'post_type'             => 'techeduem_header',
                ),
                'required'                  => array('techeduem_select_header_style_type', 'equals', 'custom'),
            ),
            array(
                'id'                    => 'techeduem_header_default_style',
                'title'                 => esc_html__('Default Header Layout', 'techeduem'),
                'subtitle'              => esc_html__('Controls the default header layout.', 'techeduem'),
                'type'                  => 'image_select',
                'options'               => array(
                    'style_1'           => array(
                        'title'         => esc_html__('Header Layout One', 'techeduem'),
                        'img'           => get_template_directory_uri() . '/images/optionframework/header/style1.png',
                    ),
                    'style_2'           => array(
                        'title'         => esc_html__('Header Layout Two', 'techeduem'),
                        'img'           => get_template_directory_uri() . '/images/optionframework/header/style2.png',
                    ),
                    'style_3'           => array(
                        'title'         => esc_html__('Header Layout Three', 'techeduem'),
                        'img'           => get_template_directory_uri() . '/images/optionframework/header/style3.png',
                    ),
                    'style_4'           => array(
                        'title'         => esc_html__('Header Layout Four', 'techeduem'),
                        'img'           => get_template_directory_uri() . '/images/optionframework/header/style4.png',
                    ),
                    'style_5'           => array(
                        'title'         => esc_html__('Header Layout Five', 'techeduem'),
                        'img'           => get_template_directory_uri() . '/images/optionframework/header/style5.png',
                    ),
                ),
                'default'               => 'style_1',
                'required'              => array('techeduem_select_header_style_type', 'equals', 'default'),
            ),
            array(
                'id'                    => 'techeduem_select_menu',
                'type'                  => 'select',
                'title'                 => esc_html__('Select Menu', 'techeduem'),
                'subtitle'              => esc_html__('Override the primary menu by selecting one of these. if nothing is selected primary menu will work.', 'techeduem'),
                'options'               => techeduem_get_terms_gb('nav_menu'),
                'required'              => array('techeduem_select_header_style_type', 'equals', 'default'),
            ),
            array(
                'id'                    => 'techeduem_logo_position',
                'type'                  => 'button_set',
                'title'                 => esc_html__('Logo Position', 'techeduem'),
                'subtitle'              => esc_html__('Controls the position of the logo.', 'techeduem'),
                'options'               => array(
                    'left'              => esc_html__('Left', 'techeduem'),
                    'center'            => esc_html__('Center', 'techeduem'),
                    'right'             => esc_html__('Right', 'techeduem'),
                    'left-top'          => esc_html__('Left Top', 'techeduem'),
                    'center-top'        => esc_html__('Center Top', 'techeduem'),
                    'right-top'         => esc_html__('Right Top', 'techeduem'),
                ),
                'default'               => 'left',
                'required'                  => array('techeduem_header_default_style', 'equals', 'style_1'),
            ),
            array(
                'id'                    => 'techeduem_header_full_width',
                'type'                  => 'switch',
                'title'                 => esc_html__('Header Full Width', 'techeduem'),
                'subtitle'              => esc_html__('Enable full width of the header. ', 'techeduem'),
                'default'               => false,
                'required'                  => array('techeduem_select_header_style_type', 'equals', 'default'),
            ),
            array(
                'id'                    => 'techeduem_header_bg',
                'type'                  => 'background',
                'background-attachment' => false,
                'background-repeat'     => false,
                'background-size'       => false,
                'background-position'   => false,
                'background-image'      => false,
                'output'                => array('.header-area, .header-section'),
                'title'                 => esc_html__('Header Background color', 'techeduem'),
                'subtitle'              => esc_html__('Pick a color to set header area background.', 'techeduem'),
                'default'               => array(),
                'required'              => array('techeduem_select_header_style_type', 'equals', 'default'),
                'preview'               => false,
            ),
            array(
                'id'                    => 'show_header_icons',
                'type'                  => 'button_set',
                'title'                 => esc_html__('Show Header Icons', 'techeduem'),
                'subtitle'              => esc_html__('Show the quick navigation icons in header', 'techeduem'),
                'options'               => array(
                    '1'               => esc_html__('Yes', 'techeduem'),
                    '0'                => esc_html__('No', 'techeduem'),
                ),
                'default'               => '1',
                'required' => array(
                    array('techeduem_header_default_style', '=',  'style_5'),
                )
            ),
            array(
                'id'                    => 'techeduem_header_search',
                'type'                  => 'checkbox',
                'title'                 => esc_html__('Header Search Icon', 'techeduem'),
                'subtitle'              => esc_html__('Enable to activate the header search icon.', 'techeduem'),
                'default'               => '1', // 1 = on | 0 = off
                'required'              => array('show_header_icons', 'equals', '1'),
            ),
            array(
                'id'                    => 'header_mini_cart',
                'type'                  => 'checkbox',
                'title'                 => esc_html__('Show Mini Cart', 'techeduem'),
                'default'               => '1', // 1 = on | 0 = off
                'required'              => array('show_header_icons', 'equals', '1'),
            ),
            array(
                'id'                    => 'header_right_menu_icon',
                'type'                  => 'checkbox',
                'title'                 => esc_html__('Show Header Right Menu', 'techeduem'),
                'default'               => '1', // 1 = on | 0 = off
                'required'              => array('show_header_icons', 'equals', '1'),
            ),
            // Start header three icon control
            array(
                'id'                    => 'show_header_three_icons',
                'type'                  => 'button_set',
                'title'                 => esc_html__('Show Header Icons', 'techeduem'),
                'subtitle'              => esc_html__('Show the quick navigation icons in header', 'techeduem'),
                'options'               => array(
                    '1'               => esc_html__('Yes', 'techeduem'),
                    '0'                => esc_html__('No', 'techeduem'),
                ),
                'default'               => '1',
                'required' => array(
                    array('techeduem_header_default_style', '=',  'style_3'),
                )
            ),
            array(
                'id'                    => 'techeduem_header_user_icon',
                'type'                  => 'checkbox',
                'title'                 => esc_html__('Header User Icon', 'techeduem'),
                'subtitle'              => esc_html__('Enable to activate the header search icon.', 'techeduem'),
                'default'               => '1', // 1 = on | 0 = off
                'required'              => array('show_header_three_icons', 'equals', '1'),
            ),
            array(
                'id'                    => 'header_three_mini_cart',
                'type'                  => 'checkbox',
                'title'                 => esc_html__('Show Mini Cart', 'techeduem'),
                'default'               => '1', // 1 = on | 0 = off
                'required'              => array('show_header_three_icons', 'equals', '1'),
            ),
            //end herader three icons
            // Start Header One icon options
            array(
                'id'                    => 'header_one_search_icon',
                'type'                  => 'checkbox',
                'title'                 => esc_html__('Show Search Icon', 'techeduem'),
                'default'               => '1', // 1 = on | 0 = off
                'required'              => array('techeduem_header_default_style', 'equals', 'style_1'),
            ),
            // End Header One icon options
            array(
                'id'                    => 'header_four_mini_cart',
                'type'                  => 'checkbox',
                'title'                 => esc_html__('Show Mini Cart', 'techeduem'),
                'default'               => '1', // 1 = on | 0 = off
                'required'              => array('techeduem_header_default_style', 'equals', 'style_4'),
            ),
            array(
                'id'                    => 'techeduem_header_transparent',
                'type'                  => 'switch',
                'title'                 => esc_html__('Header Transparent', 'techeduem'),
                'subtitle'              => esc_html__('Enable to make the header area transparent.', 'techeduem'),
                'default'               => false,
                'required'              => array('techeduem_select_header_style_type', 'equals', 'default'),
            ), // output body class
            array(
                'id'                    => 'techeduem_header_sticky',
                'type'                  => 'switch',
                'title'                 => esc_html__('Header Sticky', 'techeduem'),
                'subtitle'              => esc_html__('Enable to activate the sticky header.', 'techeduem'),
                'default'               => false,
                'required'              => array('techeduem_select_header_style_type', 'equals', 'default'),
            ),

        )
    )
);



/**
 * Header top bar panel 
 */
/**
 * Header Top bar customization
 */
Redux::set_section(
    $opt_name,
    array(
        'title'      => esc_html__('Top Bar Customization', 'techeduem'),
        'id'         => 'techeduem_header_topbar_customize',
        'icon'       => 'el el-cogs',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'                    => 'techeduem_header_show',
                'type'                  => 'switch',
                'title'                 => esc_html__('Top Bar', 'techeduem'),
                'subtitle'              => esc_html__('Turn on if you want to show the top bar area.', 'techeduem'),
                'default'               => false,
            ),
            array(
                'id'                    => 'techeduem_header_top_width',
                'type'                  => 'switch',
                'title'                 => esc_html__('Top Bar Full Width', 'techeduem'),
                'subtitle'              => esc_html__('Turn on if you want the top bar to be of full width.', 'techeduem'),
                'default'               => false,
            ),
            array(
                'id'                    => 'techeduem_header_topbg',
                'type'                  => 'color_rgba',
                'background-attachment' => false,
                'background-repeat'     => false,
                'background-size'       => false,
                'background-position'   => false,
                'background-image'      => false,
                'output'                => array('background-color' => '.header-top-area'),
                'title'                 => esc_html__('Top Bar Background Color', 'techeduem'),
                'subtitle'              => esc_html__('Controls the background color of the header top bar area( default #1E2127 ).', 'techeduem'),
                'default'               => array()
            ),
            array(
                'id'                    => 'techeduem_header_opening_bg',
                'type'                  => 'color_rgba',
                'background-attachment' => false,
                'background-repeat'     => false,
                'background-size'       => false,
                'background-position'   => false,
                'background-image'      => false,
                'output'                => array('background' => '.header-social span'),
                'title'                 => esc_html__('Top Bar Opening Hour Background Color', 'techeduem'),
                'subtitle'              => esc_html__('Controls the background color of the header top bar area( default #1E2127 ).', 'techeduem'),
                'default'               => array()
            ),
            array(
                'id'                    => 'techeduem_top_opening_colors',
                'type'                  => 'color',
                'output'                => array('.header-social span'),
                'title'                 => esc_html__('Top Bar Opening Hour Text Color', 'techeduem'),
                'subtitle'              => esc_html__('Controls the color of the top bar text.', 'techeduem'),
                'transparent'           => false,
            ),
            array(
                'id'                    => 'techeduem_top_text_colors',
                'type'                  => 'color',
                'output'                => array('.top-bar-left-content, .header-info,.top-bar-left-content p'),
                'title'                 => esc_html__('Top Bar Text Color', 'techeduem'),
                'subtitle'              => esc_html__('Controls the color of the top bar text.', 'techeduem'),
                'transparent'           => false,
            ),
            array(
                'id'                    => 'techeduem_top_link_colors',
                'type'                  => 'color',
                'output'                => array('.header-info span a,.header-info span, .header-social ul li a, .top-bar-left-content p a, .top-bar-left-menu ul li a, .header-social ul li a'),
                'title'                 => esc_html__('Top Bar Link Color ', 'techeduem'),
                'subtitle'              => esc_html__('Controls the link color of the top bar.', 'techeduem'),
                'transparent'           => false,

            ),
            array(
                'id'                    => 'techeduem_top_link_colors_hover',
                'type'                  => 'color',
                'output'                => array('.header-info span a:hover, .header-social ul li a:hover, .top-bar-left-content p a:hover'),
                'title'                 => esc_html__('Top Bar Link Hover Color', 'techeduem'),
                'subtitle'              => esc_html__('Controls the link hover color of the top bar.', 'techeduem'),
                'transparent'           => false,
            ),
            array(
                'id'                    => 'techeduem_top_bar_padding',
                'type'                  => 'spacing',
                'mode'                  => 'padding',
                'title'                 => esc_html__('Top Bar Padding ', 'techeduem'),
                'subtitle'              => esc_html__('Controls header top bar padding.', 'techeduem'),
                'right'                 => false,
                'left'                  => false,
                'output'                => array('.header-top-area'),
                'units'                 => array('em', 'px'),
            ),
        )
    )
);

/**
 * Header top bar left
 */
Redux::set_section(
    $opt_name,
    array(
        'title'      => esc_html__('Top Bar left', 'techeduem'),
        'id'         => 'techeduem_header_left',
        'icon'       => 'el el-arrow-left',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'                    => 'techeduem_left_content_section',
                'type'                  => 'button_set',
                'title'                 => esc_html__('Top Bar Left Content', 'techeduem'),
                'subtitle'              => esc_html__('Controls the content that displays in the top left section.', 'techeduem'),
                'options'               => array(
                    '1'                 => esc_html__('Social Icon With Opening Details', 'techeduem'),
                    '2'                 => esc_html__('Left Menu', 'techeduem'),
                    '3'                 => esc_html__('Contact Info', 'techeduem'),
                    '4'                 => esc_html__('Content', 'techeduem'),
                    '5'                 => esc_html__('Login/Register Form', 'techeduem'),
                    '6'                 => esc_html__('Leave Empty', 'techeduem'),
                ),
                'default'               => '1'
            ),
            array(
                'id'                    => 'techeduem_left_opening_details',
                'type'                  => 'text',
                'required'              => array('techeduem_left_content_section', 'equals', '1'),
                'title'                 => esc_html__('Opening Details Left', 'techeduem'),
                'subtitle'              => esc_html__('This content will display header opening hour on top left bar', 'techeduem'),
                'default'               => esc_html__('Open hours: 8.00-18.00 Mon-Sat', 'techeduem'),
            ),
            array(
                'id'                    => 'techeduem_left_contact_text',
                'type'                  => 'text',
                'required'              => array('techeduem_left_content_section', 'equals', '3'),
                'title'                 => esc_html__('Contact Number Text', 'techeduem'),
                'subtitle'              => esc_html__('This content will display header contact number on top left bar', 'techeduem'),
                'default'               => esc_html__('Call Us ', 'techeduem'),
            ),
            array(
                'id'                    => 'techeduem_left_contact_info',
                'type'                  => 'text',
                'required'              => array('techeduem_left_content_section', 'equals', '3'),
                'title'                 => esc_html__('Contact Number', 'techeduem'),
                'subtitle'              => esc_html__('This content will display header contact number on top left bar', 'techeduem'),
                'default'               => esc_html__('+0123456789', 'techeduem'),
            ),
            array(
                'id'                    => 'techeduem_left_contact_email',
                'type'                  => 'text',
                'required'              => array('techeduem_left_content_section', 'equals', '3'),
                'title'                 => esc_html__('Email Address', 'techeduem'),
                'subtitle'              => esc_html__('This content will display header contact email address on top left bar', 'techeduem'),
                'default'               => esc_html__('info@hashdemo.com', 'techeduem'),
            ),
            array(
                'id'                    => 'techeduem_left_text_area',
                'type'                  => 'editor',
                'required'              => array('techeduem_left_content_section', 'equals', '4'),
                'title'                 => esc_html__('Header Default Text', 'techeduem'),
                'subtitle'              => esc_html__('This content will display the default text on top left bar', 'techeduem'),
                'args'                  => array(
                    'teeny'             => true,
                    'textarea_rows'     => 2
                ),
            ),
            array(
                'id'                    => 'techeduem_left_login_icon',
                'type'                  => 'text',
                'required'              => array('techeduem_left_content_section', 'equals', '5'),
                'title'                 => esc_html__('Set Your Log-In Icon', 'techeduem'),
                'subtitle'              => esc_html__('This content will display the default text on top right bar', 'techeduem'),
                'args'                  => array(
                    'teeny'             => true,
                    'textarea_rows'     => 2
                ),
                'default'                  => 'fa fa-key',
            ),
            array(
                'id'                    => 'techeduem_left_login_area',
                'type'                  => 'text',
                'required'              => array('techeduem_left_content_section', 'equals', '5'),
                'title'                 => esc_html__('Log In Text', 'techeduem'),
                'subtitle'              => esc_html__('This content will display the default text on top right bar', 'techeduem'),
                'args'                  => array(
                    'teeny'             => true,
                    'textarea_rows'     => 2
                ),
                'default'                  => 'Login',
            ),
            array(
                'id'                    => 'techeduem_left_register_icon',
                'type'                  => 'text',
                'required'              => array('techeduem_left_content_section', 'equals', '5'),
                'title'                 => esc_html__('Set Your Register Icon', 'techeduem'),
                'subtitle'              => esc_html__('This content will display the default text on top right bar', 'techeduem'),
                'args'                  => array(
                    'teeny'             => true,
                    'textarea_rows'     => 2
                ),
                'default'                  => 'fa fa-lock',
            ),
            array(
                'id'                    => 'techeduem_left_register_area',
                'type'                  => 'text',
                'required'              => array('techeduem_left_content_section', 'equals', '5'),
                'title'                 => esc_html__('Set Your Register Text', 'techeduem'),
                'subtitle'              => esc_html__('This content will display the default text on top right bar', 'techeduem'),
                'args'                  => array(
                    'teeny'             => true,
                    'textarea_rows'     => 2
                ),
                'default'                  => 'Sign Up',
            ),
            array(
                'id'                    => 'techeduem_left_logout_icon',
                'type'                  => 'text',
                'required'              => array('techeduem_left_content_section', 'equals', '5'),
                'title'                 => esc_html__('Set Logout Icon', 'techeduem'),
                'subtitle'              => esc_html__('This content will display the default text on top right bar', 'techeduem'),
                'args'                  => array(
                    'teeny'             => true,
                    'textarea_rows'     => 2
                ),
                'default'                  => 'fa fa-sign-out',
            ),
        )
    )
);
/**
 * Header top bar right
 */
Redux::set_section(
    $opt_name,
    array(
        'title'      => esc_html__('Top Bar Right', 'techeduem'),
        'id'         => 'techeduem_header_right',
        'icon'       => 'el el-arrow-right',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'                    => 'techeduem_right_contactinfo',
                'type'                  => 'button_set',
                'title'                 => esc_html__('Top Bar Right Content', 'techeduem'),
                'subtitle'              => esc_html__('Controls the content that displays in the top left section.', 'techeduem'),
                'options'               => array(
                    '1'                 => esc_html__('Social Icon With Opening Details', 'techeduem'),
                    '2'                 => esc_html__('Right Menu', 'techeduem'),
                    '3'                 => esc_html__('Contact Info', 'techeduem'),
                    '4'                 => esc_html__('Content', 'techeduem'),
                    '5'                 => esc_html__('Login/Register Form', 'techeduem'),
                    '6'                 => esc_html__('Leave Empty', 'techeduem'),
                ),
                'default'               => '5'
            ),
            array(
                'id'                    => 'techeduem_right_opening_details',
                'type'                  => 'text',
                'required'              => array('techeduem_right_contactinfo', 'equals', '1'),
                'title'                 => esc_html__('Opening Details Right', 'techeduem'),
                'subtitle'              => esc_html__('This content will display header contact number on top left bar', 'techeduem'),
                'default'               => esc_html__('Open hours: 8.00-18.00 Mon-Sat', 'techeduem'),
            ),
            array(
                'id'                    => 'techeduem_right_contact_text',
                'type'                  => 'text',
                'required'              => array('techeduem_right_contactinfo', 'equals', '3'),
                'title'                 => esc_html__('Contact Number Text', 'techeduem'),
                'subtitle'              => esc_html__('This content will display header contact number on top right bar.', 'techeduem'),
                'default'               => esc_html__('Call Us ', 'techeduem'),
            ),
            array(
                'id'                    => 'techeduem_right_contact_info',
                'type'                  => 'text',
                'required'              => array('techeduem_right_contactinfo', 'equals', '3'),
                'title'                 => esc_html__('Contact Number', 'techeduem'),
                'subtitle'              => esc_html__('This content will display header contact number on top right bar.', 'techeduem'),
                'default'               => esc_html__('+0123456789', 'techeduem'),
            ),
            array(
                'id'                    => 'techeduem_right_contact_email',
                'type'                  => 'text',
                'required'              => array('techeduem_right_contactinfo', 'equals', '3'),
                'title'                 => esc_html__('Email Address', 'techeduem'),
                'subtitle'              => esc_html__('This content will display if you have "Contact Info" email.', 'techeduem'),
                'default'               => esc_html__('info@hashdemo.com', 'techeduem'),
            ),
            array(
                'id'                    => 'techeduem_right_text_area',
                'type'                  => 'editor',
                'required'              => array('techeduem_right_contactinfo', 'equals', '4'),
                'title'                 => esc_html__('Header Default Text', 'techeduem'),
                'subtitle'              => esc_html__('This content will display the default text on top right bar', 'techeduem'),
                'args'                  => array(
                    'teeny'             => true,
                    'textarea_rows'     => 2
                )
            ),
            array(
                'id'                    => 'techeduem_right_login_icon',
                'type'                  => 'text',
                'required'              => array('techeduem_right_contactinfo', 'equals', '5'),
                'title'                 => esc_html__('Set Your Log-In Icon', 'techeduem'),
                'subtitle'              => esc_html__('This content will display the default text on top right bar', 'techeduem'),
                'default'                  => 'fa fa-key',
            ),
            array(
                'id'                    => 'techeduem_right_login_area',
                'type'                  => 'text',
                'required'              => array('techeduem_right_contactinfo', 'equals', '5'),
                'title'                 => esc_html__('Log In Text', 'techeduem'),
                'subtitle'              => esc_html__('This content will display the default text on top right bar', 'techeduem'),
                'default'                  => 'Login',
            ),
            array(
                'id'                    => 'techeduem_right_register_icon',
                'type'                  => 'text',
                'required'              => array('techeduem_right_contactinfo', 'equals', '5'),
                'title'                 => esc_html__('Set Your Register Icon', 'techeduem'),
                'subtitle'              => esc_html__('This content will display the default text on top right bar', 'techeduem'),
                'default'                  => 'fa fa-lock',
            ),
            array(
                'id'                    => 'techeduem_right_register_area',
                'type'                  => 'text',
                'required'              => array('techeduem_right_contactinfo', 'equals', '5'),
                'title'                 => esc_html__('Set Your Register Text', 'techeduem'),
                'subtitle'              => esc_html__('This content will display the default text on top right bar', 'techeduem'),
                'default'                  => 'Sign Up',
            ),
            array(
                'id'                    => 'techeduem_right_logout_icon',
                'type'                  => 'text',
                'required'              => array('techeduem_right_contactinfo', 'equals', '5'),
                'title'                 => esc_html__('Set Your Logout Icon', 'techeduem'),
                'subtitle'              => esc_html__('This content will display the default text on top right bar', 'techeduem'),
                'default'                  => 'fa fa-sign-out',
            ),
        )
    )
);

/**
 * Main menu
 */
Redux::set_section(
    $opt_name,
    array(
        'title'            => esc_html__('Menu', 'techeduem'),
        'id'               => 'techeduemmain_menu_options',
        'icon'             => 'el el-lines',
    )
);
/**
 * Menu typography
 */
Redux::set_section(
    $opt_name,
    array(
        'title'            => esc_html__('Menu', 'techeduem'),
        'id'               => 'techeduem_menu_typography',
        'icon'             => 'el el-th-list',
        'subsection'       => true,
        'customizer_width' => '500px',
        'fields'           => array(
            array(
                'id'                    => 'techeduem_menufont',
                'type'                  => 'typography',
                'title'                 => esc_html__('Menus Typography', 'techeduem'),
                'subtitle'              => esc_html__('Controls the typography settings of the menu.', 'techeduem'),
                'google'                => true,
                'subsets'               => false,
                'line-height'           => true,
                'text-transform'        => true,
                'text-align'            => false,
                'all_styles'            => true,
                'letter-spacing'        => true,
                'color'                 => false,
                'units'                 => 'px',
                'default'               => array(
                    'google'            => true,
                )
            ),
            array(
                'id'                    => 'techeduem_menu_regular_color',
                'type'                  => 'color',
                'title'                 => esc_html__('Regular Color', 'techeduem'),
                'subtitle'              => esc_html__('Pick a default color for menu item.', 'techeduem'),
                'transparent'           => false,
                'validate'              => 'color',
                'output'                => array('.primary-nav-wrap nav ul li a , .primary-nav-wrap.default-menu nav > ul > li > a,.mobile-menu .mean-bar .mean-nav > ul li a, .main-menu nav > ul > li > a',)
            ),
            array(
                'id'                    => 'techeduem_menu_hover_color',
                'type'                  => 'color',
                'title'                 => esc_html__('Hover Color', 'techeduem'),
                'subtitle'              => esc_html__('Pick an hover color for menu item.', 'techeduem'),
                'transparent'           => false,
                'validate'              => 'color',
                'output'                => array('.primary-nav-wrap nav ul > li:hover > a,.primary-nav-wrap.default-menu nav > ul > li > a:hover,.main-menu nav > ul > li > a:hover,.sub-menu li:hover > a',)
            ),
            array(
                'id'                    => 'techeduem_menu_active_color',
                'type'                  => 'color',
                'title'                 => esc_html__('Active Color', 'techeduem'),
                'subtitle'              => esc_html__('Pick an active color for menu item.', 'techeduem'),
                'transparent'           => false,
                'validate'              => 'color',
                'output'                => array('.primary-nav-wrap nav ul > li.current-menu-item > a,.main-menu nav > ul > li.current-menu-item > a')
            ),

            array(
                'id'                    => 'techeduem_menu_border_color',
                'type'                  => 'border',
                'title'                 => esc_html__('Menu Border Top Color', 'techeduem'),
                'subtitle'              => esc_html__('Pick an active color for menu item.', 'techeduem'),
                'transparent'           => false,
                'output'                => array('.primary-nav-wrap .sub-menu'),
                'default'  => array(
                    'border-color'  => '#1e73be',
                    'border-style'  => 'solid',
                    'border-top'    => '1px',
                    'border-right'  => false,
                    'border-bottom' => false,
                    'border-left'   => false
                )
            ),

            array(
                'id'                    => 'techeduem_main_menu_padding',
                'type'                  => 'spacing',
                'title'                 => esc_html__('Menu Item Padding', 'techeduem'),
                'subtitle'              => esc_html__('Controls the top, right, bottom and left padding of the main menu.', 'techeduem'),
                'output'                => array('.primary-nav-wrap nav .menu > li'),
                'mode'                  => 'padding',
                'units_extended'        => false,
                'units'                 => array('em', 'px'),
                'default'               => array(
                    'padding-top'       => 'px',
                    'padding-right'     => 'px',
                    'padding-bottom'    => 'px',
                    'padding-left'      => 'px',
                    'units'             => 'px',
                )
            ),
        )
    )
);
/**
 * Logo Panel
 */
Redux::set_section($opt_name, array(
    'title'            => esc_html__('Logo', 'techeduem'),
    'id'               => 'techeduem_logo_panel',
    'icon'             => 'el el-picture',
));
/**
 * Logo
 */
Redux::set_section(
    $opt_name,
    array(
        'title'            => esc_html__('Logo', 'techeduem'),
        'id'               => 'techeduem_logo',
        'icon'             => 'el el-picture',
        'subsection'       => true,
        'fields'           => array(
            array(
                'id'                    => 'techeduem_logo_type',
                'type'                  => 'button_set',
                'title'                 => esc_html__('Logo Type', 'techeduem'),
                'subtitle'                  => esc_html__('Select logo type, if the image is chosen the existing options of  image below will work, or text option will work.', 'techeduem'),
                'options'               => array(
                    'image'                => 'Image',
                    'text'                 => 'Text',
                ),
                'default'               => 'image'
            ),
            array(
                'id'                    => 'techeduem_head_logo',
                'title'                 => esc_html__('Default Logo', 'techeduem'),
                'subtitle'              => esc_html__('Upload the main logo of your site.', 'techeduem'),
                'type'                  => 'media',
                'required'              => array('techeduem_logo_type', 'equals', 'image'),
            ),
            array(
                'id'                    => 'techeduem_retina_default_logo',
                'type'                  => 'media',
                'title'                 => esc_html__('Retina Logo', 'techeduem'),
                'subtitle'                 => esc_html__('Upload a logo for the retina version of the logo. It should be exactly 2x the size of the main logo.', 'techeduem'),
                'required'              => array('techeduem_logo_type', 'equals', 'image'),
            ),
            array(
                'id'                    => 'techeduem_logo_max_height',
                'type'                  => 'text',
                'title'                 => esc_html__('Logo Height', 'techeduem'),
                'subtitle'              => esc_html__('Do not include px in the string. e.g. 30', 'techeduem'),
                'validate'              => 'numeric',
                'required'              => array('techeduem_logo_type', 'equals', 'image'),
            ),
            array(
                'id'                    => 'techeduem_logo_padding',
                'type'                  => 'spacing',
                'title'                 => esc_html__('Logo Padding', 'techeduem'),
                'subtitle'              => esc_html__('Controls the top, right, bottom and left padding of the logo.', 'techeduem'),
                'output'                => array('.header-menu-wrap .site-title a'),
                'mode'                  => 'padding',
                'units'                 => array('em', 'px'),
                'default'               => array(
                    'padding-top'       => 'px',
                    'padding-right'     => 'px',
                    'padding-bottom'    => 'px',
                    'padding-left'      => 'px',
                    'units'             => 'px',
                ),
                'required'              => array('techeduem_logo_type', 'equals', 'image'),
            ),
            array(
                'id'                    => 'techeduem_logo_text',
                'type'                  => 'text',
                'required'              => array('techeduem_logo_type', 'equals', 'text'),
                'title'                 => esc_html__('Site Title', 'techeduem'),
                'desc'                  => esc_html__('Enter your site title here', 'techeduem'),
                'default'               => get_bloginfo('name')
            ),
            array(
                'id'                    => 'techeduem_logo_text_font',
                'type'                  => 'typography',
                'title'                 => esc_html__('Site Title Font Settings', 'techeduem'),
                'required'              => array('techeduem_logo_type', 'equals', 'text'),
                'google'                => true,
                'subsets'               => false,
                'line-height'           => false,
                'text-transform'        => true,
                'transition'            => false,
                'text-align'            => false,
                'all_styles'            => true,
                'output'                => array('.site-title a'),
                'units'                 => 'px',
                'subtitle'              => esc_html__('Controls the font settings of the site title', 'techeduem'),
                'default'               => array(
                    'google'            => true,
                )
            ),
            array(
                'id'                    => 'techeduem_custom_login_logo',
                'type'                  => 'media',
                'title'                 => esc_html__('Login Page Logo', 'techeduem'),
                'subtitle'              => esc_html__('Upload an image for login page logo. Upload a 250px X 100px image here to replace the default WordPress login logo.', 'techeduem'),
            ),
        )
    )
);

/**
 * Favicon
 */
Redux::set_section(
    $opt_name,
    array(
        'title'            => esc_html__('Favicon', 'techeduem'),
        'id'               => 'techeduem_favicons',
        'icon'             => 'el el-asterisk',
        'subsection'       => true,
        'fields'           => array(
            array(
                'id'       => 'techeduem_favicon',
                'type'     => 'media',
                'title'    => esc_html__('Favicon Default', 'techeduem'),
                'subtitle' => esc_html__('Upload a favicon for your website at 16px x 16px.', 'techeduem')
            ),

            array(
                'id'       => 'techeduem_iphone_icon',
                'type'     => 'media',
                'title'    => esc_html__('Favicon iPhone', 'techeduem'),
                'subtitle' => esc_html__('Upload a favicon for Apple iPhone at 57px x 57px.', 'techeduem')
            ),

            array(
                'id'       => 'techeduem_iphone_icon_retina',
                'type'     => 'media',
                'title'    => esc_html__('Favicon iPhone Retina', 'techeduem'),
                'subtitle' => esc_html__('Upload a favicon for Apple iPhone Retina Version at 114px x 114px.', 'techeduem'),
                'required' => array(
                    array('techeduem_iphone_icon', '!=', ''),
                    array('techeduem_iphone_icon', '!=', array('url'  => ''))
                )
            ),

            array(
                'id'       => 'techeduem_ipad_icon',
                'type'     => 'media',
                'title'    => esc_html__('Favicon iPad', 'techeduem'),
                'subtitle' => esc_html__('Upload a favicon for Apple iPad at 72px x 72px.', 'techeduem')
            ),

            array(
                'id'       => 'techeduem_ipad_icon_retina',
                'type'     => 'media',
                'title'    => esc_html__('Favicon iPad Retina', 'techeduem'),
                'subtitle' => esc_html__('Upload a favicon for Apple iPad Retina Version at 144px x 144px.', 'techeduem'),
                'required' => array(
                    array('techeduem_ipad_icon', '!=', ''),
                    array('techeduem_ipad_icon', '!=', array('url'  => ''))
                )
            )

        )
    )
);

/**
 * Page Title Panel
 */

Redux::set_section($opt_name, array(
    'title'            => esc_html__('Title Wrapper', 'techeduem'),
    'id'               => 'techeduem_header_title_wrapper_panel',
    'icon'             => 'el el-text-width',
));
/**
 * Page Title Wrapper
 */
Redux::set_section(
    $opt_name,
    array(
        'title'            => esc_html__('Page Title', 'techeduem'),
        'id'               => 'techeduem_header_title_wrapper',
        'icon'             => 'el el-align-center',
        'subsection'       => true,
        'fields'           => array(
            array(
                'id'                    => 'techeduem_title_wrapper_enable',
                'title'                 => esc_html__('Title Wrapper', 'techeduem'),
                'subtitle'              => esc_html__('Enable or Disable the page title area.', 'techeduem'),
                'type'                  => 'button_set',
                'options'               => array(
                    'yes'               => esc_html__('Enable', 'techeduem'),
                    'no'                => esc_html__('Disable', 'techeduem'),
                ),
                'default'               => 'yes',
            ), // action header-page-title 
            array(
                'id'                    => 'techeduem_title_enable',
                'type'                  => 'button_set',
                'title'                 => esc_html__('Title', 'techeduem'),
                'subtitle'              => esc_html__('Enable or Disable the page title.', 'techeduem'),
                'default'               => true,
                'options'               => array(
                    'yes'               => esc_html__('Enable', 'techeduem'),
                    'no'                => esc_html__('Disable', 'techeduem'),
                ),
                'default'               => 'yes',
            ), // action page-title 
            array(
                'id'                    => 'techeduem_custom_title',
                'title'                 => esc_html__('Custom Title', 'techeduem'),
                'subtitle'              => esc_html__('Set the custom title of the page.', 'techeduem'),
                'desc'                  => esc_html__('If this field is empty, then default page/post title will be showed', 'techeduem'),
                'type'                  => 'text',
                'required'              => array('techeduem_title_enable', 'equals', 'yes'),
            ), // action page-title 
            array(
                'id'                    => 'techeduem_title_typography',
                'type'                  => 'typography',
                'title'                  => esc_html__('Title Typography', 'techeduem'),
                'subtitle'              => esc_html__('Controls the typography settings of the page title.', 'techeduem'),
                'google'                => true,
                'subsets'               => false,
                'line-height'           => true,
                'text-transform'        => true,
                'letter-spacing'        => true,
                'transition'            => false,
                'text-align'            => false,
                'all_styles'            => true,
                'units'                 => 'px',
                'default'               => array(
                    'google'            => true,
                ),
                'required'                  => array('techeduem_title_enable', 'equals', 'yes'),
            ), // action dynamic-css
            array(
                'id'                    => 'techeduem_sub_title_enable',
                'title'                 => esc_html__('Sub Title', 'techeduem'),
                'subtitle'              => esc_html__('Enable or Disable the page sub title.', 'techeduem'),
                'type'                  => 'button_set',
                'options'               => array(
                    'yes'               => esc_html__('Enable', 'techeduem'),
                    'no'                => esc_html__('Disable', 'techeduem'),
                ),
                'default'               => 'yes',
            ), // action page-title
            array(
                'id'                    => 'techeduem_custom_sub_title',
                'title'                 => esc_html__('Custom Sub Title', 'techeduem'),
                'subtitle'              => esc_html__('Set the custom sub title of the page.', 'techeduem'),
                'type'                  => 'editor',
                'args'   => array(
                    'teeny'             => false,
                    'textarea_rows'     => 6
                ),
                'default' => '',
                'required'              => array('techeduem_sub_title_enable', 'equals', 'yes'),
            ), // action page-title
            array(
                'id'                    => 'techeduem_sub_title_typography',
                'type'                  => 'typography',
                'title'                 => esc_html__('Sub Title Typography', 'techeduem'),
                'subtitle'              => esc_html__('Controls the typography settings of the page sub title.', 'techeduem'),
                'google'                => true,
                'subsets'               => false,
                'line-height'           => true,
                'text-transform'        => true,
                'letter-spacing'        => true,
                'transition'            => false,
                'text-align'            => false,
                'all_styles'            => true,
                'units'                 => 'px',
                'default'               => array(
                    'google'            => true,
                ),
                'required'                  => array('techeduem_sub_title_enable', 'equals', 'yes'),
            ), // action dynamic-css
            array(
                'id'                    => 'techeduem_title_content_alignment',
                'type'                  => 'button_set',
                'title'                 => esc_html__('Title Alignment', 'techeduem'),
                'subtitle'              => esc_html__('Controls the content alignment of the page title', 'techeduem'),
                'options'               => array(
                    'text-left'              => esc_html__('left', 'techeduem'),
                    'text-center'            => esc_html__('center', 'techeduem'),
                    'text-right'             => esc_html__('right', 'techeduem'),
                ),
                'default'               => 'text-center',
            ),
            array(
                'id'                    => 'techeduem_title_wrap_fullwidth_enable',
                'type'                  => 'switch',
                'title'                 => esc_html__('Title Full Width', 'techeduem'),
                'subtitle'              => esc_html__('Enable to have the page title area display at 100% width according to the window size. Turn off to follow site width.', 'techeduem'),
                'default'               => false,
            ),
            array(
                'id'                    => 'techeduem_title_wrap_height',
                'type'                  => 'select',
                'title'                 => esc_html__('Title Bar Height', 'techeduem'),
                'options'               => array(
                    'default-height'    => esc_html__('Default', 'techeduem'),
                    'half-height'       => esc_html__('Half Height', 'techeduem'),
                    'full-height'       => esc_html__('Full Height', 'techeduem'),
                ),
                'default'               => 'default-height',
            ),
            array(
                'id'                    => 'techeduem_title_wrap_padding',
                'type'                  => 'spacing',
                'title'                 => esc_html__('Title Area Padding', 'techeduem'),
                'subtitle'              => esc_html__('Controls the height of the page title area. Enter value excluding any valid CSS unit, ex: 100', 'techeduem'),
                'mode'                  => 'padding',
                'units_extended'        => false,
                'units'                 => array('em', 'px'),
            ),
            array(
                'id'                    => 'techeduem_title_wrap_padding_on_phone',
                'type'                  => 'spacing',
                'title'                 => esc_html__('Title Area Padding on Mobile', 'techeduem'),
                'subtitle'              => esc_html__('Controls the height of the page title area on mobile device. Enter value excluding any valid CSS unit, ex: 80', 'techeduem'),
                'mode'                  => 'padding',
                'units_extended'        => false,
                'units'                 => array('em', 'px'),
            ),
            array(
                'id'                    => 'techeduem_title_wrap_background',
                'type'                  => 'background',
                'title'                 => esc_html__('Background', 'techeduem'),
                'subtitle'              => esc_html__('Controls the background option of the page title area.', 'techeduem'),
            ),
            array(
                'id'                    => 'techeduem_title_wrap_background_overlay',
                'type'                  => 'color_rgba',
                'title'                  => esc_html__('Background Overlay', 'techeduem'),
                'subtitle'              => esc_html__('Controls the background overlay color of the page title area.', 'techeduem'),
            ),
        )
    )
);
/**
 * Breadcrumbs Area
 */
Redux::set_section(
    $opt_name,
    array(
        'id'            => 'techeduem_breadcrumb_options',
        'title'         => esc_html__('Breadcrumb', 'techeduem'),
        'icon'          => 'el el-forward-alt',
        'subsection'    => true,
        'fields'        => array(
            array(
                'id'                    => 'techeduem_breadcrumbs_content_blog',
                'type'                  => 'button_set',
                'title'                 => esc_html__('Breadcrumb Content', 'techeduem'),
                'subtitle'              => esc_html__('Controls what displays in the breadcrumb area.', 'techeduem'),
                'options'               => array(
                    '1'                 => esc_html__('None', 'techeduem'),
                    '2'                 => esc_html__('Breadcrumbs', 'techeduem'),
                    '3'                 => esc_html__('Search Box', 'techeduem'),
                ),
                'default'               => '2',
            ),
            array(
                'id'                    => 'techeduem_breadcrumbs_mobile',
                'type'                  => 'switch',
                'title'                 => esc_html__('Breadcrumb on Mobile Devices', 'techeduem'),
                'subtitle'              => esc_html__('Turn on to display breadcrumb on mobile devices.', 'techeduem'),
                'default'               => true,
            ),

            array(
                'id'                    => 'techeduem_breadcrumbs_separator',
                'type'                  => 'text',
                'title'                 => esc_html__('Breadcrumb Separator', 'techeduem'),
                'subtitle'              => esc_html__('Set the breadcrumb separator here', 'techeduem'),
                'default'               => '-'
            ),
            array(
                'id'                    => 'techeduem_breadcrumbs_typography',
                'type'                  => 'typography',
                'title'                 => esc_html__('Breadcrumb Typography', 'techeduem'),
                'subtitle'              => esc_html__('Controls the typography settings of the breadcrumb.', 'techeduem'),
                'google'                => true,
                'subsets'               => false,
                'word-spacing'          => true,
                'letter-spacing'        => true,
                'text-align'            => false,
                'all_styles'            => false,
                'units'                 => 'px',
                'compiler'              => false,
                'output'              => array('.breadcrumbs_wrap ul, .breadcrumbs_wrap ul li, .breadcrumbs_wrap ul li a'),
            ),
            array(
                'id'                    => 'techeduem_breadcrumbs_link_hover_color',
                'title'                 => esc_html__('Breadcrumb Link Hover Color', 'techeduem'),
                'type'                  => 'color',
                'output'                => array('.breadcrumbs_wrap ul li a:hover,.breadcrumbs_wrap ul li:last-child'),
            ),

        )
    )
);

/**
 * Blog Panel
 */
Redux::set_section($opt_name, array(
    'title'            => esc_html__('Blog', 'techeduem'),
    'id'               => 'techeduem_blog',
    'icon'             => 'el el-file-edit',
));

// Blog Options
Redux::set_section(
    $opt_name,
    array(
        'title'     => esc_html__('Blog General', 'techeduem'),
        'id'        => 'techeduem_blog_genaral',
        'icon'      => 'el el-edit',
        'subsection' => true,
        'fields'    => array(
            array(
                'id'                    => 'techeduem_blog_title_bar',
                'type'                  => 'button_set',
                'title'                 => esc_html__('Title Area', 'techeduem'),
                'subtitle'              => esc_html__('Enable or Disable the blog page title area.', 'techeduem'),
                'options'               => array(
                    'show'              => esc_html__('Show', 'techeduem'),
                    'hide'              => esc_html__('hide', 'techeduem'),
                ),
                'default'               => 'show',
            ),
            array(
                'id'                    => 'techeduem_enable_blog_title',
                'type'                  => 'button_set',
                'title'                 => esc_html__('Title', 'techeduem'),
                'subtitle'              => esc_html__('Enable or Disable the blog page title.', 'techeduem'),
                'options'               => array(
                    'yes'               => esc_html__('Enable', 'techeduem'),
                    'no'                => esc_html__('Disable', 'techeduem'),
                ),
                'default'               => 'yes',
            ),
            array(
                'id'                    => 'techeduem_blog_text',
                'type'                  => 'text',
                'title'                 => esc_html__('Custom Title', 'techeduem'),
                'subtitle'              => esc_html__('Controls the custom title of the page which is displayed on the page title are on the blog page.', 'techeduem'),
                'default'               => esc_html__('Blog', 'techeduem'),
                'required'              => array('techeduem_enable_blog_title', 'equals', 'yes'),
            ),
            array(
                'id'                    => 'techeduem_blog_title_typography',
                'type'                  => 'typography',
                'title'                 => esc_html__('Title Typography', 'techeduem'),
                'google'                => true,
                'subsets'               => false,
                'word-spacing'          => true,
                'letter-spacing'        => true,
                'text-align'            => false,
                'all_styles'            => true,
                'units'                 => 'px',
                'subtitle'              => esc_html__('Controls the typography for the blog page title.', 'techeduem'),
                'default'               => array(
                    'google'            => true,
                ),
                'output'                => '.blog-page .page__title__inner .page-title',
                'required'              => array('techeduem_enable_blog_title', 'equals', 'yes'),
            ),
            array(
                'id'                    => 'techeduem_enable_blog_subtitle',
                'type'                  => 'button_set',
                'title'                 => esc_html__('Sub Title', 'techeduem'),
                'subtitle'              => esc_html__('Enable or Disable the blog page sub title.', 'techeduem'),
                'options'               => array(
                    'yes'               => esc_html__('Enable', 'techeduem'),
                    'no'                => esc_html__('Disable', 'techeduem'),
                ),
                'default'               => 'no',
            ),
            array(
                'id'                    => 'techeduem_blog_subtitle',
                'type'                  => 'text',
                'title'                 => esc_html__('Subtitle Text', 'techeduem'),
                'subtitle'              => esc_html__('Controls the subtitle text that displays in the page title area of the assigned blog page. This option only works if your front page displays your latest post in "settings > reading" or blog archive pages.', 'techeduem'),
                'required'              => array('techeduem_enable_blog_subtitle', 'equals', 'yes'),
            ),
            array(
                'id'                    => 'techeduem_blog_subtitle_typography',
                'type'                  => 'typography',
                'title'                 => esc_html__('Sub Title Typography', 'techeduem'),
                'google'                => true,
                'subsets'               => false,
                'word-spacing'          => true,
                'letter-spacing'        => true,
                'text-align'            => false,
                'all_styles'            => true,
                'output'                => array('.page__title__inner .page-subtitle', '.blog-page .page__title__inner p'),
                'units'                 => 'px',
                'subtitle'              => esc_html__('Controls the typography for blog page subtitle.', 'techeduem'),
                'default'               => array(
                    'google'            => true,
                ),
                'required'              => array('techeduem_enable_blog_subtitle', 'equals', 'yes'),
            ),
            array(
                'id'                    => 'techeduem_blog_title_position',
                'type'                  => 'button_set',
                'title'                 => esc_html__('Content Position', 'techeduem'),
                'subtitle'              => esc_html__('Controls the position of the blog title', 'techeduem'),
                'options'               => array(
                    'text-left'              => esc_html__('Left', 'techeduem'),
                    'text-center'            => esc_html__('Center', 'techeduem'),
                    'text-right'             => esc_html__('Right', 'techeduem'),
                ),
                'default'               => 'text-center',
            ),
            array(
                'id'                    => 'techeduem_blog_title_full_width',
                'type'                  => 'button_set',
                'title'                 => esc_html__('Title Wrapper Full Width', 'techeduem'),
                'options'               => array(
                    'yes'               => esc_html__('Yes', 'techeduem'),
                    'no'                => esc_html__('No', 'techeduem'),
                ),
                'default'               => 'no',
            ),
            array(
                'id'                    => 'techeduem_blog_title_padding',
                'type'                  => 'spacing',
                'title'                 => esc_html__('Title Padding.', 'techeduem'),
                'subtitle'              => esc_html__('Controls the top and bottom padding of the Blog page Title Area.', 'techeduem'),
                'output'                => array('.blog-page .page__title__inner'),
                'mode'                  => 'padding',
                'units_extended'        => false,
                'left'                  => false,
                'right'                 => false,
                'units'                 => array('em', 'px'),
                'default'                => array(
                    'padding-top'        => '120',
                    'padding-bottom'    => '110',
                    'units'                => 'px'
                ),
            ),
            array(
                'id'                    => 'techeduem_blog_banner',
                'type'                  => 'background',
                'output'                => array('.page__title__wrapper.blog-page'),
                'title'                 => esc_html__('Title Background Options', 'techeduem'),
            ),
            array(
                'id'                    => 'techeduem_blog_banner_overlay_color',
                'type'                  => 'color_rgba',
                'title'                 => esc_html__('Background Overlay', 'techeduem'),
                'subtitle'              => esc_html__('Controls the overlay color of the blog title wrapper.', 'techeduem'),
            ),
            array(
                'id'                    => 'blog_gena_title_divide',
                'type'                  => 'divide'
            ),
            array(
                'id'                    => 'techeduem_sidebarblog_pos',
                'type'                  => 'select',
                'title'                 => esc_html__('Layout/Style', 'techeduem'),
                'subtitle'              => esc_html__('Choose your favorite blog layout/style', 'techeduem'),
                'options'               => array(
                    'single'            => esc_html__('Single Column', 'techeduem'),
                    'twocolumn'         => esc_html__('Blog two column', 'techeduem'),
                    'threecolumn'       => esc_html__('Blog three colum', 'techeduem'),
                    'left'              => esc_html__('Blog Left sidebar', 'techeduem'),
                    'right'             => esc_html__('Blog Right sidebar', 'techeduem'),
                    'masonry4'          => esc_html__('Masonry 4 Column', 'techeduem'),
                    'masonry3'          => esc_html__('Masonry 3 Column', 'techeduem'),
                    'masonry2'          => esc_html__('Masonry 2 Column', 'techeduem'),
                    'creative'          => esc_html__('Creative', 'techeduem'),
                    'left_image'        => esc_html__('Left Image', 'techeduem'),
                ),
                'default'               => 'right',
            ),
            array(
                'id'                    => 'techeduem_excerpt_length',
                'type'                  => 'slider',
                'title'                 => esc_html__('Excerpt Length', 'techeduem'),
                'subtitle'              => esc_html__('Controls the excerpt length on blog page.', 'techeduem'),
                "default"               => 30,
                "min"                   => 10,
                "step"                  => 2,
                "max"                   => 130,
                'display_value'         => 'text'
            ),
            array(
                'id'                    => 'techeduem_show_post_author_meta',
                'type'                  => 'button_set',
                'title'                 => esc_html__('Author', 'techeduem'),
                'subtitle'              => esc_html__('Show or hide the author of blog post.', 'techeduem'),
                'options'               => array(
                    'yes'               => esc_html__('Show', 'techeduem'),
                    'no'                => esc_html__('Hide', 'techeduem'),
                ),
                'default'               => 'yes',
            ),
            array(
                'id'                    => 'techeduem_show_post_publish_date_meta',
                'type'                  => 'button_set',
                'title'                 => esc_html__('Publish Date', 'techeduem'),
                'subtitle'              => esc_html__('Show or hide the publish date of blog post.', 'techeduem'),
                'options'               => array(
                    'yes'               => esc_html__('Show', 'techeduem'),
                    'no'                => esc_html__('Hide', 'techeduem'),
                ),
                'default'               => 'yes',
            ),
            array(
                'id'                    => 'techeduem_show_post_updated_date_meta',
                'type'                  => 'button_set',
                'title'                 => esc_html__('Updated Date', 'techeduem'),
                'subtitle'              => esc_html__('Show or hide the updated date of blog post.', 'techeduem'),
                'options'               => array(
                    'yes'               => esc_html__('Show', 'techeduem'),
                    'no'                => esc_html__('Hide', 'techeduem'),
                ),
                'default'               => 'no',
            ),
            array(
                'id'                    => 'techeduem_show_post_comments_meta',
                'type'                  => 'button_set',
                'title'                 => esc_html__('Comments', 'techeduem'),
                'subtitle'              => esc_html__('Show or hide the comments of blog post.', 'techeduem'),
                'options'               => array(
                    'yes'               => esc_html__('Show', 'techeduem'),
                    'no'                => esc_html__('Hide', 'techeduem'),
                ),
                'default'               => 'yes',
            ),
            array(
                'id'                    => 'techeduem_show_post_categories_meta',
                'type'                  => 'button_set',
                'title'                 => esc_html__('Categories', 'techeduem'),
                'subtitle'              => esc_html__('Show or hide the categories of blog post.', 'techeduem'),
                'options'               => array(
                    'yes'               => esc_html__('Show', 'techeduem'),
                    'no'                => esc_html__('Hide', 'techeduem'),
                ),
                'default'               => 'no',
            ),
            array(
                'id'                    => 'techeduem_show_post_tags_meta',
                'type'                  => 'button_set',
                'title'                 => esc_html__('Tags', 'techeduem'),
                'subtitle'              => esc_html__('Show or hide the tags of blog post.', 'techeduem'),
                'options'               => array(
                    'yes'               => esc_html__('Show', 'techeduem'),
                    'no'                => esc_html__('Hide', 'techeduem'),
                ),
                'default'               => 'no',
            ),
            array(
                'id'                    => 'techeduem_enable_readmore_btn',
                'type'                  => 'button_set',
                'title'                 => esc_html__('Read More Button', 'techeduem'),
                'subtitle'              => esc_html__('Show or hide the read more button of blog post.', 'techeduem'),
                'options'               => array(
                    'yes'               => esc_html__('Show', 'techeduem'),
                    'no'                => esc_html__('Hide', 'techeduem'),
                ),
                'default'               => 'yes',
            ),
            array(
                'id'                    => 'techeduem_readmore_text',
                'type'                  => 'text',
                'title'                 => esc_html__('Read More Text', 'techeduem'),
                'subtitle'              => esc_html__('Set the custom title of read more button.', 'techeduem'),
                'default'               => esc_html__('Read More', 'techeduem'),
                'required'              => array('techeduem_enable_readmore_btn', 'equals', 'yes'),
            ),
        )
    )
);

/**
 * Single Post 
 */
Redux::set_section(
    $opt_name,
    array(
        'title'     => esc_html__('Single Post', 'techeduem'),
        'id'        => 'techeduem_blog_details_id',
        'icon'      => 'el el-website',
        'subsection' => true,
        'fields'    => array(
            array(
                'id'                    => 'techeduem_single_post_title_bar',
                'type'                  => 'button_set',
                'title'                 => esc_html__('Title Wrapper', 'techeduem'),
                'subtitle'              => esc_html__('Enable or Disable the blog details page title area.', 'techeduem'),
                'options'               => array(
                    'show'              => esc_html__('Enable', 'techeduem'),
                    'hide'              => esc_html__('Disable', 'techeduem'),
                ),
                'default'               => 'show',
            ),
            array(
                'id'                    => 'techeduem_enable_single_post_title',
                'type'                  => 'button_set',
                'title'                 => esc_html__('Title', 'techeduem'),
                'subtitle'              => esc_html__('If none is set, title will be hidden, or choose custom to set custom title, or choose post title to show default post title.', 'techeduem'),
                'options'               => array(
                    'none'              => esc_html__('None', 'techeduem'),
                    'custom'            => esc_html__('Custom', 'techeduem'),
                    'post_title'        => esc_html__('Post Title', 'techeduem'),
                ),
                'default'               => 'none',
            ),
            array(
                'id'                    => 'techeduem_blog_details_text',
                'type'                  => 'text',
                'title'                 => esc_html__('Custom Title', 'techeduem'),
                'subtitle'              => esc_html__('Controls the title text that displays in the page title area of the assigned blog details page.', 'techeduem'),
                'default'               => esc_html__('Blog Details', 'techeduem'),
                'required'              => array('techeduem_enable_single_post_title', 'equals', 'custom'),
            ),
            array(
                'id'                    => 'techeduem_blog_details_title_typography',
                'type'                  => 'typography',
                'title'                 => esc_html__('Title Typography', 'techeduem'),
                'subtitle'              => esc_html__('Controls the typography for single post title.', 'techeduem'),
                'google'                => true,
                'subsets'               => false,
                'word-spacing'          => true,
                'letter-spacing'        => true,
                'text-align'            => false,
                'all_styles'            => true,
                'output'                => array('.page__title__wrapper.single-post .page__title__inner .page-title'),
                'units'                 => 'px',
                'default'               => array(
                    'google'            => true,
                ),
                'required'              => array('techeduem_enable_single_post_title', 'equals', array('custom', 'post_title')),
            ),
            array(
                'id'                    => 'techeduem_enable_single_post_subtitle',
                'type'                  => 'button_set',
                'title'                 => esc_html__('Sub Title', 'techeduem'),
                'subtitle'              => esc_html__('Enable or Disable the single post sub title.', 'techeduem'),
                'options'               => array(
                    'yes'               => esc_html__('Enable', 'techeduem'),
                    'no'                => esc_html__('Disable', 'techeduem'),
                ),
                'default'               => 'yes',
            ),
            array(
                'id'                    => 'techeduem_single_post_subtitle',
                'type'                  => 'text',
                'title'                 => esc_html__('Details Page Sub Title', 'techeduem'),
                'subtitle'              => esc_html__('Controls the title text that displays in the page title area of the assigned blog details page.', 'techeduem'),
                'required'              => array('techeduem_enable_single_post_subtitle', 'equals', 'yes'),
            ),
            array(
                'id'                    => 'techeduem_single_post_subtitle_typography',
                'type'                  => 'typography',
                'title'                 => esc_html__('Sub title Typography', 'techeduem'),
                'subtitle'              => esc_html__('Controls the typography for single post sub title.', 'techeduem'),
                'google'                => true,
                'subsets'               => false,
                'word-spacing'          => true,
                'letter-spacing'        => true,
                'text-align'            => false,
                'all_styles'            => true,
                'output'                => array('.page__title__wrapper.single-post .page__title__inner p'),
                'units'                 => 'px',
                'default'               => array(
                    'google'            => true,
                ),
                'required'              => array('techeduem_enable_single_post_subtitle', 'equals', 'yes'),
            ),
            array(
                'id'                    => 'techeduem_enable_single_post_breadcrumb_wrap',
                'type'                  => 'button_set',
                'title'                 => esc_html__('Breadcrumb Content', 'techeduem'),
                'subtitle'              => esc_html__('Controls what displays in the breadcrumb area.', 'techeduem'),
                'subtitle'              => esc_html__('Controls what displays in the breadcrumb area.', 'techeduem'),
                'options'               => array(
                    '1'                 => esc_html__('None', 'techeduem'),
                    '2'                 => esc_html__('Breadcrumbs', 'techeduem'),
                    '3'                 => esc_html__('Search Box', 'techeduem'),
                ),
                'default'               => '2',
            ),
            array(
                'id'                    => 'techeduem_blog_details_title_position',
                'type'                  => 'button_set',
                'title'                 => esc_html__('Content Position', 'techeduem'),
                'subtitle'              => esc_html__('Controls the position of the blog title', 'techeduem'),
                'options'               => array(
                    'text-left'              => esc_html__('Left', 'techeduem'),
                    'text-center'            => esc_html__('Center', 'techeduem'),
                    'text-right'             => esc_html__('Right', 'techeduem'),
                ),
                'default'               => 'text-center',
            ),
            array(
                'id'                    => 'techeduem_single_post_title_full_width',
                'type'                  => 'button_set',
                'title'                 => esc_html__('Title Wrapper Full Width', 'techeduem'),
                'subtitle'              => esc_html__('Enable to have the title area display at 100% width according to the window size. Turn off to follow site width.', 'techeduem'),
                'options'               => array(
                    'yes'               => esc_html__('Yes', 'techeduem'),
                    'no'                => esc_html__('No', 'techeduem'),
                ),
                'default'               => 'no',
            ),
            array(
                'id'                    => 'techeduem_blog_details_title_padding',
                'type'                  => 'spacing',
                'title'                 => esc_html__('Padding', 'techeduem'),
                'subtitle'              => esc_html__('Controls the top and bottom padding of the Blog page Title Area.', 'techeduem'),
                'output'                => array('.page__title__wrapper.single-post .page__title__inner'),
                'mode'                  => 'padding',
                'units_extended'        => false,
                'left'                  => false,
                'right'                 => false,
                'units'                 => array('em', 'px'),
            ),
            array(
                'id'                    => 'techeduem_blog_details_banner',
                'type'                  => 'background',
                'output'                => array('.page__title__wrapper.single-post'),
                'title'                 => esc_html__('Background', 'techeduem'),
                'subtitle'              => esc_html__('Controls the background option of the single post title area.', 'techeduem'),
            ),
            array(
                'id'                    => 'techeduem_single_post_title_wrap_overlay',
                'type'                  => 'color_rgba',
                'title'                 => esc_html__('Background Overlay', 'techeduem'),
                'subtitle'              => esc_html__('Controls the background overlay color of the single post title area.', 'techeduem'),
            ),
            array(
                'id'                    => 'techeduem_single_pos',
                'type'                  => 'button_set',
                'title'                 => esc_html__('Blog Details Layout', 'techeduem'),
                'subtitle'              => esc_html__('Choose your favorite style', 'techeduem'),
                'options'               => array(
                    'full'              => esc_html__('Full Width', 'techeduem'),
                    'left'              => esc_html__('Left Sidebar', 'techeduem'),
                    'right'             => esc_html__('Right sidebar', 'techeduem'),
                ),
                'default'               => 'right',
            ),
            array(
                'id'                    => 'techeduem_blog_spheights',
                'type'                  => 'spacing',
                'title'                 => esc_html__('Blog Details Page Padding.', 'techeduem'),
                'subtitle'              => esc_html__('Controls the top and bottom padding of the single blog page', 'techeduem'),
                'output'                => array('.blog-story-area'),
                'mode'                  => 'padding',
                'units_extended'        => false,
                'left'                  => false,
                'right'                 => false,
                'units'                 => array('em', 'px'),
                'default'               => array(
                    'padding-top'       => 'px',
                    'padding-right'     => '0px',
                    'padding-bottom'    => 'px',
                    'padding-left'      => '0px',
                    'units'             => 'px',
                )
            ),
            array(
                'id'                    => 'techeduem_show_single_post_publish_date_meta',
                'type'                  => 'button_set',
                'title'                 => esc_html__('Show post publish date', 'techeduem'),
                'subtitle'              => esc_html__('Show or hide the publish date of the single post.', 'techeduem'),
                'options'               => array(
                    'yes'               => esc_html__('Yes', 'techeduem'),
                    'no'                => esc_html__('No', 'techeduem'),
                ),
                'default'               => 'yes',
            ),
            array(
                'id'                    => 'techeduem_show_single_post_updated_date_meta',
                'type'                  => 'button_set',
                'title'                 => esc_html__('Show post updated date', 'techeduem'),
                'subtitle'              => esc_html__('Show or hide the updated date of the single post.', 'techeduem'),
                'options'               => array(
                    'yes'               => esc_html__('Yes', 'techeduem'),
                    'no'                => esc_html__('No', 'techeduem'),
                ),
                'default'               => 'no',
            ),
            array(
                'id'                    => 'techeduem_show_single_post_categories_meta',
                'type'                  => 'button_set',
                'title'                 => esc_html__('Show post categories', 'techeduem'),
                'subtitle'              => esc_html__('Show or hide the categories of single post.', 'techeduem'),
                'options'               => array(
                    'yes'               => esc_html__('Yes', 'techeduem'),
                    'no'                => esc_html__('No', 'techeduem'),
                ),
                'default'               => 'yes',
            ),
            array(
                'id'                    => 'techeduem_show_single_post_tags_meta',
                'type'                  => 'button_set',
                'title'                 => esc_html__('Show post tags', 'techeduem'),
                'subtitle'              => esc_html__('Show or hide the tags of single post.', 'techeduem'),
                'options'               => array(
                    'yes'               => esc_html__('Yes', 'techeduem'),
                    'no'                => esc_html__('No', 'techeduem'),
                ),
                'default'               => 'yes',
            ),
            array(
                'id'                    => 'techeduem_show_single_post_comments_meta',
                'type'                  => 'button_set',
                'title'                 => esc_html__('Show post comments count', 'techeduem'),
                'subtitle'              => esc_html__('Show or hide the comments count of single post.', 'techeduem'),
                'options'               => array(
                    'yes'               => esc_html__('Yes', 'techeduem'),
                    'no'                => esc_html__('No', 'techeduem'),
                ),
                'default'               => 'yes',
            ),
            array(
                'id'                    => 'techeduem_show_single_post_author_meta',
                'type'                  => 'button_set',
                'title'                 => esc_html__('Show post author name', 'techeduem'),
                'subtitle'              => esc_html__('Show or hide the author name of single post.', 'techeduem'),
                'options'               => array(
                    'yes'               => esc_html__('Yes', 'techeduem'),
                    'no'                => esc_html__('No', 'techeduem'),
                ),
                'default'               => 'yes',
            ),

            array(
                'id'                    => 'techeduem_blog_details_social_share',
                'type'                  => 'switch',
                'title'                 => esc_html__('Social Share', 'techeduem'),
                'subtitle'              => esc_html__('Show or hide the social share of single post.', 'techeduem'),
                'default'               => false,
            ),
            array(
                'id'                    => 'techeduem_blog_details_post_navigation',
                'type'                  => 'switch',
                'title'                 => esc_html__('Post Navigation (Next/Previous)', 'techeduem'),
                'subtitle'              => esc_html__('Show or hide the next/previous button of single post.', 'techeduem'),
                'default'               => true,
            ),
            array(
                'id'                    => 'techeduem_blog_details_show_author_info',
                'type'                  => 'switch',
                'title'                 => esc_html__('Show Author Info', 'techeduem'),
                'subtitle'              => esc_html__('Show or hide the Author Info box of single post.', 'techeduem'),
                'default'               => false,
            ),
            array(
                'id'                    => 'techeduem_blog_details_show_related_post',
                'type'                  => 'switch',
                'title'                 => esc_html__('Show Related Posts', 'techeduem'),
                'subtitle'              => esc_html__('Show or hide the related posts title of single post.', 'techeduem'),
                'default'               => true,
            ),
            array(
                'id'                    => 'techeduem_blog_details_related_post_title',
                'type'                  => 'text',
                'title'                 => esc_html__('Related Post Title', 'techeduem'),
                'subtitle'              => esc_html__('Set the custom title of the related post.', 'techeduem'),
                'default'               => esc_html__('Related Posts', 'techeduem'),
                'required'              => array('techeduem_blog_details_show_related_post', 'equals', true),
            ),
            array(
                'id'                    => 'techeduem_blog_details_no_of_column_related_post',
                'type'                  => 'select',
                'title'                 => esc_html__('No. of Column Related post', 'techeduem'),
                'subtitle'              => esc_html__('Choose number of column to show related post.', 'techeduem'),
                'options'           => array(
                    '12'            => '1 Column',
                    '1'             => '12 Column',
                    '2'             => '6 Column',
                    '3'             => '4 Column',
                    '4'             => '3 Column',
                    '6'             => '2 Column',
                ),
                'default'               => 4,
                'required'              => array('techeduem_blog_details_show_related_post', 'equals', true),
            ),
            array(
                'id'                    => 'techeduem_blog_details_no_of_item_per_page',
                'type'                  => 'slider',
                'title'                 => esc_html__('No. of Item per page', 'techeduem'),
                'subtitle'              => esc_html__('Choose number of item to show related post, if you want to show all post then set -1 value.', 'techeduem'),
                "default"               => 3,
                "min"                   => -1,
                "step"                  => 1,
                "max"                   => 100,
                'display_value'         => 'text',
                'required'              => array('techeduem_blog_details_show_related_post', 'equals', true),
            ),
        )
    )
);
// Sidebar
Redux::set_section($opt_name, array(
    'title'     => esc_html__('Sidebar', 'techeduem'),
    'id'        => 'techeduem_sidebar',
    'icon'      => 'el el-pause',
    'subsection' => true,
    'fields'    => array(

        array(
            'id'                    => 'techeduem_sidebar_widget_title',
            'type'                  => 'typography',
            'title'                 => esc_html__('Widget Title', 'techeduem'),
            'subtitle'              => esc_html__('Controls the typography settings of the widget title.', 'techeduem'),
            'google'                => true,
            'subsets'               => false,
            'text-transform'        => true,
            'letter-spacing'        => true,
            'text-align'            => false,
            'all_styles'            => true,
            'output'                => array('.sidebar-title'),
            'units'                 => 'px',
            'default'               => array(
                'google'            => true,
            )
        ),
        array(
            'id'                        => 'techeduem_sidebar_widget_title_spacing',
            'type'                      => 'spacing',
            'title'                     => esc_html__('Widget Title Spacing', 'techeduem'),
            'subtitle'                  => esc_html__('Controls the top, right, bottom and left padding of the widget title.', 'techeduem'),
            'output'                    => array('.sidebar-title:not(.related-post-title)'),
            'mode'                      => 'margin',
            'units_extended'            => false,
            'units'                     => array('em', 'px'),
            'default'                   => array(
                'margin-top'            => 'px',
                'margin-right'          => 'px',
                'margin-bottom'         => 'px',
                'margin-left'           => 'px',
                'units'                 => 'px',
            )
        ),
    )
));

// wooCommerce
if (class_exists('WooCommerce')) {
    Redux::set_section(
        $opt_name,
        array(
            'title'         => esc_html__('WooCommerce', 'techeduem'),
            'desc'          => esc_html__('wooCommerce options', 'techeduem'),
            'icon'             => 'el el-shopping-cart',
            'fields'        => array(

                array(
                    'id'                    => 'techeduem_product_sale_label_text',
                    'type'                  => 'text',
                    'output'                => array(''),
                    'title'                 => esc_html__('Product "Sale" Label Text', 'techeduem'),
                    'subtitle'              => esc_html__('Product "Sale" Label Text.', 'techeduem'),
                    'default'               => esc_html__('Sale', 'techeduem'),
                ),

                array(
                    'id'        => 'techeduem_show_sale_label_as',
                    'type'      => 'select',
                    'title'     => esc_html__('Show "Sale" Label As', 'techeduem'),
                    'customizer_only'   => false,
                    'options'   => array(
                        'text'      => esc_html__('Text', 'techeduem'),
                        'number'    => esc_html__('Number', 'techeduem'),
                        'percent'   => esc_html__('Percent', 'techeduem'),
                    ),
                    'default'   => esc_html__('text', 'techeduem'),
                ),

                array(
                    'id'        => 'related_product_show',
                    'type'      => 'slider',
                    'title'     => esc_html__('Number Of related Product', 'techeduem'),
                    'subtitle'  => esc_html__('Amount of related product number on single product page.', 'techeduem'),
                    'default'   => 4,
                    'min'       => 1,
                    'step'      => 1,
                    'max'       => 6,
                    'display_value' => 'text'
                ),

            )
        )
    );

    // Product Listing
    Redux::set_section(
        $opt_name,
        array(
            'title'            => esc_html__('Product Listing Setting', 'techeduem'),
            'icon'      => 'el-icon-tags',
            'id'        => 'techeduem_shop_page',
            'subsection' => true,
            'fields'           => array(

                array(
                    'id'                    => 'techeduem_shop_page_layout',
                    'title'                 => esc_html__('Select Shop page layout', 'techeduem'),
                    'subtitle'              => esc_html__('Select Shop page layout.', 'techeduem'),
                    'type'                  => 'image_select',
                    'options'               => array(
                        'left'                 => array(
                            'title'         => esc_html__(' ', 'techeduem'),
                            'img'           => get_template_directory_uri() . '/images/optionframework/left-sidebar.png',
                        ),
                        'fullwidth'         => array(
                            'title'         => esc_html__(' ', 'techeduem'),
                            'img'           => get_template_directory_uri() . '/images/optionframework/no-sidebar.png',
                        ),
                        'right'                 => array(
                            'title'         => esc_html__(' ', 'techeduem'),
                            'img'           => get_template_directory_uri() . '/images/optionframework/right-sidebar.png',
                        ),
                    ),
                    'default'               => 'fullwidth'
                ),

                array(
                    'id'        => 'product_shop_page_layout',
                    'type'      => 'select',
                    'title'     => esc_html__('Product style', 'techeduem'),
                    'subtitle'  => esc_html__('Control product style.', 'techeduem'),
                    'options'  => array(
                        '1' => 'Style One',
                        '2' => 'Style Two',
                        '3' => 'Style Three',
                    ),
                    'default'  => '1',
                ),

            )
        )
    );
}

//footer section
Redux::set_section($opt_name, array(
    'title'   => esc_html__('Footer', 'techeduem'),
    'id'      => 'techeduem_footer_section',
    'icon'    => 'el el-photo',
    'fields'  => array(
        array(
            'id'                        => 'techeduem_footer_enable',
            'type'                      => 'switch',
            'title'                     => esc_html__('Footer', 'techeduem'),
            'subtitle'                  => esc_html__('Enable or disable the footer area.', 'techeduem'),
            'default'                   => true,
        ),
        array(
            'id'                        => 'techeduem_select_footer_style_type',
            'title'                     => esc_html__('Footer Type', 'techeduem'),
            'subtitle'                  => esc_html__('Select footer type, if the default is chosen the existing options below will work, or choose the custom option to get footers from footer post type.', 'techeduem'),
            'type'                      => 'button_set',
            'options'                   => array(
                'default'                   => esc_html__('Default', 'techeduem'),
                'custom'                    => esc_html__('Custom', 'techeduem'),
            ),
            'default'                   => 'default'
        ),

        // Footer Custom Style
        array(
            'id'                    => 'techeduem_select_footer_template',
            'type'                  => 'select',
            'title'                 => esc_html__('Select Template', 'techeduem'),
            'subtitle'              => esc_html__('Select the footer template that you made in the footer post type.', 'techeduem'),
            'data'                  => 'posts',
            'args'                  => array(
                'post_type'             => 'techeduem_footer',
            ),
            'required'                  => array('techeduem_select_footer_style_type', 'equals', 'custom'),
        ),

        array(
            'id'                    => 'techeduem_default_footer_content',
            'title'                 => esc_html__('Footer CopyRight Content', 'techeduem'),
            'subtitle'              => esc_html__('Add your copyright text.', 'techeduem'),
            'type'                  => 'editor',
            'args'   => array(
                'teeny'            => false,
                'textarea_rows'    => 6
            ),
            'required'                 => array('techeduem_select_footer_style_type', 'equals', 'default'),
        ),
        array(
            'id'                    => 'techeduem_footer_content_typography',
            'type'                  => 'typography',
            'title'                 => esc_html__('Content CopyRight Typography', 'techeduem'),
            'subtitle'              => esc_html__('Controls the typography of the default footer content.', 'techeduem'),
            'google'                => true,
            'subsets'               => false,
            'text-align'            => false,
            'all_styles'            => true,
            'output'                => array('.default-footer-content-wrap .footer-copyright-text,.footer-copyright'),
            'units'                 => 'px',
            'default'               => array(
                'google'            => true,
            ),
            'required'                  => array('techeduem_select_footer_style_type', 'equals', 'default'),
        ),
        array(
            'id'                    => 'techeduem_footer_padding',
            'type'                  => 'spacing',
            'title'                 => esc_html__('Footer CopyRight Padding', 'techeduem'),
            'subtitle'              => esc_html__('Controls the top / bottom padding for footer content. Enter values including any valid CSS unit, ex: 100,100.', 'techeduem'),
            'mode'                  => 'padding',
            'units'                 => array('em', 'px'),
            'output'                => array('.footer-wrapper.default-footer-wrapper .default-footer,.footer-bottom-section'),
            'units_extended'        => false,
            'left'                  => false,
            'right'                 => false,
            'required'              => array('techeduem_select_footer_style_type', 'equals', 'default'),
            'default'                => array(
                'padding-top'                => '15px',
                'padding-bottom'            => '15px'
            ),
        ),
        array(
            'id'                        => 'techeduem_footer_bg_color',
            'type'                      => 'background',
            'output'                    => array('.footer-bottom-section'),
            'title'                     => esc_html__('Footer CopyRight Background', 'techeduem'),
            'subtitle'                  => esc_html__('Control the background of the footer area.', 'techeduem'),
            'required'                  => array('techeduem_select_footer_style_type', 'equals', 'default'),
        ),
        array(
            'id'                        => 'techeduem_footer_copyright_border_color',
            'type'                      => 'border',
            'output'                    => array('.footer-bottom-section'),
            'title'                     => esc_html__('Footer CopyRight Border Color', 'techeduem'),
            'subtitle'                  => esc_html__('Control the footer copyright border color.', 'techeduem'),
            'required'                  => array('techeduem_select_footer_style_type', 'equals', 'default'),
            'default'                      => array(
                'border-color'          => '#49c3c7',
                'border-style'              => 'solid',
                'border-top'            => true,
                'border-right'          => false,
                'border-bottom'         => false,
                'border-left'           => false
            )
        ),
        array(
            'id'                    => 'techeduem_footer_overlay_color',
            'type'                  => 'color_rgba',
            'title'                 => esc_html__('Footer Background Overlay', 'techeduem'),
            'subtitle'              => esc_html__('Controls the overlay color of the footer area.', 'techeduem'),
            'required'              => array('techeduem_select_footer_style_type', 'equals', 'default'),
        ),

    )
));


// Footer Widgets Option
Redux::set_section(
    $opt_name,
    array(
        'title'         => esc_html__('Widgets', 'techeduem'),
        'id'            => 'techeduem_widgets_options',
        'icon'          => 'el el-view-mode',
        'subsection'    => true,
        'fields'    => array(
            array(
                'id'                        => 'techeduem_footer_widgets_enable',
                'type'                      => 'switch',
                'title'                     => esc_html__('Footer Widgets area enable', 'techeduem'),
                'subtitle'                  => esc_html__('Enable or disable the widgets area.', 'techeduem'),
                'default'                   => true,
            ),
            array(
                'id'                        => 'techeduem_footer_layoutcolumns',
                'title'                     => esc_html__('Number of Footer Columns', 'techeduem'),
                'subtitle'                  => esc_html__('Controls the number of columns in the footer.', 'techeduem'),
                'type'                      => 'button_set',
                'options'                   => array(
                    '1'                     => esc_html__('One Column', 'techeduem'),
                    '2'                     => esc_html__('Two Column', 'techeduem'),
                    '3'                     => esc_html__('Three Column', 'techeduem'),
                    '4'                     => esc_html__('Four Column', 'techeduem'),
                ),
                'default'                   => '4',
                'required'                  => array('techeduem_footer_widgets_enable', 'equals', true),
            ),
            array(
                'id'                        => 'techeduem_col_1_gird_size',
                'type'                      => 'text',
                'title'                     => esc_html__('Column 1 gird size', 'techeduem'),
                'subtitle'                  => esc_html__('Set the column width in bootstrap grid size', 'techeduem'),
                'desc'                      => 'Put the number of grid size between 1 to 12. It is required!',
                'default'                   => '3',
                'required'                  => array('techeduem_footer_layoutcolumns', 'equals', array('1', '2', '3', '4')),
            ),
            array(
                'id'                        => 'techeduem_col_2_gird_size',
                'type'                      => 'text',
                'title'                     => esc_html__('Column 2 gird size', 'techeduem'),
                'subtitle'                  => esc_html__('Set the column width in bootstrap grid size', 'techeduem'),
                'desc'                      => 'Put the number of grid size between 1 to 12. It is required!',
                'default'                   => '3',
                'required'                  => array('techeduem_footer_layoutcolumns', 'equals', array('1', '2', '3', '4')),
            ),
            array(
                'id'                        => 'techeduem_col_3_gird_size',
                'type'                      => 'text',
                'title'                     => esc_html__('Column 3 gird size', 'techeduem'),
                'subtitle'                  => esc_html__('Set the column width in bootstrap grid size', 'techeduem'),
                'desc'                      => 'Put the number of grid size between 1 to 12. It is required!',
                'default'                   => '3',
                'required'                  => array('techeduem_footer_layoutcolumns', 'equals', array('1', '2', '3', '4')),
            ),
            array(
                'id'                        => 'techeduem_col_4_gird_size',
                'type'                      => 'text',
                'title'                     => esc_html__('Column 4 gird size', 'techeduem'),
                'subtitle'                  => esc_html__('Set the column width in bootstrap grid size', 'techeduem'),
                'desc'                      => 'Put the number of grid size between 1 to 12. It is required!',
                'default'                   => '3',
                'required'                  => array('techeduem_footer_layoutcolumns', 'equals', array('1', '2', '3', '4')),
            ),
        )
    )
);

// Typography
Redux::set_section(
    $opt_name,
    array(
        'title'     => esc_html__('Typography', 'techeduem'),
        'id'        => 'techeduem_fonts',
        'icon'      => 'el el-fontsize',
        'fields'    => array(
            array(
                'id'                    => 'techeduem_body_typography',
                'type'                  => 'typography',
                'title'                 => esc_html__('Body Typography', 'techeduem'),
                'subtitle'              => esc_html__('Controls the typography settings of the body.', 'techeduem'),
                'google'                => true,
                'subsets'               => false,
                'word-spacing'          => true,
                'letter-spacing'        => true,
                'text-align'            => false,
                'all_styles'            => true,
                'output'                => array('body'),
                'units'                 => 'px',
            ),
            array(
                'id'                    => 'techeduem_h1_typography',
                'type'                  => 'typography',
                'title'                 => esc_html__('H1 Heading Typography', 'techeduem'),
                'subtitle'              => esc_html__('Controls the typography settings of the H1 heading.', 'techeduem'),
                'google'                => true,
                'text-transform'        => true,
                'word-spacing'          => true,
                'letter-spacing'        => true,
                'subsets'               => false,
                'text-align'            => false,
                'all_styles'            => true,
                'units'                 => 'px',
                'output'                => array('h1'),
            ),
            array(
                'id'                    => 'techeduem_h2_typography',
                'type'                  => 'typography',
                'title'                 => esc_html__('H2 Heading Typography', 'techeduem'),
                'subtitle'              => esc_html__('Controls the typography settings of the H2 heading.', 'techeduem'),
                'google'                => true,
                'text-transform'        => true,
                'letter-spacing'        => true,
                'word-spacing'          => true,
                'subsets'               => false,
                'text-align'            => false,
                'all_styles'            => true,
                'units'                 => 'px',
                'output'                => array('h2'),
            ),
            array(
                'id'                    => 'techeduem_h3_typography',
                'type'                  => 'typography',
                'title'                 => esc_html__('H3 Heading Typography', 'techeduem'),
                'subtitle'              => esc_html__('Controls the typography settings of the H3 heading.', 'techeduem'),
                'google'                => true,
                'text-transform'        => true,
                'letter-spacing'        => true,
                'word-spacing'          => true,
                'subsets'               => false,
                'text-align'            => false,
                'all_styles'            => true,
                'units'                 => 'px',
                'output'                => array('h3'),
            ),
            array(
                'id'                    => 'techeduem_h4_typography',
                'type'                  => 'typography',
                'title'                 => esc_html__('H4 Heading Typography', 'techeduem'),
                'subtitle'              => esc_html__('Controls the typography settings of the H4 heading.', 'techeduem'),
                'google'                => true,
                'text-transform'        => true,
                'word-spacing'          => true,
                'letter-spacing'        => true,
                'subsets'               => false,
                'text-align'            => false,
                'all_styles'            => true,
                'units'                 => 'px',
                'output'                => array('h4'),
            ),
            array(
                'id'                    => 'techeduem_h5_typography',
                'type'                  => 'typography',
                'title'                 => esc_html__('H5 Heading Typography', 'techeduem'),
                'subtitle'              => esc_html__('Controls the typography settings of the H5 heading.', 'techeduem'),
                'google'                => true,
                'text-transform'        => true,
                'word-spacing'          => true,
                'letter-spacing'        => true,
                'subsets'               => false,
                'text-align'            => false,
                'all_styles'            => true,
                'units'                 => 'px',
                'output'                => array('h5'),
            ),
            array(
                'id'                    => 'techeduem_h6_typography',
                'type'                  => 'typography',
                'title'                 => esc_html__('H6 Heading Typography', 'techeduem'),
                'subtitle'              => esc_html__('Controls the typography settings of the H6 heading.', 'techeduem'),
                'google'                => true,
                'text-transform'        => true,
                'word-spacing'          => true,
                'letter-spacing'        => true,
                'subsets'               => false,
                'text-align'            => false,
                'all_styles'            => true,
                'units'                 => 'px',
                'output'                => array('h6'),
            ),

        )
    )
);

//404 error page
Redux::set_section($opt_name, array(
    'title'     => esc_html__('404 Page', 'techeduem'),
    'id'        => 'techeduem_error_page',
    'icon'      => 'el el-eye-close',
    'fields'    => array(
        array(
            'id'                    => 'techeduem_404_control',
            'type'                  => 'button_set',
            'title'                 => esc_html__('Title Type', 'techeduem'),
            'subtitle'              => esc_html__('Select 404 title type, if the title is chosen the existing text options below will work, or choose the image option get the image upload field.', 'techeduem'),
            'options'               => array(
                'title'             => esc_html__('Title',  'techeduem'),
                'image'             => esc_html__('Image', 'techeduem'),
            ),
            'default'               => 'title'
        ),
        array(
            'id'                    => 'techeduem_404_title',
            'type'                  => 'text',
            'required'              => array('techeduem_404_control', 'equals', 'title'),
            'title'                 => esc_html__('Title', 'techeduem'),
            'subtitle'              => esc_html__('Add your custom title.', 'techeduem'),
            'value'                 => '404',
            'default'               => esc_html__('404', 'techeduem'),
        ),
        array(
            'id'                    => 'techeduem_404font',
            'type'                  => 'typography',
            'title'                 => esc_html__('Title Typography', 'techeduem'),
            'subtitle'              => esc_html__('Controls the typography for the title.', 'techeduem'),
            'google'                => true,
            'font-style'            => true,
            'font-weight'           => true,
            'font-family'           => true,
            'subsets'               => true,
            'line-height'           => true,
            'text-align'            => true,
            'all_styles'            => true,
            'output'                => array('.pnf-inner > h1'),
            'units'                 => 'px',
            'default'               => array(
                'google'            => true,
            ),
            'required'              => array('techeduem_404_control', 'equals', 'title'),
        ),
        array(
            'id'                    => 'techeduem_404_img',
            'type'                  => 'media',
            'required'              => array('techeduem_404_control', 'equals', 'image'),
            'title'                 => esc_html__('Image', 'techeduem'),
            'subtitle'              => esc_html__('Upload the image for 404 page title.', 'techeduem'),
        ),
        array(
            'id'                    => 'techeduem_404_subtitle',
            'type'                  => 'text',
            'title'                 => esc_html__('Sub Title', 'techeduem'),
            'subtitle'              => esc_html__('Add your custom subtitle.', 'techeduem'),
            'default'               => esc_html__('PAGE NOT FOUND', 'techeduem'),
        ),
        array(
            'id'                    => 'techeduem_404font_subtitle',
            'type'                  => 'typography',
            'title'                 => esc_html__('Sub Title Typography', 'techeduem'),
            'subtitle'              => esc_html__('Controls the typography settings of the subtitle.', 'techeduem'),
            'google'                => true,
            'font-backup'           => false,
            'subsets'               => false,
            'line-height'           => false,
            'text-align'            => false,
            'text-transform'        => true,
            'all_styles'            => true,
            'output'                => array('.pnf-inner > h2'),
            'units'                 => 'px',
            'default'               => array(
                'google'            => true,
            )
        ),
        array(
            'id'                    => 'techeduem_404_info',
            'type'                  => 'editor',
            'title'                 => esc_html__('Information', 'techeduem'),
            'default'               => esc_html__('The page you are looking for does not exist or has been moved.', 'techeduem'),
            'args'                  => array(
                'teeny'             => true,
                'textarea_rows'     => 5,
            )
        ),
        array(
            'id'                    => 'techeduem_404font_sub',
            'type'                  => 'typography',
            'title'                 => esc_html__('404 Page Sub Title Font', 'techeduem'),
            'subtitle'              => esc_html__('Controls the typography settings of the subtitle.', 'techeduem'),
            'google'                => true,
            'font-backup'           => false,
            'subsets'               => false,
            'line-height'           => false,
            'text-align'            => false,
            'text-transform'        => true,
            'all_styles'            => true,
            'output'                => array('.pnf-inner > p'),
            'units'                 => 'px',
            'default'               => array(
                'google'            => true,
            )
        ),
        array(
            'id'                    => 'techeduem_enable_go_back_btn',
            'type'                  => 'button_set',
            'title'                 => esc_html__('Button', 'techeduem'),
            'subtitle'              => esc_html__('Enable or disable the go to home page button.', 'techeduem'),
            'options'               => array(
                'yes'                   => 'Enable',
                'no'                    => 'Disable'
            ),
            'default' => 'yes'
        ),
        array(
            'id'                    => 'techeduem_button_text',
            'type'                  => 'text',
            'title'                 => esc_html__('Button Text', 'techeduem'),
            'subtitle'              => esc_html__('Set the custom text of go to home page button.', 'techeduem'),
            'default'               => esc_html__('Go back to home page', 'techeduem'),
            'required'              => array('techeduem_enable_go_back_btn', 'equals', 'yes'),
        ),
        array(
            'id'        => 'pnf_background',
            'type'      => 'background',
            'output'    => array('.page-not-found-wrap'),
            'title'     => esc_html__('404 Page Background', 'techeduem'),
            'subtitle'  => esc_html__('Controls the background of 404 page.', 'techeduem'),
            'default'   => array()
        ),
    )
));

//Header center
Redux::set_section(
    $opt_name,
    array(
        'title'            => esc_html__('Social Network', 'techeduem'),
        'id'               => 'techeduem-social-icon',
        'icon'             => 'el el-share',
        'fields'           => array(
            array(
                'id'                    => 'techeduem_social_icons',
                'type'                  => 'sortable',
                'title'                 => esc_html__('Social Icons', 'techeduem'),
                'subtitle'              => esc_html__('Enter social links to show the icons', 'techeduem'),
                'mode'                  => 'text',
                'label'                 => true,
                'options'               => array(
                    'facebook'          => '',
                    'twitter'           => '',
                    'instagram'         => '',
                    'tumblr'            => '',
                    'pinterest'         => '',
                    'linkedin'          => '',
                    'behance'           => '',
                    'dribbble'          => '',
                    'youtube'           => '',
                    'vimeo'             => '',
                    'rss'               => '',
                ),
                'default'                   => array(
                    'facebook'              => 'https://www.facebook.com/',
                    'twitter'               => 'https://twitter.com/',
                    'instagram'             => 'https://instagram.com/',
                    'tumblr'                => '',
                    'pinterest'             => '',
                    'linkedin'              => '',
                    'behance'               => '',
                    'dribbble'              => 'https://dribbble.com/',
                    'youtube'               => '',
                    'vimeo'                 => '',
                    'rss'                   => '',
                ),
            )
        )
    )
);
