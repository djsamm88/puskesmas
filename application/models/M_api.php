<?php 
	if (!defined('BASEPATH'))exit('No direct script access allowed');

	class M_api extends CI_Model {
		
		function __construct() {
			parent::__construct();
		
			$this->load->helper('custom_func');
			
		}
	

	public function log_user()
	{
		
		$q = $this->db->query("SELECT * FROM tbl_log");
		return $q->result();
	}

	public function app()
	{
		$q = $this->db->query("SELECT * FROM tbl_app");
		return $q->result();
	}

	public function user()
	{
		$q = $this->db->query("SELECT * FROM tbl_pegawai");
		return $q->result();
	}

	public function pasien()
	{
		$q = $this->db->query("SELECT * FROM tbl_pasien");
		return $q->result();
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
	

}
?>
