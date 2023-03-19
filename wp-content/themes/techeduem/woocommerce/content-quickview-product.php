<?php

/**
 * The template for displaying product content in the content-quickview-product.php template
 *
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
global $quickview;
$quickview = true;
$attachment_ids = $product->get_gallery_image_ids();

?>

<div class="qwick-view-left">
    <div class="quick-view-learg-img">
        <div class="quick-view-tab-content tab-content">
            <?php
            $attributes = array(
                'title'                   => get_post_field('post_title', $post_thumbnail_id),
                'data-caption'            => get_post_field('post_excerpt', $post_thumbnail_id),
                'data-src'                => $full_size_image[0],
                'data-large_image'        => $full_size_image[0],
                'data-large_image_width'  => $full_size_image[1],
                'data-large_image_height' => $full_size_image[2],
            );

            if (has_post_thumbnail()) {
                $html  = '<div class="woocommerce-product-gallery__image tab-pane active show fade" id="pro-modal-view-1">';
                $html .= get_the_post_thumbnail($post->ID, 'woocommerce_single', $attributes);
                $html .= '</div>';
            } else {
                $html  = '<div class="woocommerce-product-gallery__image--placeholder tab-pane active show fade" id="pro-modal-view-1">';
                $html .= sprintf('<img src="%s" alt="%s" class="wp-post-image" />', esc_url(wc_placeholder_img_src()), esc_html__('Awaiting product image', 'techeduem'));
                $html .= '</div>';
            }

            echo apply_filters('woocommerce_single_product_image_thumbnail_html', $html, get_post_thumbnail_id($post->ID));

            if ($attachment_ids) {
                $loop       = 0;
                $i = 1;
                $columns    = apply_filters('woocommerce_product_thumbnails_columns', 3);

                foreach ($attachment_ids as $attachment_id) {
                    $i++;
                    echo '<div class="tab-pane fade" id="pro-modal-view-' . $i . '">';
                    $classes = array();

                    if ($loop == 0 || $loop % $columns == 0)
                        $classes[] = 'first';

                    if (($loop + 1) % $columns == 0)
                        $classes[] = 'last';

                    $image_link = wp_get_attachment_url($attachment_id);

                    $image = wp_get_attachment_image($attachment_id, apply_filters('single_product_large_thumbnail_size', 'shop_single'));
                    $image_class = esc_attr(implode(' ', $classes));
                    $image_title = esc_attr(get_the_title($attachment_id));

                    echo apply_filters('woocommerce_single_product_image_html', sprintf('%s', $image), $attachment_id, $post->ID, $image_class);

                    $loop++;
                    echo '</div>';
                }
            }
            ?>
        </div>
    </div>
    <div class="quick-view-list nav" role=tablist>
        <?php
        if (has_post_thumbnail()) {
        ?>
            <a class="active mr-12" href="#pro-modal-view-1" data-toggle="tab">
                <?php echo get_the_post_thumbnail($post->ID, 'shop_thumbnail'); ?>
            </a>
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

                $qclass_space = 'mr-12 mb-12';
                if ($i % 3 == 0) {
                    $qclass_space = 'mb-12';
                }

                $html  = '<a href="#pro-modal-view-' . $i . '" data-toggle="tab" class="' . $qclass_space . '">';
                $html .= wp_get_attachment_image($attachment_id, 'shop_thumbnail', false, $attributes);
                $html .= '</a>';

                echo apply_filters('woocommerce_single_product_image_thumbnail_html', $html, $attachment_id);
                if ($i == 3) {
                    break;
                }
            }
        }
        ?>
    </div>
</div>
<div class="qwick-view-right">
    <div class="qwick-view-content">
        <div class="content-quickview">
            <?php
            woocommerce_template_single_title();
            woocommerce_template_single_price();
            woocommerce_template_single_rating();
            woocommerce_template_single_excerpt();
            woocommerce_template_single_add_to_cart();
            woocommerce_template_single_meta();
            woocommerce_template_single_sharing();
            ?>
        </div><!-- .summary -->
    </div>
</div>