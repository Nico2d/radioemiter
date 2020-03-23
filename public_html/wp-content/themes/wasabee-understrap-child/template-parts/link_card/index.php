<?php
    if( have_rows($this->get('key'))):
        $link = $this->get('value')['link'];
        $linkTaken = true;
    endif;
?>
    
<a class='<?= $this->get('className') ?>' href="<?= $link?>">
    <?php
        while (have_rows($this->get('key'), $this->postId)):
            foreach (array_keys(the_row()) as $fieldKey):
                if($linkTaken):
                    $linkTaken = false;
                    continue;
                endif;
                
                new RenderEngine(get_sub_field_object($fieldKey), $this->postId);
            endforeach;
        endwhile;
    ?>
</a>
