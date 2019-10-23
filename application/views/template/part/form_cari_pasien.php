\<section class="content-header">
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



			<form action ="" method="post" id="v_edituser">
			 <div class="row">
				
				
					<div class="col-sm-4">NO.Rekam Medis </div>
						<div class="col-sm-8"><input type="text" class="form-control" name="no_pasien"  >
					</div>
					
					
					<div class="col-sm-12">
						<center>Atau</center>
					</div>
					<hr>
					<div class="col-sm-4">NAMA </div>
						<div class="col-sm-8"><input type="text" class="form-control" name="nama"  >
					</div>
					
					
					
					
			</div>
				
				<br>
				 <div class="col-sm-12"> 
					<input type="submit" name="save" value="CARI" class="btn btn-block btn-primary"/>
				 </div>
			 
			</form>
			<div style="clear:both"></div>
			<div id="info_edit"></div>

 </div>
 
 </section>
 
 
 <script>
 $("#v_edituser").submit(function(){
	 
	 
		 $.post("<?php echo base_url()?>index.php/kunjungan/cari_pasien/",$(this).serialize(),function(e){
			$("#info_edit").html(e);
			//eksekusi_controller('index.php/pasien/data_list');
		 })
	 
	 
	 return false;
 })
 </script>