<?php
if (!defined('BASEPATH'))exit('No direct script access allowed');

	class M_keluhan extends CI_Model {
		
		function __construct() {
			parent::__construct();
		
			$this->load->helper('custom_func');
		}


	
	public function m_poli()
	{
		
			$q = $this->db->query("SELECT * FROM `tbl_poli`");			
		

		return $q->result();
	}


	public function m_data()
	{
		
			$q = $this->db->query("															

									SELECT a.*,b.poli,c.nama AS nama_dokter,d.*,e.*,
									FLOOR(DATEDIFF(CURRENT_DATE, d.tgl_lahir)/365) AS usia
									FROM `tbl_kunjungan` a 
									LEFT JOIN tbl_poli b ON a.id_poli=b.id_poli
									LEFT JOIN 
									(
										SELECT 
											
											b.*,c.spesialis 
										FROM tbl_relasi_dokter a 
										INNER JOIN 
										tbl_pegawai b ON a.id_pegawai=b.id_pegawai
										INNER JOIN 
										tbl_dokter c ON a.id_spesialis=c.id
										GROUP BY b.id_pegawai
										ORDER BY a.tgl DESC
									) c ON a.id_dokter=c.id_pegawai 
									LEFT JOIN tbl_pasien d ON a.no_pendaftaran=d.no_pendaftaran
									LEFT JOIN (
										SELECT 
											a.tgl_mulai,
											a.tgl_selesai,
											a.no_pendaftaran,
											a.lama_pemeriksaan,
											a.id,
											a.dari,
											a.ke,
											b.desc_timeline AS desc_dari,
											c.desc_timeline AS desc_ke 
										FROM tbl_timeline a
				 						LEFT JOIN tbl_timeline_master b ON a.dari=b.kode
				 						LEFT JOIN tbl_timeline_master c ON a.ke=c.kode
										/*
										WHERE code_timeline='1'
										*/
									)e ON a.id_timeline=e.id
									WHERE ke!='11'
									ORDER BY a.id_kunjungan DESC

								");					
			return $q->result();
	}




	public function m_data_history()
	{
		
			$q = $this->db->query("															

									SELECT a.*,b.poli,c.nama AS nama_dokter,d.*,e.*,
									FLOOR(DATEDIFF(CURRENT_DATE, d.tgl_lahir)/365) AS usia
									FROM `tbl_kunjungan` a 
									LEFT JOIN tbl_poli b ON a.id_poli=b.id_poli
									LEFT JOIN 
									(
										SELECT 
											
											b.*,c.spesialis 
										FROM tbl_relasi_dokter a 
										INNER JOIN 
										tbl_pegawai b ON a.id_pegawai=b.id_pegawai
										INNER JOIN 
										tbl_dokter c ON a.id_spesialis=c.id
										GROUP BY b.id_pegawai
										ORDER BY a.tgl DESC
									) c ON a.id_dokter=c.id_pegawai 
									LEFT JOIN tbl_pasien d ON a.no_pendaftaran=d.no_pendaftaran
									LEFT JOIN (
										SELECT 
											a.tgl_mulai,
											a.tgl_selesai,
											a.no_pendaftaran,
											a.lama_pemeriksaan,
											a.id,
											a.dari,
											a.ke,
											b.desc_timeline AS desc_dari,
											c.desc_timeline AS desc_ke 
										FROM tbl_timeline a
				 						LEFT JOIN tbl_timeline_master b ON a.dari=b.kode
				 						LEFT JOIN tbl_timeline_master c ON a.ke=c.kode
										/*
										WHERE code_timeline='1'
										*/
									)e ON a.id_timeline=e.id
									WHERE ke='11'
									ORDER BY a.id_kunjungan DESC
								");					
			return $q->result();
	}



	public function m_data_by_id($id)
	{
				$q = $this->db->query("															

									SELECT a.*,b.poli,c.nama AS nama_dokter,d.*,e.*,
									FLOOR(DATEDIFF(CURRENT_DATE, d.tgl_lahir)/365) AS usia 
									FROM `tbl_kunjungan` a 
									LEFT JOIN tbl_poli b ON a.id_poli=b.id_poli
									INNER JOIN 
									(
										SELECT 
											
											b.*,c.spesialis 
										FROM tbl_relasi_dokter a 
										INNER JOIN 
										tbl_pegawai b ON a.id_pegawai=b.id_pegawai
										INNER JOIN 
										tbl_dokter c ON a.id_spesialis=c.id
										GROUP BY b.id_pegawai
										ORDER BY a.tgl DESC
									) c ON a.id_dokter=c.id_pegawai 
									LEFT JOIN tbl_pasien d ON a.no_pendaftaran=d.no_pendaftaran
									LEFT JOIN (
										SELECT 
											a.tgl_mulai,
											a.tgl_selesai,
											a.no_pendaftaran,
											a.lama_pemeriksaan,
											a.id,
											a.dari,
											a.ke,
											b.desc_timeline AS desc_dari,
											c.desc_timeline AS desc_ke 
										FROM tbl_timeline a
				 						LEFT JOIN tbl_timeline_master b ON a.dari=b.kode
				 						LEFT JOIN tbl_timeline_master c ON a.ke=c.kode
										/*
										WHERE code_timeline='1'
										*/
									)e ON a.id_timeline=e.id

									
								WHERE a.id_kunjungan='$id'
								
								");			
		return $q->result();
	}


	public function data_keluhan_by_no_pendaftaran($no_pendaftaran){
				
		$query = $this->db->query("
						SELECT 
								a.*,
								FLOOR(DATEDIFF(CURRENT_DATE, a.tgl_lahir)/365) AS usia,
								b.id AS id_keluhan_umum,
								b.keluhan_umum,
								b.id_dokter,
								b.id_poli,
								b.tgl_janji,
								c.poli


						FROM tbl_pasien a 
						LEFT JOIN tbl_kunjungan b 						
						ON a.no_pendaftaran=b.no_pendaftaran
						LEFT JOIN tbl_poli c ON b.id_poli=c.id_poli
						WHERE a.no_pendaftaran='$no_pendaftaran'
			");
		$a = $query->result();
		return $a[0];
	}



	public function tambah($serialize)
	{
		$this->db->set($serialize);
		$this->db->insert('tbl_kunjungan');
		return $this->db->insert_id();

	}


	public function update($serialize,$id)
	{
		$this->db->set($serialize);
		$this->db->where('id_kunjungan',$id);
		$this->db->update('tbl_kunjungan');
	}


	public function hapus($id)
	{
				
		$this->db->query("DELETE FROM tbl_kunjungan WHERE id='$id'");
	}




}