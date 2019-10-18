	<div id="box_cari">
	<section class="content-header">
      <h1>
        <?php echo $judul?>
      </h1>     
    </section>

    <!-- Main content -->
    <section class="content" >
      
	  
	   <!-- SELECT2 EXAMPLE -->
      <div class="box box-info" >
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo $judul?></h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>            
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">

			<?php 
				if(count($query)==0)
				{
					echo "<div class='alert alert-danger'><b>Perhatian!!!</b> Data tidak ditemukan... Silahkan daftar pasien baru</div>";
					echo "<button class='btn btn-success' onclick='eksekusi_controller(\"index.php/pasien/form_simpan\")'>Daftar Pasien </button>";
				}
			?>

			<table class="table table-bordered" id="all_user">
				<thead>
				<tr>
					<th>ACTION</th>
					<th> NO.PASIEN </th>
					<th> NAMA </th>
					<th> JENIS KELAMIN </th>					
					<th> TGL LAHIR</th>					
					<th> USIA</th>										
					<th>GOL.DARAH</th>
					<th>NO BPJS</th>
					<th>NO TELP</th>
					<th> ALAMAT </th>
					
				</tr>
				
				
				</thead>

				<tbody>
			<?php
			$no=0;
			foreach($query as $row) {
				$no++;
				$invID = str_pad($row->no_pendaftaran, 5, '0', STR_PAD_LEFT);
				echo "<tr>";
				?>
					<td>
						<a href='#no_pendaftaran' onclick="proses_keluhan('<?php echo $row->no_pendaftaran;?>')" class='btn btn-success btn-xs'>Proses</a>
						
						
					</td>
				<?php
				echo "
					<td><b>$invID</b></td>
					<td>$row->nama</td>
					<td>$row->jenis_kelamin</td>					
					<td>".tglindo($row->tgl_lahir)."</td>					
					<td>$row->usia</td>
					<td>$row->gol_darah</td>
					<td>$row->no_bpjs</td>
					<td>$row->no_telp</td>
					<td>$row->alamat</td>";
					
				echo "</tr>";
				
			}
			?>
				</tbody>
			</table>
		
		
		
		<!-- body-->
		</div>




</div>
</section>
</div>


<section class="content">	  
	   <!-- SELECT2 EXAMPLE -->
      <div class="box box-success" id="form_keluhannya" style="display: none;">
        <div class="box-header with-border">
          <h3 class="box-title">Keluhan</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>            
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">

        <form id="form_keluahan">
        <div class="col-sm-6">
				<div class="col-sm-4">No.Pendaftaran </div>
					<div class="col-sm-8"><input type="text" class="form-control" name="no_pendaftaran" id="no_pendaftaran_x" disabled="disabled">
				</div>
				<div style="clear:both"></div><br>


				<div class="col-sm-4">NAMA </div>
					<div class="col-sm-8"><input type="text" class="form-control" name="nama" id="nama" disabled="disabled">
				</div>
				<div style="clear:both"></div><br>


				<div class="col-sm-4">NIK </div>
					<div class="col-sm-8"><input type="text" class="form-control" name="nik" id="nik" disabled="disabled">
				</div>
				<div style="clear:both"></div><br>
			



				<div class="col-sm-4">USIA </div>
					<div class="col-sm-8"><input type="text" class="form-control" name="usia" id="usia" disabled="disabled">
				</div>
				<div style="clear:both"></div><br>
			


				<div class="col-sm-4">NO HP </div>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="no_telp" id="no_telp" disabled="disabled">
					</div>
				<div style="clear:both"></div><br>
		</div>
		<div class="col-sm-6">

			<div class="col-sm-4">Tanggal </div>
			<div class="col-sm-8"><input type="text" class="form-control" name="tgl_mulai" id="tgl_mulai" value="<?php echo date('Y-m-d')?>" disabled>
			</div>
			<div style="clear:both"></div><br>

			<div class="col-sm-4">Jam Mulai </div>
			<div class="col-sm-8"><input type="time" class="form-control" name="jam_mulai" id="jam_mulai" value="<?php echo date('H:i')?>" readonly>
			</div>
			<div style="clear:both"></div><br>


			<div class="col-sm-4">Jam Selesai </div>
			<div class="col-sm-8"><input type="time" class="form-control" name="jam_selesai" id="jam_selesai" readonly>
			</div>
			<div style="clear:both"></div><br>


			<div class="col-sm-4">lama pemeriksaan </div>
			<div class="col-sm-4"><input type="number" class="form-control" name="lama_pemeriksaan" id="lama_pemeriksaan" readonly>
			</div>
			<div class="col-sm-4"> menit</div>
			<div style="clear:both"></div><br>
		</div>

		<div style="clear:both"></div><br>



		<hr>

		
		<input type="hidden" class="form-control" name="no_pendaftaran" id="no_pendaftaran">

			<div class="col-sm-4">KELUHAN UMUM </div>
				<div class="col-sm-8"><textarea type="text" class="form-control" name="keluhan_umum" id="keluhan_umum"></textarea>
			</div>
			<div style="clear:both"></div><br>
			
		<div class="col-sm-4">RUANGAN/POLI </div>
			<div class="col-sm-8">
				<select type="text" class="form-control" name="id_poli" id="id_poli">
					<option value="">--- Pilih Ruangan/Poli ---</option>
					<?php 
						foreach ($poli as $pol) {
							echo "<option value='$pol->id_poli'>$pol->poli</option>";
						}
					?>
			</select>
		</div>
		<div style="clear:both"></div><br>
	
		
	

		<div class="col-sm-4">TANGGAL PEMERIKSAAN </div>
			<div class="col-sm-4"><input type="text" class="form-control datepicker" name="tgl_janji" id="tgl_janji" value="<?php echo date('Y-m-d')?>"></div>
			<!--
			<div class="col-sm-4">				
				<input type="time" class="form-control" name="waktu_janji" id="waktu_janji">
			</div>
			-->
		<div style="clear:both"></div><br>
	


		<div class="col-sm-4">DOKTER </div>
			<div class="col-sm-8">
				<select type="text" class="form-control" name="id_dokter" id="id_dokter">
					<option value="">--- Pilih Dokter ---</option>
					<?php 
						foreach ($dokter as $dok) {
							echo "<option value='$dok->id_pegawai'>$dok->nama | $dok->spesialis</option>";
						}
					?>
			</select>
		</div>
		<div style="clear:both"></div><br>
		<div id="info_editnya"></div>
		<button class="btn btn-primary" type="submit" id="btn_simpan">Simpan</button>
		</form>

		<!-- body-->
		</div>
	</div>
 
 </section>
 
 <script>
$('.datepicker').datepicker({
  autoclose: true,
  format: 'yyyy-mm-dd'  
})
$("#all_user").dataTable({"scrollX": true});
function proses_keluhan(id)
{
	console.log(id);
	$.get("<?php echo base_url()?>index.php/keluhan/data_pasien_by_id_json/"+id,function(x){
		console.log(x.nama);
		$("#nama").val(x.nama);
		$("#nik").val(x.nik);
		$("#no_pendaftaran").val(x.no_pendaftaran);
		$("#no_pendaftaran_x").val(x.no_pendaftaran);
		$("#usia").val(x.usia);
		$("#no_telp").val(x.no_telp);
	})

	$("#box_cari").fadeOut();
	$("#form_keluhannya").fadeIn();
	return false;
}

$("#form_keluahan").on("submit",function(){
	var ser = $(this).serialize();
	$.post("<?php echo base_url()?>index.php/keluhan/simpan_form/",ser,function(x){
		console.log(x);
		$("#info_editnya").html("<div class='alert alert-success'>Berhasil disimpan...</div>");
		$("#btn_simpan").fadeOut();
		badge_farmasi();//ada di footer
		badge_keluhan();//ada di footer
	});
	return false;
})



	function pad_with_zeroes(number, length) {

		var my_string = '' + number;
		while (my_string.length < length) {
			my_string = '0' + my_string;
		}

		return my_string;

	}


	$("#jam_selesai").on("input",function(){
		jam();
	})


	function jam()
	{
		var startDate = new Date("<?php echo date('Y-m-d')?> "+$("#jam_mulai").val()+":00");
		// Do your operations
		var endDate   = new Date("<?php echo date('Y-m-d')?> "+$("#jam_selesai").val()+":00");
		
		var seconds = (endDate.getTime() - startDate.getTime()) / 1000;

		//$("#lama_pemeriksaan").val(seconds);
		var minutes = Math.floor(seconds / 60);
		//console.log(minutes);
		$("#lama_pemeriksaan").val(minutes);
	}


	startTime();

	function startTime() 
	{
		var today = new Date();
		var h = today.getHours();
		h = ("0" + h).slice(-2);

		var m = today.getMinutes();
		var s = today.getSeconds();
		m = checkTime(m);
		s = checkTime(s);

		$("#jam_selesai").val(h + ":" + m + ":" + s);
		var t = setTimeout(startTime, 500);
		jam();
	}

	function checkTime(i) 
	{
	  if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
	  return i;
	}

	
 </script>