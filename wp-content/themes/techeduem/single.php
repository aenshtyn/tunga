<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package techeduem
 */

get_header();

$techeduem_opt = techeduem_get_opt();

$techeduem_blog_single = '';
$techeduem_blog_single = isset($techeduem_opt['techeduem_single_pos']) ? $techeduem_opt['techeduem_single_pos'] : '';

$post_layout_value = get_post_meta(get_the_id(), '_techeduem_post_layout', true);

if (!empty($post_layout_value)) {
	$post_details_layout = $post_layout_value;
} else {
	$post_details_layout = $techeduem_blog_single;
}

?>
<div class="page-wrapper blog-story-area clear">
	<div class="container">
		<div class="row">
			<?php if ($post_details_layout == 'full') { ?>
				<!-- single blog full width start -->
				<div class="col-md-10 offset-md-1">
					<?php get_template_part('/template-parts/content-single'); ?>
				</div>
				<!--single blog full width end -->
			<?php } elseif ($post_details_layout == 'left') { ?>
				<!-- single blog left sidebar start -->
				<div class="col-lg-3 col-12">
					<?php get_sidebar('left'); ?>
				</div>
				<div class="col-lg-9 col-12">
					<?php get_template_part('/template-parts/content-single'); ?>
				</div>
				<!-- single blog left sidebar end -->
			<?php } else { ?>
				<!-- single blog right sidebar start -->
				<div class="col-lg-9 col-12">
					<?php get_template_part('/template-parts/content-single'); ?>
				</div>
				<div class="col-lg-3 col-12">
					<?php get_sidebar('right'); ?>
				</div>
				<!--single blog right sidebar end -->
			<?php }	?>

		</div>
	</div>
</div>
<?php
get_footer();
