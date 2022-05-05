<?php defined('BASEPATH') or exit('No direct script access allowed');

class Overview_model extends CI_Model
{
	public function Jum_data()
	{
		$this->db->group_by('tgl_pantauan');
		$this->db->select('tgl_pantauan');
		$this->db->select("count(*) as total");
		return $this->db->from('tb_pantauanharian')
			->get()
			->result();
	}

	public function kinerja()
	{
		$this->db->group_by('username');
		$this->db->select('username');
		$this->db->where('tb_pantauanharian.id_tim',  $this->session->userdata('id_tim'));
		$this->db->select("count(*) as total");
		return $this->db->get('tb_pantauanharian')->result();
	}
}
