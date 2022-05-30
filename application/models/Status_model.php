<?php defined('BASEPATH') or exit('No direct script access allowed');

class Status_model extends CI_Model
{
	// nama tabel
	private $tb_pantauanharian = "tb_pantauanharian";

	public function getPendingA()
	{
		$this->db->select('*');
		$this->db->from('tb_pantauanharian');
		$this->db->join('tb_gardu', 'tb_gardu.id_gardu = tb_pantauanharian.id_gardu', 'left');
		$this->db->join('tim', 'tim.id_tim = tb_pantauanharian.id_tim', 'left');
		$this->db->where('status', '0');
		$this->db->order_by('id_pantauan', 'desc');
		return $this->db->get()->result();
	}

	public function getPending()
	{
		$this->db->select('*');
		$this->db->from('tb_pantauanharian');
		$this->db->join('tb_gardu', 'tb_gardu.id_gardu = tb_pantauanharian.id_gardu', 'left');
		$this->db->join('tim', 'tim.id_tim = tb_pantauanharian.id_tim', 'left');
		$this->db->where('status', '0');
		$this->db->order_by('id_pantauan', 'desc');
		$this->db->where('tb_pantauanharian.id_tim',  $this->session->userdata('id_tim'));
		return $this->db->get()->result();
	}

	public function getSetujuA()
	{
		$this->db->select('*');
		$this->db->from('tb_pantauanharian');
		$this->db->join('tb_gardu', 'tb_gardu.id_gardu = tb_pantauanharian.id_gardu', 'left');
		$this->db->join('tim', 'tim.id_tim = tb_pantauanharian.id_tim', 'left');
		$this->db->where('status', '1');
		$this->db->order_by('id_pantauan', 'desc');
		return $this->db->get()->result();
	}

	public function getSetuju()
	{
		$this->db->select('*');
		$this->db->from('tb_pantauanharian');
		$this->db->join('tb_gardu', 'tb_gardu.id_gardu = tb_pantauanharian.id_gardu', 'left');
		$this->db->join('tim', 'tim.id_tim = tb_pantauanharian.id_tim', 'left');
		$this->db->where('status', '1');
		$this->db->order_by('id_pantauan', 'desc');
		$this->db->where('tb_pantauanharian.id_tim',  $this->session->userdata('id_tim'));
		return $this->db->get()->result();
	}

	public function getTolakA()
	{
		$this->db->select('*');
		$this->db->from('tb_pantauanharian');
		$this->db->join('tb_gardu', 'tb_gardu.id_gardu = tb_pantauanharian.id_gardu', 'left');
		$this->db->join('tim', 'tim.id_tim = tb_pantauanharian.id_tim', 'left');
		$this->db->where('status', '2');
		$this->db->order_by('id_pantauan', 'desc');
		return $this->db->get()->result();
	}

	public function getTolak()
	{
		$this->db->select('*');
		$this->db->from('tb_pantauanharian');
		$this->db->join('tb_gardu', 'tb_gardu.id_gardu = tb_pantauanharian.id_gardu', 'left');
		$this->db->join('tim', 'tim.id_tim = tb_pantauanharian.id_tim', 'left');
		$this->db->where('status', '2');
		$this->db->order_by('id_pantauan', 'desc');
		$this->db->where('tb_pantauanharian.id_tim',  $this->session->userdata('id_tim'));
		return $this->db->get()->result();
	}
}
