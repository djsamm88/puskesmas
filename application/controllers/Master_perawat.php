<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_perawat extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');		
		$this->load->model('m_perawat');
		$this->load->model('m_kunjungan');
		$this->load->model('m_obat');
		$this->load->model('m_home');

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
		$data['query'] = $this->m_perawat->all();
		$this->load->view("template/part/list_perawat.php",$data);
	}




	public function json($id)
	{
		header('Content-Type: application/json');
		$data['query'] = $this->m_perawat->by_id($id);
		echo json_encode($data['query']);
	}



	public function simpan()
	{
		$id = $this->input->post('id');		
		$serialize = $this->input->post();
		

		if($id=='')
		{
			
			$this->m_perawat->tambah($serialize);
			die('1');
		}else{

			$this->m_perawat->update($serialize,$id);


		}
	
	}

	public function hapus($id)
	{
		$this->m_perawat->hapus($id);
	}
	/***** crud ****/

}
