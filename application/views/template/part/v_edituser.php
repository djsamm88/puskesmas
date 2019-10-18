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
				
					<div class="col-sm-4">ID USER</div>
					<div class="col-sm-8"><input type="text" class="form-control" name="id_user" value="<?php echo $edit[0]->id_pegawai; ?>" readonly>
					</div>
				

					<div class="col-sm-4">NIP</div>
					<div class="col-sm-8"><input type="text" class="form-control" name="nip" value="<?php echo $edit[0]->nip; ?>" >
					</div>

					<div class="col-sm-4">NAMA</div>
					<div class="col-sm-8"><input type="text" class="form-control" name="nama" value="<?php echo $edit[0]->nama; ?>" >
					</div>
				
					<div class="col-sm-4"><td>EMAIL</div>
					<div class="col-sm-8"><input type="email" class="form-control" name="email" value="<?php echo $edit[0]->email; ?>">
					</div>
				
				
					<div class="col-sm-4">PANGKAT</div>
					<div class="col-sm-8"><input type="text" class="form-control" name="pangkat" value="<?php echo $edit[0]->pangkat; ?>" >
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
					<input type="submit" name="save" value="EDIT" class="btn btn-block btn-warning"/>
				 </div>
			 
			</form>

 </div>
 
 </section>
 
 
 <script>
 $("#v_edituser").submit(function(){
	 
	 if(confirm("Anda yakin mengubah profil?"))
	 {				
		 $.post("index.php/home/edit_profil/",$(this).serialize(),function(e){
			$("#info_edit").html("<div class='alert alert-success'>Berhasil edit.</div>");
			eksekusi_controller('index.php/home/form_edit/<?php echo $this->session->userdata('id_user');?>');
			console.log(e);
		 })
	 }
	 
	 return false;
 })
 </script>