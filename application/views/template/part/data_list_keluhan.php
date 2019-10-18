<section class="content-header">
      <h1>
        Diagnosa Dokter
      </h1>     
    </section>

    <!-- Main content -->
    <section class="content">
      
	  
	   <!-- SELECT2 EXAMPLE -->
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Data Keluhan</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>            
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">

			
			<table class="table table-bordered" id="all_user">
				<thead>
				<tr>
					
					<th> NO. </th>
					<th> NO.PENDAFTARAN </th>
					<th> NAMA PASIEN </th>
					<th> POLI </th>
					<th> DOKTER </th>					
					<th> TGL JANJI</th>					
					<th> KELUHAN</th>															
					<th> Dari</th>																					
					<th> Timeline</th>																					
					<th width='15px'>ACTION</th>
				</tr>
				
				
				</thead>

				<tbody>
			<?php
			$no=0;
			foreach($all as $row) {
				$no++;
				$no_pendaftaran = str_pad($row->no_pendaftaran, 5, '0', STR_PAD_LEFT);
				if($row->dari=='1' || $row->ke=='2' || $row->ke=='5')
				{					
					$btn_cetak = "";
					
					$tr = "class='warning'";
				}else{					
					$tr = "class=''";
					$btn_cetak = "<button class='btn btn-block btn-warning btn-xs' onclick='print_diagnosa($row->id_kunjungan)'>Cetak</button>";
				}
				$stat = "<a href='#' class='badge' onclick='timeline($row->id_kunjungan);return false;'>$row->desc_ke</a>";
				
				echo "<tr $tr>";
				echo "
					<td>$no </td>
					<td>$no_pendaftaran</td>
					<td>$row->nama</td>
					<td>$row->poli</td>
					<td>$row->nama_dokter</td>					
					<td>".($row->tgl_janji)."</td>					
					<td>$row->keluhan_umum</td>										
					<td>$row->desc_dari</td>										
					<td>$stat</td>		
					

					";?>
					<td>
						<a href='#no_pendaftaran' onclick="eksekusi_controller('index.php/kunjungan/form_proses/<?php echo $row->id_kunjungan;?>')" class='btn btn-block btn-primary btn-xs'>Diagnosa</a>
						<?php echo $btn_cetak?>			
						<!--		
							<a href='#' onclick="hapus_keluhan('<?php echo $row->id_kunjungan;?>')" class='btn btn-danger btn-block btn-xs'>Hapus</a>
						-->
							
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




<!-- Modal -->
<div id="modalDetail" class="modal fade" role="dialog">
  <div class="modal-dialog modal-xl">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Detail Timeline</h4>
      </div>
      <div class="modal-body" id="isi_modalDetail">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<style type="text/css">
	@media (min-width: 768px) {
	  .modal-xl {
	    width: 90%;
	   max-width:1200px;
	  }
	}
</style>

 
 <script>
	
	$("#all_user").dataTable({"scrollX": true});
	
	
	function hapus_keluhan(id)
	{
		if(confirm("Anda yakin menghapus data ini?"))
		{
			$.get("index.php/keluhan/hapus_keluhan/"+id,function(e){
				//alert(e);
				eksekusi_controller('index.php/keluhan/data_list');
			});
		}
	}
	

	function print_diagnosa(id_kunjungan)
	{
		window.open("<?php echo base_url()?>index.php/kunjungan/cetak_diagnosa/"+id_kunjungan);
		console.log(id_kunjungan);
	}


	function timeline(id_kunjungan)
	{
		$("#modalDetail").modal("show");
		$.get("<?php echo base_url()?>index.php/home/timeline/"+id_kunjungan,function(e){
			
			$("#isi_modalDetail").html(e);
			
		})
	}
	
 </script>