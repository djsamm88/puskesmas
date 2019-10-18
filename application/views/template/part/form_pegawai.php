<section class="content-header">
      <h1>
        Admin
        <small>Profil</small>
      </h1>     
    </section>

    <!-- Main content -->
    <section class="content">
      
	  
	   <!-- SELECT2 EXAMPLE -->
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Data Profil</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>            
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">



			<form action ="home/edit_profil" method="post" id="v_edituser">
			 <div class="row">
				
				
					<div class="col-sm-4">NAMA </div>
					<div class="col-sm-8"><input type="text" class="form-control" name="nama" required >
					</div>
				
					<div class="col-sm-4"><td>EMAIL</div>
					<div class="col-sm-8"><input type="email" class="form-control" name="email" required>
					</div>
				
				
					<div class="col-sm-4">Pangkat</div>
					<div class="col-sm-8"><input type="text" class="form-control" name="pangkat" required>
					</div>


					<div class="col-sm-4">NIP</div>
					<div class="col-sm-8"><input type="text" class="form-control" name="nip" required>
					</div>
				
					<div class="col-sm-4">PASSWORD</div>
						<div class="col-sm-8">
							<input type="password" class="form-control" name="password" value="" required>
							
						</div>
					<div class="col-sm-4">CONFIRM PASSWORD</div>
						<div class="col-sm-8">
							<input type="password" class="form-control" name="confirm-password" value="" required>
							
						</div>
				
					
					
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
	 
	 if(confirm("Anda yakin mengubah profil?"))
	 {				
		 $.post("index.php/home/go_simpan_pegawai/",$(this).serialize(),function(e){
			$("#info_edit").html("<div class='alert alert-success'>Berhasil edit.</div>");
			eksekusi_controller('index.php/home/list_admin');
		 })
	 }
	 
	 return false;
 })
 </script>