<?php

if (!class_exists('field_tag_list')):

class field_tag_list extends acf_field_textarea {
    function initialize() {
        $this->name = 'tag_list';
        $this->label = 'Tag List';
        $this->category = 'Typography';

        $this->defaults = array(
			'default_value'	=> '',
			'new_lines' => '',
			'maxlength' => '',
			'placeholder' => '',
			'rows' => ''
		);
    }
}

acf_register_field_type('field_tag_list');
    
endif;
