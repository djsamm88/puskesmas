<section class="content-header">
      <h1>
        Master Jabatan
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
					
					<th>NO</th>
					<th> NIP </th>
					<th> NAMA </th>
					<th> PANGKAT/GOL </th>
					<th> JABATAN </th>					
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
					<td><b>$row->nip</b></td>
					<td><b>$row->nama</b></td>
					<td><b>$row->pangkat</b></td>
					<td><b>$row->jabatan</b></td>
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
          <form id="form_tambah_relasi_jabatan">
            <input type="text" name="id" id="idnya" class="form-control" readonly="readonly">           

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

            <div class="col-sm-4">jabatan</div>
            <div class="col-sm-8">
            	<select class="form-control" id="id_jabatan" name="id_jabatan">
            		<option value="">--- Pilih Jabatan ---</option>
            		<?php 

            			foreach ($jabatan as $spes) {
            				echo "<option value='$spes->id_jabatan'>$spes->jabatan</option>";
            			}
            		?>
            	</select>
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
	
$("#all_user").dataTable({"scrollX": true});

$("#form_tambah_relasi_jabatan").on("submit",function(){
	var id_pegawai = $("#id_pegawai").val();
	var id_jabatan = $("#id_jabatan").val();
	if(id_pegawai=="" || id_jabatan=="")
	{
		alert("Pegawai dan jabatan harus dipilih");
		return false;
	}else{
		var ser = $(this).serialize();
		$.post("<?php echo base_url()?>index.php/home/simpan_form_relasi_jabatan",ser,function(x){

			console.log(ser);
			//$("#myModal").modal('hide');
			//eksekusi_controller("index.php/home/list_relasi_jabatan");
			//$("#myModal").modal('hide');
			$("#info").html("<div class='alert alert-success'> Berhasil Simpan</div>");
			
		})	
	}

	
	return false;
})

function edit(id)
{
	console.log(id);
	$.get("<?php echo base_url()?>index.php/home/relasi_jabatan_json/"+id,function(x){
		$("#idnya").val(id);
		$("#id_jabatan").val(x[0].id_jabatan);
		$("#id_pegawai").val(x[0].id_pegawai);
		var xx = $("#idnya").val();
		console.log(xx)
	})
	$("#myModal").modal('show');
}

function hapus(id)
{
	if(confirm("Anda yakin menghapus?"))
	{
		$.get("<?php echo base_url()?>index.php/home/hapus_relasi_jabatan/"+id,function(x){
			eksekusi_controller('index.php/home/list_relasi_jabatan');
		});
	}
}
function tambah()
{
	$("#id_relasi_jabatan").val('');
		$("#jabatan").val('');
	$("#myModal").modal('show');
}	

$('#myModal').modal('hide');
$('body').removeClass('modal-open');
$('.modal-backdrop').remove();

$("#myModal").on("hidden.bs.modal", function () {
  eksekusi_controller('index.php/home/list_relasi_jabatan');
});
 </script>