<?php 
	if (!defined('BASEPATH'))exit('No direct script access allowed');

	class M_laporan extends CI_Model {
		
		function __construct() {
			parent::__construct();
		
			$this->load->helper('custom_func');
		}
		
	public function autocomplete_nama()
	{
		$q = $this->db->query("SELECT a.no_pendaftaran,b.nama FROM 
								(
									SELECT no_pendaftaran FROM `tbl_kunjungan`
									GROUP BY no_pendaftaran
								)a
								LEFT JOIN tbl_pasien b 
								ON a.no_pendaftaran=b.no_pendaftaran
								");
		return $q->result();
	}

	public function laporan_by_date($awal,$akhir,$no_pendaftaran=null)
	{
		if($no_pendaftaran==null)
		{
			$where = "";
		}else{
			$where = " AND a.no_pendaftaran='$no_pendaftaran'";
		}

		$q = $this->db->query("SELECT a.*,b.*,FLOOR(DATEDIFF(CURRENT_DATE, b.tgl_lahir)/365) AS usia, c.diagnosa,c.sakit,e.nama AS nama_dokter,f.obat,g.obat_lain
									FROM tbl_kunjungan a 
									LEFT JOIN tbl_pasien b ON a.no_pendaftaran=b.no_pendaftaran
									LEFT JOIN (
										SELECT GROUP_CONCAT(code_diagnosa) AS diagnosa, GROUP_CONCAT(sakit) AS sakit,id_kunjungan
											FROM 
											(											   
												SELECT a.code_diagnosa,a.id_kunjungan,b.diagnosa AS sakit
												FROM tbl_diagnosa a 
												LEFT JOIN 
												(
												    SELECT * FROM tbl_master_diagnosa
																		UNION SELECT * FROM tbl_master_diagnosa_perawat
												)b ON a.code_diagnosa=b.code
												    
											)a 
											GROUP BY id_kunjungan

									)
									c ON a.id_kunjungan=c.id_kunjungan
									
									LEFT JOIN (
									SELECT 											
											b.*,c.spesialis 
										FROM tbl_relasi_dokter a 
										INNER JOIN 
										tbl_pegawai b ON a.id_pegawai=b.id_pegawai
										INNER JOIN 
										tbl_dokter c ON a.id_spesialis=c.id
										GROUP BY b.id_pegawai
										ORDER BY a.tgl DESC
										) e ON e.id_pegawai=a.id_dokter
									LEFT JOIN 
									(
										SELECT GROUP_CONCAT(a.obat) AS obat, a.id_kunjungan
										FROM (
										SELECT a.id_kunjungan,b.obat FROM tbl_resep a 
										LEFT JOIN tbl_obat b ON a.id_obat=b.id_obat
										    ) a 
										    GROUP BY id_kunjungan
									)f ON a.id_kunjungan=f.id_kunjungan
									LEFT JOIN 
									(
										SELECT GROUP_CONCAT(nama_obat_lain) AS obat_lain,id_kunjungan
										FROM tbl_resep_obat_lain
										GROUP BY id_kunjungan
									)g ON a.id_kunjungan=g.id_kunjungan
									WHERE 
									(a.tgl_kunjungan BETWEEN '$awal' AND '$akhir') $where
								");
		return $q->result();
	}

	public function lb1($arr)
	{
					
		$bulan = $arr['bulan'];
		$tahun = $arr['tahun'];
		
		
		$q = $this->db->query("
								
								
								SELECT aaa.*,bbb.*

											FROM tbl_master_diagnosa aaa
											LEFT JOIN
											(

											SELECT 
												
												tgl_kunjungan,
												IF(code_diagnosa IS NULL or code_diagnosa = '', 'Lainnya', code_diagnosa) as code_diagnosa,
												IF(status_kunjungan IS NULL or status_kunjungan = '', 'BARU', status_kunjungan) as status_kunjungan,

												COALESCE(L07,0)    AS 'L07'   ,
												COALESCE(P07,0)    AS 'P07'   ,
												COALESCE(L830,0)   AS 'L830'  ,
												COALESCE(P830,0)   AS 'P830'  ,
												COALESCE(L301,0)   AS 'L301'  ,
												COALESCE(P301,0)   AS 'P301'  ,
												COALESCE(L14,0)    AS 'L14'   ,
												COALESCE(P14,0)    AS 'P14'   ,
												COALESCE(L59,0)    AS 'L59'   ,
												COALESCE(P59,0)    AS 'P59'   ,
												COALESCE(L1014,0)  AS 'L1014' ,
												COALESCE(P1014,0)  AS 'P1014' ,
												COALESCE(L1519,0)  AS 'L1519' ,
												COALESCE(P1519,0)  AS 'P1519' ,
												COALESCE(L2024,0)  AS 'L2024' ,
												COALESCE(P2024,0)  AS 'P2024' ,
												COALESCE(L2544,0)  AS 'L2544' ,
												COALESCE(P2544,0)  AS 'P2544' ,
												COALESCE(L4554,0)  AS 'L4554' ,
												COALESCE(P4554,0)  AS 'P4554' ,
												COALESCE(L5559,0)  AS 'L5559' ,
												COALESCE(P5559,0)  AS 'P5559' ,
												COALESCE(L6069,0)  AS 'L6069' ,
												COALESCE(P6069,0)  AS 'P6069' ,
												COALESCE(L70,0)    AS 'L70'   ,
												COALESCE(P70,0)    AS 'P70'
												

															FROM (

															SELECT code_diagnosa,status_kunjungan,tgl_kunjungan,
															
															SUM(L07)    AS 'L07'   ,
															SUM(P07)    AS 'P07'   ,
															SUM(L830)   AS 'L830'  ,
															SUM(P830)   AS 'P830'  ,
															SUM(L301)   AS 'L301'  ,
															SUM(P301)   AS 'P301'  ,
															SUM(L14)    AS 'L14'   ,
															SUM(P14)    AS 'P14'   ,
															SUM(L59)    AS 'L59'   ,
															SUM(P59)    AS 'P59'   ,
															SUM(L1014)  AS 'L1014' ,
															SUM(P1014)  AS 'P1014' ,
															SUM(L1519)  AS 'L1519' ,
															SUM(P1519)  AS 'P1519' ,
															SUM(L2024)  AS 'L2024' ,
															SUM(P2024)  AS 'P2024' ,
															SUM(L2544)  AS 'L2544' ,
															SUM(P2544)  AS 'P2544' ,
															SUM(L4554)  AS 'L4554' ,
															SUM(P4554)  AS 'P4554' ,
															SUM(L5559)  AS 'L5559' ,
															SUM(P5559)  AS 'P5559' ,
															SUM(L6069)  AS 'L6069' ,
															SUM(P6069)  AS 'P6069' ,
															SUM(L70)    AS 'L70'   ,
															SUM(P70)    AS 'P70'
															
															

															FROM (

																	SELECT *,
																		   
																			CASE WHEN kategori='L07'   THEN jumlah END AS 'L07'   ,
																			CASE WHEN kategori='P07'   THEN jumlah END AS 'P07'   ,
																			CASE WHEN kategori='L830'  THEN jumlah END AS 'L830'  ,
																			CASE WHEN kategori='P830'  THEN jumlah END AS 'P830'  ,
																			CASE WHEN kategori='L301'  THEN jumlah END AS 'L301'  ,
																			CASE WHEN kategori='P301'  THEN jumlah END AS 'P301'  ,
																			CASE WHEN kategori='L14'   THEN jumlah END AS 'L14'   ,
																			CASE WHEN kategori='P14'   THEN jumlah END AS 'P14'   ,
																			CASE WHEN kategori='L59'   THEN jumlah END AS 'L59'   ,
																			CASE WHEN kategori='P59'   THEN jumlah END AS 'P59'   ,
																			CASE WHEN kategori='L1014' THEN jumlah END AS 'L1014' ,
																			CASE WHEN kategori='P1014' THEN jumlah END AS 'P1014' ,
																			CASE WHEN kategori='L1519' THEN jumlah END AS 'L1519' ,
																			CASE WHEN kategori='P1519' THEN jumlah END AS 'P1519' ,
																			CASE WHEN kategori='L2024' THEN jumlah END AS 'L2024' ,
																			CASE WHEN kategori='P2024' THEN jumlah END AS 'P2024' ,
																			CASE WHEN kategori='L2544' THEN jumlah END AS 'L2544' ,
																			CASE WHEN kategori='P2544' THEN jumlah END AS 'P2544' ,
																			CASE WHEN kategori='L4554' THEN jumlah END AS 'L4554' ,
																			CASE WHEN kategori='P4554' THEN jumlah END AS 'P4554' ,
																			CASE WHEN kategori='L5559' THEN jumlah END AS 'L5559' ,
																			CASE WHEN kategori='P5559' THEN jumlah END AS 'P5559' ,
																			CASE WHEN kategori='L6069' THEN jumlah END AS 'L6069' ,
																			CASE WHEN kategori='P6069' THEN jumlah END AS 'P6069' ,
																			CASE WHEN kategori='L70'   THEN jumlah END AS 'L70'   ,
																			CASE WHEN kategori='P70'   THEN jumlah END AS 'P70'    
																			
																	FROM 
																			(
																			
																				SELECT 
																					
																					z.code_diagnosa,
																					x.tgl_lahir,
																					datediff(now(),x.tgl_lahir) AS usia_hari,
																					datediff(now(),x.tgl_lahir)/360 AS usia_tahun,
																					x.jenis_kelamin,
																					y.tgl_kunjungan,
																					y.status_kunjungan,
																					(CASE 
																						
																						WHEN((datediff(now(),x.tgl_lahir)>=1 AND datediff(now(),x.tgl_lahir)<=7) AND x.jenis_kelamin='L' ) THEN 'L07'
																						WHEN((datediff(now(),x.tgl_lahir)>=1 AND datediff(now(),x.tgl_lahir)<=7) AND x.jenis_kelamin='P' ) THEN 'P07'
																						WHEN((datediff(now(),x.tgl_lahir)>=8 AND datediff(now(),x.tgl_lahir)<=30) AND x.jenis_kelamin='L') THEN 'L830'	
																						WHEN((datediff(now(),x.tgl_lahir)>=8 AND datediff(now(),x.tgl_lahir)<=30) AND x.jenis_kelamin='P') THEN 'P830'	
																						WHEN((datediff(now(),x.tgl_lahir)>=30 AND datediff(now(),x.tgl_lahir)<=360) AND x.jenis_kelamin='L') THEN 'L301'
																						WHEN((datediff(now(),x.tgl_lahir)>=30 AND datediff(now(),x.tgl_lahir)<=360) AND x.jenis_kelamin='P') THEN 'P301'	
																						WHEN((datediff(now(),x.tgl_lahir)>=361 AND datediff(now(),x.tgl_lahir)<=1799) AND x.jenis_kelamin='L') THEN 'L14'
																						WHEN((datediff(now(),x.tgl_lahir)>=361 AND datediff(now(),x.tgl_lahir)<=1799) AND x.jenis_kelamin='P') THEN 'P14'
																						WHEN((datediff(now(),x.tgl_lahir)>=1800 AND datediff(now(),x.tgl_lahir)<=3599) AND x.jenis_kelamin='L') THEN 'L59'
																						WHEN((datediff(now(),x.tgl_lahir)>=1800 AND datediff(now(),x.tgl_lahir)<=3599) AND x.jenis_kelamin='P') THEN 'P59'
																						WHEN((datediff(now(),x.tgl_lahir)>=3600 AND datediff(now(),x.tgl_lahir)<=5399) AND x.jenis_kelamin='L') THEN 'L1014'
																						WHEN((datediff(now(),x.tgl_lahir)>=3600 AND datediff(now(),x.tgl_lahir)<=5399) AND x.jenis_kelamin='P') THEN 'P1014'
																						WHEN((datediff(now(),x.tgl_lahir)>=5400 AND datediff(now(),x.tgl_lahir)<=7199) AND x.jenis_kelamin='L') THEN 'L1519'
																						WHEN((datediff(now(),x.tgl_lahir)>=5400 AND datediff(now(),x.tgl_lahir)<=7199) AND x.jenis_kelamin='P') THEN 'P1519'
																						WHEN((datediff(now(),x.tgl_lahir)>=7200 AND datediff(now(),x.tgl_lahir)<=8999) AND x.jenis_kelamin='L') THEN 'L2024'
																						WHEN((datediff(now(),x.tgl_lahir)>=7200 AND datediff(now(),x.tgl_lahir)<=8999) AND x.jenis_kelamin='P') THEN 'P2024'
																						WHEN((datediff(now(),x.tgl_lahir)>=9000 AND datediff(now(),x.tgl_lahir)<=16199) AND x.jenis_kelamin='L') THEN 'L2544'
																						WHEN((datediff(now(),x.tgl_lahir)>=9000 AND datediff(now(),x.tgl_lahir)<=16199) AND x.jenis_kelamin='P') THEN 'P2544'
																						WHEN((datediff(now(),x.tgl_lahir)>=16200 AND datediff(now(),x.tgl_lahir)<=19799) AND x.jenis_kelamin='L') THEN 'L4554'
																						WHEN((datediff(now(),x.tgl_lahir)>=16200 AND datediff(now(),x.tgl_lahir)<=19799) AND x.jenis_kelamin='P') THEN 'P4554'
																						WHEN((datediff(now(),x.tgl_lahir)>=19800 AND datediff(now(),x.tgl_lahir)<=21599) AND x.jenis_kelamin='L') THEN 'L5559'
																						WHEN((datediff(now(),x.tgl_lahir)>=19800 AND datediff(now(),x.tgl_lahir)<=21599) AND x.jenis_kelamin='P') THEN 'P5559'
																						WHEN((datediff(now(),x.tgl_lahir)>=21600 AND datediff(now(),x.tgl_lahir)<=25199) AND x.jenis_kelamin='L') THEN 'L6069'
																						WHEN((datediff(now(),x.tgl_lahir)>=21600 AND datediff(now(),x.tgl_lahir)<=25199) AND x.jenis_kelamin='P') THEN 'P6069'
																						WHEN((datediff(now(),x.tgl_lahir)>=25200) AND x.jenis_kelamin='L') THEN 'L70'
																						WHEN((datediff(now(),x.tgl_lahir)>=25200) AND x.jenis_kelamin='P') THEN 'P70'
																						
																					 ELSE
																						  0 
																					 END) AS kategori,
																					 count(*) AS jumlah
																					 

																					FROM tbl_pasien x
																						INNER JOIN tbl_kunjungan y 
																						ON x.no_pendaftaran=y.no_pendaftaran
																						
																						INNER JOIN tbl_diagnosa z 
																						ON y.id_kunjungan=z.id_kunjungan
																					 
																					 WHERE MONTH(tgl_kunjungan)='$bulan' AND YEAR(tgl_kunjungan)='$tahun'
																					 GROUP BY code_diagnosa,jenis_kelamin,kategori,status_kunjungan
																					 
																					 
																					 ORDER BY code_diagnosa
																					 

																			
																			) yyy
																	
																	

															) xxx

															GROUP BY code_diagnosa
															
												)zzz
												
											)bbb

											ON aaa.code=bbb.code_diagnosa
											
											ORDER BY aaa.code
								
									
							");
		$data = $q->result();
		return $data;
	}
	
	
	public function laporan_all($arr)
	{
					
		$bulan = $arr['bulan'];
		$tahun = $arr['tahun'];
		$code  = $arr['code'];
		
		
		$q = $this->db->query("
								SELECT aaa.*,bbb.*

											FROM (SELECT desa AS all_desa FROM tbl_pasien GROUP BY desa) aaa
											LEFT JOIN
											(

											SELECT 
												
												tgl_kunjungan,desa,
												IF(code_diagnosa IS NULL or code_diagnosa = '', 'Lainnya', code_diagnosa) as code_diagnosa,
												IF(status_kunjungan IS NULL or status_kunjungan = '', 'BARU', status_kunjungan) as status_kunjungan,

												COALESCE(L07,0)    AS 'L07'   ,
												COALESCE(P07,0)    AS 'P07'   ,
												COALESCE(L830,0)   AS 'L830'  ,
												COALESCE(P830,0)   AS 'P830'  ,
												COALESCE(L301,0)   AS 'L301'  ,
												COALESCE(P301,0)   AS 'P301'  ,
												COALESCE(L14,0)    AS 'L14'   ,
												COALESCE(P14,0)    AS 'P14'   ,
												COALESCE(L59,0)    AS 'L59'   ,
												COALESCE(P59,0)    AS 'P59'   ,
												COALESCE(L1014,0)  AS 'L1014' ,
												COALESCE(P1014,0)  AS 'P1014' ,
												COALESCE(L1519,0)  AS 'L1519' ,
												COALESCE(P1519,0)  AS 'P1519' ,
												COALESCE(L2024,0)  AS 'L2024' ,
												COALESCE(P2024,0)  AS 'P2024' ,
												COALESCE(L2544,0)  AS 'L2544' ,
												COALESCE(P2544,0)  AS 'P2544' ,
												COALESCE(L4554,0)  AS 'L4554' ,
												COALESCE(P4554,0)  AS 'P4554' ,
												COALESCE(L5559,0)  AS 'L5559' ,
												COALESCE(P5559,0)  AS 'P5559' ,
												COALESCE(L6069,0)  AS 'L6069' ,
												COALESCE(P6069,0)  AS 'P6069' ,
												COALESCE(L70,0)    AS 'L70'   ,
												COALESCE(P70,0)    AS 'P70'
												

															FROM (

															SELECT code_diagnosa,status_kunjungan,tgl_kunjungan,desa,
															
															SUM(L07)    AS 'L07'   ,
															SUM(P07)    AS 'P07'   ,
															SUM(L830)   AS 'L830'  ,
															SUM(P830)   AS 'P830'  ,
															SUM(L301)   AS 'L301'  ,
															SUM(P301)   AS 'P301'  ,
															SUM(L14)    AS 'L14'   ,
															SUM(P14)    AS 'P14'   ,
															SUM(L59)    AS 'L59'   ,
															SUM(P59)    AS 'P59'   ,
															SUM(L1014)  AS 'L1014' ,
															SUM(P1014)  AS 'P1014' ,
															SUM(L1519)  AS 'L1519' ,
															SUM(P1519)  AS 'P1519' ,
															SUM(L2024)  AS 'L2024' ,
															SUM(P2024)  AS 'P2024' ,
															SUM(L2544)  AS 'L2544' ,
															SUM(P2544)  AS 'P2544' ,
															SUM(L4554)  AS 'L4554' ,
															SUM(P4554)  AS 'P4554' ,
															SUM(L5559)  AS 'L5559' ,
															SUM(P5559)  AS 'P5559' ,
															SUM(L6069)  AS 'L6069' ,
															SUM(P6069)  AS 'P6069' ,
															SUM(L70)    AS 'L70'   ,
															SUM(P70)    AS 'P70'
															
															

															FROM (

																	SELECT *,
																		   
																			CASE WHEN kategori='L07'   THEN jumlah END AS 'L07'   ,
																			CASE WHEN kategori='P07'   THEN jumlah END AS 'P07'   ,
																			CASE WHEN kategori='L830'  THEN jumlah END AS 'L830'  ,
																			CASE WHEN kategori='P830'  THEN jumlah END AS 'P830'  ,
																			CASE WHEN kategori='L301'  THEN jumlah END AS 'L301'  ,
																			CASE WHEN kategori='P301'  THEN jumlah END AS 'P301'  ,
																			CASE WHEN kategori='L14'   THEN jumlah END AS 'L14'   ,
																			CASE WHEN kategori='P14'   THEN jumlah END AS 'P14'   ,
																			CASE WHEN kategori='L59'   THEN jumlah END AS 'L59'   ,
																			CASE WHEN kategori='P59'   THEN jumlah END AS 'P59'   ,
																			CASE WHEN kategori='L1014' THEN jumlah END AS 'L1014' ,
																			CASE WHEN kategori='P1014' THEN jumlah END AS 'P1014' ,
																			CASE WHEN kategori='L1519' THEN jumlah END AS 'L1519' ,
																			CASE WHEN kategori='P1519' THEN jumlah END AS 'P1519' ,
																			CASE WHEN kategori='L2024' THEN jumlah END AS 'L2024' ,
																			CASE WHEN kategori='P2024' THEN jumlah END AS 'P2024' ,
																			CASE WHEN kategori='L2544' THEN jumlah END AS 'L2544' ,
																			CASE WHEN kategori='P2544' THEN jumlah END AS 'P2544' ,
																			CASE WHEN kategori='L4554' THEN jumlah END AS 'L4554' ,
																			CASE WHEN kategori='P4554' THEN jumlah END AS 'P4554' ,
																			CASE WHEN kategori='L5559' THEN jumlah END AS 'L5559' ,
																			CASE WHEN kategori='P5559' THEN jumlah END AS 'P5559' ,
																			CASE WHEN kategori='L6069' THEN jumlah END AS 'L6069' ,
																			CASE WHEN kategori='P6069' THEN jumlah END AS 'P6069' ,
																			CASE WHEN kategori='L70'   THEN jumlah END AS 'L70'   ,
																			CASE WHEN kategori='P70'   THEN jumlah END AS 'P70'    
																			
																	FROM 
																			(
																			
																				SELECT 
																					
																					z.code_diagnosa,
																					x.tgl_lahir,
																					datediff(now(),x.tgl_lahir) AS usia_hari,
																					datediff(now(),x.tgl_lahir)/360 AS usia_tahun,
																					x.jenis_kelamin,
																					y.tgl_kunjungan,
																					y.status_kunjungan,
																					x.desa,
																					(CASE 
																						
																						WHEN((datediff(now(),x.tgl_lahir)>=1 AND datediff(now(),x.tgl_lahir)<=7) AND x.jenis_kelamin='L' ) THEN 'L07'
																						WHEN((datediff(now(),x.tgl_lahir)>=1 AND datediff(now(),x.tgl_lahir)<=7) AND x.jenis_kelamin='P' ) THEN 'P07'
																						WHEN((datediff(now(),x.tgl_lahir)>=8 AND datediff(now(),x.tgl_lahir)<=30) AND x.jenis_kelamin='L') THEN 'L830'	
																						WHEN((datediff(now(),x.tgl_lahir)>=8 AND datediff(now(),x.tgl_lahir)<=30) AND x.jenis_kelamin='P') THEN 'P830'	
																						WHEN((datediff(now(),x.tgl_lahir)>=30 AND datediff(now(),x.tgl_lahir)<=360) AND x.jenis_kelamin='L') THEN 'L301'
																						WHEN((datediff(now(),x.tgl_lahir)>=30 AND datediff(now(),x.tgl_lahir)<=360) AND x.jenis_kelamin='P') THEN 'P301'	
																						WHEN((datediff(now(),x.tgl_lahir)>=361 AND datediff(now(),x.tgl_lahir)<=1799) AND x.jenis_kelamin='L') THEN 'L14'
																						WHEN((datediff(now(),x.tgl_lahir)>=361 AND datediff(now(),x.tgl_lahir)<=1799) AND x.jenis_kelamin='P') THEN 'P14'
																						WHEN((datediff(now(),x.tgl_lahir)>=1800 AND datediff(now(),x.tgl_lahir)<=3599) AND x.jenis_kelamin='L') THEN 'L59'
																						WHEN((datediff(now(),x.tgl_lahir)>=1800 AND datediff(now(),x.tgl_lahir)<=3599) AND x.jenis_kelamin='P') THEN 'P59'
																						WHEN((datediff(now(),x.tgl_lahir)>=3600 AND datediff(now(),x.tgl_lahir)<=5399) AND x.jenis_kelamin='L') THEN 'L1014'
																						WHEN((datediff(now(),x.tgl_lahir)>=3600 AND datediff(now(),x.tgl_lahir)<=5399) AND x.jenis_kelamin='P') THEN 'P1014'
																						WHEN((datediff(now(),x.tgl_lahir)>=5400 AND datediff(now(),x.tgl_lahir)<=7199) AND x.jenis_kelamin='L') THEN 'L1519'
																						WHEN((datediff(now(),x.tgl_lahir)>=5400 AND datediff(now(),x.tgl_lahir)<=7199) AND x.jenis_kelamin='P') THEN 'P1519'
																						WHEN((datediff(now(),x.tgl_lahir)>=7200 AND datediff(now(),x.tgl_lahir)<=8999) AND x.jenis_kelamin='L') THEN 'L2024'
																						WHEN((datediff(now(),x.tgl_lahir)>=7200 AND datediff(now(),x.tgl_lahir)<=8999) AND x.jenis_kelamin='P') THEN 'P2024'
																						WHEN((datediff(now(),x.tgl_lahir)>=9000 AND datediff(now(),x.tgl_lahir)<=16199) AND x.jenis_kelamin='L') THEN 'L2544'
																						WHEN((datediff(now(),x.tgl_lahir)>=9000 AND datediff(now(),x.tgl_lahir)<=16199) AND x.jenis_kelamin='P') THEN 'P2544'
																						WHEN((datediff(now(),x.tgl_lahir)>=16200 AND datediff(now(),x.tgl_lahir)<=19799) AND x.jenis_kelamin='L') THEN 'L4554'
																						WHEN((datediff(now(),x.tgl_lahir)>=16200 AND datediff(now(),x.tgl_lahir)<=19799) AND x.jenis_kelamin='P') THEN 'P4554'
																						WHEN((datediff(now(),x.tgl_lahir)>=19800 AND datediff(now(),x.tgl_lahir)<=21599) AND x.jenis_kelamin='L') THEN 'L5559'
																						WHEN((datediff(now(),x.tgl_lahir)>=19800 AND datediff(now(),x.tgl_lahir)<=21599) AND x.jenis_kelamin='P') THEN 'P5559'
																						WHEN((datediff(now(),x.tgl_lahir)>=21600 AND datediff(now(),x.tgl_lahir)<=25199) AND x.jenis_kelamin='L') THEN 'L6069'
																						WHEN((datediff(now(),x.tgl_lahir)>=21600 AND datediff(now(),x.tgl_lahir)<=25199) AND x.jenis_kelamin='P') THEN 'P6069'
																						WHEN((datediff(now(),x.tgl_lahir)>=25200) AND x.jenis_kelamin='L') THEN 'L70'
																						WHEN((datediff(now(),x.tgl_lahir)>=25200) AND x.jenis_kelamin='P') THEN 'P70'
																						
																					 ELSE
																						  0 
																					 END) AS kategori,
																					 count(*) AS jumlah
																					 

																					FROM tbl_pasien x
																						INNER JOIN tbl_kunjungan y 
																						ON x.no_pendaftaran=y.no_pendaftaran
																						
																						INNER JOIN tbl_diagnosa z 
																						ON y.id_kunjungan=z.id_kunjungan
																					 
																					 WHERE MONTH(tgl_kunjungan)='$bulan' AND YEAR(tgl_kunjungan)='$tahun' AND code_diagnosa='$code'
																					 GROUP BY code_diagnosa,jenis_kelamin,kategori,status_kunjungan,desa
																					 
																					 
																					 ORDER BY code_diagnosa
																					 

																			
																			) yyy
																	
																	

															) xxx

															GROUP BY desa
															
												)zzz
												
											)bbb

											ON aaa.all_desa=bbb.desa
											
											
											ORDER BY aaa.all_desa
									
							");
		$data = $q->result();
		return $data;
	}
	
	
	
	public function laporan_penumonia($arr)
	{
					
		$bulan = $arr['bulan'];
		$tahun = $arr['tahun'];
		$code1  = $arr['code1'];
		$code2  = $arr['code2'];
		
		
		$q = $this->db->query("
								SELECT aaa.*,bbb.*

											FROM (SELECT desa AS all_desa FROM tbl_pasien GROUP BY desa) aaa
											LEFT JOIN
											(

											SELECT 
												
												tgl_kunjungan,desa,
												IF(code_diagnosa IS NULL or code_diagnosa = '', 'Lainnya', code_diagnosa) as code_diagnosa,
												IF(status_kunjungan IS NULL or status_kunjungan = '', 'BARU', status_kunjungan) as status_kunjungan,

												COALESCE(L07,0)    AS 'L07'   ,
												COALESCE(P07,0)    AS 'P07'   ,
												COALESCE(L830,0)   AS 'L830'  ,
												COALESCE(P830,0)   AS 'P830'  ,
												COALESCE(L301,0)   AS 'L301'  ,
												COALESCE(P301,0)   AS 'P301'  ,
												COALESCE(L14,0)    AS 'L14'   ,
												COALESCE(P14,0)    AS 'P14'   ,
												COALESCE(L59,0)    AS 'L59'   ,
												COALESCE(P59,0)    AS 'P59'   ,
												COALESCE(L1014,0)  AS 'L1014' ,
												COALESCE(P1014,0)  AS 'P1014' ,
												COALESCE(L1519,0)  AS 'L1519' ,
												COALESCE(P1519,0)  AS 'P1519' ,
												COALESCE(L2024,0)  AS 'L2024' ,
												COALESCE(P2024,0)  AS 'P2024' ,
												COALESCE(L2544,0)  AS 'L2544' ,
												COALESCE(P2544,0)  AS 'P2544' ,
												COALESCE(L4554,0)  AS 'L4554' ,
												COALESCE(P4554,0)  AS 'P4554' ,
												COALESCE(L5559,0)  AS 'L5559' ,
												COALESCE(P5559,0)  AS 'P5559' ,
												COALESCE(L6069,0)  AS 'L6069' ,
												COALESCE(P6069,0)  AS 'P6069' ,
												COALESCE(L70,0)    AS 'L70'   ,
												COALESCE(P70,0)    AS 'P70'
												

															FROM (

															SELECT code_diagnosa,status_kunjungan,tgl_kunjungan,desa,
															
															SUM(L07)    AS 'L07'   ,
															SUM(P07)    AS 'P07'   ,
															SUM(L830)   AS 'L830'  ,
															SUM(P830)   AS 'P830'  ,
															SUM(L301)   AS 'L301'  ,
															SUM(P301)   AS 'P301'  ,
															SUM(L14)    AS 'L14'   ,
															SUM(P14)    AS 'P14'   ,
															SUM(L59)    AS 'L59'   ,
															SUM(P59)    AS 'P59'   ,
															SUM(L1014)  AS 'L1014' ,
															SUM(P1014)  AS 'P1014' ,
															SUM(L1519)  AS 'L1519' ,
															SUM(P1519)  AS 'P1519' ,
															SUM(L2024)  AS 'L2024' ,
															SUM(P2024)  AS 'P2024' ,
															SUM(L2544)  AS 'L2544' ,
															SUM(P2544)  AS 'P2544' ,
															SUM(L4554)  AS 'L4554' ,
															SUM(P4554)  AS 'P4554' ,
															SUM(L5559)  AS 'L5559' ,
															SUM(P5559)  AS 'P5559' ,
															SUM(L6069)  AS 'L6069' ,
															SUM(P6069)  AS 'P6069' ,
															SUM(L70)    AS 'L70'   ,
															SUM(P70)    AS 'P70'
															
															

															FROM (

																	SELECT *,
																		   
																			CASE WHEN kategori='L07'   THEN jumlah END AS 'L07'   ,
																			CASE WHEN kategori='P07'   THEN jumlah END AS 'P07'   ,
																			CASE WHEN kategori='L830'  THEN jumlah END AS 'L830'  ,
																			CASE WHEN kategori='P830'  THEN jumlah END AS 'P830'  ,
																			CASE WHEN kategori='L301'  THEN jumlah END AS 'L301'  ,
																			CASE WHEN kategori='P301'  THEN jumlah END AS 'P301'  ,
																			CASE WHEN kategori='L14'   THEN jumlah END AS 'L14'   ,
																			CASE WHEN kategori='P14'   THEN jumlah END AS 'P14'   ,
																			CASE WHEN kategori='L59'   THEN jumlah END AS 'L59'   ,
																			CASE WHEN kategori='P59'   THEN jumlah END AS 'P59'   ,
																			CASE WHEN kategori='L1014' THEN jumlah END AS 'L1014' ,
																			CASE WHEN kategori='P1014' THEN jumlah END AS 'P1014' ,
																			CASE WHEN kategori='L1519' THEN jumlah END AS 'L1519' ,
																			CASE WHEN kategori='P1519' THEN jumlah END AS 'P1519' ,
																			CASE WHEN kategori='L2024' THEN jumlah END AS 'L2024' ,
																			CASE WHEN kategori='P2024' THEN jumlah END AS 'P2024' ,
																			CASE WHEN kategori='L2544' THEN jumlah END AS 'L2544' ,
																			CASE WHEN kategori='P2544' THEN jumlah END AS 'P2544' ,
																			CASE WHEN kategori='L4554' THEN jumlah END AS 'L4554' ,
																			CASE WHEN kategori='P4554' THEN jumlah END AS 'P4554' ,
																			CASE WHEN kategori='L5559' THEN jumlah END AS 'L5559' ,
																			CASE WHEN kategori='P5559' THEN jumlah END AS 'P5559' ,
																			CASE WHEN kategori='L6069' THEN jumlah END AS 'L6069' ,
																			CASE WHEN kategori='P6069' THEN jumlah END AS 'P6069' ,
																			CASE WHEN kategori='L70'   THEN jumlah END AS 'L70'   ,
																			CASE WHEN kategori='P70'   THEN jumlah END AS 'P70'    
																			
																	FROM 
																			(
																			
																				SELECT 
																					
																					z.code_diagnosa,
																					x.tgl_lahir,
																					datediff(now(),x.tgl_lahir) AS usia_hari,
																					datediff(now(),x.tgl_lahir)/360 AS usia_tahun,
																					x.jenis_kelamin,
																					y.tgl_kunjungan,
																					y.status_kunjungan,
																					x.desa,
																					(CASE 
																						
																						WHEN((datediff(now(),x.tgl_lahir)>=1 AND datediff(now(),x.tgl_lahir)<=7) AND x.jenis_kelamin='L' ) THEN 'L07'
																						WHEN((datediff(now(),x.tgl_lahir)>=1 AND datediff(now(),x.tgl_lahir)<=7) AND x.jenis_kelamin='P' ) THEN 'P07'
																						WHEN((datediff(now(),x.tgl_lahir)>=8 AND datediff(now(),x.tgl_lahir)<=30) AND x.jenis_kelamin='L') THEN 'L830'	
																						WHEN((datediff(now(),x.tgl_lahir)>=8 AND datediff(now(),x.tgl_lahir)<=30) AND x.jenis_kelamin='P') THEN 'P830'	
																						WHEN((datediff(now(),x.tgl_lahir)>=30 AND datediff(now(),x.tgl_lahir)<=360) AND x.jenis_kelamin='L') THEN 'L301'
																						WHEN((datediff(now(),x.tgl_lahir)>=30 AND datediff(now(),x.tgl_lahir)<=360) AND x.jenis_kelamin='P') THEN 'P301'	
																						WHEN((datediff(now(),x.tgl_lahir)>=361 AND datediff(now(),x.tgl_lahir)<=1799) AND x.jenis_kelamin='L') THEN 'L14'
																						WHEN((datediff(now(),x.tgl_lahir)>=361 AND datediff(now(),x.tgl_lahir)<=1799) AND x.jenis_kelamin='P') THEN 'P14'
																						WHEN((datediff(now(),x.tgl_lahir)>=1800 AND datediff(now(),x.tgl_lahir)<=3599) AND x.jenis_kelamin='L') THEN 'L59'
																						WHEN((datediff(now(),x.tgl_lahir)>=1800 AND datediff(now(),x.tgl_lahir)<=3599) AND x.jenis_kelamin='P') THEN 'P59'
																						WHEN((datediff(now(),x.tgl_lahir)>=3600 AND datediff(now(),x.tgl_lahir)<=5399) AND x.jenis_kelamin='L') THEN 'L1014'
																						WHEN((datediff(now(),x.tgl_lahir)>=3600 AND datediff(now(),x.tgl_lahir)<=5399) AND x.jenis_kelamin='P') THEN 'P1014'
																						WHEN((datediff(now(),x.tgl_lahir)>=5400 AND datediff(now(),x.tgl_lahir)<=7199) AND x.jenis_kelamin='L') THEN 'L1519'
																						WHEN((datediff(now(),x.tgl_lahir)>=5400 AND datediff(now(),x.tgl_lahir)<=7199) AND x.jenis_kelamin='P') THEN 'P1519'
																						WHEN((datediff(now(),x.tgl_lahir)>=7200 AND datediff(now(),x.tgl_lahir)<=8999) AND x.jenis_kelamin='L') THEN 'L2024'
																						WHEN((datediff(now(),x.tgl_lahir)>=7200 AND datediff(now(),x.tgl_lahir)<=8999) AND x.jenis_kelamin='P') THEN 'P2024'
																						WHEN((datediff(now(),x.tgl_lahir)>=9000 AND datediff(now(),x.tgl_lahir)<=16199) AND x.jenis_kelamin='L') THEN 'L2544'
																						WHEN((datediff(now(),x.tgl_lahir)>=9000 AND datediff(now(),x.tgl_lahir)<=16199) AND x.jenis_kelamin='P') THEN 'P2544'
																						WHEN((datediff(now(),x.tgl_lahir)>=16200 AND datediff(now(),x.tgl_lahir)<=19799) AND x.jenis_kelamin='L') THEN 'L4554'
																						WHEN((datediff(now(),x.tgl_lahir)>=16200 AND datediff(now(),x.tgl_lahir)<=19799) AND x.jenis_kelamin='P') THEN 'P4554'
																						WHEN((datediff(now(),x.tgl_lahir)>=19800 AND datediff(now(),x.tgl_lahir)<=21599) AND x.jenis_kelamin='L') THEN 'L5559'
																						WHEN((datediff(now(),x.tgl_lahir)>=19800 AND datediff(now(),x.tgl_lahir)<=21599) AND x.jenis_kelamin='P') THEN 'P5559'
																						WHEN((datediff(now(),x.tgl_lahir)>=21600 AND datediff(now(),x.tgl_lahir)<=25199) AND x.jenis_kelamin='L') THEN 'L6069'
																						WHEN((datediff(now(),x.tgl_lahir)>=21600 AND datediff(now(),x.tgl_lahir)<=25199) AND x.jenis_kelamin='P') THEN 'P6069'
																						WHEN((datediff(now(),x.tgl_lahir)>=25200) AND x.jenis_kelamin='L') THEN 'L70'
																						WHEN((datediff(now(),x.tgl_lahir)>=25200) AND x.jenis_kelamin='P') THEN 'P70'
																						
																					 ELSE
																						  0 
																					 END) AS kategori,
																					 count(*) AS jumlah
																					 

																					FROM tbl_pasien x
																						INNER JOIN tbl_kunjungan y 
																						ON x.no_pendaftaran=y.no_pendaftaran
																						
																						INNER JOIN tbl_diagnosa z 
																						ON y.id_kunjungan=z.id_kunjungan
																					 
																					 WHERE MONTH(tgl_kunjungan)='$bulan' AND YEAR(tgl_kunjungan)='$tahun' AND (code_diagnosa='$code1' OR code_diagnosa='$code2')
																					 GROUP BY code_diagnosa,jenis_kelamin,kategori,status_kunjungan,desa
																					 
																					 
																					 ORDER BY code_diagnosa
																					 

																			
																			) yyy
																	
																	

															) xxx

															GROUP BY desa
															
												)zzz
												
											)bbb

											ON aaa.all_desa=bbb.desa
											
											
											ORDER BY aaa.all_desa
									
							");
		$data = $q->result();
		return $data;
	}
	
	
	
	public function tbl_master_diagnosa($arr)
	{
		
		$bulan = $arr['bulan'];
		$tahun = $arr['tahun'];
		
		$q = $this->db->query("SELECT * FROM tbl_master_diagnosa");
		
		return $q->result();
	}
	
	public function hasil($arr)
	{
		
		$bulan = $arr['bulan'];
		$tahun = $arr['tahun'];
		
		$q = $this->db->query("SELECT 
								z.code_diagnosa,
								x.tgl_lahir,
								datediff(now(),x.tgl_lahir) AS usia_hari,
								datediff(now(),x.tgl_lahir)/360 AS usia_tahun,
								x.jenis_kelamin,
								y.tgl_kunjungan,
								y.status_kunjungan,
                                MONTH(y.tgl_kunjungan) AS bulan,
                                YEAR(y.tgl_kunjungan) AS tahun
                                


								FROM tbl_pasien x
									INNER JOIN tbl_kunjungan y 
									ON x.no_pendaftaran=y.no_pendaftaran
									
									INNER JOIN tbl_diagnosa z 
									ON y.id_kunjungan=z.id_kunjungan
								 WHERE MONTH(y.tgl_kunjungan)='$bulan' AND YEAR(y.tgl_kunjungan)='$tahun'
								 ORDER BY code_diagnosa");
		
		return $q->result();
	}
	
	
	
}
?>
