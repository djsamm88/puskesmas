<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Relasi_rujukan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');		
		$this->load->model('m_home');
		$this->load->model('m_relasi_rujukan');
		$this->load->helper('custom_func');
	

		if ($this->session->userdata('id_user')=="") 
		{
			redirect('index.php/login');
		}

		$this->load->helper('text');
		date_default_timezone_set("Asia/jakarta");
		
	}

	/***************** relasi_rujukan *******************/	
	public function list_relasi_rujukan()
	{
		$data['query'] = $this->m_relasi_rujukan->all_relasi_rujukan();
		$data['pegawai'] = $this->m_home->all_pegawai();
		
		//var_dump($data['pegawai']);
		$this->load->view("template/part/relasi_rujukan",$data);
	}

	public function relasi_rujukan_json($id)
	{
		header('Content-Type: application/json');
		$data['query'] = $this->m_relasi_rujukan->relasi_rujukan_by_id($id);
		echo json_encode($data['query']);
	}

	public function simpan_form_relasi_rujukan()
	{
		$id = $this->input->post('id');		
		$serialize = $this->input->post();
		

		if($id=='')
		{
			
			$this->m_relasi_rujukan->tambah_relasi_rujukan($serialize);
			die('1');
		}else{

			$this->m_relasi_rujukan->update_relasi_rujukan($serialize,$id);


		}
	
	}

	public function hapus_relasi_rujukan($id)
	{
		$this->m_relasi_rujukan->hapus_relasi_rujukan($id);
	}
	/***************** relasi_rujukan *******************/




}
