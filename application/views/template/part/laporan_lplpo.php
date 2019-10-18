<style type="text/css">
	
	.tbl_conf,#tbl_lap_obat {
	  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
	  border-collapse: collapse;
	  width: 100%;
	  font-size: 11px;
	}

	#tbl_lap_obat td, #tbl_lap_obat th {
	  border: 1px solid #ddd;
	  padding: 5px;
	}

	#tbl_lap_obat tr:nth-child(even){background-color: #f2f2f2;}

	#tbl_lap_obat tr:hover {background-color: #ddd;}

	#tbl_lap_obat th {
	  padding-top: 10px;
	  padding-bottom: 10px;
	  text-align: left;
	  background-color: #4CAF50;
	  color: white;
	}
</style>

<h4 style="text-align: center;"> LAPORAN PENERIMAAN DAN PEMAKAIAN OBAT - <?php echo strtoupper($kategori)?><br>
	(LPLPO)
</h4>
<br>

<table width="100%" class="tbl_conf">
	<tr>
		<td width="70%">
			<table>
				<tr>
					<td>PUSKESMAS</td><td>: <?php echo @$app->nama_app?></td>
				</tr>
				<tr>
					<td>KECAMATAN</td><td>: <?php echo @$app->app_kec?></td>
				</tr>
				<tr>
					<td>KABUPATEN</td><td>: <?php echo @$app->app_kab?></td>
				</tr>
				<tr>
					<td>PROVINSI</td><td>: <?php echo @$app->app_prov?></td>
				</tr>
			</table>
		</td>
		<td width="30%">
		<table class="tbl_conf">
				<tr>
					<td>TGL/BULAN</td><td>: <?php echo date('d')." ";echo STRTOUPPER(bulanindo($bulan))?> </td>
				</tr>
				<tr>
					<td>TAHUN</td><td>:  <?php echo $tahun?> </td>
				</tr>
				
			</table>
		</td>
	</tr>
</table>

<div class="table-responsive">
<table width="100%" class="table table-bordered" id="tbl_lap_obat">
		<thead>
		<tr>
			<th rowspan="2">NO</th>
			<th rowspan="2" width="250px">NAMA OBAT</th>
			<th rowspan="2" width="100px">SATUAN</th>
			<th rowspan="2">STOK AWAL</th>
			<th rowspan="2">PENERIMAAN</th>
			<th rowspan="2">PERSEDIAAN</th>			
			<th rowspan="2">PEMAKAIAN</th>			
			<th rowspan="2">SISA STOK</th>			
			<th rowspan="2">STOK OPTIMAL</th>			
			<th rowspan="2">PERMINTAAN</th>			
			<th colspan="4" align="center">PEMBERIAN</th>
			<th rowspan="2">KETERANGAN</th>			
		</tr>
	

	<tr>
	    
		
							
							<td style="min-width:30px">DAU</td>
							<td style="min-width:30px">DAK</td>
							<td style="min-width:30px">ASKES</td>
							<td style="min-width:30px">JUMLAH</td>
													
	</tr>
	</thead>
	<tbody>
<?php
$no=0;

foreach ($obats as $key)
{
	$no++;
		
	echo "
	<tr>
		<td>$no</td>
		<td>$key->obat</td>
		<td>$key->satuan</td>
		<td>$key->stok_awal</td>
		<td>$key->masuk</td>
		<td>$key->persediaan</td>		
		<td>$key->pemakaian</td>
		<td>$key->sisa_stok</td>
		<td>$key->stok_optimal</td>
		<td>$key->permintaan</td>
		<td>$key->DAK</td>
		<td>$key->DAU</td>
		<td>$key->ASKES</td>
		<td>$key->jumlah</td>
		<td>-</td>
	</tr>
	";
}

?>
</tbody>		
	
</table>
</div>

<?php
$nama_pengelola="";
$nip_pengelola="";
$pangkat_pengelola="";
$jabatan_pengelola="";

$nama_gudang="";
$nip_gudang="";
$pangkat_gudang="";
$jabatan_gudang="";

$nama_kepala="";
$nip_kepala="";
$pangkat_kepala="";

$nama_kadis="";
$nip_kadis="";
$pangkat_kadis="";
$jabatan_kadis="";


$nama_kasi="";
$nip_kasi="";
$pangkat_kasi="";
$jabatan_kasi="";

foreach ($pejabat as $pej) {
	
	if($pej->id_jabatan=='1')
	{
		$nama_kadis=$pej->nama;
		$nip_kadis=$pej->nip;
		$pangkat_kadis=$pej->pangkat;
		$jabatan_kadis=$pej->jabatan;
	}

	if($pej->id_jabatan=='2')
	{
		$nama_kasi=$pej->nama;
		$nip_kasi=$pej->nip;
		$pangkat_kasi=$pej->pangkat;
		$jabatan_kasi=$pej->jabatan;
	}

	if($pej->id_jabatan=='4')
	{
		$nama_pengelola=$pej->nama;
		$nip_pengelola=$pej->nip;
		$pangkat_pengelola=$pej->pangkat;
		$jabatan_pengelola=$pej->jabatan;
	}


	if($pej->id_jabatan=='3')
	{				
		$nama_kepala=$pej->nama;
		$nip_kepala=$pej->nip;
		$pangkat_kepala=$pej->pangkat;
		
	}


	if($pej->id_jabatan=='5')
	{				
		$nama_gudang=$pej->nama;
		$nip_gudang=$pej->nip;
		$pangkat_gudang=$pej->pangkat;
		$jabatan_gudang=$pej->jabatan;
	}
	
}

//var_dump($pejabat);

?>

<br><hr>

<table width="100%" class="tbl_conf">
	<tr>
		<td width="20%" style="text-align: left;">
			Mengetahui <br>
			<?php echo @$jabatan_kadis?>
			<br>
			<?php 
                $qr_name = urlencode($app->nama_app.'- '.$nama_kadis.' - '.$nip_kadis.' - '.$pangkat_kadis);     
            ?>
            <img src="<?php echo base_url()?>assets/phpqrcode/qr.php?text=<?php echo $qr_name?>" width="80px">
			<br>
			<u><?php echo @$nama_kadis?></u>
			<br>
			NIP.<?php echo @$nip_kadis?><br>
			<?php echo @$pangkat_kadis?>
		 </td>

		 <td width="20%" style="text-align: center;">
		 	Menyetujui <br>
		 	<?php echo $jabatan_kasi?>
		 	<br>
			<?php 
                $qr_name0 = urlencode($app->nama_app.'- '.$nama_kasi.' - '.$nip_kasi.' - '.$pangkat_kasi);     
            ?>
            <img src="<?php echo base_url()?>assets/phpqrcode/qr.php?text=<?php echo $qr_name0?>" width="80px">
			<br>
			<u><?php echo $nama_kasi?></u>
			<br>
			NIP.<?php echo $nip_kasi?><br>
			<?php echo $pangkat_kasi?>

		 </td>		


		 
<?php 
$peg = $this->m_home->pegawai_by_id($this->session->userdata('id_pegawai'));
?>		
		 <td width="20%" style="text-align: center;">
		 	Yang Menyerahkan <br>
		 	<?php 
                $qr_name1 = urlencode($app->nama_app.'- '.$peg->nama.' - '.$peg->nip.' - '.$peg->pangkat);     
            ?>
            <img src="<?php echo base_url()?>assets/phpqrcode/qr.php?text=<?php echo $qr_name1?>" width="80px">
            <br>
			<u><?php echo $peg->nama?></u>
			<br>
			NIP.<?php echo $peg->nip?><br>
			<?php echo $peg->pangkat?>

		 </td>		

		 <td width="20%" style="text-align: center;">
		 	Yang Melapor, <br>
		 	Kepala <?php echo @$app->nama_app?>
		 	<br>
			<?php 
                $qr_name2 = urlencode($app->nama_app.'- '.$nama_kepala.' - '.$nip_kepala.' - '.$pangkat_kepala);     
            ?>
            <img src="<?php echo base_url()?>assets/phpqrcode/qr.php?text=<?php echo $qr_name2?>" width="80px">
            <br>
			<u><?php echo $nama_kepala?></u>
			<br>
			NIP.<?php echo $nip_kepala?><br>
			<?php echo $pangkat_kepala?>

		 </td>		

		 <td width="20%" style="text-align: right;">
		 	Yang Menerima <br>
		 	<?php echo $jabatan_pengelola?>
		 	<?php echo @$app->nama_app?>
		 	<br>
			<br>
			<?php 
                $qr_name3 = urlencode($app->nama_app.'- '.$nama_pengelola.' - '.$nip_pengelola.' - '.$pangkat_pengelola);     
            ?>
            <img src="<?php echo base_url()?>assets/phpqrcode/qr.php?text=<?php echo $qr_name3?>" width="80px">
            <br>
			<u><?php echo $nama_pengelola?></u>
			<br>
			NIP.<?php echo $nip_pengelola?><br>
			<?php echo $pangkat_pengelola?>

		 </td>		
	</tr>
</table>


