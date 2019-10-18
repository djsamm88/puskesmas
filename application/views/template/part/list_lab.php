<section class="content-header">
      <h1>
        Data
        <small>Lab</small>
      </h1>     
    </section>

    <!-- Main content -->
    <section class="content">
      
	  
	   <!-- SELECT2 EXAMPLE -->
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Data Lab</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>            
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">

			<button onclick="eksekusi_controller('index.php/c_lab/form')" class="btn btn-primary">Tambah</button>
			<table class="table table-bordered" id="all_user">
				<thead>
				<tr>
					
					<th>No</th>
					<th>id</th>
					<th>ID Kunjungan</th>
					<th>No Pendaftaran</th>
					<th>Spesimen Jenis</th>
					<th>Spesimen Asal Bahan</th>
					<th>Tanggal Pengambilan SP</th>
					<th>ID Pegawai</th>
					<th>Haemoglobin</th>
					<th>Gula Darah Sewaktu</th>
					<th>Gula Darah Puasa</th>
					<th>Gula Darah 2 Jam PP</th>
					<th>Asam Urat</th>
					<th>Kolesterol</th>
					<th>Tes Kehamilan</th>
					<th>BTA Sputum</th>
					<th>hiv</th>
					<th>hbsag</th>
					<th>Golongan Darah</th>
					<th>Urinalisa</th>
					<th>Frambusia</th>
					<th>Mantoux Test</th>
					<th>igg</th>
					<th>igm</th>
					<th>Glukosa Urin</th>
					<th>Protein Urin</th>
					<th>Jam Mulai</th>
					<th>Jam Selesai</th>
					
					<th>ACTION</th>
				</tr>
				
				
				</thead>

				<tbody>
			<?php
			$no=0;
			foreach($query as $row) {
				$no++;
				
				echo "<tr>";
				echo "
					<td>$no</td>
					<td><b>$row->id</b></td>
					<td><b>$row->id_kunjungan</b></td>
					<td><b>$row->no_pendaftaran</b></td>
					<td><b>$row->spesimen_jenis</b></td>
					<td><b>$row->spesimen_asal_bahan</b></td>
					<td><b>$row->tgl_pengambilan_sp</b></td>
					<td><b>$row->id_pegawai</b></td>
					<td><b>$row->haemoglobin</b></td>
					<td><b>$row->gula_darah_sewaktu</b></td>
					<td><b>$row->gula_darah_puasa</b></td>
					<td><b>$row->gula_darah_2_jam_pp</b></td>
					<td><b>$row->asam_urat</b></td>
					<td><b>$row->kolesterol</b></td>
					<td><b>$row->tes_kehamilan</b></td>
					<td><b>$row->bta_sputum</b></td>
					<td><b>$row->hiv</b></td>
					<td><b>$row->hbsag</b></td>
					<td><b>$row->golongan_darah</b></td>
					<td><b>$row->urinalisa</b></td>
					<td><b>$row->frambusia</b></td>
					<td><b>$row->mantoux_test</b></td>
					<td><b>$row->igg</b></td>
					<td><b>$row->igm</b></td>
					<td><b>$row->glukosa_urin</b></td>
					<td><b>$row->protein_urin</b></td>
					<td><b>$row->jam_mulai</b></td>
					<td><b>$row->jam_selesai</b></td>
					";
					?>
					<td>
						<a href='#id' onclick="eksekusi_controller('index.php/c_lab/form_edit_lab/<?php echo $row->id;?>')" class='btn btn-block btn-warning btn-xs'>Edit</a>

						<a href='#edit?id=$row->id' onclick="hapus_list('<?php echo $row->id;?>')" class='btn btn-block btn-danger btn-xs'>Hapus</a>
						
						
					</td>
				<?php 
				echo "</tr>";
				
			}
			?>
				</tbody>
			</table>
	
		
		<!-- body-->
		</div>
 
 </section>
 
 <script>
	
	$("#all_user").dataTable({"scrollX": true});
	function hapus_list(id)
	{
		if(confirm("Anda yakin?"))
		{
			$.get("<?php echo base_url()?>index.php/c_lab/hapus_list/"+id,function(e){
				eksekusi_controller('index.php/c_lab/all_lab');
			})
		}
	}
	
 </script>
