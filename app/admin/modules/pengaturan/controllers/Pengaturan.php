<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengaturan extends MY_Controller
{

	public function __construct()
	{
		$this->load->model('M_pengaturan');
		$this->load->helper('common');
		$this->load->library('form_validation');

		if($this->session->userdata('logged_in') == FALSE)
		{
			redirect('login');
		}
	}

	public function index()
	{
		$data['content'] = 'pengaturan';
		$data['active'] = 'pengaturan';
		$data['config'] = config_table();
		$data['get_admin'] = get_admin();
		$data['notif_approve_doc'] = count_notif_approve_doc();
		$data['notif_share_doc'] = count_notif_share_doc();
		$data['userdata'] = userdata();
		

		$this->load->view('template', $data);
	}

	public function ajax_action_edit_user()
	{
		$userdata = userdata();

		$id = $this->input->post('id');
		$name = $this->input->post('name');
		$username = $this->input->post('username');
		$old_password = $this->input->post('old_password');
		$new_password = $this->input->post('new_password');

		$this->form_validation->set_rules('name', 'name', 'required');
		$this->form_validation->set_rules('username', 'username', 'required');
		
		if($this->form_validation->run() == FALSE)
		{
			$error = $this->form_validation->error_array();

			$json_data = [
				'result' => FALSE,
				'form_error' => $error,
				'message' => ['head' => 'Gagal', 'body' => 'Mohon maaf, ada beberapa form yang harus diisi!'],
				'redirect' => ''
			];

			print json_encode($json_data);
			die();
		}

		//CHECK USER 
		$cek_user = $this->M_pengaturan->get_row("*","admin","username = '$username' AND id != '$id'");

		//IF USER EXIST
		if(count($cek_user) > 0)
		{
			$json_data = [
				'result' => FALSE,
				'form_error' => '',
				'message' => ['head' => 'Gagal', 'body' => 'Mohon maaf, username tidak bisa dipilih!'],
				'redirect' => ''
			];
	
			print json_encode($json_data);
			die();
		}

		//JIKA TIDAK GANTI PASSWORD
		if($new_password == "" || $old_password == "")
		{
			$data = [
				'name' => $name,
				'username' => $username
			];

			//UPDATE USERDATA
			$update = $this->M_pengaturan->update_table2("admin",$data,"id = $id");

			$json_data = [
				'result' => TRUE,
				'form_error' => '',
				'message' => ['head' => 'Berhasil', 'body' => 'Selamat, anda berhasil merubah data profil anda!'],
				'redirect' => $this->config->item('index_page').'pengaturan'
			];
	
			print json_encode($json_data);
		}
		else
		{
			//CHECK PASSWORD IS MATCH
			if(md5($old_password) != $userdata->password)
			{
				$json_data = [
					'result' => TRUE,
					'form_error' => '',
					'message' => ['head' => 'Gagal', 'body' => 'Mohon maaf, password lama tidak sesuai!'],
					'redirect' => ''
				];
		
				print json_encode($json_data);
				die();
			}

			$data = [
				'name' => $name,
				'username' => $username,
				'password' => md5($new_password),
				'updated_at' => date('Y-m-d H:i:s')
			];

			//UPDATE USERDATA
			$update = $this->M_pengaturan->update_table2("admin",$data,"id = $id");

			$json_data = [
				'result' => TRUE,
				'form_error' => '',
				'message' => ['head' => 'Berhasil', 'body' => 'Selamat, anda berhasil merubah data profil anda!'],
				'redirect' => $this->config->item('index_page').'pengaturan'
			];
	
			print json_encode($json_data);
		}
	}

	public function ajax_action_ppdb()
	{
		$status = $this->input->post('ppdb_status');

		$data = [
			'ppdb_status' => $status
		];

		$update = $this->M_pengaturan->update_table2("config",$data, "id = 1");

		$json_data = [
			'result' => TRUE,
			'form_error' => '',
			'message' => ['head' => 'Berhasil', 'body' => 'Selamat, anda berhasil merubah status ppdb!'],
			'redirect' => $this->config->item('index_page').'pengaturan'
		];

		print json_encode($json_data);
	}
}
