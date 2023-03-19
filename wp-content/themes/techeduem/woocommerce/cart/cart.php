<?php

/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 7.0.1
 */

defined('ABSPATH') || exit;

wc_print_notices();

do_action('woocommerce_before_cart'); ?>

<form class="woocommerce-cart-form" action="<?php echo esc_url(wc_get_cart_url()); ?>" method="post">
	<?php do_action('woocommerce_before_cart_table'); ?>
	<div class="cart-table table-responsive mb-40">
		<table class="shop_table cart woocommerce-cart-form__contents" cellspacing="0">
			<thead>
				<tr>
					<th class="pro-thumbnail"><?php esc_html_e('Image', 'techeduem'); ?></th>
					<th class="pro-title"><?php esc_html_e('Product', 'techeduem'); ?></th>
					<th class="pro-price"><?php esc_html_e('Price', 'techeduem'); ?></th>
					<th class="pro-quantity"><?php esc_html_e('Quantity', 'techeduem'); ?></th>
					<th class="pro-subtotal"><?php esc_html_e('Total', 'techeduem'); ?></th>
					<th class="pro-remove"><?php esc_html_e('Remove', 'techeduem'); ?></th>
				</tr>
			</thead>
			<tbody>
				<?php do_action('woocommerce_before_cart_contents'); ?>

				<?php
				foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
					$_product   = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
					$product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);

					if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_cart_item_visible', true, $cart_item, $cart_item_key)) {
						$product_permalink = apply_filters('woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink($cart_item) : '', $cart_item, $cart_item_key);
				?>
						<tr class="woocommerce-cart-form__cart-item <?php echo esc_attr(apply_filters('woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key)); ?>">

							<td class="pro-thumbnail">
								<?php
								$thumbnail = apply_filters('woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key);

								if (!$product_permalink) {
									echo wp_kses_post($thumbnail);
								} else {
									printf('<a href="%s">%s</a>', esc_url($product_permalink), wp_kses_post($thumbnail));
								}
								?>
							</td>

							<td class="pro-title" data-title="<?php esc_attr_e('Product', 'techeduem'); ?>">
								<?php
								if (!$product_permalink) {
									echo wp_kses_post(apply_filters('woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key) . '&nbsp;');
								} else {
									echo wp_kses_post(apply_filters('woocommerce_cart_item_name', sprintf('<a href="%s">%s</a>', esc_url($product_permalink), $_product->get_name()), $cart_item, $cart_item_key));
								}

								do_action('woocommerce_after_cart_item_name', $cart_item, $cart_item_key);

								// Meta data.
								echo wc_get_formatted_cart_item_data($cart_item); // PHPCS: XSS ok.

								// Backorder notification.
								if ($_product->backorders_require_notification() && $_product->is_on_backorder($cart_item['quantity'])) {
									echo wp_kses_post(apply_filters('woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__('Available on backorder', 'techeduem') . '</p>'));
								}
								?>
							</td>

							<td class="pro-price" data-title="<?php esc_attr_e('Price', 'techeduem'); ?>">
								<?php
								echo apply_filters('woocommerce_cart_item_price', WC()->cart->get_product_price($_product), $cart_item, $cart_item_key); // PHPCS: XSS ok.
								?>
							</td>

							<td class="pro-quantity" data-title="<?php esc_attr_e('Quantity', 'techeduem'); ?>">
								<?php
								if ($_product->is_sold_individually()) {
									$product_quantity = sprintf('1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key);
								} else {
									$product_quantity = woocommerce_quantity_input(array(
										'input_name'   => "cart[{$cart_item_key}][qty]",
										'input_value'  => $cart_item['quantity'],
										'max_value'    => $_product->get_max_purchase_quantity(),
										'min_value'    => '0',
										'product_name' => $_product->get_name(),
									), $_product, false);
								}

								echo apply_filters('woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item); // PHPCS: XSS ok.
								?>
							</td>

							<td class="pro-subtotal" data-title="<?php esc_attr_e('Total', 'techeduem'); ?>">
								<?php
								echo apply_filters('woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal($_product, $cart_item['quantity']), $cart_item, $cart_item_key); // PHPCS: XSS ok.
								?>
							</td>
							<td class="pro-remove product-remove">
								<?php
								// @codingStandardsIgnoreLine
								echo apply_filters('woocommerce_cart_item_remove_link', sprintf(
									'<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s">&times;</a>',
									esc_url(wc_get_cart_remove_url($cart_item_key)),
									__('Remove this item', 'techeduem'),
									esc_attr($product_id),
									esc_attr($_product->get_sku())
								), $cart_item_key);
								?>
							</td>
						</tr>
				<?php
					}
				}
				?>

				<?php do_action('woocommerce_cart_contents'); ?>
				<?php do_action('woocommerce_after_cart_contents'); ?>
			</tbody>
		</table>
	</div>
	<?php do_action('woocommerce_after_cart_table'); ?>

	<div class="row">

		<div class="col-lg-8 col-md-7 col-12">

			<div class="cart-buttons mb-30">
				<button type="submit" class="button" name="update_cart" value="<?php esc_attr_e('Update cart', 'techeduem'); ?>"><?php esc_html_e('Update cart', 'techeduem'); ?></button>
				<a href="<?php echo get_permalink(wc_get_page_id('shop')); ?>"><?php esc_html_e('Continue Shopping', 'techeduem'); ?></a>
			</div>


			<?php if (wc_coupons_enabled()) { ?>
				<div class="cart-coupon mb-40">
					<h4><?php esc_html_e('Coupon:', 'techeduem'); ?></h4>
					<p><?php esc_html_e('Enter your coupon code if you have one.', 'techeduem'); ?></p>
					<div class="coupon cuppon-form">
						<input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="<?php esc_attr_e('Coupon code', 'techeduem'); ?>" />
						<button type="submit" class="button" name="apply_coupon" value="<?php esc_attr_e('Apply coupon', 'techeduem'); ?>"><?php esc_attr_e('Apply coupon', 'techeduem'); ?></button>
						<?php do_action('woocommerce_cart_coupon'); ?>
					</div>
				</div>
			<?php } ?>

			<?php do_action('woocommerce_cart_actions'); ?>
			<?php wp_nonce_field('woocommerce-cart', 'woocommerce-cart-nonce'); ?>

		</div>
		<div class="col-lg-4 col-md-5 col-12">
			<?php
			/**
			 * Cart collaterals hook.
			 *
			 * @hooked woocommerce_cross_sell_display
			 * @hooked woocommerce_cart_totals - 10
			 */
			do_action('woocommerce_cart_collaterals');
			?>
		</div>

	</div>

</form>

<div class="cart-collaterals">
	<?php woocommerce_cross_sell_display(); ?>
</div>

<?php do_action('woocommerce_after_cart'); ?>