<?php

include_once(get_stylesheet_directory() . "/template-parts/RenderEngine.php");
$className = (empty($block['className']) ? '' : $block['className']);

if (!empty($className)) {
    echo "<div class='$className'>";
}

foreach (array_keys(get_field_objects()) as $field) {
    new RenderEngine(get_field_object($field));
}

if (!empty($className)) {
    echo "</div>";
}
