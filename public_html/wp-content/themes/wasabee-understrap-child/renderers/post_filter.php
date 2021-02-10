<div class="PostFilter">
    <?php
        $uriSegments = explode('/', $_SERVER['REQUEST_URI']);
        $categorySlugFromURL = empty($uriSegments[2]) ? 'all' : $uriSegments[2];
        $categories = get_categories($block['category_args']);
        $taxonomy = explode('_', $categories[0]->taxonomy)[0];
    ?>

    <p class="Breadcrumbs"> Fillter: </p>
    <div class="PostFilter__categories">
        <a class="LinkCard__text <?= $categorySlugFromURL === 'all' ? "LinkCard__text--is-active" : ""; ?>" href="/<?= $taxonomy ?>/">
            all
        </a>

        <?php
        foreach ($categories as $category) {
            $categorySlug = $category->slug;
            $isActive = $categorySlugFromURL === $categorySlug ? "LinkCard__text--is-active" : "";
            ?>

            <a class="LinkCard__text <?= $isActive ?>" href="<?= "/$taxonomy/$categorySlug" ?>">
                <?= $category->name ?>
            </a>

        <?php } ?>
    </div>
</div>