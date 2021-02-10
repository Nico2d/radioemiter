<?php

if (!function_exists('block_preparer')):

function block_preparer($block, $rendererName) {
    $block['title'] = ucfirst(str_replace('_', ' ', $block['name']));
    $block['render_template'] = locate_template("renderers/$rendererName.php");
    $block['render_callback'] = 'include_renderer';
    
    return $block;
}

endif;
