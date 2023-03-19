<?php
/*
	 * Techedu Main menu
	 * Author: Hastech
	 * Author URI: http://hastech.company
	 * Version: 3.1.3
	 * ======================================================
	 */

$techeduem_opt = techeduem_get_opt();

$header_width = $techeduem_opt['techeduem_header_full_width'];
if (isset($header_width) && true == $header_width) {
	$header_width = 'container-fluid';
} else {
	$header_width = 'container';
}

$techeduem_header_sticky_class = "";
$techeduem_header_sticky = $techeduem_opt['techeduem_header_sticky'];
if (isset($techeduem_header_sticky) && true == $techeduem_header_sticky) {
	$techeduem_header_sticky_class = "header-sticky";
}

$techeduem_header_transparent_class = "";
$techeduem_header_transparent = $techeduem_opt['techeduem_header_transparent'];
if (isset($techeduem_header_transparent) && true == $techeduem_header_transparent) {
	$techeduem_header_transparent_class = "header-transparent";
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

?>
<div class="header-area <?php echo esc_attr($techeduem_header_sticky_class); ?> <?php echo esc_attr($techeduem_header_transparent_class); ?>">
	<div class="<?php echo esc_attr($header_width); ?>">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

				<?php
				$techeduem_logo_position = $techeduem_opt['techeduem_logo_position'];
				$techeduem_logo_position_value = '';
				if (isset($techeduem_logo_position)) {
					$techeduem_logo_position_value = $techeduem_logo_position;
				}

				$techeduem_fallback_logo = get_template_directory_uri() . '/images/logo.png';
				$techeduem_fallback_retina_logo = get_template_directory_uri() . '/images/logo2x.png';
				$techeduem_default_logo = techeduem_get_theme_option('techeduem_head_logo', 'url', $techeduem_fallback_logo);
				$techeduem_default_ratina_logo = techeduem_get_theme_option('techeduem_retina_default_logo', 'url', $techeduem_fallback_retina_logo);
				var_dump($techeduem_default_logo);
				var_dump($techeduem_default_ratina_logo);

				?>
				<div class="header-menu-wrap logo-<?php echo esc_attr($techeduem_logo_position_value); ?> ">
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
									<?php if ($techeduem_opt['techeduem_logo_text']) {
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
					<div class="primary-nav-wrap primary-nav-one-page nav-horizontal uppercase nav-effect-1">
						<nav>
							<?php
							wp_nav_menu(array(
								'theme_location' => 'onepage',
								'menu' 			 => $techeduem_selected_menu,
								'container'      => false,
								'fallback_cb'    => 'techeduem_fallback'
							));
							?>
						</nav>
					</div>
				</div>
			</div>
		</div>
		<!-- Mobile Menu  -->
		<div class="mobile-menu"></div>
	</div>
</div>