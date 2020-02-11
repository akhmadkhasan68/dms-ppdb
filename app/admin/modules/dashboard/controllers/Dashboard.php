<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller 
{

	public function __construct() 
	{
		$this->load->model('M_dashboard');
		$this->load->helper('common');
		// $this->load->library('recaptcha');
	}

	public function index()
	{
		
		$data['content'] = 'dashboard';
		$data['active'] = 'dashboard';
		$data['config'] = config_table();

		$this->load->view('template',$data);	
		
	}
    
}
