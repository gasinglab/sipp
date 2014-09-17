<?php
class m_poin extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	function cek_kodepoin() {
		$query=$this->db->query("SELECT MAX(kd_poin) as last FROM poin WHERE kd_poin LIKE 'PO-%'");
		return $query;
	}
	
	function jumlah_poin($nis) {
		$query=$this->db->query("SELECT sum(poin) AS jml_poin FROM view_poin WHERE nis='$nis'");
		return $query;
	}
	
	function input_poin(){
		$tgl	= date("c");
		$data = array(
		'kd_poin'=>$this->input->post('kode_poin'),
		'tgl_pelanggaran'=>$tgl,
		'nis'=>$this->input->post('nis'),
		'kd_pelanggaran'=>$this->input->post('pelanggaran'));
		$this->db->insert('poin',$data);
	}
	
	function hapus_poin($kode) {
		$this->db->where('kd_poin', $kode);
		$this->db->delete('poin');
	}
	
	function tampil($nis) {
		$this->db->where('nis',$nis);
		$query = $this->db->get('view_poin');
		return $query;	
	}
}
?>