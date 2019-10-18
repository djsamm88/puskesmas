<?php 
if (!defined('BASEPATH'))exit('No direct script access allowed');

class M_obat_laporan extends CI_Model {
	
	function __construct() {
		parent::__construct();
	
		$this->load->helper('custom_func');
	}

	public function laporan_obat_lplpo($arr)
	{

		
		$bulan = $arr['bulan'];
		$tahun = $arr['tahun'];
		$kategori = $arr['kategori'];

		$x ="
								






SELECT 
    b.id_obat,
    b.obat,
    b.satuan,
    IFNULL(a.stok_awal,0) AS stok_awal,
    a.tgl_masuk,
    IFNULL(c.masuk,0) AS masuk,
    IFNULL(a.stok_awal,0)+IFNULL(c.masuk,0) AS persediaan,  
    IFNULL(d.keluar,0) AS pemakaian,
    (IFNULL(a.stok_awal,0)+IFNULL(c.masuk,0))-IFNULL(d.keluar,0) AS sisa_stok,
    (IFNULL(d.keluar,0))*1.5 AS stok_optimal,
    CASE WHEN ((IFNULL(d.keluar,0))*1.5)>(IFNULL(a.stok_awal,0)+IFNULL(c.masuk,0))-IFNULL(d.keluar,0) THEN 'Ajukan Perminataan'
    ELSE '-' END AS permintaan,
    SUM(IFNULL(DAK,0)) AS DAK,
	SUM(IFNULL(DAU,0)) AS DAU,
	SUM(IFNULL(ASKES,0)) AS ASKES,
	(SUM(IFNULL(DAK,0))+SUM(IFNULL(DAU,0))+SUM(IFNULL(ASKES,0))) AS jumlah

FROM tbl_obat b
LEFT JOIN
(
	/******* mengambil stok awal dibawah bulan yang dipilih **********/
	SELECT a.id_obat,
	IFNULL(a.masuk,0)-IFNULL(b.keluar,0) AS stok_awal,a.tgl_masuk
	FROM
	(
	SELECT a.id_obat,a.tgl_masuk,SUM(a.jumlah) AS masuk
	            FROM `tbl_obat_masuk` a 
	    		WHERE  EXTRACT(YEAR_MONTH FROM(a.tgl_masuk)) < ('$tahun$bulan')
	            GROUP BY a.id_obat
	)a 
	LEFT JOIN 
	(
		SELECT a.id_obat,a.tgl_keluar,SUM(a.jumlah) AS keluar FROM `tbl_obat_keluar` a 	        		
        WHERE  EXTRACT(YEAR_MONTH FROM(a.tgl_keluar)) < ('$tahun$bulan')
	    GROUP BY a.id_obat

	)b 
	ON a.id_obat=b.id_obat
    
)a

ON b.id_obat=a.id_obat

LEFT JOIN (
    SELECT a.id_obat,
		a.tgl_masuk,
        SUM(IFNULL(masuk,0)) AS masuk,
	SUM(IFNULL(DAK,0)) AS DAK,
	SUM(IFNULL(DAU,0)) AS DAU,
	SUM(IFNULL(ASKES,0)) AS ASKES

	FROM(
		SELECT 
	    a.id_obat,
	    a.masuk,
	    a.tgl_masuk,
	    CASE WHEN pemberian='DAK'   THEN masuk END AS 'DAK',
	    CASE WHEN pemberian='DAU'   THEN masuk END AS 'DAU',
	    CASE WHEN pemberian='ASKES'   THEN masuk END AS 'ASKES'

	    FROM(
	            SELECT a.id_obat,a.tgl_masuk,a.pemberian,SUM(a.jumlah) AS masuk
	            FROM `tbl_obat_masuk` a             
	            GROUP BY a.id_obat,YEAR(a.tgl_masuk), MONTH(a.tgl_masuk),a.pemberian
	        )a 
	)a
    WHERE 
    YEAR(a.tgl_masuk) = ('$tahun') AND MONTH(a.tgl_masuk) = ('$bulan')

	GROUP BY a.id_obat	
    )c 
    ON b.id_obat=c.id_obat
    
    
LEFT JOIN 
(
		SELECT a.id_obat,a.tgl_keluar,SUM(a.jumlah) AS keluar FROM `tbl_obat_keluar` a 	        			        		
		WHERE YEAR(a.tgl_keluar) = ('$tahun') AND MONTH(a.tgl_keluar) = ('$bulan')
	    GROUP BY a.id_obat
)d
ON b.id_obat=d.id_obat



WHERE b.kategori='$kategori'
GROUP BY b.id_obat


ORDER BY (IFNULL(a.stok_awal,0)+IFNULL(c.masuk,0))-IFNULL(d.keluar,0) DESC
						";

//echo $x;

		$q = $this->db->query($x);

		return $q->result();
	}
		
	public function laporan_obat($arr)
	{
		
		
		$bulan = $arr['bulan'];
		$tahun = $arr['tahun'];
		$kategori = $arr['kategori'];
		
		
		$q = $this->db->query("
		
		
					SELECT 	
						a.id_obat,a.obat,a.satuan,a.tgl_expire,a.stok,
						b.*,
						c.masuk
						
						FROM 
							tbl_obat a
							
						LEFT JOIN 
									(
									SELECT id_obat,
										SUM(h1) AS h1 ,
										SUM(h2) AS h2 ,
										SUM(h3) AS h3 ,
										SUM(h4) AS h4 ,
										SUM(h5) AS h5 ,
										SUM(h6) AS h6 ,
										SUM(h7) AS h7 ,
										SUM(h8) AS h8 ,
										SUM(h9) AS h9 ,
										SUM(h10) AS h10 ,
										SUM(h11) AS h11 ,
										SUM(h12) AS h12 ,
										SUM(h13) AS h13 ,
										SUM(h14) AS h14 ,
										SUM(h15) AS h15 ,
										SUM(h16) AS h16 ,
										SUM(h17) AS h17 ,
										SUM(h18) AS h18 ,
										SUM(h19) AS h19 ,
										SUM(h20) AS h20 ,
										SUM(h21) AS h21 ,
										SUM(h22) AS h22 ,
										SUM(h23) AS h23 ,
										SUM(h24) AS h24 ,
										SUM(h25) AS h25 ,
										SUM(h26) AS h26 ,
										SUM(h27) AS h27 ,
										SUM(h28) AS h28 ,
										SUM(h29) AS h29 ,
										SUM(h30) AS h30 ,
										SUM(h31) AS h31 
										
										FROM (
										
												
												SELECT 
													id_obat,
													tgl_keluar,
													CASE WHEN DAY(tgl_keluar)='1'   THEN SUM(jumlah) END AS 'h1'   ,
													CASE WHEN DAY(tgl_keluar)='2'   THEN SUM(jumlah) END AS 'h2'   ,
													CASE WHEN DAY(tgl_keluar)='3'   THEN SUM(jumlah) END AS 'h3'   ,
													CASE WHEN DAY(tgl_keluar)='4'   THEN SUM(jumlah) END AS 'h4'   ,
													CASE WHEN DAY(tgl_keluar)='5'   THEN SUM(jumlah) END AS 'h5'   ,
													CASE WHEN DAY(tgl_keluar)='6'   THEN SUM(jumlah) END AS 'h6'   ,
													CASE WHEN DAY(tgl_keluar)='7'   THEN SUM(jumlah) END AS 'h7'   ,
													CASE WHEN DAY(tgl_keluar)='8'   THEN SUM(jumlah) END AS 'h8'   ,
													CASE WHEN DAY(tgl_keluar)='9'   THEN SUM(jumlah) END AS 'h9'   ,
													CASE WHEN DAY(tgl_keluar)='10'   THEN SUM(jumlah) END AS 'h10'   ,
													CASE WHEN DAY(tgl_keluar)='11'   THEN SUM(jumlah) END AS 'h11'   ,
													CASE WHEN DAY(tgl_keluar)='12'   THEN SUM(jumlah) END AS 'h12'   ,
													CASE WHEN DAY(tgl_keluar)='13'   THEN SUM(jumlah) END AS 'h13'   ,
													CASE WHEN DAY(tgl_keluar)='14'   THEN SUM(jumlah) END AS 'h14'   ,
													CASE WHEN DAY(tgl_keluar)='15'   THEN SUM(jumlah) END AS 'h15'   ,
													CASE WHEN DAY(tgl_keluar)='16'   THEN SUM(jumlah) END AS 'h16'   ,
													CASE WHEN DAY(tgl_keluar)='17'   THEN SUM(jumlah) END AS 'h17'   ,
													CASE WHEN DAY(tgl_keluar)='18'   THEN SUM(jumlah) END AS 'h18'   ,
													CASE WHEN DAY(tgl_keluar)='19'   THEN SUM(jumlah) END AS 'h19'   ,
													CASE WHEN DAY(tgl_keluar)='20'   THEN SUM(jumlah) END AS 'h20'   ,
													CASE WHEN DAY(tgl_keluar)='21'   THEN SUM(jumlah) END AS 'h21'   ,
													CASE WHEN DAY(tgl_keluar)='22'   THEN SUM(jumlah) END AS 'h22'   ,
													CASE WHEN DAY(tgl_keluar)='23'   THEN SUM(jumlah) END AS 'h23'   ,
													CASE WHEN DAY(tgl_keluar)='24'   THEN SUM(jumlah) END AS 'h24'   ,
													CASE WHEN DAY(tgl_keluar)='25'   THEN SUM(jumlah) END AS 'h25'   ,
													CASE WHEN DAY(tgl_keluar)='26'   THEN SUM(jumlah) END AS 'h26'   ,
													CASE WHEN DAY(tgl_keluar)='27'   THEN SUM(jumlah) END AS 'h27'   ,
													CASE WHEN DAY(tgl_keluar)='28'   THEN SUM(jumlah) END AS 'h28'   ,
													CASE WHEN DAY(tgl_keluar)='29'   THEN SUM(jumlah) END AS 'h29'   ,
													CASE WHEN DAY(tgl_keluar)='30'   THEN SUM(jumlah) END AS 'h30'   ,
													CASE WHEN DAY(tgl_keluar)='31'   THEN SUM(jumlah) END AS 'h31'   							
												FROM `tbl_obat_keluar` 
												WHERE MONTH(tgl_keluar)='$bulan' AND YEAR(tgl_keluar)='$tahun'
												GROUP BY id_obat,tgl_keluar

										
											)x
										GROUP BY id_obat
										
									) b
							ON a.id_obat=b.id_obat
					
					LEFT JOIN 
					(
						SELECT id_obat,sum(jumlah) as masuk FROM `tbl_obat_masuk` 
						WHERE MONTH(tgl_masuk)='$bulan' AND YEAR(tgl_masuk)='$tahun'
						GROUP BY id_obat
					)c
					
						ON a.id_obat=c.id_obat
					

					WHERE a.kategori='$kategori'
					ORDER BY a.id_obat
							
							
			
			");
		return $q->result();
	}

	
}
?>
