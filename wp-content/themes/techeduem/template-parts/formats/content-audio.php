<?php

/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package techeduem
 */

/**
 * Post Meta
 */
$techeduem_opt = techeduem_get_opt();

$enable_readmore_btn = (isset($techeduem_opt['techeduem_enable_readmore_btn'])) ? $techeduem_opt['techeduem_enable_readmore_btn'] : '';

$show_post_publish_date_meta = (isset($techeduem_opt['techeduem_show_post_publish_date_meta'])) ? $techeduem_opt['techeduem_show_post_publish_date_meta'] : '';
$show_post_updated_date_meta = (isset($techeduem_opt['techeduem_show_post_updated_date_meta'])) ? $techeduem_opt['techeduem_show_post_updated_date_meta'] : '';
$show_post_categories_meta = (isset($techeduem_opt['techeduem_show_post_categories_meta'])) ? $techeduem_opt['techeduem_show_post_categories_meta'] : '';
$show_post_tags_meta = (isset($techeduem_opt['techeduem_show_post_tags_meta'])) ? $techeduem_opt['techeduem_show_post_tags_meta'] : '';
$show_post_comments_meta = (isset($techeduem_opt['techeduem_show_post_comments_meta'])) ? $techeduem_opt['techeduem_show_post_comments_meta'] : '';
$show_post_author_meta = (isset($techeduem_opt['techeduem_show_post_author_meta'])) ? $techeduem_opt['techeduem_show_post_author_meta'] : '';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('singel_blog_items'); ?>>

	<div class="blog-item">

		<?php $audio_url = esc_url(get_post_meta(get_the_ID(), '_techeduem_audio_url', true)); ?>

		<?php if ($audio_url) : ?>
			<div class="blog-audio embed-responsive embed-responsive-16by9 mb-20">
				<?php echo wp_oembed_get($audio_url); ?>
			</div>
		<?php endif ?>

		<div class="content">
			<h3 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

			<?php if ('no' != $show_post_publish_date_meta || 'no' != $show_post_updated_date_meta || 'no' != $show_post_author_meta || 'no' != $show_post_comments_meta || 'no' != $show_post_categories_meta || 'no' != $show_post_tags_meta) : ?>

				<ul class="meta">
					<?php if ('no' != $show_post_author_meta) : ?>
						<li><?php echo esc_html__('By:', 'techeduem'); ?> <?php the_author_posts_link(); ?></li>
					<?php endif ?>

					<?php if ('no' != $show_post_publish_date_meta) : ?>
						<li><span><?php echo get_the_time(get_option('date_format')); ?></span></li>
					<?php endif ?>

					<?php if ('no' != $show_post_updated_date_meta && '' != $show_post_updated_date_meta) : ?>
						<li><span><?php echo the_modified_time(get_option('date_format')); ?></span></li>
					<?php endif ?>

					<?php if ('no' != $show_post_comments_meta) : ?>
						<li><?php comments_popup_link(esc_html__('No Comments', 'techeduem'), esc_html__('1 Comment', 'techeduem'), esc_html__('% Comments', 'techeduem'), 'post-comment', esc_html__('Comments off', 'techeduem')); ?></li>
					<?php endif ?>

					<?php if ('no' != $show_post_categories_meta && '' != $show_post_categories_meta) : ?>
						<li><span class="post-categories"><?php the_category(', '); ?></span></li>
					<?php endif ?>

					<?php if ('no' != $show_post_tags_meta && '' != $show_post_tags_meta) : ?>
						<?php if (has_tag()) : ?>
							<li><span class="post-tags"><?php the_tags(' ', ', '); ?> </span></li>
						<?php endif ?>
					<?php endif ?>

				</ul>

			<?php endif ?>

			<div class="desc">
				<?php
				techeduem_post_excerpt();
				wp_link_pages(array(
					'before'      => '<div class="pagination"><span class="page-links-title">' . esc_html__('Pages:', 'techeduem') . '</span>',
					'after'       => '</div>',
					'pagelink'    => '<span class="screen-reader-text">' . esc_html__('Page', 'techeduem') . ' </span>%',
				));
				?>
			</div>

			<?php
			if ('no' != $enable_readmore_btn) : ?>
				<a class="read-more" href="<?php the_permalink(); ?>"><?php techeduem_read_more(); ?></a>
			<?php endif ?>

		</div>

	</div>

</article>