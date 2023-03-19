<?php

/**
 * techeduem functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package techeduem
 */

if (!function_exists('techeduem_setup')) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function techeduem_setup()
	{
		/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on techeduem, use a find and replace
	 * to change 'techeduem' to the name of your theme in all the template files.
	 */
		load_theme_textdomain('techeduem', get_template_directory() . '/languages');

		// This theme styles the visual editor with editor-style.css to match the theme style.
		add_editor_style('css/editor-style.css');
		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
		add_theme_support('title-tag');

		/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
		add_theme_support('post-thumbnails');

		/**
		 * Add Image Size
		 */
		add_image_size('techeduem_size_1140X660', 1140, 660, true);
		add_image_size('techeduem_size_870X400', 870, 400, true);
		add_image_size('techeduem_size_270X390', 270, 390, true);
		add_image_size('techeduem_size_375X325', 375, 325, true);
		add_image_size('techeduem_size_300X300', 300, 300, true);
		add_image_size('techeduem_size_120X100', 120, 100, true);
		add_image_size('techeduem_size_420X260', 420, 260, true);
		add_image_size('techeduem_size_270X270', 270, 270, true);
		add_image_size('techeduem_size_384X500', 384, 500, true);

		/**
		 * This theme uses wp_nav_menu() in one location.
		 */
		register_nav_menus(array(
			'primary'        => esc_html__('Primary', 'techeduem'),
			'onepage'        => esc_html__('One Page Menu', 'techeduem'),
			'left-menu'      => esc_html__('Top Bar Left menu', 'techeduem'),
			'right-menu' 	 => esc_html__('Top Bar Right menu', 'techeduem'),
		));

		/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
		add_theme_support('html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		));


		/*
	 * Enable support for Post Formats.
	 */
		add_theme_support('post-formats', array(
			'link',
			'quote',
			'gallery',
			'audio',
			'video',
		));

		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');

		/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
	  */
		add_editor_style(array('/css/editor-style.css', techeduem_fonts_url()));

		// Load regular editor styles into the new block-based editor.
		add_theme_support('editor-styles');

		// Load default block styles.
		add_theme_support('wp-block-styles');

		// Add support for responsive embeds.
		add_theme_support('responsive-embeds');

		/**
		 * Set up the WordPress core custom background feature.
		 */
		add_theme_support('custom-background', apply_filters('techeduem_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		)));

		/**
		 * Add theme support for selective refresh for widgets.
		 */
		add_theme_support('customize-selective-refresh-widgets');
	}
endif;
add_action('after_setup_theme', 'techeduem_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */

if (!function_exists('techeduem_content_width')) {
	function techeduem_content_width()
	{
		$GLOBALS['content_width'] = apply_filters('techeduem_content_width', 640);
	}
}
add_action('after_setup_theme', 'techeduem_content_width', 0);

/**
 * Register custom fonts.
 */
if (!function_exists('techeduem_fonts_url')) :
	function techeduem_fonts_url()
	{
		$fonts_url = '';
		$fonts     = array();
		$subsets   = 'latin,latin-ext';

		/* translators: If there are characters in your language that are not supported by Open Sans, translate this to 'off'. Do not translate into your own language. */
		if ('off' !== _x('on', 'Source Sans Pro font: on or off', 'techeduem')) {
			$fonts[] = 'Source Sans Pro:400,600,700';
		}

		/* translators: If there are characters in your language that are not supported by Open Sans, translate this to 'off'. Do not translate into your own language. */
		if ('off' !== _x('on', 'Open Sans font: on or off', 'techeduem')) {
			$fonts[] = 'Open Sans:400,600,700,800';
		}

		/* translators: If there are characters in your language that are not supported by Open Sans, translate this to 'off'. Do not translate into your own language. */
		if ('off' !== _x('on', 'Pacifico font: on or off', 'techeduem')) {
			$fonts[] = 'Pacifico:400';
		}

		/* translators: If there are characters in your language that are not supported by Poppins, translate this to 'off'. Do not translate into your own language. */
		if ('off' !== _x('on', 'Playfair Display font: on or off', 'techeduem')) {
			$fonts[] = 'Playfair Display:400,700,900';
		}

		/* translators: If there are characters in your language that are not supported by Poppins, translate this to 'off'. Do not translate into your own language. */
		if ('off' !== _x('on', 'Poppins font: on or off', 'techeduem')) {
			$fonts[] = 'Poppins:400,700,500';
		}

		if ($fonts) {
			$fonts_url = add_query_arg(array(
				'family' => urlencode(implode('|', $fonts)),
				'subset' => urlencode($subsets),
			), 'https://fonts.googleapis.com/css');
		}

		return $fonts_url;
	}
endif;


/**
 * Enqueue scripts and styles.
 */
function techeduem_scripts()
{

	wp_enqueue_style('techeduem-font', techeduem_fonts_url());
	wp_enqueue_style('techeduem-geovana-font', get_template_directory_uri() . '/fonts/geovana/geovana.css');
	wp_enqueue_style('techeduem-billyohio-font', get_template_directory_uri() . '/fonts/billyohio/billyohio.css');
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');
	wp_enqueue_style('font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css');
	wp_enqueue_style('animate', get_template_directory_uri() . '/css/animate.css');
	wp_enqueue_style('slick', get_template_directory_uri() . '/css/slick.css');
	wp_enqueue_style('owl-carousels', get_template_directory_uri() . '/css/owl.carousel.min.css');
	wp_enqueue_style('mean-menu', get_template_directory_uri() . '/css/meanmenu.min.css');
	wp_enqueue_style('jquery-nice-select', get_template_directory_uri() . '/css/jquery-nice-select.css');
	wp_enqueue_style('techeduem-default-style', get_template_directory_uri() . '/css/theme-default.css');
	wp_enqueue_style('techeduem-blog-style', get_template_directory_uri() . '/css/blog-post.css');
	wp_enqueue_style('techeduem-helper-style', get_template_directory_uri() . '/css/helper.css');
	wp_enqueue_style('techeduem-main-style', get_template_directory_uri() . '/css/theme-style.css');
	wp_enqueue_style('techeduem-style', get_stylesheet_uri());
	wp_enqueue_style('techeduem-block-style', get_template_directory_uri() . '/css/blocks.css');
	wp_enqueue_style('techeduem-responsive', get_template_directory_uri() . '/css/responsive.css');

	wp_enqueue_script('popper', get_template_directory_uri() . '/js/popper.min.js', array('jquery'), '1.0.0', true);
	wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '4.0.0', true);
	wp_enqueue_script('imagesloaded');
	wp_enqueue_script('isotope', get_template_directory_uri() . '/js/isotope.pkgd.min.js', array('imagesloaded'), '3.0.3', true);
	wp_enqueue_script('slick', get_template_directory_uri() . '/js/slick.min.js', array('jquery'), '1.1.2', false);
	wp_enqueue_script('owl-carousels', get_template_directory_uri() . '/js/owl.carousel.min.js', array('jquery'), '2.2.1', true);
	wp_enqueue_script('jquery-elevatezoom', get_template_directory_uri() . '/js/jquery-elevatezoom.js', array('jquery'), '3.0.8', true);
	wp_enqueue_script('jquery-nice-select', get_template_directory_uri() . '/js/jquery-nice-select.js', array('jquery'), '1.0', true);
	wp_enqueue_script('countdown', get_template_directory_uri() . '/js/countdown.js', array('jquery'), '2.0.4', true);
	wp_enqueue_script('techeduem-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '', true);
	wp_enqueue_script('skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '', true);
	wp_enqueue_script('mean-menu', get_template_directory_uri() . '/js/jquery.meanmenu.min.js', array(), '', true);
	wp_enqueue_script('retina', get_template_directory_uri() . '/js/retina.min.js', array(), '1.3.0', true);
	wp_enqueue_script('onepage-nav', get_template_directory_uri() . '/js/jquery.onepage.nav.js', array(), '', true);
	wp_enqueue_script('techeduem-main', get_template_directory_uri() . '/js/main.js', array('jquery'), '1.0.0', true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'techeduem_scripts');

/**
 * Enqueue styles for the block-based editor.
 */
function techeduem_block_editor_styles()
{
	// Block styles.
	wp_enqueue_style('techeduem-block-editor-style', get_template_directory_uri() . '/css/editor-blocks.css', array(), '20181230');
	// Add custom fonts.
	wp_enqueue_style('techeduem-fonts', techeduem_fonts_url(), array(), null);
}
add_action('enqueue_block_editor_assets', 'techeduem_block_editor_styles');

// techeduem Company Info widget js
if (!function_exists('techeduem_media_scripts')) {
	function techeduem_media_scripts()
	{
		// wp_enqueue_style( 'techeduem-wp-admin', get_template_directory_uri() . '/css/admin-style.css', false, '1.0.0' );
		wp_enqueue_style('techeduem-metabox-expand', get_template_directory_uri() . '/css/metabox-expand.css', false, '1.0.0');
		wp_enqueue_style('font-awesome-admin', get_template_directory_uri() . '/css/font-awesome.min.css', false, '4.7.0');
		wp_enqueue_media();
		wp_enqueue_script('jquery-ui-tabs');
		wp_enqueue_script('techeduem-metabox-expand', get_template_directory_uri() . '/js/metabox-expand.js', false, '', true);
		wp_enqueue_style('wp-color-picker');
		wp_enqueue_script('wp-color-picker-alpha', get_template_directory_uri() . '/js/wp-color-picker-alpha.min.js', array('wp-color-picker'), '2.1.3', true);
		wp_enqueue_script('metabox-condition', get_template_directory_uri() . '/js/metabox-conditionals.js', array('jquery', 'cmb2-scripts'), '1.0.0', true);
		wp_enqueue_script('techeduem-logo-uploader', get_template_directory_uri() . '/js/site-logo-uploader.js', false, '', true);
		if (get_post_type() == 'post') {
			wp_enqueue_script('techeduem-post-formats', get_template_directory_uri() . '/js/post-formate.js', array(), '1.0.0', true);
		}
	}
}
add_action('admin_enqueue_scripts', 'techeduem_media_scripts');


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
/*
	Load options framework
*/
require get_template_directory() . '/inc/admin/option-framework.php';

/*
	Load metabox
*/
require get_template_directory() . '/inc/metabox/metabox.php';
/*
	Load breadcrumb
*/
require get_template_directory() . '/inc/page-header/breadcrumb.php';

/*
	Load widget
*/
require get_template_directory() . '/inc/widget-register.php';
/*
	Load custom function
*/
require get_template_directory() . '/inc/tgm-plugin/required-plugins.php';
/*
	Load global function
*/
require get_template_directory() . '/inc/global-functions.php';
/*
	Load woo config function
*/
require get_template_directory() . '/inc/woo-config.php';
/*
	Comment form
*/
require get_template_directory() . '/inc/comment-form.php';

/*
 Inline CSS form reduxframework
*/
require get_template_directory() . '/inc/dynamic-css.php';
/*
 CMB2 Tabs
*/
require get_template_directory() . '/inc/metabox-expand.php';

/*
 Demo Import file call
*/
require get_template_directory() . '/inc/demo-import.php';

/**
 * Blog Pagination 
 */
if (!function_exists('techeduem_blog_pagination')) {
	function techeduem_blog_pagination()
	{
?>
		<div class="post-pagination">
			<?php
			the_posts_pagination(array(
				'prev_text'          => '<i class="fa fa-angle-left"></i>',
				'next_text'          => '<i class="fa fa-angle-right"></i>',
				'type'               => 'list'
			)); ?>
		</div>
		<?php
	}
}

/**
 *  Convert Get Theme Option global to function
 */
if (!function_exists('techeduem_get_opt')) {
	function techeduem_get_opt()
	{
		global $techeduem_opt;
		return $techeduem_opt;
	}
}

/**
 * Get terms 
 */
function techeduem_get_terms_gb($term_type = null, $hide_empty = false)
{
	if (!isset($term_type)) {
		return;
	}
	$techeduem_custom_terms = array();
	$terms = get_terms($term_type, array('hide_empty' => $hide_empty));
	array_push($techeduem_custom_terms, esc_html__('--- Select ---', 'techeduem'));
	if (is_array($terms) && !empty($terms)) {
		foreach ($terms as $single_term) {
			if (is_object($single_term) && isset($single_term->name, $single_term->slug)) {
				$techeduem_custom_terms[$single_term->slug] = $single_term->name;
			}
		}
	}
	return $techeduem_custom_terms;
}

/**
 * Inline mobile menu
 */
if (!function_exists('techeduem_mobile_script')) {
	function techeduem_mobile_script()
	{
		$techeduem_opt = techeduem_get_opt();
		if (isset($techeduem_opt['techeduem_mobile_menu_width']) && !empty($techeduem_opt['techeduem_mobile_menu_width'])) {
			$techeduem_mobile_menu = $techeduem_opt['techeduem_mobile_menu_width'];
		} else {
			$techeduem_mobile_menu = 991;
		}

		$mobile_menu_arr = array(
			"menu_width" => "$techeduem_mobile_menu"
		);

		wp_localize_script("techeduem-main", "mobile_menu_data", $mobile_menu_arr);
	}
}
add_action("wp_enqueue_scripts", "techeduem_mobile_script", 100);

/**
 * Create Menu
 */
if (!function_exists('techeduem_fallback')) {
	function techeduem_fallback()
	{
		if (is_user_logged_in()) :
		?>
			<ul>
				<li><a href="<?php echo esc_url(admin_url('nav-menus.php')); ?>"><?php echo esc_html__('Create Menu', 'techeduem'); ?></a></li>
			</ul>
<?php endif;
	}
}

/**
 * Comment navigation
 */
function techeduem_get_post_navigation()
{
	if (get_comment_pages_count() > 1 && get_option('page_comments')) :
		require(get_template_directory() . '/inc/comment-nav.php');
	endif;
}

/**
 * Get Image ID Form Database
 */
function techeduem_get_image_id($image_url)
{
	global $wpdb;
	$attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url));
	return $attachment[0];
}
