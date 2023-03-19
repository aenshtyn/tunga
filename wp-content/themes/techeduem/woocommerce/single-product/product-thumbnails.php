<?php

/**
 * Single Product Thumbnails
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-thumbnails.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.5.1
 */

defined('ABSPATH') || exit;

// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
if (!function_exists('wc_get_gallery_image_html')) {
    return;
}

global $product, $post;

$attachment_ids = $product->get_gallery_image_ids();
?>

<ul id="pro-thumb-img" class="pro-thumb-img mt-10">

    <?php
    if (has_post_thumbnail()) {
    ?>
        <li>
            <?php
            echo sprintf('<a href="#" data-image="%s" data-zoom-image="%s" >%s</a>', get_the_post_thumbnail_url($post->ID, 'woocommerce_single'), get_the_post_thumbnail_url($post->ID, 'full'), get_the_post_thumbnail($post->ID, 'shop_thumbnail'));
            ?>
        </li>
    <?php
    }

    if ($attachment_ids && has_post_thumbnail()) {
        $i = 1;
        foreach ($attachment_ids as $attachment_id) {
            $i++;
            $full_size_image = wp_get_attachment_image_src($attachment_id, 'full');
            $thumbnail       = wp_get_attachment_image_src($attachment_id, 'shop_thumbnail');
            $image_title     = get_post_field('post_excerpt', $attachment_id);

            $attributes = array(
                'title'                   => $image_title,
                'data-src'                => $full_size_image[0],
                'data-large_image'        => $full_size_image[0],
                'data-large_image_width'  => $full_size_image[1],
                'data-large_image_height' => $full_size_image[2],
            );

            $html  = '<li>';
            $html .= sprintf('<a href="#" data-image="%s" data-zoom-image="%s" >%s</a>', wp_get_attachment_image_url($attachment_id, 'woocommerce_single'), wp_get_attachment_image_url($attachment_id, 'full'), wp_get_attachment_image($attachment_id, $thumbnail, false, $attributes));
            $html .= '</li>';

            echo apply_filters('woocommerce_single_product_image_thumbnail_html', $html, $attachment_id);
        }
    }
    ?>

</ul>