<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Laporan extends CI_Controller {


	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');		
		$this->load->model('m_laporan');
		$this->load->helper('custom_func');
		

		if ($this->session->userdata('id_user')=="") 
		{
			redirect('index.php/login');
		}

		$this->load->helper('text');
		date_default_timezone_set("Asia/jakarta");
	}

	function form_laporan_by_date()
	{
		$data['autocomplete_nama'] = $this->m_laporan->autocomplete_nama();
		$data['judul'] = "Buat Laporan";		
		$this->load->view("template/part/form_laporan_by_date",$data);
	}


	function laporan_by_date()
	{
		$awal = $this->input->get("awal");
		$akhir = $this->input->get("akhir");
		$file="Laporan_Pasien_".$awal."_sd_".$akhir.".xls";				
		$no_pendaftaran = $this->input->get("no_pendaftaran");
		$data['lap'] = $this->m_laporan->laporan_by_date($awal,$akhir,$no_pendaftaran);
		$data['awal'] = $awal;
		$data['akhir'] = $akhir;
		$this->load->view("template/part/laporan_by_date",$data);
	}


	function laporan_by_date_xl()
	{
		$awal = $this->input->get("awal");
		$akhir = $this->input->get("akhir");
		$file="Laporan_Pasien_".$awal."_sd_".$akhir.".xls";
		
		header("Content-type: application/octet-stream");
		header("Content-Disposition: attachment; filename=$file");
		header("Pragma: no-cache");
		header("Expires: 0");
		$no_pendaftaran = $this->input->get("no_pendaftaran");
		$data['lap'] = $this->m_laporan->laporan_by_date($awal,$akhir,$no_pendaftaran);
		$data['awal'] = $awal;
		$data['akhir'] = $akhir;
		$this->load->view("template/part/laporan_by_date",$data);
	}


	function laporan_by_date_pdf()
	{
		$awal = $this->input->get("awal");
		$akhir = $this->input->get("akhir");
		
		$no_pendaftaran = $this->input->get("no_pendaftaran");
		$data['lap'] = $this->m_laporan->laporan_by_date($awal,$akhir,$no_pendaftaran);
		$data['awal'] = $awal;
		$data['akhir'] = $akhir;
		//$this->load->view("template/part/laporan_by_date",$data);



		$filename="laporan_pasien_".date("Ymdhis");
		$pdfFilePath = FCPATH."/laporan/$filename.pdf";
		
		 
		if (file_exists($pdfFilePath) == FALSE)
		{
			ini_set('memory_limit', '2048M');
			
			$html = $this->load->view("template/part/laporan_by_date.php",$data,true); 
			
			
			$this->load->library('pdf');
			$pdf = $this->pdf->load();		
			$pdf->SetFooter("Dokumen ini dicetak melalui ".$_SERVER['HTTP_HOST'].'|{PAGENO}|'.date("YmdHis")."_".$this->session->userdata('id_pegawai')); // Add a footer for good measure <	
			$pdf->WriteHTML($html); // write the HTML into the PDF
			$pdf->Output($pdfFilePath, 'F'); // save to file because we can
		}
		 
		 redirect(base_url()."laporan/$filename.pdf","refresh");
	
	}




	
	function view($id_kunjungan)
	{
		
		$q['judul'] = "View Detail";
		$q['query'] = $this->m_laporan->view($id_kunjungan);
		$q['hasils'] = $this->m_laporan->hasil($id_kunjungan);
		
		
		$this->load->view("template/part/view_kunjungan",$q);
	}
	
	
	
	function form_lb1()
	{
		$q['judul'] = 'LAPORAN BULANAN';
		$this->load->view("template/part/form_lb1",$q);
	}
	
	
	
	function go_lb1()
	{
		
		$bulan = $this->input->get("bulan");
		$tahun = $this->input->get("tahun");
		
		$arr = array(
						"bulan"=>$bulan,
						"tahun"=>$tahun		
					); 	
		
		$q['bulan']=$bulan;
		$q['tahun']=$tahun;
		$q['diagnosa'] = $this->m_laporan->lb1($arr);
		//$q['hasils'] = $this->m_laporan->hasil($arr);
		
		
		//var_dump($q);
		$this->load->view("template/part/lb1_xl.php",$q);
		
		
	}
	
	
	
	
	function form_laporan_pneumonia()
	{
		$q['judul'] = 'LAPORAN BULANAN PNEUMONIA';
		$this->load->view("template/part/form_pneumonia",$q);
	}
	

	
	function form_laporan_ispa()
	{
		$q['judul'] = 'LAPORAN BULANAN ISPA (J06)';
		$this->load->view("template/part/form_ispa",$q);
	}
	

	
	function form_laporan_ispa_j22()
	{
		$q['judul'] = 'LAPORAN BULANAN ISPA (J22)';
		$this->load->view("template/part/form_laporan_ispa_j22",$q);
	}
	
	
	function go_pneumonia()
	{
		
		$bulan = $this->input->get("bulan");
		$tahun = $this->input->get("tahun");
		$code1  = 'J18.0';
		$code2  = 'J18.9';
		
		
		$arr = array(
						"bulan"=>$bulan,
						"tahun"=>$tahun,
						"code1"=>$code1,
						"code2"=>$code2
						
					); 	
		
		
		
		$q['bulan']=$bulan;
		$q['tahun']=$tahun;
		$q['file']="LAPORAN_PNEUMONIA_".$bulan."_".$tahun.".xls";
		$q['judul']="LAPORAN BULANAN PNEUMONIA ( $code1 - $code2 )";
		$q['data'] = $this->m_laporan->laporan_penumonia($arr);
		$this->load->view("template/part/laporan_all.php",$q);
		
	}
	
	function go_ispa_j22()
	{
		
		$bulan = $this->input->get("bulan");
		$tahun = $this->input->get("tahun");
		$code  = 'J22';
		
		
		$arr = array(
						"bulan"=>$bulan,
						"tahun"=>$tahun,
						"code"=>$code
					); 	
		
		
		
		$q['bulan']=$bulan;
		$q['tahun']=$tahun;
		$q['file']="LAPORAN_ISPA_J22_".$bulan."_".$tahun.".xls";
		$q['judul']="LAPORAN BULANAN ISPA ( $code )";
		$q['data'] = $this->m_laporan->laporan_all($arr);
		$this->load->view("template/part/laporan_all.php",$q);
		
	}
	
	function go_ispa()
	{
		
		$bulan = $this->input->get("bulan");
		$tahun = $this->input->get("tahun");
		$code  = 'J06';
		
		
		$arr = array(
						"bulan"=>$bulan,
						"tahun"=>$tahun,
						"code"=>$code
					); 	
		
		
		
		$q['bulan']=$bulan;
		$q['tahun']=$tahun;
		$q['file']="LAPORAN_ISPA_".$bulan."_".$tahun.".xls";
		$q['judul']="LAPORAN BULANAN ISPA ( $code )";
		$q['data'] = $this->m_laporan->laporan_all($arr);
		$this->load->view("template/part/laporan_all.php",$q);
		
	}
	
	
	function form_p2p_diare()
	{
		$q['judul'] = 'LAPORAN BULANAN P2P DIARE';
		$this->load->view("template/part/form_p2p_diare",$q);
	}
	
	function go_p2p_diare()
	{
		
		$bulan = $this->input->get("bulan");
		$tahun = $this->input->get("tahun");
		$code  = 'A09.0';
		
		
		$arr = array(
						"bulan"=>$bulan,
						"tahun"=>$tahun,
						"code"=>$code
					); 	
		
		
		
		$q['bulan']=$bulan;
		$q['tahun']=$tahun;
		$q['file']="LAPORAN_DIARE_".$bulan."_".$tahun.".xls";
		$q['judul']="LAPORAN BULANAN DIARE ( $code )";
		$q['data'] = $this->m_laporan->laporan_all($arr);
		$this->load->view("template/part/laporan_all.php",$q);
		
		
	}
	
	
	
	
	
	
}
