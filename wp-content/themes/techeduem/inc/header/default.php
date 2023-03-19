<?php

/**
 * Default header template
 *
 * @package techeduem
 */

$techeduem_opt = techeduem_get_opt();

// Start Header Width Check
$techeduem_header_width = isset($techeduem_opt['techeduem_header_full_width']) ? $techeduem_opt['techeduem_header_full_width'] : '';
$techeduem_page_header_width = get_post_meta(get_the_id(), '_techeduem_header_full_width', true);
$header_width = '';
// Check page options
if (isset($techeduem_page_header_width) && !empty($techeduem_page_header_width)) {
	if ('yes' === $techeduem_page_header_width) {
		$header_width = 'container-fluid';
	} else {
		$header_width = 'container';
	}
} else {
	// Check theme options
	if ('' != $techeduem_header_width && true == $techeduem_header_width) {
		$header_width = 'container-fluid';
	} else {
		$header_width = 'container';
	}
} // End Header Width Check

// Header Sticky Class
$header_classes[] = '';
$techeduem_header_sticky = isset($techeduem_opt['techeduem_header_sticky']) ? $techeduem_opt['techeduem_header_sticky'] : '';
if (isset($techeduem_header_sticky) && true == $techeduem_header_sticky) {
	$header_classes[] = 'header-sticky';
}

// Header Transparent Class
$header_transparent = isset($techeduem_opt['techeduem_header_transparent']) ? $techeduem_opt['techeduem_header_transparent'] : '';


if (isset($header_transparent) && true == $header_transparent) {
	$header_classes[] = 'header-transparent';
}

/**
 * Select Menu
 */
$techeduem_selected_menu = '';
$techeduem_page_select_menu = get_post_meta(get_the_id(), '_techeduem_select_menu', true);
$techeduem_select_menu = isset($techeduem_opt['techeduem_select_menu']) ? $techeduem_opt['techeduem_select_menu'] : '';

if (!empty($techeduem_page_select_menu) && '0' != $techeduem_page_select_menu) {
	$techeduem_selected_menu = $techeduem_page_select_menu;
} else {
	if ('' != $techeduem_select_menu) {
		$techeduem_selected_menu = $techeduem_select_menu;
	}
}

$techeduem_header_search_icon = (isset($techeduem_opt['header_one_search_icon'])) ? $techeduem_opt['header_one_search_icon'] : '';

if (isset($techeduem_header_search_icon) && false == $techeduem_header_search_icon) {
	$header_classes[] = 'header-icon';
}

?>

<header class="header-default main-header clearfix <?php echo join(' ', $header_classes) ?>">
	<div class="header-area">
		<div class="<?php echo esc_attr($header_width); ?>">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

					<?php
					$techeduem_logo_position = isset($techeduem_opt['techeduem_logo_position']) ? $techeduem_opt['techeduem_logo_position'] : '';
					$techeduem_logo_position_value = '';
					if (isset($techeduem_logo_position)) {
						$techeduem_logo_position_value = $techeduem_logo_position;
					}
					$techeduem_fallback_logo = get_template_directory_uri() . '/images/logo.png';
					$techeduem_fallback_retina_logo = get_template_directory_uri() . '/images/logo2x.png';
					$techeduem_default_logo = techeduem_get_theme_option('techeduem_head_logo', 'url', $techeduem_fallback_logo);
					$techeduem_default_ratina_logo = techeduem_get_theme_option('techeduem_retina_default_logo', 'url', $techeduem_fallback_retina_logo);

					?>

					<div class="header-menu-wrap logo-<?php echo esc_attr($techeduem_logo_position_value); ?> ">
						<!-- Start Logo Wrapper  -->
						<div class="site-title">

							<?php if (isset($techeduem_opt['techeduem_logo_type'])) : ?>
								<a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'techeduem')); ?>" rel="home">
									<?php if ('image' == $techeduem_opt['techeduem_logo_type']) : ?>
										<img src="<?php echo esc_url($techeduem_default_logo); ?>" data-at2x="<?php echo esc_url($techeduem_default_ratina_logo); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
									<?php else : ?>
										<?php if ('text' == $techeduem_opt['techeduem_logo_type']) : ?>
											<?php echo esc_html($techeduem_opt['techeduem_logo_text']); ?>
										<?php endif ?>
									<?php endif ?>
								</a>
							<?php else : ?>

								<h3>
									<a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home">
										<?php if (isset($techeduem_opt['techeduem_logo_text']) ? $techeduem_opt['techeduem_logo_text'] : '') {
											echo esc_html($techeduem_opt['techeduem_logo_text']);
										} else {
											bloginfo('name');
										}
										?>
									</a>
								</h3>

								<?php $description = get_bloginfo('description', 'display');
								if ($description || is_customize_preview()) { ?>
									<p class="site-description"><?php echo esc_html($description); ?> </p>
								<?php } ?>
							<?php endif ?>

						</div>
						<!-- End Logo Wrapper -->
						<!-- Start Primary Menu Wrapper -->
						<div class="primary-nav-wrap nav-horizontal default-menu default-style-one <?php echo join(' ', $header_classes) ?>">
							<nav>
								<?php
								wp_nav_menu(array(
									'theme_location' => 'primary',
									'menu' 			 => $techeduem_selected_menu,
									'container'      => false,
									'fallback_cb'    => 'techeduem_fallback'
								));
								?>
							</nav>
							<?php if ('0' != $techeduem_header_search_icon && '' != $techeduem_header_search_icon) : ?>
								<div class="header-search-icon-default">
									<button class="sidebar-trigger-search">
										<?php
										echo '<i class="fa fa-search" aria-hidden="true"></i>';
										?>
									</button>
								</div>
							<?php endif ?>

						</div>
						<!-- End Primary Menu Wrapper -->
					</div>
				</div>
			</div>
			<!-- Mobile Menu  -->
			<div class="mobile-menu"></div>
		</div>
	</div>
</header>

<!-- main-search start -->
<div class="main-search-active">
	<div class="sidebar-search-icon">
		<button class="search-close"><?php echo esc_html__('x', 'techeduem'); ?></button>
	</div>
	<div class="sidebar-search-input">
		<form id="search" action="<?php echo esc_url(home_url('/')); ?>" method="GET">
			<div class="form-search">
				<input type="text" name="s" class="input-text" placeholder="<?php echo esc_attr_x('Search Here', 'placeholder', 'techeduem'); ?>" />
				<input type="hidden" name="post_type" value="product" />
				<button><?php echo '<img src="' . get_template_directory_uri() . '/images/icons/search-white.png" alt="' . esc_attr('Search', 'techeduem') . '">'; ?></button>
			</div>
		</form>
	</div>
</div>