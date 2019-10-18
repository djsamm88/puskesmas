<section class="content-header">
      <h1>
        Form Gizi
        <small></small>
      </h1>     
    </section>

 <!-- Main content -->
    <section class="content">
      
	  
	   <!-- SELECT2 EXAMPLE -->
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Data Pasien</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>            
          </div>
        </div>
        <!-- /.box-header -->
      <div class="box-body">
      <form id="form_tambah_penyakit">
      <div class="col-sm-6">
  			<div class="col-sm-4">No Pendaftaran</div>
              <div class="col-sm-8">
              <input type="text" name="no_pendaftaran" value="<?php echo $all[0]->no_pendaftaran?>" class="form-control" readonly="readonly"></div>
  			<div style="clear: both;"></div><br>

  			<div class="col-sm-4">No BPJS</div>
              <div class="col-sm-8">
              <input type="text" name="no_bpjs" value="<?php echo $all[0]->no_bpjs?>" class="form-control" disabled></div>
  			<div style="clear: both;"></div><br>

  			<div class="col-sm-4">Nama</div>
              <div class="col-sm-8">
              <input type="text" name="nama" value="<?php echo $all[0]->nama?>" class="form-control" disabled></div>
  			<div style="clear: both;"></div><br>
  			
  			<div class="col-sm-4">Usia</div>
              <div class="col-sm-8">
              <input type="text" name="usia" value="<?php echo $all[0]->usia?>" class="form-control" disabled></div>
  			<div style="clear: both;"></div><br>

  			<div class="col-sm-4">Jenis Kelamin</div>
              <div class="col-sm-8">
              <input type="text" name="jenis_kelamin" value="<?php echo $all[0]->jenis_kelamin?>" class="form-control" disabled></div>
  			<div style="clear: both;"></div><br>

  			<div class="col-sm-4">Alamat</div>
              <div class="col-sm-8">
              <input type="text" name="alamat" value="<?php echo $all[0]->alamat?>" class="form-control" disabled></div>
  			<div style="clear: both;"></div><br>

  			<div class="col-sm-4">Tanggal Kunjungan</div>
              <div class="col-sm-8">
              <input type="text" name="tgl_kunjungan" value="<?php echo $all[0]->tgl_kunjungan?>" class="form-control" disabled></div>
  			<div style="clear: both;"></div><br>

  			<div class="col-sm-4">Diagnosa Sementara</div>
              <div class="col-sm-8">
              	<?php 
              		echo "<table class='table'>";
              			foreach ($diag as $x) {
              				echo "
              					<tr>
              						<td>$x->code_diagnosa</td>
              						<td>$x->diagnosa</td>
              					</tr>
              				";
              			}
              		echo "</table>";
              	?>
              </div>
  			<div style="clear: both;"></div><br>
      </div>
      <div class="col-sm-6">

        <!--------------------- waktu ----------------------->
          <div class="col-sm-4">  Tanggal Pemeriksaan</div>
          <div class="col-sm-8">
            <input type="text"  disabled class="form-control" value="<?php echo date("Y-m-d")?>">
          </div>
          <div style="clear: both;"></div><br>

          <div class="col-sm-4">  Jam Mulai</div>
          <div class="col-sm-8">
            <?php 
              $waktu_end_absolute = date("H:i:s",strtotime($all[0]->tgl_selesai));
            ?>
            <input name="jam_mulai" id="jam_mulai" class="form-control" value="<?php echo $waktu_end_absolute?>">
          </div>
          <div style="clear: both;"></div><br>

          <div class="col-sm-4">  Jam Selesai</div>
          <div class="col-sm-8">
            <input type="text" name="jam_selesai" id="jam_selesai"  class="form-control" >
          </div>
          <div style="clear: both;"></div><br>


          <div class="col-sm-4">  Lama</div>
          <div class="col-sm-8">
            <input type="text" name="lama_pemeriksaan" id="lama_pemeriksaan"  class="form-control" readonly>
          </div>
          <div style="clear: both;"></div><br>
          <!--------------------- waktu ----------------------->

      </div>
		
	

      <div class="col-sm-4">Tinggi Badan</div>
            <div class="col-sm-6">
              <input type="text" name="nama" value="<?php echo $all[0]->tinggi_badan?>" class="form-control" disabled>
            </div>
            <div class="col-sm-2">
              cm
            </div>
      <div style="clear: both;"></div><br>
      <div class="col-sm-4">Berat Badan</div>
            <div class="col-sm-6">
              <input type="text" name="nama" value="<?php echo $all[0]->berat_badan?>" class="form-control" disabled>
            </div>
            <div class="col-sm-2">
              gram
            </div>
      <div style="clear: both;"></div><br>
      <div class="col-sm-4">Tekanan darah</div>
            <div class="col-sm-6">
              <input type="text" name="nama" value="<?php echo $all[0]->td?>" class="form-control" disabled>
            </div>
            <div class="col-sm-2">
              mmHg
            </div>
      <div style="clear: both;"></div><br>
      <div class="col-sm-4">KIE</div>
            <div class="col-sm-6">
              <input type="text" name="nama" value="<?php echo $all[0]->kie?>" class="form-control" disabled>
            </div>
            <div class="col-sm-2">
              
            </div>      
      <div style="clear: both;"></div><br>



      
      <input type="hidden" name="id_kunjungan" value="<?php echo $all[0]->id_kunjungan?>" class="form-control" readonly="readonly">
			<div class="col-sm-4">Lingkar Kepala</div>
			 <div class="col-sm-6">
          <input type="number" name="lingkar_kepala" id="lingkar_kepala" required="required" class="form-control" placeholder="" value="<?php echo $all[0]->lingkar_kepala?>">
        </div>
        <div class="col-sm-2">
          cm      
        </div>      
			<div style="clear: both;"></div><br>

			<div class="col-sm-4">Rambut</div>
			<div class="col-sm-8"><input type="text" name="rambut" id="rambut" required="required" class="form-control" placeholder="" value="<?php echo $all[0]->rambut?>">
			</div>
			<div style="clear: both;"></div><br>

			<div class="col-sm-4">Anamnesa</div>
			<div class="col-sm-8"><input type="text" name="anamnesa" id="anamnesa" required="required" class="form-control" placeholder=""value="<?php echo $all[0]->anamnesa?>">
			</div>
			<div style="clear: both;"></div><br>

			<div class="col-sm-4">Status Imunisasi</div>
			<div class="col-sm-8"><input type="text" name="status_imunisasi" id="status_imunisasi" required="required" class="form-control" placeholder="" value="<?php echo $all[0]->status_imunisasi?>">
			</div>
			<div style="clear: both;"></div><br>

			<div class="col-sm-4">Diagnosa Gizi</div>
			<div class="col-sm-8"><input type="text" name="diagnosa_gizi" id="diagnosa_gizi" required="required" class="form-control"  placeholder="" value="<?php echo $all[0]->diagnosa_gizi?>">
			</div>
			<div style="clear: both;"></div><br>

      
      <div id="info_edit"></div>
      <div style="clear: both;"></div>
      <button type="submit" class="btn btn-primary" id="btn_simpan">Simpan</button>
  

 </div>
 
 </section>
 
 
 <script>
 $("#form_tambah_penyakit").submit(function(){
	 
	 if(confirm("Anda yakin?"))
	 {				
		 $.post("index.php/master_gizi/go_edit/",$(this).serialize(),function(e){
			$("#info_edit").html("<div class='alert alert-success'>Berhasil. Data telah kembali ke Ruangan/Poli <button class='btn btn-danger' type='button' onclick='print_gizi(<?php echo $all[0]->id_kunjungan?>);return false;'>Cetak</button> </div>");
			//eksekusi_controller('index.php/master_gizi/data_kunjungan_gizi');
      $("#btn_simpan").hide();
      console.log(e);
		 })
	 }
	 

	 return false;
 })

function print_gizi(id_kunjungan)
{
  window.open("<?php echo base_url()?>index.php/master_gizi/view_hasil_gizi_by_id_kunjungan_pdf/"+id_kunjungan);
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