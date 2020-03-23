<p class='<?= $this->get('className') ?>'>
    <a class="Breadcrumbs__link" href="/">Home</a>

    <?php
    $urlParams = explode('/', trim(parse_url($_SERVER['REQUEST_URI'])['path'], '/'));

    function makeLink($path, $currentParam) {
        ?>
        <a class="Breadcrumbs__link" href='/<?= $path ?>'>
            /&nbsp;<?= ucfirst(str_replace('-', ' ', $currentParam)) ?>
        </a>
        <?php
    }

    function makeBreadcrumbs($params) {
        if (empty($params)) {
            return;
        }
        makeBreadcrumbs(array_slice($params, 0, -1));
        makeLink(implode('/', $params), end($params));
    }

    makeBreadcrumbs($urlParams);
    ?>
</p>
