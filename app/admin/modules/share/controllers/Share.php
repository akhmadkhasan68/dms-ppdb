<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Share extends MY_Controller
{

	public function __construct()
	{
		$this->load->model('M_share');
		$this->load->helper('common');

		if($this->session->userdata('logged_in') == FALSE)
		{
			redirect('login');
		}
	}

	public function index()
	{
		$data['content'] = 'share';
		$data['active'] = 'share';
		$data['config'] = config_table();
		$data['get_admin'] = get_admin();
		
		$this->load->view('template', $data);
	}
}
