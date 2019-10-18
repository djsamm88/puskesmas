SELECT 
								    a.id_obat,
								    b.obat,
								    b.satuan,
								    IFNULL(c.stok_awal,0) AS stok_awal,
								    IFNULL(a.masuk,0) AS masuk,
								    IFNULL(c.stok_awal,0)+IFNULL(a.masuk,0) AS persediaan,    
								    a.tgl_masuk,
								    IFNULL(d.keluar,0) AS pemakaian,
								    (IFNULL(c.stok_awal,0)+IFNULL(a.masuk,0))-IFNULL(d.keluar,0) AS sisa_stok,
								    (IFNULL(d.keluar,0))*1.5 AS stok_optimal,
								    CASE WHEN ((IFNULL(d.keluar,0))*1.5)>(IFNULL(c.stok_awal,0)+IFNULL(a.masuk,0))-IFNULL(d.keluar,0) THEN 'Ajukan Perminataan'
								    ELSE '-' END AS permintaan,
								    SUM(IFNULL(DAK,0)) AS DAK,
									SUM(IFNULL(DAU,0)) AS DAU,
									SUM(IFNULL(ASKES,0)) AS ASKES,
									(SUM(IFNULL(DAK,0))+SUM(IFNULL(DAU,0))+SUM(IFNULL(ASKES,0))) AS jumlah

								FROM 
								(
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
									GROUP BY a.id_obat
								    
								)a
								LEFT JOIN tbl_obat b
								ON a.id_obat=b.id_obat
								LEFT JOIN 
								(
									/******* mengambil stok awal dibawah bulan yang dipilih **********/
									SELECT a.id_obat,
									IFNULL(a.masuk,0)-IFNULL(b.keluar,0) AS stok_awal
									FROM
									(
									SELECT a.id_obat,a.tgl_masuk,SUM(a.jumlah) AS masuk
									            FROM `tbl_obat_masuk` a 
									    		WHERE YEAR(a.tgl_masuk) < ('$tahun') AND MONTH(a.tgl_masuk) < ('$bulan')  
									            GROUP BY a.id_obat,YEAR(a.tgl_masuk), MONTH(a.tgl_masuk)
									)a 
									LEFT JOIN 
									(
										SELECT a.id_obat,a.tgl_keluar,SUM(a.jumlah) AS keluar FROM `tbl_obat_keluar` a 	        		
									        		WHERE YEAR(a.tgl_keluar) < ('$tahun') AND MONTH(a.tgl_keluar) < ('$bulan')  
									    GROUP BY a.id_obat,YEAR(a.tgl_keluar), MONTH(a.tgl_keluar)

									)b 
									ON a.id_obat=b.id_obat
								)c
								ON a.id_obat=b.id_obat

								LEFT JOIN 
								(
										SELECT a.id_obat,a.tgl_keluar,SUM(a.jumlah) AS keluar FROM `tbl_obat_keluar` a 	        			        		
									    GROUP BY a.id_obat,YEAR(a.tgl_keluar), MONTH(a.tgl_keluar)
								)d
								ON a.id_obat=d.id_obat AND (YEAR(a.tgl_masuk)=YEAR(d.tgl_keluar)) AND (MONTH(a.tgl_masuk)=MONTH(d.tgl_keluar))




								WHERE 
								YEAR(a.tgl_masuk) = ('$tahun') AND MONTH(a.tgl_masuk) = ('$bulan')

								GROUP BY id_obat,YEAR(a.tgl_masuk), MONTH(a.tgl_masuk),YEAR(d.tgl_keluar),MONTH(d.tgl_keluar)