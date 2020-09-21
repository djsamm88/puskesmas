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
	align-content:center;
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
	<div id="judul">
		<table width="100%" >
			<tr style="background:;">
				<td>
					<img src="<?php echo base_url()?>assets/logo_hh.png" width="20mm">
				</td>
				<td>
					<center><b>
						<h4>
						PEMERINTAH KABUPATEN <?php echo @$app->app_kab?><br>
						DINAS KESEHATAN<br>
						<?php echo @$app->nama_app?><br>
						<?php echo @$app->alamat_app?><br>
						<?php echo @$app->keterangan_app?>
						</h4>
					</b></center>
				</td>
				<td>
					<img src="<?php echo base_url()?>assets/img/logo.png" width="20mm">
				</td>
			</tr>

		</table>
		<hr>
	</div>
	<h4>Rujukan</h4>
	<table width="100%" class="table">
		<tr>
			<td>
				<table width="50%" class="table" style="border:1px solid #000">
					<tr>
						<td width="30%">No Pendaftaran</td><td>: <?php echo str_pad($all[0]->no_pendaftaran, 5, '0', STR_PAD_LEFT)?></td>
					</tr>
					<tr>
						<td>Nama</td><td>: <?php echo $all[0]->nama?></td>
					</tr>
					<tr>
						<td>Umur</td><td>: <?php echo $all[0]->usia?></td>
					</tr>
					<tr>
						<td>No BPJS</td><td>: <?php echo $all[0]->no_bpjs?></td>
					</tr>
				</table>
			</td>
			<td>
				<table width="50%" class="table" style="border:1px solid #000">
					
				</table>
			</td>
		</tr>
	</table>


<table width="100%" class="table" style="border:1px solid #000">
	<tr><td colspan="2"><b>SUBJECTIF</b></td></tr>
	<tr>
			<td>
				<table width="50%" class="table" style="border:1px solid #000">
					<tr><td colspan="2"><b>Autonamnesis/Alloanamnesis</b></td></tr>
					
					<tr>
						<td width="20%">KU</td><td>: <?php echo $all[0]->ku?></td>
					</tr>
					<tr>
						<td>KT</td><td>: <?php echo $all[0]->kt?> </td>
					</tr>
					<tr>
						<td>RPT</td><td>: <?php echo $all[0]->rpt?></td>
					</tr>
					<tr>
						<td>RPO</td><td>: <?php echo $all[0]->rpo?> </td>
					</tr>
					<tr>
						<td>RPK</td><td>: <?php echo $all[0]->rpk?> </td>
					</tr>
				</table>
			</td>
			
		</tr>
</table>


<table width="100%" class="table" style="border:1px solid #000">
	<tr><td colspan="2"><b>OBJECTIF</b></td></tr>
	<tr>
			<td>
				<table width="50%" class="table" style="border:1px solid #000">
					<tr><td colspan="2"><b>Vital Sign</b></td></tr>
					<tr><td colspan="2">Sensurium:</td></tr>
					<tr>
						<td width="20%">TD</td><td>: <?php echo $all[0]->td?> mmhg</td>
					</tr>
					<tr>
						<td>HR</td><td>: <?php echo $all[0]->hr?> x/menit</td>
					</tr>
					<tr>
						<td>RR</td><td>: <?php echo $all[0]->rr?> x/menit</td>
					</tr>
					<tr>
						<td>T</td><td>: <?php echo $all[0]->t?> &#176; C</td>
					</tr>
				</table>
			</td>
			<td>
				<table width="50%" class="table" style="border:1px solid #000">
					<tr><td colspan="2"><b>Pemeriksaan Fisik</b></td></tr>
					<tr>
						<td width="20%">TB</td><td>: <?php echo $all[0]->tinggi_badan?> cm</td>
					</tr>
					<tr>
						<td>BB</td><td>: <?php echo $all[0]->berat_badan?> Kg</td>
					</tr>
					<tr>
						<td>LP</td><td>: <?php echo $all[0]->lingkar_perut?> Kg</td>
					</tr>

					<tr>
						<td>Pemeriksaan Fisik</td><td>: <?php echo $all[0]->pemeriksaan_fisik?> </td>
					</tr>
				</table>
			</td>
		</tr>
</table>


<table width="100%" class="table" border="1">
	<tr><td colspan="2"><b>ASSESMENT</b></td></tr>
	<tr><td>Kode</td><td>Diagnosa</td></tr>
	<?php 
		foreach ($diag as $key) {
			echo "
					<tr>
						<td>$key->code_diagnosa</td><td>$key->diagnosa</td>
					</tr>
			";
		}
	?>
</table>

<table width="100%" class="table" style="border:1px solid #000">
<tr><td colspan="2"><b>PLANNING</b></td></tr>
<tr><td colspan="2"><b>Terapi Yang Sudah Dilakukan</b></td></tr>
<tr>
	<td width="30%">Rencana Terapi</td><td>: <?php echo $all[0]->rencana_terapi?></td>
</tr>
<tr>
	<td>Pemeriksaan Penunjang</td><td>: <?php echo $all[0]->pemeriksaan_penunjang?> </td>
</tr>
<tr>
	<td>KIE</td><td>: <?php echo $all[0]->kie?> </td>
</tr>
<tr>
	<td>Rencana Rujukan</td><td>: <?php echo $all[0]->rencana_rujukan?> </td>
</tr>
</table>


<?php 
$peg = $this->m_home->pegawai_by_id($this->session->userdata('id_pegawai'));
?>
<table width="100%" class="table" >
<tr>
	<td width="50%">
		Petugas Rujukan <br>      
      	<?php 
				$qr_name = urlencode($app->nama_app.'- NIP'.$peg->nip.' - '.$peg->nama);			
		?>
		<img src="<?php echo base_url()?>assets/phpqrcode/qr.php?text=<?php echo $qr_name?>"><br>
      <u><?php echo $peg->nama?></u>
      <br>
      NIP.<?php echo $peg->nip?><br>
      <hr>


	</td>
	<td align="right"><?php echo tanggalindo(date('Y-m-d'))?><br>
		<?php 
				$qr_name2 = urlencode($app->nama_app.'- NIP'.$all[0]->nip.' - '.$all[0]->nama_dokter);			
		?>
		<img src="<?php echo base_url()?>assets/phpqrcode/qr.php?text=<?php echo $qr_name2?>">
		<br>
		<u><?php echo $all[0]->nama_dokter?></u>
		<br>
		<?php echo $all[0]->nip?><br>
		<hr>
		
	</td>
</tr>

</table>



</div>
