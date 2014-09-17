<?php
class m_login extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	function cekdb()
	{
	$username=$this->input->post('username');
	$password=($this->input->post('password'));
	$query=$this->db->query("select * from user where username='$username' and password='$password'");
if($query->num_rows() > 0)
{
	return $query->result();
}
else
{
	return null;
}
}
}
?>