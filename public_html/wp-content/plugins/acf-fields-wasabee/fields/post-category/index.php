<?php

if (!class_exists('field_post_category')):

class field_post_category extends acf_field {
    function initialize() {
        $this->name = 'post_category';
        $this->label = 'Post category';
        $this->category = 'Post';
    }   
}

acf_register_field_type('field_post_category');

endif;
