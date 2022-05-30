<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Status extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		if (!$this->session->userdata('username')) {
			redirect('auth/login');
		}
		// load model dan library
		$this->load->model('Gardu_model');
		$this->load->model('Tim_model');
		$this->load->model('Status_model');
		$this->load->library('form_validation');
		$this->load->model("User_model");
	}
	// ! pending
	public function pending()
	{
		check_level_admin();
		$data["Status"] = $this->Status_model->getPending();
		$data["users"] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
		$this->load->view("admin/status/list", $data);
	}

	// ! setuju
	public function setuju()
	{
		check_level_admin();
		$data["Status"] = $this->Status_model->getSetuju();
		$data["users"] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
		$this->load->view("admin/status/list", $data);
	}

	// ! tolak
	public function tolak()
	{
		check_level_admin();
		$data["Status"] = $this->Status_model->getTolak();
		$data["users"] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
		$this->load->view("admin/status/list", $data);
	}
}
