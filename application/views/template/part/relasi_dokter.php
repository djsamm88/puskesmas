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
					
					<th width="15px">NO</th>
					<th> EMAIL </th>
					<th> NIP </th>
					<th> NAMA </th>
					<th> PANGKAT/GOL </th>
					<th> SPESIALIS </th>					
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
					<td><b>$row->spesialis</b></td>
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
          <form id="form_tambah_relasi_dokter">
            <input type="hidden" name="id" id="id_relasi_dokter" class="form-control" readonly="readonly">           

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

            <div class="col-sm-4">Spesialis</div>
            <div class="col-sm-8">
            	<select class="form-control" id="id_spesialis" name="id_spesialis">
            		<option value="">--- Pilih Spesialis ---</option>
            		<?php 

            			foreach ($spesialis as $spes) {
            				echo "<option value='$spes->id'>$spes->spesialis</option>";
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

$("#form_tambah_relasi_dokter").on("submit",function(){
	var id_pegawai = $("#id_pegawai").val();
	var id_spesialis = $("#id_spesialis").val()
	if(id_pegawai=="" || id_spesialis=="")
	{
		alert("Pegawai dan jabatan harus dipilih");
		return false;
	}else{
		var ser = $(this).serialize();
		$.post("<?php echo base_url()?>index.php/home/simpan_form_relasi_dokter",ser,function(x){
			console.log(x);
			//$("#myModal").modal('hide');
			//eksekusi_controller("index.php/home/list_relasi_dokter");
			//$("#myModal").modal('hide');
			$("#info").html("<div class='alert alert-success'> Berhasil Simpan</div>");
			
		})	
	}

	
	return false;
})

function edit(id)
{
	$.get("<?php echo base_url()?>index.php/home/relasi_dokter_json/"+id,function(x){
		$("#id_relasi_dokter").val(x[0].id);
		$("#id_spesialis").val(x[0].id_spesialis);
		$("#id_pegawai").val(x[0].id_pegawai);
		console.log(x[0])
	})
	$("#myModal").modal('show');
}

function hapus(id)
{
	if(confirm("Anda yakin menghapus?"))
	{
		$.get("<?php echo base_url()?>index.php/home/hapus_relasi_dokter/"+id,function(x){
			eksekusi_controller('index.php/home/list_relasi_dokter');
		});
	}
}
function tambah()
{
	$("#id_relasi_dokter").val('');
		$("#jabatan").val('');
	$("#myModal").modal('show');
}	

$('#myModal').modal('hide');
$('body').removeClass('modal-open');
$('.modal-backdrop').remove();

$("#myModal").on("hidden.bs.modal", function () {
  eksekusi_controller('index.php/home/list_relasi_dokter');
});
 </script>