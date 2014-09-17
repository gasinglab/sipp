<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class c_poin extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_poin');
		$this->load->model('m_pelanggaran');
		$this->load->model('m_siswa');
		session_start();
		if($this->session->userdata('hak')=='') {
				redirect('c_login/tampil', 'refresh');
			}
	}
	
	public function index()
	{
		$this->load->view('poin');
	}
	
	public function tambah()
	{
		$data['kodepoin']=$this->m_poin->cek_kodepoin();
		$data['bio']=$this->m_siswa->bio($this->uri->segment(3));
		$data['nis'] = $this->uri->segment(3);
		$data['jumlah_poin'] = $this->m_poin->jumlah_poin($this->uri->segment(3));
		$data['daftar_pelanggaran']=$this->m_pelanggaran->daftar_pelanggaran();
		$this->load->view('poin/tambah', $data);
	}
	
	function input()
	{
		$this->m_poin->input_poin();
		redirect('c_siswa/cari', 'refresh');
	}
	
	function hapus() {
		$kode=$this->uri->segment(4,0);
		$nis=$this->uri->segment(3,0);
		$this->m_poin->hapus_poin($kode);
		redirect('c_poin/tampil/'.$nis, 'refresh');
	}
	
	function tampil() {
		$nis=$this->uri->segment(3,0);
		$data['jml_poin']=$this->m_poin->jumlah_poin($nis);
		$data['text']=$this->m_poin->tampil($nis);
		$this->load->view('poin/tampil',$data);
	}
	
}