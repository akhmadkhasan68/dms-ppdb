<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dokumen extends MY_Controller
{

	public function __construct()
	{
		$this->load->model('M_dokumen');
		$this->load->helper(array('common', 'file', 'download'));
		$this->load->library('form_validation');

		if ($this->session->userdata('logged_in') == FALSE) {
			redirect('login');
		}
	}

	public function index()
	{
		$data['content'] = 'dokumen';
		$data['active'] = 'dokumen';
		$data['config'] = config_table();
		$data['get_admin'] = get_admin();
		$data['notif_approve_doc'] = count_notif_approve_doc();
		$data['notif_share_doc'] = count_notif_share_doc();

		$this->load->view('template', $data);
	}

	public function ajax_action_add_file()
	{
		//SET VALIDATION
		$this->form_validation->set_rules('name', 'name', 'required');
		$this->form_validation->set_rules('is_approval', 'is_approval', 'required');
		if (empty($_FILES['file']['name']))
		{
			$this->form_validation->set_rules('file', 'file', 'required');
		}

		//CHECK VALIDATION IS RUN OR NOT
		if ($this->form_validation->run() == FALSE) {
			$error = $this->form_validation->error_array();

			$json_data = [
				'result' => false,
				'form_error' => $error,
				'message' => ['head' => 'Gagal', 'body' => 'Mohon maaf, ada beberapa form yang harus diisi!'],
				'redirect' => ''
			];

			print json_encode($json_data);

			die();
		}

		//GET ID USER FROM SESSION
		$id_user = $this->session->userdata('id');

		//SET UPLOAD PATH
		$upload_path = "./uploads/document/$id_user";

		//GENERATE RAND STRING
		$permitted_chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
		$kode = substr(str_shuffle($permitted_chars), 0, 10);
		
		//SET FILE NAME
		$filename = $_FILES["file"]['name'];
		$explode_filename = explode(".", $filename);
		$file_extension = end($explode_filename);
		$file_noextension = pathinfo($_FILES['file']['name'], PATHINFO_FILENAME);

		$file_name = $file_noextension."_".$kode.".".$file_extension;


		//SET CONFIG UPLOAD 
		$config = [
			'upload_path' => $upload_path, //upload path to save the document
			'allowed_types' => "gif|jpg|jpeg|png|doc|docx|xlsx|csv|xls",
			'file_name' =>  $file_name,
			'max_size' => '5000'
		];

		//CHECK DIRECTORY IS EXIST.
		if (!is_dir($upload_path)) {
			mkdir($upload_path, 0777, TRUE);
		}

		$this->load->library('upload', $config); //load library upload

		if(!$this->upload->do_upload("file"))
		{	
			$message = $this->upload->display_errors();
			$message = trim($message,"<p></p>");

			$json_data = [
				'result' => false,
				'form_error' => '',
				'message' => ['head' => 'Gagal', 'body' => $message],
				'redirect' => ''
			];

			print json_encode($json_data);

			die();
		}

		//UPLOAD DOC
		if ($this->upload->do_upload("file")) {
			$data = [
				'id_admin' => $id_user,
				'name' => $this->input->post('name'),
				'file' => $this->upload->data('file_name'),
				'is_approval' => $this->input->post('is_approval'),
				'created_at' => date('Y-m-d H:i:s')
			];

			$id_admin_approval = $this->input->post('id_admin_approval');

			//IF CONDITITION DOCUMENT IS NEED APPROVAL
			if ($data['is_approval'] == 1) {
				//INSERT TO DOC TABLE
				$insert_doc = $this->M_dokumen->insert_table("document", $data);

				//CHECK INSERT DOC IS FAILED
				if ($insert_doc == FALSE) {
					$json_data = [
						'result' => FALSE,
						'form_error' => '',
						'message' => ['head' => 'Gagal', 'body' => 'Mohon maaf, Anda gagal menambahkan data dokumen!'],
						'redirect' => ''
					];

					print json_encode($json_data);

					die();
				}

				//GENERATE LAST INSERT 
				$last_id_doc = $this->db->insert_id();

				//COUNT USER APPROVAL
				$count_user = count($id_admin_approval);

				for ($i = 0; $i < $count_user; $i++) {
					//SET DATA INSERT TO DOCUMENT APPROVAL
					$doc_approval = [
						'id_document' => $last_id_doc,
						'id_admin' => $id_admin_approval[$i],
						'created_at' => date('Y-m-d H:i:s')
					];

					//INSERT TO DOC APPROVAL TABLE
					$insert_doc_approval = $this->M_dokumen->insert_table("document_approval", $doc_approval);
				}

				//CHECK INSERT DOC IS FAILED
				if ($insert_doc_approval == FALSE) {
					$json_data = [
						'result' => FALSE,
						'form_error' => '',
						'message' => ['head' => 'Gagal', 'body' => 'Mohon maaf, Anda gagal menambahkan data approval dokumen!'],
						'redirect' => ''
					];

					print json_encode($json_data);

					die();
				}

				//IF ALL IS SUCCESS
				$json_data = [
					'result' => TRUE,
					'form_error' => '',
					'message' => ['head' => 'Berhasil', 'body' => 'Selamat, Anda berhasil menambahkan data dokumen!'],
					'redirect' => $this->config->item('index_page') . 'dokumen'
				];

				print json_encode($json_data);
			} else {
				//INSERT TO DOC TABLE
				$insert_doc = $this->M_dokumen->insert_table("document", $data);

				//CHECK INSERT DOC IS FAILED
				if ($insert_doc == FALSE) {
					$json_data = [
						'result' => FALSE,
						'form_error' => '',
						'message' => ['head' => 'Gagal', 'body' => 'Mohon maaf, Anda gagal menambahkan data dokumen!'],
						'redirect' => ''
					];

					print json_encode($json_data);

					die();
				}

				//IF ALL IS SUCCESS
				$json_data = [
					'result' => TRUE,
					'form_error' => '',
					'message' => ['head' => 'Berhasil', 'body' => 'Selamat, Anda berhasil menambahkan data dokumen!'],
					'redirect' => $this->config->item('index_page') . 'dokumen'
				];

				print json_encode($json_data);
			}
		} else {
			$error = array('error' => $this->upload->display_errors());
			$data = [

				'message' => 'error',
				'error' => $error
			];

			print json_encode($data);
		}
	}

	public function ajax_action_edit_doc()
	{
		//GET ID USER FROM SESSION
		$id_user = $this->session->userdata('id');

		//DECLARE POST DATA
		$id = $this->input->post('id');
		$name = $this->input->post('name');
		
		$this->form_validation->set_rules('name', 'name', 'required');

		if($this->form_validation->run() == FALSE)
		{
			$error = $this->form_validation->error_array();

			$json_data = [
				'result' => false,
				'form_error' => $error,
				'message' => ['head' => 'Gagal', 'body' => 'Mohon maaf, ada beberapa form yang harus diisi!'],
				'redirect' => ''
			];

			print json_encode($json_data);
			die();
		}

		if(empty($_FILES['file']['name']))
		{
			$data = [
				'name' => $name,
				'updated_at' => date('Y-m-d H:i:s')
			];

			$update_data = $this->M_dokumen->update_table2("document",$data,"id = $id");

			$json_data = [
				'result' => true,
				'form_error' => '',
				'message' => ['head' => 'Berhasil', 'body' => 'Selamat, anda berhasil merubah data dokumen!'],
				'redirect' => $this->config->item('index_page').'dokumen'
			];

			print json_encode($json_data);
		}
		else
		{
			//SET UPLOAD PATH
			$upload_path = "./uploads/document/$id_user";

			//GENERATE RAND STRING
			$permitted_chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
			$kode = substr(str_shuffle($permitted_chars), 0, 10);
			
			//SET FILE NAME
			$filename = $_FILES["file"]['name'];
			$explode_filename = explode(".", $filename);
			$file_extension = end($explode_filename);
			$file_noextension = pathinfo($_FILES['file']['name'], PATHINFO_FILENAME);

			$file_name = $file_noextension."_".$kode.".".$file_extension;


			//SET CONFIG UPLOAD 
			$config = [
				'upload_path' => $upload_path, //upload path to save the document
				'allowed_types' => "gif|jpg|jpeg|png|doc|docx|xlsx|csv|xls",
				'file_name' =>  $file_name,
				'max_size' => '5000'
			];
			
			//CHECK DIRECTORY IS EXIST.
			if (!is_dir($upload_path)) {
				mkdir($upload_path, 0777, TRUE);
			}

			$this->load->library('upload', $config); //load library upload

			if(!$this->upload->do_upload("file"))
			{	
				$message = $this->upload->display_errors();
				$message = trim($message,"<p></p>");

				$json_data = [
					'result' => false,
					'form_error' => '',
					'message' => ['head' => 'Gagal', 'body' => $message],
					'redirect' => ''
				];

				print json_encode($json_data);

				die();
			}

			if($this->upload->do_upload("file"))
			{
				$data = [
					'name' => $name,
					'file' => $this->upload->data('file_name'),
					'updated_at' => date('Y-m-d H:i:s')
				];

				$update_data = $this->M_dokumen->update_table2("document",$data,"id = $id");

				$json_data = [
					'result' => true,
					'form_error' => '',
					'message' => ['head' => 'Berhasil', 'body' => 'Selamat, anda berhasil merubah data dokumen!'],
					'redirect' => $this->config->item('index_page').'dokumen'
				];

				print json_encode($json_data);
			}
			else
			{
				$error = array('error' => $this->upload->display_errors());
				$data = [

					'message' => 'error',
					'error' => $error
				];

				print json_encode($data);
			}
		}
	}

	public function ajax_action_send_doc()
	{
		//ID USER FROM SESSION
		$id_user = $this->session->userdata('id');

		//DECLARE POST DATA
		$id = $this->input->post('id');
		$is_approval = $this->input->post('is_approval');
		$name = $this->input->post('name');
		$file = $this->input->post('file');
		$send_to = $this->input->post('send_to');

		//SET VALIDATION
		$this->form_validation->set_rules('name', 'name', 'required');
		$this->form_validation->set_rules('file', 'file', 'required');
		$this->form_validation->set_rules('send_to[]', 'send_to', 'required');

		//IF VALIDATION RUN
		if ($this->form_validation->run() == FALSE) {
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

		//SET PATH FROM COPY FILE
		$upload_path_from = "./uploads/document/$id_user/$file";
		$file_upload = read_file($upload_path_from);

		for ($i = 0; $i < count($send_to); $i++) {
			$id_admin = $send_to[$i];
			$upload_path_to = "./uploads/document/$id_admin";

			if (!is_dir($upload_path_to)) {
				mkdir($upload_path_to, 0777, TRUE);
			}

			write_file($upload_path_to."/$file", $file_upload);

			$data = [
				'id_admin' => $id_admin,
				'name' => $name,
				'file' => $file,
				'is_approval' => $is_approval,
				'is_shared' => '1',
				'shared_by' => $id_user,
				'created_at' => date('Y-m-d H:i:s')
			];

			$insert_table = $this->M_dokumen->insert_table("document", $data);
		}

		$json_data = [
			'result' => TRUE,
			'form_error' => '',
			'message' => ['head' => 'Berhasil', 'body' => 'Selamat, dokumen berhasil dikirim'],
			'redirect' => $this->config->item('index_page') . 'dokumen'
		];

		print json_encode($json_data);
	}

	public function ajax_get_doc_by_id()
	{
		$id = $this->input->get('id');

		$data = $this->M_dokumen->get_row("*", "document", "id = $id", "", "", FALSE);

		$joins = [
			[
				'table' => 'admin a',
				'condition' => 'a.id = d.id_admin',
				'jointype' => 'left'
			],
			[
				'table' => 'level l',
				'condition' => 'l.id_level = a.id_level',
				'jointype' => 'left'
			]
		];
		$data_approval = $this->M_dokumen->fetch_joins("document_approval d", "d.status, a.name, a.username, l.name as level", $joins,"d.id_document = $id");

		$nama_admin = [];
		$username = [];
		$level = [];
		foreach($data_approval as $approval){
			array_push($nama_admin, $approval->name);
			array_push($username, $approval->username);
			array_push($level, $approval->level);
		}	

		$json_data = [
			'result' => TRUE,
			'data' => $data,
			'nama_admin_approval' => $nama_admin,
			'username_approval' => $username,
			'level_approval' => $level,
		];

		print json_encode($json_data);
	}

	public function ajax_list_dokumen()
	{
		$column = "a.id, a.id_admin, a.name, a.file, a.is_approval, a.is_shared, a.shared_by, a.created_at, d.id as id_approval, d.id_admin, d.status";
		$column_order = array('a.id', 'a.name', 'a.file', 'a.is_approval', 'd.status');
		$column_search = array('a.id', 'a.name', 'a.file', 'a.is_approval', 'd.status');
		$order = array('a.id' => 'DESC');
		$where = "a.id_admin = ".$this->session->userdata('id')." AND a.is_shared IS NULL";
		$group = "d.id_document";
		$table = "document a";
		$joins = [
			[
				"table" => "document_approval d",
				"condition" => "d.id_document = a.id",
				"jointype" => "left"
			]
		];

		$list = $this->M_dokumen->get_datatables($column, $table, $column_order, $column_search, $order, $where, $joins, $group);

		$data = array();
		$no = $_POST['start'] + 1;

		foreach ($list as $key) {
			$row = array();
			$row[] = $no++;
			$row[] = $key->name;
			$row[] = $key->file;

			if ($key->is_approval == 1) {
				$row[] = '<div class="badge badge-success">Ya</div>';
			} else {
				$row[] = '<div class="badge badge-danger">Tidak</div>';
			}

			if ($key->status == "BELUM") {
				$row[] = '<div style="cursor:pointer;" class="badge badge-warning" onclick="showApproval(' . $key->id . ')" >Menunggu Approval</div>';
			} elseif ($key->status == "DITERIMA") {
				$row[] = "<div class='badge badge-success'>Approval Diterima</div>";
			} elseif ($key->status == "DITOLAK") {
				$row[] = "<div class='badge badge-danger'>Approval Ditolak</div>";
			} else {
				$row[] = '<div class="badge badge-info">Tidak Membutuhkan Approval</div>';
			}

			if ($key->is_approval == 1) {
				$row[] = '
					<label><button class="mb-2 mr-2 btn btn-primary" onclick="editFile('.$key->id.')"><i class="fa fa-pen"></i></button></label>
					<label><button class="mb-2 mr-2 btn btn-info" onclick="sendFile('.$key->id.')"><i class="fa fa-paper-plane"></i></button></label>
					<label><button class="mb-2 mr-2 btn btn-danger" onclick="remove('.$key->id.')"><i class="fa fa-trash"></i></button></label>
					<label><button class="mb-2 mr-2 btn btn-secondary" onclick="download('.$key->id.')"><i class="fa fa-download"></i></button></label>
					<label><button class="mb-2 mr-2 btn btn-success" onclick="downloadApproval('.$key->id.')"><i class="fa fa-print"></i> Cetak Persetujuan</button></label>
				';
			} else {
				$row[] = '
					<label><button class="mb-2 mr-2 btn btn-primary" onclick="editFile('.$key->id.')"><i class="fa fa-pen"></i></button></label>
					<label><button class="mb-2 mr-2 btn btn-info" onclick="sendFile('.$key->id.')"><i class="fa fa-paper-plane"></i></button></label>
					<label><button class="mb-2 mr-2 btn btn-danger" onclick="remove('.$key->id.')"><i class="fa fa-trash"></i></button></label>
					<label><button class="mb-2 mr-2 btn btn-secondary" onclick="download('.$key->id.')"><i class="fa fa-download"></i></button></label>
				';
			}
			
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->M_dokumen->count_all($table, $where, $joins),
			"recordsFiltered" => $this->M_dokumen->count_filtered($column, $table, $column_order, $column_search, $order, $where, $joins),
			"data" => $data,
		);
		echo json_encode($output);
	}

	public function ajax_get_approval()
	{
		$id = $this->input->get('id');

		$columns = "d.name, d.file, u.username, l.name as level, a.status, u.name as admin, u.username";
		$where = "a.id_document = $id";
		$table = "document_approval a";
		$joins = [
			[
				"table" => "document d",
				"condition" => "d.id = a.id_document",
				"jointype" => "right"
			],
			[
				"table" => "admin u",
				"condition" => "u.id = a.id_admin",
				"jointype" => "right"
			],
			[
				"table" => "level l",
				"condition" => "l.id_level = u.id_level",
				"jointype" => "right"
			]
		];

		$get_row = $this->M_dokumen->fetch_joins($table, $columns, $joins, $where, $return_array);

		$json_data = [
			'result' => TRUE,
			'data' => $get_row
		];

		print json_encode($json_data);
	}

	public function ajax_action_delete_dokumen()
	{
		$id = $this->input->post('id');

		$delete_document = $this->M_dokumen->delete_table("document", "id", $id);
		$delete_document_approval = $this->M_dokumen->delete_table("document_approval", "id_document", $id);

		//SELECT FILE
		$select_data = $this->M_dokumen->get_row("*", "document", "id = $id");
		//DELETE FILE
		$path_file = "./uploads/document/$id_user/$select_data->file";
		delete_files($path_file);

		if ($delete_document == FALSE && $delete_document_approval == FALSE) {
			$json_data = [
				'result' => FALSE,
				'form_error' => "",
				'message' => ['head' => 'Gagal', 'body' => 'Mohon maaf, ada kesalahan saat menghapus dokumen. Mohon ulangi beberapa saat lagi!'],
				'redirect' => ''
			];

			print json_encode($json_data);
			die();
		}

		$json_data = [
			'result' => TRUE,
			'form_error' => "",
			'message' => ['head' => 'Berhasil', 'body' => 'Selamat, anda berhasil menghapus dokumen!'],
			'redirect' => $this->config->item('index_page') . 'dokumen'
		];

		print json_encode($json_data);
	}

	public function ajax_action_download_file($id)
	{
		//$id = $this->input->get('id');

		$select_data = $this->M_dokumen->get_row("*", "document", "id = $id");

		$id_admin = $select_data->id_admin;
		$name = $select_data->name;
		$file = $select_data->file;

		echo $file_dir = './uploads/document/'.$id_admin.'/'.$file;

		force_download($file_dir, NULL);
	}

	public function cetak_bukti_approval()
	{	
		$this->load->view('cetak_bukti/cetak_bukti');
	}

	public function ajax_get_approval_data()
	{
		$id_document = $this->input->get('id');

		$table = 'document_approval a';
		$columns = "uu.name as sender,a.status, a.updated_at, d.name, d.file, u.name as admin, u.username, l.name as level";
		$joins = [
			[
				'table' => 'document d',
				'condition' => 'd.id = a.id_document',
				'left'
			],
			[
				'table' => 'admin u',
				'condition' => 'u.id = a.id_admin',
				'left'
			],
			[
				'table' => 'level l',
				'condition' => 'l.id_level = u.id_level',
				'left'
			],
			[
				'table' => 'admin uu',
				'condition' => 'uu.id = d.id_admin',
				'left'
			],
		];
		$where = "a.id_document = $id_document";

		$data = $this->M_dokumen->fetch_joins($table, $columns, $joins,$where);

		$json_data = [
			'result' => TRUE,
			'data' => $data
		];

		print json_encode($json_data);
	}
}
