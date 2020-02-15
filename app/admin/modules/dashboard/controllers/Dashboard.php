<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller 
{

	public function __construct() 
	{
		$this->load->model('M_dashboard');
		$this->load->helper('common');
		
		if($this->session->userdata('logged_in') == FALSE)
		{
			redirect('login');
		}
	}

	public function index()
	{
		
		$data['content'] = 'dashboard';
		$data['active'] = 'dashboard';
		$data['config'] = config_table();
		$data['get_admin'] = get_admin();

		$this->load->view('template',$data);	
	}
    
}
