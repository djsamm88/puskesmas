<?php 
	if (!defined('BASEPATH'))exit('No direct script access allowed');

	class M_diagnosa_perawat extends CI_Model {
		
		function __construct() {
			parent::__construct();
		
			$this->load->helper('custom_func');
		}


	public function all()
	{
		$q= $this->db->query("SELECT * FROM tbl_master_diagnosa_perawat");
		return $q->result();
	}



	public function tambah($serialize)
	{
		$this->db->set($serialize);
		$this->db->insert('tbl_master_diagnosa_perawat');
	}


	public function update($serialize,$id)
	{
		$this->db->set($serialize);
		$this->db->where('id',$id);
		$this->db->update('tbl_master_diagnosa_perawat');
	}


	public function hapus($id)
	{
				
		$this->db->query("DELETE FROM tbl_master_diagnosa_perawat WHERE id='$id'");
	}

	public function by_id($id)
	{
		$q= $this->db->query("SELECT * FROM tbl_master_diagnosa_perawat WHERE id='$id'");
		return $q->result();
	}
}
?>
