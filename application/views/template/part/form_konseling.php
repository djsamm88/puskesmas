<section class="content-header">
      <h1>
        Admin
        <small>Konseling</small>
      </h1>     
    </section>

    <!-- Main content -->
    <section class="content">
      
	  
	   <!-- SELECT2 EXAMPLE -->
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Data Konseling</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>            
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
<form id="form_tambah_penyakit">
            <input type="hidden" name="id" id="id_penyakit" class="form-control" readonly="readonly">

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


				</div>
			
			<div style="clear: both;"></div><br>
			<hr>




			<div class="col-sm-4">Masalah</div>
			<div class="col-sm-8"><textarea type="text" name="masalah" id="masalah" required="required" class="form-control" placeholder=""></textarea></div>
			<div style="clear: both;"></div><br>

			<div class="col-sm-4">Akar Masalah</div>
			<div class="col-sm-8"><textarea type="text" name="akar_masalah" id="akar_masalah" required="required" class="form-control" placeholder=""></textarea></div>
			<div style="clear: both;"></div><br>

			<div class="col-sm-4">Rencana Penyelesaian Masalah (Plan)</div>
			<div class="col-sm-8"><textarea type="text" name="plan" id="plan" required="required" class="form-control" placeholder=""></textarea></div>
			<div style="clear: both;"></div><br>

			<div class="col-sm-4">Penyelesaian Masalah Terpilih (DO)</div>
			<div class="col-sm-8"><textarea class="form-control" name="do"  required></textarea></div>
			<div style="clear: both;"></div><br>

			<div class="col-sm-4">Hasil Konseling (CHECK)</div>
			<div class="col-sm-8"><textarea class="form-control" name="hasil"  required></textarea></div>
			<div style="clear: both;"></div><br>

			<div class="col-sm-4">Masalah/Hambatan Saat Konseling</div>
			<div class="col-sm-8"><textarea class="form-control" name="hambatan"  required></textarea></div>
			<div style="clear: both;"></div><br>

			<div class="col-sm-4">Rencana Tindak Lanjut Setelah Konseling</div>
			<div class="col-sm-8"><input type="text" name="rencana_tinjut" id="rencana_tinjut" required="required" class="form-control" placeholder=""></div>
			<div style="clear: both;"></div><br>

          <div style="clear: both;"></div>
          <div id="info_edit"></div>
          <button type="submit" class="btn btn-primary" id="btn_simpan">Simpan</button>
      </form>

 </div>
 
 </section>
 
 
 <script>
 $("#form_tambah_penyakit").submit(function(){
	 
	 if(confirm("Anda yakin?"))
	 {				
		 $.post("<?php echo base_url()?>index.php/c_konseling/simpan_konse/",$(this).serialize(),function(e){
			$("#info_edit").html("<div class='alert alert-success'>Berhasil. Data telah disimpan. <button class='btn btn-danger' type='button' onclick='print_konseling(<?php echo $all[0]->id_kunjungan?>);return false;'>Cetak</button> </div>");
			$("#btn_simpan").hide();
			//eksekusi_controller('index.php/c_konseling/all_konse');
		 })
	 }
	 

	 return false;
 })

 
function print_konseling(id_kunjungan)
{
  window.open("<?php echo base_url()?>index.php/c_konseling/view_konse_pdf/"+id_kunjungan);
  console.log(id_kunjungan);
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