<?php

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

if (!function_exists('techeduem_widgets_init')) {
	function techeduem_widgets_init()
	{
		register_sidebar(array(
			'name'          => esc_html__('Right Sidebar', 'techeduem'),
			'id'            => 'sidebar-right',
			'description'   => esc_html__('Add widgets here.', 'techeduem'),
			'before_widget' => '<div id="%1$s" class="sidebar %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="title">',
			'after_title'   => '</h3>',
		));

		register_sidebar(array(
			'name'          => esc_html__('Left Sidebar', 'techeduem'),
			'id'            => 'sidebar-left',
			'description'   => esc_html__('Add widgets here.', 'techeduem'),
			'before_widget' => '<div id="%1$s" class="sidebar %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="title">',
			'after_title'   => '</h3>',
		));

		if (class_exists('WooCommerce')) {
			register_sidebar(array(
				'name'          => esc_html__('WooCommerce Sidebar', 'techeduem'),
				'id'            => 'sidebar-category',
				'description'   => esc_html__('Add widgets here.', 'techeduem'),
				'before_widget' => '<div id="%1$s" class="sidebar %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="title">',
				'after_title'   => '</h3>',
			));
		}


		$techeduem_opt = techeduem_get_opt();
		if (isset($techeduem_opt['techeduem_footer_layoutcolumns'])) {
			$footer_widget_column = $techeduem_opt['techeduem_footer_layoutcolumns'];
		} else {
			$footer_widget_column = 4;
		}
		for ($footer = 1; $footer <= $footer_widget_column; $footer++) {
			register_sidebar(array(
				'name'          => 'Footer ' . $footer,
				'id'            => 'techeduem-footer-' . $footer,
				'description'   => esc_html__('Add widgets here.', 'techeduem'),
				'before_widget' => '<div id="%1$s" class="footer-widget widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h4 class="title">',
				'after_title'   => '</h4>',
			));
		}
	}
}
add_action('widgets_init', 'techeduem_widgets_init');
