<?php
include_once(get_stylesheet_directory() . "/template-parts/RenderEngine.php");
$posts = get_posts($block['posts_args']);
?>

<div class='CardGrid'>
<?php foreach ($posts as $post): ?>
    <div class='CardGrid__Card'>
        <?php while (have_rows('product_preview', $post->ID)) : the_row(); ?>
            <div class='CardGrid__Card__image'>
                <?php new RenderEngine(get_sub_field_object('image_side'), $post->ID); ?>
            </div>
            <div class='CardGrid__Card__contentWrapper'>
                <?php while( have_rows('content_side') ): the_row(); ?>
                <div class='CardGrid__Card__content'>
                    <?php new RenderEngine(get_sub_field_object('title'), $post->ID); ?>
                    <?php new RenderEngine(get_sub_field_object('excerpt'), $post->ID); ?>
                </div>
                <?php new RenderEngine(get_sub_field_object('link'), $post->ID); ?>
                <?php endwhile; ?>
            </div>
        <?php endwhile; ?>
    </div>
<?php endforeach; ?>
</div>
