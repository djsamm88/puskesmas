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
<h3 style="text-align: center;"><center>SURAT BUKTI PENGIRIMAN OBAT</center></h3>


<table width="100%">
	<tr>
		<td width="50%">
			<table >
			<tr>
					<td>Dari </td><td>: <?php echo $app->nama_app?> </td>		
				</tr>
			</table>

		 </td>
		 <td width="50%">

			<table >
				<tr>
					<td>Kepada </td><td></td>	
				</tr>
				<tr>	
					<td>Unit </td><td>: <?php echo @$data_obat[0]->nama_unit?></td>		
				</tr><tr>
					<td>Desa </td><td>: <?php echo @$data_obat[0]->desa?></td>		
				</tr><tr>
					<td>Kecamatan </td><td>: <?php echo @$data_obat[0]->kecamatan?></td>		
				</tr><tr>

					<td>Tgl </td><td>: <?php echo tanggalindo(date('Y-m-d'))?></td>		
				</tr>

			</table>

		 </td>		
	</tr>
</table>


	


			<table class="table table-bordered" id="tbl_lap_obat">
				<thead>
				<tr>
					
					<th> NO. </th>					
					<th> OBAT </th>					
					<th> SATUAN</th>					
					<th> PERMINTAAN</th>															
					<th>REALISASI</th>										
					<th>KETERANGAN</th>										
				</tr>
				
				
				</thead>

				<tbody>
			<?php
			$no=0;
			foreach($data_obat as $row) {
				$no++;

				if($row->status=="0")
				{
					$status='Baru';
				}else if($row->status=="1")
				{
					$status='Verifikasi Farmasi';
				}else if($row->status=="2")
				{
					$status='Kapus Setuju';
				}else if($row->status=="3")
				{
					$status='Telah diserahkan Farmasi/Selesai';
				}
				
				
				echo "<tr>";
				echo "
					<td>$no</td>
					<td>$row->obat</td>
					<td>$row->satuan</td>
					<td>$row->jumlah</td>																						
					<td>$row->jum_realisasi</td>																			
					<td>$row->ket_realisasi</td>																			
					</tr>";
				
			}
			?>
				</tbody>
			</table>

			<br>
<?php
$peg = $this->m_home->pegawai_by_id($this->session->userdata('id_pegawai'));


$nama_pengelola="";
$nip_pengelola="";
$pangkat_pengelola="";

$nama_kepala="";
$nip_kepala="";
$pangkat_kepala="";


foreach ($pejabat as $pej) {
	
	if($pej->id_jabatan=='4')
	{
		$nama_pengelola=$pej->nama;
		$nip_pengelola=$pej->nip;
		$pangkat_pengelola=$pej->pangkat;
	}


	if($pej->id_jabatan=='3')
	{				
		$nama_kepala=$pej->nama;
		$nip_kepala=$pej->nip;
		$pangkat_kepala=$pej->pangkat;
	}
	
}

//var_dump($pejabat);

?>

<table width="100%">
	<tr>
		<td width="50%">
			Yang Menerima <br>
			<br>
			<br>
			<br>
			<br>
			<u><?php echo @$data_obat[0]->nama?></u>
			<br>
			NIP.<?php echo @$data_obat[0]->nip?><br>
			<?php echo @$data_obat[0]->pangkat?>

		 </td>
		 <td width="50%" style="text-align: right;">
		 	Yang Menyerahkan <br>
			<?php 
                $qr_name2 = urlencode($app->nama_app.'- '.$peg->nama.' - '.$peg->nip.' - '.$peg->pangkat);     
            ?>
            <img src="<?php echo base_url()?>assets/phpqrcode/qr.php?text=<?php echo $qr_name2?>">
            <br>
			<u><?php echo $peg->nama?></u>
			<br>
			NIP.<?php echo $peg->nip?><br>
			<?php echo $peg->pangkat?>

		 </td>		
	</tr>
</table>


<br>
<table width="100%">
	<tr>
		<td width="30%">
			
		 </td>
		 <td width="40%" style="text-align: center;">
		 	Diketahui Oleh, <br>
		 	Kepala <?php echo @$app->nama_app?>
			<?php 
                $qr_name2 = urlencode($app->nama_app.'- '.$nama_kepala.' - '.$nip_kepala.' - '.$pangkat_kepala);     
            ?>
            <img src="<?php echo base_url()?>assets/phpqrcode/qr.php?text=<?php echo $qr_name2?>">

			<u><?php echo $nama_kepala?></u>
			<br>
			NIP.<?php echo $nip_kepala?><br>
			<?php echo $pangkat_kepala?>

		 </td>		

		 <td width="30%">
		 	
		 </td>		
	</tr>
</table>


	
		