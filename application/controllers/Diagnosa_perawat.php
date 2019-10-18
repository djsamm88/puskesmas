<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Diagnosa_perawat extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');		
		$this->load->model('m_diagnosa_perawat');
		$this->load->model('m_obat');
		$this->load->helper('custom_func');
	

		if ($this->session->userdata('id_user')=="") 
		{
			redirect('index.php/login');
		}

		$this->load->helper('text');
		date_default_timezone_set("Asia/jakarta");
		
	}

	
	/***** crud *****/
	public function all()
	{
		$data['query'] = $this->m_diagnosa_perawat->all();
		$this->load->view("template/part/list_diagnosa_perawat.php",$data);
	}




	public function json($id)
	{
		header('Content-Type: application/json');
		$data['query'] = $this->m_diagnosa_perawat->by_id($id);
		echo json_encode($data['query']);
	}



	public function simpan()
	{
		$id = $this->input->post('id');		
		$serialize = $this->input->post();
		

		if($id=='')
		{
			
			$this->m_diagnosa_perawat->tambah($serialize);
			die('1');
		}else{

			$this->m_diagnosa_perawat->update($serialize,$id);


		}
	
	}

	public function hapus($id)
	{
		$this->m_diagnosa_perawat->hapus($id);
	}
	/***** crud ****/




}
