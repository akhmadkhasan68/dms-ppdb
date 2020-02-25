<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Approval extends MY_Controller
{

	public function __construct()
	{
		$this->load->model('M_approval');
		$this->load->helper('common');

		if ($this->session->userdata('logged_in') == FALSE) {
			redirect('login');
		}
	}

	public function index()
	{
		$data['content'] = 'approval';
		$data['active'] = 'approval';
		$data['config'] = config_table();
		$data['get_admin'] = get_admin();
		$data['notif_approve_doc'] = count_notif_approve_doc();
		$data['notif_share_doc'] = count_notif_share_doc();

		$this->load->view('template', $data);
	}

	public function ajax_list_approval()
	{
		$column = "a.id, a.status, a.id_document, d.name, d.file, d.is_approval, d.is_shared, d.shared_by, u.name as name_admin, u.username, l.name as level";
		$column_order = array('a.id', 'd.name');
		$column_search = array('a.id', 'd.name');
		$order = array('a.id' => 'DESC');
		$where = "a.id_admin = " . $this->session->userdata('id');
		$group = "";
		$table = "document_approval a";
		$joins = [
			[
				"table" => "document d",
				"condition" => "d.id = a.id_document",
				"jointype" => "left"
			],
			[
				"table" => "admin u",
				"condition" => "u.id = a.id_admin",
				"jointype" => "right"
			],
			[
				"table" => "level l",
				"condition" => "l.id_level = u.id_level",
				"jointype" => "left"
			]
		];

		$list = $this->M_approval->get_datatables($column, $table, $column_order, $column_search, $order, $where, $joins, $group);

		$data = array();
		$no = $_POST['start'] + 1;

		foreach ($list as $key) {
			$row = array();
			$row[] = $no++;
			$row[] = $key->name;
			$row[] = $key->file;
			$row[] = $key->name_admin . " (" . $key->level . ")";

			if ($key->status == "BELUM") {
				$row[] = '<div style="cursor:pointer;" class="badge badge-warning" onclick="showApproval(' . $key->id . ')" >Menunggu Approval</div>';
			} elseif ($key->status == "DITERIMA") {
				$row[] = "<div class='badge badge-success'>Approval Diterima</div>";
			} elseif ($key->status == "DITOLAK") {
				$row[] = "<div class='badge badge-danger'>Approval Ditolak</div>";
			} else {
				$row[] = '<div class="badge badge-info">Tidak Membutuhkan Approval</div>';
			}

			$row[] = '
				<label><button class="mb-2 mr-2 btn btn-success" onclick="terima(' . $key->id . ')" title="Terima Persetujuan"><i class="fa fa-check"></i></button></label>
				<label><button class="mb-2 mr-2 btn btn-danger" onclick="tolak(' . $key->id . ')" title="Tolak Persetujuan"><i class="fa fa-window-close"></i></button></label>
				<label><button class="mb-2 mr-2 btn btn-secondary" onclick="download(' . $key->id . ')" title="Download Persetujuan"><i class="fa fa-download"></i></button></label>
			';
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->M_approval->count_all($table, $where, $joins),
			"recordsFiltered" => $this->M_approval->count_filtered($column, $table, $column_order, $column_search, $order, $where, $joins),
			"data" => $data,
		);
		echo json_encode($output);
	}

	public function ajax_action_approve()
	{
		$id = $this->input->post('id');
		$status = $this->input->post('status');

		$data = [
			'status' => $status
		];

		$update_data = $this->M_approval->update_table2("document_approval", $data, "id = $id");

		if ($update_data == FALSE) {
			$json_data = [
				'result' => FALSE,
				'form_error' => '',
				'message' => ['head' => 'Gagal', 'body' => 'Mohon maaf, ada kesalahan saat mengubah data, coba ulangi beberapa saat lagi!'],
				'redirect' => ''
			];

			print json_encode($json_data);
			die();
		}

		$json_data = [
			'result' => TRUE,
			'form_error' => '',
			'message' => ['head' => 'Berhasil', 'body' => 'Selamat, anda berhasil mengubah data!'],
			'redirect' => $this->config->item('index_page') . 'approval'
		];

		print json_encode($json_data);
	}
}
