<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$hook['post_controller_constructor'][] = array(
	'filename' => 'session_check.php',
	'function' => 'session_check',
	'filepath' => 'hooks'
);