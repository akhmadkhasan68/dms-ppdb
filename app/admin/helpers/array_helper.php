<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

/*-------- GET DATA ARRAY RESELLER --------*/
if(!function_exists('array_data_admin')) {
	function array_data_admin() {
		$CI = &get_instance();
		$CI->load->database();

		$CI->db->select('*');
		$CI->db->from('admin');
		$CI->db->where('id_member', $CI->session->userdata('id'));
		$result = $CI->db->get();
		return $result->row();
	}
}

if(!function_exists('array_data_member')) {
	function array_data_member($member_id) {
		$CI = &get_instance();
		$CI->load->database();

		$CI->db->select('*');
		$CI->db->from('member');
		$CI->db->where('id_member', $member_id);
		$result = $CI->db->get();
		return $result->row();
	}
}


/*-------- SET IDR NOMINAL --------*/
if(!function_exists('addNumber')) {
	function addNumber($number, $idr = true) {
		$CI = &get_instance();
		$CI->load->database();
		return 'Rp. '. str_replace(',','.', number_format($number));
	}
}

/* ROLE */
if(!function_exists('get_role')) {
	function get_role(){
		$CI = &get_instance();
		$CI->load->database();

		$CI->db->select('id_level');
		$CI->db->from('a__admin');
		$CI->db->where('id_admin', $CI->session->userdata('id'));
		$query1 = $CI->db->get();
		$id_level = $query1->row()->id_level;

		$CI->db->select('*');
		$CI->db->from('sys_level');
		$CI->db->where('id_level', $id_level);
		$query = $CI->db->get();
		$name = $query->row();
		return $name;
	}
}