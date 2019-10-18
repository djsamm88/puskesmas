<section class="content-header">
      <h1>
        Petugas Farmasi
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
					<td><b>$row->jabatan_farmasi</b></td>
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
          <form id="form_tambah_relasi_farmasi">
            <input type="hidden" name="id" id="id_relasi_farmasi" class="form-control" readonly="readonly">           

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
            	<input class="form-control" id="jabatan_farmasi" name="jabatan_farmasi">
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

$("#form_tambah_relasi_farmasi").on("submit",function(){
	var id_pegawai = $("#id_pegawai").val();
	var id_spesialis = $("#id_spesialis").val()
	if(id_pegawai=="" || id_spesialis=="")
	{
		alert("Pegawai dan jabatan harus dipilih");
		return false;
	}else{
		var ser = $(this).serialize();
		$.post("<?php echo base_url()?>index.php/relasi_farmasi/simpan_form_relasi_farmasi",ser,function(x){
			console.log(x);
			//$("#myModal").modal('hide');
			//eksekusi_controller("index.php/relasi_farmasi/list_relasi_farmasi");
			//$("#myModal").modal('hide');
			$("#info").html("<div class='alert alert-success'> Berhasil Simpan</div>");
			
		})	
	}

	
	return false;
})

function edit(id)
{
	$.get("<?php echo base_url()?>index.php/relasi_farmasi/relasi_farmasi_json/"+id,function(x){
		$("#id_relasi_farmasi").val(x[0].id);
		$("#jabatan_farmasi").val(x[0].jabatan_farmasi);
		$("#id_pegawai").val(x[0].id_pegawai);
		console.log(x[0])
	})
	$("#myModal").modal('show');
}

function hapus(id)
{
	if(confirm("Anda yakin menghapus?"))
	{
		$.get("<?php echo base_url()?>index.php/relasi_farmasi/hapus_relasi_farmasi/"+id,function(x){
			eksekusi_controller('index.php/relasi_farmasi/list_relasi_farmasi');
		});
	}
}
function tambah()
{
	$("#id_relasi_farmasi").val('');
		$("#jabatan_farmasi").val('');
	$("#myModal").modal('show');
}	

$('#myModal').modal('hide');
$('body').removeClass('modal-open');
$('.modal-backdrop').remove();

$("#myModal").on("hidden.bs.modal", function () {
  eksekusi_controller('index.php/relasi_farmasi/list_relasi_farmasi');
});
 </script>