<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends MY_Controller
{

	public function __construct()
	{
		$this->load->model('M_login');
		$this->load->helper('common');
		$this->load->library(array('form_validation', 'session'));

		if ($this->session->userdata('logged_in') == TRUE) {
			redirect('dashboard');
		}
	}

	public function index()
	{
		$data = config_table();
		$this->load->view('login', $data);
	}
	public function ajax_get_level()
	{
		$data = $this->M_login->fetch_table("*", "level");

		if (count($data) > 0) {
			$json_data = [
				'result' => TRUE,
				'data' => $data
			];
		} else {
			$json_data = [
				'result' => FALSE,
				'data' => ["head" => 'Kosong!', "body" => 'Maaf, data level kosong!']
			];
		}

		print json_encode($json_data);
	}
	// sss
	public function ajax_action_login()
	{
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$login_as = $this->input->post('login_as');

		//SET RULES VALIDATION 
		$this->form_validation->set_rules('username', 'username', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');
		$this->form_validation->set_rules('login_as', 'login_as', 'required');

		if ($this->form_validation->run() == FALSE) {
			$form_error = $this->form_validation->error_array();

			$json_data = [
				'result' => FALSE,
				'form_error' => $form_error,
				'message' => ['head' => 'Gagal', 'body' => 'Mohon maaf, ada beberapa form yang harus diisi!'],
				'redirect' => ''
			];

			print json_encode($json_data);

			die();
		}

		//SELECT USER
		$select_data = $this->M_login->fetch_table("*", "admin", "username = '$username' AND password = '$password' AND id_level = '$login_as'", $order = "", $by = "", $start = 0, $limit = 1);

		//IF USER IS NOT AVAILABLE
		if (count($select_data) < 1) {
			$json_data = [
				'result' => FALSE,
				'form_error' => '',
				'message' => ['head' => 'Gagal', 'body' => 'Mohon maaf, username dan password salah!'],
				'redirect' => ''
			];
			print json_encode($json_data);
			die();
		}

		//FETCH DATA
		foreach ($select_data as $row) {
			$id = $row->id;
			$id_level = $row->id_level;
			$email = $row->email;
			$name = $row->name;
			$username = $row->username;
			$is_active = $row->is_active;
		}

		//SET LEVEL
		if ($id_level == "1") {
			$level = "Super Admin";
		} elseif ($id_level == "2") {
			$level = "Kepala Sekolah";
		} elseif ($id_level == "3") {
			$level = "Ketua";
		} elseif ($id_level == "4") {
			$level = "Wakil Ketua";
		} elseif ($id_level == "5") {
			$level = "Bendahara";
		} elseif ($id_level == "6") {
			$level = "Sekertaris";
		} elseif ($id_level == "7") {
			$level = "Anggota";
		}

		//THE CONDITION IF USER NON ACTIVE
		if ($is_active == 0) {
			$json_data = [
				'result' => FALSE,
				'form_error' => '',
				'message' => ['head' => 'Gagal', 'body' => 'Mohon maaf, status user sedang non aktif!'],
				'redirect' => ''
			];

			print json_encode($json_data);
			die();
		}


		//SET SESSION DATA
		$sessData = [
			'id' => $id,
			'id_level' => $id_level,
			'level' => $level,
			'email' => $email,
			'name' => $name,
			'username' => $username,
			'logged_in' => true
		];

		//SESSION DATA
		$this->session->set_userdata($sessData);

		//CONDITION IF USERNAME AND PASSWORD IS TRUE
		$json_data = [
			'result' => true,
			'form_error' => '',
			'message' => ['head' => 'Berhasil', 'body' => 'Selamat datang ' . $name],
			'redirect' => $this->config->item('index_page') . 'dashboard'
		];
		print json_encode($json_data);
	}
}
