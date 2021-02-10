<?php

if (!class_exists('field_post_link')):

class field_post_link extends acf_field {
    function initialize() {
        $this->name = 'post_link';
        $this->label = 'Post link';
        $this->category = 'Post';
    }   
}

acf_register_field_type('field_post_link');

endif;
