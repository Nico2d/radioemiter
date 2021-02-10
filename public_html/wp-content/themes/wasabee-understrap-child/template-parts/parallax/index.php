<?php
    $imageURL = $this->get('value')['image']['url'];
    $text = $this->get('value')['text'];
?>

<div class='<?= $this->get('className') ?>'>  
    <div class='Parallax__image' style='background-image: url(<?= $imageURL ?>)'></div>
    <p class='Parallax__text'> <?= $text ?> </p>
</div>
