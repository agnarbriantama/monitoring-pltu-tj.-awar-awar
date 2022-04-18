<?php

class User_model extends CI_Model
{
  private $_table = "users";

  public $user_id;
  public $full_name;
  public $password;
  public $email;
  public $role;

  public function rules()
  {
    return [
      [
        'field' => 'full_name',
        'label' => 'Name',
        'rules' => 'required'
      ],

      [
        'field' => 'password',
        'label' => 'Password',
        'rules' => 'required|min_length[3]'
      ],

      [
        'field' => 'email',
        'label' => 'Email',
        'rules' => 'required|valid_email'
      ]
    ];
  }

  public function getAll()
  {
    return $this->db->get($this->_table)->result();
  }

  public function getById($id)
  {
    return $this->db->get_where($this->_table, ["user_id" => $id])->result();
  }

  public function save()
  {
    $post = $this->input->post();
    $this->username = $post["username"];
    $this->full_name = $post["full_name"];
    $this->email = $post["email"];
    $this->password = password_hash($post["password"], PASSWORD_DEFAULT);
    $this->phone = $post["phone"];
    $this->level = $post["level"];
    $this->db->insert($this->_table, $this);
    $this->session->set_flashdata('berhasil', 'Berhasil ditambahkan');
    redirect(site_url('admin/User/index'));
  }

  public function update()
  {
    $post = $this->input->post();
    $this->username = $post["username"];
    $this->full_name = $post["full_name"];
    $this->email = $post["email"];
    $this->password = password_hash($post["password"], PASSWORD_DEFAULT);
    $this->phone = $post["phone"];
    $this->level = $post["level"];
    $this->db->update($this->_table, $this, array('user_id' => $post['id']));
    $this->session->set_flashdata('success', 'Berhasil diupdate');
    redirect(site_url('admin/User/index'));
  }

  public function doLogin()
  {
    $post = $this->input->post();

    $this->db->where('email', $post["email"])
      ->or_where('username', $post["email"]);
    $user = $this->db->get($this->_table)->row();

    if ($user) {
      $isPasswordTrue = password_verify($post["password"], $user->password);
      $isAdmin = $user->role == "admin";
      if ($isPasswordTrue && $isAdmin) {
        $this->session->set_userdata(['user_logged' => $user]);
        $this->_updateLastLogin($user->user_id);
        return true;
      }
    }
    $this->session->set_flashdata('error', 'Username atau Password Anda Salah !!!');
    return false;
  }

  public function delete($user_id)
  {
    // menjalankan dengan memanggil db dan tabel kemudian mencari id yang sesuai
    $this->db->delete($this->_table, array('user_id' => $user_id));
    $this->session->set_flashdata('success', 'Berhasil dihapus');
    redirect(site_url('admin/User/index'));
  }

  public function isNotLogin()
  {
    return $this->session->userdata('user_logged') === null;
  }

  private function _updateLastLogin($user_id)
  {
    $sql = "UPDATE {$this->_table} SET last_login=now() WHERE user_id={$user_id}";
    $this->db->query($sql);
  }
}
