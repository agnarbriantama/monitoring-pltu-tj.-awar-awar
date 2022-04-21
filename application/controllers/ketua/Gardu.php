<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Gardu extends CI_Controller
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
		$this->load->library('form_validation');
		$this->load->model("user_model");
	}

	// mengambil data model dan di render
	public function index()
	{
		// untuk mengambil data dari model secara keseluruhan
		$data["Gardu"] = $this->Gardu_model->getAll();
		// meload data pada view yang sudah dibuat pada folder view
		$this->load->view("ketua/gardu/list", $data);
	}

	// Digunakan untuk memanggil form
	public function input()
	{
		// untuk meload tampilan newform pada bagian view
		$this->load->view('ketua/gardu/new_form');
	}

	// menambahkan data
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

	// untuk fungsi edit dengan nilai defaultnya null
	public function edit($id)
	{
		$data['Gardu'] =  $this->db->get_where('tb_gardu', ['id_gardu' => $id])->row();
		$this->load->view("ketua/gardu/edit_form", $data);
	}

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
			redirect('ketua/gardu');
		} else {
			$upload_data = $this->upload->data();
			$gambar_gardu = $upload_data['file_name'];
			$data = array(
				'nama_gardu' => $nama_gardu,
				'gambar_gardu' => $gambar_gardu,
			);

			$this->db->where($kondisi);
			$this->db->update('tb_gardu', $data);
			redirect('ketua/gardu');
		}
	}

	// untuk fungsi delete dengan nilai defaultnya null
	public function delete($id = null)
	{
		if (!isset($id)) show_404();

		if ($this->Gardu_model->delete($id)) {
			$this->session->set_flashdata('success', 'Berhasil dihapus');
			redirect(site_url('ketua/Gardu'));
		}
	}
}
