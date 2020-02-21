<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Share extends MY_Controller
{

	public function __construct()
	{
		$this->load->model('M_share');
		$this->load->helper(array('common', 'file'));
		$this->load->library('form_validation');

		if($this->session->userdata('logged_in') == FALSE)
		{
			redirect('login');
		}
	}

	public function index()
	{
		$data['content'] = 'share';
		$data['active'] = 'share';
		$data['config'] = config_table();
		$data['get_admin'] = get_admin();
		$data['notif_approve_doc'] = count_notif_approve_doc();
		$data['notif_share_doc'] = count_notif_share_doc();
		
		$this->load->view('template', $data);
	}

	public function ajax_list_sharing()
	{
		$column = "a.id, a.name, a.file, a.is_approval, a.is_shared, a.shared_by, d.name as name_admin, d.username, l.name as level";
		$column_order = array('a.id', 'a.name', 'd.name');
		$column_search = array('a.id', 'a.name', 'd.name');
		$order = array('a.id' => 'DESC');
		$where = "a.id_admin = ".$this->session->userdata('id')." AND a.is_shared IS NOT NULL";
		$group = "";
		$table = "document a";
		$joins = [
			[
				"table" => "admin d",
				"condition" => "d.id = a.shared_by",
				"jointype" => "left"
			],
			[
				"table" => "level l",
				"condition" => "l.id_level = d.id_level",
				"jointype" => "left"
			]
		];

		$list = $this->M_share->get_datatables($column, $table, $column_order, $column_search, $order, $where, $joins, $group);

		$data = array();
		$no = $_POST['start']+1;
		
		foreach ($list as $key) {
			$row = array();
			$row[] = $no++;
			$row[] = $key->name;
			$row[] = $key->file;
			$row[] = $key->name_admin." (".$key->level.")";

			$row[] = '
				<label><button class="mb-2 mr-2 btn btn-info" onclick="sendFile('.$key->id.')""><i class="fa fa-paper-plane"></i></button></label>
				<label><button class="mb-2 mr-2 btn btn-secondary" onclick="download()"><i class="fa fa-download"></i></button></label>
			';
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->M_share->count_all($table, $where, $joins),
			"recordsFiltered" => $this->M_share->count_filtered($column, $table, $column_order, $column_search, $order, $where, $joins),
			"data" => $data,
		);
		echo json_encode($output);
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

		//SET PATH FROM COPY FILE
		$upload_path_from = "./uploads/document/$id_user/$file";
		$file_upload = read_file($upload_path_from);

		for($i = 0; $i < count($send_to); $i++)
		{
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
			
			$insert_table = $this->M_share->insert_table("document",$data);
		}

		$json_data = [
			'result' => TRUE,
			'form_error' => '',
			'message' => ['head' => 'Berhasil', 'body' => 'Selamat, dokumen berhasil dikirim'],
			'redirect' => $this->config->item('index_page').'share'
		];

		print json_encode($json_data);
	}
}
