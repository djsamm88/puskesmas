<?php 
if(isset($file_type))
{?>
  
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
  br{
   display: block;
   margin: 100px 100px;
  }
  
</style>
<?php 
}
?>
 <!-- Main content -->
    <section class="content">
    
	  
	   <!-- SELECT2 EXAMPLE -->
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title" style="text-align: center;">Hasil Pemeriksaan Status Gizi</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>            
          </div>
        </div>
        <!-- /.box-header -->
      <div class="box-body">
      <table width="100%" >
        <tr>
          <td width="50%">
            

        			<div class="col-xs-4">No Pendaftaran</div>
                    <div class="col-xs-8">
                    <input type="text" name="no_pendaftaran" value="<?php echo $all[0]->no_pendaftaran?>" class="form-control" readonly="readonly"></div>
        			<div style="clear: both;"></div><br>

        			<div class="col-xs-4">No BPJS</div>
                    <div class="col-xs-8">
                    <input type="text" name="no_bpjs" value="<?php echo $all[0]->no_bpjs?>" class="form-control" disabled></div>
        			<div style="clear: both;"></div><br>

        			<div class="col-xs-4">Nama</div>
                    <div class="col-xs-8">
                    <input type="text" name="nama" value="<?php echo $all[0]->nama?>" class="form-control" disabled></div>
        			<div style="clear: both;"></div><br>
        			
        			<div class="col-xs-4">Usia</div>
                    <div class="col-xs-8">
                    <input type="text" name="usia" value="<?php echo $all[0]->usia?>" class="form-control" disabled></div>
        			<div style="clear: both;"></div><br>

        			<div class="col-xs-4">Jenis Kelamin</div>
                    <div class="col-xs-8">
                    <input type="text" name="jenis_kelamin" value="<?php echo $all[0]->jenis_kelamin?>" class="form-control" disabled></div>
        			<div style="clear: both;"></div><br>

        			<div class="col-xs-4">Alamat</div>
                    <div class="col-xs-8">
                    <input type="text" name="alamat" value="<?php echo $all[0]->alamat?>" class="form-control" disabled></div>
        			<div style="clear: both;"></div><br>

        			<div class="col-xs-4">Tanggal Kunjungan</div>
                    <div class="col-xs-8">
                    <input type="text" name="tgl_kunjungan" value="<?php echo $all[0]->tgl_kunjungan?>" class="form-control" disabled></div>
        			<div style="clear: both;"></div><br>

        			<div class="col-xs-4">Diagnosa Sementara</div>
                    <div class="col-xs-8">
                    	<?php 
                    		echo "<table class='table'>";
                    			foreach ($diag as $x) {
                    				echo "
                    					<tr>
                    						<td>$x->code_diagnosa</td>
                    						<td>$x->diagnosa</td>
                    					</tr>
                    				";
                    			}
                    		echo "</table>";
                    	?>
                    </div>
        			<div style="clear: both;"></div><br><hr>
      
      </td>
      <td width="50%" valign="top">

        <!--------------------- waktu ----------------------->
          <div class="col-xs-4">  Tanggal Pemeriksaan</div>
          <div class="col-xs-8">
            <input type="text"  disabled class="form-control" value="<?php echo date("Y-m-d")?>">
          </div>
          <div style="clear: both;"></div><br>

          <div class="col-xs-4">  Jam Mulai</div>
          <div class="col-xs-8">
            
            <input name="jam_mulai" id="jam_mulai" class="form-control" value="<?php echo $all[0]->tgl_mulai?>">
          </div>
          <div style="clear: both;"></div><br>

          <div class="col-xs-4">  Jam Selesai</div>
          <div class="col-xs-8">
            <input type="text" name="jam_selesai" id="jam_selesai"  class="form-control" value="<?php echo $all[0]->tgl_selesai?>">
          </div>
          <div style="clear: both;"></div><br>


          <div class="col-xs-4">  Lama</div>
          <div class="col-xs-8">
            <input type="text" name="lama_pemeriksaan" id="lama_pemeriksaan"  class="form-control" readonly value="<?php echo $all[0]->lama_pemeriksaan?> menit">
          </div>
          <div style="clear: both;"></div><br>
          <!--------------------- waktu ----------------------->

      </td>
    </tr>
    </table>
		
	
      <div style="clear: both;"></div><br>
      <div class="col-xs-4">Tinggi Badan</div>
            <div class="col-xs-6">
              <input type="text" name="nama" value="<?php echo $all[0]->tinggi_badan?>" class="form-control" disabled>
            </div>
            <div class="col-xs-2">
              cm
            </div>
      <div style="clear: both;"></div><br>
      <div class="col-xs-4">Berat Badan</div>
            <div class="col-xs-6">
              <input type="text" name="nama" value="<?php echo $all[0]->berat_badan?>" class="form-control" disabled>
            </div>
            <div class="col-xs-2">
              gram
            </div>
      <div style="clear: both;"></div><br>
      <div class="col-xs-4">Tekanan darah</div>
            <div class="col-xs-6">
              <input type="text" name="nama" value="<?php echo $all[0]->td?>" class="form-control" disabled>
            </div>
            <div class="col-xs-2">
              mmHg
            </div>
      <div style="clear: both;"></div><br>
      <div class="col-xs-4">KIE</div>
            <div class="col-xs-6">
              <input type="text" name="nama" value="<?php echo $all[0]->kie?>" class="form-control" disabled>
            </div>
            <div class="col-xs-2">
              
            </div>      
      <div style="clear: both;"></div><br>



      
      <input type="hidden" name="id_kunjungan" value="<?php echo $all[0]->id_kunjungan?>" class="form-control" readonly="readonly">
			<div class="col-xs-4">Lingkar Kepala</div>
			 <div class="col-xs-6">
          <input type="number" name="lingkar_kepala" id="lingkar_kepala" required="required" class="form-control" placeholder="" value="<?php echo $all[0]->lingkar_kepala?>">
        </div>
        <div class="col-xs-2">
          cm      
        </div>      
			<div style="clear: both;"></div><br>

			<div class="col-xs-4">Rambut</div>
			<div class="col-xs-8"><input type="text" name="rambut" id="rambut" required="required" class="form-control" placeholder="" value="<?php echo $all[0]->rambut?>">
			</div>
			<div style="clear: both;"></div><br>

			<div class="col-xs-4">Anamnesa</div>
			<div class="col-xs-8"><input type="text" name="anamnesa" id="anamnesa" required="required" class="form-control" placeholder=""value="<?php echo $all[0]->anamnesa?>">
			</div>
			<div style="clear: both;"></div><br>

			<div class="col-xs-4">Status Imunisasi</div>
			<div class="col-xs-8"><input type="text" name="status_imunisasi" id="status_imunisasi" required="required" class="form-control" placeholder="" value="<?php echo $all[0]->status_imunisasi?>">
			</div>
			<div style="clear: both;"></div><br>

			<div class="col-xs-4">Diagnosa Gizi</div>
			<div class="col-xs-8"><input type="text" name="diagnosa_gizi" id="diagnosa_gizi" required="required" class="form-control"  placeholder="" value="<?php echo $all[0]->diagnosa_gizi?>">
			</div>
			<div style="clear: both;"></div><br>

          <div style="clear: both;"></div>
          
    
    <button class='btn btn-danger' type='button' onclick='print_gizi(<?php echo $all[0]->id_kunjungan?>);return false;'>Cetak</button> 

 </div>
 
 </section>
 <script type="text/javascript">
function print_gizi(id_kunjungan)
{
  window.open("<?php echo base_url()?>index.php/master_gizi/view_hasil_gizi_by_id_kunjungan_pdf/"+id_kunjungan);
  console.log(id_kunjungan);
}

 </script>
 