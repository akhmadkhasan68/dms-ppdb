<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends MY_Controller
{

	public function __construct()
	{
		$this->load->model('M_login');
	}

	public function index()
	{
		$this->load->view('login');
	}
}
