<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ppdb extends MY_Controller
{

	public function __construct()
	{
		$this->load->model('M_ppdb');
	}

	public function dashboard()
	{
		$data['content'] = 'dashboard/dashboard';
		$data['active'] = 'dashboard';
		$this->load->view('templatetwo', $data);
	}

	public function pendaftaran()
	{
		$data['content'] = 'pendaftaran/pendaftaran';
		$data['active'] = 'pendaftaran';
		$this->load->view('templatetwo', $data);
	}
	public function pengumuman()
	{
		$data['content'] = 'pengumuman/pengumuman';
		$data['active'] = 'pengumuman';
		$this->load->view('templatetwo', $data);
	}
}
