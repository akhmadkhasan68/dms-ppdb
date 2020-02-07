<?php
/*#### Security For Login ####*/
if (!function_exists('session_check')) {
	function session_check()
	{
		$CI = &get_instance();
	}
}
