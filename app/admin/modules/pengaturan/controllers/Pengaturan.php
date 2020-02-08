<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengaturan extends MY_Controller
{

	public function __construct()
	{
		$this->load->model('M_pengaturan');
	}

	public function index()
	{
		$data['content'] = 'pengaturan';
		$data['active'] = 'pengaturan';
		$this->load->view('template', $data);
	}
}
