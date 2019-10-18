	
	<section class="content-header">
      <h1>
        <?php echo $judul?>
      </h1>     
    </section>

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

        <form action="<?php echo base_url()?>index.php/laporan/laporan_by_date" method="get" target="blank" id="form_lap_pasien">


      <div class="col-sm-2">Nama  </div><div class="col-sm-2"><input type="text" class="form-control" name="no_pendaftaran" id="nama" ><span id='t4_nama' style="text-decoration: underline;font-style: italic;"></span></div>

		  <div class="col-sm-2" style="text-align: right">TGL  </div><div class="col-sm-2"><input type="text" class="form-control datepicker" name="awal" id="awal" value="<?php echo date('Y-m-01')?>"></div>

    <?php 
    $datetime = new DateTime('tomorrow');
    $besok = $datetime->format('Y-m-d');
    ?>
			<div class="col-sm-2" style="text-align: right">s/d  </div><div class="col-sm-2"><input type="text" class="form-control datepicker" name="akhir" id="akhir" value="<?php echo $besok?>"></div>
			

		<div style="clear:both"></div><br>
		<div id="info_editnya"></div>
    <button class="btn btn-primary" type="submit" id="btn_simpan">View</button>
    <button class="btn btn-primary" type="button" id="download_xl">Excel</button>
		<button class="btn btn-primary" type="button" id="download_pdf">Pdf</button>
		</form>


    <hr>
    <div id="t4_view" class="table-responsive"></div>

		<!-- body-->
		</div>
	
 
 </section>
 
<script>

<?php
$a=''; 
foreach($autocomplete_nama as $a_nama)
{
  $invID = str_pad($a_nama->no_pendaftaran, 5, '0', STR_PAD_LEFT);
  $a.='{value:"'.$invID.'",label:"'.htmlentities($a_nama->nama).'"},';
} 
?>

  var availableTags = [
  <?php echo $a?>
  ];

$( "#nama" ).autocomplete({
  source: availableTags,
    minLength: 0,
    select: function(event, ui) {
      console.log(ui);
      $("#t4_nama").html(ui.item.label);
    }
})

$('.datepicker').datepicker({
  autoclose: true,
  format: 'yyyy-mm-dd'  
})

$("#form_lap_pasien").on("submit",function(){
  var ser = $(this).serialize();
  $.get("<?php echo base_url()?>index.php/laporan/laporan_by_date",ser,function(e){
    $("#t4_view").html("").html(e);
  })
  return false;
})

$("#download_xl").on("click",function(){
  var ser = $("#form_lap_pasien").serialize();
  var act = "<?php echo base_url()?>index.php/laporan/laporan_by_date_xl";
  window.open(act+"?"+ser);
});

$("#download_pdf").on("click",function(){
  var ser = $("#form_lap_pasien").serialize();
  var act = "<?php echo base_url()?>index.php/laporan/laporan_by_date_pdf";

  window.open(act+"?"+ser);
});
</script>