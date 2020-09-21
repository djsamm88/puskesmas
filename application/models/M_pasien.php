<?php 
	if (!defined('BASEPATH'))exit('No direct script access allowed');

	class M_pasien extends CI_Model {
		
		function __construct() {
			parent::__construct();
		
			$this->load->helper('custom_func');
		}
		
	
	public function data_by_id($id){
				
		$query = $this->db->query("SELECT a.*,FLOOR(DATEDIFF(CURRENT_DATE, a.tgl_lahir)/365) AS usia FROM tbl_pasien a WHERE no_pendaftaran='$id'");
		$a = $query->result();
		return $a[0];
	}


	
	public function data_list()
	{
		$query = $this->db->query("SELECT a.*,FLOOR(DATEDIFF(CURRENT_DATE, a.tgl_lahir)/365) AS usia FROM tbl_pasien a ORDER BY no_pendaftaran DESC");
		return $query->result();
	}
	
	
	
	
	public function go_edit($arr_data,$no_pendaftaran)
	{
			
		$this->db->where('no_pendaftaran', $no_pendaftaran);
		$this->db->update('tbl_pasien', $arr_data); 
		
	}
	
	
	public function go_simpan($arr_data)
	{
					
		$this->db->set($arr_data);
		$this->db->insert('tbl_pasien');
		
		return $this->db->insert_id();
		
	}
	
	
	public function hapus_list($no_pendaftaran)
	{
					
		$this->db->where('no_pendaftaran', $no_pendaftaran);
		$this->db->delete('tbl_pasien'); 
		
	}
	


	public function hapus_pasien($id)
	{
					
		$this->db->where('no_pendaftaran', $id);
		$this->db->delete('tbl_pasien'); 
		
	}
	
	
	
	
}
?>
