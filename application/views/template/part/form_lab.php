<section class="content-header">
      <h1>
        Petugas
        <small>Lab</small>
      </h1>     
    </section>

    <!-- Main content -->
    <section class="content">
      
	  
	   <!-- SELECT2 EXAMPLE -->
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Data Lab</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>            
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
		<form id="form_tambah_penyakit">
            
            <div class="col-sm-6">
				<div class="col-sm-4">	ID Kunjungan</div>
				 <div class="col-sm-8"><input type="text" name="id_kunjungan" id="id_kunjungan" readonly class="form-control" value="<?php echo $all[0]->id_kunjungan?>"></div>
				<div style="clear: both;"></div><br>

				<div class="col-sm-4">	No. RM</div>
				<div class="col-sm-8"><input type="text" readonly="readonly" name="no_pendaftaran" class="form-control" value="<?php echo $all[0]->no_pendaftaran?>"></div>
				<div style="clear: both;"></div><br>


				<div class="col-sm-4">	Nama</div>
				<div class="col-sm-8">
					<input type="text"  disabled class="form-control" value="<?php echo $all[0]->nama?>">
				</div>
				<div style="clear: both;"></div><br>

				<div class="col-sm-4">	Umur</div>
				<div class="col-sm-8">
					<input type="text"  disabled class="form-control" value="<?php echo $all[0]->usia?>">
				</div>
				<div style="clear: both;"></div><br>


				<div class="col-sm-4">	Jenis Kelamin</div>
				<div class="col-sm-8">
					<input type="text"  disabled class="form-control" value="<?php echo $all[0]->jenis_kelamin?>">
				</div>
				<div style="clear: both;"></div><br>


				<div class="col-sm-4">	Alamat</div>
				<div class="col-sm-8">
					<input type="text"  disabled class="form-control" value="<?php echo $all[0]->alamat?>">
				</div>
				<div style="clear: both;"></div><br>



			</div>

			<div class="col-sm-6">
			

				<!--------------------- waktu ----------------------->
					<div class="col-sm-4">	Tanggal Pemeriksaan</div>
					<div class="col-sm-8">
						<input type="text"  disabled class="form-control" value="<?php echo date("Y-m-d")?>">
					</div>
					<div style="clear: both;"></div><br>

					<div class="col-sm-4">	Jam Mulai</div>
					<div class="col-sm-8">
						<?php 
							$waktu_end_absolute = date("H:i:s",strtotime($all[0]->tgl_selesai));
						?>
						<input name="jam_mulai" id="jam_mulai" class="form-control" value="<?php echo $waktu_end_absolute?>">
					</div>
					<div style="clear: both;"></div><br>

					<div class="col-sm-4">	Jam Selesai</div>
					<div class="col-sm-8">
						<input type="text" name="jam_selesai" id="jam_selesai"  class="form-control" >
					</div>
					<div style="clear: both;"></div><br>


					<div class="col-sm-4">	Lama</div>
					<div class="col-sm-8">
						<input type="text" name="lama_pemeriksaan" id="lama_pemeriksaan"  class="form-control" readonly>
					</div>
					<div style="clear: both;"></div><br>
					<!--------------------- waktu ----------------------->



					<div class="col-sm-4">	Petugas</div>
					<div class="col-sm-8"><input type="text" name="" id="" value="<?php echo $this->session->userdata('nama')?>" class="form-control"  disabled="disabled"></div>
					<div style="clear: both;"></div><br>

					<div class="col-sm-12"><b>Spesimen</b></div>
					<div class="col-sm-4">Jenis</div>
					<div class="col-sm-8"><input type="text" name="spesimen_jenis" id="spesimen_jenis" required="required" class="form-control" placeholder=""></div>
					<div style="clear: both;"></div><br>
					<div class="col-sm-4">	 Asal Bahan</div>
					<div class="col-sm-8"><input type="text" name="spesimen_asal_bahan" id="spesimen_asal_bahan" required="required" class="form-control" placeholder=""></div>
					<div style="clear: both;"></div><br>
					<div class="col-sm-4">	Tanggal Pengambilan SP</div>
					<div class="col-sm-8"><input type="text" name="tgl_pengambilan_sp" id="tgl_pengambilan_sp" required="required" class="form-control"  placeholder=""></div>
					<div style="clear: both;"></div><br>

				</div>
			
			<div style="clear: both;"></div><br>
			<hr>

			<div class="col-sm-4">	Haemoglobin</div>
			<div class="col-sm-8"><input type="text" name="haemoglobin" id="haemoglobin" required="required" class="form-control" placeholder=""></div>
			<div style="clear: both;"></div><br>
			<div class="col-sm-4">	Gula Darah Sewaktu</div>
			<div class="col-sm-8"><input type="text" name="gula_darah_sewaktu" id="gula_darah_sewaktu" required="required" class="form-control" placeholder=""></div>
			<div style="clear: both;"></div><br>
			<div class="col-sm-4">	Gula Darah Puasa</div>
			<div class="col-sm-8"><input type="text" name="gula_darah_puasa" id="gula_darah_puasa" required="required" class="form-control" placeholder=""></div>
			<div style="clear: both;"></div><br>
			<div class="col-sm-4">	Gula Darah 2 Jam PP</div>
			<div class="col-sm-8"><input type="text" name="gula_darah_2_jam_pp" id="gula_darah_2_jam_pp" required="required" class="form-control" placeholder=""></div>
			<div style="clear: both;"></div><br>
			<div class="col-sm-4">Asam Urat</div>
			<div class="col-sm-8"><input type="text" name="asam_urat" id="asam_urat" required="required" class="form-control" placeholder=""></div>
			<div style="clear: both;"></div><br>
			<div class="col-sm-4">	Kolesterol</div>
			<div class="col-sm-8"><input type="text" name="kolesterol" id="kolesterol" required="required" class="form-control" placeholder=""></div>
			<div style="clear: both;"></div><br>
			<div class="col-sm-4">	Tes Kehamilan</div>
			<div class="col-sm-8"><input type="text" name="tes_kehamilan" id="tes_kehamilan" required="required" class="form-control" placeholder=""></div>
			<div style="clear: both;"></div><br>
			<div class="col-sm-4">	BTA Sputum</div>
			<div class="col-sm-8"><input type="text" name="bta_sputum" id="bta_sputum" required="required" class="form-control" placeholder=""></div>
			<div style="clear: both;"></div><br>
			<div class="col-sm-4">	HIV</div>
			<div class="col-sm-8"><input type="text" name="hiv" id="hiv" required="required" class="form-control" placeholder=""></div>
			<div style="clear: both;"></div><br>
			<div class="col-sm-4">	hbsag</div>
			<div class="col-sm-8"><input type="text" name="hbsag" id="hbsag" required="required" class="form-control" placeholder=""></div>
			<div style="clear: both;"></div><br>
			<div class="col-sm-4">	Golongan Darah</div>
			<div class="col-sm-8"><input type="text" name="golongan_darah" id="golongan_darah" required="required" class="form-control" placeholder=""></div>
			<div style="clear: both;"></div><br>
			<div class="col-sm-4">	Urinalisa</div>
			<div class="col-sm-8"><input type="text" name="urinalisa" id="urinalisa" required="required" class="form-control" placeholder=""></div>
			<div style="clear: both;"></div><br>
			<div class="col-sm-4">	Frambusia</div>
			<div class="col-sm-8"><input type="text" name="frambusia" id="frambusia" required="required" class="form-control" placeholder=""></div>
			<div style="clear: both;"></div><br>
			<div class="col-sm-4">	Mantoux Test</div>
			<div class="col-sm-8"><input type="text" name="mantoux_test" id="mantoux_test" required="required" class="form-control" placeholder=""></div>
			<div style="clear: both;"></div><br>
			<div class="col-sm-4">	IGG</div>
			<div class="col-sm-8"><input type="text" name="igg" id="igg" required="required" class="form-control" placeholder=""></div>
			<div style="clear: both;"></div><br>
			<div class="col-sm-4">	IGM</div>
			<div class="col-sm-8"><input type="text" name="igm" id="igm" required="required" class="form-control" placeholder=""></div>
			<div style="clear: both;"></div><br>
			<div class="col-sm-4">	Glukosa Urin</div>
			<div class="col-sm-8"><input type="text" name="glukosa_urin" id="glukosa_urin" required="required" class="form-control" placeholder=""></div>
			<div style="clear: both;"></div><br>
			<div class="col-sm-4">	Protein Urin</div>
			<div class="col-sm-8"><input type="text" name="protein_urin" id="protein_urin" required="required" class="form-control" placeholder=""></div>
			<div style="clear: both;"></div><br>

          <div id="info_edit"></div>
          <div style="clear: both;"></div>
          <button type="submit" class="btn btn-primary" id="btn_simpan">Simpan</button>
      </form>

 </div>
 
 </section>
 
 
 <script>
 $("#form_tambah_penyakit").submit(function(){
	 
	 if(confirm("Anda yakin?"))
	 {				
		 $.post("index.php/lab/simpan_lab/",$(this).serialize(),function(e){
			$("#info_edit").html("<div class='alert alert-success'>Berhasil. Data telah kembali ke Ruangan/Poli <button class='btn btn-danger' type='button' onclick='print_lab(<?php echo $all[0]->id_kunjungan?>);return false;'>Cetak</button> </div>");
			$("#btn_simpan").hide();
		 })
	 }
	 

	 return false;
 })

function print_lab(id_kunjungan)
{
  window.open("<?php echo base_url()?>index.php/lab/view_lab_pdf/"+id_kunjungan);
  console.log(id_kunjungan);
}



 


$(function () {
	//$('#jam_mulai').datetimepicker({format: 'YYYY-MM-DD'});
});

$(function () {
	//$('#jam_selesai').datetimepicker({format: 'YYYY-MM-DD'});
});
$(function () {
	$('#tgl_pengambilan_sp').datetimepicker({format:'YYYY-MM-DD H:m:s'});
});




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