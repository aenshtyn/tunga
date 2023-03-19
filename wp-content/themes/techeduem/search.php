<?php

/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package techeduem
 */
get_header();
?>
<div class="page-wrapper clear">
	<div class="container">
		<div class="row">
			<div class="col-lg-9 col-12 mb-40">
				<?php
				if (have_posts()) : ?>
				<?php
					echo '<div class="row blog-masonry clearfix">';
					/* Start the Loop */
					while (have_posts()) : the_post();
						/**
						 * Run the loop for the search to output the results.
						 * If you want to overload this in a child theme then include a file
						 * called content-search.php and that will be used instead.
						 */
						echo '<div class="col-lg-6 col-md-6 col-sm-6 mb-50 grid-item">';
						get_template_part('template-parts/formats/content', get_post_format());
						echo '</div>';
					endwhile;
					echo '</div>';
					techeduem_blog_pagination();
				else :
					get_template_part('template-parts/content', 'none');
				endif;
				?>
			</div>
			<div class="col-lg-3 col-12">
				<?php get_sidebar('right'); ?>
			</div>

		</div><!-- #row -->
	</div><!-- #container -->
</div><!-- #primary -->

<?php
get_footer();
