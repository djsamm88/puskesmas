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
					
					<th> NO. </th>					
					<th> UNIT </th>					
					<th> PEGAWAI</th>					
					<th> TGL</th>															
					<th>SURAT</th>
					<th>STATUS</th>
					<th>AKSI</th>
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
				
				$lihat = "<button class='btn btn-xs btn-info' onclick='lihat(\"$row->surat_permintaan\")'>Detail</button>";
				
				echo "<tr>";
				echo "
					<td>$no</td>
					<td>$row->unit</td>
					<td>$row->nama</td>
					<td>".tanggalindo($row->tgl)."</td>											
					<td><a href='".base_url()."uploads/$row->surat_permintaan' target='_blank'>$row->surat_permintaan</a></td>					
					<td>$status</td>	
					<td>$lihat</td>					
					</tr>";
				
			}
			?>
				</tbody>
			</table>
		
		
		<div style="clear: both;"></div>
		<hr>
		<br>
		<div id="t4_detail_obat"></div>
		</div>
 
 </section>
 
 <script>
	
	$("#all_user").dataTable({"scrollX": true});
	
	
	function lihat(surat_permintaan)
	{
		$.get("<?php echo base_url()?>index.php/obat/detail_permintaan_obat_kapus/"+surat_permintaan,function(x){
			$("#t4_detail_obat").html(x);
		})
	}
	
 </script>