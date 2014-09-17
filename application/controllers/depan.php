<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Depan extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		session_start();
		if($this->session->userdata('hak')=='') {
				redirect('c_login/tampil', 'refresh');
		} else if ($this->session->userdata('hak')=='1') {
			redirect('c_admin', 'refresh');
		}
	}
	public function index()
	{	
		$this->load->view('depan');
	}
}