<?php

if (!class_exists('field_label')):

class field_label extends acf_field_text {
    function initialize() {
        $this->name = 'label';
        $this->label = 'Label';
        $this->category = 'Typography';
    }
}

acf_register_field_type('field_label');
    
endif;
