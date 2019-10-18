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
			<form id="penerimaan">
			
			
					<div class="col-sm-3">						
						NAMA OBAT
					</div>
					<div class="col-sm-3">
						TGL EXPIRE (Bulan/Hari/Tahun)
					</div>
					<div class="col-sm-3">
						PEMBERIAN
					</div>
					<div class="col-sm-1">
						JUMLAH
					</div>
					<div class="col-sm-2">
						<button id="tambah_diag" class="btn btn-danger"><span class="fa  fa-plus"> TAMBAH</span></button>
					</div>
					<br>
					<div style="clear:both"></div>
					<br>
					
					
					<div class="col-sm-3">						
						<div id="t4_input_diagnosa_lagi"></div>
					</div>
					<div class="col-sm-8">
						<div class="row">
							<div id="t4_tgl_dan_stok"></div>
						</div>
					</div>					
					<br>
					<div style="clear:both"></div>
					<br>
					
			
			<input type="submit" value="Simpan" class="btn btn-lg btn-success btn-block">
			</form>
		
		
			<div id="info"></div>
		<!-- body-->
		</div>
 
 </section>
 
 <script>
	
	//$("#all_user").dataTable({"scrollX": true});
	

$("#penerimaan").submit(function(){
	
	if(confirm("Obat baru sudah lengkap?"))
	{
		$.post("index.php/obat/go_penerimaan",$(this).serialize(),function(e){
		
		//$("#info").html(e);
		eksekusi_controller("index.php/obat/data_list");
		
		});
		
	}
	return false;
})

<?php
$a=''; 
foreach($query as $obat)
{
 $a.='{value:"'.$obat->id_obat.'",label:"'.htmlentities($obat->obat).' | '.$obat->id_obat.'"},';
} 
?>

tambah_diag("<?php echo date('Y')+1?>-<?php echo date('m-d')?>");
 function tambah_diag(tgl_perkiraan)
 {
	
		var $input = $("<input>", {name: "id_obat[]","class": " form-control","placeholder":"Nama Obat","required":"required"});		 
		
		
		var opsi = "<option value='DAU'>DAU</option><option value='DAK'>DAK</option><option value='ASKES'>ASKES</option>";

		var $aa = $("<div class='col-sm-4'><input type='date' class='form-control code_diagnosa' id='tgl_expire' value='"+tgl_perkiraan+"' name='tgl_expire[]' placeholder='tgl_expire'></div><div class='col-sm-5'><select class='form-control' name='pemberian[]' required>"+opsi+"</select></div>"+
						"<div class='col-sm-2'><input type='number' class='form-control' name='stok[]' placeholder='jumlah' required></div>");
		 
		var availableTags = [
		  <?php echo $a?>
		];
        $input.appendTo("div#t4_input_diagnosa_lagi").focus().autocomplete({source: availableTags});
		$aa.appendTo("div#t4_tgl_dan_stok");
		
 }
 $("#tambah_diag").click(function(){
	
	
	var tgl_expire = $("#t4_tgl_dan_stok").find("#tgl_expire").val();
	
	tambah_diag(tgl_expire);
	
 })
 



</script>