<?php

if (!class_exists('field_whitespace')):

class field_whitespace extends acf_field_select {
    function initialize() {
        $this->name = 'whitespace';
        $this->label = 'Whitespace';
        $this->category = 'Layout';
        $this->defaults = array(
			'multiple' => 0,
			'allow_null' => 0,
			'choices' => range(0, 10),
			'default_value'	=> 0,
			'ui' => 0,
			'ajax' => 0,
			'placeholder' => '',
			'return_format'	=> 'value'
		);
    }
}

acf_register_field_type('field_whitespace');
    
endif;
