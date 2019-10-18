<?php 
//var_dump($data);

?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="<?php echo base_url()?>assets/bootstrap/css/bootstrap.min.css">
<style>

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
<?php $invID = str_pad($data->no_pendaftaran, 5, '0', STR_PAD_LEFT);?>

<table width="100%" >
	<tr style="background:;">
		<td><img src="<?php echo base_url()?>assets/logo_hh.png" width="15mm"></td>
		<td>
			<center>
				<b>PEMERINTAH KABUPATEN HUMBANG HASUNDUTAN</b><br>
				<b>DINAS KESEHATAN</b><br>
				<?php echo $app->nama_app?><br>
				<?php echo $app->alamat_app?><br>
				<?php echo $app->keterangan_app?><br>
			</center>
		</td>
		<td><img src="<?php echo base_url()?>assets/img/logo.png" width="15mm"></td>
	</tr>

</table>

<hr>
<div class="alert alert-danger"><strong>NO PASIEN : <?php echo $invID?></strong></div>
<table>
	<tr>
		<td>Nama Pasien</td><td>: <?php echo $data->nama?></td>
	</tr>
	<tr>
		<td>Tanggal Lahir</td><td>: <?php echo $data->tgl_lahir?></td>
	</tr>
	<tr>
		<td>Jenis Kelamin</td><td>: <?php echo $data->no_telp?></td>
	</tr>
	<tr>
		<td>Alamat Lengkap</td><td>: <?php echo $data->alamat?></td>
	</tr>

	<tr>
		<td>Agama</td><td>: <?php echo $data->agama?></td>
	</tr>
	<tr>
		<td>Suku</td><td>: <?php echo $data->suku?></td>
	</tr>
	<tr>
		<td>Status Pernikahan</td><td>: <?php echo $data->status_perkawinan?></td>
	</tr>
	<tr>
		<td>Pendidikan Terakhir</td><td>: <?php echo $data->pendidikan?></td>
	</tr>
	
	<tr>
		<td>No.HP</td><td>: <?php echo $data->no_telp?></td>
	</tr>
	<tr>
		<td>No.KTP</td><td>: <?php echo $data->nik?></td>
	</tr>
	<tr>
		<td>Golongan darah</td><td>: <?php echo $data->gol_darah?></td>
	</tr>
	
</table>


</body>
</html> 
