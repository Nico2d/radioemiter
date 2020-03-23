<?php
    $post = get_post($this->postId);
    $authorId = $post->post_author;
?>

<p class="Post__Author">  
    <?= __('Autor: '); ?>
    <?= the_author_meta( 'first_name' , $authorId ); ?>
    <?= the_author_meta( 'last_name' , $authorId ); ?>
</p>