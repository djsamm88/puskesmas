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
	<h4>Rekam Medis Rawat Inap</h4>
	<table width="100%" >
		<tr>
			<td valign="top">
				<table width="50%" class="table table-bordered" >
					<tr>
						<td width="40%">No Rekam Medis</td><td>: <?php echo str_pad($all[0]->no_pendaftaran, 5, '0', STR_PAD_LEFT)?></td>
					</tr>
					<tr>
						<td>Nama</td><td>: <?php echo $all[0]->nama?></td>
					</tr>
					<tr>
						<td>Tgl Lahir</td><td>: <?php echo $all[0]->tgl_lahir?></td>
					</tr>
					<tr>
						<td>Agama</td><td>: <?php echo $all[0]->agama?></td>
					</tr>

					<tr>
						<td>Alamat</td><td>: <?php echo $all[0]->desa?> <?php echo $all[0]->kecamatan?> <?php echo $all[0]->kabupaten?> <?php echo $all[0]->alamat?></td>
					</tr>

					<tr>
						<td>No.Telp</td><td>: <?php echo $all[0]->no_telp?></td>
					</tr>

					
					
				</table>
			</td>
			<td valign="top">
				<table width="50%" class="table table-bordered" >
					<tr>
						<td width="50%">Tanggal</td><td>: <?php echo tanggalindo($all[0]->tgl_kunjungan)?></td>
					</tr>
					<tr>
						<td>Jam Mulai</td><td>: <?php echo $all[0]->tgl_mulai?></td>
					</tr>
					<tr>
						<td>Jam Selesai</td><td>: <?php echo $all[0]->tgl_selesai?></td>
					</tr>
					<tr>
						<td>Lama Pemeriksaan</td><td>: <?php echo $all[0]->lama_pemeriksaan?> menit</td>
					</tr>
				</table>

				<table width="50%" class="table table-bordered" >
					<tr>
						<td width="50%">Jaminan Kesehatan</td><td>: <?php echo $all[0]->jaminan_kesehatan?></td>
					</tr>
					<tr>
						<td>No BPJS</td><td>: <?php echo $all[0]->no_bpjs?></td>
					</tr>
					<tr>
						<td>Riwayat Alergi</td><td>: <?php echo $all[0]->riwayat_alergi?></td>
					</tr>
				</table>
			</td>
		</tr>
	</table>


<table width="100%" >
	<tr><td colspan="2"><b>SUBJECTIF</b></td></tr>
	<tr>
			<td>
				<table width="50%" class="table table-bordered" >
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


<table width="100%"  >
	<tr><td colspan="2"><b>OBJECTIF</b></td></tr>
	<tr>
			<td width="50%" valign="top">
				<table  class="table table-bordered" >
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
			<td width="50%" valign="top">
				<table class="table table-bordered" >
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


<table width="100%" class="table table-bordered">
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

<table width="100%" class="table table-bordered" >
<tr><td colspan="2"><b>PLANNING</b></td></tr>

<tr>
	<td width="30%">Rencana Therapy & Informasi Therapy</td><td>: <?php echo $all[0]->rencana_terapi_ranap?></td>
</tr>

<tr>
	<td width="50%">Rencana Edukasi: ESO/Pola</td><td>: <?php echo $all[0]->rencana_edukasi?> </td>
</tr>
<tr>
	<td>Pola/Aktifitas Makan</td><td></td>
</tr>
<tr>
	<td>Ringkasan Pulang</td><td>: <?php echo $all[0]->ringkasan_pulang?> </td>
</tr>
<tr>
	<td>Rencana Rujukan</td><td>: <?php echo $all[0]->rencana_rujukan?> </td>
</tr>
</table>
<br>
<table class="table table-bordered" width="100%">
	<tr>
		<td>Pasien sudah dilakukan / dijelaskan / memahamirangkaian pemeriksaan, kondisi klinis, rencana therapy yang diberikan serta dilibatkan dalam pemilihan tindaklanjut (informed choice) dan sudah menyetujui tindakan yang akan dilakukan (informed consent).
		</td>
	</tr>
</table>


<!--
<table width="100%">
<tr>
	<td width="60%">&nbsp;</td>
	<td><?php echo tanggalindo(date('Y-m-d'))?><br>
		<br><br><br><br>
		<u><?php echo $all[0]->nama_dokter?></u>
		<br>
		<?php echo $all[0]->nip?><br>
		<hr>
		
	</td>
</tr>

</table>
-->



</div>
