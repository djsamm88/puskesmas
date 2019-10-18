<section class="content-header">
      <h1>
        Pasien Rujuk Eksternal
      </h1>     
    </section>

    <!-- Main content -->
    <section class="content">
      
	  
	   <!-- SELECT2 EXAMPLE -->
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Data List</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>            
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">

			<table class="table table-bordered" id="tbl_farmasi">
				<thead>
				<tr>
					
					<th>NO</th>
					<th> NO PENDAFTARAN </th>
					<th> NAMA PASIEN</th>
					<th> UMUR</th>					
					<th> NO HP</th>					
					<th> POLI </th>					
					<th> DOKTER </th>					
					<th> TGL </th>			
					<th> Ket.Rujukan </th>											
					<th> Mulai </th>																
					<th> Dari </th>			
					<th> Timeline </th>			
					<th> ID </th>			

					<th width="20px">ACTION</th>
				</tr>
				
				
				</thead>

				<tbody>
			<?php
			$no=0;
			foreach($all as $row) {
				$no++;
				$invID = str_pad($row->no_pendaftaran, 5, '0', STR_PAD_LEFT);
				
				
				if($row->ke=='7')
				{					
										
					$tr = "class='warning'";
					$mulai = $row->tgl_selesai;

					$mm = explode(" ", $mulai);
					$masuk = $mm[1];

					$start_date = new DateTime($row->tgl_selesai);
					$since_start = $start_date->diff(new DateTime(date('Y-m-d H:i:s')));
					$minutes = $since_start->days * 24 * 60;
					$minutes += $since_start->h * 60;
					$minutes += $since_start->i;
					$lama = $minutes;
					$selesai = date('H:i:s');
					
				}else{
					
					$tr = "class=''";										
					$mulai = $row->tgl_mulai;						
					$mm = explode(" ", $mulai);
					$masuk = $mm[1];

					$start_date = new DateTime($row->tgl_selesai);
					$since_start = $start_date->diff(new DateTime($row->tgl_mulai));
					$minutes = $since_start->days * 24 * 60;
					$minutes += $since_start->h * 60;
					$minutes += $since_start->i;
					$lama = $minutes;
					$ss = explode(" ", $row->tgl_selesai);
					$selesai = $ss[1];
					
				}
				$stat = $row->desc_ke;

				if($stat=='Selesai')
				{
					$bad_sel = "<br><span class='label label-success' onclick='timeline($row->id_kunjungan);return false;'>$lama menit</span>";
				}else{
					$bad_sel = "<br><span class='label label-danger' onclick='timeline($row->id_kunjungan);return false;'>Belum Selesai</span>";
				}

				if($row->ke=='10')
				{
					$btn_cetak = "<button class='btn btn-danger btn-xs btn-block' onclick='print_diagnosa($row->id_kunjungan)'>Cetak</button>";
				}else{
					$btn_cetak = "<button class='btn btn-primary btn-xs btn-block' onclick='print_diagnosa_lagi($row->id_kunjungan)'>Cetak</button>";
				}

				
				echo "<tr $tr>";
				echo "
					<td>$no</td>
					<td id='no_pendaftaran'><b>$invID</b></td>
					<td><b>$row->nama</b></td>
					<td>$row->usia</td>
					<td>$row->no_telp</td>					
					<td>$row->poli</td>
					<td>$row->nama_dokter</td>
					<td>".tglindo($row->tgl_kunjungan)."</td>
					<td>$row->ket_rujukan</td>
					
					<td id='masuk'>$masuk</td>					
					<td>$row->desc_dari</td>
					<td>$stat $bad_sel</td>
					<td id='id_kunjungan'>$row->id_kunjungan</td>
					<td>
						
						$btn_cetak
					</td>
					
					</tr>";
				
			}
			?>
				</tbody>
			</table>
		
		
		
		<!-- body-->
		</div>
 
 </section>


<!-- Modal -->
<div id="modalDetail" class="modal fade" role="dialog">
  <div class="modal-dialog modal-xl">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Detail Obat</h4>
      </div>
      <div class="modal-body" id="isi_modalDetail">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<style type="text/css">
	@media (min-width: 768px) {
	  .modal-xl {
	    width: 90%;
	   max-width:1200px;
	  }
	}
</style>
 
<script>
$("#tbl_farmasi").dataTable({"scrollX": true});





function print_diagnosa_lagi(id_kunjungan)
{
	window.open("<?php echo base_url()?>index.php/rujuk_eksternal/cetak_diagnosa_history/"+id_kunjungan);
	console.log(id_kunjungan);
}



function print_diagnosa(id_kunjungan)
{
	window.open("<?php echo base_url()?>index.php/rujuk_eksternal/cetak_diagnosa/"+id_kunjungan);
	console.log(id_kunjungan);
}



</script>