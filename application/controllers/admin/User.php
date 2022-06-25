<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		if (!$this->session->userdata('username')) {
			redirect('auth/login');
		}
		// load model dan library
		$this->load->model('user_model');
		$this->load->library('form_validation');
		$this->load->model("user_model");
	}

	// ! mengambil data model dan di render
	public function index()
	{
		check_level_admin();
		$data["User"] = $this->user_model->getAll();
		$data["users"] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
		$this->load->view("admin/user/list", $data);
	}

	// ! Digunakan untuk memanggil form
	public function input()
	{
		$data["users"] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
		$this->load->view('admin/user/new_form', $data);
	}

	// ! menambahkan data
	public function add()
	{
		$user_id = $this->input->post('user_id');
		$full_name = $this->input->post('full_name');
		$username = $this->input->post('username');
		$password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
		$email = $this->input->post('email');
		$id_tim = $this->input->post('id_tim');
		$phone = $this->input->post('phone');
		$level_id = $this->input->post('level_id');

		$data['gambar'] = '';
		$gambar_user = $_FILES['gambar_user']['name'];
		$config['upload_path'] = './assets/imguser/';
		$config['allowed_types'] = 'jpg|jpeg|png';

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('gambar_user')) {
			echo "Gambar gagal diupload";
		} else {
			$gambar = $this->upload->data('file_name');
			$data = array(
				'user_id' => $user_id,
				'full_name' => $full_name,
				'username' => $username,
				'password' => $password,
				'email' => $email,
				'id_tim' => $id_tim,
				'phone' => $phone,
				'level_id' => $level_id,
				'gambar_user' => $gambar_user,
				'created_at' => time(),
				'is_active' => 1,
			);
		}
		$this->db->insert('users', $data);
		$this->session->set_flashdata('success', 'Berhasil ditambahkan');
		redirect(site_url('admin/User/index'));
	}
	// ! fungsi edit
	public function edit($id = NULL)
	{
		$data['User']  = $this->user_model->getById($id);
		$data["users"] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
		$this->load->view("admin/user/edit_form", $data);
	}
	// ! fungsi edit password
	public function editpassword($id = NULL)
	{
		$data['User']  = $this->user_model->getById($id);
		$data["users"] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
		$password = password_hash($this->input->post('new_password1'), PASSWORD_DEFAULT);
		
		// $this->form_validation->set_rules('password', 'password', 'required|trim');
		$this->form_validation->set_rules('new_password1', 'password', 'required|trim|matches[new_password2]', [
			'matches' => 'Password dont matches!'
			
		]);
		$this->form_validation->set_rules('new_password2', 'password', 'required|trim|matches[new_password1]');
		if ($this->form_validation->run() == false) {
			// $this->User_model->updatepassword();
			// echo "tes";
			$this->load->view("admin/user/edit_password", $data);
		} else {		
				$data = [
					'password' => $password,
				];
		
					$this->db->where('user_id', $id);
					$this->db->update('users',$data);
					$this->session->set_flashdata('password', 'Password Berhasil Diubah');
					redirect('admin/user');
				}
				
		}
	// }


	// ! fungsi update
	public function update($id)
	{
		$kondisi = array('user_id' => $id);
		$full_name = $this->input->post('full_name');
		$username = $this->input->post('username');
		$email = $this->input->post('email');
		$id_tim = $this->input->post('id_tim');
		$phone = $this->input->post('phone');
		$level_id = $this->input->post('level_id');
		$config['upload_path'] = './assets/imguser';
		$config['allowed_types'] = 'jpg|jpeg|png';

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('gambar_user')) {
			$data = array(
				'full_name' => $full_name,
				'username' => $username,
				'email' => $email,
				'id_tim' => $id_tim,
				'phone' => $phone,
				'level_id' => $level_id,
				'created_at' => time(),
				'is_active' => 1,
			);

			$this->db->where($kondisi);
			$this->db->update('users', $data);
			$this->session->set_flashdata('fail', 'Data Berhasil Diubah');
			redirect('admin/User');
		} else {
			$upload_data = $this->upload->data();
			$gambar_user = $upload_data['file_name'];
			$data = array(
				'full_name' => $full_name,
				'username' => $username,
				'email' => $email,
				'id_tim' => $id_tim,
				'phone' => $phone,
				'level_id' => $level_id,
				'gambar_user' => $gambar_user,
				'is_active' => 1,
			);

			$this->db->where($kondisi);
			$this->db->update('users', $data);
			$this->session->set_flashdata('fail', 'Data Berhasil Diubah');
			redirect('admin/User');
		}
	}

	// ! fungsi delete
	public function delete($id = null)
	{
		if (!isset($id)) show_404();

		if ($this->user_model->delete($id)) {
			$this->session->set_flashdata('success', 'Data Berhasil dihapus');
			redirect(site_url('admin/User'));
		}
	}
}
