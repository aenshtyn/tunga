<?php

/**
 * This partial is used for displaying the Page Title
 *
 * @package techeduem
 */

$techeduem_opt = techeduem_get_opt();

/** 
 * Page -> Page Title Options
 */
$techeduem_page_title_enable = get_post_meta(get_the_id(), '_techeduem_title_enable', true); // done
$techeduem_page_custom_title = get_post_meta(get_the_id(), '_techeduem_custom_title'); // done
$techeduem_page_title_typography = get_post_meta(get_the_id(), '_techeduem_title_typography');
$techeduem_page_sub_title_enable = get_post_meta(get_the_id(), '_techeduem_sub_title_enable');
$techeduem_page_custom_sub_title = get_post_meta(get_the_id(), '_techeduem_custom_sub_title');
$techeduem_page_sub_title_typography = get_post_meta(get_the_id(), '_techeduem_sub_title_typography');

/** 
 * Page -> Breadcrumbs Options
 */
$techeduem_page_breadcrumbs_enable = get_post_meta(get_the_id(), '_techeduem_breadcrumbs_enable');
$techeduem_page_breadcrumbs_enable_on_phone = get_post_meta(get_the_id(), '_techeduem_breadcrumbs_enable_on_phone');
$techeduem_page_breadcrumbs_separator = get_post_meta(get_the_id(), '_techeduem_breadcrumbs_separator');
$techeduem_page_breadcrumbs_typography = get_post_meta(get_the_id(), '_techeduem_breadcrumbs_typography');

/**
 * Theme -> Page Title Options
 */
$techeduem_theme_title_wrapper_enable = isset($techeduem_opt['techeduem_title_enable']) ? $techeduem_opt['techeduem_title_enable'] : '';
$techeduem_theme_title_typography = isset($techeduem_opt['techeduem_title_typography']) ? $techeduem_opt['techeduem_title_typography'] : '';
$techeduem_theme_sub_title_enable = isset($techeduem_opt['techeduem_sub_title_enable']) ? $techeduem_opt['techeduem_sub_title_enable'] : '';
$techeduem_theme_custom_sub_title = isset($techeduem_opt['techeduem_custom_sub_title']) ? $techeduem_opt['techeduem_custom_sub_title'] : '';
$techeduem_theme_sub_title_typography = isset($techeduem_opt['techeduem_sub_title_typography']) ? $techeduem_opt['techeduem_sub_title_typography'] : '';

/**
 * Theme -> Breadcrumbs Options
 */
if ($content_position = get_post_meta(get_the_id(), '_techeduem_title_wrapper_content_aligment', true)) {
	if ('text-default' != $content_position) {
		$page_title_classes[] = $content_position;
	} else {
		$page_title_classes[] = $techeduem_opt['techeduem_title_content_alignment'];
	}
} else {
	if ($techeduem_theme_title_content_alignment = isset($techeduem_opt['techeduem_title_content_alignment']) ? $techeduem_opt['techeduem_title_content_alignment'] : '') {
		$page_title_classes[] = isset($techeduem_theme_title_content_alignment) ? $techeduem_theme_title_content_alignment : '';
	} else {
		$page_title_classes[] = 'text-center';
	}
}


$twf_enable = 'container';
if (!empty(get_post_meta(get_the_id(), '_techeduem_title_wrapper_full_width', true)) && 'default' !== get_post_meta(get_the_id(), '_techeduem_title_wrapper_full_width', true)) {
	if ('yes' == get_post_meta(get_the_id(), '_techeduem_title_wrapper_full_width', true)) {
		$twf_enable = 'container-fluid';
	} else {
		$twf_enable = 'container';
	}
} else {
	if (isset($techeduem_opt['techeduem_title_wrap_fullwidth_enable']) && true == $techeduem_opt['techeduem_title_wrap_fullwidth_enable']) {
		$twf_enable = 'container-fluid';
	} else {
		$twf_enable = 'container';
	}
}

$page_brad = (isset($techeduem_opt['techeduem_breadcrumbs_content_blog'])) ? $techeduem_opt['techeduem_breadcrumbs_content_blog'] : '';

/**
 * Title Enable
 */
if (isset($techeduem_page_title_enable) && '' != $techeduem_page_title_enable) {
	if ('yes' == $techeduem_page_title_enable) {
		$title_enable = 'true';
	} else {
		$title_enable = 'false';
	}
} elseif ('' != $techeduem_theme_title_wrapper_enable) {
	if ('yes' ==  $techeduem_theme_title_wrapper_enable) {
		$title_enable = 'true';
	} else {
		$title_enable = 'false';
	}
} else {
	$title_enable = 'true';
}

/**
 * Custom Title
 */
$custom_title = '';
if (isset($techeduem_page_custom_title) && !empty($techeduem_page_custom_title)) {
	$custom_title = $techeduem_page_custom_title[0];
} elseif (isset($techeduem_opt['techeduem_custom_title']) && !empty($techeduem_opt['techeduem_custom_title'])) {
	$custom_title = $techeduem_opt['techeduem_custom_title'];
}
/**
 * Enable Sub Title 
 */
if (!empty($techeduem_page_sub_title_enable) && '' != $techeduem_page_sub_title_enable[0]) {
	if ('yes' == $techeduem_page_sub_title_enable[0]) {
		$sub_title_enable = 'true';
	} else {
		$sub_title_enable = 'false';
	}
} elseif (isset($techeduem_theme_sub_title_enable)) {
	if ('yes' ==  $techeduem_theme_sub_title_enable) {
		$sub_title_enable = 'true';
	} else {
		$sub_title_enable = 'false';
	}
} else {
	$sub_title_enable = 'false';
}

/**
 * Custom Sub Title
 */
$custom_sub_title = '';

if (isset($techeduem_page_custom_sub_title) && !empty($techeduem_page_custom_sub_title)) {
	$custom_sub_title = $techeduem_page_custom_sub_title[0];
} else {

	if (isset($techeduem_theme_custom_sub_title) && !empty($techeduem_theme_custom_sub_title)) {
		$custom_sub_title = $techeduem_theme_custom_sub_title;
	}
}

/**
 * Page Title Bar Height
 */
if ($title_wrapper_height = get_post_meta(get_the_id(), '_techeduem_title_wrapper_height', true)) {
	if ('default' != $title_wrapper_height) {
		$page_title_classes[] = $title_wrapper_height;
	} else {
		$page_title_classes[] = $techeduem_opt['techeduem_title_wrap_height'];
	}
} else {
	if ($title_wrapper_height_theme = isset($techeduem_opt['techeduem_title_wrap_height']) ? $techeduem_opt['techeduem_title_wrap_height'] : '') {
		$page_title_classes[] = isset($title_wrapper_height_theme) ? $title_wrapper_height_theme : '';
	} else {
		$page_title_classes[] = 'default-height';
	}
}

?>

<section class="page__title__wrapper <?php echo join(' ', $page_title_classes) ?>">
	<div class="<?php echo esc_attr($twf_enable); ?>">
		<div class="row">
			<div class="col-md-12">
				<div class="page__title__inner">
					<?php if ('false' != $title_enable) : ?>
						<!-- Start Enable Title -->
						<?php
						if (function_exists('is_woocommerce') && is_woocommerce()) {
						?>
							<h1 class="page-title"><?php woocommerce_page_title(); ?></h1>
							<?php
						} else {
							if (!empty($custom_title)) : ?>
								<!-- Start Custom Title  -->
								<h1 class="page-title"><?php echo wp_kses_post($custom_title); ?></h1>
							<?php else : ?>
								<h1 class="page-title"><?php wp_title(''); ?></h1>
						<?php endif;
						}
						?>
						<!-- End Custom Title  -->
					<?php endif ?>
					<!-- End Enable Title -->
					<?php if ('true' == $sub_title_enable) : ?>
						<!-- Start Enable Sub Title -->
						<div class="page-sub-title"><?php echo wp_kses_post($custom_sub_title); ?></div>
					<?php endif ?>
					<!-- End Enable Sub Title -->

					<?php if ('1' !== $page_brad) : ?>
						<div class="breadcrumbs_wrap breadcrumb-bottom">
							<?php
							switch ($page_brad) {
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