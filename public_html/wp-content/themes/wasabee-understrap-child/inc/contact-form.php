<?php

function remove_span_wrapper($content) {
    return preg_replace(
        '/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i',
        '\2',
        $content
    );
}

add_filter('wpcf7_form_elements', 'remove_span_wrapper');

function wps_deregister_styles() {
    wp_deregister_style('contact-form-7');
}

add_action('wp_print_styles', 'wps_deregister_styles', 100);
