<?php

namespace Elementor;

// Exit if accessed directly
if( ! defined( 'ABSPATH' ) ) exit();

/**
 * Elementor category
 */
function wpeducation_elementor_init(){
    Plugin::instance()->elements_manager->add_category(
        'wpeducation',
        array(
            'title'  => 'WP Education',
            'icon' => 'font'
        )
    );
}
add_action('elementor/init','Elementor\wpeducation_elementor_init');

// Course Category
function wpeducation_categories(){
    $terms = get_terms( array(
        'taxonomy' => 'wpeducation_category',
        'hide_empty' => true,
    ));
    if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
        foreach ( $terms as $term ) {
            $options[ $term->slug ] = $term->name;
        }
        return $options;
    }
}

// Teachers Category
function wpeducation_teachers_categories(){
    $terms = get_terms( array(
        'taxonomy' => 'teachers_category',
        'hide_empty' => true,
    ));
    if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
        foreach ( $terms as $term ) {
            $options[ $term->slug ] = $term->name;
        }
        return $options;
    }
}

// Gallery Category
function wpeducation_gallery_categories(){
    $terms = get_terms( array(
        'taxonomy' => 'gallery_cat',
        'hide_empty' => true,
    ));
    if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
        foreach ( $terms as $term ) {
            $options[ $term->slug ] = $term->name;
        }
        return $options;
    }
}

// Events Category
function wpeducation_events_categories(){
    $terms = get_terms( array(
        'taxonomy' => 'wpevents_category',
        'hide_empty' => true,
    ));
    if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
        foreach ( $terms as $term ) {
            $options[ $term->slug ] = $term->name;
        }
        return $options;
    }
}

?>