<?php
if (!class_exists('WooCommerce')) return;

// Add this theme support woocommerce
add_theme_support('woocommerce');

/*
     * Remove Action
     */
function techeduem_wc_remove_action()
{

    // Minicart Button
    remove_action('woocommerce_widget_shopping_cart_buttons', 'woocommerce_widget_shopping_cart_button_view_cart', 10);

    // shop page
    remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
    remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
    remove_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);
    remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);
    remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);
    remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);
    remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);
    remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);

    // Check if compare button is enabled and enabled in yith settings
    if (class_exists('YITH_Woocompare_Frontend') && get_option('yith_woocompare_compare_button_in_product_page') == 'yes') {
        global $yith_woocompare;
        if (!is_admin()) {
            remove_action('woocommerce_single_product_summary', array($yith_woocompare->obj, 'add_compare_link'), 35);
        }
    }

    // single product
    remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
    remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
    remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
    remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
    remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);

    // cart page
    remove_action('woocommerce_cart_collaterals', 'woocommerce_cross_sell_display');
}
add_action('init', 'techeduem_wc_remove_action');

/*
     * Add Action
     */
function techeduem_wc_add_action()
{
    // shop page
    add_action('woocommerce_before_shop_loop', 'techeduem_shop_header_before', 9);
    add_action('woocommerce_before_shop_loop', 'techeduem_shop_header_after', 31);

    // single product
    add_action('techeduemvarientpricepos', 'techeduem_variant_price_change_position');
}
add_action('init', 'techeduem_wc_add_action');

/*
     * Apply Filter
     */
function techeduem_wc_filtter()
{
    // single product page
    add_filter('yith_wcwl_positions', 'techeduem_hide_wishlist_from_single_product');
    add_filter('woocommerce_product_get_rating_html', 'techeduem_wc_get_rating_html', '', 3);
}
add_action('init', 'techeduem_wc_filtter');

// wishlist button hide
function techeduem_hide_wishlist_from_single_product($so_array = array())
{
    if (is_product()) {
        $so_array   =   array(
            "shortcode" => array("hook" => '', 'priority' => 0),
            "add-to-cart" => array("hook" => '', 'priority' => 0)
        );
    }
    return $so_array;
}

// WooCommerce image size
function techeduem_shop_page_image($size)
{
    return array(
        'width'  => 270,
        'height' => 310,
        'crop'   => 1,
    );
}
add_filter('woocommerce_get_image_size_thumbnail',  'techeduem_shop_page_image');


/*
     * customize rating html
     */
function techeduem_wc_get_rating_html($html, $rating, $count)
{
    global $product;
    if ($rating > 0) {
        $rating_whole = floor($rating);
        $rating_fraction = $rating - $rating_whole;
        $review_count = $product->get_review_count();
        $wrapper_class = is_single() ? 'rating-number' : 'top-rated-rating';
        ob_start();
?>

        <?php for ($i = 1; $i <= 5; $i++) {
            if ($i <= $rating_whole) {
                echo '<i class="fa fa-star"></i>';
            } else {
                if ($rating_fraction) {
                    echo '<i class="fa fa-star-half-o"></i>';
                } else {
                    echo '<i class="fa fa-star-o"></i>';
                }
            }
        } ?>

    <?php
        $html = ob_get_clean();
    } else {
        $html  = '';
    }
    return $html;
}

/* Price variation change */
function techeduem_variant_price_change_position()
{
    global $product;

    if ($product->is_type('variable')) :

        // Main Price
        $prices = array($product->get_variation_price('min', true), $product->get_variation_price('max', true));
        $price = $prices[0] !== $prices[1] ? sprintf(__('- %1$s', 'techeduem'), wc_price($prices[0])) : wc_price($prices[0]);

        // Sale Price
        $prices = array($product->get_variation_regular_price('min', true), $product->get_variation_regular_price('max', true));
        sort($prices);
        $saleprice = $prices[0] !== $prices[1] ? sprintf(__('%1$s', 'techeduem'), wc_price($prices[0])) : wc_price($prices[0]);

        if ($price !== $saleprice && $product->is_on_sale()) {
            $price = '<del>' . $saleprice . $product->get_price_suffix() . '</del> <ins>' . $price . $product->get_price_suffix() . '</ins>';
        }

    ?>
        <style>
            div.woocommerce-variation-price,
            div.woocommerce-variation-availability,
            div.hidden-variable-price {
                height: 0px !important;
                overflow: hidden;
                position: relative;
                line-height: 0px !important;
                font-size: 0% !important;
            }
        </style>
        <script>
            jQuery(document).ready(function($) {
                $('.variations select').blur(function() {
                    if ('' != $('input.variation_id').val()) {
                        $('p.price').html($('div.woocommerce-variation-price > span.price').html()).append('<p class="availability">' + $('div.woocommerce-variation-availability').html() + '</p>');
                        console.log($('input.variation_id').val());
                    } else {
                        $('p.price').html($('div.hidden-variable-price').html());
                        if ($('p.availability'))
                            $('p.availability').remove();
                        console.log('NULL');
                    }
                });
            });
        </script>
    <?php

        echo '<p class="price">' . $price . '</p>
            <div class="hidden-variable-price" >' . $price . '</div>';

    else :
        woocommerce_template_single_price();

    endif;
}


/*shop page header*/
if (!function_exists('techeduem_shop_header_before')) {
    function techeduem_shop_header_before()
    {
        echo '<div class="row"><div class="col-md-12">';
    }
}
if (!function_exists('techeduem_shop_header_after')) {
    function techeduem_shop_header_after()
    {
        echo '</div></div>';
    }
}

/*
     *Change the breadcrumb separator.
     */
function techeduem_wc_change_breadcrumb_delimiter($defaults)
{
    $techeduem_opt = techeduem_get_opt();
    $breadcrumbs_separator = '';
    if (isset($techeduem_opt['techeduem_breadcrumbs_separator'])) {
        $breadcrumbs_separator =  $techeduem_opt['techeduem_breadcrumbs_separator'];
    } else {
        $breadcrumbs_separator = "-";
    }
    $defaults['delimiter'] = $breadcrumbs_separator;
    return $defaults;
}
add_filter('woocommerce_breadcrumb_defaults', 'techeduem_wc_change_breadcrumb_delimiter');

/*
     * Related products limit
     */
function techeduem_related_products_limit($args)
{
    $techeduem_opt = techeduem_get_opt();
    if (isset($techeduem_opt['related_product_show'])) {
        $related_number = $techeduem_opt['related_product_show'];
    } else {
        $related_number = 4;
    }
    $args['posts_per_page'] = $related_number;
    return $args;
}
add_filter('woocommerce_output_related_products_args', 'techeduem_related_products_limit');

/*
     * Stock Availability check
     */
function techeduem_product_get_availability()
{
    global $product;
    $availability = $class = '';
    if ($product->managing_stock()) {
        if ($product->is_in_stock() && $product->get_stock_quantity() > get_option('woocommerce_notify_no_stock_amount')) {
            switch (get_option('woocommerce_stock_format')) {
                case 'no_amount':
                    $availability = esc_html__('In stock', 'techeduem');
                    break;
                case 'low_amount':
                    if ($product->get_stock_quantity() <= get_option('woocommerce_notify_low_stock_amount')) {
                        $availability = sprintf(esc_html__('Only %s left in stock', 'techeduem'), $product->get_stock_quantity());
                        if ($product->backorders_allowed() && $product->backorders_require_notification()) {
                            $availability .= ' ' . esc_html__('(can be backordered)', 'techeduem');
                        }
                    } else {
                        $availability = esc_html__('In stock', 'techeduem');
                    }
                    break;
                default:
                    $availability = sprintf(esc_html__('%s in stock', 'techeduem'), $product->get_stock_quantity());
                    if ($product->backorders_allowed() && $product->backorders_require_notification()) {
                        $availability .= ' ' . esc_html__('(can be backordered)', 'techeduem');
                    }
                    break;
            }
            $class        = 'in-stock';
        } elseif ($product->backorders_allowed() && $product->backorders_require_notification()) {
            $availability = esc_html__('Available on backorder', 'techeduem');
            $class        = 'available-on-backorder';
        } elseif ($product->backorders_allowed()) {
            $availability = esc_html__('In stock', 'techeduem');
            $class        = 'in-stock';
        } else {
            $availability = esc_html__('Out of stock', 'techeduem');
            $class        = 'out-of-stock';
        }
    } elseif (!$product->is_in_stock()) {
        $availability = esc_html__('Out of stock', 'techeduem');
        $class        = 'out-of-stock';
    }

    return array('availability' => $availability, 'class' => $class);
}

/*
     * product label
     */
if (class_exists('Redux')) {

    add_filter('woocommerce_sale_flash', 'techeduem_template_loop_product_label', '', 3);

    function techeduem_template_loop_product_label()
    {
        global $product, $post, $techeduem_opt;
        $reprice = get_post_meta(get_the_ID(), '_regular_price');
        $out_of_stock = false;
        $product_stock = techeduem_product_get_availability();
        if (isset($product_stock['class']) && $product_stock['class'] == 'out-of-stock') {
            $out_of_stock = true;
        }

        /* Sale label */
        if ($product->is_on_sale() && !$out_of_stock) {
            if ($product->get_regular_price() > 0 && $techeduem_opt['techeduem_show_sale_label_as'] != 'text') {
                $_off_percent = (1 - round($product->get_price() / $product->get_regular_price(), 2)) * 100;
                $_off_price = round($product->get_regular_price() - $product->get_price(), 0);
                $_price_symbol = get_woocommerce_currency_symbol();
                if ($techeduem_opt['techeduem_show_sale_label_as'] == 'number') {

                    $symbol_pos = get_option('woocommerce_currency_pos', 'left');
                    $price_display = '';
                    switch ($symbol_pos) {
                        case 'left':
                            $price_display = '-' . $_price_symbol . $_off_price;
                            break;
                        case 'right':
                            $price_display = '-' . $_off_price . $_price_symbol;
                            break;
                        case 'left_space':
                            $price_display = '-' . $_price_symbol . ' ' . $_off_price;
                            break;
                        default: /* right_space */
                            $price_display = '-' . $_off_price . ' ' . $_price_symbol;
                            break;
                    }

                    echo '<span class="onsale blue" data-original="' . $price_display . '">' . $price_display . '</span>';
                }
                if ($techeduem_opt['techeduem_show_sale_label_as'] == 'percent') {
                    echo '<span class="onsale">-' . $_off_percent . '%</span>';
                }
            } else {
                echo '<span class="onsale">' . esc_html(stripslashes($techeduem_opt['techeduem_product_sale_label_text'])) . '</span>';
            }
        }
    }
}

/*
     * Product shere link
     */
function techeduem_woocommerce_single_product_sharing()
{
    $product_title  = get_the_title();
    $product_url    = get_permalink();
    $product_img    = wp_get_attachment_url(get_post_thumbnail_id());

    $facebook_url   = 'https://www.facebook.com/sharer/sharer.php?u=' . $product_url;
    $twitter_url    = 'http://twitter.com/intent/tweet?status=' . rawurlencode($product_title) . '+' . $product_url;
    $pinterest_url  = 'http://pinterest.com/pin/create/bookmarklet/?media=' . $product_img . '&url=' . $product_url . '&is_video=false&description=' . rawurlencode($product_title);
    $gplus_url      = 'https://plus.google.com/share?url=' . $product_url;
    ?>
    <span class="product_shere_title"><?php echo esc_html('share :', 'techeduem'); ?></span>
    <a href="<?php echo esc_url($facebook_url); ?>"><i class="fa fa-facebook"></i></a>
    <a href="<?php echo esc_url($twitter_url); ?>"><i class="fa fa-twitter"></i></a>
    <a href="<?php echo esc_url($gplus_url); ?>"><i class="fa fa-google-plus"></i></a>
    <a href="<?php echo esc_url($pinterest_url); ?>"><i class="fa fa-pinterest"></i></a>
<?php
}

/*
     * Wishlist button
     */
function techeduem_add_to_wishlist_button()
{
    global $product;

    $output = '';

    if (class_exists('WishSuite_Base')) {

        $button_args = [
            'btn_text' => '<i class="fa fa-heart-o"></i>',
            'btn_added_text' => '<i class="fa fa-check"></i>',
            'btn_exist_text' => '<i class="fa fa-heart"></i>',
        ];

        add_filter('wishsuite_button_arg', function ($button_arg) use ($button_args) {

            $button_arg['button_text'] = $button_args['btn_text'];
            $button_arg['button_added_text'] = $button_args['btn_added_text'];
            $button_arg['button_exist_text'] = $button_args['btn_exist_text'];

            return $button_arg;
        }, 90, 1);

        $output .= '<div class="wishlist button-default yith-wcwl-add-to-wishlist">' . do_shortcode('[wishsuite_button]') . '</div>';
        return $output;
    } elseif (class_exists('YITH_WCWL') && !empty(get_option('yith_wcwl_wishlist_page_id'))) {

        global $yith_wcwl;

        $url          = YITH_WCWL()->get_wishlist_url();
        $product_type = $product->get_type();
        $exists       = $yith_wcwl->is_product_in_wishlist($product->get_id());
        $classes      = 'class="add_to_wishlist"';
        $add          = get_option('yith_wcwl_add_to_wishlist_text');
        $browse       = get_option('yith_wcwl_browse_wishlist_text');
        $added        = get_option('yith_wcwl_product_added_text');

        $output = '';

        $output  .= '<div class="wishlist button-default yith-wcwl-add-to-wishlist add-to-wishlist-' . esc_attr($product->get_id()) . '">';
        $output .= '<div class="yith-wcwl-add-button';
        $output .= $exists ? ' hide" style="display:none;"' : ' show"';
        $output .= '><a href="' . esc_url(htmlspecialchars(YITH_WCWL()->get_wishlist_url())) . '" data-product-id="' . esc_attr($product->get_id()) . '" data-product-type="' . esc_attr($product_type) . '" ' . $classes . ' ><i class="fa fa-heart-o"></i></a>';
        $output .= '<i class="fa fa-spinner fa-pulse ajax-loading" style="visibility:hidden"></i>';
        $output .= '</div>';

        $output .= '<div class="yith-wcwl-wishlistaddedbrowse hide" style="display:none;"><a class="" href="' . esc_url($url) . '"><i class="fa fa-heart"></i></a></div>';
        $output .= '<div class="yith-wcwl-wishlistexistsbrowse ' . ($exists ? 'show' : 'hide') . '" style="display:' . ($exists ? 'block' : 'none') . '"><a href="' . esc_url($url) . '" class=""><i class="fa fa-heart"></i></a></div>';
        $output .= '</div>';
        return $output;
    } else {
        return;
    }
}




/*
     * Compare button
     */
if (class_exists('YITH_Woocompare_Frontend')) {
    class techeduem_ComBtn extends YITH_Woocompare_Frontend
    {

        public function enqueue_scripts()
        {
            // scripts
            wp_enqueue_script('yith-woocompare-main', YITH_WOOCOMPARE_ASSETS_URL . '/js/woocompare.js', array('jquery'), $this->version, true);
            wp_localize_script('yith-woocompare-main', 'yith_woocompare', array(
                'ajaxurl'       => WC_AJAX::get_endpoint("%%endpoint%%"),
                'actionadd'     => $this->action_add,
                'actionremove'  => $this->action_remove,
                'actionview'    => $this->action_view,
                'added_label'   => '',
                'table_title'   => esc_html__('Product Comparison', 'techeduem'),
                'auto_open'     => get_option('yith_woocompare_auto_open', 'yes'),
                'loader'        => YITH_WOOCOMPARE_ASSETS_URL . '/images/loader.gif',
                'button_text'   => get_option('yith_woocompare_button_text')
            ));

            // colorbox
            wp_enqueue_style('jquery-colorbox', YITH_WOOCOMPARE_ASSETS_URL . '/css/colorbox.css');
            wp_enqueue_script('jquery-colorbox', YITH_WOOCOMPARE_ASSETS_URL . '/js/jquery.colorbox-min.js', array('jquery'), '1.4.21', true);

            // widget
            if (is_active_widget(false, false, 'yith-woocompare-widget', true) && !is_admin()) {
                wp_enqueue_style('yith-woocompare-widget', YITH_WOOCOMPARE_ASSETS_URL . '/css/widget.css');
            }
        }

        /**
         *  Add the link to compare
         */
        public function add_compare_link($product_id = false, $args = array())
        {
            extract($args);
            if (!$product_id) {
                global $product;
                $product_id = get_the_ID() ? get_the_ID() : 0;
            }
            // return if product doesn't exist
            if (empty($product_id) || apply_filters('yith_woocompare_remove_compare_link_by_cat', false, $product_id))
                return;
            $is_button = !isset($button_or_link) || !$button_or_link ? get_option('yith_woocompare_is_button') : $button_or_link;
            if (!isset($button_text) || $button_text == 'default') {
                $button_text = get_option('yith_woocompare_button_text', esc_html__('Compare', 'techeduem'));
                yit_wpml_register_string('Plugins', 'plugin_yit_compare_button_text', $button_text);
                $button_text = yit_wpml_string_translate('Plugins', 'plugin_yit_compare_button_text', $button_text);
                $button_text = '<img src="' . get_template_directory_uri() . '/images/icons/compare.png" alt="' . esc_html__('Compare', 'techeduem') . '">';
                $button_text = '<img src="' . get_template_directory_uri() . '/images/icons/compare.png" alt="' . esc_html__('Compare', 'techeduem') . '">';
            }
            printf('<a href="%s" class="%s" data-product_id="%d" rel="nofollow">%s</a>', $this->add_product_url($product_id), 'compare scom' . ($is_button == 'button' ? ' button' : ''), $product_id, $button_text);
        }

        /**
         * Show the html for the shortcode
         */
        public function compare_button_sc($atts, $content = null)
        {
            $atts = shortcode_atts(array(
                'product'   => false,
                'type'      => 'default',
                'container' => 'yes',
            ), $atts);

            $product_id = 0;
            /**
             * Retrieve the product ID in these steps:
             * - If "product" attribute is not set, get the product ID of current product loop
             * - If "product" contains ID, post slug or post title
             */
            if (!$atts['product']) {
                global $product;
                $product_id = get_the_ID() ? get_the_ID() : 0;
            } else {
                global $wpdb;
                $product = $wpdb->get_row($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE ID = %d OR post_name = %s OR post_title = %s LIMIT 1", $atts['product'], $atts['product'], $atts['product']));
                if (!empty($product)) {
                    $product_id = get_the_ID();
                }
            }
            // if product ID is 0, maybe the product doesn't exists or is wrong.. in this case, doesn't show the button
            if (empty($product_id)) return;
            ob_start();
            if ($atts['container'] == 'yes') echo '<div class="woocommerce product compare-button">';
            $this->add_compare_link($product_id, array(
                'button_or_link' => ($atts['type'] == 'default' ? false : $atts['type']),
                'button_text' => empty($content) ? 'default' : $content
            ));
            if ($atts['container'] == 'yes') echo '</div>';
            return ob_get_clean();
        }
    }
    new techeduem_ComBtn();
}


/*
     * add to cart button two
     */
function techeduem_template_loop_add_to_cart($args = array())
{

    global $product;
    if ($product) {
        $defaults = array(
            'quantity'   => 1,
            'class'      => implode(' ', array_filter(array(
                'button',
                'product_type_' . $product->get_type(),
                $product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
                $product->supports('ajax_add_to_cart') ? 'ajax_add_to_cart' : '',
            ))),
            'attributes' => array(
                'data-product_id'  => $product->get_id(),
                'data-product_sku' => $product->get_sku(),
                'aria-label'       => $product->add_to_cart_description(),
                'rel'              => 'nofollow',
            ),
        );

        $args = apply_filters('woocommerce_loop_add_to_cart_args', wp_parse_args($args, $defaults), $product);

        if (isset($args['attributes']['aria-label'])) {
            $args['attributes']['aria-label'] = strip_tags($args['attributes']['aria-label']);
        }
        wc_get_template('loop/add-to-cart-2.php', $args);
    }
}

/*
     * Ensure cart contents update when products are added to the cart via AJAX.
     */
function techeduem_wc_add_to_cart_fragment($fragments)
{
    ob_start();
?>
    <span class="mini_cart_count"><?php echo sprintf(wp_kses_post('%d', '%d', WC()->cart->get_cart_contents_count()), WC()->cart->get_cart_contents_count()); ?></sapn>
    <?php
    $fragments['span.mini_cart_count'] = ob_get_clean();
    return $fragments;
}
add_filter('woocommerce_add_to_cart_fragments', 'techeduem_wc_add_to_cart_fragment');

/*
     * Load mini cart on header.
     */
function techeduem_wc_render_mini_cart()
{
    $output = '';
    ob_start();
    $args['list_class'] = '';
    wc_get_template('cart/mini-cart.php');
    $output = ob_get_clean();

    $result = array(
        'message'    => WC()->session->get('wc_notices'),
        'cart_total' => WC()->cart->cart_contents_count,
        'cart_html'  => $output
    );
    echo json_encode($result);
    exit;
}
add_action('wp_ajax_load_mini_cart', 'techeduem_wc_render_mini_cart');
add_action('wp_ajax_nopriv_load_mini_cart', 'techeduem_wc_render_mini_cart');


/*
* Quickview
*/
//WooCommerce Ajax
add_action('wp_head', 'techeduem_woo_ajaxurl');
function techeduem_woo_ajaxurl()
{
    ?>
        <script type="text/javascript">
            var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
        </script>
    <?php
    // Enqueue variation scripts
    wp_enqueue_script('wc-add-to-cart-variation');
}
function techeduem_wc_quickview()
{
    // Get product from request.
    if (isset($_POST['data']) && (int) $_POST['data']) {
        global $post, $product, $woocommerce;
        $id      = (int) $_POST['data'];
        $post    = get_post($id);
        $product = get_product($id);
        if ($product) {
            include get_template_directory() . '/woocommerce/content-quickview-product.php';
        }
    }
    exit;
}
add_action('wp_ajax_techeduem_product_quickview', 'techeduem_wc_quickview');
add_action('wp_ajax_nopriv_techeduem_product_quickview', 'techeduem_wc_quickview');


    ?>