<?php

require_once(get_stylesheet_directory() . "/inc/block-preparer.php");

function register_wasabee_blocks() {
    $blocksPath = locate_template('inc/blocks.json');
    $blocksRenderers = json_decode(file_get_contents($blocksPath), true);

    foreach ($blocksRenderers as $rendererName => $renderer) {
        $blocks = $renderer['value'];
        $blockTemplate = $renderer['template'];
        foreach ($blocks as $block) {
            acf_register_block_type(
                block_preparer(array_merge($blockTemplate, $block), $rendererName)
            );
        }
    }
}

function include_renderer(
    $block,
    $innerContent = '',
    $is_preview = false,
    $post_id = 0
) {
    ob_start();
    include($block['render_template']);
    $content = ob_get_contents();
    ob_end_clean();
    echo $content;
}

if (function_exists('acf_register_block_type')) {
    add_action('acf/init', 'register_wasabee_blocks');
}
