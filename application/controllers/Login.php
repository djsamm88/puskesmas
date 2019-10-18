<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');		
		$this->load->helper('custom_func');
		date_default_timezone_set("Asia/jakarta");
		$this->load->model('m_home');
	}

	public function index() {
		$data['title']="Login";
		$data['app']=$this->m_home->data_app();
		$this->load->helper('url');
		$this->load->helper(array('form'));
		$this->load->view('template/login.php',$data);
	}

	public function cek_login() {
		
		$email 		= trim(str_replace(" ","",$this->input->post('email', TRUE)));
		$password 	= trim(md5($this->input->post('password', TRUE)));
		
		//var_dump($this->input->post());
		
		
		
		$hasil = $this->db->query("SELECT * FROM tbl_pegawai WHERE email='$email'");
		
	
		
		if ($hasil->num_rows() > 0) 
		{
			$qq = $hasil->result();
			foreach($qq as $a)			
			{
					
					
					$qqq = $this->db->query("SELECT * FROM tbl_pegawai WHERE email='$email' AND password='$password'");
		
					if($qqq->num_rows() > 0)
					{
						foreach($qqq->result() as $a)			
						{
									
							$sess_data['id_pegawai']	= $a->id_pegawai;
							$sess_data['id_user']	= $a->id_pegawai;
							$sess_data['nama'] 		= $a->nama;
							$sess_data['email'] 	= $a->email;													
							$sess_data['jabatan']	= $a->jabatan;
							
							
							$this->session->set_userdata($sess_data);
							
							die("1");
						}
					}else{
						die("0");
					}
				
			}
			
		}else{
			die("0");
		}
		
		
		
	}
	
	public function logout() {
		
		
		session_destroy();
		redirect('index.php/login');
	}
	
	
	
	
	
	
}