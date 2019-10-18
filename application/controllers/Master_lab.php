<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_lab extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');		
		$this->load->model('m_master_lab');
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

	
	

	/*******************************Master lap***********************************/
	public function all_master_lab()
	{
		$data['query'] = $this->m_master_lab->all_master_lab();
		$this->load->view("template/part/list_master_lab.php",$data);
	}

	public function simpan_master_lab()
	{
		$id_lab = $this->input->post('id_lab');		
		$serialize = $this->input->post();
		

		if($id_lab=='')
		{
			
			$this->m_master_lab->tambah_master_lab($serialize);
			die('1');
		}else{

			$this->m_master_lab->update_master_lab($serialize,$id_lab);


		}
		
	}
	public function json_master_lab($id_lab)
	{
		header('Content-Type: application/json');
		$data['query'] = $this->m_master_lab->by_id_master_desa($id_lab);
		echo json_encode($data['query']);
	}
	public function hapus_master_lap($id_lab)
	{
		$this->m_master_lab->hapus_master_desa($id_lab);
	}
}
