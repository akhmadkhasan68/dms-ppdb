<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendaftaran extends MY_Controller
{

	public function __construct()
	{
		$this->load->model('M_pendaftaran');
		$this->load->helper(array('common', 'file', 'download'));
		$this->load->library('form_validation');

		if($this->session->userdata('logged_in') == FALSE)
		{
			redirect('login');
		}
	}

	public function index()
	{
		$data['content'] = 'siswa';
		$data['active'] = 'pendaftaran';
		$data['config'] = config_table();
		$data['get_admin'] = get_admin();
		$data['notif_approve_doc'] = count_notif_approve_doc();
		$data['notif_share_doc'] = count_notif_share_doc();
		
		$this->load->view('template', $data);
	}

	public function detail_siswa($id)
	{
		$data['content'] = 'detail_pendaftaran';
		$data['active'] = 'pendaftaran';
		$data['config'] = config_table();
		$data['get_admin'] = get_admin();
		$data['notif_approve_doc'] = count_notif_approve_doc();
		$data['notif_share_doc'] = count_notif_share_doc();
		$data['id_student'] = $id;

		$this->load->view('template', $data);
	}

	public function ajax_list_pendaftaran()
	{
		$column = "*";
		$column_order = array('a.id', 'a.nama_siswa', 'a.nisn', 'a.status_pendaftaran');
		$column_search = array('a.id', 'a.nama_siswa', 'a.nisn', 'a.status_pendaftaran');
		$order = array('a.id' => 'DESC');
		$where = "";
		$group = "";
		$table = "student a";
		$joins = "";

		$list = $this->M_pendaftaran->get_datatables($column, $table, $column_order, $column_search, $order, $where, $joins, $group);

		$data = array();
		$no = $_POST['start'] + 1;

		foreach ($list as $key) {
			$row = array();
			$row[] = $no++;
			$row[] = $key->nama_siswa;
			$row[] = $key->nisn;

			if($key->status_pendaftaran == "BELUM")
			{
				$row[] = "<div class='badge badge-warning'>Menunggu Verifikasi</div>";
			}
			elseif($key->status_pendaftaran == "DITERIMA")
			{
				$row[] = "<div class='badge badge-success'>Diterima</div>";
			}else{
				$row[] = "<div class='badge badge-danger'>Ditolak</div>";
			}

			$row[] = '
				<label><button class="mb-2 mr-2 btn btn-primary" onclick="open_detail('. $key->id .')">Detail</button></label>
				<label><button class="mb-2 mr-2 btn btn-info" onclick="verifSiswa('. $key->id .')">Verifikasi</button></label>
				<label><button class="mb-2 mr-2 btn btn-danger" onclick="remove('. $key->id .')">Hapus</button></label>
			';
			$data[] = $row;
		}


		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->M_pendaftaran->count_all($table, $where, $joins),
			"recordsFiltered" => $this->M_pendaftaran->count_filtered($column, $table, $column_order, $column_search, $order, $where, $joins),
			"data" => $data,
		);

		echo json_encode($output);
	}

	public function ajax_get_pendaftaran_by_id()				
	{
		$id = $this->input->get('id');

		$data = $this->M_pendaftaran->get_row("*", "student", "id = $id", "", "", FALSE);

		$json_data = [
			'result' => TRUE,
			'data' => $data
		];

		print json_encode($json_data);
	}

	public function ajax_action_verif_siswa()
	{
		$id = $this->input->post('id');
		$status_pendaftaran = $this->input->post('status_pendaftaran');

		$data = [
			'status_pendaftaran' => $status_pendaftaran,
			'updated_at' => date('Y-m-d H:i:s')
		];

		$update_status = $this->M_pendaftaran->update_table2("student",$data,"id = $id");

		$json_data = [
			'result' => TRUE,
			'form_error' => '',
			'message' => ['head' => 'Berhasil', 'body' => 'Selamat, anda berhasil merubah status pendaftaran siswa!'],
			'redirect' => $this->config->item('index_page').'pendaftaran'
		];

		print json_encode($json_data);
	}

	public function ajax_ation_delete_student()
	{
		$id = $this->input->post('id');

		$delete = $this->M_pendaftaran->delete_table("student","id",$id);

		$json_data = [
			'result' => TRUE,
			'form_error' => '',
			'message' => ['head' => 'Berhasil', 'body' => 'Selamat, anda berhasil menghapus pendaftaran siswa!'],
			'redirect' => $this->config->item('index_page').'pendaftaran'
		];

		print json_encode($json_data);
	}

	public function ajax_action_edit_student()
	{
		$id = $this->input->post('id');

		$this->form_validation->set_rules('nama_siswa', 'nama_siswa', 'required');
		$this->form_validation->set_rules('tempat_lahir', 'tempat_lahir', 'required');
		$this->form_validation->set_rules('tanggal_lahir', 'tanggal_lahir', 'required');
		$this->form_validation->set_rules('kewarganegaraan_siswa', 'jenis_kelamin', 'required');
		$this->form_validation->set_rules('anak_bersaudara', 'anak_bersaudara', 'required');
		$this->form_validation->set_rules('anak_ke', 'anak_ke', 'required');
		$this->form_validation->set_rules('nisn', 'nisn', 'required');
		$this->form_validation->set_rules('nama_ayah', 'nama_ayah', 'required');
		$this->form_validation->set_rules('kewarganegaraan_ayah', 'kewarganegaraan_ayah', 'required');
		$this->form_validation->set_rules('pekerjaan_ayah', 'pekerjaan_ayah', 'required');
		$this->form_validation->set_rules('alamat_ayah', 'alamat_ayah', 'required');
		$this->form_validation->set_rules('hp_ayah', 'hp_ayah', 'required');
		$this->form_validation->set_rules('agama_ayah', 'agama_ayah', 'required');
		$this->form_validation->set_rules('nama_ibu', 'nama_ibu', 'required');
		$this->form_validation->set_rules('kewarganegaraan_ibu', 'kewarganegaraan_ibu', 'required');
		$this->form_validation->set_rules('pekerjaan_ibu', 'pekerjaan_ibu', 'required');
		$this->form_validation->set_rules('alamat_ibu', 'alamat_ibu', 'required');
		$this->form_validation->set_rules('hp_ibu', 'hp_ibu', 'required');
		$this->form_validation->set_rules('agama_ibu', 'agama_ibu', 'required');
		$this->form_validation->set_rules('nama_wali', 'nama_wali', 'required');
		$this->form_validation->set_rules('kewarganegaraan_wali', 'kewarganegaraan_wali', 'required');
		$this->form_validation->set_rules('pekerjaan_wali', 'pekerjaan_wali', 'required');
		$this->form_validation->set_rules('alamat_wali', 'alamat_wali', 'required');
		$this->form_validation->set_rules('hp_wali', 'hp_wali', 'required');
		$this->form_validation->set_rules('agama_wali', 'agama_wali', 'required');

		if ($this->form_validation->run() == FALSE) {
			$error = $this->form_validation->error_array();
			$json_data =  array(
				"result" => FALSE,
				"message" => array('head' => 'Failed', 'body' => 'Mohon maaf, ada beberapa form yang harus diisi!'),
				"form_error" => $error,
				"redirect" => ''
			);
			print json_encode($json_data);
			die();
		}

		$data = [
			'nama_siswa' => post('nama_siswa'),
			'tempat_lahir' => post('tempat_lahir'),
			'tanggal_lahir' => post('tanggal_lahir'),
			'kewarganegaraan_siswa' => post('kewarganegaraan_siswa'),
			'anak_bersaudara' => post('anak_bersaudara'),
			'anak_ke' => post('anak_ke'),
			'nisn' => post('nisn'),
			'nama_ayah' => post('nama_ayah'),
			'kewarganegaraan_ayah' => post('kewarganegaraan_ayah'),
			'pekerjaan_ayah' => post('pekerjaan_ayah'),
			'alamat_ayah' => post('alamat_ayah'),
			'hp_ayah' => post('hp_ayah'),
			'agama_ayah' => post('agama_ayah'),
			'nama_ibu' => post('nama_ibu'),
			'kewarganegaraan_ibu' => post('kewarganegaraan_ibu'),
			'pekerjaan_ibu' => post('pekerjaan_ibu'),
			'alamat_ibu' => post('alamat_ibu'),
			'hp_ibu' => post('hp_ibu'),
			'agama_ibu' => post('agama_ibu'),
			'nama_wali' => post('nama_wali'),
			'kewarganegaraan_wali' => post('kewarganegaraan_wali'),
			'pekerjaan_wali' => post('pekerjaan_wali'),
			'alamat_wali' => post('alamat_wali'),
			'hp_wali' => post('hp_wali'),
			'agama_Wali' => post('agama_wali'),
			'updated_at' => date('Y-m-d H:i:s')
		];

		$update_data = $this->M_pendaftaran->update_table2("student",$data,"id = $id");

		$json_data = [
			'result' => TRUE,
			'form_error' => '',
			'message' => ['head' => 'Berhasil', 'body' => 'Selamat, anda berhasil mengubah data siswa!'],
			'redirect' => $this->config->item('index_page').'pendaftaran'
		];

		print json_encode($json_data);
	}
}
