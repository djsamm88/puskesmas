

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
					<div class="col-sm-8"><input type="text" class="form-control" name="no_pendaftaran" id="no_pendaftaran" readonly="readonly">
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

		
		<input type="hidden" class="form-control" name="id_kunjungan" id="id_kunjungan">
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
	
		
			<div class="col-sm-4">KELUHAN UMUM </div>
			<div class="col-sm-8"><textarea type="text" class="form-control" name="keluhan_umum" id="keluhan_umum"></textarea>
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
 <script type="text/javascript">
proses_keluhan("<?php echo $id_kunjungan?>"); 	
function proses_keluhan(id)
{
	console.log(id);
	$.get("<?php echo base_url()?>index.php/keluhan/data_pasien_keluhan_by_id_json/"+id,function(ev){
		console.log(x);
		var x = ev[0];
		$("#nama").val(x.nama);
		$("#nik").val(x.nik);
		$("#id_kunjungan").val(x.id_kunjungan);
		$("#no_pendaftaran").val(x.no_pendaftaran);
		$("#usia").val(x.usia);
		$("#no_telp").val(x.no_telp);
		$("#keluhan_umum").val(x.keluhan_umum);
		$("#tgl_janji").val(x.tgl_janji);
		$("#id_dokter").val(x.id_dokter);
		$("#id_poli").val(x.id_poli);
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
 </script>