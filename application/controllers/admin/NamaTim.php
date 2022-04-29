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
			$this->load->model('Tim_model');
		}
	}

	// mengambil data model dan di render
	public function index()
	{

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

			redirect('admin/namatim');
		} else {
			echo "gagal";
		}
	}
}
