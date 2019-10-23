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
			<input type="hidden" value="<?php echo $edit[0]->id?>" name="id">

			<div class="col-sm-4">	id_kunjungan</div>
			<div class="col-sm-8"><input type="number" name="id_kunjungan" id="id_kunjungan" required="required" class="form-control" placeholder=""  value="<?php echo $edit[0]->id_kunjungan?>"></div>
			<div style="clear: both;"></div><br>

			<div class="col-sm-4">Riwayat Alergi</div>
			<div class="col-sm-8"><textarea class="form-control" name="riwayat_alergi"  required><?php echo $edit[0]->riwayat_alergi?></textarea></div>
			<div style="clear: both;"></div><br>

			<div class="col-sm-4">Rencana Edukasi</div>
			<div class="col-sm-8"><textarea class="form-control" name="rencana_edukasi"  required><?php echo $edit[0]->rencana_edukasi?></textarea></div>
			<div style="clear: both;"></div><br>

			<div class="col-sm-4">Ringkasan Pulang</div>
			<div class="col-sm-8">
				<textarea class="form-control" name="ringkasan_pulang"  required><?php echo $edit[0]->ringkasan_pulang?></textarea>
			</div>
			<div style="clear: both;"></div><br>

			<div class="col-sm-4">Rencana Rujukan</div>
			<div class="col-sm-8">
				<textarea class="form-control" name="rencana_rujukan"  required><?php echo $edit[0]->rencana_rujukan?></textarea>
			</div>
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
	 
	 
		 $.post("<?php echo base_url()?>index.php/c_rawat_inap/simpan_edit/",$(this).serialize(),function(e){
			$("#info_edit").html("<div class='alert alert-success'>Berhasil...</div>"+e);
			eksekusi_controller('index.php/c_rawat_inap/all_rawat_inap');
		 })
	 
	 
	 return false;
 })

 </script>