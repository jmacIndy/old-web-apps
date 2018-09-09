<?php
// Session configuration parameters.
Registry::$config['session'] = array 
(
	// Expiration time in seconds.
	'lifetime' => 7200,
	'name' => 'phpsession',
	'cookie' => array 
	(
		'path' => '/',
		'domain' => NULL,
		'secure' => FALSE,
		'httponly' => FALSE
	),
);