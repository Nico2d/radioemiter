<div class="PostFilterWithImages Container">
    <?php
    $uriSegments = explode('/', $_SERVER['REQUEST_URI']);
    $categorySlugFromURL = $uriSegments[2];
    $categories = get_categories($block['category_args']);
    $taxonomy = 'nowosci/';

    foreach ($categories as $category) {
        $image = get_field('image', "{$category->taxonomy}_{$category->term_id}");
        $categorySlug = $category->slug === 'wszystko' ? '' : $category->slug;
        $isActive = $categorySlugFromURL === $categorySlug ? "PostFilterWithImages__LinkCard--is-active" : "";
        ?>

        <a class="PostFilterWithImages__LinkCard <?= $isActive ?>" href="<?="/$taxonomy/$categorySlug"?>">
            <div class='PostFilterWithImages__LinkCard__imageContainer'>
                <img class='PostFilterWithImages__LinkCard__image' src="<?= $image['url'] ?>" />
            </div>
            <p class="PostFilterWithImages__LinkCard__text"><?= $category->name ?></p>
        </a>
    <?php } ?>
</div>