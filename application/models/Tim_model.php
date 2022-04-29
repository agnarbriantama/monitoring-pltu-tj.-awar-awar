<?php

class Tim_model extends CI_Model
{
  private $tim = "tim";

	public function getAll()
	{
		return $this->db->get($this->tim)->result();
	}
}
