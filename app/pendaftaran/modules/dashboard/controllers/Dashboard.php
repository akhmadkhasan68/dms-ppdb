<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

	public function __construct() {
		$this->load->model('M_dashboard');
		$this->load->library('recaptcha');
	}

		public function index(){
		$data['content'] = 'dashboard';
		$data['active'] = 'dashboard';
		$this->load->view('template',$data);	
		
	}
    
}
