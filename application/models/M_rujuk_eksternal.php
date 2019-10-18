<?php 
	if (!defined('BASEPATH'))exit('No direct script access allowed');

	class M_rujuk_eksternal extends CI_Model {
		
		function __construct() {
			parent::__construct();
		
			$this->load->helper('custom_func');
		}


	public function data($id_kunjungan=null)
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
									
									
									WHERE ke='10' $x
									ORDER BY a.id_kunjungan DESC";
		//echo $query;							
		$q = $this->db->query($query);
		return $q->result();
	}




	public function data_history($id_kunjungan=null)
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
									
									
									WHERE dari='10' $x
									ORDER BY a.id_kunjungan DESC";
		//echo $query;							
		$q = $this->db->query($query);
		return $q->result();
	}

}
?>
