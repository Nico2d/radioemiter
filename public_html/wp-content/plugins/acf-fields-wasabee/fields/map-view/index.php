<?php

if (!class_exists('field_map_view')):
	
class field_map_view extends acf_field_select {
	public function initialize() {
		$this->name = 'map_view';
		$this->label = 'Map View';
		$this->category = 'Embeds';
		
		$this->defaults = array(
			'multiple' => 0,
			'allow_null' => 0,
			'choices' => [],
			'default_value'	=> 0,
			'ui' => 0,
			'ajax' => 0,
			'placeholder' => '',
			'return_format'	=> 'value'
		);
	}

	public function load_field($field) {
		global $wpdb;
		
		$table_name_markers = $wpdb->prefix . 'leafletmapsmarker_markers';
		$query = "SELECT id, markername FROM `$table_name_markers`";
		$marklist = $wpdb->get_results($query, ARRAY_A);

		$field['choices'] = array_combine(
			array_column($marklist, 'id'),
			array_column($marklist, 'markername')
		);

		return $field;
	}
}

acf_register_field_type('field_map_view');

endif;
