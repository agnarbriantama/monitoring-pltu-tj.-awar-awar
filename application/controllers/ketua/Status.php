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
		check_level_ketua();
		$data["Status"] = $this->Status_model->getPending();
		$data["users"] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
		$this->load->view("ketua/status/listpending", $data);
	}
	
	// ! setuju
	public function setuju()
	{
		check_level_ketua();
		// $nama = $this->db->where('tb_pantauanharian.id_tim',  $this->session->userdata('id_tim'));
		$data["Status"] = $this->Status_model->getSetuju();
		$data["users"] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
		$this->load->view("ketua/status/list", $data);
	}

	// ! tolak
	public function tolak()
	{
		check_level_ketua();
		$data["Status"] = $this->Status_model->getTolak();
		$data["users"] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
		$this->load->view("ketua/status/list", $data);
	}

	// ! disetujui
	public function disetujui($id)
	{
		$sql = "UPDATE tb_pantauanharian SET status ='1' WHERE id_pantauan =$id";
		$this->db->query($sql);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">  Data Telah Disetujui<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect(site_url('ketua/PantauanHarian'));
	}
	//  ! ditolak
	public function ditolak($id)
	{
		$sql = "UPDATE tb_pantauanharian SET status ='2' WHERE id_pantauan =$id";
		$this->db->query($sql);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">  Data Ditolak <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect(site_url('ketua/PantauanHarian'));
	}
}
