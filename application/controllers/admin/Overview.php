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
	}

	public function index()
	{
		// $data['hasil']=$this->user_model->Jum_kas();
		// load view admin/overview.php
		$this->load->view("admin/overview");
	}
}
