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

			<?php 
				if(count($query)==0)
				{
					echo "<div class='alert alert-danger'><b>Perhatian!!!</b> Data tidak ditemukan... Silahkan daftar pasien baru</div>";
					echo "<button class='btn btn-success' onclick='eksekusi_controller(\"index.php/pasien/form_simpan\")'>Daftar Pasien </button>";
				}
			?>

			<table class="table table-bordered" id="all_user">
				<thead>
				<tr>
					
					<th> NO.PASIEN </th>
					<th> NAMA </th>
					<th> JENIS KELAMIN </th>					
					<th> TGL LAHIR</th>					
					<th> USIA</th>										
					<th>GOL.DARAH</th>
					<th>NO BPJS</th>
					<th>NO TELP</th>
					<th> ALAMAT </th>
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
					<td><b>$row->no_pendaftaran</b></td>
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
						<a href='#no_pendaftaran' onclick="eksekusi_controller('index.php/kunjungan/form_proses/<?php echo $row->no_pendaftaran;?>')" class='btn btn-success btn-xs'>Proses</a>
						
						
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
	
	
 </script>