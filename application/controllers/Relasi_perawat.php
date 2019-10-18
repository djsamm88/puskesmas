<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Relasi_perawat extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');		
		$this->load->model('m_home');
		$this->load->model('m_relasi_perawat');
		$this->load->helper('custom_func');
	

		if ($this->session->userdata('id_user')=="") 
		{
			redirect('index.php/login');
		}

		$this->load->helper('text');
		date_default_timezone_set("Asia/jakarta");
		
	}

	/***************** relasi_perawat *******************/	
	public function list_relasi_perawat()
	{
		$data['query'] = $this->m_relasi_perawat->all_relasi_perawat();
		$data['pegawai'] = $this->m_home->all_pegawai();
		
		//var_dump($data['pegawai']);
		$this->load->view("template/part/relasi_perawat",$data);
	}

	public function relasi_perawat_json($id)
	{
		header('Content-Type: application/json');
		$data['query'] = $this->m_relasi_perawat->relasi_perawat_by_id($id);
		echo json_encode($data['query']);
	}

	public function simpan_form_relasi_perawat()
	{
		$id = $this->input->post('id');		
		$serialize = $this->input->post();
		

		if($id=='')
		{
			
			$this->m_relasi_perawat->tambah_relasi_perawat($serialize);
			die('1');
		}else{

			$this->m_relasi_perawat->update_relasi_perawat($serialize,$id);


		}
	
	}

	public function hapus_relasi_perawat($id)
	{
		$this->m_relasi_perawat->hapus_relasi_perawat($id);
	}
	/***************** relasi_perawat *******************/




}
