<?php

defined('BASEPATH') or exit('No direct script access allowed');

class NamaTim extends CI_Controller
{
	public function __construct()
	{
		// untuk menjalankan program pertama kali dieksekusi
		parent::__construct();
		if (!$this->session->userdata('username')) {
			redirect('auth/login');
		}
		$this->load->model('Tim_model');
		$this->load->library('form_validation');
	}

	// mengambil data model dan di render
	public function index()
	{
		check_level_admin();
		$data["users"] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
		$data["tim"] = $this->Tim_model->getAll();
		// meload data pada view yang sudah dibuat pada folder view
		$this->load->view("admin/namatim/list", $data);
	}

	public function tambah_tim()
	{
		$data["users"] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
		// meload data pada view  	yang sudah dibuat pada folder view
		$this->load->view("admin/namatim/new_form", $data);
	}

	public function proses()
	{
		if ($this->input->Server('REQUEST_METHOD') === 'POST') {
			$data = $this->input->post();
			$this->db->insert('tim', $data);

			redirect('admin/NamaTim');
		} else {
			echo "gagal";
		}
	}

	public function edit($id = NULL)
	{
		$data["users"] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
		$this->form_validation->set_rules('nama_tim', 'Nama_Tim', 'required');
		
		$data["tim"] = $this->Tim_model->getById($id);

		if ($this->form_validation->run()) {
			$this->Tim_model->update();
		}
		$this->load->view("admin/NamaTim/edit_form", $data);
		$this->session->set_flashdata('success', 'Berhasil diupdate');
	}
}
