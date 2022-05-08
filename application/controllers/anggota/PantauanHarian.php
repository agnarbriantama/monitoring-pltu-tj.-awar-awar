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

	// ! mengambil data model dan di render
	public function index()
	{
		check_level_anggota();
		$data["PantauanHarian"] = $this->PantauanHarian_model->getAll();
		$data["users"] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
		$data["pantauan_user"] = $this->PantauanHarian_model->pantauan_user();
		$this->load->view("anggota/pantauanharian/list", $data);
	}

	public function tambah_data()
	{
		$data["Gardu"] = $this->Gardu_model->getAll();
		$data["users"] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
		$this->load->view("anggota/pantauanharian/new_form", $data);
	}
	// ! tambah data
	public function add()
	{
		$id_gardu = $this->input->post('id_gardu');
		$suhu = $this->input->post('suhu');
		$arus = $this->input->post('arus');
		$cosphi = $this->input->post('cosphi');
		$tgl_pantauan = $this->input->post('tgl_pantauan');
		$tegangan = $this->input->post('tegangan');
		$lokasi_pantauan = $this->input->post('lokasi_pantauan');
		$data['gambar'] = '';
		$gambar = $_FILES['gambar']['name'];
		$config['upload_path'] = './assets/imgpantauan/';
		$config['allowed_types'] = 'jpg|jpeg|png';

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('gambar')) {
			echo "Gambar gagal diupload";
		} else {
			$gambar = $this->upload->data('file_name');
			$data = array(
				'id_gardu' => $id_gardu,
				'id_tim' => $this->session->userdata('id_tim'),
				'suhu' => $suhu,
				'arus' => $arus,
				'cosphi' => $cosphi,
				'tgl_pantauan' => $tgl_pantauan,
				'tegangan' => $tegangan,
				'gambar' => $gambar,
				'status' => 0,
				'lokasi_pantauan' => $lokasi_pantauan,
				'username' => $this->session->userdata('username')
			);
		}

		$this->db->insert('tb_pantauanharian', $data);
		$this->session->set_flashdata('berhasil', 'Berhasil ditambahkan');
		redirect(site_url('anggota/PantauanHarian/index'));
	}
	// ! list data
	public function list()
	{
		$data["Gardu"] = $this->Gardu_model->getAll();
		$data["PantauanHarian"] = $this->PantauanHarian_model->getAll();
		$data["users"] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
		$this->load->view("anggota/pantauanharian/list", $data);
	}
}
