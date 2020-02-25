<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Share extends MY_Controller
{

	public function __construct()
	{
		$this->load->model('M_share');
		$this->load->helper('common');

		if ($this->session->userdata('logged_in') == FALSE) {
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
		$where = "a.id_admin = " . $this->session->userdata('id') . " AND is_shared = 1";
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
		$no = $_POST['start'] + 1;

		foreach ($list as $key) {
			$row = array();
			$row[] = $no++;
			$row[] = $key->name;
			$row[] = $key->file;
			$row[] = $key->name_admin . " (" . $key->level . ")";

			$row[] = '
				<label><button class="mb-2 mr-2 btn btn-info" onclick="sendFile(' . $key->id . ')"" title="Kirim Dokument"><i class="fa fa-paper-plane"></i></button></label>
				<label><button class="mb-2 mr-2 btn btn-secondary" onclick="download()" title="Download Dokument"><i class="fa fa-download"></i></button></label>
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
}
