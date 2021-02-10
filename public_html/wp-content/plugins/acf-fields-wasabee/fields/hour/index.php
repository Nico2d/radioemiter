<?php

if (!class_exists('field_hour')):

class field_hour extends acf_field_text {
    function initialize() {
        $this->name = 'hour';
        $this->label = 'Hour';
        $this->category = 'Typography';
    }
}

acf_register_field_type('field_hour');
    
endif;
