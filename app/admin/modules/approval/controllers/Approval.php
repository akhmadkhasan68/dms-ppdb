<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Approval extends MY_Controller
{

	public function __construct()
	{
		$this->load->model('M_approval');
		$this->load->helper('common');

		if($this->session->userdata('logged_in') == FALSE)
		{
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
		
		$this->load->view('template', $data);
	}

	public function ajax_list_approval()
	{
		$column = "a.id, a.status, a.id_document, d.name, d.file, d.is_approval, d.is_shared, d.shared_by, u.name as name_admin, u.username, l.name as level";
		$column_order = array('a.id', 'd.name');
		$column_search = array('a.id', 'd.name');
		$order = array('a.id' => 'DESC');
		$where = "a.id_admin = ".$this->session->userdata('id');
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
		$no = $_POST['start']+1;
		
		foreach ($list as $key) {
			$row = array();
			$row[] = $no++;
			$row[] = $key->name;
			$row[] = $key->file;
			$row[] = $key->name_admin." (".$key->level.")";
			
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
				<label><button class="mb-2 mr-2 btn btn-success" onclick="terima()"><i class="fa fa-check"></i></button></label>
				<label><button class="mb-2 mr-2 btn btn-danger" onclick="tolak()"><i class="fa fa-window-close"></i></button></label>
				<label><button class="mb-2 mr-2 btn btn-secondary" onclick="download()"><i class="fa fa-download"></i></button></label>
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
}
