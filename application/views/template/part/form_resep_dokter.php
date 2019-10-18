

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


        <form id="simpan_resep">
        	<input type="hidden" name="id_kunjungan" value="<?php echo($id_kunjungan)?>">
		<div class="col-sm-6">
			<div class="col-sm-4">No.Pendaftaran </div>
				<div class="col-sm-8"><input type="text" class="form-control" name="no_pendaftaran_x" id="no_pendaftaran_x" readonly="readonly" value="<?php echo str_pad($x[0]->no_pendaftaran, 5, '0', STR_PAD_LEFT)?>">
			</div>
			<div style="clear:both"></div><br>

			<div class="col-sm-4">NAMA </div>
				<div class="col-sm-8"><input type="text" class="form-control" name="nama" id="nama" readonly="" value="<?php echo $x[0]->nama?>">
			</div>
			<div style="clear:both"></div><br>

			<div class="col-sm-4">No.BPJS </div>
				<div class="col-sm-8"><input type="text" class="form-control" name="no_bpjs" id="no_bpjs" readonly="" value="<?php echo $x[0]->no_bpjs?>">
			</div>
			<div style="clear:both"></div><br>

			<div class="col-sm-4">USIA </div>
				<div class="col-sm-8"><input type="text" class="form-control" name="usia" id="usia" readonly="" value="<?php echo $x[0]->usia?>">
			</div>
			<div style="clear:both"></div><br>
		</div>
		
			
		<div class="col-sm-6">
			<div class="col-sm-4">Tanggal </div>
				<div class="col-sm-8"><input type="text" class="form-control" name="tgl_mulai" id="tgl_mulai" value="<?php echo date('Y-m-d')?>" readonly="">
			</div>
			<div style="clear:both"></div><br>
			<div class="col-sm-4">Nama Dokter </div>
				<div class="col-sm-8"><input type="text" class="form-control" name="nama_dokter" id="nama_dokter" value="<?php echo $x[0]->nama_dokter?>" readonly="">
			</div>			
			<div style="clear:both"></div><br>
		</div>

		<div style="clear:both"></div><br>

		<hr>
					<div class="col-sm-4"><b>Resep Dokter</b></div><div style="clear: both;"></div>
					<br>
					



		<div style="clear:both"></div><br>

		<div class="col-sm-3">Cari Obat </div>
				<div class="col-sm-7">
					<input type='text' class='form-control obat' id='id_obat' value='' placeholder='Obat' >
				</div>			
		<div class="col-sm-2">
			<!--<button class="btn btn-primary btn-block" id="add_obat">+ Obat </button>-->
		</div>			
		<div style="clear:both"></div><br>
		<div class="col-sm-3">Tabel Order Obat </div>
		<div class="col-sm-12">
		<table class="table table-bordered" id="table_order">
			<thead>
				<tr>					
					<th>Obat</th>					
					<th>Stok</th>					
					<th>Satuan</th>
					<th>Jumlah</th>
					<th>Aturan Pakai</th>
					<th>Waktu Konsumsi</th>
					<th>Keterangan</th>
					<th>-</th>
				</tr>
			</thead>
			<tbody id="t4_order">

			</tbody>
		</table>
		</div>

		<!-------obat lain-------->
		<div style="clear:both"></div><br>
		<div class="col-sm-3">Tabel Order Obat Lainnya</div>
		<div class="col-sm-12">
			<button type="button" id="tambah_obat_lain" class="btn btn-primary">Tambah</button>
		<table class="table table-bordered" id="table_order_obat_lain">
			<thead>
				<tr>					
					<th>Obat</th>													
					<th>Satuan</th>
					<th>Jumlah</th>
					<th>Aturan Pakai</th>
					<th>Waktu Konsumsi</th>
					<th>Keterangan</th>
					<th>-</th>
				</tr>
			</thead>
			<tbody id="t4_order_obat_lain">

			</tbody>
		</table>
		</div>
		<!-------obat lain-------->

					
				 <div class="col-sm-12"> 
				 	<div id="info_edit"></div>
					<input type="submit" name="save" value="SIMPAN" class="btn btn-block btn-primary" id="btn_simpan" />
				 </div>
			 
			</form>

 
 	</div>

 </section>
 
 
 <script>
 $("#simpan_resep").submit(function(){	 
 	if(confirm("Apakah resep sudah selesai?"))
 	{
 		$.post("<?php echo base_url()?>index.php/kunjungan/go_simpan_resep/",$(this).serialize(),function(e){
			console.log(e);
			$("#info_edit").html("<div class='alert alert-success'>Berhasil disimpan... data telah dikirim ke Farmasi.</div>");
			//eksekusi_controller('index.php/kunjungan/data_list');
			$("#btn_simpan").fadeOut();
		 })	 
		 return false;	
 	}
	 return false;	
 });



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
                      minLength: 2,
                select: function(event, ui) {
                	console.log(ui);
                	
                	var template = "<tr>"+
                					"<td><input type='hidden' name='id_obat[]' value='"+ui.item.value+"'>"+ui.item.label+"</td><td>"+ui.item.stok+"</td><td>"+ui.item.satuan+"</td>"+
                					
                					"<td><input class='form-control jum' autofocus name='jumlah_obat[]' placeholder='jumlah'></td>"+
                					"<td><input class='form-control aturan_pakai' name='aturan_pakai[]' placeholder='aturan_pakai' id='aturan_pakai'></td>"+
                					"<td><input class='form-control waktu_konsumsi' name='waktu_konsumsi[]' placeholder='waktu_konsumsi'></td>"+
                					"<td><input class='form-control' name='keterangan[]' placeholder='keterangan'></td>"+
									"<td><button class='btn btn-danger btn-xs' id='remove_order_obat' type='button'>Hapus</button></td></tr>"
                					;
					$("#t4_order").append(template);
					$("#id_obat").val("");
					$("#id_obat").focus();

					$(".aturan_pakai").autocomplete({
						source: aturan_pakai,
						minLength: 0
					})

					$(".waktu_konsumsi").autocomplete({
						source: waktu_konsumsi,
						minLength: 0
					})
                }

    });
  

var aturan_pakai = [
      "3x1 Sehari",
      "2x1 Sehari",
      "1x1 Sehari"
    ];

var waktu_konsumsi = [
      "Sebelum Makan",
      "Sesudah Makan",
      "1 Jam sebelum Makan"
    ];

});


$("#table_order").on("click","tbody tr td button#remove_order_obat",function(x){
	$(this).parent().parent().remove();
	
	return false;
})

$("#table_order").on("click",function(){
	$(".obat").val("");
	//alert($(".obat").val());
})


$("#table_order_obat_lain").on("click","tbody tr td button#remove_order_obat_lain",function(x){
	$(this).parent().parent().remove();
	
	return false;
})

function print_diagnosa(id_kunjungan)
{
	window.open("<?php echo base_url()?>index.php/kunjungan/cetak_diagnosa/"+id_kunjungan);
	console.log(id_kunjungan);
}

$("#tambah_obat_lain").on("click",function(){


	var template_obat_lain = "<tr>"+
				"<td><input type='text' name='nama_obat_lain[]' required></td>"+
				"<td><input type='text' name='satuan_obat_lain[]' required></td>"+
				"<td><input class='form-control ' autofocus name='jumlah_obat_lain[]' placeholder='jumlah' required></td>"+
				"<td><input class='form-control aturan_pakai' name='aturan_pakai_obat_lain[]' placeholder='aturan_pakai' id='aturan_pakai'></td>"+
				"<td><input class='form-control waktu_konsumsi' name='waktu_konsumsi_obat_lain[]' placeholder='waktu_konsumsi'></td>"+
				"<td><input class='form-control' name='keterangan_obat_lain[]' placeholder='keterangan'></td>"+
				"<td><button class='btn btn-danger btn-xs' id='remove_order_obat_lain' type='button'>Hapus</button></td></tr>"
				;
	$("#t4_order_obat_lain").append(template_obat_lain);


	var aturan_pakai = [
	      "3x1 Sehari",
	      "2x1 Sehari",
	      "1x1 Sehari"
	    ];

	var waktu_konsumsi = [
	      "Sebelum Makan",
	      "Sesudah Makan",
	      "1 Jam sebelum Makan"
	    ];


	$(".aturan_pakai").autocomplete({
		source: aturan_pakai,
		minLength: 0
	})

	$(".waktu_konsumsi").autocomplete({
		source: waktu_konsumsi,
		minLength: 0
	})
	 
})


 </script>
