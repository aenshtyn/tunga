<?php

/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package techeduem
 */
?>

<?php while (have_posts()) : the_post(); ?>

<?php get_template_part('formats/content', get_post_format()); ?>

<?php endwhile; ?>