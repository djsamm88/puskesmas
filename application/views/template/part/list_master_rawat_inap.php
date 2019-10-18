<section class="content-header">
      <h1>
        Master Rawat Inap
      </h1>     
    </section>

    <!-- Main content -->
    <section class="content">
      
	  
	   <!-- SELECT2 EXAMPLE -->
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">List data</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>            
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        	<button class="btn btn-primary " onclick="tambah()">Tambah</button>
			<table class="table table-bordered" id="all_user">
				<thead>
				<tr>
					
					<th width="15px">NO</th>
					<th> ID </th>
					<th> Nama Kamar </th>
					
					<th width="75px">ACTION</th>
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
					<td><b>$row->nama_kamar</b></td>
					";
					?>
					<td>
						<a href='#' onclick="edit('<?php echo $row->id;?>')" class='btn btn-warning btn-xs'>Edit</a>


						<a href='#' onclick="hapus('<?php echo $row->id;?>')" class='btn btn-danger btn-xs'>Hapus</a>
						
						
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
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Form data</h4>
      </div>
      <div class="modal-body">
          <form id="form_tambah_penyakit">
            <input type="hidden" name="id" id="id_penyakit" class="form-control" readonly="readonly">           

           

            <div class="col-sm-4">Nama Kamar</div>
            <div class="col-sm-8"><input type="text" name="nama_kamar" id="nama_kamar" required="required" class="form-control" placeholder="Nama Kamar"></div>
            <div style="clear: both;"></div><br>

          <div style="clear: both;"></div>
          <button type="submit" class="btn btn-primary" >Simpan</button>
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>




 <script>
	
$("#all_user").dataTable({"scrollX": true});

$("#form_tambah_penyakit").on("submit",function(){
	var ser = $(this).serialize();
	$.post("<?php echo base_url()?>index.php/master_rawat_inap/simpan_master_rawat_inap",ser,function(x){
		console.log(x);
		//eksekusi_controller("index.php/home/list_penyakit");
		$("#myModal").modal('hide');
		
	})
	return false;
})

function edit(id)
{
	$.get("<?php echo base_url()?>index.php/master_rawat_inap/json_rawat_inap/"+id,function(x){
		$("#id_penyakit").val(x[0].id);
		$("#nama_kamar").val(x[0].nama_kamar);
		//$("#code").val(x[0].code);
		
		console.log(x)
	})
	$("#myModal").modal('show');
}

function hapus(id)
{
	if(confirm("Anda yakin menghapus?"))
	{
		$.get("<?php echo base_url()?>index.php/master_rawat_inap/hapus_rawat_inap/"+id,function(x){
			eksekusi_controller('index.php/master_rawat_inap/all_master_rawat_inap');
		});
	}
}
function tambah()
{
	$("#id_penyakit").val('');
		$("#nama_kamar").val('');
		//$("#code").val('');
	$("#myModal").modal('show');
}	


$("#myModal").on("hidden.bs.modal", function () {
  eksekusi_controller('index.php/master_rawat_inap/all_master_rawat_inap');
});
 </script>