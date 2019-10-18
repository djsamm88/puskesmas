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

			<button onclick="eksekusi_controller('index.php/obat/form_simpan')" class="btn btn-primary">Tambah Obat Baru</button>

			<a href="<?php echo base_url()?>index.php/obat/data_list_xs" target="_blank" class="btn btn-primary">Download</a>


			<table class="table table-bordered" id="all_user">
				<thead>
				<tr>
					
					<th> NO. </th>
					<th> KODE </th>
					<th> OBAT </th>					
					<th> SATUAN</th>					
					<th> TGL EXPIRE</th>										
					<th>PERSEDIAAN</th>					
					<th>No.BATCH</th>					
					<th>KAT.</th>					
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
					<td>$row->code</td>
					<td>$row->obat</td>					
					<td>$row->satuan</td>					
					<td>".tglindo($row->tgl_expire)."</td>					
					<td>$row->stok</td>
					<td>$row->nomor_batch</td>
					<td>$row->kategori</td>";
					?>
					<td>
						<a href='#no_pendaftaran' onclick="eksekusi_controller('index.php/obat/form_edit/<?php echo $row->id_obat;?>')" class='btn btn-warning btn-xs'>Edit</a>
						<a href='#edit?id_user=$row->id_user' onclick="hapus_obat('<?php echo $row->id_obat;?>')" class='btn btn-danger btn-xs'>Hapus</a>
						
						
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
	
	
	function hapus_obat(id_user)
	{
		if(confirm("Anda yakin menghapus data ini?"))
		{
			$.get("index.php/obat/hapus_list/"+id_user,function(e){
				//alert(e);
				eksekusi_controller('index.php/obat/data_list');
			});
		}
	}
	
	
 </script>