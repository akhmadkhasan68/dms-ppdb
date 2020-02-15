<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dokumen extends MY_Controller
{

	public function __construct()
	{
		$this->load->model('M_dokumen');
	}

	public function index()
	{
		$data['content'] = 'dokumen';
		$data['active'] = 'dokumen';
		$this->load->view('template', $data);
	}


	public function ajax_list_dokumen()
	{
		$column = "*";
		$column_order = array('id', 'name');
		$column_search = array('id', 'name');
		$order = array('id' => 'DESC');
		$where = "";
		$table = "document a";
		$joins = "";
		$list = $this->M_dokumen->get_datatables($column, $table, $column_order, $column_search, $order, $where, $joins);
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $key) {
			$row = array();
			$row[] = $no + 1;
			$row[] = $key->name;
			$row[] = $key->file;
			$row[] = $key->is_approval;
			$row[] = "";
			$row[] = "";
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
