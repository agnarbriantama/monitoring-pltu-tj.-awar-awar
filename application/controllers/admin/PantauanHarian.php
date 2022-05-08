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
		$this->load->model('Tim_model');
		$this->load->model('PantauanHarian_model');
		$this->load->library('form_validation');
		$this->load->model("User_model");
	}
	// ! mengambil data model dan di render
	public function index()
	{
		check_level_admin();
		$data["PantauanHarian"] = $this->PantauanHarian_model->getAll();
		$data["users"] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
		$this->load->view("admin/pantauanharian/list", $data);
	}
	// ! relasi data
	public function relasi()
	{
		$data["Gardu"] = $this->Gardu_model->getAll();
		$data["tim"] = $this->Tim_model->getAll();
		$data["users"] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
		$this->load->view("admin/pantauanharian/new_form", $data);
	}
	// ! menambahkan data
	public function add()
	{
		$id_gardu = $this->input->post('id_gardu');
		$suhu = $this->input->post('suhu');
		$arus = $this->input->post('arus');
		$cosphi = $this->input->post('cosphi');
		$tgl_pantauan = $this->input->post('tgl_pantauan');
		$tegangan = $this->input->post('tegangan');
		$lokasi_pantauan = $this->input->post('lokasi_pantauan');
		$username = $this->input->post('username');
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
				'username' => $username,
			);
		}

		$this->db->insert('tb_pantauanharian', $data);
		$this->session->set_flashdata('berhasil', 'Berhasil DiTambahkan');
		redirect(site_url('admin/PantauanHarian/index'));
	}
	// ! mengubah data
	public function edit($id = NULL)
	{
		$data["tim"] = $this->Tim_model->getAll();
		$data["Gardu"] = $this->Gardu_model->getAll();
		$data["users"] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();

		$this->form_validation->set_rules('suhu', 'Suhu', 'required');
		$this->form_validation->set_rules('lokasi_pantauan', 'Lokasi_Pantauan', 'required');

		$data['PantauanHarian']  = $this->PantauanHarian_model->getById($id);

		$config['upload_path'] = './assets/imgpantauan';
		$config['allowed_types'] = 'jpg|png|jpeg';
		// Mengatur ukuran maksimal file
		$config['max_size'] = '2048';
		// mengatur ukuran lebar maksimal yang dilakukan
		$config['max_width'] = '2000';
		$config['max_height'] = '2000';
		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if ($this->form_validation->run()) {
			$this->PantauanHarian_model->update();
		}
		$this->load->view("admin/pantauanharian/edit_form", $data);
		$this->session->set_flashdata('success', 'Berhasil diupdate');
	}
	// ! disetujui
	public function disetujui($id)
	{
		$sql = "UPDATE tb_pantauanharian SET status ='1' WHERE id_pantauan =$id";
		$this->db->query($sql);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">  Data Telah Disetujui<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect(site_url('admin/pantauanharian'));
	}
	// ! ditolak
	public function ditolak($id)
	{
		$sql = "UPDATE tb_pantauanharian SET status ='2' WHERE id_pantauan =$id";
		$this->db->query($sql);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">  Data DiTolak<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect(site_url('admin/pantauanharian'));
	}
	// ! menghapus data
	public function delete($id = null)
	{
		if (!isset($id)) show_404();

		if ($this->PantauanHarian_model->delete($id)) {
			$this->session->set_flashdata('success', 'Berhasil dihapus');
			redirect(site_url('admin/PantauanHarian'));
		}
	}
}
