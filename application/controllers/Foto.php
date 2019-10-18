<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Foto extends CI_Controller {


	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');		
		$this->load->model('m_foto');
		
		$this->load->helper('custom_func');
		

		if ($this->session->userdata('id_user')=="") 
		{
			redirect('index.php/login');
		}

		$this->load->helper('text');
		date_default_timezone_set("Asia/jakarta");
	}

	
	public function view_foto($id_kunjungan)
	{
		$data['all_foto'] = $this->m_foto->all_foto($id_kunjungan);
		$data['id_kunjungan'] = $id_kunjungan;
		$this->load->view('template/part/view_foto',$data);
	}


	public function json_foto($id_kunjungan)
	{		
		header('Content-Type: application/json');
		$data['all_foto'] = $this->m_foto->all_foto($id_kunjungan);
		echo json_encode($data['all_foto']);
	}

	

	public function simpan_foto()
	{
		$serialize = $this->input->post();
		$serialize['url_foto'] = upload_file('url_foto');
		var_dump($serialize);

		$this->m_foto->tambah($serialize);
	}
}
