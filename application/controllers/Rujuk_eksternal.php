<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rujuk_eksternal extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');		
		$this->load->model('m_rujuk_eksternal');			
		$this->load->model('m_kunjungan');	
		$this->load->model('m_home');	

		$this->load->helper('custom_func');
	

		if ($this->session->userdata('id_user')=="") 
		{
			redirect('index.php/login');
		}

		$this->load->helper('text');
		date_default_timezone_set("Asia/jakarta");
		
	}

	
	public function data()
	{
		$data['all'] = $this->m_rujuk_eksternal->data();
		$this->load->view("template/part/list_rujuk_eksternal.php",$data);
	}


	public function data_history()
	{
		$data['all'] = $this->m_rujuk_eksternal->data_history();
		$this->load->view("template/part/list_rujuk_eksternal.php",$data);
	}


	function cetak_diagnosa($id_kunjungan)
	{
		
		$q = $this->db->query("SELECT * FROM `tbl_timeline` 
								WHERE id_kunjungan='$id_kunjungan'
								ORDER BY tgl_selesai DESC LIMIT 1
							");
		$qq = $q->result();
		$qqq = $qq[0];


		$timeline['ke'] = "11";				
		$timeline['dari'] = "10";		
		$timeline['tgl_mulai'] = $qqq->tgl_selesai;
		$timeline['tgl_selesai'] = date("Y-m-d H:i:s");
		$timeline['no_pendaftaran'] = $qqq->no_pendaftaran;
		$timeline['lama_pemeriksaan'] = dapat_menit($timeline['tgl_mulai'],$timeline['tgl_selesai']);		
		$timeline['id_kunjungan'] = $id_kunjungan;						
		$id_timeline = $this->m_home->set_timeline($timeline);
		
		$arr_data['id_timeline'] = $id_timeline;
		/********* update tbl_kunjungan **********/
		$this->db->where('id_kunjungan', $id_kunjungan);
		$this->db->update('tbl_kunjungan', $arr_data); 
		/********* update tbl_kunjungan **********/
			


		$filename="diagnosa_".$id_kunjungan."_".date("Ymdhis");
		$pdfFilePath = FCPATH."/kartu/$filename.pdf";
		$x['all'] = $this->m_kunjungan->m_diagnosa($id_kunjungan);
		$x['diag'] = $this->m_kunjungan->m_get_diag($id_kunjungan);
		$x['app'] = $this->m_home->data_app();
		 //$this->load->view('template/part/diagnosa_pdf',$x,true);			 
		 
		 //echo "abc";
		 //die();
		if (file_exists($pdfFilePath) == FALSE)
		{
			ini_set('memory_limit','32M');
			$html = $this->load->view('template/part/diagnosa_rujuk_pdf',$x,true);			 
			
			
			$this->load->library('pdf_potrait');
			$pdf = $this->pdf_potrait->load();			
			$pdf->SetFooter("Dokumen ini dicetak melalui ".$_SERVER['HTTP_HOST'].'|{PAGENO}|'.date("YmdHis")."_".$this->session->userdata('id_pegawai')); // Add a footer for good measure <
			$pdf->WriteHTML($html); // write the HTML into the PDF
			$pdf->Output($pdfFilePath, 'F'); // save to file because we can
		}
		 
		redirect(base_url()."kartu/$filename.pdf","refresh");
		
		
	}



	function cetak_diagnosa_history($id_kunjungan)
	{

		$filename="diagnosa_".$id_kunjungan."_".date("Ymdhis");
		$pdfFilePath = FCPATH."/kartu/$filename.pdf";
		$x['all'] = $this->m_kunjungan->m_diagnosa($id_kunjungan);
		$x['diag'] = $this->m_kunjungan->m_get_diag($id_kunjungan);
		$x['app'] = $this->m_home->data_app();
		 //$this->load->view('template/part/diagnosa_pdf',$x,true);			 
		 
		 //echo "abc";
		 //die();
		if (file_exists($pdfFilePath) == FALSE)
		{
			ini_set('memory_limit','32M');
			$html = $this->load->view('template/part/diagnosa_rujuk_pdf',$x,true);			 
			
			
			$this->load->library('pdf_potrait');
			$pdf = $this->pdf_potrait->load();			
			$pdf->SetFooter("Dokumen ini dicetak melalui ".$_SERVER['HTTP_HOST'].'|{PAGENO}|'.date("YmdHis")."_".$this->session->userdata('id_pegawai')); // Add a footer for good measure <
			$pdf->WriteHTML($html); // write the HTML into the PDF
			$pdf->Output($pdfFilePath, 'F'); // save to file because we can
		}
		 
		redirect(base_url()."kartu/$filename.pdf","refresh");
		
		
	}

	



}
