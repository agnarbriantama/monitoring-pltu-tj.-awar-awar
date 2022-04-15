<?php defined('BASEPATH') or exit('No direct script access allowed');

class Gardu_model extends CI_Model
{
  // nama tabel
  private $tb_gardu = "tb_gardu";

  public function getAll()
  {
    // tb_gardu adalah nama tabel
    // untuk mengembalikan array yang berisi objek dari row
    return $this->db->get($this->tb_gardu)->result();
  }

  public function getById($id)
  {
    // mengembalikan sebuah objek
    // mengambil semua dari tb_data-rt yang dimana id_nama = id
    return $this->db->get_where($this->tb_gardu, ["id_gardu" => $id])->result();
  }

  public function save()
  {
    $gambar_gardu = $this->upload->do_upload('gambar_gardu');

    if ($gambar_gardu) {
      $gambar_gardu = $this->upload->data('file_name');
      $this->session->flashdata('success', 'Berhasil Disimpan');
    } else {
      echo "else terjalankan";
      $gambar_gardu = '';
    }

    $data = array(
      'id_gardu' => Null,
      'nama_gardu' => $this->input->post('nama_gardu'),
      'gambar_gardu' => $gambar_gardu,

    );

    $this->db->insert($this->tb_gardu, $data);
    $this->session->set_flashdata('berhasil', 'Berhasil ditambahkan');
    redirect(site_url('admin/Gardu/index'));
  }

  public function update($id = NULL)
  {
    $foto = $this->upload->do_upload('foto_gardu');
    // update foto
    if ($foto) {
      $data = $this->upload->data();
      $foto = $data['file_name'];
    } else {
      $foto = $this->input->post('fotolama');
    }

    $id = $this->input->post('id');

    $data = array(
      'id_gardu' => $id,
      'nama_gardu' => $this->input->post('nama_gardu'),
      'foto_gardu' => $foto,
    );

    $this->db->update($this->tb_gardu, $data, array('id_gardu' => $id));
    $this->session->set_flashdata('success', 'Berhasil diupdate');
    redirect(site_url('admin/Gardu/index'));
  }

  public function delete($id)
  {
    // menjalankan dengan memanggil db dan tabel kemudian mencari id yang sesuai
    return $this->db->delete($this->tb_gardu, array("id_gardu" => $id));
  }
}
