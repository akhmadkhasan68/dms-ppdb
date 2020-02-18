<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

/*-------- SET IDR NOMINAL --------*/
if(!function_exists('addNumber')) {
	function addNumber($number, $idr = true) {
		$CI = &get_instance();
		$CI->load->database();
		return 'Rp. '. str_replace(',','.', number_format($number));
	}
}
