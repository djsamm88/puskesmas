

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
	 
     
	 GROUP BY code_diagnosa,jenis_kelamin,kategori,status_kunjungan
	 
     
	 ORDER BY code_diagnosa
	 
