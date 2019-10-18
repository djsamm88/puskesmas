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



			<form action ="index.php/laporan/go_lb1" method="get" id="laporan_lb1" target="blank">
			 <div class="row">
				
					<div class="col-sm-12">
					<div class="input-group">
						<div class="col-sm-4">
							<select name="bulan" class="form-control" required id="bulan">
								<option value="">---BULAN---</option>
							<?php 
								for($i=1;$i<13;$i++)
								{
									echo "<option value='$i'>$i</option>";
								}
							?>
							</select>
						</div>
						
						
						<div class="col-sm-4">
						
							<select name="tahun" class="form-control" required id="tahun">
								<option value="">---TAHUN---</option>
							<?php 
								for($i=date('Y');$i>(date('Y')-5);$i--)
								{
									echo "<option value='$i'>$i</option>";
								}
							?>
							</select>
						</div>
						
						
					   <span class="input-group-btn">
							<button class="btn btn-default" type="submit">Download!</button>
					   </span>
					</div>
					</div>
						
				
						
				</div>
					
			</form>

 </div>
 
 </section>

<script>
/*
$("#laporan_lb1").submit(function(){
	var bulan = $("#bulan").val();
	var tahun = $("#tahun").val();
	
	//eksekusi_controller("index.php/laporan/go_lb1?bulan="+bulan+"&tahun="+tahun);
	
	return false;
})
*/
</script>
