<?php
class m_pelanggaran extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	function daftar_pelanggaran(){
		$query = $this->db->query("SELECT * FROM pelanggaran ORDER BY kd_pelanggaran ASC");
		return $query;
	}
	
	function cek_kodepelanggaran() {
		$query=$this->db->query("SELECT MAX(kd_pelanggaran) as last FROM pelanggaran WHERE kd_pelanggaran LIKE 'PL-%'");
		return $query;
	}
	function hapus_pelanggaran($kode) {
		$this->db->where('kd_pelanggaran', $kode);
		$this->db->delete('pelanggaran');
	}
}
?>