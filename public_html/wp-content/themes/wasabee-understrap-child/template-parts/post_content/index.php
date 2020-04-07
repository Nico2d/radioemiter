<?php 

$content = apply_filters('the_content', get_post_field('post_content', $this->postId));
    // echo $content
?>
<div class='<?= $this->get('className') ?>'>
    <?php echo $content ?>
</div>
