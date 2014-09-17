<?php
class c_login extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_login');
		$this->load->library('session');
		session_start();
	}
	
	function tampil()
	{
		if ($this->uri->segment(3) == "1") {
			$data['error'] = "<div data-alert class='alert-box merah'>Username / Password Salah<a href='#' class='close'>&times;</a></div>";
		} else {
			$data['error'] = "";
		}
		$this->load->view('login', $data);
	}
		function user()
	{
			$data['hasil']=$this->m_login->cekdb();
				if($data['hasil'] == null)
				{
					redirect('c_login/tampil/1','refresh');
				}
		else
		{
		 	$data['username'] = $this->input->post('u');
			$data['password'] = md5($this->input->post('p'));
			foreach($data['hasil'] as $row)
			{$data['hak'] = $row->hak;}
			$newdata = array(
			'username' => $data['username'],
			'password' => $data['password'],
			'hak' => $data['hak'],			
			'login' => TRUE
			);
			$this->session->set_userdata($newdata);
			
				$this->pilih_masuk($data['hak']);
			
		}
	}
	
	
	function pilih_masuk($hak)
	{
		if($hak == '1')
		{
			redirect('c_admin');
		}
		
		if($hak == '2')
		{
			redirect('depan');
		}
	}

	
	function logout()
	{
		$this->session->sess_destroy();
		redirect('c_login/tampil','refresh');
	}
}