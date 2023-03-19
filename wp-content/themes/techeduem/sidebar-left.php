<?php

/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package techeduem
 */

if (!is_active_sidebar('sidebar-left')) {
	return;
}
?>

<aside id="secondary" class="widget-area">
	<?php dynamic_sidebar('sidebar-left'); ?>
</aside><!-- #secondary -->