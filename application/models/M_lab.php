<?php 
	if (!defined('BASEPATH'))exit('No direct script access allowed');

	class M_lab extends CI_Model {
		
		function __construct() {
			parent::__construct();
		
			$this->load->helper('custom_func');
		}


	public function all_lab()
	{
		$q= $this->db->query("SELECT * FROM tbl_lab");
		return $q->result();
	}
	public function tambah_lab($arr_data)
	{
					
		$this->db->set($arr_data);
		$this->db->insert('tbl_lab');
		
		return $this->db->insert_id();
		
	}
	public function data_by_id($id){
				
		$query = $this->db->query("SELECT * FROM tbl_lab  WHERE id='$id'");
		$a = $query->result();
		return $a[0];
	}

	public function data_by_id_kunjungan($id){
		$query = "SELECT a.*,b.poli,c.nama AS nama_dokter,d.*,e.*,f.*,g.nama AS nama_pegawai,
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
										WHERE dari='3' AND id_kunjungan='$id'
										ORDER BY tgl_mulai DESC LIMIT 1
										
										
									)e ON a.id_kunjungan=e.id_kunjungan
									LEFT JOIN tbl_lab f ON a.id_kunjungan=f.id_kunjungan
									LEFT JOIN tbl_pegawai g ON f.id_pegawai=g.id_pegawai
									
									WHERE a.id_kunjungan='$id'
									ORDER BY f.id DESC
								";
		//echo $query;
		$q = $this->db->query($query);
		$a = $q->result();
		return $a;
	}

	public function go_edit($arr_data,$id)
	{
			
		$this->db->where('id', $id);
		$this->db->update('tbl_lab', $arr_data); 
		
	}
	public function hapus_list($id)
	{
					
		$this->db->where('id', $id);
		$this->db->delete('tbl_lab'); 
		
	}



	public function master_lab()
	{
		$q= $this->db->query("SELECT * FROM master_lab");
		return $q->result();
	}
	public function data_kunjungan_lab($id_kunjungan=null)
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
									
									WHERE ke='3' $x
									ORDER BY a.id_kunjungan DESC";
		//echo $query;							
		$q = $this->db->query($query);
		return $q->result();
	}


	public function data_kunjungan_lab_history($id_kunjungan=null)
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
									
									WHERE dari='3' $x
									ORDER BY a.id_kunjungan DESC";
		//echo $query;							
		$q = $this->db->query($query);
		return $q->result();
	}

}
?>
