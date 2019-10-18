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

			<div class="col-sm-4">ID Timeline</div>
			<div class="col-sm-8"><input type="number" name="id_timeline" id="id_timeline" required="required" class="form-control" placeholder="" value="<?php echo $edit[0]->id_timeline?>"></div>
			<div style="clear: both;"></div><br>

			<div class="col-sm-4">Masalah</div>
			<div class="col-sm-8"><input type="text" name="masalah" id="masalah" required="required" class="form-control" placeholder="" value="<?php echo $edit[0]->masalah?>"> </div>
			<div style="clear: both;"></div><br>

			<div class="col-sm-4">Akar Masalah</div>
			<div class="col-sm-8"><input type="text" name="akar_masalah" id="akar_masalah" required="required" class="form-control" placeholder="" value="<?php echo $edit[0]->akar_masalah?>"></div>
			<div style="clear: both;"></div><br>

			<div class="col-sm-4">Rencana Penyelesaian Masalah (Plan)</div>
			<div class="col-sm-8"><input type="text" name="plan" id="plan" required="required" class="form-control" placeholder="" value="<?php echo $edit[0]->plan?>"></div>
			<div style="clear: both;"></div><br>

			<div class="col-sm-4">Penyelesaian Masalah Terpilih (DO)</div>
			<div class="col-sm-8"><textarea class="form-control" name="do"  required><?php echo $edit[0]->do?></textarea></div>
			<div style="clear: both;"></div><br>

			<div class="col-sm-4">Hasil Konseling (CHECK)</div>
			<div class="col-sm-8"><textarea class="form-control" name="hasil"  required><?php echo $edit[0]->hasil?></textarea></div>
			<div style="clear: both;"></div><br>

			<div class="col-sm-4">Masalah/Hambatan Saat Konseling</div>
			<div class="col-sm-8">
				<textarea class="form-control" name="hambatan"  required><?php echo $edit[0]->hambatan?></textarea>
			</div>
			<div style="clear: both;"></div><br>

			<div class="col-sm-4">Rencana Tindak Lanjut Setelah Konseling</div>
			<div class="col-sm-8"><input type="text" name="rencana_tinjut" id="rencana_tinjut" required="required" class="form-control" placeholder="" value="<?php echo $edit[0]->rencana_tinjut?>"></div>
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
	 
	 
		 $.post("index.php/c_konseling/simpan_edit/",$(this).serialize(),function(e){
			$("#info_edit").html("<div class='alert alert-success'>Berhasil...</div>"+e);
			eksekusi_controller('index.php/c_konseling/all_konse');
		 })
	 
	 
	 return false;
 })

 </script>