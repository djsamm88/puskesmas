<?php 
//var_dump($query);
?>
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
			
			
			<div class="alert alert-info text-center">DATA PASIEN</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="col-sm-5">
						NAMA PASIEN
					</div>
					<div class="col-sm-7">
						: <?php echo $query->nama?>
					</div>
					<div style="clear:both"></div><br>
				
					<div class="col-sm-5">
						JENIS KELAMIN
					</div>
					<div class="col-sm-7">
						: <?php echo $query->jenis_kelamin?>
					</div>
					<div style="clear:both"></div><br>
				
					<div class="col-sm-5">
						GOLONGAN DARAH
					</div>
					<div class="col-sm-7">
						: <?php echo strtoupper($query->gol_darah)?>
					</div>
					<div style="clear:both"></div><br>
					
					
					<div class="col-sm-5">
						USIA
					</div>
					<div class="col-sm-7">
						: <?php echo ($query->usia)?>
					</div>
					<div style="clear:both"></div><br>
					
					
					<div class="col-sm-5">
						TANGGAL LAHIR
					</div>
					<div class="col-sm-7">
						: <?php echo tglindo($query->tgl_lahir)?>
					</div>
					<div style="clear:both"></div><br>
				
			
				</div>
				<div class="col-sm-6">
					
					<div class="col-sm-5">
						NO PASIEN
					</div>
					<div class="col-sm-7">
						: <?php echo ($query->no_pendaftaran)?>
					</div>
					<div style="clear:both"></div><br>
					
					<div class="col-sm-5">
						NO HP
					</div>
					<div class="col-sm-7">
						: <?php echo ($query->no_telp)?>
					</div>
					<div style="clear:both"></div><br>
					
					<div class="col-sm-5">
						TANGGAL KUNJUNGAN
					</div>
					<div class="col-sm-7">
						: <?php echo tglindo($query->tgl_kunjungan)?>
					</div>
					<div style="clear:both"></div><br>
				
					<div class="col-sm-5">
						BPJS
					</div>
					<div class="col-sm-7">
						: <?php echo $query->no_bpjs?>
					</div>
					<div style="clear:both"></div><br>
					
					<div class="col-sm-5">
						ALAMAT
					</div>
					<div class="col-sm-7">
						: <?php echo $query->alamat?>, <?php echo $query->desa?>, <?php echo $query->kecamatan?>, <?php echo $query->kabupaten?>
					</div>
					<div style="clear:both"></div><br>
					
					
				</div>
				<div style="clear:both"></div><br>
				
			</div>
				
			<hr>
			<div class="col-sm-12">
			<table class="table">
				<tr>
					<td>SISTOLE</td><td><?php echo $query->sistole?></td>
				</tr>
				<tr>
					<td>DIASTOLE</td><td><?php echo $query->diastole?></td>
				</tr>
				<tr>
					<td>BERAT BADAN</td><td><?php echo $query->berat_badan?></td>
				</tr>
				<tr>
					<td>TINGGI BADAN</td><td><?php echo $query->tinggi_badan?></td>
				</tr>
				<tr>
					<td>STATUS</td><td><?php echo $query->status_kunjungan?></td>
				</tr>
				<tr>
					<td>POLI</td><td><?php echo $query->poli?></td>
				</tr>
				<tr>
					<td>ANAMNESE</td><td><?php echo $query->anamnese?></td>
				</tr>
				
				<tr>
					<td>CODE</td><td><?php echo $query->code?></td>
				</tr>
			
				<tr>
					<td>DIAGNOSA</td><td><?php echo $query->diagnosa?></td>
				</tr>
			
			</table>
			</div>
			<div class="col-sm-12">
				<hr>
				<b>PEMERIKSAAN FISIK</b>
				<br>
				<table class="table">
				<tr>
					<td>KEADAAN UMUM</td><td><?php echo $query->keadaan_umum?></td>
				</tr>
				<tr>
					<td>KEPALA/LEHER</td><td><?php echo $query->kepala_leher?></td>
				</tr>
				<tr>
					<td>THORAX</td><td><?php echo $query->thorax?></td>
				</tr>
				<tr>
					<td>ABDOMEN</td><td><?php echo $query->abdomen?></td>
				</tr>
				<tr>
					<td>EXTREMITAS</td><td><?php echo $query->extremitas?></td>
				</tr>
				<tr>
					<td>STATUS NEOROLOGIS</td><td><?php echo $query->status_neorologis?></td>
				</tr>
			</table>
			</div>
			
		</div>
</section>
		