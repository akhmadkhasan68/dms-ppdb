<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dokumen extends MY_Controller
{

	public function __construct()
	{
		$this->load->model('M_dokumen');
		$this->load->helper('common');
		$this->load->library('form_validation');

		if($this->session->userdata('logged_in') == FALSE)
		{
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

		$this->load->view('template', $data);
	}

	public function ajax_action_add_file()
	{		
		//SET VALIDATION
		$this->form_validation->set_rules('name', 'name', 'required');
		if (empty($_FILES['file']['name']))
		{
			$this->form_validation->set_rules('file', 'file', 'required');
		}
		$this->form_validation->set_rules('is_approval', 'is_approval', 'required');

		//CHECK VALIDATION IS RUN OR NOT
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

		//GET ID USER FROM SESSION
		$id_user = $this->session->userdata('id');

		//SET UPLOAD PATH
		$upload_path = "./uploads/document/$id_user";

		//GENERATE RAND STRING
		$permitted_chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    	$kode = substr(str_shuffle($permitted_chars), 0, 10);

		//SET CONFIG UPLOAD 
		$config = [
			'upload_path' => $upload_path, //upload path to save the document
			'allowed_types' => "gif|jpg|jpeg|png|doc|docx|xlsx|csv|xls",
			'file_name' => $kode."_".$_FILES["file"]['name'] //allowed extension file
			// 'encrypt_name' => TRUE
		];
		
		//CHECK DIRECTORY IS EXIST.
		if (!is_dir($upload_path)) {
			mkdir($upload_path, 0777, TRUE);
		}

		$this->load->library('upload', $config); //load library upload

		//UPLOAD DOC
		if($this->upload->do_upload("file"))
		{ 
			$data = [
				'id_admin' => $id_user,
				'name' => $this->input->post('name'),
				'file' => $this->upload->data('file_name'),
				'is_approval' => $this->input->post('is_approval'),
				'created_at' => date('Y-m-d H:i:s')
			];

			$id_admin_approval = $this->input->post('id_admin_approval');

			//IF CONDITITION DOCUMENT IS NEED APPROVAL
			if($data['is_approval'] == 1)
			{
				//INSERT TO DOC TABLE
				$insert_doc = $this->M_dokumen->insert_table("document", $data);

				//CHECK INSERT DOC IS FAILED
				if($insert_doc == FALSE)
				{
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

				for($i = 0; $i < $count_user; $i++){
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
				if($insert_doc_approval == FALSE)
				{
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
					'redirect' => $this->config->item('index_page').'dokumen'
				];

				print json_encode($json_data);
			}
			else
			{
				//INSERT TO DOC TABLE
				$insert_doc = $this->M_dokumen->insert_table("document", $data);

				//CHECK INSERT DOC IS FAILED
				if($insert_doc == FALSE)
				{
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
					'redirect' => $this->config->item('index_page').'dokumen'
				];

				print json_encode($json_data);
			}
		}else{
			$error = array('error' => $this->upload->display_errors());
			$data = [

				'message' => 'error',
				'error' => $error
			];

			print json_encode($data);
		}
	}

	public function ajax_list_dokumen()
	{
		$column = "a.id, a.id_admin, a.name, a.file, a.is_approval, a.is_shared, a.shared_by, a.created_at, d.id as id_approval, d.id_admin, d.status";
		$column_order = array('a.id', 'name');
		$column_search = array('a.id', 'name');
		$order = array('a.id' => 'DESC');
		$where = "a.id_admin = ".$this->session->userdata('id');
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
		$no = $_POST['start']+1;

		foreach ($list as $key) {
			$row = array();
			$row[] = $no++;
			$row[] = $key->name;
			$row[] = $key->file;

			if($key->is_approval == 1)
			{
				$row[] = '<div class="badge badge-success">Ya</div>';
			}else
			{
				$row[] = '<div class="badge badge-danger">Tidak</div>';
			}

			if($key->status == "BELUM")
			{
				$row[] = '<div style="cursor:pointer;" class="badge badge-warning" onclick="showApproval('.$key->id.')" >Menunggu Approval</div>';
			}
			elseif($key->status == "DITERIMA")
			{
				$row[] = "<div class='badge badge-success'>Approval Diterima</div>";
			}
			elseif($key->status == "DITOLAK")
			{
				$row[] = "<div class='badge badge-danger'>Approval Ditolak</div>";
			}
			else
			{
				$row[] = '<div class="badge badge-info">Tidak Membutuhkan Approval</div>';
			}
			
			$row[] = '
				<label><button class="mb-2 mr-2 btn btn-primary" data-toggle="modal" data-target="#modal_edit_dokument"><i class="fa fa-pen"></i></button></label>
				<label><button class="mb-2 mr-2 btn btn-info" data-toggle="modal" data-target="#modal_send_dokument"><i class="fa fa-paper-plane"></i></button></label>
				<label><button class="mb-2 mr-2 btn btn-danger" onclick="remove()"><i class="fa fa-trash"></i></button></label>
				<label><button class="mb-2 mr-2 btn btn-secondary" onclick="download()"><i class="fa fa-download"></i></button></label>
				<label><button class="mb-2 mr-2 btn btn-success" onclick="download()"><i class="fa fa-print"></i></button></label>
			';
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
}
