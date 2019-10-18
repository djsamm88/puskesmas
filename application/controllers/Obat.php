<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Obat extends CI_Controller {


	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');		
		$this->load->model('m_obat');
		$this->load->model('m_home');
		$this->load->model('m_obat_laporan');
		$this->load->helper('custom_func');

		
		if ($this->session->userdata('id_user')=="") 
		{
			redirect('index.php/login');
		}

		$this->load->helper('text');
		date_default_timezone_set("Asia/jakarta");
	}

	
	public function form_permintaan()
	{
		$data['judul'] = 'Form Permintaan Obat';
		$data['tbl_obat'] = $this->m_obat->data_list();
		$data['info_unit'] = $this->m_home->relasi_unit_by_id_pegawai($this->session->userdata('id_pegawai'));
		$this->load->view('template/part/form_permintaan_obat',$data);
	}

	public function simpan_permintaan()
	{
		$serialize = $this->input->post();
		$serialize['surat_permintaan'] = upload_file('surat_permintaan');
		var_dump($serialize);
		for($i=0;$i<count($this->input->post('id_obat'));$i++)
		{
			$id_obat = $serialize['id_obat'][$i];
			$jumlah = $serialize['jumlah_obat'][$i];
			$id_pegawai = $this->session->userdata('id_pegawai');
			$surat_permintaan = $serialize['surat_permintaan'];

			$this->db->query("INSERT INTO tbl_obat_permintaan 
				SET 
				id_obat='$id_obat',
				jumlah='$jumlah',
				id_pegawai='$id_pegawai',
				surat_permintaan='$surat_permintaan'
				");
		}

	}
	public function data_obat_permintaan_by_id_pegawai()
	{
		$data['judul'] = 'History Permintaan';	 
		$data['data_obat'] = $this->m_obat->data_permintaan_group_by_id_pegawai($this->session->userdata('id_pegawai'));
		$this->load->view('template/part/data_permintaan_obat',$data);
	}


	public function data_obat_permintaan_history()
	{
		$data['judul'] = 'History Distribusi Obat';	 
		$data['data_obat'] = $this->m_obat->data_obat_permintaan_history();
		$this->load->view('template/part/data_permintaan_obat',$data);
	}

	public function data_permintaan_farmasi()
	{
		$data['judul'] = 'Permintaan Obat Dari Unit';	 
		$data['data_obat'] = $this->m_obat->data_permintaan_group_status('0');
		$this->load->view('template/part/data_permintaan_obat_farmasi',$data);
	}


	public function persetujuan_kapus()
	{
		$data['judul'] = 'History Permintaan';	 
		$data['data_obat'] = $this->m_obat->data_permintaan_group_status(1);
		$this->load->view('template/part/data_permintaan_obat_kapus',$data);
	}

	public function detail_permintaan_obat($surat_permintaan)
	{		
		$data['data_obat'] = $this->m_obat->data_permintaan_by_group($surat_permintaan);
		$data['surat_permintaan'] = $surat_permintaan;
		$this->load->view('template/part/detail_permintaan_obat',$data);
	}

	public function detail_permintaan_obat_kapus($surat_permintaan)
	{		
		$data['data_obat'] = $this->m_obat->data_permintaan_by_group($surat_permintaan);
		$data['surat_permintaan'] = $surat_permintaan;
		$this->load->view('template/part/detail_permintaan_obat_kapus',$data);
	}	

	public function detail_permintaan_obat_farmasi($surat_permintaan)
	{		
		$data['data_obat'] = $this->m_obat->data_permintaan_by_group($surat_permintaan);
		$data['surat_permintaan'] = $surat_permintaan;
		$this->load->view('template/part/detail_permintaan_obat_farmasi',$data);
	}

	public function update_permintaan()
	{
		$serialize = $this->input->post();
		for($i=0;$i<count($this->input->post('id'));$i++)
		{
			$id = $serialize['id'][$i];
			$jum_realisasi = $serialize['realisasi'][$i];
			$ket_realisasi = $serialize['keterangan'][$i];

			$this->db->query("UPDATE tbl_obat_permintaan SET status='1',jum_realisasi='$jum_realisasi',ket_realisasi='$ket_realisasi' WHERE id='$id'");
		}
	}


	public function setujui_permintaan_obat()
	{
		$surat_permintaan = $this->input->post("surat_permintaan");

		$x = $this->m_obat->data_permintaan_by_group($surat_permintaan);
		foreach ($x as $key) {

			$this->db->query("INSERT INTO tbl_obat_keluar 
				SET 
				id_obat='$key->id_obat',								
				tgl_keluar='$key->tgl',
				jumlah='$key->jum_realisasi'
				");

			$this->db->query("UPDATE tbl_obat 
				SET 								
				stok=stok-'$key->jum_realisasi'
				WHERE
				id_obat='$key->id_obat'
				");
		}

		$this->db->query("UPDATE tbl_obat_permintaan SET status='2' WHERE surat_permintaan='$surat_permintaan'");

	}


	public function cetak_pegiriman()
	{
		$data['judul'] = 'History Permintaan';	 
		$data['data_obat'] = $this->m_obat->data_permintaan_group_status(2);
		$this->load->view('template/part/data_permintaan_obat_cetak',$data);
	}


	public function detail_permintaan_obat_cetak($surat_permintaan)
	{		
		$data['data_obat'] = $this->m_obat->data_permintaan_by_group($surat_permintaan);
		$data['surat_permintaan'] = $surat_permintaan;
		$this->load->view('template/part/detail_permintaan_obat_cetak',$data);
	}

	public function cetak_pengiriman($surat_permintaan)
	{
		$this->db->query("UPDATE tbl_obat_permintaan SET status='3' WHERE surat_permintaan='$surat_permintaan'");
		$data['app'] = $this->m_home->data_app();
		$filename="laporan_distribusi_".date("Ymdhis");
		$pdfFilePath = FCPATH."/laporan/$filename.pdf";
		$data['data_obat'] = $this->m_obat->data_permintaan_by_group($surat_permintaan);
		$data['pejabat'] = $this->m_home->all_relasi_jabatan();

		if (file_exists($pdfFilePath) == FALSE)
		{
			ini_set('memory_limit', '2048M');
			
			$html = $this->load->view("template/part/detail_cetak_distribusi_pdf.php",$data,true); 
			
			
			$this->load->library('pdf_potrait');
			$pdf = $this->pdf_potrait->load();	
			$pdf->SetFooter("Dokumen ini dicetak melalui ".$_SERVER['HTTP_HOST'].'|{PAGENO}|'.date("YmdHis")."_".$this->session->userdata('id_pegawai')); // Add a footer for good measure <		
			$pdf->WriteHTML($html); // write the HTML into the PDF
			$pdf->Output($pdfFilePath, 'F'); // save to file because we can
		}

		redirect(base_url()."laporan/$filename.pdf","refresh");
		

		
	}
	
	function form_edit($id_obat){


		$data['edit']=$this->m_obat->data_by_id($id_obat);
		$data['judul'] = 'Form Edit Obat';	 
		
		$this->load->view('template/part/form_edit_obat',$data);

	}
	
	public function go_edit()
	{
		
		
		$id_obat	= $this->input->post("id_obat");
		
		$code			= $this->input->post("code");		
		$obat			= $this->input->post("obat");
		$satuan			= $this->input->post("satuan");			
		$nomor_batch	= $this->input->post("nomor_batch");		
		$kategori		= $this->input->post("kategori");		
		$tgl_expire		= $this->input->post("y_tgl_expire")."-".$this->input->post("m_tgl_expire")."-".$this->input->post("d_tgl_expire");
		
		

		$arr_data = array(	"obat"=>$obat,
			"satuan"=>$satuan,		
			"code"=>$code,					
			"kategori"=>$kategori,		
			"nomor_batch"=>$nomor_batch,				
			"tgl_expire"=>$tgl_expire
		);		
		
		$id_obat = $this->m_obat->go_edit($arr_data,$id_obat);

		echo $id_obat;


	}
	
	
	public function go_simpan()
	{
		
		
		$obat			= $this->input->post("obat");
		$satuan			= $this->input->post("satuan");		
		$code			= $this->input->post("code");		
		$nomor_batch	= $this->input->post("nomor_batch");		
		$kategori		= $this->input->post("kategori");		
		
		$tgl_expire		= $this->input->post("y_tgl_expire")."-".$this->input->post("m_tgl_expire")."-".$this->input->post("d_tgl_expire");
		
		

		$arr_data = array(	"obat"=>$obat,
			"satuan"=>$satuan,		
			"code"=>$code,		
			"nomor_batch"=>$nomor_batch,		
			"kategori"=>$kategori,		
			"tgl_expire"=>$tgl_expire
		);		
		
		$id_obat = $this->m_obat->go_simpan($arr_data);

		echo $id_obat;
	}
	
	
	
	
	public function form_simpan()
	{
		
		
		$data['judul'] = 'Form Registrasi Obat';
		$this->load->view('template/part/form_simpan_obat',$data);


	}
	
	
	
	public function form_laporan_lplpo()
	{
		
		$data['judul'] = 'Form Laporan Obat LPLPO';

		$this->load->view('template/part/form_laporan_lplpo',$data);


	}
	
	
	
	
	public function form_laporan_obat()
	{
		
		
		$data['judul'] = 'Form Laporan Obat';
		$this->load->view('template/part/form_laporan_obat',$data);


	}
	
	//view_laporan_lplpo

	function pdf_laporan_lplpo()
	{
		
		$bulan = $this->input->get("bulan");
		$tahun = $this->input->get("tahun");
		$kategori = $this->input->get("kategori");
		
		$arr = array(
			"kategori"=>$kategori,
			"bulan"=>$bulan,
			"tahun"=>$tahun		
		); 	
		
		$q['bulan']=$bulan;
		$q['tahun']=$tahun;
		$q['obats'] = $this->m_obat_laporan->laporan_obat_lplpo($arr);
		$q['jenis']="view";
		//$q['hasils'] = $this->m_laporan->hasil($arr);
		$q['pejabat'] = $this->m_home->all_relasi_jabatan();
		$q['app'] = $this->m_home->data_app();
		$q['kategori']=$kategori;

		$filename="laporan_".date("Ymdhis");
		$pdfFilePath = FCPATH."/laporan/$filename.pdf";
		

		if (file_exists($pdfFilePath) == FALSE)
		{
			ini_set('memory_limit', '2048M');
			
			$html = $this->load->view("template/part/laporan_lplpo.php",$q,true); 
			
			
			$this->load->library('pdf');
			$pdf = $this->pdf->load();			
			$pdf->SetFooter("Dokumen ini dicetak melalui ".$_SERVER['HTTP_HOST'].'|{PAGENO}|'.date("YmdHis")."_".$this->session->userdata('id_pegawai')); // Add a footer for good measure <
			$pdf->WriteHTML($html); // write the HTML into the PDF
			$pdf->Output($pdfFilePath, 'F'); // save to file because we can
		}

		redirect(base_url()."laporan/$filename.pdf","refresh");
		
		
		
		//var_dump($q);
		
		
		
	}
	

	function view_laporan_lplpo()
	{
		
		$bulan = $this->input->get("bulan");
		$tahun = $this->input->get("tahun");
		$kategori = $this->input->get("kategori");
		
		$arr = array(
			"kategori"=>$kategori,
			"bulan"=>$bulan,
			"tahun"=>$tahun		
		); 	
		
		$q['bulan']=$bulan;
		$q['tahun']=$tahun;
		$q['kategori']=$kategori;
		$q['obats'] = $this->m_obat_laporan->laporan_obat_lplpo($arr);
		$q['jenis']="view";
		//$q['hasils'] = $this->m_laporan->hasil($arr);
		$q['pejabat'] = $this->m_home->all_relasi_jabatan();
		$q['app'] = $this->m_home->data_app();
		
		//var_dump($q);
		$this->load->view("template/part/laporan_lplpo.php",$q);
		
		
	}
	


	function xl_laporan_lplpo()
	{
		
		$filename =date('Ymdhis')."_lap_lplpo.xls";
		header('Content-type: application/ms-excel');
		header('Content-Disposition: attachment; filename='.$filename);
		$bulan = $this->input->get("bulan");
		$tahun = $this->input->get("tahun");
		$kategori = $this->input->get("kategori");
		
		$arr = array(
			"kategori"=>$kategori,
			"bulan"=>$bulan,
			"tahun"=>$tahun		
		); 	
		
		$q['bulan']=$bulan;
		$q['tahun']=$tahun;
		$q['obats'] = $this->m_obat_laporan->laporan_obat_lplpo($arr);
		$q['jenis']="view";
		//$q['hasils'] = $this->m_laporan->hasil($arr);
		$q['pejabat'] = $this->m_home->all_relasi_jabatan();
		$q['app'] = $this->m_home->data_app();
		
		//var_dump($q);
		$this->load->view("template/part/laporan_lplpo.php",$q);
		
		
	}


	
	
	function go_laporan_obat()
	{
		
		$bulan = $this->input->get("bulan");
		$tahun = $this->input->get("tahun");
		$kategori = $this->input->get("kategori");
		
		$arr = array(
			"kategori"=>$kategori,
			"bulan"=>$bulan,
			"tahun"=>$tahun		
		); 	
		
		$q['bulan']=$bulan;
		$q['tahun']=$tahun;
		$q['obats'] = $this->m_obat_laporan->laporan_obat($arr);
		//$q['hasils'] = $this->m_laporan->hasil($arr);
		
		
		//var_dump($q);
		$this->load->view("template/part/laporan_obat_xl.php",$q);
		
		
	}


	function view_laporan_obat()
	{
		
		$bulan = $this->input->get("bulan");
		$tahun = $this->input->get("tahun");
		$kategori = $this->input->get("kategori");
		
		$arr = array(
			"kategori"=>$kategori,
			"bulan"=>$bulan,
			"tahun"=>$tahun		
		); 	
		
		$q['bulan']=$bulan;
		$q['tahun']=$tahun;
		$q['kategori']=$kategori;
		$q['obats'] = $this->m_obat_laporan->laporan_obat($arr);
		$q['jenis']="view";
		//$q['hasils'] = $this->m_laporan->hasil($arr);
		
		
		//var_dump($q);
		$this->load->view("template/part/laporan_obat_view.php",$q);
		
		
	}

	function pdf_laporan_obat()
	{
		
		
		$bulan = $this->input->get("bulan");
		$tahun = $this->input->get("tahun");
		$kategori = $this->input->get("kategori");
		
		$arr = array(
			"kategori"=>$kategori,
			"bulan"=>$bulan,
			"tahun"=>$tahun		
		); 	
		
		$q['bulan']=$bulan;
		$q['tahun']=$tahun;
		$q['obats'] = $this->m_obat_laporan->laporan_obat($arr);
		$q['jenis']="pdf";
		//$q['hasils'] = $this->m_laporan->hasil($arr);
		
		
		//var_dump($q);
		//$this->load->view("template/part/laporan_obat_view.php",$q);

		$filename="laporan_".date("Ymdhis");
		$pdfFilePath = FCPATH."/laporan/$filename.pdf";
		

		if (file_exists($pdfFilePath) == FALSE)
		{
			ini_set('memory_limit', '2048M');
			
			$html = $this->load->view("template/part/laporan_obat_view.php",$q,true); 
			
			
			$this->load->library('pdf');
			$pdf = $this->pdf->load();			
			$pdf->SetFooter("Dokumen ini dicetak melalui ".$_SERVER['HTTP_HOST'].'|{PAGENO}|'.date("YmdHis")."_".$this->session->userdata('id_pegawai')); // Add a footer for good measure <
			$pdf->WriteHTML($html); // write the HTML into the PDF
			$pdf->Output($pdfFilePath, 'F'); // save to file because we can
		}

		redirect(base_url()."laporan/$filename.pdf","refresh");
		
		
		
	}
	
	
	
	function data_list()
	{
		$data['query'] 	= $this->m_obat->data_list();
		$data['judul']	= 'Data List Obat';
		$this->load->view("template/part/data_list_obat",$data);
	}
	

	function data_list_xs()
	{
		

		$filename =date('Ymdhis')."_lap_obat.xls";
		header('Content-type: application/ms-excel');
		header('Content-Disposition: attachment; filename='.$filename);

		$data['query'] 	= $this->m_obat->data_list();
		$data['judul']	= 'Data List Obat';
		$this->load->view("template/part/obat_xl",$data);
	}
	

	function hapus_list($id_obat)
	{
		$this->m_obat->hapus_list($id_obat);
	}
	
	
	
	function data_list_penerimaan()
	{
		$data['query'] 	= $this->m_obat->data_list();
		$data['judul']	= 'Data Penerimaan Obat';
		$this->load->view("template/part/data_list_penerimaan_obat",$data);
	}
	
	function go_penerimaan()
	{
		
		$id_obat 	= $this->input->post("id_obat");
		$stok 		= $this->input->post("stok");
		$tgl_expire = $this->input->post("tgl_expire");
		$pemberian = $this->input->post("pemberian");
		
		
		
		for($i=0;$i<count($id_obat);$i++)
		{
			//echo $tgl_expire[$i];
			
			if($id_obat[$i]!='' || $id_obat[$i]!='0')
			{

				$arr = array(
					"id_obat"	=>$id_obat[$i],
					"jumlah"		=>$stok[$i],
					"tgl_masuk"		=>date('Y-m-d'),
					"pemberian"	=>$pemberian[$i],
					"tgl_expire"=>$tgl_expire[$i]
				);




				$this->m_obat->go_penerimaan($arr);
				$this->db->query("UPDATE tbl_obat SET stok=stok+$stok[$i], tgl_expire='$tgl_expire[$i]' WHERE id_obat=$id_obat[$i]");
				
				
			}
			
			
		}
		
	}
	
	
	
}
