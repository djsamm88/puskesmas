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

			<table class="table table-bordered" id="all_user">
				<thead>
				<tr>
					
					<th>NO</th>
					<th> NO PENDAFTARAN </th>
					<th> NAMA PASIEN</th>
					<th> UMUR</th>					
					<th> NO HP</th>					
					<th> POLI </th>					
					<th> TGL </th>					
					<th width="20px">ACTION</th>
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
					<td><b>$row->nama</b></td>
					<td>$row->usia</td>
					<td>$row->no_telp</td>					
					<td>$row->poli</td>
					<td>".tglindo($row->tgl_kunjungan)."</td>";
					
					?>
					<td>
						<a href='#no_pendaftaran' onclick="eksekusi_controller('index.php/kunjungan/form_resep/<?php echo $row->id_kunjungan;?>')" class='btn btn-warning btn-xs btn-block'>Resep Dokter</a>
						<button onclick='print_diagnosa("<?php echo $row->id_kunjungan?>")' class='btn-block btn btn-primary btn-xs' type='button'>Cetak Ulang Diagnosa</button>
						
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
	
function print_diagnosa(id_kunjungan)
{
	window.open("<?php echo base_url()?>index.php/kunjungan/cetak_diagnosa/"+id_kunjungan);
	console.log(id_kunjungan);
}

	
 </script>