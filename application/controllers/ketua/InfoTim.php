<?php

defined('BASEPATH') or exit('No direct script access allowed');

class InfoTim extends CI_Controller
{
	public function __construct()
	{
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
		$data["users_ketua"] = $this->user_model->users_ketua();
		$data["users_tim"] = $this->user_model->users_tim();
		$data["User"] = $this->user_model->getAll();
		$data["users"] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
		$this->load->view("ketua/InfoTim/list", $data);
	}
}
