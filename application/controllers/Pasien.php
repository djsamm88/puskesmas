<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien extends CI_Controller {


	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');		
		$this->load->model('m_pasien');
		$this->load->model('m_home');
		$this->load->helper('custom_func');
		

		if ($this->session->userdata('id_user')=="") 
		{
			redirect('index.php/login');
		}

		$this->load->helper('text');
		date_default_timezone_set("Asia/jakarta");
	}

	
	
	
	function form_edit($no_pendaftaran){
			 
			 
		$data['edit']=$this->m_pasien->data_by_id($no_pendaftaran);
		$data['judul'] = 'Form Edit Pasien';	 
		
		$this->load->view('template/part/form_edit_pasien',$data);
			 
	}
	
	public function go_edit()
	{
		
		
		$no_pendaftaran	= $this->input->post("no_pendaftaran");
		$serialize = $this->input->post();

		
		//$tgl_lahir		= $this->input->post("tahun_tgl_lahir")."-".$this->input->post("bulan_tgl_lahir")."-".$this->input->post("tanggal_tgl_lahir");
		//$serialize['tgl_lahir'] = $tgl_lahir;
		unset($serialize['tahun_tgl_lahir']);
		unset($serialize['bulan_tgl_lahir']);
		unset($serialize['tanggal_tgl_lahir']);
		
		
				
		//$no_pendaftaran = $this->m_pasien->go_simpan($serialize);
		$no_pendaftaran = $this->m_pasien->go_edit($serialize,$no_pendaftaran);
			
		echo $no_pendaftaran;
			
			
	}
	
	
	public function go_simpan()
	{

		$serialize = $this->input->post();

		
		$tgl_lahir		= $this->input->post("tahun_tgl_lahir")."-".$this->input->post("bulan_tgl_lahir")."-".$this->input->post("tanggal_tgl_lahir");
		$serialize['tgl_lahir'] = $tgl_lahir;
		$serialize['tgl_daftar']=$serialize['tgl_mulai'];
		unset($serialize['tahun_tgl_lahir']);
		unset($serialize['bulan_tgl_lahir']);
		unset($serialize['tanggal_tgl_lahir']);
		unset($serialize['tgl_mulai']);
		
			
		$no_pendaftaran = $this->m_pasien->go_simpan($serialize);
			
		echo $no_pendaftaran;
	}
	
	
	
	
	public function form_simpan()
	{
		
		
		$data['judul'] = 'Form Registrasi Pasien';
		$this->load->view('template/part/form_simpan_pasien',$data);
			
			
	}
	
	
	

	function data_list()
	{
		$data['query'] 	= $this->m_pasien->data_list();
		$data['judul']	= 'Data List Pasien';
		$this->load->view("template/part/data_list_pasien",$data);
	}
	
	
	function hapus_list($no_pendaftaran)
	{
		$this->m_pasien->hapus_list($no_pendaftaran);
	}
	
	function kartu_pasien($no_pendaftaran)
	{
		$q['data'] 		= $this->m_pasien->data_by_id($no_pendaftaran);		
		$q['app']		= $this->m_home->data_app();

		$filename=$no_pendaftaran."_".date('Ymdhis');
		$pdfFilePath = FCPATH."/kartu/$filename.pdf";
		
		// $html = $this->load->view('template/part/kartu_pasien',$q);			 
		 
		
		if (file_exists($pdfFilePath) == FALSE)
		{
			ini_set('memory_limit','32M');
			$html = $this->load->view('template/part/kartu_pasien',$q,true);			 
			
			
			$this->load->library('kartu');
			$pdf = $this->kartu->load();			
			$pdf->WriteHTML($html); // write the HTML into the PDF
			$pdf->Output($pdfFilePath, 'F'); // save to file because we can
		}
		 
		redirect(base_url()."kartu/$filename.pdf","refresh");
		
		

		
		
		
	}

	function kartu_pasien_dua($no_pendaftaran)
	{
		$q['data'] 		= $this->m_pasien->data_by_id($no_pendaftaran);		
		$q['app']		= $this->m_home->data_app();

		$filename=$no_pendaftaran."_data";
		$pdfFilePath = FCPATH."/kartu/$filename.pdf";
		
		 
		if (file_exists($pdfFilePath) == FALSE)
		{
			ini_set('memory_limit','32M');
			$html = $this->load->view('template/part/kartu_pasien_dua',$q,true);			 
			
			
			$this->load->library('setengah');
			$pdf = $this->setengah->load();			
			$pdf->WriteHTML($html); // write the HTML into the PDF
			$pdf->Output($pdfFilePath, 'F'); // save to file because we can
		}
		 
		redirect(base_url()."kartu/$filename.pdf","refresh");
		
		
		
		
	}
	
	
	function hapus_user($id)
	{
		$this->m_pasien->hapus_pasien($id);
	}
	
	
}
