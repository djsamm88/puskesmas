<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {
	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');		
		
		
		$this->load->helper('custom_func');
		$this->load->helper('text');
		date_default_timezone_set("Asia/jakarta");
		
	}

	public function data()
	{
		
		if ($this->session->userdata('id_user')=="") 
		{
			redirect('index.php/login');
		}

		$q = $this->db->query("SELECT * FROM tbl_app");
		$qq = $q->result();
		if(count($qq)==0)
		{
			$this->db->query("
								INSERT INTO `tbl_app` (`id_app`, `nama_app`, `alamat_app`, `keterangan_app`, `app_kec`, `app_kab`, `app_prov`) VALUES
				(1, 'NAMA PUSKESMAS', 'Jl.Raya Indonesia no.45', 'e-Mail : admin@medantechno.com', 'Medan', 'Medan', 'SUMATERA UTARA')
			");
		}

		$data['app'] = $qq;

		$this->load->view('template/part/form_app.php',$data);

	}

	public function update()
	{
		$ser = $this->input->post();

		$this->db->set($ser);
		$this->db->where('id_app','1');
		$this->db->update('tbl_app');		
	}


}
