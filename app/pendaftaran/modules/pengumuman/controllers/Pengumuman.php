<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengumuman extends MY_Controller
{

	public function __construct()
	{
		$this->load->model('M_pengumuman');
	}

	public function index()
	{
		$data['content'] = 'pengumuman';
		$data['active'] = 'pengumuman';
		$this->load->view('template', $data);
	}
}
