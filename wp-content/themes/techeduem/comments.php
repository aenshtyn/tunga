<?php

/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package techeduem
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */

if (post_password_required()) {
	return;
}
?>

<div id="comments" class="comments-area">
	<div class="leave-comment-form">
		<?php
		if (have_comments()) :
			//We have comments
		?>

			<h2 class="comment-title sidebar-title">
				<?php
				printf(
					esc_html(_nx('One Comment on &ldquo;%2$s&rdquo;', '%1$s Comments on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'techeduem')),
					number_format_i18n(get_comments_number()),
					'<span>' . get_the_title() . '</span>'
				);
				?>
			</h2>

			<?php techeduem_get_post_navigation(); ?>
			<ol class="comment-list">
				<?php
				wp_list_comments('type=pingback&callback=techeduem_pingback');
				wp_list_comments('type=comment&callback=techeduem_comment');
				?>
			</ol>
			<?php techeduem_get_post_navigation(); ?>
			<?php
			if (!comments_open() && get_comments_number() && post_type_supports(get_post_type(), 'comments')) :
			?>
				<p class="no-comments"><?php esc_html_e('Comments are closed.', 'techeduem'); ?></p>

			<?php
			endif;
			?>

		<?php
		endif;
		?>
		<?php

		$fields = array(

			'author' =>
			'<div class="input_half left"><input id="author" name="author" type="text" placeholder=" ' . esc_attr__('Your Name *', 'techeduem') . ' " value="' . esc_attr($commenter['comment_author']) . '" required="required" /></div>',
			'email' =>
			'<div class="input_half right"><input id="email" name="email" class="input_half" placeholder=" ' . esc_attr__('Your Email *', 'techeduem') . ' " type="text" value="' . esc_attr($commenter['comment_author_email']) . '" required="required" /></div>',
			'url' =>
			'<input id="url" name="url" placeholder=" ' . esc_attr__('Your Website', 'techeduem') . ' " type="text" value="' . esc_attr($commenter['comment_author_url']) . '" />'

		);

		$args = array(

			'class_submit' => 'submit',
			'label_submit' => esc_html__('Submit Comment', 'techeduem'),
			'comment_field' =>
			'<textarea id="comment" name="comment" placeholder="' . esc_attr__('Comment *', 'techeduem') . '"  required="required"></textarea>',
			'fields' => apply_filters('comment_form_default_fields', $fields),
			'title_reply' => esc_html__('Leave a Comment', 'techeduem'),

		);

		comment_form($args);

		?>
	</div>
</div><!-- .comments-area -->