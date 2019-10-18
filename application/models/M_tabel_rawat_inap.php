<?php 
	if (!defined('BASEPATH'))exit('No direct script access allowed');

	class M_tabel_rawat_inap extends CI_Model {
		
		function __construct() {
			parent::__construct();
		
			$this->load->helper('custom_func');
		}


	public function all()
	{
		$q= $this->db->query("SELECT * FROM tbl_rawat_inap");
		return $q->result();
	}



	public function tambah($serialize)
	{
		$this->db->set($serialize);
		$this->db->insert('tbl_rawat_inap');
	}
	public function hapus($id)
	{
				
		$this->db->query("DELETE FROM tbl_rawat_inap WHERE id='$id'");
	}

	public function get_edit($id)
	{
		$q= $this->db->query("SELECT * FROM tbl_rawat_inap WHERE id='$id'");
		return $q->result();
	}
	public function update($serialize,$id)
	{
		$this->db->set($serialize);
		$this->db->where('id',$id);
		$this->db->update('tbl_rawat_inap');
	}


}
?>
