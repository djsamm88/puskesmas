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



			<form action ="<?php echo base_url()?>index.php/obat/go_laporan_obat" method="get" id="form_obat_lap" target="blank">
			 <div class="row">
				
					<div class="col-sm-12">
					<div class="input-group">
						<div class="col-sm-3">
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
						
						
						<div class="col-sm-3">
						
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


						<div class="col-sm-3">
						
							<select name="kategori" class="form-control" required id="kategori">
								<option value="">---PILIH KATEGORI---</option>							
								<option value="BIASA"> BIASA </option>							
								<option value="BMHP"> BMHP </option>																
							</select>
						</div>
						
						
					   <span class="input-group-btn">
							<button class="btn btn-primary" type="submit">View</button>
					   </span>
					</div>
					<div class="col-sm-12">
					<br>
					<button type="button" class="btn btn-primary" id="download_xl">Download Xl</button>
					<button type="button" class="btn btn-primary" id="download_pdf">Download Pdf</button>
					</div>
					</div>
						
				
						
				</div>
					
			</form>


			<hr>
			<div id="t4_view"></div>
 </div>
 
 </section>

<script>
$("#form_obat_lap").on("submit",function(){
	var ser = $(this).serialize();
	$.get("<?php echo base_url()?>index.php/obat/view_laporan_obat",ser,function(e){
		$("#t4_view").html("").html(e);
	})
	return false;
})

$("#download_xl").on("click",function(){
	var ser = $("#form_obat_lap").serialize();
	var act = $("#form_obat_lap").attr("action");
	window.open(act+"?"+ser);
});

$("#download_pdf").on("click",function(){
	var ser = $("#form_obat_lap").serialize();
	var act = "<?php echo base_url()?>index.php/obat/pdf_laporan_obat";

	window.open(act+"?"+ser);
});

/*
$("#laporan_lb1").submit(function(){
	var bulan = $("#bulan").val();
	var tahun = $("#tahun").val();
	
	//eksekusi_controller("index.php/laporan/go_lb1?bulan="+bulan+"&tahun="+tahun);
	
	return false;
})
*/
</script>
