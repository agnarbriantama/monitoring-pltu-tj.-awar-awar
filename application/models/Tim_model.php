<?php

class Tim_model extends CI_Model
{
	private $tim = "tim";

	public function getAll()
	{
		return $this->db->get($this->tim)->result();
	}

	public function getById($id)
	{
		return $this->db->get_where($this->tim, ["id_tim" => $id])->result();
	}
	// ! update
	public function update()
	{
		$post = $this->input->post();
		$this->id_tim = $post["id_tim"];
		$this->nama_tim = $post["nama_tim"];
		$this->db->update($this->tim, $this, array('id_tim' => $post['id_tim']));
		$this->session->set_flashdata('success', 'Berhasil diupdate');
		redirect(site_url('admin/NamaTim/index'));
	}

	public function delete($id)
	{
		return $this->db->delete($this->tim, array("id_tim" => $id));
	}
}
