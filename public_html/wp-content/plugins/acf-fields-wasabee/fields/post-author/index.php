<?php

if (!class_exists('field_post_author')):

class field_post_author extends acf_field {
    function initialize() {
        $this->name = 'post_author';
        $this->label = 'Post author';
        $this->category = 'Post';
    }   
}

acf_register_field_type('field_post_author');

endif;
