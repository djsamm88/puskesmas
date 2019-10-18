<?php 
	if (!defined('BASEPATH'))exit('No direct script access allowed');

	class M_rawat_inap extends CI_Model {
		
		function __construct() {
			parent::__construct();
		
			$this->load->helper('custom_func');
		}


	
/**********************************Master Kamar*****************************/
public function all_rawat_inap()
	{
		$q= $this->db->query("SELECT * FROM master_rawat_inap");
		return $q->result();
	}
public function tambah_master_rawat_inap($serialize)
	{
		$this->db->set($serialize);
		$this->db->insert('master_rawat_inap');
	}
public function update_rawat_inap($serialize,$id)
	{
		$this->db->set($serialize);
		$this->db->where('id',$id);
		$this->db->update('master_rawat_inap');
	}
public function by_id_rawat_inap($id)
	{
		$q= $this->db->query("SELECT * FROM master_rawat_inap WHERE id='$id'");
		return $q->result();
	}
public function hapus_rawat_inap($id)
	{
				
		$this->db->query("DELETE FROM master_rawat_inap WHERE id='$id'");
	}



	public function data_kunjungan_rawatinap($id_kunjungan=null)
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
									LEFT JOIN tbl_rawat_inap f ON a.id_kunjungan=f.id_kunjungan
									
									WHERE ke='9' $x
									ORDER BY a.id_kunjungan DESC";
		//echo $query;							
		$q = $this->db->query($query);
		return $q->result();
	}



	public function data_kunjungan_rawatinap_history($id_kunjungan=null)
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
									LEFT JOIN tbl_rawat_inap f ON a.id_kunjungan=f.id_kunjungan
									
									WHERE dari='9' $x
									ORDER BY a.id_kunjungan DESC";
		//echo $query;							
		$q = $this->db->query($query);
		return $q->result();
	}

	

	public function data_by_id_kunjungan($id){
		$query = "SELECT a.*,b.poli,c.nama AS nama_dokter,d.*,e.*,f.*,g.nama AS nama_pegawai,g.nip,
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
										WHERE dari='9' AND id_kunjungan='$id'
										ORDER BY tgl_mulai DESC LIMIT 1
										
										
									)e ON a.id_kunjungan=e.id_kunjungan
									LEFT JOIN tbl_rawat_inap f ON a.id_kunjungan=f.id_kunjungan
									LEFT JOIN tbl_pegawai g ON f.id_pegawai=g.id_pegawai
									
									WHERE a.id_kunjungan='$id'
									ORDER BY f.id DESC
								";
		//echo $query;
		$q = $this->db->query($query);
		$a = $q->result();
		return $a;
	}

}
?>