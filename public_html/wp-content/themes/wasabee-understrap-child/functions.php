<?php

if (!defined('ABSPATH')) {
	exit;
}

$wasabeeIncludes = [
    '/setup.php',
    '/blocks-registerer.php',
    '/enqueue.php',
    '/contact-form.php'
];

foreach ($wasabeeIncludes as $file) {
	$filepath = locate_template('inc' . $file);
	if (!$filepath) {
		trigger_error(sprintf('Error locating /inc%s for inclusion', $file), E_USER_ERROR);
	}
	require_once($filepath);
}
