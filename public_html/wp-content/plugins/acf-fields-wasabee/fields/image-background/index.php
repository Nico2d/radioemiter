<?php

if (!class_exists('field_parallax')):

class field_parallax extends acf_field__group { 
	function initialize() {
		$this->name = 'parallax';
		$this->label = 'Parallax';
		$this->category = 'Typography';
		$this->defaults = array(
			'sub_fields'	=> array(),
			'layout'		=> 'block'
		);
		$this->have_rows = 'single';
		
		$this->add_field_filter('acf/prepare_field_for_export', array($this, 'prepare_field_for_export'));
		$this->add_field_filter('acf/prepare_field_for_import', array($this, 'prepare_field_for_import'));
	}
}

acf_register_field_type('field_parallax');
    
endif;
