<section class="content-header">
      <h1>
        Master unit
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
					<th> EMAIL </th>
					<th> NIP </th>
					<th> NAMA </th>
					<th> PANGKAT/GOL </th>
					<th> KEC. </th>					
					<th> DESA </th>					
					<th> UNIT </th>					
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
					<td><b>$row->email</b></td>
					<td><b>$row->nip</b></td>
					<td><b>$row->nama</b></td>
					<td><b>$row->pangkat</b></td>
					<td><b>$row->kecamatan</b></td>
					<td><b>$row->desa</b></td>
					<td><b>$row->nama_unit</b></td>
					";
					?>
					<td>
						<a href='#' onclick="edit('<?php echo $row->id_relasi_unit;?>')" class='btn btn-warning btn-xs'>Edit</a>


						<a href='#' onclick="hapus('<?php echo $row->id_relasi_unit;?>')" class='btn btn-danger btn-xs'>Hapus</a>
						
						
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
          <form id="form_tambah_relasi_unit">
            <input type="text" name="id_relasi_unit" id="idnya" class="form-control" readonly="readonly">           

            <div class="col-sm-4">Pegawai</div>
            <div class="col-sm-8">
            	<select class="form-control" id="id_pegawai" name="id_pegawai">
            		<option value="">--- Pilih Pegawai ---</option>
            		<?php 

            			foreach ($pegawai as $peg) {
            				echo "<option value='$peg->id_pegawai'>$peg->nip | $peg->nama</option>";
            			}
            		?>
            	</select>
            </div>
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


            <div class="col-sm-4">Desa</div>
            <div class="col-sm-8">
            	<select name="id_desa" id="id_desa" required="required" class="form-control" >            		
            	</select>
            </div>
            <div style="clear: both;"></div><br>



            <div class="col-sm-4">Nama Unit</div>
            <div class="col-sm-8">
            	<input name="nama_unit" id="nama_unit" required="required" class="form-control" >            	            	
            </div>
            <div style="clear: both;"></div><br>

            


          <div id="info"></div>
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
$("#id_kecamatan").on("change",function(){
	var id_kecamatan = $(this).val();
	desa_by_id_kecamatan(id_kecamatan);
	
})

function desa_by_id_kecamatan(id_kecamatan,id_desa=null)
{
	$("#id_desa").empty();

	$.get("<?php echo base_url()?>index.php/home/desa_json_by_kec/"+id_kecamatan,function(e){
		$.each(e,function(a,b){
			console.log(b);
			var sel ="";
			if(id_desa!=null && id_desa==b.id_desa)
			{				
				
				var sel = "selected";
			
			}

			$("#id_desa").append("<option value='"+b.id_desa+"' "+sel+">"+b.desa+"</option>");
			console.log("sel="+sel);

		})
	})
}

$("#all_user").dataTable({"scrollX": true});

$("#form_tambah_relasi_unit").on("submit",function(){
	var id_pegawai = $("#id_pegawai").val();
	var id_unit = $("#id_unit").val();
	if(id_pegawai=="" || id_unit=="")
	{
		alert("Pegawai dan unit harus dipilih");
		return false;
	}else{
		var ser = $(this).serialize();
		$.post("<?php echo base_url()?>index.php/home/simpan_form_relasi_unit",ser,function(x){

			console.log(ser);
			//$("#myModal").modal('hide');
			//eksekusi_controller("index.php/home/list_relasi_unit");
			//$("#myModal").modal('hide');
			$("#info").html("<div class='alert alert-success'> Berhasil Simpan</div>");
			
		})	
	}

	
	return false;
})

function edit(id)
{
	console.log(id);
	$.get("<?php echo base_url()?>index.php/home/relasi_unit_json/"+id,function(x){
		$("#idnya").val(id);
		$("#id_kecamatan").val(x[0].id_kecamatan);
		$("#id_pegawai").val(x[0].id_pegawai);
		$("#nama_unit").val(x[0].nama_unit);

		
		var xx = $("#idnya").val();
		desa_by_id_kecamatan(x[0].id_kecamatan,x[0].id_desa);
		console.log(xx)
	})
	$("#myModal").modal('show');
}

function hapus(id)
{
	if(confirm("Anda yakin menghapus?"))
	{
		$.get("<?php echo base_url()?>index.php/home/hapus_relasi_unit/"+id,function(x){
			eksekusi_controller('index.php/home/list_relasi_unit');
		});
	}
}
function tambah()
{
	$("#id_relasi_unit").val('');
		$("#unit").val('');
	$("#myModal").modal('show');
}	

$('#myModal').modal('hide');
$('body').removeClass('modal-open');
$('.modal-backdrop').remove();

$("#myModal").on("hidden.bs.modal", function () {
  eksekusi_controller('index.php/home/list_relasi_unit');
});
 </script>