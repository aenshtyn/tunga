<?php

/**
 * This partial is used for displaying the Blog page title.
 *
 * @package techeduem
 */

$techeduem_opt = techeduem_get_opt();

if ($techeduem_blog_title_position = isset($techeduem_opt['techeduem_blog_title_position']) ? $techeduem_opt['techeduem_blog_title_position'] : '') {
	$blog_title_classes[] = $techeduem_blog_title_position;
} else {
	$blog_title_classes[] = 'text-center';
}

$techeduem_blog_title_full_width = (isset($techeduem_opt['techeduem_blog_title_full_width'])) ? $techeduem_opt['techeduem_blog_title_full_width'] : '';
if ('no' != $techeduem_blog_title_full_width) {
	$blog_title_wrap_container = 'container-fluid';
} else {
	$blog_title_wrap_container = 'container';
}
$enable_blog_title = (isset($techeduem_opt['techeduem_enable_blog_title'])) ? $techeduem_opt['techeduem_enable_blog_title'] : '';
$enable_blog_subtitle = (isset($techeduem_opt['techeduem_enable_blog_subtitle'])) ? $techeduem_opt['techeduem_enable_blog_subtitle'] : '';
$enable_blog_page_title_wrap = (isset($techeduem_opt['techeduem_blog_title_bar'])) ? $techeduem_opt['techeduem_blog_title_bar'] : '';

?>

<?php if ('hide' != $enable_blog_page_title_wrap) : ?>

	<section class="page__title__wrapper blog-page <?php echo join(' ', $blog_title_classes) ?>">
		<div class="<?php echo esc_attr($blog_title_wrap_container); ?>">
			<div class="row">
				<div class="col-md-12">
					<div class="page__title__inner">
						<?php if ('no' != $enable_blog_title) : ?>
							<h1 class="page-title"><?php techeduem_blog_header(); ?></h1>
						<?php endif ?>

						<?php if ('no' != $enable_blog_subtitle) : ?>
							<?php if (!empty($techeduem_opt['techeduem_blog_subtitle'])) : ?>
								<p><?php echo esc_html($techeduem_opt['techeduem_blog_subtitle']); ?></p>
							<?php endif ?>
						<?php endif ?>

					</div>
				</div>
			</div>
		</div>
	</section>

<?php endif ?>