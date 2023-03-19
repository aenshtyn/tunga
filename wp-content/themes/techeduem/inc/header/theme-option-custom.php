<?php

/**
 * Custom header template
 *
 * @package techeduem
 */


$techeduem_opt = techeduem_get_opt();

$techeduem_select_header_template_id = (!empty($techeduem_opt['techeduem_select_header_template'])) ? $techeduem_opt['techeduem_select_header_template'] : ' ';

/**
 * Header sticky enable
 */
$techeduem_page_header_sticky = (!empty(get_post_meta($techeduem_select_header_template_id, '_techeduem_header_sticky', true))) ? get_post_meta($techeduem_select_header_template_id, '_techeduem_header_sticky', true) : '';
$header_classes[] = '';
if ('' != $techeduem_page_header_sticky && 'no' != $techeduem_page_header_sticky) {
	$header_classes[] = 'header-sticky';
}

/**
 * Header Transparent
 */
$header_transparent_enable = (!empty(get_post_meta($techeduem_select_header_template_id, '_techeduem_header_transparent', true))) ? get_post_meta($techeduem_select_header_template_id, '_techeduem_header_transparent', true) : '';
if ('' != $header_transparent_enable && 'no' != $header_transparent_enable) {
	$header_classes[] = 'header-transparent';
}

?>
<header class="header-wrapper clearfix <?php echo join(' ', $header_classes) ?>">
	<?php
	if (\Elementor\Plugin::$instance->db->is_built_with_elementor($techeduem_select_header_template_id)) {
		echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display($techeduem_select_header_template_id);
	} else {
		echo apply_filters('the_content', get_post_field('post_content', $techeduem_select_header_template_id));
	}
	?>
</header>