<?php defined('BASEPATH') or exit('No direct script access allowed');

class PantauanHarian_model extends CI_Model
{
	// nama tabel
	private $tb_pantauanharian = "tb_pantauanharian";

	public function getAll()
	{
		$this->db->select('*');
		$this->db->from('tb_pantauanharian');
		$this->db->join('tb_gardu', 'tb_gardu.id_gardu = tb_pantauanharian.id_gardu', 'left');
		$this->db->join('tim', 'tim.id_tim = tb_pantauanharian.id_tim', 'left');
		$this->db->order_by('id_pantauan', 'desc');
		return $this->db->get()->result();
	}

	public function getById($id)
	{
		return $this->db->get_where($this->tb_pantauanharian, ["id_pantauan" => $id])->result();
	}

	public function pantauan_user()
	{
		$this->db->select('*');
		$this->db->join('tb_gardu', 'tb_gardu.id_gardu = tb_pantauanharian.id_gardu', 'left');
		$this->db->where('tb_pantauanharian.username',  $this->session->userdata('username'));
		return $this->db->get('tb_pantauanharian')->result();
	}

	public function save()
	{
		$tegangan = implode(" , ", $this->input->post('tegangan'));

		$data = array(
			'id_pantauan' => $this->input->post('id_pantauan'),
			'id_gardu' => $this->input->post('id_gardu'),
			'id_tim' => $this->input->post('id_tim'),
			'suhu' => $this->input->post('suhu'),
			'arus' => $this->input->post('arus'),
			'cosphi' => $this->input->post('cosphi'),
			'tgl_pantauan' => $this->input->post('tgl_pantauan'),
			'tegangan' => $tegangan,
			'gambar' => $this->input->post('gambar'),
			'kondisi' => $this->input->post('kondisi'),
		);

		$this->db->insert($this->tb_pantauanharian, $data);
		$this->session->set_flashdata('berhasil', 'Berhasil ditambahkan');
		redirect(site_url('admin/PantauanHarian/index'));
	}

	public function update($id = NULL)
	{
		$gambar = $this->upload->do_upload('gambar');
		if ($gambar) {
			$data = $this->upload->data();
			$gambar = $data['file_name'];
		} else {
			$gambar = $this->input->post('fotolama');
		}

		$id = $this->input->post('id_pantauan');
		// if (empty($tegangan)) $tegangan = "Kosong";

		$data = array(
			'id_pantauan' => $id,
			// 'nama_gardu' => $this->input->post('nama_gardu'),
			'id_gardu' => $this->input->post('id_gardu'),
			'id_tim' => $this->input->post('id_tim'),
			'suhu' => $this->input->post('suhu'),
			'arus' => $this->input->post('arus'),
			'cosphi' => $this->input->post('cosphi'),
			'tgl_pantauan' => $this->input->post('tgl_pantauan'),
			'tegangan' => $this->input->post('tegangan'),
			'gambar' => $gambar,
			'status' => $this->input->post('kondisi'),
			'username' => $this->session->userdata('username')
		);

		$this->db->update($this->tb_pantauanharian, $data, array('id_pantauan' => $id));
		redirect(site_url('admin/PantauanHarian/index'));
		// $this->session->set_flashdata('success', 'Berhasil diupdate');
	}

	public function delete($id)
	{
		// menjalankan dengan memanggil db dan tabel kemudian mencari id yang sesuai
		return $this->db->delete($this->tb_pantauanharian, array("id_pantauan" => $id));
	}

	public function pantauan_tim()
	{
		$this->db->select('*');
		$this->db->join('tim', 'tim.id_tim = tb_pantauanharian.id_tim', 'left');
		$this->db->join('tb_gardu', 'tb_gardu.id_gardu = tb_pantauanharian.id_gardu', 'left');
		$this->db->where('tb_pantauanharian.id_tim',  $this->session->userdata('id_tim'));
		return $this->db->get('tb_pantauanharian')->result();
	}
}
