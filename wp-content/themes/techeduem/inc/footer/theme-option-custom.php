<?php

/**
 * Custom footer template
 *
 * @package techeduem
 */


$techeduem_opt = techeduem_get_opt();

$techeduem_select_footer_template_id = (!empty($techeduem_opt['techeduem_select_footer_template'])) ? $techeduem_opt['techeduem_select_footer_template'] : ' ';

/**
 * Enable Footer Fixed effect
 */
$foo_fixed_enable = (!empty(get_post_meta($techeduem_select_footer_template_id, '_techeduem_fixed_footer_enable', true))) ? get_post_meta($techeduem_select_footer_template_id, '_techeduem_fixed_footer_enable', true) : '';


$footer_classes[] = '';

if ('' != $foo_fixed_enable && 'no' != $foo_fixed_enable) {
	$footer_classes[] = 'fixed-footer-enable';
}

?>

<footer class="footer-wrapper <?php echo join(' ', $footer_classes) ?>">

	<?php echo apply_filters('the_content', get_post_field('post_content', $techeduem_select_footer_template_id)) ?>
	<?php
	if (\Elementor\Plugin::$instance->db->is_built_with_elementor($techeduem_select_footer_template_id)) {
		echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display($techeduem_select_footer_template_id);
	} else {
		echo apply_filters('the_content', get_post_field('post_content', $techeduem_select_footer_template_id));
	}
	?>

</footer>