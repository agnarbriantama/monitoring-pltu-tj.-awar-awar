<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Gardu extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('username')) {
			redirect('auth/login');
		}
		// load model dan library
		$this->load->model('Gardu_model');
		$this->load->library('form_validation');
		$this->load->model("user_model");
	}

	public function index()
	{
		check_level_ketua();
		$data["Gardu"] = $this->Gardu_model->getAll();
		$data["users"] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
		$this->load->view("ketua/Gardu/list", $data);
	}

	// ! Digunakan untuk memanggil form
	public function input()
	{
		$data["users"] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
		$this->load->view('ketua/Gardu/new_form',$data);
	}

	// ! menambahkan data
	public function add()
	{
		// Configurasi File
		$config['upload_path'] = './assets/imgpantauan';
		$config['allowed_types'] = 'jpg|png|jpeg';
		// Mengatur ukuran maksimal file
		$config['max_size'] = '2048';
		// mengatur ukuran lebar maksimal yang dilakukan
		$config['max_width'] = '2000';
		$config['max_height'] = '2000';
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		$this->Gardu_model->save();
		$this->session->set_flashdata('berhasil', 'Berhasil ditambahkan');
	}
	// ! edit data
	public function edit($id)
	{
		$data['Gardu'] =  $this->db->get_where('tb_gardu', ['id_gardu' => $id])->row();
		$data["users"] = $this->db->get_where('users',['username' => $this->session->userdata('username')])->row_array();
		$this->load->view("ketua/Gardu/edit_form", $data);
	}
	// ! update data
	public function update_gardu($id)
	{
		$kondisi = array('id_gardu' => $id);
		$nama_gardu = $this->input->post('nama_gardu');
		$config['upload_path'] = './assets/imgpantauan';
		$config['allowed_types'] = 'jpg|jpeg|png';

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('gambar_gardu')) {
			$data = array(
				'nama_gardu' => $nama_gardu,

			);

			$this->db->where($kondisi);
			$this->db->update('tb_gardu', $data);
			redirect('ketua/Gardu');
		} else {
			$upload_data = $this->upload->data();
			$gambar_gardu = $upload_data['file_name'];
			$data = array(
				'nama_gardu' => $nama_gardu,
				'gambar_gardu' => $gambar_gardu,
			);

			$this->db->where($kondisi);
			$this->db->update('tb_gardu', $data);
			redirect('ketua/Gardu');
		}
	}
	// ! hapus data
	public function delete($id = null)
	{
		if (!isset($id)) show_404();

		if ($this->Gardu_model->delete($id)) {
			$this->session->set_flashdata('success', 'Berhasil dihapus');
			redirect(site_url('ketua/Gardu'));
		}
	}
}
