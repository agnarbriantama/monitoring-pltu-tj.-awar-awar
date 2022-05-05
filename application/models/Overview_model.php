<?php defined('BASEPATH') or exit('No direct script access allowed');

class Overview_model extends CI_Model
{
	public function Jum_data()
	{
		// $sql = "SELECT * FROM tb_pantauanharian WHERE tgl_pantauan >= DATE_SUB(curdate(),INTERVAL 7 day)";
		//$this->db->
		$this->db->group_by('tgl_pantauan');
		$this->db->select('tgl_pantauan');
		$this->db->select("count(*) as total");
		return $this->db->from('tb_pantauanharian')
			->get()
			->result();
	}

	public function kinerja()
	{
		// $sql = "SELECT * FROM tb_pantauanharian WHERE tgl_pantauan >= DATE_SUB(curdate(),INTERVAL 7 day)";
		//$this->db->
		$this->db->group_by('username');
		$this->db->select('username');
		$this->db->where('tb_pantauanharian.id_tim',  $this->session->userdata('id_tim'));
		$this->db->select("count(*) as total");
		return $this->db->get('tb_pantauanharian')->result();
	}
}
//$sql = "SELECT * FROM tb_pantauanharian WHERE tgl_pantauan = ? AND status = ? AND author = ?";
