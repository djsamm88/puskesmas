
			
			<table class="table table-bordered" id="all_user">
				<thead>
				<tr>
					
					<th> NO. </th>					
					<th> OBAT </th>					
					<th> SATUAN</th>					
					<th> PERMINTAAN</th>										
					<th>PERSEDIAAN</th>										
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
					<td>$row->stok</td>																			
					<td>$row->jum_realisasi</td>																			
					<td>$row->ket_realisasi</td>																			
					</tr>";
				
			}
			?>
				</tbody>
			</table>
		
		<br>
		<a href="<?php echo base_url()?>index.php/obat/cetak_pengiriman/<?php echo $surat_permintaan?>" class="btn btn-danger" target="blank">Serahkan Obat</button>
