<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="<?php echo base_url()?>assets/bootstrap/css/bootstrap.min.css">
<style>
body{
	font-size:11px;
}
.content{
	padding:5px;
	
}

.alert{
	padding:1px;margin:1px;
	align-content: center;
}
td{
	padding:2px;
}
table{
	margin:2px;
}
</style>
</head>
<body>
<div class='content'>
<table width="100%" >
	<tr style="background:;">
		<td><img src="<?php echo base_url()?>assets/logo_hh.png" width="15mm"></td>
		<td>
			<center>
				<b>PEMERINTAH KABUPATEN HUMBANG HASUNDUTAN</b><br>				
				<?php echo $app->nama_app?><br>
				<?php echo $app->alamat_app?><br>
				<?php echo $app->keterangan_app?><br>
			</center>
		</td>
		<td><img src="<?php echo base_url()?>assets/img/logo.png" width="15mm"></td>
	</tr>

</table>
<?php $invID = str_pad($data->no_pendaftaran, 5, '0', STR_PAD_LEFT);?>
<div class="alert alert-danger" width="100%"><strong>NO PASIEN : <?php echo $invID?></strong></div>

<table width="100%">
	<tr>
		<td width="70%">
			
			<table>
				<tr>
					<td>NAMA</td><td>: <?php echo $data->nama?></td>
				</tr>
				<tr>
					<td>TGL LAHIR</td><td>: <?php echo $data->tgl_lahir?></td>
				</tr>
				<tr>
					<td>NO.HP</td><td>: <?php echo $data->no_telp?></td>
				</tr>
				<tr>
					<td>ALAMAT</td><td>: <?php echo $data->alamat?></td>
				</tr>
				<tr>
					<td>DESA</td><td>: <?php echo $data->desa?></td>
				</tr>
				<tr>
					<td>KECAMATAN</td><td>: <?php echo $data->kecamatan?></td>
				</tr>
				
			</table>
		</td>
		<td width="30%" align="right">
			<?php 
				$qr_name = urlencode($app->nama_app.'- ID'.$invID);			
			?>
			<img src="<?php echo base_url()?>assets/phpqrcode/qr.php?text=<?php echo $qr_name?>">
			
		</td>

</table>

<div class="alert alert-info"><small>CATATAN:</small></div>
<ol>
	<li>Kartu ini harus dibawa setiap kali berobat</li>
	<li>Apabila kartu ini tercecer, harap dikembaikan ke puskesmas Humbang Hasundutan</li>
</ol>
</div>
<!------- batas ---->
</body>
</html> 
