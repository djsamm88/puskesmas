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

			<table class="table table-bordered" id="tbl_farmasi">
				<thead>
				<tr>
				
					<th>NO</th>
					<th> NO PENDAFTARAN </th>
					<th> NAMA PASIEN</th>
					<th> UMUR</th>					
					<th> NO HP</th>					
					<th> POLI </th>					
					<th> DOKTER </th>					
					<th> TGL </th>			
					<th> Mulai </th>											
					<th> Dari </th>											
					<th> Timeline </th>			
					<th> ID </th>			

					<th width="20px">ACTION</th>
				</tr>
				
				
				</thead>

				<tbody>
			<?php
			$no=0;
			foreach($query as $row) {
				$no++;
				$invID = str_pad($row->no_pendaftaran, 5, '0', STR_PAD_LEFT);
				
				$btn_cetak ="";
				
					$tr = "class='warning'";
					
				
				
				if($row->ke=='7')
				{					
										
					$tr = "class='warning'";
					$btn_cetak .= "<button class='btn btn-danger btn-xs btn-block' onclick='detail_obat($row->id_kunjungan)'>Proses</button>";	
					
				}else{
					
					$tr = "class=''";	
					$btn_cetak = "<button class='btn btn-primary btn-xs btn-block' onclick='print_obat($row->id_kunjungan)'>Cetak Obat</button>";														
					
				}
				$masuk = $row->tgl_selesai;
				$stat = $row->desc_ke;
				$bad_sel = "<br><span class='label label-success' onclick='timeline($row->id_kunjungan);return false;'>$row->desc_ke</span>";


				
				echo "<tr $tr>";
				echo "
					<td>$no</td>
					<td id='no_pendaftaran'><b>$invID</b></td>
					<td><b>$row->nama</b></td>
					<td>$row->usia</td>
					<td>$row->no_telp</td>					
					<td>$row->poli</td>
					<td>$row->nama_dokter</td>
					<td>".tglindo($row->tgl_kunjungan)."</td>
					<td id='masuk'>$masuk</td>					
					<td>$row->desc_dari</td>
					<td>$stat $bad_sel</td>
					<td id='id_kunjungan'>$row->id_kunjungan</td>
					<td>
						
						$btn_cetak
					</td>
					
					</tr>";
				
			}
			
			/*
			foreach($history as $row) {
				$no++;
				$invID = str_pad($row->no_pendaftaran, 5, '0', STR_PAD_LEFT);
				
				
				$btn_cetak = "<button class='btn btn-primary btn-xs btn-block' onclick='print_obat($row->id_kunjungan)'>Cetak Obat</button>";
				if($row->ke=='7')
				{					
										
					$tr = "class='warning'";
					
					
				}else{
					
					$tr = "class=''";										
					
					
				}
				$masuk = $row->tgl_selesai;
				$stat = $row->desc_ke;
				$bad_sel = "<br><span class='label label-success' onclick='timeline($row->id_kunjungan);return false;'>$row->desc_ke</span>";


				
				echo "<tr $tr>";
				echo "
					<td>$no</td>
					<td id='no_pendaftaran'><b>$invID</b></td>
					<td><b>$row->nama</b></td>
					<td>$row->usia</td>
					<td>$row->no_telp</td>					
					<td>$row->poli</td>
					<td>$row->nama_dokter</td>
					<td>".tglindo($row->tgl_kunjungan)."</td>
					<td id='masuk'>$masuk</td>					
					<td>$row->desc_dari</td>
					<td>$stat $bad_sel</td>
					<td id='id_kunjungan'>$row->id_kunjungan</td>
					<td>
						
						$btn_cetak
					</td>
					
					</tr>";
				
			}
			*/

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
        <h4 class="modal-title">Detail Obat</h4>
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
$("#tbl_farmasi").dataTable({"scrollX": true});
function print_obat(id_kunjungan)
{
	window.open("<?php echo base_url()?>index.php/kunjungan/cetak_obat/"+id_kunjungan);
	console.log(id_kunjungan);
	badge_farmasi();//ada di footer
}




$("#tbl_farmasi").on("click","tbody tr td #selesai_farmasi",function(){
	var id_kunjungan = $(this).parent().parent().find("#id_kunjungan").text();
	var jam_mulai = $(this).parent().parent().find("#masuk").text();	
	var no_pendaftaran = $(this).parent().parent().find("#no_pendaftaran").text();

	if(confirm("Anda yakin selesai?"))
	{	
		
		$.post("<?php echo base_url()?>index.php/kunjungan/selesai_farmasi",{id_kunjungan:id_kunjungan,jam_mulai:jam_mulai,no_pendaftaran:no_pendaftaran},function(e){
			eksekusi_controller("index.php/kunjungan/data_list_farmasi");
			console.log(e);
		})
		
	}
})

function detail_obat(id_kunjungan)
{
	$("#modalDetail").modal("show");
	$.get("<?php echo base_url()?>index.php/kunjungan/detail_obat/"+id_kunjungan,function(e){
		$("#isi_modalDetail").html(e);
		
	})
}


function timeline(id_kunjungan)
{
	$("#modalDetail").modal("show");
	$.get("<?php echo base_url()?>index.php/home/timeline/"+id_kunjungan,function(e){
		
		$("#isi_modalDetail").html(e);
		
	})
}

</script>