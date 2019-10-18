<?php 
	if (!defined('BASEPATH'))exit('No direct script access allowed');

	class M_home extends CI_Model {
		
		function __construct() {
			parent::__construct();
		
			$this->load->helper('custom_func');
		}
		

	public function set_timeline($serialize)
	{		
		$this->db->set($serialize);
		$this->db->insert('tbl_timeline');
		return $this->db->insert_id();
	}

	public function update_timeline($serialize,$id)
	{		
		$this->db->set($serialize);
		$this->db->where('id',$id);
		$this->db->update('tbl_timeline');		
	}



	public function data_app()
	{
		$q = $this->db->query("SELECT * FROM tbl_app ");
		return $q->result()[0];
	}

	public function tambah_poli($serialize)
	{
		$this->db->set($serialize);
		$this->db->insert('tbl_poli');
	}


	public function update_poli($serialize,$id)
	{
		$this->db->set($serialize);
		$this->db->where('id_poli',$id);
		$this->db->update('tbl_poli');
	}


	public function hapus_poli($id)
	{
				
		$this->db->query("DELETE FROM tbl_poli WHERE id_poli='$id'");
	}

	public function poli_by_id($id)
	{
		$q= $this->db->query("SELECT * FROM tbl_poli WHERE id_poli='$id'");
		return $q->result();
	}


	public function all_poli()
	{
		$q= $this->db->query("SELECT * FROM tbl_poli");
		return $q->result();
	}


	public function tambah_dokter($serialize)
	{
		$this->db->set($serialize);
		$this->db->insert('tbl_dokter');
	}


	public function update_dokter($serialize,$id)
	{
		$this->db->set($serialize);
		$this->db->where('id',$id);
		$this->db->update('tbl_dokter');
	}


	public function hapus_dokter($id)
	{
				
		$this->db->query("DELETE FROM tbl_dokter WHERE id='$id'");
	}

	public function dokter_by_id($id)
	{
		$q= $this->db->query("SELECT * FROM tbl_dokter WHERE id='$id'");
		return $q->result();
	}


	public function all_dokter()
	{
		$q= $this->db->query("SELECT * FROM tbl_dokter");
		return $q->result();
	}



	public function tambah_penyakit($serialize)
	{
		$this->db->set($serialize);
		$this->db->insert('tbl_master_diagnosa');
	}


	public function update_penyakit($serialize,$id)
	{
		$this->db->set($serialize);
		$this->db->where('id',$id);
		$this->db->update('tbl_master_diagnosa');
	}


	public function hapus_penyakit($id)
	{
				
		$this->db->query("DELETE FROM tbl_master_diagnosa WHERE id='$id'");
	}

	public function penyakit_by_id($id)
	{
		$q= $this->db->query("SELECT * FROM tbl_master_diagnosa WHERE id='$id'");
		return $q->result();
	}


	public function all_penyakit()
	{
		$q= $this->db->query("SELECT * FROM tbl_master_diagnosa");
		return $q->result();
	}




	public function edit_user($id){
				
		$query = $this->db->query("SELECT * FROM tbl_pegawai WHERE id_pegawai='$id'");
		return $query->result();
	}
	
	public function all_user()
	{
		$query = $this->db->query("SELECT * FROM tbl_pegawai");
		return $query->result();
	}
	
	public function dashboard()
	{
		$query = $this->db->query("SELECT umum,bpjs
										FROM (
										   SELECT COUNT(*) AS umum
										   FROM (
										   	SELECT a.*,b.no_bpjs FROM `tbl_kunjungan` a LEFT JOIN tbl_pasien b ON a.no_pendaftaran=b.no_pendaftaran
										   )a
										   WHERE LENGTH(no_bpjs) < 8 AND MONTH(tgl_kunjungan)=MONTH(NOW()) AND YEAR(tgl_kunjungan)=YEAR(NOW())
										) a 

										JOIN (
											
											SELECT COUNT(*) AS bpjs
											FROM (SELECT a.*,b.no_bpjs FROM `tbl_kunjungan` a LEFT JOIN tbl_pasien b ON a.no_pendaftaran=b.no_pendaftaran)a
											WHERE LENGTH(no_bpjs) > 8 AND MONTH(tgl_kunjungan)=MONTH(NOW()) AND YEAR(tgl_kunjungan)=YEAR(NOW())
										) b
								");
		$a = $query->result();
		return $a[0];
	}
	
	public function diagnosa_terbanyak()
	{
		$query = $this->db->query("
									SELECT a.*,b.diagnosa
									FROM 
									(
										SELECT COUNT(*) AS jumlah,code_diagnosa FROM `tbl_diagnosa`									
										WHERE code_diagnosa<>''
									    GROUP BY code_diagnosa ORDER BY COUNT(*) DESC LIMIT 10
									)a 
									LEFT JOIN (
										SELECT * FROM tbl_master_diagnosa
										UNION SELECT * FROM tbl_master_diagnosa_perawat
                                    ) b 
									ON a.code_diagnosa=b.code
																		GROUP BY code_diagnosa ORDER BY jumlah DESC LIMIT 10
								");
		$a = $query->result();
		return $a;
	}
	
	
	
	public function user_edit($arr_data,$id_pegawai)
	{
			
		$this->db->where('id_pegawai', $id_pegawai);
		$this->db->update('tbl_pegawai', $arr_data); 
		
	}
	
	
	public function go_simpan_pegawai($arr_data)
	{
					
		$this->db->set($arr_data);
		$this->db->insert('tbl_pegawai');
		
	}
	
	public function all_relasi_dokter()
	{
		$q = $this->db->query("SELECT 
									a.*,
									b.*,c.spesialis 
								FROM tbl_relasi_dokter a 
								INNER JOIN 
								tbl_pegawai b ON a.id_pegawai=b.id_pegawai
								INNER JOIN 
								tbl_dokter c ON a.id_spesialis=c.id
								ORDER BY a.tgl DESC
			");
		return $q->result();
	}


	public function relasi_dokter_by_id($id)
	{
		$q = $this->db->query("SELECT a.*,
									b.*,
									c.spesialis 
								FROM tbl_relasi_dokter a 
								INNER JOIN 
								tbl_pegawai b ON a.id_pegawai=b.id_pegawai
								INNER JOIN 
								tbl_dokter c ON a.id_spesialis=c.id
								
								WHERE a.id='$id'
			");
		return $q->result();
	}

	public function all_spesialis()
	{
		$q = $this->db->query("SELECT * FROM tbl_dokter");
		return $q->result();
	}



	public function all_relasi_lab()
	{
		$q = $this->db->query("SELECT 
									a.*,
									b.*
								FROM tbl_relasi_lab a 
								INNER JOIN 
								tbl_pegawai b ON a.id_pegawai=b.id_pegawai								
								ORDER BY a.tgl DESC
			");
		return $q->result();
	}


	public function relasi_lab_by_id($id)
	{
		$q = $this->db->query("SELECT 
									a.*,
									b.*
								FROM tbl_relasi_lab a 
								INNER JOIN 
								tbl_pegawai b ON a.id_pegawai=b.id_pegawai																
								WHERE a.id='$id'
			");
		return $q->result();
	}



	public function all_pegawai()
	{
		$q = $this->db->query("SELECT * FROM tbl_pegawai");
		return $q->result();
	}
	



	public function tambah_relasi_lab($arr_data)
	{
					
		$this->db->set($arr_data);
		$this->db->insert('tbl_relasi_lab');
		
	}


	public function update_relasi_lab($serialize,$id)
	{
		$this->db->set($serialize);
		$this->db->where('id',$id);
		$this->db->update('tbl_relasi_lab');
	}



	public function hapus_relasi_lab($id)
	{
		
		$this->db->where('id',$id);
		$this->db->delete('tbl_relasi_lab');
	}


	

	public function tambah_relasi_dokter($arr_data)
	{
					
		$this->db->set($arr_data);
		$this->db->insert('tbl_relasi_dokter');
		
	}


	public function update_relasi_dokter($serialize,$id)
	{
		$this->db->set($serialize);
		$this->db->where('id',$id);
		$this->db->update('tbl_relasi_dokter');
	}




	public function hapus_relasi_dokter($id)
	{
		
		$this->db->where('id',$id);
		$this->db->delete('tbl_relasi_dokter');
	}




	public function all_relasi_jabatan()
	{
		$q = $this->db->query("SELECT 
									a.*,
									b.*,c.jabatan
								FROM tbl_relasi_jabatan a 
								INNER JOIN 
								tbl_pegawai b ON a.id_pegawai=b.id_pegawai
								INNER JOIN 
								tbl_jabatan c ON a.id_jabatan=c.id_jabatan
								ORDER BY a.tgl DESC
			");
		return $q->result();
	}


	public function relasi_jabatan_by_id($id)
	{
		$q = $this->db->query("SELECT a.*,
									b.*,
									c.jabatan 
								FROM tbl_relasi_jabatan a 
								INNER JOIN 
								tbl_pegawai b ON a.id_pegawai=b.id_pegawai
								INNER JOIN 
								tbl_jabatan c ON a.id_jabatan=c.id_jabatan
								
								WHERE a.id='$id'
			");
		return $q->result();
	}

	public function all_jabatan()
	{
		$q = $this->db->query("SELECT * FROM tbl_jabatan");
		return $q->result();
	}


	public function tambah_relasi_jabatan($arr_data)
	{
					
		$this->db->set($arr_data);
		$this->db->insert('tbl_relasi_jabatan');
		
	}


	public function update_relasi_jabatan($serialize,$id)
	{
		$this->db->set($serialize);
		$this->db->where('id',$id);
		$this->db->update('tbl_relasi_jabatan');
	}



	public function hapus_relasi_jabatan($id)
	{
		
		$this->db->where('id',$id);
		$this->db->delete('tbl_relasi_jabatan');
	}



	public function all_kecamatan()
	{
		$q = $this->db->query("SELECT * FROM tbl_kecamatan");
		return $q->result();
	}

	public function kecamatan_by_id($id_kecamatan)
	{
		$q = $this->db->query("SELECT * FROM tbl_kecamatan WHERE id_kecamatan='$id_kecamatan'");
		return $q->result();	
	}

	public function insert_kecamatan($arr_data)
	{
					
		$this->db->set($arr_data);
		$this->db->insert('tbl_kecamatan');
		
	}

	public function update_kecamatan($serialize,$id_kecamatan)
	{
		$this->db->set($serialize);
		$this->db->where('id_kecamatan',$id_kecamatan);
		$this->db->update('tbl_kecamatan');
	}

	public function hapus_kecamatan($id_kecamatan)
	{
		
		$this->db->where('id_kecamatan',$id_kecamatan);
		$this->db->delete('tbl_kecamatan');
	}



	public function all_desa()
	{
		$q = $this->db->query("SELECT a.*,b.kecamatan 
								 FROM tbl_desa a
								 LEFT JOIN 
								 tbl_kecamatan b ON a.id_kecamatan=b.id_kecamatan
								 ORDER BY id_kecamatan DESC
								");
		return $q->result();
	}

	public function desa_by_id($id_desa)
	{
		$q = $this->db->query("SELECT * FROM tbl_desa WHERE id_desa='$id_desa'");
		return $q->result();	
	}

	public function desa_by_id_kecamatan($id_kecamatan)
	{
		$q = $this->db->query("
								SELECT a.*,b.kecamatan 
								 FROM tbl_desa a
								 LEFT JOIN 
								 tbl_kecamatan b ON a.id_kecamatan=b.id_kecamatan								 
								 WHERE a.id_kecamatan='$id_kecamatan'
								 ORDER BY a.id_kecamatan DESC			
							");
		return $q->result();	
	}

	public function insert_desa($arr_data)
	{
					
		$this->db->set($arr_data);
		$this->db->insert('tbl_desa');
		
	}

	public function update_desa($serialize,$id_desa)
	{
		$this->db->set($serialize);
		$this->db->where('id_desa',$id_desa);
		$this->db->update('tbl_desa');
	}

	public function hapus_desa($id_desa)
	{
		
		$this->db->where('id_desa',$id_desa);
		$this->db->delete('tbl_desa');
	}


	
	public function all_relasi_unit()
	{
		$q = $this->db->query("SELECT 
									a.*,
									b.*,
									c.kecamatan,c.desa
								FROM tbl_relasi_unit a 
								INNER JOIN 
								tbl_pegawai b ON a.id_pegawai=b.id_pegawai
								INNER JOIN 
								(
									SELECT a.*,b.kecamatan 
									 FROM tbl_desa a
									 LEFT JOIN 
									 tbl_kecamatan b ON a.id_kecamatan=b.id_kecamatan
									 ORDER BY id_kecamatan DESC
								)c
								ON a.id_desa=c.id_desa
								ORDER BY a.id_relasi_unit DESC
			");
		return $q->result();
	}


	public function relasi_unit_by_id($id_unit)
	{
		$q = $this->db->query("SELECT a.*,
									b.*,
									c.kecamatan,c.desa
								FROM tbl_relasi_unit a 
								INNER JOIN 
								tbl_pegawai b ON a.id_pegawai=b.id_pegawai
								INNER JOIN 
								(
									SELECT a.*,b.kecamatan 
									 FROM tbl_desa a
									 LEFT JOIN 
									 tbl_kecamatan b ON a.id_kecamatan=b.id_kecamatan
									 ORDER BY id_kecamatan DESC
								)
								c ON a.id_desa=c.id_desa
								
								WHERE a.id_relasi_unit='$id_unit'
			");
		return $q->result();
	}

	public function relasi_unit_by_id_pegawai($id_pegawai)
	{
		$q = $this->db->query("SELECT a.*,
									b.*,
									c.kecamatan,c.desa
								FROM tbl_relasi_unit a 
								INNER JOIN 
								tbl_pegawai b ON a.id_pegawai=b.id_pegawai
								INNER JOIN 
								(
									SELECT a.*,b.kecamatan 
									 FROM tbl_desa a
									 LEFT JOIN 
									 tbl_kecamatan b ON a.id_kecamatan=b.id_kecamatan
									 ORDER BY id_kecamatan DESC
								)
								c ON a.id_desa=c.id_desa
								
								WHERE b.id_pegawai='$id_pegawai'
			");
		return $q->result();
	}



	public function tambah_relasi_unit($arr_data)
	{
					
		$this->db->set($arr_data);
		$this->db->insert('tbl_relasi_unit');
		
	}


	public function update_relasi_unit($serialize,$id_unit)
	{
		$this->db->set($serialize);
		$this->db->where('id_relasi_unit',$id_unit);
		$this->db->update('tbl_relasi_unit');
	}



	public function hapus_relasi_unit($id_unit)
	{
		
		$this->db->where('id_relasi_unit',$id_unit);
		$this->db->delete('tbl_relasi_unit');
	}

	public function pegawai_by_id($id_pegawai)
	{
		$q = $this->db->query("SELECT * FROM `tbl_pegawai` WHERE id_pegawai='$id_pegawai'");
		$qq = $q->result();
		return $qq[0];
	}
	

}
?>
