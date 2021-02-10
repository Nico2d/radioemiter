<?php

function theme_enqueue_styles() {
    $the_theme = wp_get_theme();
    
    wp_enqueue_style(
        'child-understrap-styles',
        get_stylesheet_directory_uri() . '/css/index.css',
        [],
        $the_theme->get('Version')
    );
    
    wp_enqueue_script('jquery');
    
    wp_enqueue_script(
        'child-understrap-script-bootstrap',
        get_stylesheet_directory_uri() . '/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js',
        [],
        false
    );
    
    wp_enqueue_script(
        'child-understrap-script-slick',
        get_stylesheet_directory_uri() . '/node_modules/slick-carousel/slick/slick.min.js',
        [],
        false
    );
    
    wp_enqueue_script(
        'child-understrap-script-custom',
        get_stylesheet_directory_uri() . '/js/index.js',
        [],
        $the_theme->get('Version'),
        true
    );
    
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'theme_enqueue_styles');

add_theme_support('editor-styles');
add_editor_style(get_stylesheet_directory_uri() . '/css/admin/index.css');
