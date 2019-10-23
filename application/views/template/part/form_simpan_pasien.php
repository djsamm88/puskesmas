\<section class="content-header">
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



			<form action ="home/edit_profil" method="post" id="v_edituser">
				<div class="row">


					<div class="col-sm-6"></div>
					<div class="col-sm-6">
						
						<div class="col-sm-12">
							<div class="col-sm-4">Tanggal </div>
							<div class="col-sm-8"><input type="text" class="form-control" name="tgl_mulai" id="tgl_mulai" value="<?php echo date('Y-m-d')?>">
							</div>
							<div style="clear:both"></div><br>

							<div class="col-sm-4">Jam Mulai </div>
							<div class="col-sm-8"><input type="text" class="form-control" name="jam_pendaftaran" id="jam_pendaftaran" value="<?php echo date('H:i:s')?>" readonly>
							</div>
							<div style="clear:both"></div><br>


							<div class="col-sm-4">Jam Selesai </div>
							<div class="col-sm-8"><input type="text" class="form-control" name="jam_selesai" id="jam_selesai" readonly>
							</div>
							<div style="clear:both"></div><br>


							<div class="col-sm-4">lama pemeriksaan </div>
							<div class="col-sm-4"><input type="number" class="form-control" name="lama_pendaftaran" id="lama_pendaftaran" readonly>
							</div>
							<div class="col-sm-4"> menit</div>
							<div style="clear:both"></div><br>
						</div>


					</div>

					
					<div style="clear:both"></div><br>

					<div class="col-sm-4">NAMA </div>
					<div class="col-sm-8"><input type="text" class="form-control" name="nama" required >
					</div>
					<div style="clear:both"></div><br>


					<div class="col-sm-4">NIK </div>
					<div class="col-sm-8"><input type="text" class="form-control" name="nik" required >
					</div>
					<div style="clear:both"></div><br>

					<div class="col-sm-4">JENIS KELAMIN</div>
					<div class="col-sm-4">
						<select class="form-control" name="jenis_kelamin" required>
							<option value="">--- Pilih ---</option>
							<option value="L">Laki-laki</option>
							<option value="P">Perempuan</option>
						</select>
					</div>
					<div class="col-sm-4"></div>
					<div style="clear:both"></div><br>
					
					

					<div class="col-sm-4">TANGGAL LAHIR</div>
					<div class="col-sm-8">
						
						<div class="row">
							<div class="col-sm-4">

								<select name="tanggal_tgl_lahir" class="form-control" required>
									<option value="">---TANGGAL---</option>
									<?php 
									for($i=1;$i<32;$i++)
									{
										echo "<option value='$i'>$i</option>";
									}
									?>
								</select>
							</div>
							<div class="col-sm-4">

								<select name="bulan_tgl_lahir" class="form-control" required>
									<option value="">---BULAN---</option>
									<?php 
									for($i=1;$i<13;$i++)
									{
										echo "<option value='$i'>$i</option>";
									}
									?>
								</select>
							</div>
							<div class="col-sm-4">

								<select name="tahun_tgl_lahir" class="form-control" required>
									<option value="">---TAHUN---</option>
									<?php 
									for($i=date('Y');$i>(date('Y')-100);$i--)
									{
										echo "<option value='$i'>$i</option>";
									}
									?>
								</select>
							</div>

						</div>
					</div>
					<div style="clear:both"></div><br>
					
					
					<div class="col-sm-4">GOL DARAH </div>
					<div class="col-sm-4">
						<select class="form-control" name="gol_darah"  required>
							<option value="">---pilih---</option>
							<option value="O">O</option>
							<option value="A">A</option>
							<option value="B">B</option>
							<option value="AB">AB</option>
							<option value="Tidak Tahu">Tidak Tahu</option>

						</select>
					</div>
					<div class="col-sm-4"></div>
					<div style="clear:both"></div><br>

					<div class="col-sm-4">AGAMA </div>
					<div class="col-sm-4">
						<select class="form-control" name="agama"  required>
							<option value="">---pilih---</option>
							<option value="Kristen">Kristen</option>
							<option value="Katolik">Katolik</option>
							<option value="Budha">Budha</option>
							<option value="Hindu">Hindu</option>
							<option value="Islam">Islam</option>
							<option value="Kong Hu Cu">Kong Hu Cu</option>
							<option value="Penghayat">Penghayat</option>

						</select>
					</div>
					<div class="col-sm-4"></div>
					<div style="clear:both"></div><br>
					
					<div class="col-sm-4">STATUS PERKAWINAN </div>
					<div class="col-sm-4">
						<select class="form-control" name="status_perkawinan"  required>
							<option value="">---pilih---</option>
							<option value="Menikah">Menikah</option>
							<option value="Belum menikah">Belum menikah</option>
							<option value="Janda">Janda</option>
							<option value="Duda">Duda</option>

						</select>
					</div>
					<div class="col-sm-4"></div>
					<div style="clear:both"></div><br>
					
					<div class="col-sm-4">PENDIDIKAN </div>
					<div class="col-sm-4">
						<select class="form-control" name="pendidikan"  required>
							<option value="">---pilih---</option>
							<option value="Tidak Sekolah">Tidak Sekolah</option>
							<option value="SD">SD</option>
							<option value="SMP">SMP</option>
							<option value="SMA">SMA</option>
							<option value="D1/D3">D1/D3</option>
							<option value="S1">S1</option>
							<option value="S2/S3">S2/S3</option>

						</select>
					</div>
					<div class="col-sm-4"></div>
					<div style="clear:both"></div><br>
					
					
					<div class="col-sm-4">SUKU </div>
					<div class="col-sm-8"><input type="text" class="form-control" name="suku"  >
					</div>
					
					<div style="clear:both"></div><br>


					<div class="col-sm-4">TELEPON </div>
					<div class="col-sm-8"><input type="text" class="form-control" name="no_telp" required >
					</div>
					<div style="clear:both"></div><br>
					<div class="col-sm-4">ALAMAT </div>
					<div class="col-sm-8">
						<textarea name="alamat" class="form-control" required></textarea>
					</div>
					<div style="clear:both"></div><br>
					<div class="col-sm-4">DESA </div>
					<div class="col-sm-8"><input type="text" class="form-control" name="desa"  >
					</div>
					<div style="clear:both"></div><br>
					
					<div class="col-sm-4">KECAMATAN </div>
					<div class="col-sm-8"><input type="text" class="form-control" name="kecamatan"  >
					</div>
					<div style="clear:both"></div><br>
					
					<div class="col-sm-4">KABUPATEN </div>
					<div class="col-sm-8"><input type="text" class="form-control" name="kabupaten"  >
					</div>					
					<div style="clear:both"></div><br>

					<div style="clear:both"></div><br>
					<div class="col-sm-4">JENIS JAMINAN KESEHATAN </div>
					<div class="col-sm-8"><input type="text" class="form-control" name="jaminan_kesehatan"  id="jaminan_kesehatan_auto">
					</div>
					
					<div style="clear:both"></div><br>
					
					<div class="col-sm-4">NO BPJS </div>
					<div class="col-sm-8"><input type="text" class="form-control" name="no_bpjs"  >
					</div>
					<div style="clear:both"></div><br>
					
					<hr>

					<div class="col-sm-4">NAMA PENANGGUNG JAWAB </div>
					<div class="col-sm-8"><input type="text" class="form-control" name="nama_penanggung_jawab"  >
					</div>
					
					<div style="clear:both"></div><br>
					<div class="col-sm-4">HP PENANGGUNG JAWAB </div>
					<div class="col-sm-8"><input type="text" class="form-control" name="no_hp_penanggung_jawab"  >
					</div>
					
					<div style="clear:both"></div><br>

					
				</div>
				<div id="info_edit"></div>
				<br>
				<div class="col-sm-12"> 
					<input type="submit" name="save" value="SIMPAN" class="btn btn-block btn-primary"/>
				</div>

			</form>

		</div>

	</section>



	<!-- Modal -->
	<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Print</h4>
				</div>
				<div class="modal-body" id="div_print">

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>

		</div>
	</div>



<script>
$("#v_edituser").submit(function(){


	$.post("<?php echo base_url()?>index.php/pasien/go_simpan/",$(this).serialize(),function(e){
		$("#info_edit").html("<div class='alert alert-success'>Berhasil...</div>"+e);
		window.open("<?php echo base_url()?>index.php/pasien/kartu_pasien/"+e);
		eksekusi_controller('index.php/pasien/data_list');
	})


	return false;
})

var jaminan_kesehatan_auto = [      
	"UMUM",
	"JKN BPI",
	"JKN Non BPI"
];

$(function(){	
	$("#jaminan_kesehatan_auto").autocomplete({
		source: jaminan_kesehatan_auto,
		minLength: 0
	}).focus(function(){            			            
		$(this).data("uiAutocomplete").search($(this).val());
	});
});



$("#jam_selesai").on("input",function(){
	jam();
})


function jam()
{
	var startDate = new Date("<?php echo date('Y-m-d')?> "+$("#jam_pendaftaran").val());
	// Do your operations
	var endDate   = new Date("<?php echo date('Y-m-d')?> "+$("#jam_selesai").val());

	var seconds = (endDate.getTime() - startDate.getTime()) / 1000;

	//$("#lama_pemeriksaan").val(seconds);
	var minutes = Math.floor(seconds / 60);
	console.log(minutes);
	$("#lama_pendaftaran").val(minutes);
}		


startTime();

function startTime() 
{
	var today = new Date();
	var h = today.getHours();
	var m = today.getMinutes();
	var s = today.getSeconds();
	m = checkTime(m);
	s = checkTime(s);

	$("#jam_selesai").val(h + ":" + m + ":" + s);
	var t = setTimeout(startTime, 500);
	jam();
}
function checkTime(i) 
{
if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
return i;
}


</script>
