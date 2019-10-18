<style>

  .content{
    /*padding:5px;*/

  }

  .alert{
    padding:1px;margin:1px;
    align-content:center;
  }
  td{
    /*padding:2px;*/
    font-size: 14px;
  }
  table{
    margin:2px;
    font-size: 14px;
  }
  body{
    font-size: 14px;
  }
  .form-control{
    width:50%;
  }

  #tbl_lap_obat {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
  }

  #tbl_lap_obat td, #tbl_lap_obat th {
    border: 1px solid #ddd;
    padding: 8px;
  }

  #tbl_lap_obat tr:nth-child(even){background-color: #f2f2f2;}

  #tbl_lap_obat tr:hover {background-color: #ddd;}

  #tbl_lap_obat th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
  }


</style>
    <!-- Main content -->
    <section class="content">
      
	  
	   <!-- SELECT2 EXAMPLE -->
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Data Hasil Konseling</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>            
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
		
            <table class="tabel tbl_lap_obat" width="100%">
            	<tr>
            		<td width="50%" valign="top">
						<div class="col-sm-4">	ID Kunjungan</div>
						 <div class="col-sm-8"><input type="text" name="id_kunjungan" id="id_kunjungan" readonly class="form-control" value="<?php echo $all[0]->id_kunjungan?>"></div>
						<div style="clear: both;"></div>

						<div class="col-sm-4">	No. RM</div>
						<div class="col-sm-8"><input type="text" readonly="readonly" name="no_pendaftaran" class="form-control" value="<?php echo $all[0]->no_pendaftaran?>"></div>
						<div style="clear: both;"></div>


						<div class="col-sm-4">	Nama</div>
						<div class="col-sm-8">
							<input type="text"  disabled class="form-control" value="<?php echo $all[0]->nama?>">
						</div>
						<div style="clear: both;"></div>

						<div class="col-sm-4">	Umur</div>
						<div class="col-sm-8">
							<input type="text"  disabled class="form-control" value="<?php echo $all[0]->usia?>">
						</div>
						<div style="clear: both;"></div>


						<div class="col-sm-4">	Jenis Kelamin</div>
						<div class="col-sm-8">
							<input type="text"  disabled class="form-control" value="<?php echo $all[0]->jenis_kelamin?>">
						</div>
						<div style="clear: both;"></div>


						<div class="col-sm-4">	Alamat</div>
						<div class="col-sm-8">
							<input type="text"  disabled class="form-control" value="<?php echo $all[0]->alamat?>">
						</div>
						<div style="clear: both;"></div>

					</td>
					<td width="50%">
			

				<!--------------------- waktu ----------------------->
					<div class="col-sm-4">	Tanggal Pemeriksaan</div>
					<div class="col-sm-8">
						<input type="text"  disabled class="form-control" value="<?php echo date("Y-m-d")?>">
					</div>
					<div style="clear: both;"></div>

					<div class="col-sm-4">	Jam Mulai</div>
					<div class="col-sm-8">
						
						<input name="jam_mulai" id="jam_mulai" class="form-control" value="<?php echo $all[0]->tgl_mulai?>">
					</div>
					<div style="clear: both;"></div>

					<div class="col-sm-4">	Jam Selesai</div>
					<div class="col-sm-8">
						<input type="text" name="jam_selesai" id="jam_selesai" disabled class="form-control" value="<?php echo $all[0]->tgl_selesai?>">
					</div>
					<div style="clear: both;"></div>


					<div class="col-sm-4">	Lama</div>
					<div class="col-sm-8">
						<input type="text" name="lama_pemeriksaan" id="lama_pemeriksaan"  class="form-control" value="<?php echo $all[0]->lama_pemeriksaan?> menit">
					</div>
					<div style="clear: both;"></div>
					<!--------------------- waktu ----------------------->



					<div class="col-sm-4">	Petugas</div>
					<div class="col-sm-8"><input type="text" name="" id="" value="<?php echo $all[0]->nama_pegawai?>" class="form-control"  disabled="disabled"></div>
					<div style="clear: both;"></div>

				</td>
			</tr>
		</table>




<?php 
$peg = $this->m_home->pegawai_by_id($this->session->userdata('id_pegawai'));
?>

<table width="100%" class="tbl_conf">
  <tr>
    <td width="60%">
    </td>

     <td width="40%" style="text-align: right;">
      <?php echo @$app->nama_app." <br>".tanggalindo(date('Y-m-d'))?>  <br>      
      <?php 
                $qr_name2 = urlencode($app->nama_app.'- NIP'.$peg->nip.' - '.$peg->nama);     
            ?>
            <img src="<?php echo base_url()?>assets/phpqrcode/qr.php?text=<?php echo $qr_name2?>">
            <br>
      <u><?php echo $peg->nama?></u>
      <br>
      NIP.<?php echo $peg->nip?><br>
      <?php echo $peg->pangkat?>

     </td>    
  </tr>
</table>

			
			<hr>

		<table id="tbl_lap_obat" width="100%">
			
			<tr>
			<td width="40%">	Masalah</td>
			<td width="70%"><?php echo $all[0]->masalah?></td></tr>
			<tr>
			
			<td width="40%">	Akar masalah</td>
			<td width="70%"><?php echo $all[0]->akar_masalah?></td></tr>
			<tr>
			
			<td width="40%">Rencana Penyelesaian Masalah (Plan)</td>
			<td width="70%"><?php echo $all[0]->plan?></td></tr>
			<tr>
			
			<td width="40%">Penyelesaian Masalah Terpilih (DO)</td>
			<td width="70%"><?php echo $all[0]->do?></td></tr>
			<tr>
			
			<td width="40%">Hasil Konseling (CHECK)</td>
			<td width="70%"><?php echo $all[0]->hasil?></td></tr>
			<tr>
			
			<td width="40%">Masalah/Hambatan Saat Konseling</td>
			<td width="70%"><?php echo $all[0]->hambatan?></td></tr>
			<tr>
			
			<td width="40%">Rencana Tindak Lanjut Setelah Konseling</td>
			<td width="70%"><?php echo $all[0]->rencana_tinjut?></td></tr>
			<tr>
			
		</table>




<table width="100%" class="tbl_conf">
  <tr>
    <td width="60%">
    </td>

     <td width="40%" style="text-align: right;">
      Hormat Konselor <br>      
      <?php 
                $qr_name2 = urlencode($app->nama_app.'-'.$peg->nama.' - '.$peg->nip.' - '.$peg->pangkat);
            ?>
            <img src="<?php echo base_url()?>assets/phpqrcode/qr.php?text=<?php echo $qr_name2?>">
            <br>
      <u><?php echo $peg->nama?></u>
      <br>
      NIP.<?php echo $peg->nip?><br>
      <?php echo $peg->pangkat?>

     </td>    
  </tr>
</table>
          
 </div>
 
 </section>
 
