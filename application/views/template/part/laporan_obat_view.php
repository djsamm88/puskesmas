<?php 
if($jenis=="pdf")
{
?>
<style type="text/css">
	
	#tbl_lap_obat {
	  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
	  border-collapse: collapse;
	  width: 100%;
	}

	#tbl_lap_obat td, #tbl_lap_obat th {
	  border: 1px solid #ddd;
	  padding: 8px;
	}

	#tbl_lap_obat tr:nth-child(even){background-color: #f2f2f2;}

	#tbl_lap_obat tr:hover {background-color: #ddd;}

	#tbl_lap_obat th {
	  padding-top: 12px;
	  padding-bottom: 12px;
	  text-align: left;
	  background-color: #4CAF50;
	  color: white;
	}
</style>
<?php	
}
?>

<b><center>LAPORAN BULANAN OBAT</center></b>
<br>
<center><?php echo bulanindo($bulan)?>  <?php echo $tahun?> </center>
<br>

<div class="table-responsive">
<table width="100%" class="table table-bordered" id="tbl_lap_obat">
		<thead>
		<tr>
			<th rowspan="2">NO</th>
			<th rowspan="2">NAMA OBAT</th>
			<th rowspan="2" width="100px">SATUAN</th>
			<th rowspan="2">STOK AWAL</th>
			<th rowspan="2">PENERIMAAN</th>
			<th rowspan="2">PERSEDIAAN</th>
			<th rowspan="2">TGL EXPIRE</th>
			<th colspan="31" align="center">TANGGAL</th>
			<th rowspan="2">TOTAL PAKAI</th>
			<th rowspan="2">OBAT ED</th>
			<th rowspan="2">TOTAL PENGELUARAN</th>
			<th rowspan="2">SISA AKHIR</th>
		</tr>
	

	<tr>
	    
		
							
							<td style="min-width:30px">1</td>
							<td style="min-width:30px">2</td>
							<td style="min-width:30px">3</td>
							<td style="min-width:30px">4</td>
							<td style="min-width:30px">5</td>
							<td style="min-width:30px">6</td>
							<td style="min-width:30px">7</td>
							<td style="min-width:30px">8</td>
							<td style="min-width:30px">9</td>
							<td style="min-width:30px">10</td>
							<td style="min-width:30px">11</td>
							<td style="min-width:30px">12</td>
							<td style="min-width:30px">13</td>
							<td style="min-width:30px">14</td>
							<td style="min-width:30px">15</td>
							<td style="min-width:30px">16</td>
							<td style="min-width:30px">17</td>
							<td style="min-width:30px">18</td>
							<td style="min-width:30px">19</td>
							<td style="min-width:30px">20</td>
							<td style="min-width:30px">21</td>
							<td style="min-width:30px">22</td>
							<td style="min-width:30px">23</td>
							<td style="min-width:30px">24</td>
							<td style="min-width:30px">25</td>
							<td style="min-width:30px">26</td>
							<td style="min-width:30px">27</td>
							<td style="min-width:30px">28</td>
							<td style="min-width:30px">29</td>
							<td style="min-width:30px">30</td>
							<td style="min-width:30px">31</td>							
	</tr>
	</thead>
	<tbody>
<?php
$no=0;

foreach ($obats as $get)
{
	
	
	$no++;
		
	
	$total_pakai  = $get->h1+
					$get->h2+
					$get->h3+
					$get->h4+
					$get->h5+
					$get->h6+
					$get->h7+
					$get->h8+
					$get->h9+
					$get->h10+
					$get->h11+
					$get->h12+
					$get->h13+
					$get->h14+
					$get->h15+
					$get->h16+
					$get->h17+
					$get->h18+
					$get->h19+
					$get->h20+
					$get->h21+
					$get->h22+
					$get->h23+
					$get->h24+
					$get->h25+
					$get->h26+
					$get->h27+
					$get->h28+
					$get->h29+
					$get->h30+
					$get->h31;
	
	$stok_awal 	= ($total_pakai+$get->stok)-$get->masuk;
	$persediaan = $stok_awal+$get->masuk;
    
	$expire =0;
	if($get->tgl_expire != '0000-00-00')
	{
		if(time() > strtotime($get->tgl_expire))
		{
			$expire +=$get->stok;
		}else{
			$expire =0;
		}
		
	}else{
		$expire =0;
	}
	
	$total_pengeluaran = $total_pakai + $expire;
	
	$sisa_akhir = $persediaan - $total_pengeluaran;
	
			
echo "<tr>
		<td>$no</td>
		<td>$get->obat</td>
		<td>$get->satuan</td>		
		<td>$stok_awal</td>		
		<td>$get->masuk</td>
		<td>$persediaan</td>
		<td>$get->tgl_expire</td>
		<td>$get->h1</td>
		<td>$get->h2</td>
		<td>$get->h3</td>
		<td>$get->h4</td>
		<td>$get->h5</td>
		<td>$get->h6</td>
		<td>$get->h7</td>
		<td>$get->h8</td>
		<td>$get->h9</td>		
		<td>$get->h10</td>
		<td>$get->h11</td>
		<td>$get->h12</td>
		<td>$get->h13</td>
		<td>$get->h14</td>
		<td>$get->h15</td>
		<td>$get->h16</td>
		<td>$get->h17</td>
		<td>$get->h18</td>
		<td>$get->h19</td>
		<td>$get->h20</td>
		<td>$get->h21</td>
		<td>$get->h22</td>
		<td>$get->h23</td>
		<td>$get->h24</td>
		<td>$get->h25</td>
		<td>$get->h26</td>
		<td>$get->h27</td>
		<td>$get->h28</td>
		<td>$get->h29</td>
		<td>$get->h30</td>
		<td>$get->h31</td>
		<td>$total_pakai</td>
		<td>$expire</td>
		<td>$total_pengeluaran</td>
		<td>$sisa_akhir</td>
	</tr>";
			
	
}

?>
</tbody>		
	
</table>
</div>
