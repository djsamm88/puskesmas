<?php 
	if (!defined('BASEPATH'))exit('No direct script access allowed');

	class M_gizi extends CI_Model {
		
		function __construct() {
			parent::__construct();
		
			$this->load->helper('custom_func');
		}


	public function all()
	{
		$q= $this->db->query("SELECT * FROM master_gizi");
		return $q->result();
	}


	public function tambah($serialize)
	{
		$this->db->set($serialize);
		$this->db->insert('master_gizi');
	}


	public function update($serialize,$id)
	{
		$this->db->set($serialize);
		$this->db->where('id',$id);
		$this->db->update('master_gizi');
	}


	public function hapus($id)
	{
				
		$this->db->query("DELETE FROM master_gizi WHERE id='$id'");
	}

	public function by_id($id)
	{
		$q= $this->db->query("SELECT * FROM master_gizi WHERE id='$id'");
		return $q->result();
	}


	public function data_kunjungan_gizi($id_kunjungan=null)
	{
		if($id_kunjungan==null)
		{
			$x = "";
		}else{
			
			$x = "AND a.id_kunjungan='$id_kunjungan'";
		}
		$query = "SELECT a.*,b.poli,c.nama AS nama_dokter,d.*,e.*,
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
										
										
									)e ON a.id_timeline=e.id
									LEFT JOIN tbl_lab f ON a.id_kunjungan=f.id_kunjungan
									
									WHERE ke='4' $x
									ORDER BY a.id_kunjungan DESC";
		//echo $query;							
		$q = $this->db->query($query);
		return $q->result();
	}



	public function history_data_kunjungan_gizi($id_kunjungan=null)
	{
		if($id_kunjungan==null)
		{
			$x = "";
		}else{
			
			$x = "AND a.id_kunjungan='$id_kunjungan'";
		}
		$query = "SELECT a.*,b.poli,c.nama AS nama_dokter,d.*,e.*,
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
											a.id_kunjungan,
											a.dari,
											a.ke,
											b.desc_timeline AS desc_dari,
											c.desc_timeline AS desc_ke 
										FROM tbl_timeline a
				 						LEFT JOIN tbl_timeline_master b ON a.dari=b.kode
				 						LEFT JOIN tbl_timeline_master c ON a.ke=c.kode
										
										
									)e ON a.id_kunjungan=e.id_kunjungan
									LEFT JOIN tbl_lab f ON a.id_kunjungan=f.id_kunjungan
									
									WHERE dari='4' $x
									ORDER BY a.id_kunjungan DESC";
		//echo $query;							
		$q = $this->db->query($query);
		return $q->result();
	}


	public function hasil_gizi_by_id_kunjungan($id_kunjungan)
	{
		
		
		$query = "SELECT a.*,b.poli,c.nama AS nama_dokter,d.*,e.*,
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
										SELECT a.*
										FROM `tbl_timeline` a 
										WHERE dari='4' AND id_kunjungan='$id_kunjungan'
										ORDER BY tgl_mulai DESC LIMIT 1
										
									)e ON a.id_kunjungan=e.id_kunjungan
									LEFT JOIN tbl_lab f ON a.id_kunjungan=f.id_kunjungan
									
									WHERE  a.id_kunjungan='$id_kunjungan'
									ORDER BY a.id_kunjungan DESC";
		//echo $query;							
		$q = $this->db->query($query);
		return $q->result();
	}
	public function go_edit($arr_data,$id_kunjungan)
	{
			
		$this->db->where('id_kunjungan', $id_kunjungan);
		$this->db->update('tbl_kunjungan', $arr_data); 
		
	}

}
?>
