<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keluhan extends CI_Controller {


	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');		
		$this->load->model('m_pasien');
		$this->load->model('m_keluhan');
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

	public function form()
	{
		$data['all'] = $this->m_pasien->data_list();
		$this->load->view('template/part/form_keluhan',$data);
	}
 
	public function data_list()
	{
		$data['all'] = $this->m_keluhan->m_data();
		$this->load->view('template/part/data_list_keluhan',$data);
	}


	public function data_list_history()
	{
		$data['all'] = $this->m_keluhan->m_data_history();
		$this->load->view('template/part/data_list_keluhan',$data);
	}


	public function hapus_keluhan($id)
	{
					
		$this->db->where('id_kunjungan', $id);
		$this->db->delete('tbl_kunjungan'); 
		
	}
	
	public function form_edit_keluhan($id_kunjungan)
	{
		$data['id_kunjungan'] = $id_kunjungan;
		$data['poli'] = $this->m_keluhan->m_poli();
		$data['dokter'] = $this->m_home->all_relasi_dokter();
		$this->load->view('template/part/form_edit_keluhan',$data);
	}


	public function data_pasien_by_id_json($id)
	{
		header('Content-Type: application/json');
		$data['all'] = $this->m_pasien->data_by_id($id);
		echo json_encode($data['all']);
	}

	public function data_pasien_keluhan_by_id_json($id_kunjungan)
	{
		header('Content-Type: application/json');
		$data['all'] = $this->m_keluhan->m_data_by_id($id_kunjungan);
		echo json_encode($data['all']);
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
		
		$q['poli'] = $this->m_keluhan->m_poli();
		$q['dokter'] = $this->m_home->all_relasi_dokter();
		//var_dump($q['dokter']);

		$this->load->view("template/part/hasil_cari_keluhan",$q);
	}
	


	public function simpan_form()
	{
		$id_kunjungan = $this->input->post('id_kunjungan');		
		$serialize = $this->input->post();		
		//$serialize['tgl_janji'] = $serialize['tgl_janji']." ".$serialize['waktu_janji'];
		//$serialize['tgl_janji'] = $serialize['tgl_janji'];





		//var_dump($serialize);
		//die();
		if($id_kunjungan=='')
		{
			

			$timeline['tgl_mulai'] = date("Y-m-d")." ".$serialize['jam_mulai'];
			$timeline['tgl_selesai'] = date("Y-m-d")." ".$serialize['jam_selesai'];
			$timeline['no_pendaftaran'] = $serialize['no_pendaftaran'];
			$timeline['lama_pemeriksaan'] = $serialize['lama_pemeriksaan'];		
			$timeline['ke'] = "2";						
			$timeline['dari'] = "1";						
			$id_timeline = $this->m_home->set_timeline($timeline);
			$serialize['id_timeline'] = $id_timeline;



		unset($serialize['waktu_janji']);
		unset($serialize['jam_mulai']);
		unset($serialize['jam_selesai']);				
		unset($serialize['lama_pemeriksaan']);
		



			$id_kunjungan = $this->m_keluhan->tambah($serialize);

			//update lagi timeline karena id_kunjungan sudah dapat
			$timeline['id_kunjungan'] = $id_kunjungan;
			$this->m_home->update_timeline($timeline,$id_timeline);


			die($id_kunjungan);
		}else{

			$timeline['tgl_mulai'] = date("Y-m-d")." ".$serialize['jam_mulai'];
			$timeline['tgl_selesai'] = date("Y-m-d")." ".$serialize['jam_selesai'];
			$timeline['no_pendaftaran'] = $serialize['no_pendaftaran'];
			$timeline['lama_pemeriksaan'] = $serialize['lama_pemeriksaan'];		
			$timeline['code_timeline'] = "5";					
			$timeline['id_kunjungan'] = $id_kunjungan;	
			$id_timeline = $this->m_home->set_timeline($timeline);
			$serialize['id_timeline'] = $id_timeline;

			

		unset($serialize['waktu_janji']);
		unset($serialize['jam_mulai']);
		unset($serialize['jam_selesai']);				
		unset($serialize['lama_pemeriksaan']);
		


			
			$this->m_keluhan->update($serialize,$id_kunjungan);

			

		}
		
		

	}

	
}
