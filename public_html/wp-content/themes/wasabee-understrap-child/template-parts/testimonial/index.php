<div class="<?= $this->get('className') ?>">
    <?php 
        foreach (array_keys(get_field_objects($this->get('value'))) as $field) {
            new RenderEngine(
                get_field_object($field, $this->get('value')),
                $this->get('value')
            );
        }
    ?>
</div>
