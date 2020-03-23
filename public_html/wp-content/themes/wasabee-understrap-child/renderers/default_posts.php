<?php
include_once(get_stylesheet_directory() . "/template-parts/RenderEngine.php");
$posts = get_posts($block['posts_args']);
?>

<?php if (!empty($block['wrapper_class_name'])): ?>
    <div class="<?=$block['wrapper_class_name'] ?>">
<?php endif; ?>


<?php
foreach ($posts as $post) {
    foreach (array_keys(get_field_objects($post->ID)) as $field) {
        new RenderEngine(get_field_object($field, $post->ID), $post->ID);
    }
}
?>

<?php if (!empty($block['wrapper_class_name'])): ?>
    </div>
<?php endif; ?>