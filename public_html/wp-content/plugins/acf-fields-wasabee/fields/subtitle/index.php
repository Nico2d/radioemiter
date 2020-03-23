<?php

if (!class_exists('field_subtitle')):

class field_subtitle extends acf_field_text {
    function initialize() {
        $this->name = 'subtitle';
        $this->label = 'Subtitle';
        $this->category = 'Typography';
    }   
}

acf_register_field_type('field_subtitle');
    
endif;
