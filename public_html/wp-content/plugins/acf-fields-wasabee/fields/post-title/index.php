<?php

if (!class_exists('field_post_title')):

class field_post_title extends acf_field {
    function initialize() {
        $this->name = 'post_title';
        $this->label = 'Post Title';
        $this->category = 'Post';
    }
}

acf_register_field_type('field_post_title');
    
endif;
