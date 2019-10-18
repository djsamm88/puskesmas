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
										WHERE MONTH(tgl_keluar)='2' AND YEAR(tgl_keluar)='2018'
										GROUP BY id_obat,tgl_keluar

						
							)x
						GROUP BY id_obat
						
					) b
			ON a.id_obat=b.id_obat
	
	LEFT JOIN 
	(
		SELECT id_obat,sum(jumlah) as masuk FROM `tbl_obat_masuk` 
		WHERE MONTH(tgl_masuk)='2' AND YEAR(tgl_masuk)='2018'
		GROUP BY id_obat
	)c
	
		ON a.id_obat=c.id_obat
	
	ORDER BY a.id_obat