<?php

if (!class_exists('field_hero_content')):

class field_hero_content extends acf_field_textarea {
    function initialize() {
        $this->name = 'hero_content';
        $this->label = 'Hero Content';
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

acf_register_field_type('field_hero_content');

endif;
