<?php

/**
 * Template part for displaying left image posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package techeduem
 */

/**
 * Post Meta
 */
$techeduem_opt = techeduem_get_opt();

$show_post_publish_date_meta = (isset($techeduem_opt['techeduem_show_post_publish_date_meta'])) ? $techeduem_opt['techeduem_show_post_publish_date_meta'] : '';
$show_post_updated_date_meta = (isset($techeduem_opt['techeduem_show_post_updated_date_meta'])) ? $techeduem_opt['techeduem_show_post_updated_date_meta'] : '';
$show_post_categories_meta = (isset($techeduem_opt['techeduem_show_post_categories_meta'])) ? $techeduem_opt['techeduem_show_post_categories_meta'] : '';
$show_post_tags_meta = (isset($techeduem_opt['techeduem_show_post_tags_meta'])) ? $techeduem_opt['techeduem_show_post_tags_meta'] : '';
$show_post_comments_meta = (isset($techeduem_opt['techeduem_show_post_comments_meta'])) ? $techeduem_opt['techeduem_show_post_comments_meta'] : '';
$show_post_author_meta = (isset($techeduem_opt['techeduem_show_post_author_meta'])) ? $techeduem_opt['techeduem_show_post_author_meta'] : '';
?>
<div class="col-md-12">
	<article id="post-<?php the_ID(); ?>" <?php post_class('blog-post grid-left-img blog-left-image mb-40'); ?>>
		<?php if (has_post_thumbnail()) : ?>
			<div class="blog-thumb">
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('techeduem_size_375X325'); ?></a>
			</div>
		<?php endif; ?>
		<div class="blog-content">
			<h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<!-- Start Blog Meta  -->
			<?php if ('no' != $show_post_publish_date_meta || 'no' != $show_post_updated_date_meta || 'no' != $show_post_author_meta || 'no' != $show_post_comments_meta || 'no' != $show_post_categories_meta || 'no' != $show_post_tags_meta) : ?>
				<div class="blog-meta">

					<?php if ('no' != $show_post_author_meta) : ?>
						<span class="post-user"><?php echo esc_html__('By:', 'techeduem'); ?> <?php the_author_posts_link(); ?></span>
					<?php endif ?>

					<?php if ('no' != $show_post_publish_date_meta) : ?>
						<span class="post-date"><?php echo get_the_time(get_option('date_format')); ?></span>
					<?php endif ?>

					<?php if ('no' != $show_post_updated_date_meta && '' != $show_post_updated_date_meta) : ?>
						<span class="post-updated-date"><?php echo the_modified_time(get_option('date_format')); ?></span>
					<?php endif ?>

					<?php if ('no' != $show_post_comments_meta) : ?>
						<span class="post-comments"><?php comments_popup_link(esc_html__('No Comments', 'techeduem'), esc_html__('1 Comment', 'techeduem'), esc_html__('% Comments', 'techeduem'), 'post-comment', esc_html__('Comments off', 'techeduem')); ?></span>
					<?php endif ?>

					<?php if ('no' != $show_post_categories_meta && '' != $show_post_categories_meta) : ?>
						<span class="post-categories"><?php the_category(', '); ?></span>
					<?php endif ?>

					<?php if ('no' != $show_post_tags_meta && '' != $show_post_tags_meta) : ?>
						<?php if (has_tag()) : ?>
							<span class="post-tags"><?php the_tags(' ', ', '); ?> </span>
						<?php endif ?>
					<?php endif ?>

				</div>
			<?php endif ?>
			<!-- End Blog Meta  -->
			<?php
			techeduem_post_excerpt();
			wp_link_pages(array(
				'before'      => '<div class="pagination"><span class="page-links-title">' . esc_html__('Pages:', 'techeduem') . '</span>',
				'after'       => '</div>',
				'pagelink'    => '<span class="screen-reader-text">' . esc_html__('Page', 'techeduem') . ' </span>%',
			));
			?>
			<?php
			$techeduem_opt = techeduem_get_opt();
			$enable_readmore_btn = (isset($techeduem_opt['techeduem_enable_readmore_btn'])) ? $techeduem_opt['techeduem_enable_readmore_btn'] : '';
			if ('' != $enable_readmore_btn && 'no' != $enable_readmore_btn) : ?>
				<div class="read-more">
					<a href="<?php the_permalink(); ?>"><?php techeduem_read_more(); ?></a>
				</div>
			<?php endif ?>
		</div>
	</article>
</div>