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
		font-size: 14px;
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
						PEMERINTAH KABUPATEN HUMBANG HASUNDUTAN<br>
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

		<?php include("part_cetak_obat_pdf.php")?>

<?php 
$peg = $this->m_home->pegawai_by_id($this->session->userdata('id_pegawai'));
?>		
			<table width="100%" class="table" >
				<tr>
					<td width="50%">
						<br>
						Farmasi
						<br>
						<?php 
								$qr_name2 = urlencode($app->nama_app.'- NIP'.$peg->nip.' - '.$peg->nama);			
						?>
						<img src="<?php echo base_url()?>assets/phpqrcode/qr.php?text=<?php echo $qr_name2?>">
						<br>
						<u><?php echo $peg->nama?></u>						
						<br>
						<?php echo $peg->pangkat?>
						
						

					</td>
					<td align="right"><?php echo tanggalindo(date('Y-m-d'))?>,<br>
						Pasien/Penanggung Jawab
						<br><br><br><br>

						<u>
						Nama Jelas & tanda tangan
						</u>

					</td>
				</tr>

			</table>



		</div>
