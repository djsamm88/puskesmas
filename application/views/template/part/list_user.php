<section class="content-header">
      <h1>
        Data
        <small>Pegawai</small>
      </h1>     
    </section>

    <!-- Main content -->
    <section class="content">
      
	  
	   <!-- SELECT2 EXAMPLE -->
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Data Profil Pegawai</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>            
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">

			<button onclick="eksekusi_controller('index.php/home/form_pegawai')" class="btn btn-primary">Tambah Pegawai</button>

			<table class="table table-bordered" id="all_user">
				<thead>
				<tr>
					
					<th width="15px"> ID PEGAWAI </th>
					<th> NIP </th>
					<th> NAMA </th>
					<th> EMAIL </th>					
					<th> PANGKAT </th>										
					<th> PASS </th>										
					<th>ACTION</th>
				</tr>
				
				
				</thead>

				<tbody>
			<?php
			$no=0;
			foreach($query as $row) {
				$no++;
				
				if($row->id_pegawai!='1')
				{
					$hapus = "<button class='btn btn-danger btn-xs' onclick='hapus($row->id_pegawai)'>Hapus</button>";
				}else{
					$hapus = "";
				}


				echo "<tr>";
				echo "
					<td>$row->id_pegawai</td>
					<td>$row->nip</td>
					<td>$row->nama</td>
					<td>$row->email</td>															
					<td>$row->pangkat</td>
					<td>$row->pass_cetak</td>

					";
					?>
					<td>
						<a href='#edit?id_pegawai=$row->id_pegawai' onclick="eksekusi_controller('index.php/home/form_edit/<?php echo $row->id_pegawai;?>')" class='btn btn-warning btn-xs'>Edit</a>
						<?php echo $hapus?>
						
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
	function hapus(id_pegawai)
	{
		if(confirm("Anda yakin?"))
		{
			$.get("<?php echo base_url()?>index.php/home/hapus_user/"+id_pegawai,function(e){
				eksekusi_controller('index.php/home/list_admin');
			})
		}
	}
	
 </script>