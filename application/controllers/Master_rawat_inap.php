<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_rawat_inap extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');		
		$this->load->model('m_rawat_inap');
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


/*******************************Master Rawat Inap***********************************/
public function all_master_rawat_inap()
	{
		$data['query'] = $this->m_rawat_inap->all_rawat_inap();
		$this->load->view("template/part/list_master_rawat_inap.php",$data);
	}

public function simpan_master_rawat_inap()
	{
		$id = $this->input->post('id');		
		$serialize = $this->input->post();
		

		if($id=='')
		{
			
			$this->m_rawat_inap->tambah_master_rawat_inap($serialize);
			die('1');
		}else{

			$this->m_rawat_inap->update_rawat_inap($serialize,$id);


		}
	
	}
public function json_rawat_inap($id)
	{
		header('Content-Type: application/json');
		$data['query'] = $this->m_rawat_inap->by_id_rawat_inap($id);
		echo json_encode($data['query']);
	}
public function hapus_rawat_inap($id)
	{
		$this->m_rawat_inap->hapus_rawat_inap($id);
	}


}
