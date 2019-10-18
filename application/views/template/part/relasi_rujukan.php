<section class="content-header">
      <h1>
        Petugas Rujukan
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
					<th> JABATAN </th>					
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
					<td><b>$row->jabatan_rujukan</b></td>
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
          <form id="form_tambah_relasi_rujukan">
            <input type="hidden" name="id" id="id_relasi_rujukan" class="form-control" readonly="readonly">           

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

            <div class="col-sm-4">Jabatan</div>
            <div class="col-sm-8">
            	<input class="form-control" id="jabatan_rujukan" name="jabatan_rujukan">
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

$("#form_tambah_relasi_rujukan").on("submit",function(){
	var id_pegawai = $("#id_pegawai").val();
	var id_spesialis = $("#id_spesialis").val()
	if(id_pegawai=="" || id_spesialis=="")
	{
		alert("Pegawai dan jabatan harus dipilih");
		return false;
	}else{
		var ser = $(this).serialize();
		$.post("<?php echo base_url()?>index.php/relasi_rujukan/simpan_form_relasi_rujukan",ser,function(x){
			console.log(x);
			//$("#myModal").modal('hide');
			//eksekusi_controller("index.php/relasi_rujukan/list_relasi_rujukan");
			//$("#myModal").modal('hide');
			$("#info").html("<div class='alert alert-success'> Berhasil Simpan</div>");
			
		})	
	}

	
	return false;
})

function edit(id)
{
	$.get("<?php echo base_url()?>index.php/relasi_rujukan/relasi_rujukan_json/"+id,function(x){
		$("#id_relasi_rujukan").val(x[0].id);
		$("#jabatan_rujukan").val(x[0].jabatan_rujukan);
		$("#id_pegawai").val(x[0].id_pegawai);
		console.log(x[0])
	})
	$("#myModal").modal('show');
}

function hapus(id)
{
	if(confirm("Anda yakin menghapus?"))
	{
		$.get("<?php echo base_url()?>index.php/relasi_rujukan/hapus_relasi_rujukan/"+id,function(x){
			eksekusi_controller('index.php/relasi_rujukan/list_relasi_rujukan');
		});
	}
}
function tambah()
{
	$("#id_relasi_rujukan").val('');
		$("#jabatan_rujukan").val('');
	$("#myModal").modal('show');
}	

$('#myModal').modal('hide');
$('body').removeClass('modal-open');
$('.modal-backdrop').remove();

$("#myModal").on("hidden.bs.modal", function () {
  eksekusi_controller('index.php/relasi_rujukan/list_relasi_rujukan');
});
 </script>