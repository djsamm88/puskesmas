<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kunjungan extends CI_Controller {


	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');		
		$this->load->model('m_kunjungan');
		$this->load->model('m_keluhan');
		$this->load->model('m_obat');
		$this->load->model('m_home');
		$this->load->model('m_pasien');
		$this->load->model('m_ruang_konseling');
		$this->load->model('m_gizi');
		$this->load->model('m_lab');
		$this->load->model('m_relasi_perawat');
		$this->load->model('m_diagnosa_perawat');
		$this->load->model('m_rawat_inap');
		$this->load->model('m_foto');
		
		$this->load->helper('custom_func');
		

		if ($this->session->userdata('id_user')=="") 
		{
			redirect('index.php/login');
		}

		$this->load->helper('text');
		date_default_timezone_set("Asia/jakarta");
	}

	
	
	public function form_edit($no_pendaftaran)
	{
			 
			 
		$data['edit']=$this->m_kunjungan->data_by_id($no_pendaftaran);
		$data['judul'] = 'Form Edit Pasien';	 
		
		$this->load->view('template/part/form_edit_pasien',$data);
			 
	}
	
	public function go_edit()
	{
		
		
		$no_pendaftaran	= $this->input->post("no_pendaftaran");
		$nama			= $this->input->post("nama");
		$jenis_kelamin	= $this->input->post("jenis_kelamin");
		
		$tgl_lahir		= $this->input->post("tgl_lahir");
		
		
		$alamat 		= $this->input->post("alamat");
		$no_bpjs 		= $this->input->post("no_bpjs");
		$no_telp 		= $this->input->post("no_telp");
		$gol_darah 		= $this->input->post("gol_darah");
		$desa 			= $this->input->post("desa");
		$kecamatan 		= $this->input->post("kecamatan");
		$kabupaten 		= $this->input->post("kabupaten");
		
				
		$arr_data = array(	"nama"=>$nama,
							"jenis_kelamin"=>$jenis_kelamin,
							"tgl_lahir"=>$tgl_lahir,							
							"alamat"=>$alamat,							
							"no_bpjs"=>$no_bpjs,							
							"no_telp"=>$no_telp,							
							"gol_darah"=>$gol_darah,							
							"desa"=>$desa,							
							"kecamatan"=>$kecamatan,							
							"kabupaten"=>$kabupaten
							);		
		
		$no_pendaftaran = $this->m_kunjungan->go_edit($arr_data,$no_pendaftaran);
			
		echo $no_pendaftaran;
			
			
	}
	

	public function form_proses($id)
	{
		$id_pegawai = $this->session->userdata('id_pegawai');
		$all_relasi_perawat = $this->m_relasi_perawat->all_relasi_perawat();
		$is_perawat = false;
		foreach ($all_relasi_perawat as $perawat) {
			if($perawat->id_pegawai==$id_pegawai)
			{
				$is_perawat=true;
			}
		}
		$all_relasi_dokter = $this->m_home->all_relasi_dokter();
		$is_dokter = false;
		foreach ($all_relasi_dokter as $dok) {
			if($dok->id_pegawai==$id_pegawai)
			{
				$is_dokter = true;
			}
		}

		if($is_dokter==true)
		{
			$data['tbl_master_diagnosa'] = $this->m_kunjungan->tbl_master_diagnosa();
		}else 
		{
			$data['tbl_master_diagnosa'] = $this->m_diagnosa_perawat->all();
		}


		$data['judul'] = 'Form Diagnosa';	
		$data['all'] = $this->m_keluhan->m_data_by_id($id);
	
		$data['tbl_obat'] = $this->m_obat->data_list();
		$data['polis'] 	= $this->m_kunjungan->list_poli();			
		$data['dokter'] = $this->m_home->all_relasi_dokter();
		$data['id_keluhan_umum'] = $id;
		$data['obat_terpakai'] = $this->m_kunjungan->m_obat($id);
		$data['obat_lain'] = $this->m_kunjungan->m_obat_lain($id);
		$data['obat_racikan'] = $this->m_kunjungan->ambil_obat_racikan($id);
		$data['diag'] = $this->m_kunjungan->m_get_diag($id);
		$data['r_konseling'] = json_encode($this->m_ruang_konseling->all_ruang_konse());
		$data['r_rawatinap'] = json_encode($this->m_rawat_inap->all_rawat_inap());
		$data['r_gizi'] = json_encode($this->m_gizi->all());
		$data['poli'] = json_encode($this->m_keluhan->m_poli());
		$data['lab'] = json_encode($this->m_lab->master_lab());
		

		$this->load->view('template/part/form_proses_kunjungan',$data);
			
			 
	}
	
	public function go_simpan()
	{
		
		
		$no_pendaftaran		= $this->input->post("no_pendaftaran");		
		$code_diagnosa		= $this->input->post("code_diagnosa");
		$pulv				= $this->input->post("pulv");
		$id_kunjungan = $this->input->post("id_kunjungan");

		$seralize = $this->input->post();

		//var_dump($seralize);
		//die();
		$timeline['dari'] = "2";		
		if($seralize['pemeriksaan_penunjang']=='4')
		{
			$timeline['ke'] = "4";						
		}else if($seralize['pemeriksaan_penunjang']=='7')
		{
			$timeline['ke'] = "7";					

			if($seralize['rencana_rujukan']=='8')
			{
				$timeline['ke'] = "8";	
			}

			if($seralize['rencana_rujukan']=='9')
			{
				$timeline['ke'] = "9";	
			}
			if($seralize['rencana_rujukan']=='10')
			{
				$timeline['ke'] = "10";	
			}	
		}else if($seralize['pemeriksaan_penunjang']=='5')
		{
			$timeline['ke'] = "5";		
		}else if($seralize['pemeriksaan_penunjang']=='3')
		{
			$timeline['ke'] = "3";		
		}

		


		$timeline['tgl_mulai'] = date("Y-m-d")." ".$seralize['jam_mulai'];
		$timeline['tgl_selesai'] = date("Y-m-d")." ".$seralize['jam_selesai'];
		$timeline['no_pendaftaran'] = $no_pendaftaran;
		$timeline['lama_pemeriksaan'] = $seralize['lama_pemeriksaan'];		

		/*
		var_dump($timeline);
		die();
		*/

		
		$timeline['id_kunjungan'] = $id_kunjungan;						
		$id_timeline = $this->m_home->set_timeline($timeline);
		$seralize['id_timeline'] = $id_timeline;
		
		unset($seralize['jam_mulai']);
		unset($seralize['jam_selesai']);
		unset($seralize['code_diagnosa']);
		unset($seralize['lama_pemeriksaan']);
		unset($seralize['tgl_mulai']);
		unset($seralize['pulv']);
		
		$id_obat = @$seralize['id_obat'];
		$jumlah = @$seralize['jumlah_obat'];		
		$aturan_pakai = @$seralize['aturan_pakai'];
		$waktu_konsumsi = @$seralize['waktu_konsumsi'];
		$keterangan = @$seralize['keterangan'];
		
		
		unset($seralize['id_obat']);
		unset($seralize['jumlah_obat']);
		unset($seralize['aturan_pakai']);
		unset($seralize['waktu_konsumsi']);
		unset($seralize['keterangan']);


		$nama_obat_lain = @$seralize['nama_obat_lain'];
		$satuan_obat_lain = @$seralize['satuan_obat_lain'];
		$jumlah_obat_lain = @$seralize['jumlah_obat_lain'];
		$aturan_pakai_obat_lain = @$seralize['aturan_pakai_obat_lain'];
		$waktu_konsumsi_obat_lain = @$seralize['waktu_konsumsi_obat_lain'];
		$keterangan_obat_lain = @$seralize['keterangan_obat_lain'];

		unset($seralize['keterangan_obat_lain']);
		unset($seralize['waktu_konsumsi_obat_lain']);
		unset($seralize['aturan_pakai_obat_lain']);
		unset($seralize['jumlah_obat_lain']);
		unset($seralize['satuan_obat_lain']);
		unset($seralize['nama_obat_lain']);


		

		$id_obat_racikan = @$seralize['id_obat_racikan'];
		$jumlah_obat_racikan = @$seralize['jumlah_obat_racikan'];
		$pulv_racikan = @$seralize['pulv_racikan'];
		$aturan_pakai_obat_racikan = @$seralize['aturan_pakai_obat_racikan'];
		$waktu_konsumsi_obat_racikan = @$seralize['waktu_konsumsi_obat_racikan'];
		$keterangan_obat_racikan = @$seralize['keterangan_obat_racikan'];
		$group_pulv = @$seralize['group_pulv'];		
		$group_waktu_konsumsi = @$seralize['group_waktu_konsumsi'];
		$group_aturan_pakai = @$seralize['group_aturan_pakai'];
		$group_keterangan = @$seralize['group_keterangan'];


		unset($seralize['id_obat_racikan']);
		unset($seralize['jumlah_obat_racikan']);
		unset($seralize['pulv_racikan']);
		unset($seralize['aturan_pakai_obat_racikan']);
		unset($seralize['waktu_konsumsi_obat_racikan']);
		unset($seralize['keterangan_obat_racikan']);
		unset($seralize['group_pulv']);
		unset($seralize['group_waktu_konsumsi']);
		unset($seralize['group_aturan_pakai']);
		unset($seralize['group_keterangan']);

		
		
		$this->m_kunjungan->go_edit($seralize,$id_kunjungan);
		
		//$this->db->query("DELETE FROM tbl_diagnosa WHERE id_kunjungan='$id_kunjungan'");
		for($i=0;$i<count($code_diagnosa);$i++)
		{
			$this->db->query("INSERT INTO tbl_diagnosa SET id_kunjungan='$id_kunjungan',code_diagnosa='$code_diagnosa[$i]'");
		}
		
		echo $id_kunjungan;


		$tgl = date("Y-m-d H:i:s");		
		for($i=0;$i<count($id_obat);$i++)
		{
			$this->db->query("INSERT INTO tbl_resep SET 
								id_kunjungan='$id_kunjungan',
								tgl='$tgl',
								no_pendaftaran='$no_pendaftaran',
								id_obat='$id_obat[$i]',
								jumlah='$jumlah[$i]',
								aturan_pakai='$aturan_pakai[$i]',
								keterangan='$keterangan[$i]',								
								waktu_konsumsi='$waktu_konsumsi[$i]'
					");

			$this->db->query("INSERT INTO tbl_obat_keluar 
								SET 
								id_obat='$id_obat[$i]',
								id_kunjungan='$id_kunjungan',
								tgl_keluar='$tgl',
								jumlah='$jumlah[$i]'
								");

			$this->db->query("UPDATE tbl_obat 
								SET 								
								stok=stok-'$jumlah[$i]'
								WHERE
								id_obat='$id_obat[$i]'
								");
		}

		for($i=0;$i<count($id_obat_racikan);$i++)
		{
			$this->db->query("INSERT INTO tbl_resep_racikan SET 
								id_kunjungan='$id_kunjungan',
								tgl='$tgl',								
								id_obat='$id_obat_racikan[$i]',
								jumlah='$jumlah_obat_racikan[$i]',
								aturan_pakai='$group_aturan_pakai[$i]',
								keterangan='$group_keterangan[$i]',
								pulv='$group_pulv[$i]',
								waktu_konsumsi='$group_waktu_konsumsi[$i]'
					");

			$this->db->query("INSERT INTO tbl_obat_keluar 
								SET 
								id_obat='$id_obat_racikan[$i]',
								id_kunjungan='$id_kunjungan',
								tgl_keluar='$tgl',
								jumlah='$jumlah_obat_racikan[$i]'
								");

			$this->db->query("UPDATE tbl_obat 
								SET 								
								stok=stok-'$jumlah_obat_racikan[$i]'
								WHERE
								id_obat='$id_obat_racikan[$i]'
								");
		}



		for($x=0;$x<count($this->input->post('nama_obat_lain'));$x++)
		{
			$this->db->query("INSERT INTO tbl_resep_obat_lain SET 
									id_kunjungan='$id_kunjungan',
									nama_obat_lain='$nama_obat_lain[$x]',
									satuan_obat_lain='$satuan_obat_lain[$x]',
									jumlah_obat_lain='$jumlah_obat_lain[$x]',
									aturan_pakai_obat_lain='$aturan_pakai_obat_lain[$x]',
									waktu_konsumsi_obat_lain='$waktu_konsumsi_obat_lain[$x]',
									keterangan_obat_lain='$keterangan_obat_lain[$x]'
				");
		}

		
		die();
	}
	
	
	
	
	public function go_simpan_resep()
	{				
		
		$seralize = $this->input->post();
		//var_dump($seralize);
		
		$id_kunjungan = $seralize['id_kunjungan'];
		$tgl = $seralize['tgl_mulai'];
		$no_pendaftaran = $seralize['no_pendaftaran_x'];

		$id_obat = $seralize['id_obat'];
		$jumlah = $seralize['jumlah_obat'];		
		$aturan_pakai = $seralize['aturan_pakai'];
		$waktu_konsumsi = $seralize['waktu_konsumsi'];
		$keterangan = $seralize['keterangan'];
		

		$nama_obat_lain = $seralize['nama_obat_lain'];
		$satuan_obat_lain = $seralize['satuan_obat_lain'];
		$jumlah_obat_lain = $seralize['jumlah_obat_lain'];
		$aturan_pakai_obat_lain = $seralize['aturan_pakai_obat_lain'];
		$waktu_konsumsi_obat_lain = $seralize['waktu_konsumsi_obat_lain'];
		$keterangan_obat_lain = $seralize['keterangan_obat_lain'];

		unset($seralize['keterangan_obat_lain']);
		unset($seralize['waktu_konsumsi_obat_lain']);
		unset($seralize['aturan_pakai_obat_lain']);
		unset($seralize['jumlah_obat_lain']);
		unset($seralize['satuan_obat_lain']);
		unset($seralize['nama_obat_lain']);


		for($i=0;$i<count($id_obat);$i++)
		{
			$this->db->query("INSERT INTO tbl_resep SET 
								id_kunjungan='$id_kunjungan',
								tgl='$tgl',
								no_pendaftaran='$no_pendaftaran',
								id_obat='$id_obat[$i]',
								jumlah='$jumlah[$i]',
								aturan_pakai='$aturan_pakai[$i]',
								keterangan='$keterangan[$i]',
								waktu_konsumsi='$waktu_konsumsi[$i]'
					");

			$this->db->query("INSERT INTO tbl_obat_keluar 
								SET 
								id_obat='$id_obat[$i]',
								id_kunjungan='$id_kunjungan',
								tgl_keluar='$tgl',
								jumlah='$jumlah[$i]'
								");

			$this->db->query("UPDATE tbl_obat 
								SET 								
								stok=stok-'$jumlah[$i]'
								WHERE
								id_obat='$id_obat[$i]'
								");
		}
		//

		for($x=0;$x<count($this->input->post('nama_obat_lain'));$x++)
		{
			$this->db->query("INSERT INTO tbl_resep_obat_lain SET 
									id_kunjungan='$id_kunjungan',
									nama_obat_lain='$nama_obat_lain[$x]',
									satuan_obat_lain='$satuan_obat_lain[$x]',
									jumlah_obat_lain='$jumlah_obat_lain[$x]',
									aturan_pakai_obat_lain='$aturan_pakai_obat_lain[$x]',
									waktu_konsumsi_obat_lain='$waktu_konsumsi_obat_lain[$x]',
									keterangan_obat_lain='$keterangan_obat_lain[$x]'
				");
		}

	}
	
	
	
	
	public function form_simpan()
	{
		
		
		$data['judul'] = 'Cari Pasien';
		$this->load->view('template/part/form_cari_pasien',$data);
			
			
	}
	

	
	
	
	
	
	
	function data_list()
	{
	
		$data['query'] 	= $this->m_kunjungan->data_list();
		$data['judul']	= 'Resep Dokter';
		$this->load->view("template/part/data_list_kunjungan",$data);
	}
	
	
	function data_list_farmasi()
	{
	
		$data['query'] 	= $this->m_kunjungan->data_list_farmasi();
		$data['history'] 	= $this->m_kunjungan->history_data_kunjungan_farmasi();		
		$data['judul']	= 'Farmasi';
		$this->load->view("template/part/data_list_farmasi",$data);
	}


	
	function data_list_farmasi_history()
	{
		
		$data['query'] 	= $this->m_kunjungan->history_data_kunjungan_farmasi();		
		$data['judul']	= 'Farmasi';
		$this->load->view("template/part/data_list_farmasi",$data);
	}

	function selesai_farmasi()
	{
		$seralize = $this->input->post();
		$id_kunjungan=$seralize['id_kunjungan'];		
		$timeline['tgl_mulai'] = $seralize['jam_mulai'];
		$timeline['tgl_selesai'] = date("Y-m-d H:i:s");
		
		$start_date = new DateTime($seralize['jam_mulai']);
		$since_start = $start_date->diff(new DateTime(date('Y-m-d H:i:s')));
		$minutes = $since_start->days * 24 * 60;
		$minutes += $since_start->h * 60;
		$minutes += $since_start->i;
		$timeline['lama_pemeriksaan']= $minutes;

		$timeline['no_pendaftaran'] = $seralize['no_pendaftaran'];		
		$timeline['dari'] = "7";				
		$timeline['ke'] = "11";				
		$timeline['id_kunjungan'] = $id_kunjungan;				
		
		$id_timeline = $this->m_home->set_timeline($timeline);

		$ser['id_timeline'] = $id_timeline;
		
		$this->m_kunjungan->go_edit($ser,$id_kunjungan);
	}
	
	

	function hapus_list($no_pendaftaran)
	{
		$this->m_kunjungan->hapus_list($no_pendaftaran);
	}
	
	
	function cari_pasien()
	{
		$nama 		= $this->input->post("nama");
		$no_pasien 	= $this->input->post("no_pasien");
		
		$arr = array(
						"no_pendaftaran"=>$no_pasien,
						"nama"=>$nama
					);
		
		$q['judul'] = "Hasil Pencarian $nama $no_pasien";
		$q['query'] = $this->m_kunjungan->cari_pasien($arr);
		
		//echo "SELECT a.*,FLOOR(DATEDIFF(CURRENT_DATE, a.tgl_lahir)/365) AS usia FROM tbl_pasien a WHERE nama LIKE '%$nama%' OR no_pendaftaran LIKE '%$no_pasien%'";
		
		$this->load->view("template/part/hasil_cari_kunjungan",$q);
	}
	
	
	function view($id_kunjungan)
	{
		
		$q['judul'] = "View Detail";
		$q['query'] = $this->m_kunjungan->view($id_kunjungan);
		
		
		$this->load->view("template/part/view_kunjungan",$q);
	}
	
	

	function cetak_diagnosa($id_kunjungan)
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
			$html = $this->load->view('template/part/diagnosa_pdf',$x,true);			 
			
			
			$this->load->library('pdf_potrait');
			$pdf = $this->pdf_potrait->load();			
			$pdf->SetFooter("Dokumen ini dicetak melalui ".$_SERVER['HTTP_HOST'].'|{PAGENO}|'.date("YmdHis")."_".$this->session->userdata('id_pegawai')); // Add a footer for good measure <
			$pdf->WriteHTML($html); // write the HTML into the PDF
			$pdf->Output($pdfFilePath, 'F'); // save to file because we can
		}
		 
		redirect(base_url()."kartu/$filename.pdf","refresh");
		
		
	}

	function cetak_obat($id_kunjungan)
	{

		$filename="tanda_terima_obat_".$id_kunjungan."_".date("Ymdhis");
		$pdfFilePath = FCPATH."/kartu/$filename.pdf";
		$x['all'] = $this->m_kunjungan->data_list_farmasi_by_id_kunjungan($id_kunjungan);
		$x['diag'] = $this->m_kunjungan->m_get_diag($id_kunjungan);
		$x['obat_lain'] = $this->m_kunjungan->m_obat_lain($id_kunjungan);
		$x['obat'] = $this->m_kunjungan->m_obat($id_kunjungan);
		$x['obat_racikan'] = $this->m_kunjungan->ambil_obat_racikan($id_kunjungan);
		$x['app'] = $this->m_home->data_app();

		/********* mengupdate cetak obat *******/
		//$this->db->query("UPDATE tbl_resep SET status_cetak='1' WHERE id_kunjungan='$id_kunjungan'");
		/********* mengupdate cetak obat *******/

		//$this->load->view('template/part/cetak_obat_pdf',$x);			 
		 
		 //echo "abc";
		 //die("ll");
		
		if (file_exists($pdfFilePath) == FALSE)
		{
			ini_set('memory_limit','32M');
			$html = $this->load->view('template/part/cetak_obat_pdf',$x,true);			 
			
			
			$this->load->library('pdf_potrait');
			$pdf = $this->pdf_potrait->load();		
			$pdf->SetFooter("Dokumen ini dicetak melalui ".$_SERVER['HTTP_HOST'].'|{PAGENO}|'.date("YmdHis")."_".$this->session->userdata('id_pegawai')); // Add a footer for good measure <	
			$pdf->WriteHTML($html); // write the HTML into the PDF
			$pdf->Output($pdfFilePath, 'F'); // save to file because we can
		}
		 
		redirect(base_url()."kartu/$filename.pdf","refresh");
		
		
		
		
		
	}


	public function detail_obat($id_kunjungan)
	{

		$filename="tanda_terima_obat_".$id_kunjungan."_".date("Ymdhis");
		$pdfFilePath = FCPATH."/kartu/$filename.pdf";
		$x['all'] = $this->m_kunjungan->data_list_farmasi($id_kunjungan);
		$x['diag'] = $this->m_kunjungan->m_get_diag($id_kunjungan);
		$x['obat_lain'] = $this->m_kunjungan->m_obat_lain($id_kunjungan);
		$x['obat'] = $this->m_kunjungan->m_obat($id_kunjungan);
		$x['obat_racikan'] = $this->m_kunjungan->ambil_obat_racikan($id_kunjungan);
		$x['app'] = $this->m_home->data_app();
		$this->load->view('template/part/part_cetak_obat',$x);			 
		
	}
	
	function form_resep($id_kunjungan)
	{
		
		$data['x'] = $this->m_kunjungan->data_list_by_id($id_kunjungan);
		$data['tbl_obat'] = $this->m_obat->data_list();
		$data['polis'] 	= $this->m_kunjungan->list_poli();
		$data['judul'] = 'Form Resep Dokter';
		$data['tbl_obat'] = $this->m_obat->data_list();
		$data['dokter'] = $this->m_home->all_relasi_dokter();
		$data['id_kunjungan'] = $id_kunjungan;
		$this->load->view('template/part/form_resep_dokter',$data);	
	}
	
	
	public function obat_by_id($id)
	{
		header('Content-Type: application/json');
		$data['tbl_obat'] = $this->m_obat->obat_by_id($id);
		echo json_encode($data['tbl_obat']);
	}
	
}
