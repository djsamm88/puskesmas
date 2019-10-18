<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Relasi_gizi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');		
		$this->load->model('m_home');
		$this->load->model('m_relasi_gizi');
		$this->load->helper('custom_func');
	

		if ($this->session->userdata('id_user')=="") 
		{
			redirect('index.php/login');
		}

		$this->load->helper('text');
		date_default_timezone_set("Asia/jakarta");
		
	}

	/***************** relasi_gizi *******************/	
	public function list_relasi_gizi()
	{
		$data['query'] = $this->m_relasi_gizi->all_relasi_gizi();
		$data['pegawai'] = $this->m_home->all_pegawai();
		
		//var_dump($data['pegawai']);
		$this->load->view("template/part/relasi_gizi",$data);
	}

	public function relasi_gizi_json($id)
	{
		header('Content-Type: application/json');
		$data['query'] = $this->m_relasi_gizi->relasi_gizi_by_id($id);
		echo json_encode($data['query']);
	}

	public function simpan_form_relasi_gizi()
	{
		$id = $this->input->post('id');		
		$serialize = $this->input->post();
		

		if($id=='')
		{
			
			$this->m_relasi_gizi->tambah_relasi_gizi($serialize);
			die('1');
		}else{

			$this->m_relasi_gizi->update_relasi_gizi($serialize,$id);


		}
	
	}

	public function hapus_relasi_gizi($id)
	{
		$this->m_relasi_gizi->hapus_relasi_gizi($id);
	}
	/***************** relasi_gizi *******************/




}
