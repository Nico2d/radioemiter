<div class='<?= $this->get('className') ?>'>
    <?php
        while (have_rows($this->get('key'), $this->postId)):
            foreach (array_keys(the_row()) as $fieldKey) {
                new RenderEngine(get_sub_field_object($fieldKey), $this->postId);
            }
        endwhile;
    ?>
</div>
