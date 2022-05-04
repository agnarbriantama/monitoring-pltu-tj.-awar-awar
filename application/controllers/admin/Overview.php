<?php defined('BASEPATH') or exit('No direct script access allowed');

class Overview extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		if (!$this->session->userdata('username')) {
			redirect('auth/login');
		}
		$this->load->model("user_model");
		$this->load->model("Overview_model");
	}

	public function index()
	{
		check_level_admin();
		// check_level_ketua();
		// check_level_anggota();
		$data['hasil'] = $this->Overview_model->Jum_data();
		$data["users"] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
		// load view admin/overview.php
		$this->load->view("admin/Overview", $data);
	}
}
