<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendaftaran extends MY_Controller
{

	public function __construct()
	{
		$this->load->model('M_pendaftaran');
	}

	public function index()
	{
		$data['content'] = 'siswa';
		$data['active'] = 'pendaftaran';
		$this->load->view('template', $data);
	}

	public function detail_siswa()
	{
		$data['content'] = 'detail_pendaftaran';
		$data['active'] = 'pendaftaran';
		$this->load->view('template', $data);
	}
}
