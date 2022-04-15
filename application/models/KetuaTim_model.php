<?php defined('BASEPATH') or exit('No direct script access allowed');

class KetuaTim_model extends CI_Model
{
  // nama tabel
  private $tb_ketuatim = "tb_ketuatim";

  public function getAll()
  {
    // tb_ketuatim adalah nama tabel
    // untuk mengembalikan array yang berisi objek dari row
    return $this->db->get($this->tb_ketuatim)->result();
  }

  public function getById($id)
  {
    // mengembalikan sebuah objek
    // mengambil semua dari tb_data-rt yang dimana id_nama = id
    return $this->db->get_where($this->tb_ketuatim, ["id_ketuatim" => $id])->result();
  }

  public function save()
  {
    $foto = $this->upload->do_upload('foto_ketuatim');

    if ($foto) {
      $foto = $this->upload->data('file_name');
      $this->session->flashdata('success', 'Berhasil Disimpan');
    } else {
      echo "else terjalankan";
      $file = '';
    }

    $data = array(
      'id_ketuatim' => Null,
      'nama_ketuatim' => $this->input->post('nama_ketuatim'),
      'tgl_lahir' => $this->input->post("tgl_lahir"),
      'jml_ang_tim' => $this->input->post('jml_ang_tim'),
      'nama_tim' => $this->input->post('nama_tim'),
      'no_hp' => $this->input->post('no_hp'),
      'foto_ketuatim' => $foto,
      'domisili_ketuatim' =>  $this->input->post("domisili_ketuatim"),

    );

    $this->db->insert($this->tb_ketuatim, $data);
    $this->session->set_flashdata('berhasil', 'Berhasil ditambahkan');
    redirect(site_url('admin/KetuaTim/index'));
  }

  public function update($id = NULL)
  {
    $foto = $this->upload->do_upload('foto_ketuatim');
    // update foto
    if ($foto) {
      $data = $this->upload->data();
      $foto = $data['file_name'];
    } else {
      $foto = $this->input->post('fotolama');
    }

    $id = $this->input->post('id');

    $data = array(
      'id_ketuatim' => $id,
      'nama_ketuatim' => $this->input->post('nama_ketuatim'),
      'tgl_lahir	' => $this->input->post("tgl_lahir"),
      'jml_ang_tim' => $this->input->post('jml_ang_tim'),
      'nama_tim' => $this->input->post('nama_tim'),
      'no_hp' => $this->input->post('no_hp'),
      'foto_ketuatim' => $foto,
      'domisili_ketuatim' =>  $this->input->post("domisili_ketuatim"),
    );

    $this->db->update($this->tb_ketuatim, $data, array('id_ketuatim' => $id));
    $this->session->set_flashdata('success', 'Berhasil diupdate');
    redirect(site_url('admin/KetuaTim/index'));
  }

  public function delete($id)
  {
    // menjalankan dengan memanggil db dan tabel kemudian mencari id yang sesuai
    return $this->db->delete($this->tb_ketuatim, array("id_ketuatim" => $id));
  }
}
