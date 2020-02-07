<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Share extends MY_Controller
{

	public function __construct()
	{
		$this->load->model('M_share');
	}

	public function index()
	{
		$data['content'] = 'share';
		$data['active'] = 'share';
		$this->load->view('template', $data);
	}
}
