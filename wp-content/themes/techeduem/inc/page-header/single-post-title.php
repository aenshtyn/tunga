<?php

/**
 * This partial is used for displaying the Blog page title.
 *
 * @package techeduem
 */

$techeduem_opt = techeduem_get_opt();
/**
 * Blog Details Title Position
 */
if ($techeduem_blog_details_title_position = isset($techeduem_opt['techeduem_blog_details_title_position']) ? $techeduem_opt['techeduem_blog_details_title_position'] : '') {
	$single_post_title_classes[] = $techeduem_blog_details_title_position;
} else {
	$single_post_title_classes[] = 'text-center';
}
/**
 * Single Post Title Full Width 
 */
$techeduem_single_post_title_full_width = (isset($techeduem_opt['techeduem_single_post_title_full_width'])) ? $techeduem_opt['techeduem_single_post_title_full_width'] : '';

if ('no' != $techeduem_single_post_title_full_width) {
	$single_post_title_wrap_container = 'container-fluid';
} else {
	$single_post_title_wrap_container = 'container';
}

/** 
 * Page -> Page Title Options
 */

$techeduem_page_single_post_title_enable = get_post_meta(get_the_id(), '_techeduem_title_enable', true);

/**
 * Theme -> Page Title Options
 */
$techeduem_enable_single_post_title = isset($techeduem_opt['techeduem_enable_single_post_title']) ? $techeduem_opt['techeduem_enable_single_post_title'] : '';

/**
 * Title Enable
 */
if (isset($techeduem_page_single_post_title_enable) && '' != $techeduem_page_single_post_title_enable) {
	if ('yes' == $techeduem_page_single_post_title_enable) {
		$single_post_title_enable = 'true';
	} else {
		$single_post_title_enable = 'false';
	}
} elseif (isset($techeduem_enable_single_post_title)) {
	if ('none' !==  $techeduem_enable_single_post_title) {
		$single_post_title_enable = 'true';
	} else {
		$single_post_title_enable = 'false';
	}
} else {
	$single_post_title_enable = 'true';
}

/**
 * Custom Title
 */
$enable_single_post_subtitle = (isset($techeduem_opt['techeduem_enable_single_post_subtitle'])) ? $techeduem_opt['techeduem_enable_single_post_subtitle'] : '';
$single_post_brad = (isset($techeduem_opt['techeduem_enable_single_post_breadcrumb_wrap'])) ? $techeduem_opt['techeduem_enable_single_post_breadcrumb_wrap'] : '';
$enable_single_post_title_bar = (isset($techeduem_opt['techeduem_single_post_title_bar'])) ? $techeduem_opt['techeduem_single_post_title_bar'] : '';
$techeduem_page_title_enable = get_post_meta(get_the_id(), '_techeduem_title_enable'); // done
$techeduem_page_custom_title = get_post_meta(get_the_id(), '_techeduem_custom_title');
$enable_single_post_title = (isset($techeduem_opt['techeduem_enable_single_post_title'])) ? $techeduem_opt['techeduem_enable_single_post_title'] : '';

?>

<?php if ('hide' != $enable_single_post_title_bar) : ?>

	<section class="page__title__wrapper single-post <?php echo join(' ', $single_post_title_classes) ?>">
		<div class="<?php echo esc_attr($single_post_title_wrap_container); ?>">
			<div class="row">
				<div class="col-md-12">
					<div class="page__title__inner">
						<?php if ('false' != $single_post_title_enable) : ?>
							<!-- Start Enable Title -->
							<!-- Title -->
							<?php
							if (isset($techeduem_page_title_enable[0])) {
								if ('yes' == $techeduem_page_title_enable[0]) {
									if (isset($techeduem_page_custom_title[0]) && !empty($techeduem_page_custom_title[0])) {
							?> <h1 class="page-title"><?php echo esc_html($techeduem_page_custom_title[0]); ?></h1> <?php
																																																						} else {
																																																							if ('custom' == $enable_single_post_title) {
																																																							?> <h1 class="page-title"><?php techeduem_blog_details_header(); ?></h1> <?php
																																																							} elseif ('post_title' == $enable_single_post_title) {
																																																?> <h1 class="page-title"><?php wp_title(''); ?></h1> <?php
																																																							} elseif ('none' == $enable_single_post_title) {
																																																								// empty
																																																							} else {
																																						?> <h1 class="page-title"><?php techeduem_blog_details_header(); ?></h1> <?php
																																																							}
																																																						}
																																																					} else {
																																																						// empty
																																																					}
																																																				} elseif ('' != $enable_single_post_title &&  'none' != $enable_single_post_title) {
																																																					if ('custom' == $enable_single_post_title) {
																																																?> <h1 class="page-title"><?php techeduem_blog_details_header(); ?></h1> <?php
																																																					} elseif ('post_title' == $enable_single_post_title) {
																																														?> <h1 class="page-title"><?php wp_title(''); ?></h1> <?php
																																																					} else {
																																				?> <h1 class="page-title"><?php techeduem_blog_details_header(); ?></h1> <?php
																																																					}
																																																				} else {
																																																				}
																																														?>
						<?php endif ?>
						<!-- End Enable Title -->

						<!-- Subtitle -->
						<?php if ('no' != $enable_single_post_subtitle) : ?>
							<?php if (!empty($techeduem_opt['techeduem_single_post_subtitle'])) : ?>
								<p><?php echo esc_html($techeduem_opt['techeduem_single_post_subtitle']); ?></p>
							<?php endif ?>
						<?php endif ?>
						<!-- Breadcrumb Wrap -->
						<?php if ('1' !== $single_post_brad) : ?>
							<div class="breadcrumbs_wrap breadcrumb-bottom">
								<?php
								switch ($single_post_brad) {
									case '1':
										break;
									case '2':
										if (function_exists('is_woocommerce') && is_woocommerce()) {
											woocommerce_breadcrumb();
										} else {
											techeduem_breadcrumbs();
										}
										break;
									case '3':
								?>
										<!--- Breadcrumbs search start -->
										<div class="page-title-search-box">
											<form action="<?php echo esc_url(home_url('/')); ?>" method="GET">
												<input type="text" placeholder="<?php echo esc_attr_x('Search', 'placeholder', 'techeduem'); ?>" name="s">
												<button type="submit"> <i class="fa fa-search"></i> </button>
											</form>
										</div>
										<!--- Breadcrumbs search end -->
								<?php
										break;
									default:
										if (function_exists('is_woocommerce') && is_woocommerce()) {
											woocommerce_breadcrumb();
										} else {
											techeduem_breadcrumbs();
										}
										break;
								}
								?>
							</div>
						<?php endif ?>
					</div>
				</div>
			</div>
		</div>
	</section>

<?php endif ?>