<?php

add_action('wp_enqueue_scripts', 'understrap_remove_scripts', 20);
function understrap_remove_scripts() {
    wp_dequeue_style('understrap-styles');
    wp_deregister_style('understrap-styles');

    wp_dequeue_script('understrap-scripts');
    wp_deregister_script('understrap-scripts');
}

add_action('after_setup_theme', 'add_child_theme_textdomain');
function add_child_theme_textdomain() {
    load_child_theme_textdomain('understrap-child', get_stylesheet_directory() . '/languages');
}

add_filter( 'query_vars', 'add_query_category' );
function add_query_category( $vars ) {
    $vars[] = 'category';
    return $vars;
}

add_action('init', 'add_rewrite_rule_for_wiadomosci');
function add_rewrite_rule_for_wiadomosci() {
    add_rewrite_rule( 
        '^wiadomosci/([^/])+/?$',
        'index.php?page_id=177',
        'top'
    );

    add_rewrite_rule( 
       '^wiadomosci/([^/]+)/page/([0-9]+)/?',
       'index.php?page_id=177',
       'top'
    );
}
