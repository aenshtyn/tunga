<?php

/**
 * Template Name: Full Width
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package techeduem
 */

get_header();
?>
<div class="page-wrapper clear">
	<?php
	while (have_posts()) : the_post();
		the_content();
	endwhile; // End of the loop.
	?>
</div><!-- #primary -->
<?php
get_footer();
