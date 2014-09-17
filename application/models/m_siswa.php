<?php
class m_siswa extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	function tampil($perPage,$uri)
	{
		$this->db->select('*');
		$this->db->from('view_siswa');
		$this->db->group_by('nis','DESC');
		$getData = $this->db->get('',$perPage,$uri);
		if($getData->num_rows() > 0)
		return $getData;
		else
		return null;
	}
	
	function cari($q){	
		$query = $this->db->query("SELECT * FROM view_siswa WHERE nis LIKE '%$q%' OR nama LIKE '%$q%'");
		return $query;
	}
	
	function bio($nis){
		$query = $this->db->query("SELECT * FROM view_siswa WHERE nis='$nis'");
		return $query;
	}
	
	function hapus_siswa($nis) {
		$this->db->where('nis', $nis);
		$this->db->delete('siswa');
	}
	
	function tambah_siswa()
	{
		$foto=$this->upload->data();
		$data=array(
		'nis'=>$this->input->post('nis'),
		'nama'=>$this->input->post('nama'),
		'kd_jurusan'=>$this->input->post('kd_jurusan'),
		'gender'=>$this->input->post('gender'),
		'alamat'=>$this->input->post('alamat'),
		'no_telp_wali'=>$this->input->post('no_telp_wali'),
		'foto'=>$foto['file_name']);
		$this->db->insert('siswa',$data);
	}
	// Kalo fotonya gagal diaplod
	function tambah_siswa_error()
	{
		$foto=$this->upload->data();
		$data=array(
		'nis'=>$this->input->post('nis'),
		'nama'=>$this->input->post('nama'),
		'kd_jurusan'=>$this->input->post('kd_jurusan'),
		'gender'=>$this->input->post('gender'),
		'alamat'=>$this->input->post('alamat'),
		'no_telp_wali'=>$this->input->post('no_telp_wali'),
		'foto'=>'default.jpg');
		$this->db->insert('siswa',$data);
	}
	
	function edit_siswa($nis)
	{
		$edit=$this->db->get_where('siswa', array('nis' => $nis));
		return $edit;
	}
	
	function update_siswa($nis)
	{
		$foto=$this->upload->data();
		$data=array(
		'nis'=>$this->input->post('nis'),
		'nama'=>$this->input->post('nama'),
		'kd_jurusan'=>$this->input->post('kd_jurusan'),
		'gender'=>$this->input->post('gender'),
		'alamat'=>$this->input->post('alamat'),
		'no_telp_wali'=>$this->input->post('no_telp_wali'),
		'foto'=>$foto['file_name']);
		$this->db->where('nis',$nis);
		$this->db->update('siswa',$data);
	}
	function update_siswa_error($nis)
	{
		$foto=$this->upload->data();
		$data=array(
		'nis'=>$this->input->post('nis'),
		'nama'=>$this->input->post('nama'),
		'kd_jurusan'=>$this->input->post('kd_jurusan'),
		'gender'=>$this->input->post('gender'),
		'alamat'=>$this->input->post('alamat'),
		'no_telp_wali'=>$this->input->post('no_telp_wali'),
		'foto'=>$this->input->post('fotonya'));
		$this->db->where('nis',$nis);
		$this->db->update('siswa',$data);
	}
}
?>