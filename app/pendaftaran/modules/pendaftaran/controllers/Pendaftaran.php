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
		$data['content'] = 'pendaftaran';
		$data['active'] = 'pendaftaran';
		$this->load->view('template', $data);
	}
}
