<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendaftaran extends MY_Controller
{

	public function __construct()
	{
		$this->load->model('M_pendaftaran');
		$this->load->helper('common');

		if($this->session->userdata('logged_in') == FALSE)
		{
			redirect('login');
		}
	}

	public function index()
	{
		$data['content'] = 'siswa';
		$data['active'] = 'pendaftaran';
		$data['config'] = config_table();
		$data['get_admin'] = get_admin();
		$data['notif_approve_doc'] = count_notif_approve_doc();
		$data['notif_share_doc'] = count_notif_share_doc();
		
		$this->load->view('template', $data);
	}

	public function detail_siswa()
	{
		$data['content'] = 'detail_pendaftaran';
		$data['active'] = 'pendaftaran';
		$this->load->view('template', $data);
	}
}
