<?php

/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.5.1
 */

defined('ABSPATH') || exit;

// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
if (!function_exists('wc_get_gallery_image_html')) {
	return;
}

global $post, $product;

$columns           = apply_filters('woocommerce_product_thumbnails_columns', 4);
$post_thumbnail_id = $product->get_image_id();
$wrapper_classes   = apply_filters('woocommerce_single_product_image_gallery_classes', array(
	'woocommerce-product-gallery',
	'woocommerce-product-gallery--' . (has_post_thumbnail() ? 'with-images' : 'without-images'),
	'woocommerce-product-gallery--columns-' . absint($columns),
	'images',
));


$thumbnail_size    = apply_filters('woocommerce_product_thumbnails_large_size', 'full');
$full_size_image   = wp_get_attachment_image_src($post_thumbnail_id, $thumbnail_size);
$placeholder       = has_post_thumbnail() ? 'with-images' : 'without-images';


$attachment_ids = $product->get_gallery_image_ids();
?>
<div class="<?php echo esc_attr(implode(' ', array_map('sanitize_html_class', $wrapper_classes))); ?>" data-columns="<?php echo esc_attr($columns); ?>" style="opacity: 0; transition: opacity .25s ease-in-out;">

	<?php
	if (has_post_thumbnail()) {
		$html  = '<div class="pro-large-img fix"><div class="woocommerce-product-gallery__image">';
		$html .= get_the_post_thumbnail($post->ID, 'woocommerce_single', array('class' => 'product-zoom', 'data-zoom-image' =>  get_the_post_thumbnail_url($post->ID, 'full')));
		$html .= '</div></div>';
	} else {
		$html  = '<div class="pro-large-img mb-10 fix"><div class="woocommerce-product-gallery__image--placeholder">';
		$html .= sprintf('<img src="%s" alt="%s" data-zoom-image="%s" class="product-zoom wp-post-image" />', esc_url(wc_placeholder_img_src()), esc_html__('Awaiting product image', 'techeduem'), esc_url(wc_placeholder_img_src()));
		$html .= '</div></div>';
	}

	echo apply_filters('woocommerce_single_product_image_thumbnail_html', $html, $post_thumbnail_id);
	?>

	<?php do_action('woocommerce_product_thumbnails'); ?>
</div>