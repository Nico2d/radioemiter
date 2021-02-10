<?php

if (!class_exists('field_date_dynamic')):

class field_date_dynamic extends acf_field {
    function initialize() {
        $this->name = 'date_dynamic';
        $this->label = 'Dynamic Date';
        $this->category = 'Typography';
    }
}
acf_register_field_type('field_date_dynamic');
    
endif;
