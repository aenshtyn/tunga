<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package techeduem
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<?php do_action('techeduem_after_body');

	$techeduem_opt = techeduem_get_opt();
	$techeduem_page_layout_width = (get_post_meta(get_the_id(), '_techeduem_layout_width', true)) ? get_post_meta(get_the_id(), '_techeduem_layout_width', true) : '';
	$techeduem_layout_width = (isset($techeduem_opt['techeduem_layout_width'])) ? $techeduem_opt['techeduem_layout_width'] : '';

	if ('' != $techeduem_page_layout_width && 'default' !== $techeduem_page_layout_width) {
		if ('boxed' == $techeduem_page_layout_width) {
			$techeduem_layout_width_value = 'boxed-layout';
		} else {
			$techeduem_layout_width_value = 'wide-layout';
		}
	} else {
		if ('' != $techeduem_layout_width && 'boxed-layout' == $techeduem_layout_width) {
			$techeduem_layout_width_value = 'boxed-layout';
		} else {
			$techeduem_layout_width_value = 'wide-layout';
		}
	} ?>

	<div id="page" class="site site-wrapper <?php echo esc_attr($techeduem_layout_width_value); ?>">
		<div id="techeduem">
			<?php
			$techeduem_opt = techeduem_get_opt();

			/**
			 * Enable Header Top bar
			 */
			$header_topbar_enable = '';
			$page_enable_topbar = get_post_meta(get_the_id(), '_techeduem_enable_topbar', true);
			$enable_topbar =  (isset($techeduem_opt['techeduem_header_show']) ? $techeduem_opt['techeduem_header_show'] : '') == true ? 'yes' : 'no';

			if (!empty($page_enable_topbar)) {
				if ('default' == $page_enable_topbar) {
					$header_topbar_enable = $enable_topbar;
				} elseif ('yes' == $page_enable_topbar) {
					$header_topbar_enable = $page_enable_topbar;
				} else {
					$header_topbar_enable = $page_enable_topbar;
				}
			} else {
				if (isset($enable_topbar)) {
					$header_topbar_enable = $enable_topbar;
				}
			}
			/**
			 * Load Header Top bar
			 */
			if ('no' != $header_topbar_enable) {
				get_template_part('/inc/header/header-top-bar');
			}

			/** 
			 * Enable header
			 */
			$page_enable_header = get_post_meta(get_the_id(), '_techeduem_enable_header');
			$page_select_header_style_type = get_post_meta(get_the_id(), '_techeduem_select_header_style_type', true);
			$header_default_layout_style = get_post_meta(get_the_id(), '_techeduem_header_default_layout_style', true);
			$enable_header = (isset($techeduem_opt['techeduem_enable_header'])) ? $techeduem_opt['techeduem_enable_header'] : '';
			$header_default_style = (isset($techeduem_opt['techeduem_select_header_style_type'])) ? $techeduem_opt['techeduem_select_header_style_type'] : '';
			$header_default_template = (isset($techeduem_opt['techeduem_header_default_style'])) ? $techeduem_opt['techeduem_header_default_style'] : '';

			/**
			 * Load Header
			 */
			if (!empty($page_enable_header[0]) && '' != $page_enable_header[0]) {

				if ('yes' == $page_enable_header[0]) {
					/**
					 * Enable Header condition 'yes' --> page
					 */
					if ('default' == $page_select_header_style_type) {
						/**
						 * Header Type 'default' --> page
						 */
						if ('style_2' == $header_default_layout_style) {
							get_template_part('inc/header/header-2');
						} elseif ('style_3' == $header_default_layout_style) {
							get_template_part('inc/header/header-3');
						} elseif ('style_4' == $header_default_layout_style) {
							get_template_part('inc/header/header-4');
						} elseif ('style_5' == $header_default_layout_style) {
							get_template_part('inc/header/header-5');
						} else {
							get_template_part('inc/header/default');
						}
					} else {
						/**
						 * Header Type 'custom' --> page
						 */
						techeduem_panel_view('select_header_style_type', 'select_header_style_type', 'custom', 'header');
					}
				} elseif ('default' == $page_enable_header[0]) {
					/**
					 * Enable Header condition 'default' --> page
					 */
					if (isset($enable_header) && '' !== $enable_header) {

						if ('0' !== $enable_header) {

							if ('default' == $header_default_style) {
								/**
								 * Header Type 'default' --> theme
								 */
								if ('style_2' == $header_default_template) {
									get_template_part('inc/header/header-2');
								} elseif ('style_3' == $header_default_template) {
									get_template_part('inc/header/header-3');
								} elseif ('style_4' == $header_default_template) {
									get_template_part('inc/header/header-4');
								} elseif ('style_5' == $header_default_template) {
									get_template_part('inc/header/header-5');
								} else {
									get_template_part('inc/header/default');
								}
							} else {
								/**
								 * Header Type 'custom' --> theme
								 */
								techeduem_panel_view('select_header_style_type', 'select_header_style_type', 'custom', 'header');
							}
						}
					}
				} else {
					/**
					 * Enable Header condition 'no' --> page
					 */
					// return empty
				}
			} elseif (isset($enable_header) && '' !== $enable_header) {
				/**
				 * Enable or disable the header area --> theme
				 */
				if ('0' !== $enable_header) {
					/**
					 * Header area not disable --> theme
					 */
					if ('default' == $header_default_style) {
						/**
						 * Header Type 'default' --> theme
						 */
						if ('style_2' == $header_default_template) {
							get_template_part('inc/header/header-2');
						} elseif ('style_3' == $header_default_template) {
							get_template_part('inc/header/header-3');
						} elseif ('style_4' == $header_default_template) {
							get_template_part('inc/header/header-4');
						} elseif ('style_5' == $header_default_template) {
							get_template_part('inc/header/header-5');
						} else {
							get_template_part('inc/header/default');
						}
					} else {
						/**
						 * Header Type 'custom' --> theme
						 */
						techeduem_panel_view('select_header_style_type', 'select_header_style_type', 'custom', 'header');
					}
				}
			} else {
				/**
				 * Default --> without redux/metabox
				 */
				get_template_part('inc/header/header-5');
			}

			/** 
			 * Enable Page Title
			 */
			$techeduem_page_title_wrapper_enable = get_post_meta(get_the_id(), '_techeduem_title_wrapper_enable', true);
			$techeduem_theme_title_wrapper_enable = isset($techeduem_opt['techeduem_title_wrapper_enable']) ? $techeduem_opt['techeduem_title_wrapper_enable'] : '';

			/**
			 * Load Page Title and Breadcrumb 
			 */
			if ('' != $techeduem_page_title_wrapper_enable) {
				if ('yes' ==  $techeduem_page_title_wrapper_enable) {
					get_template_part('/inc/page-header/header-page-title');
				}
			} elseif ('' != $techeduem_theme_title_wrapper_enable) {
				if ('yes' == $techeduem_theme_title_wrapper_enable) {
					get_template_part('/inc/page-header/header-page-title');
				}
			} else {
				get_template_part('/inc/page-header/header-page-title');
			}

			?>

			<div id="content" class="site-content">