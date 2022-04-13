<?php defined('BASEPATH') or exit('No direct script access allowed');

class AnggotaTim_model extends CI_Model
{
	// nama tabel
	private $tb_anggotatim = "tb_anggotatim";

	public function getAll()
	{
		// tb_anggotatim adalah nama tabel
		// untuk mengembalikan array yang berisi objek dari row
		$this->db->select('*');
		$this->db->from('tb_anggotatim');
		$this->db->join('tb_ketuatim', 'tb_ketuatim.id_ketuatim = tb_anggotatim.id_ketuatim', 'left');
		$this->db->order_by('id_anggotatim', 'desc');
		return $this->db->get()->result();
	}

	public function getById($id)
	{
		// mengembalikan sebuah objek
		// mengambil semua dari tb_data-rt yang dimana id_nama = id
		return $this->db->get_where($this->tb_anggotatim, ["id_anggotatim" => $id])->result();
	}

	public function save()
	{
		$data = array(
			'id_anggotatim' => Null,

			'id_ketuatim' => $this->input->post('id_ketuatim'),

			// 'nama_ketuatim' => $this->input->post('nama_ketuatim'),

			'nama_anggota' => $this->input->post('nama_anggota'),

			'no_hp' => $this->input->post('no_hp'),

			'domisili' => $this->input->post('domisili'),

			'tahun_kerja' => $this->input->post('tahun_kerja'),
		);

		$this->db->insert($this->tb_anggotatim, $data);
		$this->session->set_flashdata('berhasil', 'Berhasil ditambahkan');
		redirect(site_url('admin/anggotatim/index'));
	}

	public function update($id = NULL)
	{
		$id = $this->input->post('id');

		$data = array(
			'id_anggotatim' => $id,
			'id_ketuatim' => $this->input->post('id_ketuatim'),
			// 'nama_ketuatim' => $this->input->post('nama_ketuatim'),
			'nama_anggota' => $this->input->post('nama_anggota'),
			'no_hp' => $this->input->post('no_hp'),
			'domisili' => $this->input->post('domisili'),
			'tahun_kerja' => $this->input->post('tahun_kerja'),
		);

		$this->db->update($this->tb_anggotatim, $data, array('id_anggotatim' => $id));
		$this->session->set_flashdata('success', 'Berhasil diupdate');
		redirect(site_url('admin/AnggotaTim/index'));
	}

	public function delete($id)
	{
		// menjalankan dengan memanggil db dan tabel kemudian mencari id yang sesuai
		return $this->db->delete($this->tb_anggotatim, array("id_anggotatim" => $id));
	}
}
