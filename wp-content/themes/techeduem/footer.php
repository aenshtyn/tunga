<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package techeduem
 */

?>

</div><!-- #content -->

<?php
/** 
 * Enable footer
 */
$techeduem_opt = techeduem_get_opt();

$page_enable_footer = get_post_meta(get_the_id(), '_techeduem_footer_enable');
$enable_footer = isset($techeduem_opt['techeduem_footer_enable']) ? $techeduem_opt['techeduem_footer_enable'] : '';

/**
 * Load footer
 */
if (!empty($page_enable_footer[0]) && '' != $page_enable_footer[0]) {
	if ('yes' == $page_enable_footer[0]) {
		techeduem_panel_view('select_footer_style_type', 'select_footer_style_type', 'custom', 'footer');
	} elseif ('default' == $page_enable_footer[0]) {
		if (isset($enable_footer) && '' !== $enable_footer) {
			if ('0' !== $enable_footer) {
				techeduem_panel_view('select_footer_style_type', 'select_footer_style_type', 'custom', 'footer');
			}
		}
	} else {
		// empty
	}
} elseif (isset($enable_footer) && '' !== $enable_footer) {
	if ('0' !== $enable_footer) {
		techeduem_panel_view('select_footer_style_type', 'select_footer_style_type', 'custom', 'footer');
	}
} else {
	get_template_part('inc/footer/default');
}

/**
 * Back To Top
 */
if (isset($techeduem_opt['techeduem_scroll_to_top_enable']) && $techeduem_opt['techeduem_scroll_to_top_enable'] == 'yes') {
	echo '<div id="back-to-top"><i class="fa fa-angle-up"></i></div> ';
}

?>

</div><!-- #page -->
</div>

<?php wp_footer(); ?>

</body>

</html>