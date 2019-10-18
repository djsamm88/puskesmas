<style type="text/css">
	
	#tbl_lap_obat {
	  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
	  border-collapse: collapse;
	  width: 100%;
	  font-size: 10px;
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

<b>LAPORAN PASIEN MULAI <?php echo $awal?> S/D <?php echo $akhir?>
			<table border="1" id="tbl_lap_obat" class="table">
				<thead>
				<tr>
					
					<th rowspan="2">NO</th>
					<th rowspan="2"> NO PENDAFTARAN </th>
					<th rowspan="2"> NAMA PASIEN</th>
					<th rowspan="2"> UMUR</th>					
					<th rowspan="2"> JENIS KELAMIN</th>					
					<th colspan="4"> HISTORI BEROBAT </th>	

				</tr>
				<tr>				
					<th> TGL BEROBAT</th>					
					<th>PENYAKIT</th>
					<th>DOKTER</th>
					<th>OBAT YANG DIBERIKAN</th>
				</tr>
				
				
				</thead>


				<tbody>
			<?php
			$no=0;
			foreach($lap as $row) {
				$no++;
				$invID = str_pad($row->no_pendaftaran, 5, '0', STR_PAD_LEFT);
				echo "<tr>";
				echo "
					<td>$no</td>
					<td><b>$invID</b></td>
					<td><b>$row->nama</b></td>
					<td>$row->usia</td>
					<td>$row->jenis_kelamin</td>					
					
					<td>".tglindo($row->tgl_kunjungan)."</td>
					<td>$row->diagnosa <br> $row->sakit</td>
					<td>$row->nama_dokter</td>
					<td>$row->obat <br> <hr> $row->obat_lain</td>
				</tr>";
				
			}
			?>
				</tbody>
			</table>
		