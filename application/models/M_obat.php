<?php 
if (!defined('BASEPATH'))exit('No direct script access allowed');

class M_obat extends CI_Model {
		
		function __construct() {
			parent::__construct();
		
			$this->load->helper('custom_func');
		}

		
	public function data_by_id($id){
				
		$query = $this->db->query("SELECT * FROM tbl_obat  WHERE id_obat='$id'");
		$a = $query->result();
		return $a[0];
	}


		
	public function obat_by_id($id){
				
		$query = $this->db->query("SELECT * FROM tbl_obat  WHERE id_obat='$id'");
		$a = $query->result();
		return $a;
	}
	
	public function data_list()
	{
		$query = $this->db->query("SELECT * FROM tbl_obat");
		return $query->result();
	}
	
	public function data_obat_permintaan_by_id_pegawai($id_pegawai)
	{
		$q = $this->db->query("SELECT a.jumlah,a.surat_permintaan,a.tgl,a.status,b.stok,b.satuan,b.obat
									FROM tbl_obat_permintaan a 
									LEFT JOIN 
									tbl_obat b ON a.id_obat=b.id_obat
									WHERE a.id_pegawai='$id_pegawai'
									ORDER BY a.status ASC, a.tgl ASC
									");
		return $q->result();
	}


	public function data_obat_permintaan_history()
	{
				$q = $this->db->query("SELECT a.tgl,a.surat_permintaan,a.status,
											b.desa AS unit,b.nama
											FROM `tbl_obat_permintaan` a 
											LEFT JOIN(
											    SELECT a.*,
																				b.nama,
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
											    )b 
											    ON a.id_pegawai=b.id_pegawai									
									GROUP BY a.surat_permintaan									
									ORDER BY status ASC,a.tgl DESC
									");
		return $q->result();
	}



	public function data_permintaan_group_by_id_pegawai($id_pegawai)
	{
				$q = $this->db->query("SELECT a.tgl,a.surat_permintaan,a.status,
											b.desa AS unit,b.nama
											FROM `tbl_obat_permintaan` a 
											LEFT JOIN(
											    SELECT a.*,
																				b.nama,
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
											    )b 
											    ON a.id_pegawai=b.id_pegawai
									WHERE a.id_pegawai='$id_pegawai'
									GROUP BY a.surat_permintaan									
									ORDER BY status ASC,a.tgl DESC
									");
		return $q->result();
	}



	public function data_permintaan_group_status($status)
	{
				$q = $this->db->query("SELECT a.tgl,a.surat_permintaan,a.status,
											b.desa AS unit,b.nama
											FROM `tbl_obat_permintaan` a 
											LEFT JOIN(
											    SELECT a.*,
																				b.nama,
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
											    )b 
											    ON a.id_pegawai=b.id_pegawai									
										WHERE status='$status'
									GROUP BY a.surat_permintaan									
									ORDER BY status ASC,a.tgl DESC
									");
		return $q->result();
	}






	public function data_permintaan_by_group($surat_permintaan)
	{
				$q = $this->db->query("SELECT a.id,a.jumlah,a.surat_permintaan,a.tgl,a.status,c.stok,c.satuan,c.obat,
											a.jum_realisasi,a.ket_realisasi,a.id_obat,
											b.desa,b.nama,b.kecamatan,b.nip,b.pangkat,b.nama_unit
											FROM `tbl_obat_permintaan` a 
											LEFT JOIN(
											    SELECT a.*,
																				b.nama,b.nip,b.pangkat,
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
											    )b 
											    ON a.id_pegawai=b.id_pegawai
											 LEFT JOIN tbl_obat c 
											 ON a.id_obat=c.id_obat
									WHERE a.surat_permintaan='$surat_permintaan'											
									
									");
		return $q->result();
	}

	
	
	public function go_edit($arr_data,$id_obat)
	{
			
		$this->db->where('id_obat', $id_obat);
		$this->db->update('tbl_obat', $arr_data); 
		
	}
	
	
	public function go_simpan($arr_data)
	{
					
		$this->db->set($arr_data);
		$this->db->insert('tbl_obat');
		
		return $this->db->insert_id();
		
	}
	
	
	public function go_penerimaan($arr_data)
	{
					
		$this->db->set($arr_data);
		$this->db->insert('tbl_obat_masuk');
		
		return $this->db->insert_id();
		
	}
	
	
	
	public function hapus_list($id_obat)
	{
					
		$this->db->where('id_obat', $id_obat);
		$this->db->delete('tbl_obat'); 
		
	}
	

		
		
}
?>
