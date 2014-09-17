<?php
class m_jurusan extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	function daftar_jurusan() {
		$query = $this->db->get('jurusan');
		return $query;	
	}
}
?>