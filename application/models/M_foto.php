<?php 
	if (!defined('BASEPATH'))exit('No direct script access allowed');

	class M_foto extends CI_Model {
		
		function __construct() {
			parent::__construct();
		
			$this->load->helper('custom_func');
		}


	public function all_foto($id_kunjungan)
	{
		$q= $this->db->query("SELECT * FROM tbl_foto WHERE id_kunjungan='$id_kunjungan'");
		return $q->result();
	}


	public function tambah($serialize)
	{
		$this->db->set($serialize);
		$this->db->insert('tbl_foto');
	}


	public function update($serialize,$id_kunjungan)
	{
		$this->db->set($serialize);
		$this->db->where('id_kunjungan',$id_kunjungan);
		$this->db->update('tbl_foto');
	}


	public function hapus($id_kunjungan)
	{
				
		$this->db->query("DELETE FROM tbl_foto WHERE id_kunjungan='$id_kunjungan'");
	}

	public function by_id_kunjungan($id_kunjungan)
	{
		$q= $this->db->query("SELECT * FROM tbl_foto WHERE id_kunjungan='$id_kunjungan'");
		return $q->result();
	}


}
?>
