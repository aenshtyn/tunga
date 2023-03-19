<?php

/**
 * Template Name: Right sidebar
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package techeduem
 */

get_header();
?>
<div class="page-wrapper clear">
	<div class="container">
		<div class="row">
			<div class="col-md-9">
				<?php
				while (have_posts()) : the_post();
					the_content();
				endwhile; // End of the loop.
				?>
			</div>
			<div class="col-md-3">
				<?php get_sidebar('right'); ?>
			</div>
		</div>
	</div><!-- #primary -->
</div><!-- #primary -->
<?php
get_footer();
