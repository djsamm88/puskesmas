
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
		
            <div class="col-sm-6">
				<div class="col-sm-4">	ID Kunjungan</div>
				 <div class="col-sm-8"><input type="text" name="id_kunjungan" id="id_kunjungan" readonly class="form-control" value="<?php echo $all[0]->id_kunjungan?>"></div>
				<div style="clear: both;"></div><br>

				<div class="col-sm-4">	No. RM</div>
				<div class="col-sm-8"><input type="text" readonly="readonly" name="no_pendaftaran" class="form-control" value="<?php echo $all[0]->no_pendaftaran?>"></div>
				<div style="clear: both;"></div><br>


				<div class="col-sm-4">	Nama</div>
				<div class="col-sm-8">
					<input type="text"  disabled class="form-control" value="<?php echo $all[0]->nama?>">
				</div>
				<div style="clear: both;"></div><br>

				<div class="col-sm-4">	Umur</div>
				<div class="col-sm-8">
					<input type="text"  disabled class="form-control" value="<?php echo $all[0]->usia?>">
				</div>
				<div style="clear: both;"></div><br>


				<div class="col-sm-4">	Jenis Kelamin</div>
				<div class="col-sm-8">
					<input type="text"  disabled class="form-control" value="<?php echo $all[0]->jenis_kelamin?>">
				</div>
				<div style="clear: both;"></div><br>


				<div class="col-sm-4">	Alamat</div>
				<div class="col-sm-8">
					<input type="text"  disabled class="form-control" value="<?php echo $all[0]->alamat?>">
				</div>
				<div style="clear: both;"></div><br>



			</div>

			<div class="col-sm-6">
			

				<!--------------------- waktu ----------------------->
					<div class="col-sm-4">	Tanggal Pemeriksaan</div>
					<div class="col-sm-8">
						<input type="text"  disabled class="form-control" value="<?php echo date("Y-m-d")?>">
					</div>
					<div style="clear: both;"></div><br>

					<div class="col-sm-4">	Jam Mulai</div>
					<div class="col-sm-8">
						
						<input name="jam_mulai" id="jam_mulai" class="form-control" value="<?php echo $all[0]->tgl_mulai?>">
					</div>
					<div style="clear: both;"></div><br>

					<div class="col-sm-4">	Jam Selesai</div>
					<div class="col-sm-8">
						<input type="text" name="jam_selesai" id="jam_selesai" disabled class="form-control" value="<?php echo $all[0]->tgl_selesai?>">
					</div>
					<div style="clear: both;"></div><br>


					<div class="col-sm-4">	Lama</div>
					<div class="col-sm-8">
						<input type="text" name="lama_pemeriksaan" id="lama_pemeriksaan"  class="form-control" value="<?php echo $all[0]->lama_pemeriksaan?> menit">
					</div>
					<div style="clear: both;"></div><br>
					<!--------------------- waktu ----------------------->



					<div class="col-sm-4">	Petugas</div>
					<div class="col-sm-8"><input type="text" name="" id="" value="<?php echo $all[0]->nama_pegawai?>" class="form-control"  disabled="disabled"></div>
					<div style="clear: both;"></div><br>

					<div class="col-sm-12"><b>Spesimen</b></div>
					<div class="col-sm-4">Jenis</div>
					<div class="col-sm-8"><input type="text" name="spesimen_jenis" id="spesimen_jenis" disabled class="form-control" value="<?php echo $all[0]->spesimen_jenis?>"></div>
					<div style="clear: both;"></div><br>
					<div class="col-sm-4">	 Asal Bahan</div>
					<div class="col-sm-8"><input type="text" name="spesimen_asal_bahan" id="spesimen_asal_bahan" required="required" class="form-control" value="<?php echo $all[0]->spesimen_asal_bahan?>"></div>
					<div style="clear: both;"></div><br>
					<div class="col-sm-4">	Tanggal Pengambilan SP</div>
					<div class="col-sm-8"><input type="text" name="tgl_pengambilan_sp" id="tgl_pengambilan_sp" required="required" class="form-control"  value="<?php echo $all[0]->tgl_pengambilan_sp?>"></div>
					<div style="clear: both;"></div><br>

				</div>
			
			<div style="clear: both;"></div><br>
			<hr>

			<div class="col-sm-4">	Haemoglobin</div>
			<div class="col-sm-8"><input type="text" name="haemoglobin" id="haemoglobin" value="<?php echo $all[0]->haemoglobin?>" class="form-control" placeholder=""></div>
			<div style="clear: both;"></div><br>
			<div class="col-sm-4">	Gula Darah Sewaktu</div>
			<div class="col-sm-8"><input type="text" name="gula_darah_sewaktu" id="gula_darah_sewaktu" required="required" class="form-control" value="<?php echo $all[0]->gula_darah_sewaktu?>"></div>
			<div style="clear: both;"></div><br>
			<div class="col-sm-4">	Gula Darah Puasa</div>
			<div class="col-sm-8"><input type="text" name="gula_darah_puasa" id="gula_darah_puasa" required="required" class="form-control" value="<?php echo $all[0]->gula_darah_puasa?>"></div>
			<div style="clear: both;"></div><br>
			<div class="col-sm-4">	Gula Darah 2 Jam PP</div>
			<div class="col-sm-8"><input type="text" name="gula_darah_2_jam_pp" id="gula_darah_2_jam_pp" required="required" class="form-control" value="<?php echo $all[0]->gula_darah_2_jam_pp?>"></div>
			<div style="clear: both;"></div><br>
			<div class="col-sm-4">Asam Urat</div>
			<div class="col-sm-8"><input type="text" name="asam_urat" id="asam_urat" required="required" class="form-control" value="<?php echo $all[0]->asam_urat?>"></div>
			<div style="clear: both;"></div><br>
			<div class="col-sm-4">	Kolesterol</div>
			<div class="col-sm-8"><input type="text" name="kolesterol" id="kolesterol" required="required" class="form-control" value="<?php echo $all[0]->kolesterol?>"></div>
			<div style="clear: both;"></div><br>
			<div class="col-sm-4">	Tes Kehamilan</div>
			<div class="col-sm-8"><input type="text" name="tes_kehamilan" id="tes_kehamilan" required="required" class="form-control" value="<?php echo $all[0]->tes_kehamilan?>"></div>
			<div style="clear: both;"></div><br>
			<div class="col-sm-4">	BTA Sputum</div>
			<div class="col-sm-8"><input type="text" name="bta_sputum" id="bta_sputum" required="required" class="form-control" value="<?php echo $all[0]->bta_sputum?>"></div>
			<div style="clear: both;"></div><br>
			<div class="col-sm-4">	HIV</div>
			<div class="col-sm-8"><input type="text" name="hiv" id="hiv" required="required" class="form-control" value="<?php echo $all[0]->hiv?>"></div>
			<div style="clear: both;"></div><br>
			<div class="col-sm-4">	hbsag</div>
			<div class="col-sm-8"><input type="text" name="hbsag" id="hbsag" required="required" class="form-control" value="<?php echo $all[0]->hbsag?>"></div>
			<div style="clear: both;"></div><br>
			<div class="col-sm-4">	Golongan Darah</div>
			<div class="col-sm-8"><input type="text" name="golongan_darah" id="golongan_darah" required="required" class="form-control" value="<?php echo $all[0]->golongan_darah?>"></div>
			<div style="clear: both;"></div><br>
			<div class="col-sm-4">	Urinalisa</div>
			<div class="col-sm-8"><input type="text" name="urinalisa" id="urinalisa" required="required" class="form-control" value="<?php echo $all[0]->urinalisa?>"></div>
			<div style="clear: both;"></div><br>
			<div class="col-sm-4">	Frambusia</div>
			<div class="col-sm-8"><input type="text" name="frambusia" id="frambusia" required="required" class="form-control" value="<?php echo $all[0]->frambusia?>"></div>
			<div style="clear: both;"></div><br>
			<div class="col-sm-4">	Mantoux Test</div>
			<div class="col-sm-8"><input type="text" name="mantoux_test" id="mantoux_test" required="required" class="form-control" value="<?php echo $all[0]->mantoux_test?>"></div>
			<div style="clear: both;"></div><br>
			<div class="col-sm-4">	IGG</div>
			<div class="col-sm-8"><input type="text" name="igg" id="igg" required="required" class="form-control" value="<?php echo $all[0]->igg?>"></div>
			<div style="clear: both;"></div><br>
			<div class="col-sm-4">	IGM</div>
			<div class="col-sm-8"><input type="text" name="igm" id="igm" required="required" class="form-control" value="<?php echo $all[0]->igm?>"></div>
			<div style="clear: both;"></div><br>
			<div class="col-sm-4">	Glukosa Urin</div>
			<div class="col-sm-8"><input type="text" name="glukosa_urin" id="glukosa_urin" required="required" class="form-control" value="<?php echo $all[0]->glukosa_urin?>"></div>
			<div style="clear: both;"></div><br>
			<div class="col-sm-4">	Protein Urin</div>
			<div class="col-sm-8"><input type="text" name="protein_urin" id="protein_urin" required="required" class="form-control" value="<?php echo $all[0]->protein_urin?>"></div>
			<div style="clear: both;"></div><br>

          <div style="clear: both;"></div>
          <button class='btn btn-danger' type='button' onclick='print_lab(<?php echo $all[0]->id_kunjungan?>);return false;'>Cetak</button> 
 </div>
 
 </section>
 
 <script type="text/javascript">
 	

function print_lab(id_kunjungan)
{
  window.open("<?php echo base_url()?>index.php/lab/view_lab_pdf/"+id_kunjungan);
  console.log(id_kunjungan);
}



 </script>