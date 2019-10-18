

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

        	<?php
        	if(count($info_unit)<=0)
        	{
        		echo "<div class='alert alert-danger'>Peringatan!!! Anda tidak login sebagai Unit</div>";
        	}else{
        		foreach ($info_unit as $key) {
        			
        			echo "<div class='alert alert-success'>Info!!! Anda login sebagai Unit $key->desa Kec.$key->kecamatan</div><br>";
        			echo "<div class='col-sm-2'>Puskesmas</div><div class='col-sm-10'>: $key->kecamatan</div>";
        			echo "<div class='col-sm-2'>Tanggal</div><div class='col-sm-10'>: ".date('d-m-Y H:i:s')."</div><br><hr>";
        		}
        	} 
        		

        	?>

					<!---resep dokter--->
					<div class="alert">				
										
					<br>
					<div style="clear:both"></div><br>
					<div class="col-sm-3">Cari Obat </div>
							<div class="col-sm-7">
								<input type='text' class='form-control obat' id='id_obat' value='' placeholder='Obat' >
							</div>									
					<div style="clear:both"></div><br>
					<form id="form_pembayaran" enctype="multipart/form-data">	
					<div class="col-sm-3">Tabel Order Obat </div>
					<div class="col-sm-12">
					<table class="table table-bordered" id="table_order_obat">
						<thead>
							<tr>					
								<th>Obat</th>					
								<th>Stok</th>					
								<th>Satuan</th>
								<th>Jumlah</th>
								
								<th>-</th>
							</tr>
						</thead>
						<tbody id="t4_order">

						</tbody>
					</table>
					</div>
				<div style="clear:both"></div>

				
				<div class="col-sm-4" style="text-align:right">Surat Permintaan Obat</div>
				<div class="col-sm-8">
					<input type="file" class="form-control" name="surat_permintaan" id="surat_permintaan" >
				</div> 
				<div style="clear:both"></div>
				<br>
				<div class="col-sm-4" style="text-align:right"></div>
				<div class="col-sm-8">
					<button type="submit" class="btn btn-primary">Kirim Permintaan</button>
				</div> 
				
				</form>
				</div>


				<div style="clear:both"></div>
				
				<!---resep dokter--->
				<br>

</div>
</div>
</section>

<script type="text/javascript">
	

<?php
$o=''; 
foreach($tbl_obat as $obat)
{
 $o.='{value:"'.$obat->id_obat.'",label:"'.htmlentities($obat->obat).'",stok:"'.htmlentities($obat->stok).'",satuan:"'.htmlentities($obat->satuan).'"},';
} 
?>
 $( function() {
    var availableTags_obat = [
      <?php echo $o?>
    ];
    $( ".obat" ).autocomplete({
      source: availableTags_obat,
                      minLength: 1,
                select: function(event, ui) {
                	console.log(ui);
                	
                	var template = "<tr>"+
                					"<td><input type='hidden' name='id_obat[]' value='"+ui.item.value+"'>"+ui.item.label+"</td><td>"+ui.item.stok+"</td><td>"+ui.item.satuan+"</td>"+
                					
                					"<td><input class='form-control jum' autofocus name='jumlah_obat[]' placeholder='jumlah'></td>"+
                					
                					
									"<td><button class='btn btn-danger btn-xs' id='remove_order_obat' type='button'>Hapus</button></td></tr>"
                					;
					$("#t4_order").append(template);
					$("#id_obat").val("");
					$("#id_obat").focus();

				
                }

    });


});

$("#table_order_obat").on("click","tbody tr td button#remove_order_obat",function(x){
	$(this).parent().parent().remove();
	
	return false;
})
$("#table_order_obat,body").on("click",function(){
	$(".obat").val("");
	//alert($(".obat").val());
})




$("#form_pembayaran").on("submit",function(){
	 if(confirm("Apakah obat sudah lengkap?. Anda yakin?"))
	 {
	 	$.ajax({
            url: "<?php echo base_url();?>index.php/obat/simpan_permintaan",
            type: "POST",
            contentType: false,
            processData:false,
            data:  new FormData(this),
            beforeSend: function(){
                //alert("sedang uploading...");
            },
            success: function(data){
                eksekusi_controller('index.php/obat/data_obat_permintaan_by_id_pegawai');
			     console.log(data);
                
            },
            error: function(){

            }           
       });
	 }

	return false;
});

</script>