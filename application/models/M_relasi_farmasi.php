<?php 
	if (!defined('BASEPATH'))exit('No direct script access allowed');

	class M_relasi_farmasi extends CI_Model {
		
		function __construct() {
			parent::__construct();
		
			$this->load->helper('custom_func');
		}
		


	public function all_relasi_farmasi()
	{
		$q = $this->db->query("SELECT 
									a.*,
									b.*
								FROM tbl_relasi_farmasi a 
								INNER JOIN 
								tbl_pegawai b ON a.id_pegawai=b.id_pegawai								
								ORDER BY a.tgl DESC
			");
		return $q->result();
	}


	public function relasi_farmasi_by_id($id)
	{
		$q = $this->db->query("SELECT 
									a.*,
									b.*
								FROM tbl_relasi_farmasi a 
								INNER JOIN 
								tbl_pegawai b ON a.id_pegawai=b.id_pegawai																
								WHERE a.id='$id'
			");
		return $q->result();
	}



	public function tambah_relasi_farmasi($arr_data)
	{
					
		$this->db->set($arr_data);
		$this->db->insert('tbl_relasi_farmasi');
		
	}


	public function update_relasi_farmasi($serialize,$id)
	{
		$this->db->set($serialize);
		$this->db->where('id',$id);
		$this->db->update('tbl_relasi_farmasi');
	}



	public function hapus_relasi_farmasi($id)
	{
		
		$this->db->where('id',$id);
		$this->db->delete('tbl_relasi_farmasi');
	}


	

}
?>
