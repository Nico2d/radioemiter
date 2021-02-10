<?php 
include_once(get_stylesheet_directory() . "/template-parts/RenderEngine.php");
$postList = get_posts(['numberposts' => 3]); 
?>
 
<div class='CardGrid'>
<?php
    foreach ($postList as $post) {
        foreach (array_keys(get_field_objects($post->ID)) as $field) {
            new RenderEngine(
                get_field_object($field, $post->ID), 
                $post->ID
            );
        }
    }
?>
</div>
