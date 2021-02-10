<?php

include_once(get_stylesheet_directory() . "/template-parts/RenderEngine.php");
$url = $_SERVER['REQUEST_URI'];
$taxonomy = 'wiadomosci/';

if(empty(explode('/', $url)[4])){
    $page = 1;
} else {
    $page = explode('/', $url)[4];
}

if($url != '/') {
    $categoryFromURL = explode('/', $url)[2];
    $terms = empty($block['terms']) ? $categoryFromURL : $block['terms'];

    $filterArgs = [
        'tax_query' => [
            [
                'taxonomy' => $block['taxonomy'],
                'field' => 'slug',
                'terms' =>  $terms,
            ]
        ]
    ];
}

if(!empty($terms)){
    $block['posts_args'] = array_merge($block['posts_args'], $filterArgs);
}

$posts = get_posts($block['posts_args']);
?>

<?php if (!empty($block['wrapper_class_name'])): ?>
    <div class="<?=$block['wrapper_class_name'] ?>">
<?php endif; ?>

<!-- <h3> posty teest</h3> -->

<?php foreach ($posts as $post) {
    $authorId = $post->post_author;

    foreach (array_keys(get_field_objects($post->ID)) as $field) {
        $fields = get_field_object($field, $post->ID);
        new RenderEngine(get_field_object($field, $post->ID), $post->ID);
    }    
} ?>

<?php if (!empty($block['wrapper_class_name'])): ?>
    </div>
<?php endif; ?>
