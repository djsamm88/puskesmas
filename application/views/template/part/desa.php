<section class="content-header">
      <h1>
        Master desa
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
					<th width="15px"> ID </th>
					<th> KECAMATAN </th>
					<th> DESA </th>
					
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
					<td><b>$row->id_desa</b></td>
					<td><b>$row->kecamatan</b></td>
					<td><b>$row->desa</b></td>
					";
					?>
					<td>
						<a href='#' onclick="edit('<?php echo $row->id_desa;?>')" class='btn btn-warning btn-xs'>Edit</a>


						<a href='#' onclick="hapus('<?php echo $row->id_desa;?>')" class='btn btn-danger btn-xs'>Hapus</a>
						
						
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
          <form id="form_tambah_desa">
            <input type="hidden" name="id_desa" id="id_desa" class="form-control" readonly="readonly">           

            <div class="col-sm-4">Desa</div>
            <div class="col-sm-8"><input type="text" name="desa" id="desa" required="required" class="form-control" placeholder="Nama"></div>
            <div style="clear: both;"></div><br>


            <div class="col-sm-4">Kecamatan</div>
            <div class="col-sm-8">
            	<select name="id_kecamatan" id="id_kecamatan" required="required" class="form-control" >
            		<option value="">-- pilih kecamatan --</option>
            		<?php 
            			foreach ($all_kecamatan as $key) {
            				echo "<option value='$key->id_kecamatan'>$key->kecamatan</option>";
            			}
            		?>
            	</select>
            </div>
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

$("#form_tambah_desa").on("submit",function(){
	var ser = $(this).serialize();
	$.post("<?php echo base_url()?>index.php/home/simpan_form_desa",ser,function(x){
		console.log(x);
		//eksekusi_controller("index.php/home/list_desa");
		$("#myModal").modal('hide');
		
	})
	return false;
})

function edit(id)
{
	$.get("<?php echo base_url()?>index.php/home/desa_json/"+id,function(x){
		$("#id_desa").val(x[0].id_desa);
		$("#desa").val(x[0].desa);
		$("#id_kecamatan").val(x[0].id_kecamatan);
		console.log(x)
	})
	$("#myModal").modal('show');
}

function hapus(id)
{
	if(confirm("Anda yakin menghapus?"))
	{
		$.get("<?php echo base_url()?>index.php/home/hapus_desa/"+id,function(x){
			eksekusi_controller('index.php/home/list_desa');
		});
	}
}
function tambah()
{
	$("#id_desa").val('');
	$("#desa").val('');
	$("#id_kecamatan").val('');
	$("#myModal").modal('show');
}	


$("#myModal").on("hidden.bs.modal", function () {
  eksekusi_controller('index.php/home/list_desa');
});
 </script>