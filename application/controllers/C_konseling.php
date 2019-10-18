<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_konseling extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');		
		$this->load->model('m_konseling');
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
	public function form($id_kunjungan)
	{
		//$data['query'] = $this->m_lab->all_lab();
		$data['all'] = $this->m_konseling->data_kunjungan_konse($id_kunjungan);
		$this->load->view("template/part/form_konseling.php",$data);
	}

	public function simpan_konse()
	{
		
		
		$arr_data = $this->input->post();
		$id_kunjungan = $this->input->post("id_kunjungan");
		$no_pendaftaran = $arr_data['no_pendaftaran'];
		
		$timeline['ke'] = "11";				
		$timeline['dari'] = "8";		
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
		
		$seralize['id_timeline'] = $id_timeline;
		$this->m_kunjungan->go_edit($seralize,$id_kunjungan);

		$arr_data['id_pegawai'] = $this->session->userdata('id_pegawai');
		$id = $this->m_konseling->tambah($arr_data);

		echo $id;
	}

	public function all_konse()
	{
		$data['query'] = $this->m_konseling->all();
		$this->load->view("template/part/list_konseling.php",$data);
	}

	public function form_edit_konse($id){	 
		$data['edit']=$this->m_konseling->get_edit($id);
		$data['judul'] = 'Form Edit Konseling';	 
		
		$this->load->view('template/part/form_edit_konse',$data);
				 
		}
	public function simpan_edit()
	{
		
		$id	= $this->input->post("id");
		$serialize = $this->input->post();

		
		$id = $this->m_konseling->update($serialize,$id);
			
		echo $id;		
			
	}
	/***** crud ****/

	function hapus_list_kons($id)
	{
	$this->m_konseling->hapus($id);
	}


	public function data_kunjungan_konse()
	{
		$data['all'] = $this->m_konseling->data_kunjungan_konse();
		$this->load->view("template/part/list_konseling.php",$data);
	}

	public function data_kunjungan_konse_history()
	{
		$data['all'] = $this->m_konseling->data_kunjungan_konse_history();
		$this->load->view("template/part/list_konseling.php",$data);
	}




	public function view_konse_pdf($id_kunjungan)
	{
		$data['all']=$this->m_konseling->data_by_id_kunjungan($id_kunjungan);
		$data['app'] = $this->m_home->data_app();
		$filename="laporan_konse_".date("Ymdhis");
		$pdfFilePath = FCPATH."/laporan/$filename.pdf";			 
		if (file_exists($pdfFilePath) == FALSE)
		{
			ini_set('memory_limit', '2048M');
			
			$html = $this->load->view("template/part/view_konse_pdf.php",$data,true); 
			
			
			$this->load->library('pdf_potrait');
			$pdf = $this->pdf_potrait->load();			
			$pdf->SetFooter("Dokumen ini dicetak melalui ".$_SERVER['HTTP_HOST'].'|{PAGENO}|'.date("YmdHis")."_".$this->session->userdata('id_pegawai')); // Add a footer for good measure <
			$pdf->WriteHTML($html); // write the HTML into the PDF
			$pdf->Output($pdfFilePath, 'F'); // save to file because we can
		}
		 
		 redirect(base_url()."laporan/$filename.pdf","refresh");
	}


}
