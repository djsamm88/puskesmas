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



			<form action ="home/edit_profil" method="post" id="v_edituser">
			 <div class="row">
					<input type="hidden" value="<?php echo $edit->no_pendaftaran?>" name="no_pendaftaran">
				
					<div class="col-sm-4">NAMA </div>
						<div class="col-sm-8"><input type="text" class="form-control" name="nama" required value="<?php echo $edit->nama?>">
					</div>
					<div style="clear:both"></div><br>


					<div class="col-sm-4">NIK </div>
						<div class="col-sm-8"><input type="text" class="form-control" name="nik" required value="<?php echo $edit->nik?>">
					</div>
					<div style="clear:both"></div><br>
				
				
					<div class="col-sm-4">JENIS KELAMIN</div>
					<div class="col-sm-4">
						<select class="form-control" name="jenis_kelamin" required>
							
							<?php 
							if($edit->jenis_kelamin=='L')
							{
								echo 	'<option value="L" selected>Laki-laki</option>
										<option value="P">Perempuan</option>';
							}else{
								echo 	'<option value="L" >Laki-laki</option>
										<option value="P" selected>Perempuan</option>';
							}
							?>
							
							
						</select>
					</div>
					<div class="col-sm-4"></div>
					<div style="clear:both"></div><br>
					
					
				
					<div class="col-sm-4">TANGGAL LAHIR</div>
					<div class="col-sm-4">
						
						<input type="text" name="tgl_lahir" value="<?php echo $edit->tgl_lahir?>" class="form-control" required>
					</div>
					<div class="col-sm-4">FORMAT:YYYY-MM-DD</div>
					<div style="clear:both"></div><br>
					
					
					<div class="col-sm-4">GOL DARAH </div>
						<div class="col-sm-4"><input type="text" class="form-control" name="gol_darah"  value="<?php echo $edit->gol_darah?>">
					</div>
					<div class="col-sm-4"></div>
					<div style="clear:both"></div><br>
					<div class="col-sm-4">AGAMA </div>
					<div class="col-sm-8"><input type="text" class="form-control" name="agama"  value="<?php echo $edit->agama?>">								
					</div>			
					<div style="clear:both"></div><br>
					
					<div class="col-sm-4">STATUS PERKAWINAN </div>
					<div class="col-sm-8"><input type="text" class="form-control" name="status_perkawinan"  value="<?php echo $edit->status_perkawinan?>">											
						</div>
					<div style="clear:both"></div><br>
					


					<div class="col-sm-4">PENDIDIKAN </div>
					<div class="col-sm-8"><input type="text" class="form-control" name="pendidikan"  value="<?php echo $edit->pendidikan?>">											
						</div>
					<div style="clear:both"></div><br>
					
					
					<div class="col-sm-4">SUKU </div>
						<div class="col-sm-8"><input type="text" class="form-control" name="suku"  value="<?php echo $edit->suku?>">
					</div>
					
					<div style="clear:both"></div><br>
					
					
					
					<div class="col-sm-4">TELEPON </div>
						<div class="col-sm-8"><input type="text" class="form-control" name="no_telp" required value="<?php echo $edit->no_telp?>">
					</div>
					<div style="clear:both"></div><br>
					
					<div class="col-sm-4">ALAMAT </div>
						<div class="col-sm-8">
							<textarea name="alamat" class="form-control" required><?php echo $edit->alamat?></textarea>
					</div>
					<div style="clear:both"></div><br>
				
					<div class="col-sm-4">DESA </div>
						<div class="col-sm-8"><input type="text" class="form-control" name="desa"  value="<?php echo $edit->desa?>">
					</div>
					<div style="clear:both"></div><br>
					
					
					<div class="col-sm-4">KECAMATAN </div>
						<div class="col-sm-8"><input type="text" class="form-control" name="kecamatan"  value="<?php echo $edit->kecamatan?>">
					</div>
					<div style="clear:both"></div><br>
					
					
					<div class="col-sm-4">KABUPATEN </div>
						<div class="col-sm-8"><input type="text" class="form-control" name="kabupaten"  value="<?php echo $edit->kabupaten?>">
					</div>
					
					<div style="clear:both"></div><br>


					
					<hr>

					<div class="col-sm-4">NAMA PENANGGUNG JAWAB </div>
						<div class="col-sm-8"><input type="text" class="form-control" name="nama_penanggung_jawab"  value="<?php echo $edit->nama_penanggung_jawab?>">
					</div>
					
					<div style="clear:both"></div><br>
					<div class="col-sm-4">HP PENANGGUNG JAWAB </div>
						<div class="col-sm-8"><input type="text" class="form-control" name="no_hp_penanggung_jawab"  value="<?php echo $edit->no_hp_penanggung_jawab?>">
					</div>
					
					<div style="clear:both"></div><br>

					<div style="clear:both"></div><br>
					<div class="col-sm-4">JENIS JAMINAN KESEHATAN </div>
						<div class="col-sm-8"><input type="text" class="form-control" name="jaminan_kesehatan"  value="<?php echo $edit->jaminan_kesehatan?>">
					</div>
					
					<div style="clear:both"></div><br>
					

					
					<div class="col-sm-4">NO BPJS </div>
						<div class="col-sm-8"><input type="text" class="form-control" name="no_bpjs"  value="<?php echo $edit->no_bpjs?>">
					</div>
					<div style="clear:both"></div><br>
					
					
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
	 
	 
		 $.post("<?php echo base_url()?>index.php/pasien/go_edit/",$(this).serialize(),function(e){
			$("#info_edit").html("<div class='alert alert-success'>Berhasil...</div>"+e);
			eksekusi_controller('index.php/pasien/data_list');
		 })
	 
	 
	 return false;
 })
 </script>