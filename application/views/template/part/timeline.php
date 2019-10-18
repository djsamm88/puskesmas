<style type="text/css">
	.bulat {border-radius: 50%;}

</style>


<?php 
$i=0;
foreach ($timeline as $key ) {
	
	
	echo "
		<div class='col-xs-2 alert alert-info text-center bulat' style='margin:5px'>
			$key->desc_dari <br>
			<span class='badge '>$key->tgl_mulai </badge><br>
			<span class='badge '>$key->tgl_selesai </badge><br>
			<!--<span class='badge '>$key->lama_pemeriksaan menit </badge>-->
			
		</div>		
	";

}


	
	echo "
		<div class='col-xs-2 alert alert-info text-center bulat' style='margin:5px'>
			$key->desc_ke <br>
			
			<span class='badge '>$key->tgl_selesai </badge><br>
			<span class='badge '>Posisi Sekarang </badge>
			
		</div>		
	";
	

?>
<div style='clear:both'></div>