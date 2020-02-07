<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dokumen extends MY_Controller
{

	public function __construct()
	{
		$this->load->model('M_dokumen');
	}

	public function index()
	{
		$data['content'] = 'dokumen';
		$data['active'] = 'dokumen';
		$this->load->view('template', $data);
	}
}
