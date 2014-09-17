<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class c_pelanggaran extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_poin');
		$this->load->model('m_pelanggaran');
		$this->load->model('m_siswa');
		session_start();
		if($this->session->userdata('hak')=='') {
				redirect('c_login/tampil', 'refresh');
		} else if ($this->session->userdata('hak')!='1') {
			redirect('c_login/logout', 'refresh');
		}
	}
	
	public function index()
	{
		$data['text']= $this->m_pelanggaran->daftar_pelanggaran();
		$this->load->view('admin/pelanggaran/tampil',$data);
	}
	
	function hapus() {
		$kode=$this->uri->segment(3,0);
		$this->m_pelanggaran->hapus_pelanggaran($kode);
		redirect('c_pelanggaran', 'refresh');
	}
	
}