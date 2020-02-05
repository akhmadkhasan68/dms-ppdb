<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Approval extends MY_Controller
{

	public function __construct()
	{
		$this->load->model('M_approval');
	}

	public function index()
	{
		$data['content'] = 'approval';
		$data['active'] = 'approval';
		$this->load->view('template', $data);
	}
}
