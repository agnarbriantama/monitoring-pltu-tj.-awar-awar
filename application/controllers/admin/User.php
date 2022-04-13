<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
  // membuat class construct
  public function __construct()
  {
    // untuk menjalankan program pertama kali dieksekusi
    parent::__construct();
    // load model dan library
    $this->load->model('user_model');
    $this->load->library('form_validation');
    $this->load->model("user_model");
  }

  // mengambil data model dan di render
  public function index()
  {
    // untuk mengambil data dari model secara keseluruhan
    $data["User"] = $this->user_model->getAll();
    // meload data pada view yang sudah dibuat pada folder view
    $this->load->view("admin/user/list", $data);
  }

  // Digunakan untuk memanggil form
  public function input()
  {
    // untuk meload tampilan newform pada bagian view
    $this->load->view('admin/user/new_form');
  }

  // menambahkan data
  public function add()
  {
    $this->user_model->save();
    $this->session->set_flashdata('berhasil', 'Berhasil ditambahkan');
  }

  // untuk fungsi edit dengan nilai defaultnya null
  // public function edit( $id = NULL )
  // {
  //     $data['User']  = $this->user_model->getById($id);

  //     if ($this->form_validation->run()) {
  //         // $this->user_model->update();
  //         echo "gagal";
  //     }

  //     $this->load->view("admin/user/edit_form", $data);
  //     $this->session->set_flashdata('success', 'Berhasil diupdate');
  // }

  // untuk fungsi edit dengan nilai defaultnya null
  public function edit($id = NULL)
  {
    $user = $this->user_model;
    // menayatakan form validasi untuk mempermudah
    $validation = $this->form_validation;
    $validation->set_rules($user->rules());

    // percabangan nilai untuk melakukan validasi
    if ($validation->run()) {
      $user->update();
      $this->session->set_flashdata('success', 'Berhasil diupdate');
    }

    $data['User']  = $this->user_model->getById($id);

    $this->load->view("admin/user/edit_form", $data);
  }

  // untuk fungsi delete dengan nilai defaultnya null
  public function delete($id = null)
  {
    if (!isset($id)) show_404();

    if ($this->user_model->delete($id)) {
      $this->session->set_flashdata('success', 'Berhasil dihapus');
      redirect(site_url('admin/User'));
    }
  }
}
