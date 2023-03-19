<?php

/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package techeduem
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('blog-post'); ?>>

	<?php
	$quote_cite = get_post_meta(get_the_ID(), '_techeduem_city_text', true);
	?>
	<?php if ($quote_cite) : ?>
		<div class="blog-quote techeduem_quote blog-content">
			<blockquote>
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
				<?php if ($quote_cite) : ?>
					<footer>
						<cite><?php echo esc_html($quote_cite); ?></cite>
					</footer>
				<?php endif ?>
			</blockquote>
		</div>
	<?php else : ?>
		<div class="blog-quote default__quote ">
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
		</div>
	<?php endif ?>

</article>