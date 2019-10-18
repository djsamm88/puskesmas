<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_konseling extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');		
		$this->load->model('m_ruang_konseling');
		$this->load->model('m_obat');
		$this->load->helper('custom_func');
	

		if ($this->session->userdata('id_user')=="") 
		{
			redirect('index.php/login');
		}

		$this->load->helper('text');
		date_default_timezone_set("Asia/jakarta");
		
	}

	

/*******************************Master ruang_konseling***********************************/
public function all_master_ruang_konseling()
	{
		$data['query'] = $this->m_ruang_konseling->all_ruang_konse();
		$this->load->view("template/part/list_master_ruang_konseling.php",$data);
	}

public function simpan_master_ruang_konseling()
	{
		$id = $this->input->post('id');		
		$serialize = $this->input->post();
		

		if($id=='')
		{
			
			$this->m_ruang_konseling->tambah_ruang_konse($serialize);
			die('1');
		}else{

			$this->m_ruang_konseling->update_ruang_konse($serialize,$id);


		}
	
	}
public function json_ruang_konseling($id)
	{
		header('Content-Type: application/json');
		$data['query'] = $this->m_ruang_konseling->by_id_ruang_konse($id);
		echo json_encode($data['query']);
	}
public function hapus_ruang_konseling($id)
	{
		$this->m_ruang_konseling->hapus_ruang_konse($id);
	}

}
