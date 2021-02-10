<?php

if (!class_exists('field_title')):

class field_title extends acf_field_text {
    function initialize() {
        $this->name = 'title';
        $this->label = 'Title';
        $this->category = 'Typography';
    }   
}

acf_register_field_type('field_title');
    
endif;
