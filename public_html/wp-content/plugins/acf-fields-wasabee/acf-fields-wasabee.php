<?php
/*
    Plugin Name: Advanced Custom Fields - Wasabee fields
    Description: Wasabee fields
*/

function ff_block_category( $categories, $post ) {
	if ( $post->post_type == 'page' ) { 
		$welcoop_blocks = array_merge(
			$categories,
			array(
				array(
					'slug' => 'wasabee',
					'title' => __( 'wasabee', 'mlp-admin' ),
				)
			)
		);
	} else {
		return $categories;
	}

	return $welcoop_blocks;
}

add_filter( 'block_categories', 'ff_block_category', 10, 2);

if (!defined('ABSPATH')) {
    exit;
}

function include_field($version = false) {
    $directories = glob(ABSPATH . 'wp-content/plugins/acf-fields-wasabee/fields/*', GLOB_ONLYDIR);
    foreach ($directories as $directory) {
        include_once("$directory/index.php");
    }
}

add_action('acf/include_field_types', 'include_field');
