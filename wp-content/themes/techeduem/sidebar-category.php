<?php

/**
 * The sidebar for product category page
 *
 * If no active widgets are in the sidebar, hide it completely.
 *
 * @package WordPress
 * @subpackage techeduem
 * @since techeduem Themes 1.0
 */
?>

<?php if (is_active_sidebar('sidebar-category')) : ?>
    <div id="secondary" class="shop-sidebar">
        <?php dynamic_sidebar('sidebar-category'); ?>
    </div>
<?php endif; ?>