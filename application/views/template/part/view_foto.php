<form id="form_foto" enctype="multipart/form-data">
		<input type="hidden" name="id_kunjungan" value="<?php echo $id_kunjungan?>">

		<div class="col-sm-2" style="text-align:right">Media Foto</div>
		<div class="col-sm-8">
			<input type="file" class="form-control" name="url_foto" id="url_foto" accept="image/*">
		</div> 
		<div class="col-sm-2" style="text-align:right">
			<input type="submit" value="Upload" class="btn btn-primary" id="simpan" >	
		</div>
		<div style="clear:both"></div><br>

<div style="clear: both;"></div>
</form>	
<hr>

<?php
$bs = base_url(); 
foreach ($all_foto as $key) {

	echo "<img src='".$bs."uploads/".$key->url_foto."' class='img ' width='30%'>";
}
?>


<script type="text/javascript">
	
$("#form_foto").on("submit",function(){
	 
	 	$.ajax({
            url: "<?php echo base_url();?>index.php/foto/simpan_foto",
            type: "POST",
            contentType: false,
            processData:false,
            data:  new FormData(this),
            beforeSend: function(){
                //alert("sedang uploading...");
            },
            success: function(data){
                
			     var id= "<?php echo $id_kunjungan?>";
				 //table_jamaah(id);
			     console.log(data);
			     modalFoto(<?php echo $id_kunjungan?>);
                
            },
            error: function(){

            }           
       });
	 

	return false;
});

</script>