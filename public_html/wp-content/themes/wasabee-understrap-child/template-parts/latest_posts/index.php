<?php 
    $the_query = new WP_Query( 'posts_per_page=3' ); 
?>
 
<div class='CardGrid'>
<?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>

    <div class='CardGrid__Card'>
        <div class='Card__Image'>
            <?= the_post_thumbnail() ?>
        </div>
        <p class='Label'><?= get_the_category()[0]->name ?></p>
        <p class='HeroSubtitle'><?= the_title() ?></p>
        <?= wp_trim_words(get_the_excerpt(), 20) ?>
        <a class='Link' href='<?= get_permalink() ?>'>Read more</a>
    </div>
    
<?php 
    endwhile;
    wp_reset_postdata();
?>
</div>
