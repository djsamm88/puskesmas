<section class="content-header">
      <h1>
        <?php echo $judul?>
        
      </h1>     
    </section>

    <!-- Main content -->
    <section class="content">
      
	  
	   <!-- SELECT2 EXAMPLE -->
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo $judul?></h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>            
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">

			<button onclick="eksekusi_controller('index.php/pasien/form_simpan')" class="btn btn-primary">Tambah Pasien Baru</button>

			<table class="table table-bordered" id="all_user">
				<thead>
				<tr>
					<th width="15px"> NO. </th>
					<th> NO.PASIEN </th>
					<th> NAMA </th>
					<th> JENIS KELAMIN </th>					
					<th> TGL LAHIR</th>					
					<th> USIA</th>										
					<th>GOL.DARAH</th>
					<th>NO BPJS</th>
					<th>NO TELP</th>
					<th> ALAMAT </th>
					<th width="15px">ACTION</th>
				</tr>
			
				
				</thead>

				<tbody>
			<?php
			$no=0;
			foreach($query as $row) {
				$no++;
				$invID = str_pad($row->no_pendaftaran, 5, '0', STR_PAD_LEFT);
				echo "<tr>";
				echo "
					<td>$no</td>
					<td><b>$invID</b></td>
					<td>$row->nama</td>
					<td>$row->jenis_kelamin</td>					
					<td>".tglindo($row->tgl_lahir)."</td>					
					<td>$row->usia</td>
					<td>$row->gol_darah</td>
					<td>$row->no_bpjs</td>
					<td>$row->no_telp</td>
					<td>$row->alamat</td>";
					?>
					<td>
						<a href='#no_pendaftaran' onclick="eksekusi_controller('index.php/pasien/form_edit/<?php echo $row->no_pendaftaran;?>')" class='btn btn-block btn-warning btn-xs'>Edit</a>
						<a href='#edit?id_user=$row->id_user' onclick="hapus_user('<?php echo $row->no_pendaftaran;?>')" class='btn btn-block btn-danger btn-xs'>Hapus</a>
						<a href='<?php echo base_url()?>index.php/pasien/kartu_pasien/<?php echo $row->no_pendaftaran;?>' target='blank' class='btn btn-block btn-success btn-xs'>Kartu</a>
						<a href='<?php echo base_url()?>index.php/pasien/kartu_pasien_dua/<?php echo $row->no_pendaftaran;?>' target='blank' class='btn btn-block btn-info btn-xs'>Pasien</a>
						
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
	
	
	function hapus_user(id_user)
	{
		if(confirm("Anda yakin menghapus data ini?"))
		{
			$.get("<?php echo base_url()?>index.php/pasien/hapus_user/"+id_user,function(e){
				//alert(e);
				eksekusi_controller('index.php/pasien/data_list');
			});
		}
	}
	
	function view_kinerja(id_user)
	{
		eksekusi_controller('index.php/home/tampil_kinerja/'+id_user);
	}
 </script>