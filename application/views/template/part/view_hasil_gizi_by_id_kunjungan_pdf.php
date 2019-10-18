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
        			

        			<div class="col-xs-4">No BPJS</div>
                    <div class="col-xs-8">
                    <input type="text" name="no_bpjs" value="<?php echo $all[0]->no_bpjs?>" class="form-control" disabled></div>
        			

        			<div class="col-xs-4">Nama</div>
                    <div class="col-xs-8">
                    <input type="text" name="nama" value="<?php echo $all[0]->nama?>" class="form-control" disabled></div>
        			
        			
        			<div class="col-xs-4">Usia</div>
                    <div class="col-xs-8">
                    <input type="text" name="usia" value="<?php echo $all[0]->usia?>" class="form-control" disabled></div>
        			

        			<div class="col-xs-4">Jenis Kelamin</div>
                    <div class="col-xs-8">
                    <input type="text" name="jenis_kelamin" value="<?php echo $all[0]->jenis_kelamin?>" class="form-control" disabled></div>
        			

        			<div class="col-xs-4">Alamat</div>
                    <div class="col-xs-8">
                    <input type="text" name="alamat" value="<?php echo $all[0]->alamat?>" class="form-control" disabled></div>
        			

        			<div class="col-xs-4">Tanggal Kunjungan</div>
                    <div class="col-xs-8">
                    <input type="text" name="tgl_kunjungan" value="<?php echo $all[0]->tgl_kunjungan?>" class="form-control" disabled></div>
        			

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
        			
      
      </td>
      <td width="50%" valign="top">

        <!--------------------- waktu ----------------------->
          <div class="col-xs-4">  Tanggal Pemeriksaan</div>
          <div class="col-xs-8">
            <input type="text"  disabled class="form-control" value="<?php echo date("Y-m-d")?>">
          </div>
          

          <div class="col-xs-4">  Jam Mulai</div>
          <div class="col-xs-8">
            
            <input name="jam_mulai" id="jam_mulai" class="form-control" value="<?php echo $all[0]->tgl_mulai?>">
          </div>
          

          <div class="col-xs-4">  Jam Selesai</div>
          <div class="col-xs-8">
            <input type="text" name="jam_selesai" id="jam_selesai"  class="form-control" value="<?php echo $all[0]->tgl_selesai?>">
          </div>
          


          <div class="col-xs-4">  Lama</div>
          <div class="col-xs-8">
            <input type="text" name="lama_pemeriksaan" id="lama_pemeriksaan"  class="form-control" readonly value="<?php echo $all[0]->lama_pemeriksaan?> menit">
          </div>
          
          <!--------------------- waktu ----------------------->

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

    <hr>
    
		<table width="100%" id="tbl_lap_obat">
      <tr>
        <td width="30%">Tinggi Badan</td>
            <td width="60%">
              <?php echo $all[0]->tinggi_badan?>
            </td>
            <td width="10%">
              cm
            </td>
      </tr>
      <tr>
            <td>Berat Badan</td>
            <td><?php echo $all[0]->berat_badan?></td>
            <td>gram</td>
      </tr>
      <tr>      
        <td>Tekanan darah</td>
        <td><?php echo $all[0]->td?></td>
        <td>mmHg</td>
      </tr>
      <tr>        
        <td>KIE</td>
        <td><?php echo $all[0]->kie?></td>
        <td></td>
      </tr>
      <tr>
        <td>Lingkar Kepala</td>
        <td><?php echo $all[0]->lingkar_kepala?></td>
        <td>cm</td>      
      </tr>

      <tr>
        <td>Rambut</td>
        <td><?php echo $all[0]->rambut?></td>
        <td></td>
			</tr>
			<tr>
        <td>Anamnesa</td>  
        <td><?php echo $all[0]->anamnesa?></td>
        <td></td>
      </tr>
      <tr>
        <td>Status Imunisasi</td>  
        <td><?php echo $all[0]->status_imunisasi?></td>
        <td></td>
      </tr>
      <tr>
        <td>Diagnosa Gizi</td>  
        <td><?php echo $all[0]->diagnosa_gizi?></td>
        <td></td>
      </tr>
</table>
<br><br>



<table width="100%" class="tbl_conf">
  <tr>
    <td width="60%">
    </td>

     <td width="40%" style="text-align: right;">
      Hormat Konselor <br>      
            <?php 
                $qr_name2 = urlencode($app->nama_app.'- '.$peg->nama.' - '.$peg->nip.' - '.$peg->pangkat);     
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
 
 