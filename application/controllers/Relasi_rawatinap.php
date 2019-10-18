<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Relasi_rawatinap extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');		
		$this->load->model('m_home');
		$this->load->model('m_relasi_rawatinap');
		$this->load->helper('custom_func');
	

		if ($this->session->userdata('id_user')=="") 
		{
			redirect('index.php/login');
		}

		$this->load->helper('text');
		date_default_timezone_set("Asia/jakarta");
		
	}

	/***************** relasi_rawatinap *******************/	
	public function list_relasi_rawatinap()
	{
		$data['query'] = $this->m_relasi_rawatinap->all_relasi_rawatinap();
		$data['pegawai'] = $this->m_home->all_pegawai();
		
		//var_dump($data['pegawai']);
		$this->load->view("template/part/relasi_rawatinap",$data);
	}

	public function relasi_rawatinap_json($id)
	{
		header('Content-Type: application/json');
		$data['query'] = $this->m_relasi_rawatinap->relasi_rawatinap_by_id($id);
		echo json_encode($data['query']);
	}

	public function simpan_form_relasi_rawatinap()
	{
		$id = $this->input->post('id');		
		$serialize = $this->input->post();
		

		if($id=='')
		{
			
			$this->m_relasi_rawatinap->tambah_relasi_rawatinap($serialize);
			die('1');
		}else{

			$this->m_relasi_rawatinap->update_relasi_rawatinap($serialize,$id);


		}
	
	}

	public function hapus_relasi_rawatinap($id)
	{
		$this->m_relasi_rawatinap->hapus_relasi_rawatinap($id);
	}
	/***************** relasi_rawatinap *******************/




}
