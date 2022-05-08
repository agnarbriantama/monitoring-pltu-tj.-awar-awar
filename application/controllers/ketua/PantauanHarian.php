<?php

defined('BASEPATH') or exit('No direct script access allowed');

class PantauanHarian extends CI_Controller
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

	// ! mengambil data model dan di render
	public function index()
	{
		check_level_ketua();
		$data["PantauanHarian"] = $this->PantauanHarian_model->getAll();
		$data["pantauan_tim"] = $this->PantauanHarian_model->pantauan_tim();
		$data["users"] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
		// meload data pada view yang sudah dibuat pada folder view
		$this->load->view("ketua/pantauanharian/list", $data);
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
	// ! delete
	public function delete($id = null)
	{
		if (!isset($id)) show_404();

		if ($this->PantauanHarian_model->delete($id)) {
			$this->session->set_flashdata('success', 'Berhasil dihapus');
			redirect(site_url('admin/PantauanHarian'));
		}
	}
}
