<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengguna extends MY_Controller
{

	public function __construct()
	{
		$this->load->model('M_pengguna');
		$this->load->helper('common');
		$this->load->library('form_validation');

		if($this->session->userdata('logged_in') == FALSE)
		{
			redirect('login');
		}
	}

	public function index()
	{
		$data['content'] = 'pengguna';
		$data['active'] = 'pengguna';
		$data['config'] = config_table();
		$data['get_admin'] = get_admin();
		$data['notif_approve_doc'] = count_notif_approve_doc();
		$data['get_level'] = get_level();
		
		$this->load->view('template', $data);
	}

	public function ajax_list_user()
	{
		$column = "a.id, a.email, a.name, a.username,a.is_active, d.name as level";
		$column_order = array('a.id', 'a.name');
		$column_search = array('a.id', 'a.name');
		$order = array('a.id' => 'DESC');
		$where = "a.id != ".$this->session->userdata('id');
		$group = "";
		$table = "admin a";
		$joins = [
			[
				"table" => "level d",
				"condition" => "d.id_level = a.id_level",
				"jointype" => "left"
			]
		];

		$list = $this->M_pengguna->get_datatables($column, $table, $column_order, $column_search, $order, $where, $joins, $group);

		$data = array();
		$no = $_POST['start']+1;

		foreach ($list as $key) {
			$row = array();
			$row[] = $no++;
			$row[] = $key->name;
			$row[] = $key->username;
			$row[] = $key->level;

			if($key->is_active == 1)
			{
				$row[] = "<div class='badge badge-success'>User Aktif</div>";
			}else{
				$row[] = "<div class='badge badge-danger'>User Nonaktif</div>";
			}	

			if($key->is_active != 1){
				$action = '
					<label><button class="mb-2 mr-2 btn btn-success" onclick="activeUser('.$key->id.', 1)">Aktifkan User</button></label>
					<label><button class="mb-2 mr-2 btn btn-info" onclick="editUser('.$key->id.')">Edit</button></label>
					<label><button class="mb-2 mr-2 btn btn-danger" onclick="remove('.$key->id.')">Hapus</button></label>
				';
			}else{
				$action = '
					<label><button class="mb-2 mr-2 btn btn-warning" onclick="activeUser('.$key->id.', 0)">Nonktifkan User</button></label>
					<label><button class="mb-2 mr-2 btn btn-info" onclick="editUser('.$key->id.')">Edit</button></label>
					<label><button class="mb-2 mr-2 btn btn-danger" onclick="remove('.$key->id.')">Hapus</button></label>
				';
			}

			$row[] = $action;
			

			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->M_pengguna->count_all($table, $where, $joins),
			"recordsFiltered" => $this->M_pengguna->count_filtered($column, $table, $column_order, $column_search, $order, $where, $joins),
			"data" => $data,
		);
		echo json_encode($output);
	}

	public function ajax_get_user_id()
	{
		$id = $this->input->get('id');

		$data = $this->M_pengguna->get_row("*","admin","id = $id");

		$json_data = [
			'result' => TRUE,
			'data' => $data
		];

		print json_encode($json_data);
	}

	public function ajax_action_add_user()
	{
		//FROM VALIDATION
		$this->form_validation->set_rules('name', 'name', 'required');
		$this->form_validation->set_rules('username', 'username', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');
		$this->form_validation->set_rules('id_level', 'id_level', 'required');

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

		$name = $this->input->post('name');
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$id_level = $this->input->post('id_level');

		//CHECK USER
		$select_user = $this->M_pengguna->get_row("*","admin","name = '$name' OR username = '$username'");

		if(count($select_user) > 0)
		{
			$json_data = [
				'result' => FALSE,
				'form_error' => "",
				'message' => ['head' => 'Gagal', 'body' => 'Mohon maaf, user sudah ada!'],
				'redirect' => ''
			];

			print json_encode($json_data);
			die();
		}

		$data = [
			'id_level' => $id_level,
			'name' => $name,
			'username' => $username,
			'password' => $password
		];

		$insert_data = $this->M_pengguna->insert_table("admin", $data);

		if($insert_data == FALSE){
			$json_data = [
				'result' => FALSE,
				'form_error' => "",
				'message' => ['head' => 'Gagal', 'body' => 'Mohon maaf, ada kesalahan saat menambahkan data user. Mohon ulangi beberapa saat lagi!'],
				'redirect' => ''
			];

			print json_encode($json_data);
			die();
		}

		$json_data = [
			'result' => TRUE,
			'form_error' => "",
			'message' => ['head' => 'Berhasil', 'body' => 'Selamat, anda berhasil menambahkan data user!'],
			'redirect' => $this->config->item('index_page').'pengguna'
		];

		print json_encode($json_data);
	}

	public function ajax_action_edit_user()
	{
		$id = $this->input->post('id');
		$name = $this->input->post('name');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$level = $this->input->post('id_level');

		//SET VALIDATION
		$this->form_validation->set_rules('name', 'name', 'required');
		$this->form_validation->set_rules('username', 'username', 'required');
		$this->form_validation->set_rules('id_level', 'id_level', 'required');

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
		$select_user = $this->M_pengguna->get_row("*","admin","(name = '$name' OR username = '$username') AND id != $id");

		if(count($select_user) > 0)
		{
			$json_data = [
				'result' => FALSE,
				'form_error' => "",
				'message' => ['head' => 'Gagal', 'body' => 'Mohon maaf, user sudah ada!'],
				'redirect' => ''
			];

			print json_encode($json_data);
			die();
		}

		//SET DATA IF PASSWORD IS NULL
		if($password == "")
		{
			$data = [
				'name' => $name,
				'username' => $username,
				'id_level' => $level
			];
		}else{
			$data = [
				'name' => $name,
				'username' => $username,
				'password' => $password,
				'id_level' => $level
			];
		}

		//UPDATE USER
		$update_user = $this->M_pengguna->update_table("admin",$data,"id",$id);

		//IF UPDATE SUCCESS
		$json_data = [
			'result' => TRUE,
			'form_error' => "",
			'message' => ['head' => 'Berhasil', 'body' => 'Selamat, anda berhasil merubah data user!'],
			'redirect' => $this->config->item('index_page').'pengguna'
		];

		print json_encode($json_data);
	}

	public function ajax_action_active_user()
	{
		$id = $this->input->post('id');
		$is_active = $this->input->post('is_active');

		$get_row = $this->M_pengguna->get_row("*","admin","id = $id");

		if(count($get_row) < 0)
		{
			$json_data = [
				'result' => FALSE,
				'form_error' => "",
				'message' => ['head' => 'Gagal', 'body' => 'Mohon maaf, user dengan id '.$id.' tidak ditemukan!'],
				'redirect' => ''
			];

			print json_encode($json_data);
			die();
		}

		$data = [
			'is_active' => $is_active
		];

		$update_user = $this->M_pengguna->update_table2("admin",$data,"id = $id");

		if($update_user == FALSE)
		{
			$json_data = [
				'result' => FALSE,
				'form_error' => "",
				'message' => ['head' => 'Gagal', 'body' => 'Mohon maaf, ada kesalahan saat mengaktifkan user. Mohon ulangi beberapa saat lagi!'],
				'redirect' => ''
			];

			print json_encode($json_data);
			die();
		}

		$json_data = [
			'result' => TRUE,
			'form_error' => "",
			'message' => ['head' => 'Berhasil', 'body' => 'Selamat, anda berhasil mengaktifkan user!'],
			'redirect' => $this->config->item('index_page').'pengguna'
		];

		print json_encode($json_data);
	}

	public function ajax_action_delete_user()
	{
		$id = $this->input->post('id');

		$delete_data = $this->M_pengguna->delete_table("admin","id",$id);

		if($delete_data == FALSE)
		{
			$json_data = [
				'result' => FALSE,
				'form_error' => "",
				'message' => ['head' => 'Gagal', 'body' => 'Mohon maaf, ada kesalahan saat menghapus user. Mohon ulangi beberapa saat lagi!'],
				'redirect' => ''
			];

			print json_encode($json_data);
			die();
		}

		$json_data = [
			'result' => TRUE,
			'form_error' => "",
			'message' => ['head' => 'Berhasil', 'body' => 'Selamat, anda berhasil menghapus user!'],
			'redirect' => $this->config->item('index_page').'pengguna'
		];

		print json_encode($json_data);
	}
}
