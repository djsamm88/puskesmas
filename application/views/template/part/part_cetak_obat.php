
		<table width="100%" class="table">
			<tr>
				<td>
					<table width="50%" class="table">
						<tr>
							<td width="20%">No</td><td>: <?php echo $all[0]->id_kunjungan?>/Far/Puskes/<?php echo date('Y')?></td>
						</tr>
						<tr>
							<td>Nama</td><td>: <?php echo $all[0]->nama?></td>
						</tr>

						<tr>
							<td>NIK</td><td>: <?php echo $all[0]->nik?></td>
						</tr>

						<tr>
							<td>Jenis Penyakit</td>
							<td>
								<table class="table" >

									<?php 
									foreach ($diag as $key) {
										echo "
										<tr>
										<td>$key->diagnosa</td>
										</tr>
										";
									}
									?>
								</table>
							</td>
						</tr>
						<tr>
							<td>Dokter</td><td>: <?php echo $all[0]->nama_dokter?></td>
						</tr>
					</table>
				</td>

			</tr>
		</table>
		<?php 
		$hit_biasa=0;
		foreach ($obat as $x) {					
			if($x->kategori=="BIASA")
			{
				$hit_biasa++;
			}
		}

		if($hit_biasa>0){
		?>
		<table width="100%" class="table" >
			<tr><td colspan="2"><b>Obat </b></td></tr>
			<tr>
				<td width="10px">No</td>
				<td>Nama Obat</td>
				<td width="20px">Jum</td>
				<td width="50px">Satuan</td>						
				<td>Aturan Pakai</td>
				<td>Waktu Konsumsi</td>
				<td>Ket.</td>

				<?php
				$no=0; 
				foreach ($obat as $x) {
					$no++;
					if($x->kategori=="BIASA")
					echo "
					<tr>
					<td>$no</td>
					<td>$x->obat </td>
					<td>$x->jumlah</td>
					<td>$x->satuan</td>					
					<td>$x->aturan_pakai</td>
					<td>$x->waktu_konsumsi</td>
					<td>$x->keterangan</td>
					</tr>
					";
				}
				
				?>
			</table>
			<?php 
			}

			if(count($obat_racikan)>0)
			{
			?>


				<table class="table table-bordered">
					<tr><td colspan="2"><b>Obat Racikan</b></td></tr>
								<?php
									$no=0;
										if(count($obat_racikan)>0)
										{
											echo "
												<tr>
													<td><b>No</b></td>
													<td><b>Obat</b></td>
													<td><b>PULV</b></td>
													<td><b>Aturan Pakai</b></td>
													<td><b>Waktu Konsumsi</b></td>
													<td><b>Keterangan</b></td>
												</tr>
											";
										} 
										foreach ($obat_racikan as $or) {
											$no++;
											echo "
												<tr>
													<td>$no</td>
													<td>";

														$comma_obat = $this->m_kunjungan->ambil_obat_racikan_by_comma_id($or->id);
														echo "<table class='table table-bordered'>";
														foreach ($comma_obat as $co ) {
															echo "
																
																<tr>
																	<td>$co->obat</td>
																	<td>$co->jumlah</td>
																	<td>$co->satuan</td>
																</tr>

															";
														}
														echo "</table>";
												echo "</td>
													<td>$or->pulv </td>
													<td>$or->aturan_pakai</td>
													<td>$or->waktu_konsumsi</td>
													<td>$or->keterangan</td>
												</tr>
											";
										}
									?>
							</table>

			<?php 
			}

			if(count($obat_lain)>0)
			{
			?>
		<table width="100%" class="table" >
			<tr><td colspan="2"><b>Obat Lainnya</b></td></tr>
			<tr>
				<td width="10px">No</td>
				<td>Nama Obat</td>
				<td width="20px">Jum</td>
				<td width="50px">Satuan</td>						
				<td>Aturan Pakai</td>
				<td>Waktu Konsumsi</td>
				<td>Ket.</td>

				<?php
				$no=0; 
				
				foreach ($obat_lain as $y) {
					$no++;
					echo "
					<tr>
					<td>$no</td>
					<td>$y->nama_obat_lain</td>
					<td>$y->jumlah_obat_lain</td>
					<td>$y->satuan_obat_lain</td>					
					<td>$y->aturan_pakai_obat_lain</td>
					<td>$y->waktu_konsumsi_obat_lain</td>
					<td>$y->keterangan_obat_lain</td>
					</tr>
					";
				}
				?>
			</table>
			<?php 
			}

			$hit_bmhp=0;
			foreach ($obat as $x) {					
				if($x->kategori=="BMHP")
				{
					$hit_bmhp++;
				}
			}
			if($hit_bmhp>0)
			{
			?>

			<table width="100%" class="table" >
			<tr><td colspan="2"><b>BMHP </b></td></tr>
			<tr>
				<td width="10px">No</td>
				<td>Nama</td>
				<td width="20px">Jum</td>
				<td width="50px">Satuan</td>										
				<td>Ket.</td>

				<?php
				$no=0; 
				foreach ($obat as $x) {
					$no++;
					if($x->kategori=="BMHP")
					echo "
					<tr>
					<td>$no</td>
					<td>$x->obat </td>
					<td>$x->jumlah</td>
					<td>$x->satuan</td>										
					<td>$x->keterangan</td>
					</tr>
					";
				}
				
				?>
			</table>
			<?php 
			}
			?>
<br>
<button class='btn btn-success ' id='selesai_farmasi' onclick="cetak_obat(<?php echo $all[0]->id_kunjungan?>)">Cetak & Selesai</button>
<script type="text/javascript">
	

function cetak_obat(id_kunjungan){
	<?php $invID = str_pad($all[0]->no_pendaftaran, 5, '0', STR_PAD_LEFT);?>
	var jam_mulai = $(this).parent().parent().find("#masuk").text();	
	var no_pendaftaran = "<?php echo $invID?>";

	if(confirm("Anda yakin selesai?"))
	{	
		
		$.post("<?php echo base_url()?>index.php/kunjungan/selesai_farmasi",{id_kunjungan:id_kunjungan,jam_mulai:jam_mulai,no_pendaftaran:no_pendaftaran},function(e){
			//eksekusi_controller("index.php/kunjungan/data_list_farmasi");
			print_obat(id_kunjungan);
			$("#modalDetail").modal("hide");
			//eksekusi_controller("index.php/kunjungan/data_list_farmasi");
			console.log(e);
			$("#selesai_farmasi").hide();
		})
		
	}
	return false;
}

function print_obat(id_kunjungan)
{
	window.open("<?php echo base_url()?>index.php/kunjungan/cetak_obat/"+id_kunjungan);
	console.log(id_kunjungan);
	badge_farmasi();//ada di footer
}

$("#modalDetail").on("hidden.bs.modal", function () {
	eksekusi_controller("index.php/kunjungan/data_list_farmasi");
})
</script>