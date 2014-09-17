<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class c_adm_siswa extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('m_siswa');
		session_start();
		if($this->session->userdata('hak')=='') {
				redirect('c_login/tampil', 'refresh');
		} else if ($this->session->userdata('hak')!='1') {
			redirect('c_login/logout', 'refresh');
		}
		// if($this->session->userdata('level')=='')
		// {redirect('c_awal/');}
		// elseif($this->session->userdata('level')=='admin')
		// {redirect('c_petugas_user/petugas');}
		// elseif($this->session->userdata('level')=='ket_perpus')
		// {redirect('c_ket_perpus/ket_perpus');}
		// {}
	}
	
	public function index() {
		$config['base_url'] = base_url().'index.php/c_adm_siswa/index/'; 
		$config['total_rows'] = $this->db->count_all('siswa'); 
		$config['per_page'] = '50';
		$config['uri_segment'] = 3;
		$config['full_tag_open'] = '<p>';
		$config['full_tag_close'] = '</p>';
		$data['text'] = $this->m_siswa->tampil($config['per_page'],$this->uri->segment(3));
		$this->load->view('admin/siswa/tampil', $data);
	}
	
	function hapus() {
		$nis=$this->uri->segment(3,0);
		$this->m_siswa->hapus_siswa($nis);
		redirect('c_adm_siswa/', 'refresh');
	}
	
	function tambah() {
		$data['daftar_jurusan'] = $this->m_jurusan->daftar_jurusan();
		$this->load->view('admin/siswa/tambah', $data);	
	}
	
	function do_upload()
	{
	
		$config['upload_path'] = './uploads';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']	= '10000';
		$config['max_width']  = '10024';
		$config['max_height']  = '1768';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('foto'))
		{
			$data['insert']=$this->m_siswa->tambah_siswa_error();
			redirect('c_adm_siswa','refresh');
		}
		else
		{
		$nis=$this->input->post('nis');
			$data['insert']=$this->m_siswa->tambah_siswa();
			$this->load->vars($data);
			//echo $this->input->post('status');
			redirect('c_adm_siswa','refresh');
		}
	}
	function edit_siswa()
		{
			$nis=$this->uri->segment(3,0);
			$data['daftar_jurusan'] = $this->m_jurusan->daftar_jurusan();
			$data['edit'] = $this->m_siswa->edit_siswa($nis);
			$this->load->view('admin/siswa/edit',$data);
		}
		
		function update_siswa()
			{
		$config['upload_path'] = './uploads';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']	= '10000';
		$config['max_width']  = '10024';
		$config['max_height']  = '1768';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('foto'))
		{
			$nis=$this->uri->segment(3,0);
			$data['update']=$this->m_siswa->update_siswa_error($nis);
			redirect('c_adm_siswa','refresh');
		}
		else
		{
			$nis=$this->uri->segment(3,0);
			$data['update']=$this->m_siswa->update_siswa($nis);
			$this->load->vars($data);
			redirect('c_adm_siswa','refresh');
		}
	}
}
