<?php

if (!class_exists('field_hero_subtitle')):

class field_hero_subtitle extends acf_field_textarea {
    function initialize() {
        $this->name = 'hero_subtitle';
        $this->label = 'Hero Subtitle';
        $this->category = 'Typography';
        $this->defaults = array(
            'default_value' => '',
            'new_lines' => '',
            'maxlength' => '',
            'placeholder' => '',
            'rows' => ''
        );
    }
}

acf_register_field_type('field_hero_subtitle');

endif;
