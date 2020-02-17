<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengaturan extends MY_Controller
{

	public function __construct()
	{
		$this->load->model('M_pengaturan');
		$this->load->helper('common');

		if($this->session->userdata('logged_in') == FALSE)
		{
			redirect('login');
		}
	}

	public function index()
	{
		$data['content'] = 'pengaturan';
		$data['active'] = 'pengaturan';
		$data['config'] = config_table();
		$data['get_admin'] = get_admin();
		$data['notif_approve_doc'] = count_notif_approve_doc();

		$this->load->view('template', $data);
	}
}
