<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_gizi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');		
		$this->load->model('m_gizi');
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
		$data['query'] = $this->m_gizi->all();
		$this->load->view("template/part/list_ruang_gizi.php",$data);
	}




	public function json($id)
	{
		header('Content-Type: application/json');
		$data['query'] = $this->m_gizi->by_id($id);
		echo json_encode($data['query']);
	}



	public function simpan()
	{
		$id = $this->input->post('id');		
		$serialize = $this->input->post();
		

		if($id=='')
		{
			
			$this->m_gizi->tambah($serialize);
			die('1');
		}else{

			$this->m_gizi->update($serialize,$id);


		}
	
	}

	public function hapus($id)
	{
		$this->m_gizi->hapus($id);
	}
	/***** crud ****/


	
	public function data_kunjungan_gizi()
	{
		$data['all'] = $this->m_gizi->data_kunjungan_gizi();
		$data['history'] = $this->m_gizi->history_data_kunjungan_gizi();
		$this->load->view("template/part/data_kunjungan_gizi.php",$data);
	}


	public function data_kunjungan_gizi_history()
	{
		//$data['all'] = $this->m_gizi->data_kunjungan_gizi();
		$data['all'] = $this->m_gizi->history_data_kunjungan_gizi();
		$this->load->view("template/part/data_kunjungan_gizi.php",$data);
	}




	public function proses_gizi($id_kunjungan)
	{
		$data['all'] = $this->m_gizi->data_kunjungan_gizi($id_kunjungan);
		//var_dump($data['all']);
		$data['diag'] = $this->m_kunjungan->m_get_diag($id_kunjungan);
		$this->load->view("template/part/form_proses_gizi.php",$data);	
		//var_dump($data);
	}
	public function go_edit()
	{
		
		
		$id_kunjungan	= $this->input->post("id_kunjungan");
		$arr_data = $this->input->post();		
		$no_pendaftaran = $arr_data['no_pendaftaran'];
		
		$timeline['ke'] = "2";				
		$timeline['dari'] = "4";		
		$timeline['tgl_mulai'] = date("Y-m-d")." ".$arr_data['jam_mulai'];
		$timeline['tgl_selesai'] = date("Y-m-d")." ".$arr_data['jam_selesai'];
		$timeline['no_pendaftaran'] = $no_pendaftaran;
		$timeline['lama_pemeriksaan'] = $arr_data['lama_pemeriksaan'];		
		$timeline['id_kunjungan'] = $id_kunjungan;						
		$id_timeline = $this->m_home->set_timeline($timeline);
		unset($arr_data['jam_mulai']);
		unset($arr_data['jam_selesai']);
		unset($arr_data['lama_pemeriksaan']);
		
		$arr_data['id_timeline'] = $id_timeline;

		$id_kunjungan = $this->m_gizi->go_edit($arr_data,$id_kunjungan);
			
		echo $id_kunjungan;		
			
	}

	public function view_hasil_gizi_by_id_kunjungan($id_kunjungan)
	{
		$data['all'] = $this->m_gizi->hasil_gizi_by_id_kunjungan($id_kunjungan);		
		$data['diag'] = $this->m_kunjungan->m_get_diag($id_kunjungan);
		//var_dump($data);
		$this->load->view("template/part/view_hasil_gizi_by_id_kunjungan.php",$data);	
	}

	public function view_hasil_gizi_by_id_kunjungan_pdf($id_kunjungan)
	{
		$data['all'] = $this->m_gizi->hasil_gizi_by_id_kunjungan($id_kunjungan);		
		$data['diag'] = $this->m_kunjungan->m_get_diag($id_kunjungan);
		$data['file_type'] = 'pdf';
		$data['app'] = $this->m_home->data_app();
		$filename="laporan_gizi_".date("Ymdhis");
		$pdfFilePath = FCPATH."/laporan/$filename.pdf";
		
		 
		if (file_exists($pdfFilePath) == FALSE)
		{
			ini_set('memory_limit', '2048M');
			
			$html = $this->load->view("template/part/view_hasil_gizi_by_id_kunjungan_pdf.php",$data,true); 
			
			
			$this->load->library('pdf_potrait');
			$pdf = $this->pdf_potrait->load();			
			$pdf->SetFooter("Dokumen ini dicetak melalui ".$_SERVER['HTTP_HOST'].'|{PAGENO}|'.date("YmdHis")."_".$this->session->userdata('id_pegawai')); // Add a footer for good measure <
			$pdf->WriteHTML($html); // write the HTML into the PDF
			$pdf->Output($pdfFilePath, 'F'); // save to file because we can
		}
		 
		 redirect(base_url()."laporan/$filename.pdf","refresh");
	
	}
}
