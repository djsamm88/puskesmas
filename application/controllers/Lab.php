<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lab extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');		
		$this->load->model('m_lab');
		$this->load->model('m_obat');
		$this->load->model('m_home');
		$this->load->model('m_kunjungan');
		$this->load->helper('custom_func');


		if ($this->session->userdata('id_user')=="") 
		{
			redirect('index.php/login');
		}

		$this->load->helper('text');
		date_default_timezone_set("Asia/jakarta");
		
	}

	
	/***** crud *****/
	public function all_lab()
	{
		$data['query'] = $this->m_lab->all_lab();
		$this->load->view("template/part/list_lab.php",$data);
	}
	public function form($id_kunjungan)
	{
		$data['all'] = $this->m_lab->data_kunjungan_lab($id_kunjungan);
		$this->load->view("template/part/form_lab.php",$data);

	}

	public function simpan_lab()
	{
		
		$arr_data = $this->input->post();
		$id_kunjungan = $this->input->post("id_kunjungan");
		$no_pendaftaran = $arr_data['no_pendaftaran'];
		
		$timeline['ke'] = "2";				
		$timeline['dari'] = "3";		
		$timeline['tgl_mulai'] = date("Y-m-d")." ".$arr_data['jam_mulai'];
		$timeline['tgl_selesai'] = date("Y-m-d")." ".$arr_data['jam_selesai'];
		$timeline['no_pendaftaran'] = $no_pendaftaran;
		$timeline['lama_pemeriksaan'] = $arr_data['lama_pemeriksaan'];		
		$timeline['id_kunjungan'] = $id_kunjungan;						
		$id_timeline = $this->m_home->set_timeline($timeline);
		unset($arr_data['jam_mulai']);
		unset($arr_data['jam_selesai']);
		unset($arr_data['lama_pemeriksaan']);
		
		$seralize['id_timeline'] = $id_timeline;
		$this->m_kunjungan->go_edit($seralize,$id_kunjungan);


		$arr_data['id_pegawai'] = $this->session->userdata('id_pegawai');
		
		$id = $this->m_lab->tambah_lab($arr_data);

		echo $id;
	}
	
	public function form_edit_lab($id)
	{


		$data['edit']=$this->m_lab->data_by_id($id);
		$data['judul'] = 'Form Edit Lab';	 
		
		$this->load->view('template/part/form_edit_lab',$data);

	}

	public function view_lab_pdf($id_kunjungan)
	{
		$data['all']=$this->m_lab->data_by_id_kunjungan($id_kunjungan);
		$data['app'] = $this->m_home->data_app();
		$filename="laporan_gizi_".date("Ymdhis");
		$pdfFilePath = FCPATH."/laporan/$filename.pdf";			 
		if (file_exists($pdfFilePath) == FALSE)
		{
			ini_set('memory_limit', '2048M');
			
			$html = $this->load->view("template/part/view_lab_pdf.php",$data,true); 
			
			
			$this->load->library('pdf_potrait');
			$pdf = $this->pdf_potrait->load();			
			$pdf->SetFooter("Dokumen ini dicetak melalui ".$_SERVER['HTTP_HOST'].'|{PAGENO}|'.date("YmdHis")."_".$this->session->userdata('id_pegawai')); // Add a footer for good measure <
			$pdf->WriteHTML($html); // write the HTML into the PDF
			$pdf->Output($pdfFilePath, 'F'); // save to file because we can
		}
		 
		 redirect(base_url()."laporan/$filename.pdf","refresh");
	}


	public function view_hasil_by_id_kunjungan($id_kunjungan)
	{
		
		$data['all'] = $this->m_lab->data_by_id_kunjungan($id_kunjungan);
		$this->load->view('template/part/form_view_lab',$data);
	}

	public function go_edit()
	{
		
		
		$id	= $this->input->post("id");
		$serialize = $this->input->post();

		
		$id = $this->m_lab->go_edit($serialize,$id);

		echo $id;		

	}
	public function hapus_list($id)
	{
		$this->m_lab->hapus_list($id);
	}


	public function data_kunjungan_lab()
	{
		$data['all'] = $this->m_lab->data_kunjungan_lab();
		$this->load->view("template/part/data_kunjungan_lab.php",$data);
	}


	public function data_kunjungan_lab_history()
	{
		$data['all'] = $this->m_lab->data_kunjungan_lab_history();
		$this->load->view("template/part/data_kunjungan_lab.php",$data);
	}


	public function proses_lab($id_kunjungan)
	{
		$data['all'] = $this->m_lab->data_kunjungan_lab($id_kunjungan);
		$this->load->view("template/part/form_proses_lab.php",$data);	
	}

	
}
