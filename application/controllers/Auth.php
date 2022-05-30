<?php

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}
	// ! menampilkan halaman login
	public function login()
	{
		check_already_login();
		$this->form_validation->set_rules('username', 'username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == false) {
			$this->load->view('admin/login_page');
		} else {
			$this->_login();
		}
	}
	// ! proses login
	private function _login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$user = $this->db->get_where('users', ['username' => $username])->row_array();

		if ($user) {
			if ($user['is_active'] == 1) {
				if (password_verify($password, $user['password'])) {
					$data = [
						'username' => $user['username'],
						'level_id' => $user['level_id'],
						'id_tim' => $user['id_tim'],
					];

					$this->session->set_userdata($data);
					if ($user['level_id'] == 1) {
						redirect('admin/Overview');
					}
					if ($user['level_id'] == 2) {
						redirect('ketua/Overview');
					}
					if ($user['level_id'] == 3) {
						redirect('anggota/PantauanHarian');
					}
				} else {
					$this->session->set_flashdata('login', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Password Salah !</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
					redirect('auth/login');
				}
			} else {
				$this->session->set_flashdata('login', '<div class="alert 
        alert-danger" role="alert">This email has not been activated!</div>');
				redirect('auth/login');
			}
		} else {
			$this->session->set_flashdata('login', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Username belum terdaftar</strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>!</div>');
			redirect('auth/login');
		}
	}
	// ! logout
	public function logout()
	{
		$this->session->sess_destroy();
		redirect(site_url('auth/login'));
	}

	public function test()
	{
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('foo' => 'bar')));
	}
}
