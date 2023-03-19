<?php

/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined('ABSPATH') || exit;

global $product;

// Ensure visibility.
if (empty($product) || !$product->is_visible()) {
    return;
}

$columns = round(12 / wc_get_loop_prop('columns'));

$techeduem_opt = techeduem_get_opt();
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
        $columns = 4;
        break;
    case 'right':
        $columns = 4;
        break;
    default:
        $columns = $columns;
}

if (!is_active_sidebar('sidebar-category')) {
    $columns = round(12 / wc_get_loop_prop('columns'));
}

// Product layout style
$shop_product_style = 1;
if (isset($techeduem_opt['product_shop_page_layout']) && $techeduem_opt['product_shop_page_layout'] != '') {
    $shop_product_style = $techeduem_opt['product_shop_page_layout'];
}


?>
<div class="col-lg-<?php echo esc_attr($columns); ?> col-md-6 mb-30">
    <div <?php wc_product_class(); ?>>

        <div class="shop-product-items product-item bg-gray <?php if ($shop_product_style == 3) {
                                                                echo 'product_style_three';
                                                            } ?> ">
            <div class="product-inner">

                <?php
                /**
                 * Hook: woocommerce_before_shop_loop_item.
                 *
                 * @hooked woocommerce_template_loop_product_link_open - 10
                 */
                do_action('woocommerce_before_shop_loop_item');
                ?>
                <div class="image-wrap">
                    <a href="<?php the_permalink(); ?>" class="image">
                        <?php
                        /**
                         * Hook: woocommerce_before_shop_loop_item_title.
                         *
                         * @hooked woocommerce_show_product_loop_sale_flash - 10
                         * @hooked woocommerce_template_loop_product_thumbnail - 10
                         */
                        do_action('woocommerce_before_shop_loop_item_title');
                        ?>
                    </a>

                    <?php
                    if ($shop_product_style == 1) {
                        if (function_exists('techeduem_add_to_wishlist_button')) {
                            echo techeduem_add_to_wishlist_button();
                        }
                    }
                    ?>

                    <?php if ($shop_product_style == 3) : ?>
                        <div class="product_information_area">

                            <?php
                            $attributes = $product->get_attributes();
                            if ($attributes) :
                                echo '<div class="product_attribute">';
                                foreach ($attributes as $attribute) :
                                    $name = $attribute->get_name();
                            ?>
                                    <ul>
                                        <?php
                                        echo '<li class="attribute_label">' . wc_attribute_label($attribute->get_name()) . esc_html__(':', 'techeduem') . '</li>';
                                        if ($attribute->is_taxonomy()) {
                                            global $wc_product_attributes;
                                            $product_terms = wc_get_product_terms($product->get_id(), $name, array('fields' => 'all'));
                                            foreach ($product_terms as $product_term) {
                                                $product_term_name = esc_html($product_term->name);
                                                $link = get_term_link($product_term->term_id, $name);
                                                $color = get_term_meta($product_term->term_id, 'color', true);
                                                if (!empty($wc_product_attributes[$name]->attribute_public)) {
                                                    echo '<li><a href="' . esc_url($link) . '" rel="tag">' . $product_term_name . '</a></li>';
                                                } else {
                                                    if (!empty($color)) {
                                                        echo '<li class="color_attribute" style="background-color: ' . $color . ';">&nbsp;</li>';
                                                    } else {
                                                        echo '<li>' . $product_term_name . '</li>';
                                                    }
                                                }
                                            }
                                        }
                                        ?>
                                    </ul>
                            <?php endforeach;
                                echo '</div>';
                            endif; ?>
                            <div class="actions style_two">
                                <?php
                                techeduem_template_loop_add_to_cart();
                                if (function_exists('techeduem_add_to_wishlist_button')) {
                                    echo techeduem_add_to_wishlist_button();
                                }
                                ?>
                                <a title="<?php esc_html_e('Quick View', 'techeduem'); ?>" data-toggle="modal" data-target="#exampleModal" data-quick-id="<?php the_ID(); ?>" class="action-eye quickview" href="javascript:void(0);">
                                    <img src="<?php echo get_template_directory_uri() . '/images/icons/quick-view-icon.png'; ?>" alt="<?php the_title(); ?>"></a>
                            </div>
                            <div class="content">
                                <h4 class="title"><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h4>
                                <?php woocommerce_template_loop_price(); ?>
                            </div>
                        </div>

                    <?php else : ?>
                        <div class="actions <?php if ($shop_product_style == 2) {
                                                echo 'style_two';
                                            } ?>">
                            <?php
                            if ($shop_product_style == 2) {
                                techeduem_template_loop_add_to_cart();
                                if (function_exists('techeduem_add_to_wishlist_button')) {
                                    echo techeduem_add_to_wishlist_button();
                                }
                            } else {
                                woocommerce_template_loop_add_to_cart();
                                if (function_exists('techeduem_compare_button')) {
                                    techeduem_compare_button();
                                }
                            }
                            ?>
                        </div>
                    <?php endif; ?>

                </div>
                <div class="content text-center">
                    <h4 class="title"><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h4>
                    <?php woocommerce_template_loop_price(); ?>
                </div>
                <?php

                /**
                 * Hook: woocommerce_shop_loop_item_title.
                 *
                 * @hooked woocommerce_template_loop_product_title - 10
                 */
                do_action('woocommerce_shop_loop_item_title');

                /**
                 * Hook: woocommerce_after_shop_loop_item_title.
                 *
                 * @hooked woocommerce_template_loop_rating - 5
                 * @hooked woocommerce_template_loop_price - 10
                 */
                do_action('woocommerce_after_shop_loop_item_title');

                /**
                 * Hook: woocommerce_after_shop_loop_item.
                 *
                 * @hooked woocommerce_template_loop_product_link_close - 5
                 * @hooked woocommerce_template_loop_add_to_cart - 10
                 */
                do_action('woocommerce_after_shop_loop_item');
                ?>
            </div>
        </div>

    </div>
</div>