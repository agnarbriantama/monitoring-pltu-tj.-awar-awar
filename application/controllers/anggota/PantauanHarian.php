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
		$data["Gardu"] = $this->Gardu_model->getAll();
		$data["users"] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
		$this->load->view("anggota/pantauanharian/new_form", $data);
	}

	public function add()
	{
		$id_gardu = $this->input->post('id_gardu');
		$suhu = $this->input->post('suhu');
		$arus = $this->input->post('arus');
		$cosphi = $this->input->post('cosphi');
		$tgl_pantauan = $this->input->post('tgl_pantauan');
		$tegangan = $this->input->post('tegangan');
		$lokasi_pantauan = $this->input->post('lokasi_pantauan');
		//'kondisi' => $this->input->post('kondisi'),
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
				'suhu' => $suhu,
				'arus' => $arus,
				'cosphi' => $cosphi,
				'tgl_pantauan' => $tgl_pantauan,
				'tegangan' => $tegangan,
				'gambar' => $gambar,
				'status' => 0,
				'lokasi_pantauan' => $lokasi_pantauan,
			);
		}

		$this->db->insert('tb_pantauanharian', $data);
		$this->session->set_flashdata('berhasil', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data Berhasil Ditambahkan</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button></div>');
		redirect(site_url('anggota/PantauanHarian/index'));
	}

	public function list()
	{
		// untuk mengambil data dari model secara keseluruhan
		$data["Gardu"] = $this->Gardu_model->getAll();
		$data["PantauanHarian"] = $this->PantauanHarian_model->getAll();
		$data["users"] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
		$this->load->view("anggota/pantauanharian/list", $data);
	}
}
