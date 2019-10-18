
	<form id="verifikasi_permintaan">
		<div class="col-sm-4"><?php echo @$data_obat[0]->tgl?></div>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="surat_permintaan" readonly="readonly" value="<?php echo($surat_permintaan)?>">
		</div>
			<table class="table table-bordered" id="all_obat">
				<thead>
				<tr>
					
					<th> NO. </th>					
					<th> UNIT </th>					
					<th> OBAT </th>					
					<th> SATUAN</th>					
					<th> PERMINTAAN</th>										
					<th>STOK AWAL</th>										
					<th>REALISASI</th>										
					<th>STOK AKHIR</th>										
					<th width='250px'>KETERANGAN</th>										
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
					<td>$no <input type='hidden' class='form-control' name='id[]' value='$row->id'></td>
					<td>$row->nama_unit</td>
					<td>$row->obat</td>
					<td>$row->satuan</td>
					<td id='permintaan'>$row->jumlah</td>					
					<td id='stok_awal'>$row->stok</td>																			
					<td><input type='number' class='form-control' name='realisasi[]' id='realisasi'></td>									
					<td id='stok_akhir'></td>						
					<td id='keterangan' ><input class='form-control' name='keterangan[]' id='val_keterangan'></td>						
					</tr>";
				
			}
			?>
				</tbody>
			</table>
			<br>
			<button class="btn btn-primary" type="submit">Teruskan Ke Kapus &rarr;</button>
		</form>

<script type="text/javascript">
	$("table#all_obat tbody tr td #realisasi").on("input",function(){
		var jum = $(this).val();		
		var stok = $(this).parent().parent().find("#stok_awal").text();
		var stok_akhir = $(this).parent().parent().find("#stok_akhir");
		var permintaan = $(this).parent().parent().find("#permintaan").text();
		var keterangan = $(this).parent().parent().find("#keterangan").find('input');


		if(parseInt(permintaan)>parseInt(jum))
		{
			keterangan.val("Tidak Lengkap");
		}else if(parseInt(permintaan)==parseInt(jum))
		{
			keterangan.val("Lengkap");
		}else if(parseInt(stok)==0 || parseInt(stok)=="")
		{
			keterangan.val("Tidak Tersedia");
		}else if(parseInt(jum)>parseInt(permintaan))
		{
			keterangan.val("Lebih Dari Permintaan");
		}

		if(parseInt(jum)>parseInt(stok))
		{
			keterangan.val("Tidak Lengkap");
			alert("Perhatikan Stok. Maksimal "+stok);
			$(this).val("");
		}


		var int_stok_akhir = parseInt(stok)-parseInt(jum);
		stok_akhir.html(int_stok_akhir);

		console.log(stok);
	})

	$("#verifikasi_permintaan").on("submit",function(){
		if(confirm("Anda yakin??"))
		{
			var ser = $(this).serialize();
			$.post("<?php echo base_url()?>index.php/obat/update_permintaan/",ser,function(){
				alert("Berhasil diupdate.");
				eksekusi_controller('index.php/obat/data_permintaan_farmasi');
			})
	
		}
		
		return false;
	})
</script>
		