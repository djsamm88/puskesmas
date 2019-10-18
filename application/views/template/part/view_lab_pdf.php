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
          <h3 class="box-title">Data Hasil Laboratorium</h3>

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

					<div class="col-sm-12"><b>Spesimen</b></div>
					<div class="col-sm-4">Jenis</div>
					<div class="col-sm-8"><input type="text" name="spesimen_jenis" id="spesimen_jenis" disabled class="form-control" value="<?php echo $all[0]->spesimen_jenis?>"></div>
					<div style="clear: both;"></div>
					<div class="col-sm-4">	 Asal Bahan</div>
					<div class="col-sm-8"><input type="text" name="spesimen_asal_bahan" id="spesimen_asal_bahan" required="required" class="form-control" value="<?php echo $all[0]->spesimen_asal_bahan?>"></div>
					<div style="clear: both;"></div>
					<div class="col-sm-4">	Tanggal Pengambilan SP</div>
					<div class="col-sm-8"><input type="text" name="tgl_pengambilan_sp" id="tgl_pengambilan_sp" required="required" class="form-control"  value="<?php echo $all[0]->tgl_pengambilan_sp?>"></div>
					<div style="clear: both;"></div>

				</td>
			</tr>
		</table>
			
			<hr>

		<table id="tbl_lap_obat" width="100%">
			
			<tr>
			<td width="40%">	Haemoglobin</td>
			<td width="70%"><?php echo $all[0]->haemoglobin?></td></tr>
			<tr>
			
			<td width="40%">	Gula Darah Sewaktu</td>
			<td width="70%"><?php echo $all[0]->gula_darah_sewaktu?></td></tr>
			<tr>
			
			<td width="40%">	Gula Darah Puasa</td>
			<td width="70%"><?php echo $all[0]->gula_darah_puasa?></td></tr>
			<tr>
			
			<td width="40%">	Gula Darah 2 Jam PP</td>
			<td width="70%"><?php echo $all[0]->gula_darah_2_jam_pp?></td></tr>
			<tr>
			
			<td width="40%">Asam Urat</td>
			<td width="70%"><?php echo $all[0]->asam_urat?></td></tr>
			<tr>
			
			<td width="40%">	Kolesterol</td>
			<td width="70%"><?php echo $all[0]->kolesterol?></td></tr>
			<tr>
			
			<td width="40%">	Tes Kehamilan</td>
			<td width="70%"><?php echo $all[0]->tes_kehamilan?></td></tr>
			<tr>
			
			<td width="40%">	BTA Sputum</td>
			<td width="70%"><?php echo $all[0]->bta_sputum?></td></tr>
			<tr>
			
			<td width="40%">	HIV</td>
			<td width="70%"><?php echo $all[0]->hiv?></td></tr>
			<tr>
			
			<td width="40%">	hbsag</td>
			<td width="70%"> <?php echo $all[0]->hbsag?></td></tr>
			<tr>
			
			<td width="40%">	Golongan Darah</td>
			<td width="70%"><?php echo $all[0]->golongan_darah?></td></tr>
			<tr>
			
			<td width="40%">	Urinalisa</td>
			<td width="70%"><?php echo $all[0]->urinalisa?></td></tr>
			<tr>
			
			<td width="40%">	Frambusia</td>
			<td width="70%"><?php echo $all[0]->frambusia?></td></tr>
			<tr>
			
			<td width="40%">	Mantoux Test</td>
			<td width="70%"><?php echo $all[0]->mantoux_test?></td></tr>
			<tr>
			
			<td width="40%">	IGG</td>
			<td width="70%"><?php echo $all[0]->igg?></td></tr>
			<tr>
			
			<td width="40%">	IGM</td>
			<td width="70%"><?php echo $all[0]->igm?></td></tr>
			<tr>
			
			<td width="40%">	Glukosa Urin</td>
			<td width="70%"><?php echo $all[0]->glukosa_urin?></td></tr>
			<tr>
			
			<td width="40%">	Protein Urin</td>
			<td width="70%"><?php echo $all[0]->protein_urin?></td></tr>
			<tr>
			
		</table>


          
 </div>
 
 </section>
 

 
<?php 
$peg = $this->m_home->pegawai_by_id($this->session->userdata('id_pegawai'));
?>

<table width="100%" class="table" >
<tr>
	<td width="60%">&nbsp;</td>
	<td><?php echo tanggalindo(date('Y-m-d'))?><br>
		        <?php 
                $qr_name2 = urlencode($app->nama_app.'-'.$peg->nama.' - '.$peg->nip.' - '.$peg->pangkat);     
            ?>
            <img src="<?php echo base_url()?>assets/phpqrcode/qr.php?text=<?php echo $qr_name2?>">
            <br>
      <u><?php echo $peg->nama?></u>
      <br>
      NIP.<?php echo $peg->nip?><br>
      <?php echo $peg->pangkat?>
		<hr>
		
	</td>
</tr>

</table>
