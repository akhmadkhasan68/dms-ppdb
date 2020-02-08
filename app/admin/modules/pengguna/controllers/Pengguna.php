<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengguna extends MY_Controller
{

	public function __construct()
	{
		$this->load->model('M_pengguna');
	}

	public function index()
	{
		$data['content'] = 'pengguna';
		$data['active'] = 'pengguna';
		$this->load->view('template', $data);
	}
}
