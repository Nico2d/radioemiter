<?php

function understrap_remove_scripts() {
    wp_dequeue_style('understrap-styles');
    wp_deregister_style('understrap-styles');

    wp_dequeue_script('understrap-scripts');
    wp_deregister_script('understrap-scripts');
}

add_action('wp_enqueue_scripts', 'understrap_remove_scripts', 20);

function add_child_theme_textdomain() {
    load_child_theme_textdomain('understrap-child', get_stylesheet_directory() . '/languages');
}

add_action('after_setup_theme', 'add_child_theme_textdomain');

function add_rewrite_rule_for_nowosci() {
    add_rewrite_rule( 
       '^nowosci/([^/])+/?$',
       'index.php?pagename=nowosci',
       'top'
    );
}

add_action('init', 'add_rewrite_rule_for_nowosci');

