<div class="PostFilterWithImages Container">
    <?php
    $uriSegments = explode('/', $_SERVER['REQUEST_URI']);
    $categorySlugFromURL = $uriSegments[2];
    $categories = get_categories($block['category_args']);
    $taxonomy = 'wiadomosci/';

    foreach ($categories as $category) {
        $font_awsome = get_field('font_awsome', "{$category->taxonomy}_{$category->term_id}");
        $categorySlug = $category->slug === 'wszystko' ? '' : $category->slug;
        $isActive = $categorySlugFromURL === $categorySlug ? "PostFilterWithImages__LinkCard--is-active" : "";
        ?>
        
        <a class="PostFilterWithImages__LinkCard <?= $isActive ?>" href="<?="/$taxonomy/$categorySlug"?>">
            <div class='PostFilterWithImages__LinkCard__imageContainer'>
                <?= $font_awsome ?>
            </div>
            <p class="PostFilterWithImages__LinkCard__text"><?= $category->name ?></p>
        </a>
    <?php } ?>
</div>