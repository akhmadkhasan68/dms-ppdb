<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ppdb extends MY_Controller
{

	public function __construct()
	{
		$this->load->helper('common');
		$this->load->library(array('form_validation', 'session'));
		$this->load->model('M_ppdb');
	}

	public function index()
	{

		$data['content'] = 'dashboard/dashboard';
		$data['active'] = 'dashboard';
		$data['config'] = config_table();
		$this->load->view('templatetwo', $data);
	}

	public function pendaftaran()
	{
		$data['content'] = 'pendaftaran/pendaftaran';
		$data['active'] = 'pendaftaran';
		$data['config'] = config_table();
		$this->load->view('templatetwo', $data);
	}
	public function pengumuman()
	{
		$data['content'] = 'pengumuman/pengumuman';
		$data['active'] = 'pengumuman';
		$this->load->view('templatetwo', $data);
	}

	public function pengumuman_cetak()
	{
		$this->load->view('pengumuman/cetak_pendaftaran');
	}

	public function ajax_add_pendaftar()
	{
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
				"message" => array('head' => 'Failed', 'body' => 'Pastikan Data terisi Semua'),
				"form_error" => $error,
				"redirect" => ''
			);
			print json_encode($json_data);
			die();
		} else {
			$desired_length = 5;
			$unique = uniqid();
			$random = substr($unique, 0, $desired_length);
			$data = array(
				'kode' => strtoupper($random),
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
				'agama_wali' => post('agama_wali')
			);
			$add = $this->M_ppdb->insert_table("student", $data);
			if ($add == FALSE) {
				$json_data =  array(
					"result" => FALSE,
					"message" => array('head' => 'Failed', 'body' => 'Gagal Menambah Data'),
					"form_error" => $error,
					"redirect" => ''
				);
				print json_encode($json_data);
				die();
			} else {
				$json_data =  array(
					"result" => TRUE,
					"message" => array('head' => 'Success', 'body' => 'Selamat pendaftaran anda berhasil'),
					"form_error" => '',
					"redirect" => '' . base_url() . $this->config->item('index_page') . 'ppdb'
				);
				print json_encode($json_data);
			}
		}
	}

	public function ajax_cek_status_siswa()
	{
		$nisn = $this->input->post("nisn");
		$data = $this->M_ppdb->fetch_table("*", "student", "nisn=" . $nisn, "", "", "", "", TRUE);

		if (count($data) == 0) {
			$json_data =  array(
				"result" => FALSE,
				"message" => array('head' => 'Failed', 'body' => 'Data kosong'),
				"form_error" => ''
			);
			print json_encode($json_data);
			die();
		} else {
			$json_data =  array(
				"result" => TRUE,
				"message" => array('head' => 'Success', 'body' => 'Berhasil ambil data'),
				"form_error" => '',
				"data" => $data
			);
			print json_encode($json_data);
		}
	}
}
