<?php
$tags = explode(',', preg_replace('/\v(?:[\v\h\s*\t*]+)/', '', $this->get('value')));
?>

<div class='<?= $this->get('className') ?>'>
    <?php
        foreach ($tags as $tag) {
            if (empty($tag)) {
                continue;
            }
            
            new RenderEngine(array('type' => 'tag', 'value' => $tag));
        }
    ?>
</div>
