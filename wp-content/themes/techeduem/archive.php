<?php

/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package techeduem
 */

get_header(); ?>

<div class="page-wrapper clear">
	<div class="container">
		<div class="row">
			<?php
			if (have_posts()) : ?>
			<?php
				get_template_part('template-parts/content', get_post_format());
			else :
				get_template_part('template-parts/content', 'none');
			endif; ?>
		</div><!-- #main -->
	</div><!-- #primary -->
</div><!-- #primary -->

<?php get_footer();
