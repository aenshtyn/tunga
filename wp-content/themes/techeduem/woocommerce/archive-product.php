<?php

/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined('ABSPATH') || exit;

get_header('shop');

$techeduem_opt = techeduem_get_opt();
$shopcolclass = 'col-lg-12 col-12 mb-30';
$shopsidebarcolclass = 'col-lg-3 col-12';
$shoplayout = 'fullwidth';
if (isset($techeduem_opt['techeduem_shop_page_layout']) && $techeduem_opt['techeduem_shop_page_layout'] != '') {
	$shoplayout = $techeduem_opt['techeduem_shop_page_layout'];
}
if (isset($_GET['layout'])) {
	$shoplayout = htmlspecialchars($_GET['layout']);
} else {
	$shoplayout = $shoplayout;
}
// layout get
switch ($shoplayout) {
	case 'left':
		$shopcolclass = 'col-lg-9 col-12 mb-30 order-1 order-lg-2';
		$shopsidebarcolclass = 'col-lg-3 col-12 order-2 order-lg-1';
		break;
	case 'right':
		$shopcolclass = 'col-lg-9 col-12 mb-30';
		break;
	default:
		$shopcolclass = 'col-lg-12 col-12 mb-30';
}

if (!is_active_sidebar('sidebar-category')) {
	$shopcolclass = 'col-lg-12 col-12 mb-30';
}


/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action('woocommerce_before_main_content');

?>
<div class="woocommerce-products-header">
	<?php
	/**
	 * Hook: woocommerce_archive_description.
	 *
	 * @hooked woocommerce_taxonomy_archive_description - 10
	 * @hooked woocommerce_product_archive_description - 10
	 */
	do_action('woocommerce_archive_description');
	?>
</div>

<div class="product-section bg-white pt-60 pb-30 pt-xs-70 pb-xs-30">
	<div class="container">
		<div class="row">

			<div class="<?php echo esc_attr($shopcolclass); ?>">
				<?php
				if (have_posts()) {
					/**
					 * Hook: woocommerce_before_shop_loop.
					 *
					 * @hooked wc_print_notices - 10
					 * @hooked woocommerce_result_count - 20
					 * @hooked woocommerce_catalog_ordering - 30
					 */
					do_action('woocommerce_before_shop_loop');

					woocommerce_product_loop_start();

					if (wc_get_loop_prop('total')) {
						while (have_posts()) {
							the_post();

							/**
							 * Hook: woocommerce_shop_loop.
							 *
							 * @hooked WC_Structured_Data::generate_product_data() - 10
							 */
							do_action('woocommerce_shop_loop');

							wc_get_template_part('content', 'product');
						}
					}

					woocommerce_product_loop_end();

					/**
					 * Hook: woocommerce_after_shop_loop.
					 *
					 * @hooked woocommerce_pagination - 10
					 */
					do_action('woocommerce_after_shop_loop');
				} else {
					/**
					 * Hook: woocommerce_no_products_found.
					 *
					 * @hooked wc_no_products_found - 10
					 */
					do_action('woocommerce_no_products_found');
				}
				?>
			</div>
			<?php

			if (($shoplayout == 'right' || $shoplayout == 'left') && (is_active_sidebar('sidebar-category'))) {

				echo '<div class="' . esc_attr($shopsidebarcolclass) . '">';
				get_sidebar('category');
				echo '</div>';
			}
			/**
			 * Hook: woocommerce_sidebar.
			 *
			 * @hooked woocommerce_get_sidebar - 10
			 */
			do_action('woocommerce_sidebar');
			?>
		</div>
	</div>
</div>

<?php

/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action('woocommerce_after_main_content');

get_footer('shop');
