<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_rawat_inap extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');		
		$this->load->model('m_tabel_rawat_inap');
		$this->load->model('m_rawat_inap');
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
	public function form_rawat_inap($id_kunjungan)
	{
		$data['all'] = $this->m_rawat_inap->data_kunjungan_rawatinap($id_kunjungan);
		$this->load->view("template/part/form_rawat_inap.php",$data);
	}

	public function simpan_rawat_inap()
	{
		$arr_data = $this->input->post();
		$id_kunjungan = $this->input->post("id_kunjungan");
		$no_pendaftaran = $arr_data['no_pendaftaran'];
		
		$timeline['ke'] = "11";				
		$timeline['dari'] = "9";		
		$timeline['tgl_mulai'] = date("Y-m-d")." ".$arr_data['jam_mulai'];
		$timeline['tgl_selesai'] = date("Y-m-d")." ".$arr_data['jam_selesai'];
		$timeline['no_pendaftaran'] = $no_pendaftaran;
		$timeline['lama_pemeriksaan'] = $arr_data['lama_pemeriksaan'];		
		$timeline['id_kunjungan'] = $id_kunjungan;						
		$id_timeline = $this->m_home->set_timeline($timeline);
		unset($arr_data['jam_mulai']);
		unset($arr_data['jam_selesai']);
		unset($arr_data['lama_pemeriksaan']);
		unset($arr_data['no_pendaftaran']);
		//unset($arr_data['id_pegawai']);

		$seralize['id_timeline'] = $id_timeline;
		$this->m_kunjungan->go_edit($seralize,$id_kunjungan);


		$arr_data['id_pegawai'] = $this->session->userdata('id_pegawai');
		$this->m_tabel_rawat_inap->tambah($arr_data);

	}

	public function all_rawat_inap()
	{
		$data['query'] = $this->m_tabel_rawat_inap->all();
		$this->load->view("template/part/list_rawat_inap.php",$data);
	}

	public function form_edit_konse($id)
	{	 
		$data['edit']=$this->m_tabel_rawat_inap->get_edit($id);
		$data['judul'] = 'Form Edit Rawat Inap';	 
		
		$this->load->view('template/part/form_edit_rawat_inap',$data);
				 
		}
	public function simpan_edit()
	{
		
		$id	= $this->input->post("id");
		$serialize = $this->input->post();

		
		$id = $this->m_tabel_rawat_inap->update($serialize,$id);
			
		echo $id;		
			
	}
	/***** crud ****/

	function hapus_list_rawat_inap($id)
	{
	$this->m_tabel_rawat_inap->hapus($id);
	}

	public function data_kunjungan_rawatinap()
	{
		$data['all'] = $this->m_rawat_inap->data_kunjungan_rawatinap();
		$this->load->view("template/part/list_rawat_inap.php",$data);
	}


	public function data_kunjungan_rawatinap_history()
	{
		$data['all'] = $this->m_rawat_inap->data_kunjungan_rawatinap_history();
		$this->load->view("template/part/list_rawat_inap.php",$data);
	}


	public function view_pdf($id_kunjungan)
	{
		$data['all']=$this->m_rawat_inap->data_by_id_kunjungan($id_kunjungan);		
		$data['diag'] = $this->m_kunjungan->m_get_diag($id_kunjungan);
		$data['app'] = $this->m_home->data_app();

		$filename="laporan_rawat_inap_".date("Ymdhis");
		$pdfFilePath = FCPATH."/laporan/$filename.pdf";		

		//$html = $this->load->view("template/part/view_rawat_inap_pdf.php",$data); 	 

		
		if (file_exists($pdfFilePath) == FALSE)
		{
			ini_set('memory_limit', '2048M');
			
			$html = $this->load->view("template/part/view_rawat_inap_pdf.php",$data,true); 
			
			
			$this->load->library('pdf_potrait');
			$pdf = $this->pdf_potrait->load();			
			$pdf->SetFooter("Dokumen ini dicetak melalui ".$_SERVER['HTTP_HOST'].'|{PAGENO}|'.date("YmdHis")."_".$this->session->userdata('id_pegawai')); // Add a footer for good measure <
			$pdf->WriteHTML($html); // write the HTML into the PDF
			$pdf->Output($pdfFilePath, 'F'); // save to file because we can
		}
		 
		 redirect(base_url()."laporan/$filename.pdf","refresh");
		 
	}

}
