<?php

class User_model extends CI_Model
{
	private $_table = "users";



	public function getAll()
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->join('level', 'level.level_id = users.level_id', 'left');
		$this->db->join('tim', 'tim.id_tim = users.id_tim', 'left');
		$this->db->order_by('user_id', 'desc');
		return $this->db->get()->result();
	}
	public function getById($id)
	{
		return $this->db->get_where($this->_table, ["user_id" => $id])->result();
	}
	// ! user ketua
	public function users_ketua()
	{
		$this->db->select('*');
		$this->db->join('tim', 'tim.id_tim = users.id_tim', 'left');
		$this->db->join('level', 'level.level_id = users.level_id', 'left');
		$this->db->where('users.id_tim',  $this->session->userdata('id_tim'));
		return $this->db->get('users')->result();
	}
	// ! user tim
	public function users_tim()
	{
		$this->db->select('*');
		$this->db->join('tim', 'tim.id_tim = users.id_tim', 'left');
		$this->db->where('users.username',  $this->session->userdata('username'));
		return $this->db->get('users')->result();
	}
	// ! simpan
	public function save()
	{
		$post = $this->input->post();
		$this->username = $post["username"];
		$this->full_name = $post["full_name"];
		$this->email = $post["email"];
		$this->password = password_hash($post["password"], PASSWORD_DEFAULT);
		$this->phone = $post["phone"];
		$this->level_id = $post["level_id"];
		$this->is_active = 1;
		$this->db->insert($this->_table, $this);
		$this->session->set_flashdata('berhasil', 'Berhasil ditambahkan');
		redirect(site_url('admin/User/index'));
	}
	// ! update
	public function update()
	{
		$post = $this->input->post();
		$this->username = $post["username"];
		$this->full_name = $post["full_name"];
		$this->email = $post["email"];
		// $this->password = password_hash($post["password"], PASSWORD_DEFAULT);
		$this->phone = $post["phone"];
		$this->level_id = $post["level_id"];
		$this->id_tim = $post["id_tim"];
		$this->db->update($this->_table, $this, array('user_id' => $post['id']));
		$this->session->set_flashdata('success', 'Berhasil diupdate');
		redirect(site_url('admin/User/index'));
	}	

	// ! update
	public function updatepassword()
	{
		$post = $this->input->post();
		$this->password = password_hash($post["password"], PASSWORD_DEFAULT);
		$this->db->update($this->_table, $this, array('user_id' => $post['id']));
		$this->session->set_flashdata('success', 'Berhasil diupdate');
		redirect(site_url('admin/User/index'));
	}	

	
	// ! hapus
	public function delete($user_id)
	{
		$this->db->delete($this->_table, array('user_id' => $user_id));
		$this->session->set_flashdata('success', 'Berhasil dihapus');
		redirect(site_url('admin/User/index'));
	}
	// ! tidak login
	public function isNotLogin()
	{
		return $this->session->userdata('user_logged') === null;
	}

	private function _updateLastLogin($user_id)
	{
		$sql = "UPDATE {$this->_table} SET last_login=now() WHERE user_id={$user_id}";
		$this->db->query($sql);
	}

	public function updatepw($id = NULL)
	{

		$id = $this->input->post('user_id');
		$password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);

		$data = array(
			'user_id' => $id,
			
		);

		$this->db->update($this->tb_pantauanharian, $data, array('id_pantauan' => $id));
		redirect(site_url('admin/PantauanHarian/index'));
	}
}
