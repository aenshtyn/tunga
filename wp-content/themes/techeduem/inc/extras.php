<?php

/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package techeduem
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */

/**
 * Layout options
 */
function techeduem_body_classes($classes)
{
	$techeduem_opt = techeduem_get_opt();

	// Adds a class of group-blog to blogs with more than 1 published author.
	if (is_multi_author()) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if (!is_singular()) {
		$classes[] = 'hfeed';
	}

	$techeduem_page_layout_width = (get_post_meta(get_the_id(), '_techeduem_layout_width', true)) ? get_post_meta(get_the_id(), '_techeduem_layout_width', true) : '';

	$techeduem_layout_width = (isset($techeduem_opt['techeduem_layout_width'])) ? $techeduem_opt['techeduem_layout_width'] : '';


	if ('' != $techeduem_page_layout_width && 'default' !== $techeduem_page_layout_width) {
		if ('boxed' == $techeduem_page_layout_width) {
			$classes[] = 'boxed-layout-active';
		} else {
			$classes[] = 'wide-layout-active';
		}
	} else {
		if ('' != $techeduem_layout_width && 'boxed-layout' == $techeduem_layout_width) {
			$classes[] = 'boxed-layout-active';
		} else {
			$classes[] = 'wide-layout-active';
		}
	}

	// Header layout classes
	if (isset($techeduem_opt['techeduem_header_default_style']) ? $techeduem_opt['techeduem_header_default_style'] : '' == 'style_1') {
		if ($techeduem_opt['techeduem_header_default_style'] == 'style_1') {
			$classes[] = 'header-default-style-one';
		}
	}

	if (!class_exists('Redux')) {
		$classes[] = 'header-default-style-one';
	}

	if (isset($techeduem_opt['techeduem_header_default_style'])) {

		if ($techeduem_opt['techeduem_header_default_style'] == 'style_3') {
			$classes[] = 'active-transparent-header';
		}
	}


	return $classes;
}
add_filter('body_class', 'techeduem_body_classes');

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function techeduem_pingback_header()
{
	if (is_singular() && pings_open()) {
		echo '<link rel="pingback" href="', esc_url(get_bloginfo('pingback_url')), '">';
	}
}
add_action('wp_head', 'techeduem_pingback_header');
