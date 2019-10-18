<?php 
	if (!defined('BASEPATH'))exit('No direct script access allowed');

	class M_kunjungan extends CI_Model {
		
		function __construct() {
			parent::__construct();
		
			$this->load->helper('custom_func');
		}
		
	
	public function cari_pasien($arr){
				
		
		$nama 			= trim($arr['nama']);
		$no_pendaftaran = trim($arr['no_pendaftaran']);
		
		
		if($nama=='')
		{
			$query = $this->db->query("SELECT a.*,FLOOR(DATEDIFF(CURRENT_DATE, a.tgl_lahir)/365) AS usia FROM tbl_pasien a WHERE no_pendaftaran = '$no_pendaftaran'");
		}else if($no_pendaftaran=='')
		{
			$query = $this->db->query("SELECT a.*,FLOOR(DATEDIFF(CURRENT_DATE, a.tgl_lahir)/365) AS usia FROM tbl_pasien a WHERE nama LIKE '%$nama%'");
		}else{
			$query = $this->db->query("SELECT a.*,FLOOR(DATEDIFF(CURRENT_DATE, a.tgl_lahir)/365) AS usia FROM tbl_pasien a WHERE nama LIKE '%$nama%' OR no_pendaftaran = '$no_pendaftaran'");
		}
		
		$a = $query->result();
		return $a;
	}
	
	public function data_list()
	{
		$query = $this->db->query("SELECT a.*,FLOOR(DATEDIFF(CURRENT_DATE, b.tgl_lahir)/365) AS usia,b.*,c.*,d.*,e.*
									FROM tbl_kunjungan a 
									LEFT JOIN tbl_pasien b ON a.no_pendaftaran=b.no_pendaftaran 
									LEFT JOIN tbl_keluhan_umum c ON a.id_keluhan_umum=c.id 
									LEFT JOIN tbl_poli d ON c.id_poli=d.id_poli 
									LEFT JOIN tbl_dokter e ON a.id_dokter=e.id 
									ORDER BY id_kunjungan DESC");
		return $query->result();
	}

	public function data_list_by_id($id_kunjungan)
	{
		$query = $this->db->query("SELECT a.*,FLOOR(DATEDIFF(CURRENT_DATE, b.tgl_lahir)/365) AS usia,b.*,c.*,d.*,e.nama AS nama_dokter,e.nip
									FROM tbl_kunjungan a 
									LEFT JOIN tbl_pasien b ON a.no_pendaftaran=b.no_pendaftaran 
									LEFT JOIN tbl_keluhan_umum c ON a.id_keluhan_umum=c.id 
									LEFT JOIN tbl_poli d ON c.id_poli=d.id_poli 
									LEFT JOIN (
										SELECT 											
											b.*,c.spesialis 
										FROM tbl_relasi_dokter a 
										INNER JOIN 
										tbl_pegawai b ON a.id_pegawai=b.id_pegawai
										INNER JOIN 
										tbl_dokter c ON a.id_spesialis=c.id
										GROUP BY b.id_pegawai
										ORDER BY a.tgl DESC
									) e ON a.id_dokter=e.id_pegawai 
									WHERE id_kunjungan='$id_kunjungan'");
		return $query->result();
	}

	public function data_list_farmasi($id_kunjungan=null)
	{
		if($id_kunjungan==null)
		{
			$x = " ";
		}else{
			
			$x = " AND a.id_kunjungan='$id_kunjungan'";
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
									
									WHERE ke='7' $x
									ORDER BY a.id_kunjungan DESC";
		//echo $query;							
		$q = $this->db->query($query);
		return $q->result();
	}

	public function data_list_farmasi_by_id_kunjungan($id_kunjungan)
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
									
									WHERE  a.id_kunjungan='$id_kunjungan'
									ORDER BY a.id_kunjungan DESC";
		//echo $query;							
		$q = $this->db->query($query);
		return $q->result();
	}


	public function history_data_kunjungan_farmasi($id_kunjungan=null)
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
									
									WHERE dari='7' $x
									ORDER BY a.id_kunjungan DESC";
		//echo $query;							
		$q = $this->db->query($query);
		return $q->result();
	}

	public function data_list_farmasi_by_id($id_kunjungan)
	{
		$q = $this->db->query("
							
								SELECT a.*,b.*,
								c.nama AS nama_dokter,c.nip,d.*,e.poli
								FROM `tbl_kunjungan` a 
								LEFT JOIN 
								(
									SELECT a.*,FLOOR(DATEDIFF(CURRENT_DATE, a.tgl_lahir)/365) AS usia FROM tbl_pasien a 
								)b
								ON a.no_pendaftaran=b.no_pendaftaran

								LEFT JOIN (
											SELECT 											
												b.*,c.spesialis 
											FROM tbl_relasi_dokter a 
											INNER JOIN 
											tbl_pegawai b ON a.id_pegawai=b.id_pegawai
											INNER JOIN 
											tbl_dokter c ON a.id_spesialis=c.id
											GROUP BY b.id_pegawai
											ORDER BY a.tgl DESC
								) c
								ON a.id_dokter=c.id_pegawai
								LEFT JOIN 
								(
									SELECT a.id AS id_timeline,a.code_timeline,a.tgl_mulai,a.tgl_selesai,a.lama_pemeriksaan, b.* FROM tbl_timeline a 
									INNER JOIN tbl_timeline_master b ON a.code_timeline=b.kode

								)d ON a.id_timeline=d.id_timeline
								LEFT JOIN tbl_poli e ON a.id_poli=e.id_poli 

								WHERE a.id_kunjungan='$id_kunjungan'					
							");
		return $q->result();
	}

	
	
	
	public function tbl_master_diagnosa()
	{
		$query = $this->db->query("SELECT * FROM tbl_master_diagnosa");
		return $query->result();
	}
	
	public function list_poli()
	{
		$query = $this->db->query("SELECT * FROM tbl_poli");
		return $query->result();
	}
	
	
	public function go_edit($arr_data,$id_kunjungan)
	{
			
		$this->db->where('id_kunjungan', $id_kunjungan);
		$this->db->update('tbl_kunjungan', $arr_data); 
		
	}
	
	
	public function go_simpan($arr_data)
	{
					
		$this->db->set($arr_data);
		$this->db->insert('tbl_kunjungan');
		
		return $this->db->insert_id();
		
	}
	
	
	public function hapus_list($no_pendaftaran)
	{
					
		$this->db->where('no_pendaftaran', $no_pendaftaran);
		$this->db->delete('tbl_pasien'); 
		
	}
	
	public function view($id_kunjungan)
	{
					
		$q = $this->db->query("
								SELECT a.*,b.code,b.diagnosa,
										c.nama,
										c.jenis_kelamin,
										c.gol_darah,
										FLOOR(DATEDIFF(CURRENT_DATE, c.tgl_lahir)/365) AS usia,
										c.tgl_lahir,
										c.no_bpjs,
										c.no_telp,
										c.alamat,
										c.desa,
										c.kecamatan,
										c.kabupaten,
										c.tgl_daftar,
										d.poli,
										e.keadaan_umum,
										e.kepala_leher,
										e.thorax,
										e.abdomen,
										e.extremitas,
										e.status_neorologis
										
										
								FROM tbl_kunjungan a
									LEFT JOIN 
									(
											SELECT 
													GROUP_CONCAT(z.code) AS code,
													GROUP_CONCAT(z.diagnosa) AS diagnosa, 
													y.id_kunjungan 
												FROM tbl_master_diagnosa z 
												INNER JOIN tbl_diagnosa y 
												ON z.code=y.code_diagnosa
											GROUP BY y.id_kunjungan
									) b
									ON a.id_kunjungan=b.id_kunjungan
									
									LEFT JOIN tbl_pasien c
									ON a.no_pendaftaran=c.no_pendaftaran
									
									LEFT JOIN tbl_poli d									
									ON a.id_poli=d.id_poli
									
									LEFT JOIN tbl_pemeriksaan_fisik e
									ON a.id_kunjungan=e.id_kunjungan
									
									WHERE a.id_kunjungan='$id_kunjungan'
							");
		$data = $q->result();
		return $data[0];
	}
	
	

	public function m_diagnosa($id_kunjungan)
	{
		$q = $this->db->query("
							SELECT a.*,b.*,c.nama AS nama_dokter,c.nip,d.*
							FROM `tbl_kunjungan` a 
							LEFT JOIN 
							(
							SELECT a.*,FLOOR(DATEDIFF(CURRENT_DATE, a.tgl_lahir)/365) AS usia FROM tbl_pasien a 
							)b
							ON a.no_pendaftaran=b.no_pendaftaran

							LEFT JOIN (
										SELECT 											
											b.*,c.spesialis 
										FROM tbl_relasi_dokter a 
										INNER JOIN 
										tbl_pegawai b ON a.id_pegawai=b.id_pegawai
										INNER JOIN 
										tbl_dokter c ON a.id_spesialis=c.id
										GROUP BY b.id_pegawai
										ORDER BY a.tgl DESC
							) c
							ON a.id_dokter=c.id_pegawai
							LEFT JOIN 
							(
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

							)d ON a.id_timeline=d.id
							WHERE a.id_kunjungan='$id_kunjungan'
							");

		return $q->result();
	}


	public function m_get_diag($id_kunjungan)
	{
		$q = $this->db->query("
				SELECT a.code_diagnosa,b.diagnosa 
				FROM `tbl_diagnosa` a 
					LEFT JOIN (
						SELECT * FROM tbl_master_diagnosa
						UNION SELECT * FROM tbl_master_diagnosa_perawat
					) b 
					ON a.code_diagnosa=b.code 
				WHERE a.id_kunjungan='$id_kunjungan'
				GROUP BY a.id
		");

		return $q->result();	
	}
	

	public function m_obat_lain($id_kunjungan)
	{
		$q = $this->db->query("
				SELECT * FROM `tbl_resep_obat_lain` WHERE id_kunjungan='$id_kunjungan'
		");

		return $q->result();	
	}


	public function m_obat($id_kunjungan)
	{
		$q = $this->db->query("
				SELECT a.*,b.* 
				FROM `tbl_resep` a 
				LEFT JOIN tbl_obat b ON a.id_obat=b.id_obat

				 WHERE id_kunjungan='$id_kunjungan'
		");

		return $q->result();	
	}
	

	public function ambil_obat_racikan($id_kunjungan)
	{
		$q = $this->db->query("SELECT GROUP_CONCAT(id) AS id,aturan_pakai,waktu_konsumsi,keterangan,pulv,id_kunjungan
								FROM `tbl_resep_racikan`
								WHERE id_kunjungan='$id_kunjungan'
								GROUP BY pulv
							");
		return $q->result();
	}

	public function ambil_obat_racikan_by_comma_id($comma_id)
	{
		$q = $this->db->query("SELECT a.jumlah,b.* 
									FROM `tbl_resep_racikan` a 
									LEFT JOIN tbl_obat b 
								ON a.id_obat=b.id_obat
								WHERE FIND_IN_SET(a.id,'$comma_id')
			");
		return $q->result();
	}
	
}
?>
