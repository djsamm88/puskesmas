<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Diagnosa extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');		
		$this->load->model('m_diagnosa');
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
		$data['query'] = $this->m_diagnosa->all();
		$this->load->view("template/part/list_diagnosa.php",$data);
	}




	public function json($id)
	{
		header('Content-Type: application/json');
		$data['query'] = $this->m_diagnosa->by_id($id);
		echo json_encode($data['query']);
	}



	public function simpan()
	{
		$id = $this->input->post('id');		
		$serialize = $this->input->post();
		

		if($id=='')
		{
			
			$this->m_diagnosa->tambah($serialize);
			die('1');
		}else{

			$this->m_diagnosa->update($serialize,$id);


		}
	
	}

	public function hapus($id)
	{
		$this->m_diagnosa->hapus($id);
	}
	/***** crud ****/




}
