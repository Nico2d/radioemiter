<?php

if (!class_exists('field_hero_title')):

class field_hero_title extends acf_field_text {
    function initialize() {
        $this->name = 'hero_title';
        $this->label = 'Hero Title';
        $this->category = 'Typography';
    }
}

acf_register_field_type('field_hero_title');
    
endif;
