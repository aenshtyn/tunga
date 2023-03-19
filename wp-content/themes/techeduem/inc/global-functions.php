<?php

/**
 * Techedu Global Function
 *
 * @package techeduem
 */

/**
 * Blog Header
 */
global $current_user, $woocommerce;
function techeduem_blog_header()
{
	$techeduem_opt = techeduem_get_opt();

	if (isset($techeduem_opt['techeduem_blog_text']) && !empty($techeduem_opt['techeduem_blog_text'])) {
		echo esc_html($techeduem_opt['techeduem_blog_text']);
	} else {
		esc_html_e('Blog', 'techeduem');
	}
}

/**
 * Single Blog Header
 */
function techeduem_blog_details_header()
{
	$techeduem_opt = techeduem_get_opt();

	if (isset($techeduem_opt['techeduem_blog_details_text'])) {
		if (get_post_type() == 'post') {
			echo esc_html($techeduem_opt['techeduem_blog_details_text']);
		} else {
			esc_html_e(ucfirst(get_post_type()) . ' Details', 'techeduem');
		}
	} else {
		if (get_post_type() == 'post') {
			esc_html_e('Blog Details', 'techeduem');
		} else {
			esc_html_e(ucfirst(get_post_type()) . '', 'techeduem');
		}
	}
}

/**
 * Register Post Excerpt Function
 */
function techeduem_post_excerpt()
{
	$techeduem_opt = techeduem_get_opt();

	if (isset($techeduem_opt['techeduem_excerpt_length'])) {
		echo wp_trim_words(get_the_excerpt(), $techeduem_opt['techeduem_excerpt_length'], '');
	} else {
		echo wp_trim_words(get_the_excerpt(), 29, '');
	}
}

/**
 * Register Blog Read More Button Text Function
 */
function techeduem_read_more()
{
	$techeduem_opt = techeduem_get_opt();
	$read_more_btn_content = (isset($techeduem_opt['techeduem_readmore_text'])) ? $techeduem_opt['techeduem_readmore_text'] : 'Read More';
	echo esc_html($read_more_btn_content);
}

/**
 * Panel View
 */
if (!function_exists('techeduem_panel_view')) :
	function techeduem_panel_view($to_id, $po_id, $set_value, $path = null)
	{
		$techeduem_opt = techeduem_get_opt();
		// Select header style type
		$techeduem_theme_panel_id = $techeduem_opt['techeduem_' . $to_id . ''];
		$techeduem_page_panel_id = get_post_meta(get_the_id(), '_techeduem_' . $po_id . '', true);

		if (!empty($techeduem_page_panel_id)) {
			if ($set_value == $techeduem_page_panel_id) {
				get_template_part('inc/' . $path . '/page-option-custom');
				return;
			} else {
				get_template_part('inc/' . $path . '/default');
				return;
			}
		} else {
			if (isset($techeduem_theme_panel_id)) {
				if ('custom' == $techeduem_theme_panel_id) {
					get_template_part('inc/' . $path . '/theme-option-custom');
					return;
				} else {
					get_template_part('inc/' . $path . '/default');
					return;
				}
			}
		}
	} // End Options View
endif;

/**
 * Start Get Theme Options
 */
if (!function_exists('techeduem_get_theme_option')) :

	function techeduem_get_theme_option($index = FALSE, $index2 = FALSE, $default = NULL)
	{
		$techeduem_opt = techeduem_get_opt();
		if (empty($index)) {
			return $techeduem_opt;
		}
		if ($index2) {
			$result = (isset($techeduem_opt[$index]) and isset($techeduem_opt[$index][$index2])) ? $techeduem_opt[$index][$index2] : $default;
		} else {
			$result = isset($techeduem_opt[$index]) ? $techeduem_opt[$index] : $default;
		}
		if ($result == '1' or $result == '0') {
			return $result;
		}
		if (is_string($result) and empty($result)) {
			return $default;
		}
		return $result;
	}

endif;

/**
 * Load Favicon 
 */
add_action('wp_head', 'techeduem_load_favicon');
function techeduem_load_favicon()
{

	$techeduem_favicon = techeduem_get_theme_option('techeduem_favicon', 'url', get_template_directory_uri() . '/favicon.ico');
?>

	<link rel="shortcut icon" href="<?php echo esc_url($techeduem_favicon); ?>" />
	<?php

	if ($techeduem_apple_favicon = techeduem_get_theme_option('techeduem_iphone_icon', 'url', get_template_directory_uri() . '/favicon.ico')) : ?>
		<!-- For iPhone -->
		<link rel="apple-touch-icon-precomposed" href="<?php echo esc_url($techeduem_apple_favicon); ?>">
	<?php endif;

	if ($techeduem_apple_favicon = techeduem_get_theme_option('techeduem_iphone_icon_retina', 'url', get_template_directory_uri() . '/favicon.ico')) : ?>
		<!-- For iPhone 4 Retina display -->
		<link rel="apple-touch-icon" sizes="114x114" href="<?php echo esc_url($techeduem_apple_favicon); ?>">
	<?php endif;

	if ($techeduem_apple_favicon = techeduem_get_theme_option('techeduem_ipad_icon', 'url', get_template_directory_uri() . '/favicon.ico')) : ?>
		<!-- For iPad -->
		<link rel="apple-touch-icon" sizes="72x72" href="<?php echo esc_url($techeduem_apple_favicon); ?>">
	<?php endif;

	if ($techeduem_apple_favicon = techeduem_get_theme_option('techeduem_ipad_icon_retina', 'url', get_template_directory_uri() . '/favicon.ico')) : ?>
		<!-- For iPad Retina display -->
		<link rel="apple-touch-icon" sizes="144x144" href="<?php echo esc_url($techeduem_apple_favicon); ?>">
	<?php endif;
}


/**
 * Login Page custom logo
 */
if (!function_exists('techeduem_custom_admin_login_logo')) {
	function techeduem_custom_admin_login_logo()
	{
		$techeduem_opt = techeduem_get_opt();
		$custom_login_logo = (isset($techeduem_opt['techeduem_custom_login_logo']['url'])) ? $techeduem_opt['techeduem_custom_login_logo']['url'] : '';

		if ('' != $custom_login_logo) {
			echo '<style type="text/css">
			    .login h1 a { background-image:url(' . $custom_login_logo . ') !important; background-size: auto !important; width: auto !important; height: 100px !important; background-position: center center; }
			</style>';
		}
	}
	add_action('login_head', 'techeduem_custom_admin_login_logo');
}

/**
 * Google Analytics
 */
add_action('wp_head', 'techeduem__google_analytics');
function techeduem__google_analytics()
{
	$techeduem_opt = techeduem_get_opt();
	$google_analytics = (isset($techeduem_opt['techeduem_ga_tracking_id'])) ? $techeduem_opt['techeduem_ga_tracking_id'] : '';
	?>
	<?php if ($google_analytics) : ?>
		<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo esc_js($google_analytics); ?>"></script>
		<script>
			window.dataLayer = window.dataLayer || [];

			function gtag() {
				dataLayer.push(arguments);
			}
			gtag('js', new Date());

			gtag('config', '<?php echo esc_js($google_analytics); ?>');
		</script>
	<?php endif; ?>

	<?php }

/**
 * Preloader
 */
add_action('techeduem_after_body', 'them_ename__preloader');
function them_ename__preloader()
{
	$techeduem_opt = techeduem_get_opt();
	$enable_preloader = (isset($techeduem_opt['techeduem_preloader_enable'])) ? $techeduem_opt['techeduem_preloader_enable'] : '';
	$preloader_style = (isset($techeduem_opt['techeduem_preloader_style'])) ? $techeduem_opt['techeduem_preloader_style'] : '';
	if ('' == $enable_preloader || 'no' === $enable_preloader) {
		return;
	}
	if ('style2' === $preloader_style) {
		get_template_part('inc/preloader/style2');
		return;
	} elseif ('style3' === $preloader_style) {
		get_template_part('inc/preloader/style3');
		return;
	}
	get_template_part('inc/preloader/default');
}




/**
 * Add quick icons to any template file by calling techedu_header_quick_icons()
 */
if (!function_exists('techedu_header_quick_icons')) {
	function techedu_header_quick_icons()
	{
		global $woocommerce;
		$techeduem_opt = techeduem_get_opt();
		$show_header_icons = isset($techeduem_opt['show_header_icons']) ? $techeduem_opt['show_header_icons'] : '';

		if (!$show_header_icons) return;

		$header_mini_c_show = isset($techeduem_opt['header_mini_cart']) ? $techeduem_opt['header_mini_cart'] : '';
		$techeduem_header_search_icon = isset($techeduem_opt['techeduem_header_search']) ? $techeduem_opt['techeduem_header_search'] : '';
		$header_right_menu = isset($techeduem_opt['header_right_menu_icon']) ? $techeduem_opt['header_right_menu_icon'] : '';
		ob_start();
	?>

		<!-- Header Advance Search Start -->
		<div class="header-shop-links mr-xs-50 mr-sm-50">
			<?php if ($header_mini_c_show) : ?>
				<div class="header-mini-cart">
					<?php
					if (class_exists('WooCommerce') && function_exists('techeduem_wc_shopping_cart')) {
						echo techeduem_wc_shopping_cart();
					}
					if (class_exists('WooCommerce')) :
					?>
						<a href="<?php echo esc_url(wc_get_cart_url()); ?>">
							<?php
							echo '<img src="' . get_template_directory_uri() . '/images/icons/cart-4.png" alt="' . esc_attr('Cart', 'techeduem') . '">';
							echo '<span class="mini_cart_count">' . esc_html($woocommerce->cart->get_cart_contents_count()) . '</span>';
							?>
						</a>
						<div class="widget_shopping_cart_content"></div>
					<?php endif; ?>
				</div>

			<?php endif; ?>
			<?php if ($techeduem_header_search_icon) : ?>
				<div class="header-search-icon">
					<button class="sidebar-trigger-search">
						<?php
						echo '<img src="' . get_template_directory_uri() . '/images/icons/search-icon.png" alt="' . esc_attr('Search', 'techeduem') . '">';
						?>
					</button>
				</div>
			<?php endif; ?>
			<?php if ($header_right_menu) : ?>
				<div class="header-menubar-icon">
					<a href="#">
						<?php
						echo '<img src="' . get_template_directory_uri() . '/images/icons/header-bar-icon.png" alt="' . esc_attr('Menu bar', 'techeduem') . '">';
						?>
					</a>
					<?php
					wp_nav_menu(array(
						'theme_location' => 'right-menu',
						'container'      => false,
						'fallback_cb'    => 'techeduem_fallback'
					));
					?>
				</div>
			<?php endif; ?>

		</div><!-- Header Advance Search End -->

	<?php

		return ob_get_clean();
	}
}


/**
 * Add quick icons to any template file by calling header_three_quick_icons()
 */
if (!function_exists('header_three_quick_icons')) {
	function header_three_quick_icons()
	{
		global $woocommerce;
		$techeduem_opt = techeduem_get_opt();
		$show_header_icons = isset($techeduem_opt['show_header_three_icons']) ? $techeduem_opt['show_header_three_icons'] : '';

		if (!$show_header_icons) return;

		$header_mini_c_show = isset($techeduem_opt['header_three_mini_cart']) ? $techeduem_opt['header_three_mini_cart'] : '';
		$header_user_icon = isset($techeduem_opt['techeduem_header_user_icon']) ? $techeduem_opt['techeduem_header_user_icon'] : '';
		ob_start();
	?>

		<div class="header-shop-links mr-xs-50 mr-sm-50">
			<?php if ($header_user_icon) : ?>
				<div class="header-account">
					<?php
					if (is_user_logged_in()) {
						if (class_exists('WooCommerce')) {
							echo '<a href="' . esc_url(get_permalink(get_option('woocommerce_myaccount_page_id'))) . '"><img src="' . get_template_directory_uri() . '/images/icons/user.png" alt="' . esc_attr('Account', 'techeduem') . '"></a>';
						} else {
							echo '<a href="' . esc_url(get_author_posts_url($current_user->ID)) . '"><img src="' . get_template_directory_uri() . '/images/icons/user.png" alt="' . esc_attr('Account', 'techeduem') . '"></a>';
						}
					} else {
						if (class_exists('WooCommerce')) {
							echo '<a href="' . esc_url(get_permalink(get_option('woocommerce_myaccount_page_id'))) . '"><img src="' . get_template_directory_uri() . '/images/icons/user.png" alt="' . esc_attr('Account', 'techeduem') . '"></a>';
						} else {
							echo '<a href="' . wp_login_url(get_permalink()) . '"><img src="' . get_template_directory_uri() . '/images/icons/user.png" alt="' . esc_attr('Account', 'techeduem') . '"></a>';
						}
					}
					?>
				</div>
			<?php endif; ?>
			<?php if ($header_mini_c_show) : ?>
				<div class="header-mini-cart">
					<?php
					if (class_exists('WooCommerce') && function_exists('techeduem_wc_shopping_cart')) {
						echo techeduem_wc_shopping_cart();
					}
					if (class_exists('WooCommerce')) :
					?>
						<a href="<?php echo esc_url(wc_get_cart_url()); ?>">
							<?php
							echo '<img src="' . get_template_directory_uri() . '/images/icons/cart.png" alt="' . esc_attr('Cart', 'techeduem') . '">';
							echo '<span class="mini_cart_count">' . esc_html($woocommerce->cart->get_cart_contents_count()) . '</span>';
							?>
						</a>
						<div class="widget_shopping_cart_content"></div>
					<?php endif; ?>
				</div>
			<?php endif; ?>

		</div><!-- Header Advance Search End -->

<?php

		return ob_get_clean();
	}
}
