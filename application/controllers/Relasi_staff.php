<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Relasi_staff extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');		
		$this->load->model('m_home');
		$this->load->model('m_relasi_staff');
		$this->load->helper('custom_func');
	

		if ($this->session->userdata('id_user')=="") 
		{
			redirect('index.php/login');
		}

		$this->load->helper('text');
		date_default_timezone_set("Asia/jakarta");
		
	}

	/***************** relasi_staff *******************/	
	public function list_relasi_staff()
	{
		$data['query'] = $this->m_relasi_staff->all_relasi_staff();
		$data['pegawai'] = $this->m_home->all_pegawai();
		
		//var_dump($data['pegawai']);
		$this->load->view("template/part/relasi_staff",$data);
	}

	public function relasi_staff_json($id)
	{
		header('Content-Type: application/json');
		$data['query'] = $this->m_relasi_staff->relasi_staff_by_id($id);
		echo json_encode($data['query']);
	}

	public function simpan_form_relasi_staff()
	{
		$id = $this->input->post('id');		
		$serialize = $this->input->post();
		

		if($id=='')
		{
			
			$this->m_relasi_staff->tambah_relasi_staff($serialize);
			die('1');
		}else{

			$this->m_relasi_staff->update_relasi_staff($serialize,$id);


		}
	
	}

	public function hapus_relasi_staff($id)
	{
		$this->m_relasi_staff->hapus_relasi_staff($id);
	}
	/***************** relasi_staff *******************/




}
