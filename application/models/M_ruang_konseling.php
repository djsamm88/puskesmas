<?php 
	if (!defined('BASEPATH'))exit('No direct script access allowed');

	class M_ruang_konseling extends CI_Model {
		
		function __construct() {
			parent::__construct();
		
			$this->load->helper('custom_func');
		}


	
/**********************************Master Konseling*****************************/
public function all_ruang_konse()
	{
		$q= $this->db->query("SELECT * FROM master_ruang_konseling");
		return $q->result();
	}
public function tambah_ruang_konse($serialize)
	{
		$this->db->set($serialize);
		$this->db->insert('master_ruang_konseling');
	}
public function update_ruang_konse($serialize,$id)
	{
		$this->db->set($serialize);
		$this->db->where('id',$id);
		$this->db->update('master_ruang_konseling');
	}
public function by_id_ruang_konse($id)
	{
		$q= $this->db->query("SELECT * FROM master_ruang_konseling WHERE id='$id'");
		return $q->result();
	}
public function hapus_ruang_konse($id)
	{
				
		$this->db->query("DELETE FROM master_ruang_konseling WHERE id='$id'");
	}

}
?>