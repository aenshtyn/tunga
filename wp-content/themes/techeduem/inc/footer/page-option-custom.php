<?php

/**
 * Custom Footer template
 *
 * @package techeduem
 */

$page_select_footer_template = (!empty(get_post_meta(get_the_id(), '_techeduem_select_footer_template', true))) ? get_post_meta(get_the_id(), '_techeduem_select_footer_template', true) : ' ';

/**
 * Enable Footer Fixed effect
 */
$foo_fixed_enable = (!empty(get_post_meta($page_select_footer_template, '_techeduem_fixed_footer_enable', true))) ? get_post_meta($page_select_footer_template, '_techeduem_fixed_footer_enable', true) : '';


$footer_classes[] = '';

if ('' != $foo_fixed_enable && 'no' != $foo_fixed_enable) {
	$footer_classes[] = 'fixed-footer-enable';
}

?>

<footer class="footer-wrapper <?php echo join(' ', $footer_classes) ?>">

	<?php
	if (\Elementor\Plugin::$instance->db->is_built_with_elementor($page_select_footer_template)) {
		echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display($page_select_footer_template);
	} else {
		echo apply_filters('the_content', get_post_field('post_content', $page_select_footer_template));
	}
	?>

</footer>