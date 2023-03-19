<?php
/*
 * Techedu Main menu
 * Author: Hastech
 * Author URI: http://hastech.company
 * Version: 3.1.3
 * ======================================================
 */

global $techeduem_opt;

$header_width = isset($techeduem_opt['techeduem_header_full_width']) ? $techeduem_opt['techeduem_header_full_width'] : '';
if (isset($header_width) && true == $header_width) {
	$header_width = 'container-fluid';
} else {
	$header_width = 'container';
}
$techeduem_header_sticky_class = "";
$techeduem_header_sticky = isset($techeduem_opt['techeduem_header_sticky']) ? $techeduem_opt['techeduem_header_sticky'] : '';
if (isset($techeduem_header_sticky) && true == $techeduem_header_sticky) {
	$techeduem_header_sticky_class = "header-sticky";
}
$techeduem_header_transparent_class = "";
$techeduem_header_transparent = isset($techeduem_opt['techeduem_header_transparent']) ? $techeduem_opt['techeduem_header_transparent'] : '';
if (isset($techeduem_header_transparent) && true == $techeduem_header_transparent) {
	$techeduem_header_transparent_class = "header-transparent";
}

?>
<div class="header-area <?php echo esc_attr($techeduem_header_sticky_class); ?> <?php echo esc_attr($techeduem_header_transparent_class); ?>  ">
	<div class="<?php echo esc_attr($header_width); ?>">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

				<?php
				$techeduem_logo_position = isset($techeduem_opt['techeduem_logo_position']) ? $techeduem_opt['techeduem_logo_position'] : '';
				$techeduem_logo_position_value = '';
				if (isset($techeduem_logo_position)) {
					$techeduem_logo_position_value = $techeduem_logo_position;
				}
				?>

				<div class="header-menu-wrap logo-<?php echo esc_attr($techeduem_logo_position_value); ?> ">
					<div class="site-logo">
						<?php
						if (isset($techeduem_opt['techeduem_head_logo']['url']) ? $techeduem_opt['techeduem_head_logo']['url'] : '') {
						?>
							<a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'techeduem')); ?>" rel="home">
								<?php if ($techeduem_opt['techeduem_main_logo'] == '1') { ?>
									<img src="<?php echo esc_url($techeduem_opt['techeduem_head_logo']['url']); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
								<?php } else {
									if ($techeduem_opt['techeduem_main_logo'] == '2') {
										echo esc_html($techeduem_opt['techeduem_logo_text']);
									}
								} ?>
							</a>
						<?php
						} else { ?>
							<h3> <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home">
									<?php if (isset($techeduem_opt['techeduem_logo_text']) ? $techeduem_opt['techeduem_logo_text'] : '') {
										echo esc_html($techeduem_opt['techeduem_logo_text']);
									} else {
										bloginfo('name');
									} ?>
								</a> </h3>
							<?php
							$description = get_bloginfo('description', 'display');
							if ($description || is_customize_preview()) : ?>
								<p class="site-description"><?php echo esc_html($description); /* WPCS: xss ok. */ ?></p>
						<?php
							endif;
						}
						?>
					</div>
					<div class="primary-nav-wrap nav-horizontal uppercase nav-effect-1">
						<nav>
							<?php
							wp_nav_menu(array(
								'theme_location' => 'primary',
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