<?php
    // WPeducation options menu
    if ( ! function_exists( 'wpeducation_add_adminbar_menu' ) ) {
        function wpeducation_add_adminbar_menu() {
            $menu = 'add_menu_' . 'page';
            $menu( 
                'wpeducation_panel', 
                __( 'WP Education', 'wpeducation' ), 
                'read', 
                'wpeducation_menu', 
                '', 
                'dashicons-welcome-learn-more', 
                40 
            );
        }
    }
    add_action( 'admin_menu', 'wpeducation_add_adminbar_menu' );

if(!function_exists('wpeducation_pagination')){
    function wpeducation_pagination(){
        ?>
        <div class="wpeducation-pagination"> <?php
            the_posts_pagination(array(
                'prev_text'          => '<i class="fa fa-angle-left"></i>',
                'next_text'          => '<i class="fa fa-angle-right"></i>',
                'type'               => 'list'
            )); ?>
        </div>
        <?php
    }
}

if( !function_exists('wpeducation_post_count_on_archive') && !is_admin() ){
    function wpeducation_post_count_on_archive( $query ) {
        if(is_archive()){
            $per_pages = (int)wpeducation_get_option( 'wpeducation_posts_per_page', 'settings' );

            if ( $query->is_archive( 'wpeducation' ) ) {
                $query->set( 'posts_per_page', $per_pages); /*set this your preferred count*/
            }
        }
    }
    add_action( 'pre_get_posts', 'wpeducation_post_count_on_archive' );
}

if( !function_exists('admin_media_scripts') ) {
    function admin_media_scripts() {
        wp_enqueue_style( 'assets', plugins_url( '/', __FILE__ ) . 'css/assets.css', false, '1.0' );
        wp_enqueue_script( 'assets', plugins_url( '/', __FILE__ ) . 'js/assets.js', false, '1.0' );
    }
}

add_action('admin_enqueue_scripts', 'admin_media_scripts');

?>