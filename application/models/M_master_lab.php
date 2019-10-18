<?php 
	if (!defined('BASEPATH'))exit('No direct script access allowed');

	class M_master_lab extends CI_Model {
		
		function __construct() {
			parent::__construct();
		
			$this->load->helper('custom_func');
		}



/**************************Master Lab**********************************/
public function all_master_lab()
	{
		$q= $this->db->query("SELECT * FROM master_lab");
		return $q->result();
	}
public function tambah_master_lab($serialize)
	{
		$this->db->set($serialize);
		$this->db->insert('master_lab');
	}


public function update_master_lab($serialize,$id_lab)
	{
		$this->db->set($serialize);
		$this->db->where('id_lab',$id_lab);
		$this->db->update('master_lab');
	}
public function by_id_master_desa($id_lab)
	{
		$q= $this->db->query("SELECT * FROM master_lab WHERE id_lab='$id_lab'");
		return $q->result();
	}
public function hapus_master_desa($id_lab)
	{
				
		$this->db->query("DELETE FROM master_lab WHERE id_lab='$id_lab'");
	}
}
?>