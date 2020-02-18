<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendaftaran extends MY_Controller
{

	public function __construct()
	{
		$this->load->model('M_pendaftaran');
	}

	public function index()
	{
		$data['content'] = 'pendaftaran';
		$data['active'] = 'pendaftaran';
		$this->load->view('template', $data);
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
			$add = $this->M_pendaftaran->insert_table("student", $data);
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
					"message" => array('head' => 'Success', 'body' => 'Sukses Mengisi data'),
					"form_error" => '',
					"redirect" => '' . base_url() . $this->config->item('index_page') . 'pendaftaran'
				);
				print json_encode($json_data);
			}
		}
	}
}
