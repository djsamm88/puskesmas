<?php 
	$data = $app[0];
?>

<section class="content-header">
      <h1>
        Pengaturan Aplikasi
      </h1>     
    </section>

    <!-- Main content -->
    <section class="content">
      
	  
	   <!-- SELECT2 EXAMPLE -->
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Profil Aplikasi</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>            
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">



			<form action ="home/edit_profil" method="post" id="v_edituser">
			 <div class="row">
				
				
					<div class="col-sm-4">Nama Puskesmas </div>
					<div class="col-sm-8"><input type="text" class="form-control" name="nama_app" required value="<?php echo $data->nama_app?>">
					</div>
				
					<div class="col-sm-4"><td>Alamat </div>
					<div class="col-sm-8"><textarea class="form-control" name="alamat_app" required><?php echo $data->alamat_app?></textarea>
					</div>
				
				
					<div class="col-sm-4">Email </div>
					<div class="col-sm-8"><input type="email" class="form-control" name="keterangan_app" required value="<?php echo $data->keterangan_app?>">
					</div>


					<div class="col-sm-4">Kecamatan</div>
					<div class="col-sm-8"><input type="text" class="form-control" name="app_kec" required value="<?php echo $data->app_kec?>">
					</div>
				
					<div class="col-sm-4">Kabupaten</div>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="app_kab"  required value="<?php echo $data->app_kab?>">
							
						</div>
					
					<div class="col-sm-4">Provinsi</div>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="app_prov"  required value="<?php echo $data->app_prov?>">
							
						</div>
					
					
			</div>
				<div id="info_edit"></div>
				<br>
				 <div class="col-sm-12"> 
					<input type="submit" name="save" value="SIMPAN" class="btn btn-block btn-primary" id="save"/>
				 </div>
			 
			</form>

 </div>
 
 </section>
 
 
 <script>
 $("#v_edituser").submit(function(){
	 
	 if(confirm("Anda yakin mengubah profil?"))
	 {				
		 $.post("<?php echo base_url()?>index.php/app/update/",$(this).serialize(),function(e){
			$("#info_edit").html("<div class='alert alert-success'>Berhasil edit.</div>");
			//eksekusi_controller('index.php/home/list_admin');
			$("#save").hide();
		 })
	 }
	 
	 return false;
 })
 </script>