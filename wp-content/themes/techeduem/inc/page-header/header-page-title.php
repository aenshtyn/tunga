<?php

/**
 * This partial is used for displaying the page title.
 *
 * @package techeduem
 */
?>

<?php if (is_home()) : ?>

	<?php get_template_part('/inc/page-header/blog-title'); ?>

<?php elseif (!is_front_page() && is_page()) : ?>

	<?php get_template_part('/inc/page-header/page-title'); ?>

<?php elseif (is_archive()) : ?>

	<?php get_template_part('/inc/page-header/page-title'); ?>

<?php elseif (is_single()) : ?>

	<?php get_template_part('/inc/page-header/single-post-title'); ?>

<?php elseif (is_404()) : ?>

	<!-- Page title and breadcrumb not loaded -->

<?php elseif (is_search()) : ?>

	<?php get_template_part('/inc/page-header/page-title'); ?>

<?php else : ?>

<?php endif ?>