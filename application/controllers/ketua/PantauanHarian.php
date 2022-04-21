<?php

defined('BASEPATH') or exit('No direct script access allowed');

class PantauanHarian extends CI_Controller
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
		// untuk mengambil data dari model secara keseluruhan
		$data["PantauanHarian"] = $this->PantauanHarian_model->getAll();
		// meload data pada view yang sudah dibuat pada folder view
		$this->load->view("ketua/pantauanharian/list", $data);
	}

	//disetujui
	public function disetujui($id)
	{
		$sql = "UPDATE tb_pantauanharian SET status ='1' WHERE id_pantauan =$id";
		$this->db->query($sql);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">  Data Telah Disetujui<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect(site_url('ketua/pantauanharian'));
	}

	public function ditolak($id)
	{
		$sql = "UPDATE tb_pantauanharian SET status ='2' WHERE id_pantauan =$id";
		$this->db->query($sql);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">  Data Ditolak <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect(site_url('ketua/pantauanharian'));
	}



	// untuk fungsi delete dengan nilai defaultnya null
	public function delete($id = null)
	{
		if (!isset($id)) show_404();

		if ($this->PantauanHarian_model->delete($id)) {
			$this->session->set_flashdata('success', 'Berhasil dihapus');
			redirect(site_url('admin/PantauanHarian'));
		}
	}
}
