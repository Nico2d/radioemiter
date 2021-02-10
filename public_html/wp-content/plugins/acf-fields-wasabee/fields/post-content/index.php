<?php

if (!class_exists('field_post_content')):

class field_post_content extends acf_field {
    function initialize() {
        $this->name = 'post_content';
        $this->label = 'Post Content';
        $this->category = 'Post';
    }
}

acf_register_field_type('field_post_content');

endif;
