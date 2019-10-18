<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Relasi_konseling extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');		
		$this->load->model('m_home');
		$this->load->model('m_relasi_konseling');
		$this->load->helper('custom_func');
	

		if ($this->session->userdata('id_user')=="") 
		{
			redirect('index.php/login');
		}

		$this->load->helper('text');
		date_default_timezone_set("Asia/jakarta");
		
	}

	/***************** relasi_konseling *******************/	
	public function list_relasi_konseling()
	{
		$data['query'] = $this->m_relasi_konseling->all_relasi_konseling();
		$data['pegawai'] = $this->m_home->all_pegawai();
		
		//var_dump($data['pegawai']);
		$this->load->view("template/part/relasi_konseling",$data);
	}

	public function relasi_konseling_json($id)
	{
		header('Content-Type: application/json');
		$data['query'] = $this->m_relasi_konseling->relasi_konseling_by_id($id);
		echo json_encode($data['query']);
	}

	public function simpan_form_relasi_konseling()
	{
		$id = $this->input->post('id');		
		$serialize = $this->input->post();
		

		if($id=='')
		{
			
			$this->m_relasi_konseling->tambah_relasi_konseling($serialize);
			die('1');
		}else{

			$this->m_relasi_konseling->update_relasi_konseling($serialize,$id);


		}
	
	}

	public function hapus_relasi_konseling($id)
	{
		$this->m_relasi_konseling->hapus_relasi_konseling($id);
	}
	/***************** relasi_konseling *******************/




}
