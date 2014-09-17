<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class c_siswa extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('m_siswa');
		session_start();
		if($this->session->userdata('hak')=='') {
				redirect('c_login/tampil', 'refresh');
			}
	}
	
	public function index() {
	}
	
	public function cari()
	{
		$q = $this->input->post('q');
		$q = mysql_real_escape_string($q);
		$data['q'] = $this->m_siswa->cari($q);
		$this->load->view('siswa/cari', $data);
	}
}