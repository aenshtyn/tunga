<?php
/*
 * Techedu Main menu
 * Author: Hastech
 * Author URI: http://hastech.company
 * Version: 3.1.3
 * ======================================================
 */


global $current_user, $woocommerce;
$techeduem_opt = techeduem_get_opt();

$techeduem_header_width = isset($techeduem_opt['techeduem_header_full_width']) ? $techeduem_opt['techeduem_header_full_width'] : '';
$techeduem_page_header_width = get_post_meta(get_the_id(), '_techeduem_header_full_width', true);
$header_width = '';
// Check page options
if (isset($techeduem_page_header_width) && !empty($techeduem_page_header_width)) {
    if ('yes' === $techeduem_page_header_width) {
        $header_width = 'container-fluid';
    } else {
        $header_width = 'container';
    }
} else {
    // Check theme options
    if ('' != $techeduem_header_width && true == $techeduem_header_width) {
        $header_width = 'container-fluid';
    } else {
        $header_width = 'container';
    }
} // End Header Width Check

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

/**
 * Select Menu
 */
$techeduem_selected_menu = '';
$techeduem_page_select_menu = get_post_meta(get_the_id(), '_techeduem_select_menu', true);
$techeduem_select_menu = isset($techeduem_opt['techeduem_select_menu']) ? $techeduem_opt['techeduem_select_menu'] : '';

if (!empty($techeduem_page_select_menu) && '0' != $techeduem_page_select_menu) {
    $techeduem_selected_menu = $techeduem_page_select_menu;
} else {
    if ('' != $techeduem_select_menu) {
        $techeduem_selected_menu = $techeduem_select_menu;
    }
}


?>

<!-- Header Section Start -->
<div class="header-section <?php echo esc_attr($techeduem_header_sticky_class); ?> <?php echo esc_attr($techeduem_header_transparent_class); ?>">
    <div class="<?php echo esc_attr($header_width); ?>">
        <div class="row align-items-center">
            <div class="text-left col-md-4 col-6 mt-15 mb-15 order-2 order-md-1">
                <!-- Sidebar Menu Toggle Button -->
                <button class="menu-toggle"><span class="bar">&nbsp;</span> <?php esc_html_e('menu', 'techeduem'); ?></button>
            </div>

            <div class="col-md-4 col-12 mt-15 mb-15 order-1 order-md-2">
                <?php
                $techeduem_fallback_logo = get_template_directory_uri() . '/images/logo.png';
                $techeduem_fallback_retina_logo = get_template_directory_uri() . '/images/logo2x.png';
                $techeduem_default_logo = techeduem_get_theme_option('techeduem_head_logo', 'url', $techeduem_fallback_logo);
                $techeduem_default_ratina_logo = techeduem_get_theme_option('techeduem_retina_default_logo', 'url', $techeduem_fallback_retina_logo);
                ?>
                <!-- Logo Start -->
                <div class="header-logo text-center">
                    <div class="site-title">
                        <?php if (isset($techeduem_opt['techeduem_logo_type'])) : ?>
                            <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'techeduem')); ?>" rel="home">
                                <?php if ('image' == $techeduem_opt['techeduem_logo_type']) : ?>
                                    <img src="<?php echo esc_url($techeduem_default_logo); ?>" data-at2x="<?php echo esc_url($techeduem_default_ratina_logo); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
                                <?php else : ?>
                                    <?php if ('text' == $techeduem_opt['techeduem_logo_type']) : ?>
                                        <?php echo esc_html($techeduem_opt['techeduem_logo_text']); ?>
                                    <?php endif ?>
                                <?php endif ?>
                            </a>
                        <?php else : ?>

                            <h3>
                                <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home">
                                    <?php if (isset($techeduem_opt['techeduem_logo_text']) ? $techeduem_opt['techeduem_logo_text'] : '') {
                                        echo esc_html($techeduem_opt['techeduem_logo_text']);
                                    } else {
                                        bloginfo('name');
                                    }
                                    ?>
                                </a>
                            </h3>

                            <?php $description = get_bloginfo('description', 'display');
                            if ($description || is_customize_preview()) { ?>
                                <p class="site-description"><?php echo esc_html($description); ?> </p>
                            <?php } ?>
                        <?php endif ?>

                    </div>
                </div><!-- Logo End -->
            </div>

            <div class="text-right col-md-4 col-6 order-2 order-lg-3 order-2">
                <!-- Header Advance Search Start -->
                <div class="header-shop-links">
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
                </div><!-- Header Advance Search End -->
            </div>

        </div>
    </div>
</div><!-- Header Section End -->

<div class="side-menu-wrap">
    <button class="side-menu-close"><span></span></button>
    <div class="side-menu-inner">

        <div class="side-logo">
            <div class="site-title">
                <?php if (isset($techeduem_opt['techeduem_logo_type'])) : ?>
                    <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'techeduem')); ?>" rel="home">
                        <?php if ('image' == $techeduem_opt['techeduem_logo_type']) : ?>
                            <img src="<?php echo esc_url($techeduem_default_logo); ?>" data-at2x="<?php echo esc_url($techeduem_default_ratina_logo); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
                        <?php else : ?>
                            <?php if ('text' == $techeduem_opt['techeduem_logo_type']) : ?>
                                <?php echo esc_html($techeduem_opt['techeduem_logo_text']); ?>
                            <?php endif ?>
                        <?php endif ?>

                    </a>
                <?php else : ?>
                    <h3>
                        <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home">
                            <?php if (isset($techeduem_opt['techeduem_logo_text']) ? $techeduem_opt['techeduem_logo_text'] : '') {
                                echo esc_html($techeduem_opt['techeduem_logo_text']);
                            } else {
                                bloginfo('name');
                            }
                            ?>
                        </a>
                    </h3>
                    <?php $description = get_bloginfo('description', 'display');
                    if ($description || is_customize_preview()) { ?>
                        <p class="site-description"><?php echo esc_html($description); ?> </p>
                    <?php } ?>
                <?php endif ?>
            </div>
        </div>

        <div class="side-menu">
            <nav>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu'           => $techeduem_selected_menu,
                    'container'      => false,
                    'fallback_cb'    => 'techeduem_fallback'
                ));
                ?>
            </nav>
        </div>

        <div class="side-social">
            <?php
            $social_item = isset($techeduem_opt['techeduem_social_icons']) ? $techeduem_opt['techeduem_social_icons'] : '';
            if (is_array($social_item)) {
                foreach ($social_item as $key => $value) {
                    if ($value != '') {
                        if ($key == 'vimeo') {
                            echo '<a class="social-icon" href="' . esc_url($value) . '" title="' . ucwords(esc_attr($key)) . '" target="_blank"><i class="fa fa-vimeo-square"></i></a>';
                        } else {
                            echo '<a class="social-icon" href="' . esc_url($value) . '" title="' . ucwords(esc_attr($key)) . '" target="_blank"><i class="fa fa-' . esc_attr($key) . '"></i></a>';
                        }
                    }
                }
            }
            ?>

        </div>

    </div>
</div>
<div class="side-menu-overlay"></div>