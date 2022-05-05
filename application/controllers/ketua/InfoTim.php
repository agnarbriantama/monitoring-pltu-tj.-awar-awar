<?php

defined('BASEPATH') or exit('No direct script access allowed');

class InfoTim extends CI_Controller
{
	// membuat class construct
	public function __construct()
	{
		// untuk menjalankan program pertama kali dieksekusi
		parent::__construct();

		if (!$this->session->userdata('username')) {
			redirect('auth/login');
		}
		// load model dan library
		$this->load->model('Gardu_model');
		$this->load->model('PantauanHarian_model');
		$this->load->library('form_validation');
		$this->load->model("user_model");
	}

	// mengambil data model dan di render
	public function index()
	{
		check_level_ketua();
		// untuk mengambil data dari model secara keseluruhan
		$data["users_ketua"] = $this->user_model->users_ketua();
		$data["users_tim"] = $this->user_model->users_tim();
		$data["User"] = $this->user_model->getAll();
		$data["users"] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
		// meload data pada view yang sudah dibuat pada folder view
		$this->load->view("ketua/InfoTim/list", $data);
	}
}
