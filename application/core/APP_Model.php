<?php

class APP_Model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function query($sql, $binds = [])
	{
		if(isset($this->db_tools) === false)
			$this->load->library('main/db_tools');

		$this->db_tools->prepareBinds($sql, $binds);
		return $this->db->query($sql, $binds);
	}
}
