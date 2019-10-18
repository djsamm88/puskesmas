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
				
					<input type="hidden" name="id_obat" value="<?php echo $edit->id_obat?>">



					<div class="col-sm-4">Kode </div>
						<div class="col-sm-8"><input type="text" class="form-control" name="code" required value="<?php echo $edit->code?>">
					</div>				
					<div style="clear:both"></div><br>

					<div class="col-sm-4">NAMA OBAT </div>
						<div class="col-sm-8"><input type="text" class="form-control" name="obat" required value="<?php echo $edit->obat?>">
					</div>				
					<div style="clear:both"></div><br>
					
					
					<div class="col-sm-4">SATUAN </div>
						<div class="col-sm-8"><input type="text" class="form-control" name="satuan" required value="<?php echo $edit->satuan?>">
					</div>				
					<div style="clear:both"></div><br>
					
					
				
					<div class="col-sm-4">TANGGAL EXPIRE</div>
					<div class="col-sm-8">
						
						<div class="row">
						<div class="col-sm-4">
						
							<select name="d_tgl_expire" class="form-control" required>
								
							<?php
								$a = explode("-",$edit->tgl_expire);
								
								
							
								for($i=1;$i<32;$i++)
								{
									if($i==$a[2])
									{
										$sel = "selected";
									}else{
										$sel = "";
									}
									
									
									echo "<option $sel value='$i'>$i</option>";
								}
							?>
							</select>
						</div>
						<div class="col-sm-4">
						
							<select name="m_tgl_expire" class="form-control" required>
								<option value="">---BULAN---</option>
							<?php 
								for($i=1;$i<13;$i++)
								{
									if($i==$a[1])
									{
										$sel = "selected";
									}else{
										$sel = "";
									}
									
									echo "<option $sel value='$i'>$i</option>";
								}
							?>
							</select>
						</div>
						<div class="col-sm-4">
						
							<select name="y_tgl_expire" class="form-control" required>
								<option value="">---TAHUN---</option>
							<?php 
								for($i=date('Y');$i<=(date('Y')+2);$i++)
								{
									if($i==$a[0])
									{
										$sel = "selected";
									}else{
										$sel = "";
									}
									
									
									echo "<option $sel value='$i'>$i</option>";
								}
							?>
							</select>
						</div>
						
						</div>
					</div>
					
					
					<div style="clear:both"></div><br>
					
					<div class="col-sm-4">Nomor BATCH </div>
						<div class="col-sm-8"><input type="text" class="form-control" name="nomor_batch" value="<?php echo $edit->nomor_batch?>" >
					</div>				
					
					<div style="clear:both"></div><br>
					
					<div class="col-sm-4">KATEGORI</div>
						<div class="col-sm-8">
							<select name="kategori" class="form-control" required id="kategori">
								<option value="">---PILIH---</option>							
								<option value="BIASA"> BIASA </option>							
								<option value="BMHP"> BMHP </option>							
														
							</select>
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
 $("#kategori").val("<?php echo $edit->kategori?>");
 $("#v_edituser").submit(function(){
	 
	 
		 $.post("index.php/obat/go_edit/",$(this).serialize(),function(e){
			$("#info_edit").html("<div class='alert alert-success'>Berhasil...</div>"+e);
			eksekusi_controller('index.php/obat/data_list');
		 })
	 
	 
	 return false;
 })
 </script>