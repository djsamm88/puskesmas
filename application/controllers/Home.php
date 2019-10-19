<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');		
		$this->load->model('m_home');
		$this->load->model('m_obat');
		$this->load->model('m_relasi_gizi');
		$this->load->model('m_relasi_konseling');
		$this->load->model('m_relasi_rawatinap');
		$this->load->model('m_relasi_rujukan');
		$this->load->model('m_relasi_farmasi');
		$this->load->model('m_relasi_perawat');
		$this->load->model('m_relasi_staff');
		
		
		$this->load->helper('custom_func');
	


		$this->load->helper('text');
		date_default_timezone_set("Asia/jakarta");
		error_reporting(0);
	}


	
	public function index()
	{

		if ($this->session->userdata('id_user')=="") 
		{
			redirect('index.php/login');
		}

		$data['dashboard'] = $this->m_home->dashboard();
		$data['diagnosa_terbanyak'] = $this->m_home->diagnosa_terbanyak();
		
		$id_pegawai = $this->session->userdata('id_pegawai');
		
		$all_unit = $this->m_home->all_relasi_unit();
		$data['is_unit'] = false;
		foreach ($all_unit as $unit) {
			if($unit->id_pegawai==$id_pegawai)
			{
				$data['is_unit']=true;
			}
		}

		$all_pejabat = $this->m_home->all_relasi_jabatan();
		$data['is_kapus']=false;
		$data['is_pengelola_obat']=false;
		foreach ($all_pejabat as $pejabat) {
			if($pejabat->id_pegawai==$id_pegawai)
			{
				if($pejabat->id_jabatan=='3')
				{
					$data['is_kapus']=true;
				}

				if($pejabat->id_jabatan=='4')
				{
					$data['is_pengelola_obat']=true;
				}
			}
		}		
		
		

		$all_relasi_gizi = $this->m_relasi_gizi->all_relasi_gizi();
		$data['petugas_gizi'] = false;
		foreach ($all_relasi_gizi as $giz) {
			if($giz->id_pegawai==$id_pegawai)
			{
				$data['petugas_gizi']=true;
			}
		}
		
		$all_relasi_farmasi = $this->m_relasi_farmasi->all_relasi_farmasi();
		$data['petugas_farmasi']=false;
		foreach ($all_relasi_farmasi as $farm) {
			if($farm->id_pegawai==$id_pegawai)
			{
				$data['petugas_farmasi']=true;
			}
			
		}

		$all_relasi_perawat = $this->m_relasi_perawat->all_relasi_perawat();
		$data['is_perawat'] = false;
		foreach ($all_relasi_perawat as $perawat) {
			if($perawat->id_pegawai==$id_pegawai)
			{
				$data['is_perawat']=true;
			}
		}

		
		$all_relasi_staff = $this->m_relasi_staff->all_relasi_staff();
		$data['is_staff'] = false;
		foreach ($all_relasi_staff as $staff) {
			if($staff->id_pegawai==$id_pegawai)
			{
				$data['is_staff']=true;
			}
		}

		$all_relasi_dokter = $this->m_home->all_relasi_dokter();
		$data['is_dokter'] = false;
		foreach ($all_relasi_dokter as $dok) {
			if($dok->id_pegawai==$id_pegawai)
			{
				$data['is_dokter'] = true;
			}
		}


		$all_relasi_rujukan = $this->m_relasi_rujukan->all_relasi_rujukan();
		$data['is_rujukan'] = false;
		foreach ($all_relasi_rujukan as $ruj) {
			if($ruj->id_pegawai==$id_pegawai)
			{
				$data['is_rujukan'] = true;
			}
		}


		$all_relasi_lab = $this->m_home->all_relasi_lab();
		$data['is_petugas_lab'] = false;
		foreach ($all_relasi_lab as $petlab) {
			if($petlab->id_pegawai==$id_pegawai)
			{
				$data['is_petugas_lab'] = true;
			}
		}


		$all_relasi_konse = $this->m_relasi_konseling->all_relasi_konseling();
		$data['is_petugas_konse'] = false;
		foreach ($all_relasi_konse as $konse) {
			if($konse->id_pegawai==$id_pegawai)
			{
				$data['is_petugas_konse'] = true;
			}
		}



		$all_relasi_rawat_inap = $this->m_relasi_rawatinap->all_relasi_rawatinap();
		$data['is_petugas_rawat_inap'] = false;
		foreach ($all_relasi_rawat_inap as $ranap) {
			if($ranap->id_pegawai==$id_pegawai)
			{
				$data['is_petugas_rawat_inap'] = true;
			}
		}

		$data['is_super_admin']=false;
		if($this->session->userdata('id_pegawai')=='1')
		{
			$data['is_super_admin']=true;
		}

		$this->load->view("template/index.php",$data);
		
	}
	

	

	public function hapus_user($id_pegawai)
	{
		$this->db->where('id_pegawai',$id_pegawai);
		$this->db->delete('tbl_pegawai');
	}

	public function form_edit($id_user){
			 
			 
			 $data['edit']=$this->m_home->edit_user($id_user);
			 
			 			 
			$this->load->view('template/part/v_edituser',$data);
			 
	}
	
	public function edit_profil()
	{
		
		
		
		$id_user 		= $this->input->post("id_user");
		$nama			= $this->input->post("nama");
		$email 			= $this->input->post("email");
		$password 		= md5($this->input->post("password"));
		$pass_cetak 	= ($this->input->post("password"));
		
		$pangkat 		= $this->input->post("pangkat");
		$nip 		= $this->input->post("nip");
				
		$arr_data = array(	"nama"=>$nama,
							"email"=>$email,
							"password"=>$password,							
							"pass_cetak"=>$pass_cetak,							
							"nip"=>$nip,							
							"pangkat"=>$pangkat
							);		

		var_dump($arr_data);
		
		$ambil_model = $this->m_home->user_edit($arr_data,$id_user);
			
			
	}
	
	
	public function go_simpan_pegawai()
	{
		
		
		$nama			= $this->input->post("nama");
		$email 			= $this->input->post("email");
		$password 		= md5($this->input->post("password"));
		$pangkat 		= $this->input->post("pangkat");
		$nip 		= $this->input->post("nip");
		$pass_cetak = $this->input->post("password");
				
		$arr_data = array(	"nama"=>$nama,
							"email"=>$email,
							"password"=>$password,							
							"pangkat"=>$pangkat,							
							"pass_cetak"=>$pass_cetak,							
							"nip"=>$nip
							);		
		
		$ambil_model = $this->m_home->go_simpan_pegawai($arr_data);
			
			
	}
	
	
	
	
	public function form_pegawai()
	{
		
		
		
		$this->load->view('template/part/form_pegawai');
			
			
	}
	
	
	
	
	public function list_admin()
	{
		$data['query'] = $this->m_home->all_user();
		$this->load->view("template/part/list_user",$data);
	}


	
	public function list_dokter()
	{
		$data['query'] = $this->m_home->all_dokter();
		$this->load->view("template/part/dokter",$data);
	}




	public function dokter_json($id)
	{
		header('Content-Type: application/json');
		$data['query'] = $this->m_home->dokter_by_id($id);
		echo json_encode($data['query']);
	}



	public function simpan_form_dokter()
	{
		$id = $this->input->post('id');		
		$serialize = $this->input->post();
		

		if($id=='')
		{
			
			$this->m_home->tambah_dokter($serialize);
			die('1');
		}else{

			$this->m_home->update_dokter($serialize,$id);


		}
	
	}

	public function hapus_dokter($id)
	{
		$this->m_home->hapus_dokter($id);
	}


	/***** obat *****/
	public function list_penyakit()
	{
		$data['query'] = $this->m_home->all_penyakit();
		$this->load->view("template/part/penyakit",$data);
	}




	public function penyakit_json($id)
	{
		header('Content-Type: application/json');
		$data['query'] = $this->m_home->penyakit_by_id($id);
		echo json_encode($data['query']);
	}



	public function simpan_form_penyakit()
	{
		$id = $this->input->post('id');		
		$serialize = $this->input->post();
		

		if($id=='')
		{
			
			$this->m_home->tambah_penyakit($serialize);
			die('1');
		}else{

			$this->m_home->update_penyakit($serialize,$id);


		}
	
	}

	public function hapus_penyakit($id)
	{
		$this->m_home->hapus_penyakit($id);
	}
	/***** obat ****/


	/***************** poli *******************/	
	public function list_poli()
	{
		$data['query'] = $this->m_home->all_poli();
		$this->load->view("template/part/poli",$data);
	}

	public function poli_json($id)
	{
		header('Content-Type: application/json');
		$data['query'] = $this->m_home->poli_by_id($id);
		echo json_encode($data['query']);
	}

	public function simpan_form_poli()
	{
		$id = $this->input->post('id_poli');		
		$serialize = $this->input->post();
		

		if($id=='')
		{
			
			$this->m_home->tambah_poli($serialize);
			die('1');
		}else{

			$this->m_home->update_poli($serialize,$id);


		}
	
	}

	public function hapus_poli($id)
	{
		$this->m_home->hapus_poli($id);
	}
	/***************** poli *******************/


	/***************** relasi_lab *******************/	
	public function list_relasi_lab()
	{
		$data['query'] = $this->m_home->all_relasi_lab();
		$data['pegawai'] = $this->m_home->all_pegawai();
		
		//var_dump($data['pegawai']);
		$this->load->view("template/part/relasi_lab",$data);
	}

	public function relasi_lab_json($id)
	{
		header('Content-Type: application/json');
		$data['query'] = $this->m_home->relasi_lab_by_id($id);
		echo json_encode($data['query']);
	}

	public function simpan_form_relasi_lab()
	{
		$id = $this->input->post('id');		
		$serialize = $this->input->post();
		

		if($id=='')
		{
			
			$this->m_home->tambah_relasi_lab($serialize);
			die('1');
		}else{

			$this->m_home->update_relasi_lab($serialize,$id);


		}
	
	}

	public function hapus_relasi_lab($id)
	{
		$this->m_home->hapus_relasi_lab($id);
	}
	/***************** relasi_lab *******************/




	/***************** relasi_dokter *******************/	
	public function list_relasi_dokter()
	{
		$data['query'] = $this->m_home->all_relasi_dokter();
		$data['pegawai'] = $this->m_home->all_pegawai();
		$data['spesialis'] = $this->m_home->all_spesialis();
		
		//var_dump($data['pegawai']);
		$this->load->view("template/part/relasi_dokter",$data);
	}

	public function relasi_dokter_json($id)
	{
		header('Content-Type: application/json');
		$data['query'] = $this->m_home->relasi_dokter_by_id($id);
		echo json_encode($data['query']);
	}

	public function simpan_form_relasi_dokter()
	{
		$id = $this->input->post('id');		
		$serialize = $this->input->post();
		

		if($id=='')
		{
			
			$this->m_home->tambah_relasi_dokter($serialize);
			die('1');
		}else{

			$this->m_home->update_relasi_dokter($serialize,$id);


		}
	
	}

	public function hapus_relasi_dokter($id)
	{
		$this->m_home->hapus_relasi_dokter($id);
	}
	/***************** relasi_dokter *******************/


	/***************** relasi_jabatan *******************/	
	public function list_relasi_jabatan()
	{
		$data['query'] = $this->m_home->all_relasi_jabatan();
		$data['pegawai'] = $this->m_home->all_pegawai();
		$data['jabatan'] = $this->m_home->all_jabatan();
		
		//var_dump($data['pegawai']);
		$this->load->view("template/part/relasi_jabatan",$data);
	}

	public function relasi_jabatan_json($id)
	{
		header('Content-Type: application/json');
		$data['query'] = $this->m_home->relasi_jabatan_by_id($id);
		echo json_encode($data['query']);
	}

	public function simpan_form_relasi_jabatan()
	{
		$id = $this->input->post('id');		
		$serialize = $this->input->post();
		

		if($id=='')
		{
			
			$this->m_home->tambah_relasi_jabatan($serialize);
			die('1');
		}else{

			$this->m_home->update_relasi_jabatan($serialize,$id);


		}
	
	}

	public function hapus_relasi_jabatan($id)
	{
		$this->m_home->hapus_relasi_jabatan($id);
	}
	/***************** relasi_jabatan *******************/



	/***************** kecamatan *******************/	
	public function list_kecamatan()
	{
		$data['query'] = $this->m_home->all_kecamatan();
		$this->load->view("template/part/kecamatan",$data);
	}

	public function kecamatan_json($id)
	{
		header('Content-Type: application/json');
		$data['query'] = $this->m_home->kecamatan_by_id($id);
		echo json_encode($data['query']);
	}

	public function simpan_form_kecamatan()
	{
		$id = $this->input->post('id_kecamatan');		
		$serialize = $this->input->post();
		
		if($id=='')
		{	
			$this->m_home->insert_kecamatan($serialize);
			die('1');
		}else{

			$this->m_home->update_kecamatan($serialize,$id);
		}
	
	}

	public function hapus_kecamatan($id)
	{
		$this->m_home->hapus_kecamatan($id);
	}
	/***************** kecamatan *******************/



	/***************** desa *******************/	
	public function list_desa()
	{
		$data['query'] = $this->m_home->all_desa();
		$data['all_kecamatan'] = $this->m_home->all_kecamatan();
		$this->load->view("template/part/desa",$data);
	}

	public function desa_json($id)
	{
		header('Content-Type: application/json');
		$data['query'] = $this->m_home->desa_by_id($id);
		echo json_encode($data['query']);
	}


	public function desa_json_by_kec($id_kecamatan)
	{
		header('Content-Type: application/json');
		$data['query'] = $this->m_home->desa_by_id_kecamatan($id_kecamatan);
		echo json_encode($data['query']);
	}

	public function simpan_form_desa()
	{
		$id = $this->input->post('id_desa');		
		$serialize = $this->input->post();
		
		if($id=='')
		{	
			$this->m_home->insert_desa($serialize);
			die('1');
		}else{

			$this->m_home->update_desa($serialize,$id);
		}
	
	}

	public function hapus_desa($id)
	{
		$this->m_home->hapus_desa($id);
	}
	/***************** desa *******************/


	/***************** relasi_unit *******************/	
	public function list_relasi_unit()
	{
		$data['query'] = $this->m_home->all_relasi_unit();
		$data['pegawai'] = $this->m_home->all_pegawai();
		$data['all_kecamatan'] = $this->m_home->all_kecamatan();
		$data['unit'] = $this->m_home->all_relasi_unit();
		
		//var_dump($data['pegawai']);
		$this->load->view("template/part/relasi_unit",$data);
	}

	public function relasi_unit_json($id_relasi_unit)
	{
		header('Content-Type: application/json');
		$data['query'] = $this->m_home->relasi_unit_by_id($id_relasi_unit);
		echo json_encode($data['query']);
	}

	public function simpan_form_relasi_unit()
	{
		$id_relasi_unit = $this->input->post('id_relasi_unit');		
		$serialize = $this->input->post();
		

		if($id_relasi_unit=='')
		{
			
			$this->m_home->tambah_relasi_unit($serialize);
			die('1');
		}else{

			$this->m_home->update_relasi_unit($serialize,$id_relasi_unit);


		}
	
	}

	public function hapus_relasi_unit($id_relasi_unit)
	{
		$this->m_home->hapus_relasi_unit($id_relasi_unit);
	}
	/***************** relasi_unit *******************/



	public function badge_keluhan()
	{
		$q = $this->db->query("SELECT COUNT(*) AS kel 
									FROM tbl_kunjungan a 
									INNER JOIN tbl_timeline b
										ON a.id_timeline=b.id
								 WHERE ke='2' OR ke='5'");
		$qq = $q->result();
		
		if($qq[0]->kel > 0)
		{
			echo $qq[0]->kel;
		}
	}


	public function badge_farmasi()
	{
		$q = $this->db->query("SELECT COUNT(*) AS cet 
									FROM tbl_kunjungan a 
									INNER JOIN tbl_timeline b
										ON a.id_timeline=b.id
								 WHERE ke='7'");
		$qq = $q->result();
		
		if($qq[0]->cet > 0)
		{
			echo $qq[0]->cet;	
		}
	}


	public function badge_lab()
	{
		$q = $this->db->query("SELECT COUNT(*) AS cet 
									FROM tbl_kunjungan a 
									INNER JOIN tbl_timeline b
										ON a.id_timeline=b.id
								 WHERE ke='3'");
		$qq = $q->result();
		
		if($qq[0]->cet > 0)
		{
			echo $qq[0]->cet;	
		}
	}



	public function badge_rujuk()
	{
		$q = $this->db->query("SELECT COUNT(*) AS cet 
									FROM tbl_kunjungan a 
									INNER JOIN tbl_timeline b
										ON a.id_timeline=b.id
								 WHERE ke='10'");
		$qq = $q->result();
		
		if($qq[0]->cet > 0)
		{
			echo $qq[0]->cet;	
		}
	}



	public function badge_konse()
	{
		$q = $this->db->query("SELECT COUNT(*) AS cet 
									FROM tbl_kunjungan a 
									INNER JOIN tbl_timeline b
										ON a.id_timeline=b.id
								 WHERE ke='8'");
		$qq = $q->result();
		
		if($qq[0]->cet > 0)
		{
			echo $qq[0]->cet;	
		}
	}


	public function badge_rawat()
	{
		$q = $this->db->query("SELECT COUNT(*) AS cet 
									FROM tbl_kunjungan a 
									INNER JOIN tbl_timeline b
										ON a.id_timeline=b.id
								 WHERE ke='9'");
		$qq = $q->result();
		
		if($qq[0]->cet > 0)
		{
			echo $qq[0]->cet;	
		}
	}



	public function badge_gizi()
	{
		$q = $this->db->query("SELECT COUNT(*) AS cet 
									FROM tbl_kunjungan a 
									INNER JOIN tbl_timeline b
										ON a.id_timeline=b.id
								 WHERE ke='4'");
		$qq = $q->result();
		
		if($qq[0]->cet > 0)
		{
			echo $qq[0]->cet;	
		}
	}

	
	public function badge_kapus()
	{
		$q = $this->m_obat->data_permintaan_group_status(1);
		
		
		if(count($q) > 0)
		{
			echo count($q);
		}
	}

	public function badge_farmasi_verifikasi()
	{
		
		$q = $this->m_obat->data_permintaan_group_status(0);
		
		
		if(count($q) > 0)
		{
			echo count($q);
		}
	}

	

	public function badge_farmasi_cetak()
	{
		
		$q = $this->m_obat->data_permintaan_group_status(2);
		
		
		if(count($q) > 0)
		{
			echo count($q);
		}
	}


	public function badge_farmasi_unit()
	{
		$x = $this->m_obat->data_permintaan_group_by_id_pegawai($this->session->userdata('id_pegawai'));
		if(count($x)>0)
		{
			$baru = $this->m_obat->data_permintaan_group_status(0);					
			if(count($baru) > 0)
			{
				echo count($baru);
			}

			$farmasi_checked = $this->m_obat->data_permintaan_group_status(1);					
			if(count($farmasi_checked) > 0)
			{
				echo count($farmasi_checked);
			}

			$kapus_setuju = $this->m_obat->data_permintaan_group_status(2);					
			if(count($kapus_setuju) > 0)
			{
				echo count($kapus_setuju);
			}
		}

		
	}



	public function timeline($id_kunjungan)
	{		
		$q = $this->db->query("SELECT a.*,b.desc_timeline AS desc_dari,c.desc_timeline AS desc_ke FROM tbl_timeline a
		 						LEFT JOIN tbl_timeline_master b ON a.dari=b.kode
		 						LEFT JOIN tbl_timeline_master c ON a.ke=c.kode
		 						WHERE id_kunjungan='$id_kunjungan' ORDER BY tgl_selesai ASC
		 					 ");
		$data['timeline'] = $q->result();
		$this->load->view("template/part/timeline",$data);
		
	}


}
