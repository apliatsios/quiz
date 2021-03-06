<?php
// Do not edit this file
$solution = isset($_GET['solution']) ? '-solution' : '';

$response = array(
	'errorMessage' => 'Invalid Route',
);
$mode = isset($_GET['mode']) ? $_GET['mode'] : NULL;
$needsAuthentication = TRUE;
$hash = isset($_GET['hash']) ? $_GET['hash'] : NULL;
$username = isset($_GET['username']) ? $_GET['username'] : NULL;
$password = isset($_GET['password']) ? $_GET['password'] : NULL;

require_once 'mime' . $solution . '.php';

if ($mode === 'login') {
	$needsAuthentication = FALSE;
	$response = array(
		'hash' => require_once 'hash_generator' . $solution . '.php',
	);
}

$authenticated = require_once 'authenticate' . $solution . '.php';
if ($authenticated) {
	switch ($mode) {
		case 'get_users':
			$response = require_once 'get_users' . $solution . '.php';
			break;
		case 'get_projects':
			$response = require_once 'get_projects' . $solution . '.php';
			break;
	}
}

die(json_encode($response));