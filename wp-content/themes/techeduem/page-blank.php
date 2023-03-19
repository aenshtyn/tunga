<?php

/**
 * Template Name: Blank Template
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package techeduem
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php echo esc_attr(get_bloginfo('charset')) ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

	<?php wp_head(); ?>

</head>

<body <?php body_class('blank-page'); ?>>
	<div class="blank-page-wrapper clear">
		<?php
		while (have_posts()) : the_post();
			the_content();
		endwhile; // End of the loop.
		?>
	</div><!-- #primary -->
	<?php wp_footer(); ?>
</body>

</html>