<?php

defined('BASEPATH') or exit('No direct script access allowed');

class AnggotaTim extends CI_Controller
{
	// membuat class construct
	public function __construct()
	{
		// untuk menjalankan program pertama kali dieksekusi
		parent::__construct();
		// load model dan library
		$this->load->model('AnggotaTim_model');
		$this->load->model('KetuaTim_model');
		$this->load->library('form_validation');
		$this->load->model("user_model");
	}

	// mengambil data model dan di render
	public function index()
	{
		// untuk mengambil data dari model secara keseluruhan
		$data["AnggotaTim"] = $this->AnggotaTim_model->getAll();
		// meload data pada view yang sudah dibuat pada folder view
		$this->load->view("admin/anggotatim/list", $data);
	}

	public function relasi()
	{
		$data["KetuaTim"] = $this->KetuaTim_model->getAll();
		$this->load->view("admin/anggotatim/new_form", $data);
	}

	// Digunakan untuk memanggil form
	public function input()
	{
		// untuk meload tampilan newform pada bagian view
		$this->load->view('admin/anggotatim/new_form');
	}

	// menambahkan data
	public function add()
	{
		$this->AnggotaTim_model->save();
		$this->session->set_flashdata('berhasil', 'Berhasil ditambahkan');
	}

	// untuk fungsi edit dengan nilai defaultnya null
	public function edit($id = NULL)
	{
		// mengambil relasi dari ketua tim
		$data["KetuaTim"] = $this->KetuaTim_model->getAll();

		$this->form_validation->set_rules('nama_anggota', 'Nama_Anggota', 'required');
		$this->form_validation->set_rules('no_hp', 'No_HP', 'required');
		$this->form_validation->set_rules('domisili', 'Domisili', 'required');

		// $data["KetuaTim"] = $this->KetuaTim_model->getAll();
		$data['AnggotaTim']  = $this->AnggotaTim_model->getById($id);

		if ($this->form_validation->run()) {
			$this->AnggotaTim_model->update();
		}
		$this->load->view("admin/anggotatim/edit_form", $data);
		$this->session->set_flashdata('success', 'Berhasil diupdate');
	}

	// untuk fungsi delete dengan nilai defaultnya null
	public function delete($id = null)
	{
		if (!isset($id)) show_404();

		if ($this->AnggotaTim_model->delete($id)) {
			$this->session->set_flashdata('success', 'Berhasil dihapus');
			redirect(site_url('admin/AnggotaTim'));
		}
	}
}
