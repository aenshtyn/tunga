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

$header_wrapper_class = array();
// header icons
$show_header_tree_icons = isset($techeduem_opt['show_header_three_icons']) && $techeduem_opt['show_header_three_icons'] == false;
if ($show_header_tree_icons) {
    $header_wrapper_class[] = 'col-md-9';
} else {
    $header_wrapper_class[] = 'col-md-7';
}


?>
<header>
    <!-- Header Section Start -->
    <div class="header-section header-transparent section">
        <div class="<?php echo esc_attr($header_width); ?>">
            <div class="row align-items-center header-menu-right">

                <div class="col-lg-3 col-md-3 mt-15 mb-15">
                    <?php
                    $techeduem_fallback_logo = get_template_directory_uri() . '/images/logo.png';
                    $techeduem_fallback_retina_logo = get_template_directory_uri() . '/images/logo2x.png';
                    $techeduem_default_logo = techeduem_get_theme_option('techeduem_head_logo', 'url', $techeduem_fallback_logo);
                    $techeduem_default_ratina_logo = techeduem_get_theme_option('techeduem_retina_default_logo', 'url', $techeduem_fallback_retina_logo);
                    ?>
                    <!-- Logo Start -->
                    <div class="header-logo header-logo-one">
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

                <div class="<?php echo esc_attr(implode(' ', $header_wrapper_class)); ?> mr-lg-20 mr-md-40 d-none d-lg-block">
                    <div class="main-menu">
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
                </div>

                <?php if (header_three_quick_icons()) : ?>
                    <div class="col-md-2">
                        <?php echo header_three_quick_icons(); ?>
                    </div>
                <?php endif; ?>


                <div class="col-12 d-block d-lg-none">
                    <div class="mobile-menu"></div>
                </div>

            </div>
        </div>
    </div><!-- Header Section End -->
</header>