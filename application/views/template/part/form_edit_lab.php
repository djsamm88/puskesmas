<section class="content-header">
      <h1>
        <?php echo $judul?>
      </h1>     
    </section>

    <!-- Main content -->
    <section class="content">
      
	  
	   <!-- SELECT2 EXAMPLE -->
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo $judul?></h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>            
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">



			<form action ="#" method="post" id="v_edituser">
			 <div class="row">
			<input type="hidden" value="<?php echo $edit->id?>" name="id">

			<div class="col-sm-4">	id_kunjungan</div>
			<div class="col-sm-8"><input type="text" name="id_kunjungan" id="id_kunjungan" required="required" class="form-control" placeholder="" required value="<?php echo $edit->id_kunjungan?>"></div>
			<div style="clear: both;"></div><br>

			<div class="col-sm-4">	no_pendaftaran</div>
			<div class="col-sm-8"><input type="text" name="no_pendaftaran" id="no_pendaftaran" required="required" class="form-control" placeholder="" required value="<?php echo $edit->no_pendaftaran?>"></div>
			<div style="clear: both;"></div><br>

			<div class="col-sm-4">	spesimen_jenis</div>
			<div class="col-sm-8"><input type="text" name="spesimen_jenis" id="spesimen_jenis" required="required" class="form-control" placeholder="" required value="<?php echo $edit->spesimen_jenis?>"></div>
			<div style="clear: both;"></div><br>

			<div class="col-sm-4">	spesimen_asal_bahan</div>
			<div class="col-sm-8"><input type="text" name="spesimen_asal_bahan" id="spesimen_asal_bahan" required="required" class="form-control" placeholder=""required value="<?php echo $edit->spesimen_asal_bahan?>"></div>
			<div style="clear: both;"></div><br>

			<div class="col-sm-4">	tgl_pengambilan_sp</div>
			<div class="col-sm-8"><input type="text" name="tgl_pengambilan_sp" id="tgl_pengambilan_sp" required="required" class="form-control"  placeholder=""required value="<?php echo $edit->tgl_pengambilan_sp?>"></div>
			<div style="clear: both;"></div><br>
			
			<div class="col-sm-4">	haemoglobin</div>
			<div class="col-sm-8"><input type="text" name="haemoglobin" id="haemoglobin" required="required" class="form-control" placeholder=""required value="<?php echo $edit->haemoglobin?>"></div>
			<div style="clear: both;"></div><br>

			<div class="col-sm-4">	gula_darah_sewaktu</div>
			<div class="col-sm-8"><input type="text" name="gula_darah_sewaktu" id="gula_darah_sewaktu" required="required" class="form-control" placeholder=""required value="<?php echo $edit->gula_darah_sewaktu?>"></div>
			<div style="clear: both;"></div><br>

			<div class="col-sm-4">	gula_darah_puasa</div>
			<div class="col-sm-8"><input type="text" name="gula_darah_puasa" id="gula_darah_puasa" required="required" class="form-control" placeholder=""required value="<?php echo $edit->gula_darah_puasa?>"></div>
			<div style="clear: both;"></div><br>

			<div class="col-sm-4">	gula_darah_2_jam_pp</div>
			<div class="col-sm-8"><input type="text" name="gula_darah_2_jam_pp" id="gula_darah_2_jam_pp" required="required" class="form-control" placeholder=""required value="<?php echo $edit->gula_darah_2_jam_pp?>"></div>
			<div style="clear: both;"></div><br>

			<div class="col-sm-4">	asam_urat</div>
			<div class="col-sm-8"><input type="text" name="asam_urat" id="asam_urat" required="required" class="form-control" placeholder=""required value="<?php echo $edit->asam_urat?>"></div>
			<div style="clear: both;"></div><br>

			<div class="col-sm-4">	kolesterol</div>
			<div class="col-sm-8"><input type="text" name="kolesterol" id="kolesterol" required="required" class="form-control" placeholder=""required value="<?php echo $edit->kolesterol?>"></div>
			<div style="clear: both;"></div><br>

			<div class="col-sm-4">	tes_kehamilan</div>
			<div class="col-sm-8"><input type="text" name="tes_kehamilan" id="tes_kehamilan" required="required" class="form-control" placeholder=""required value="<?php echo $edit->tes_kehamilan?>"></div>
			<div style="clear: both;"></div><br>

			<div class="col-sm-4">	bta_sputum</div>
			<div class="col-sm-8"><input type="text" name="bta_sputum" id="bta_sputum" required="required" class="form-control" placeholder=""required value="<?php echo $edit->bta_sputum?>"></div>
			<div style="clear: both;"></div><br>

			<div class="col-sm-4">	hiv</div>
			<div class="col-sm-8"><input type="text" name="hiv" id="hiv" required="required" class="form-control" placeholder=""required value="<?php echo $edit->hiv?>"></div>
			<div style="clear: both;"></div><br>

			<div class="col-sm-4">	hbsag</div>
			<div class="col-sm-8"><input type="text" name="hbsag" id="hbsag" required="required" class="form-control" placeholder=""required value="<?php echo $edit->hbsag?>"></div>
			<div style="clear: both;"></div><br>

			<div class="col-sm-4">	golongan_darah</div>
			<div class="col-sm-8"><input type="text" name="golongan_darah" id="golongan_darah" required="required" class="form-control" placeholder=""required value="<?php echo $edit->golongan_darah?>"></div>
			<div style="clear: both;"></div><br>

			<div class="col-sm-4">	urinalisa</div>
			<div class="col-sm-8"><input type="text" name="urinalisa" id="urinalisa" required="required" class="form-control" placeholder=""required value="<?php echo $edit->urinalisa?>"></div>
			<div style="clear: both;"></div><br>

			<div class="col-sm-4">	frambusia</div>
			<div class="col-sm-8"><input type="text" name="frambusia" id="frambusia" required="required" class="form-control" placeholder=""required value="<?php echo $edit->frambusia?>"></div>
			<div style="clear: both;"></div><br>

			<div class="col-sm-4">	mantoux_test</div>
			<div class="col-sm-8"><input type="text" name="mantoux_test" id="mantoux_test" required="required" class="form-control" placeholder=""required value="<?php echo $edit->mantoux_test?>"></div>
			<div style="clear: both;"></div><br>

			<div class="col-sm-4">	igg</div>
			<div class="col-sm-8"><input type="text" name="igg" id="igg" required="required" class="form-control" placeholder=""required value="<?php echo $edit->igg?>"></div>
			<div style="clear: both;"></div><br>

			<div class="col-sm-4">	igm</div>
			<div class="col-sm-8"><input type="text" name="igm" id="igm" required="required" class="form-control" placeholder=""required value="<?php echo $edit->igm?>"></div>
			<div style="clear: both;"></div><br>

			<div class="col-sm-4">	glukosa_urin</div>
			<div class="col-sm-8"><input type="text" name="glukosa_urin" id="glukosa_urin" required="required" class="form-control" placeholder=""required value="<?php echo $edit->glukosa_urin?>"></div>
			<div style="clear: both;"></div><br>

			<div class="col-sm-4">	protein_urin</div>
			<div class="col-sm-8"><input type="text" name="protein_urin" id="protein_urin" required="required" class="form-control" placeholder="" required value="<?php echo $edit->protein_urin?>"></div>
			<div style="clear: both;"></div><br>

			<div class="col-sm-4">	jam_mulai</div>
			<div class="col-sm-8"><input type="text" name="jam_mulai" id="jam_mulai" required="required" class="form-control" placeholder=""required value="<?php echo $edit->jam_mulai?>"></div>
			<div style="clear: both;"></div><br>
			
			<div class="col-sm-4">	jam_selesai</div>
			<div class="col-sm-8"><input type="text" name="jam_selesai" id="jam_selesai" required="required" class="form-control" placeholder=""required value="<?php echo $edit->jam_selesai?>"></div>
			<div style="clear: both;"></div><br>


					
					
			</div>
				<div id="info_edit"></div>
				<br>
				 <div class="col-sm-12"> 
					<input type="submit" name="save" value="SIMPAN" class="btn btn-block btn-primary"/>
				 </div>
			 
			</form>

 </div>
 
 </section>
 
 
 <script>
 $("#v_edituser").submit(function(){
	 
	 
		 $.post("index.php/c_lab/go_edit/",$(this).serialize(),function(e){
			$("#info_edit").html("<div class='alert alert-success'>Berhasil...</div>"+e);
			eksekusi_controller('index.php/c_lab/all_lab');
		 })
	 
	 
	 return false;
 })
 $(function () {
	$('#jam_mulai').datetimepicker({format: 'YYYY-MM-DD'});
});

$(function () {
	$('#jam_selesai').datetimepicker({format: 'YYYY-MM-DD'});
});
$(function () {
	$('#tgl_pengambilan_sp').datetimepicker({format:'YYYY-MM-DD H:m:s'});
});
 </script>