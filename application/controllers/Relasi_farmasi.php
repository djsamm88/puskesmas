<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Relasi_farmasi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');		
		$this->load->model('m_home');
		$this->load->model('m_relasi_farmasi');
		$this->load->helper('custom_func');
	

		if ($this->session->userdata('id_user')=="") 
		{
			redirect('index.php/login');
		}

		$this->load->helper('text');
		date_default_timezone_set("Asia/jakarta");
		
	}

	/***************** relasi_farmasi *******************/	
	public function list_relasi_farmasi()
	{
		$data['query'] = $this->m_relasi_farmasi->all_relasi_farmasi();
		$data['pegawai'] = $this->m_home->all_pegawai();
		
		//var_dump($data['pegawai']);
		$this->load->view("template/part/relasi_farmasi",$data);
	}

	public function relasi_farmasi_json($id)
	{
		header('Content-Type: application/json');
		$data['query'] = $this->m_relasi_farmasi->relasi_farmasi_by_id($id);
		echo json_encode($data['query']);
	}

	public function simpan_form_relasi_farmasi()
	{
		$id = $this->input->post('id');		
		$serialize = $this->input->post();
		

		if($id=='')
		{
			
			$this->m_relasi_farmasi->tambah_relasi_farmasi($serialize);
			die('1');
		}else{

			$this->m_relasi_farmasi->update_relasi_farmasi($serialize,$id);


		}
	
	}

	public function hapus_relasi_farmasi($id)
	{
		$this->m_relasi_farmasi->hapus_relasi_farmasi($id);
	}
	/***************** relasi_farmasi *******************/




}
