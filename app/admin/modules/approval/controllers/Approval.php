<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Approval extends MY_Controller
{

	public function __construct()
	{
		$this->load->model('M_approval');
		$this->load->helper('common');

		if($this->session->userdata('logged_in') == FALSE)
		{
			redirect('login');
		}
	}

	public function index()
	{
		$data['content'] = 'approval';
		$data['active'] = 'approval';
		$data['config'] = config_table();
		$data['get_admin'] = get_admin();
		
		$this->load->view('template', $data);
	}
}
